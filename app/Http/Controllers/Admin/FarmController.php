<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Farm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FarmController extends Controller
{
    public function index()
    {
        $farms = Farm::all();
        return view('admin.farms.index', compact('farms'));
    }

    public function create()
    {
        return view('admin.farms.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/farms'), $fileName);
            $validated['image_path'] = 'uploads/farms/' . $fileName;
        }

        Farm::create($validated);

        return redirect()->route('admin.farms.index')
            ->with('success', 'Farm created successfully');
    }

    public function edit(Farm $farm)
    {
        return view('admin.farms.edit', compact('farm'));
    }

    public function update(Request $request, Farm $farm)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($farm->image_path && file_exists(public_path($farm->image_path))) {
                unlink(public_path($farm->image_path));
            }

            $image = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/farms'), $fileName);
            $validated['image_path'] = 'uploads/farms/' . $fileName;
        }

        $farm->update($validated);

        return redirect()->route('admin.farms.index')
            ->with('success', 'Farm updated successfully');
    }

    public function destroy(Farm $farm)
    {
        if ($farm->image_path && file_exists(public_path($farm->image_path))) {
            unlink(public_path($farm->image_path));
        }

        $farm->delete();

        return redirect()->route('admin.farms.index')
            ->with('success', 'Farm deleted successfully');
    }
}
