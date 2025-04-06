<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FactoryController extends Controller
{
    public function index()
    {
        $factories = Factory::all();
        return view('admin.factories.index', compact('factories'));
    }

    public function create()
    {
        return view('admin.factories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $factory = new Factory();
        $factory->name = $validated['name'];
        $factory->description = $validated['description'];

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $index => $image) {
                $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/factories'), $fileName);
                $images[] = [
                    'path' => 'uploads/factories/' . $fileName,
                    'order' => $index
                ];
            }
            $factory->images = json_encode($images, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }

        $factory->save();

        return redirect()->route('admin.factories.index')
            ->with('success', 'Factory created successfully');
    }

    public function edit(Factory $factory)
    {
        return view('admin.factories.edit', compact('factory'));
    }

    public function update(Request $request, Factory $factory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'removed_images' => 'nullable|string',
            'image_orders' => 'nullable|string',
        ]);

        // Get current images and decode from JSON
        $currentImages = collect(json_decode($factory->images, true) ?? []);

        // Remove deleted images
        if ($request->filled('removed_images')) {
            $removedImages = json_decode($request->removed_images, true);
            foreach ($removedImages as $removedPath) {
                if (file_exists(public_path($removedPath))) {
                    unlink(public_path($removedPath));
                }
                $currentImages = $currentImages->filter(function ($img) use ($removedPath) {
                    return $img['path'] !== $removedPath;
                });
            }
        }

        // Update image orders if provided
        if ($request->filled('image_orders')) {
            $newOrders = json_decode($request->image_orders, true);
            $currentImages = $currentImages->map(function ($img) use ($newOrders) {
                if (isset($newOrders[$img['path']])) {
                    $img['order'] = $newOrders[$img['path']];
                }
                return $img;
            });
        }

        // Add new images
        if ($request->hasFile('images')) {
            $maxOrder = $currentImages->max('order') ?? -1;
            foreach ($request->file('images') as $index => $image) {
                $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/factories'), $fileName);
                $currentImages->push([
                    'path' => 'uploads/factories/' . $fileName,
                    'order' => $maxOrder + $index + 1
                ]);
            }
        }

        // Sort images by order
        $sortedImages = $currentImages->sortBy('order')->values()->all();

        $factory->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'images' => json_encode($sortedImages, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        ]);

        return redirect()->route('admin.factories.index')
            ->with('success', 'Factory updated successfully');
    }

    public function destroy(Factory $factory)
    {
        if ($factory->images) {
            foreach (json_decode($factory->images, true) ?? [] as $image) {
                if (file_exists(public_path($image['path']))) {
                    unlink(public_path($image['path']));
                }
            }
        }

        $factory->delete();

        return redirect()->route('admin.factories.index')
            ->with('success', 'Factory deleted successfully');
    }
}
