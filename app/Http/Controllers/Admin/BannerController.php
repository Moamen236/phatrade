<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Enums\BannerType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    public function show(Banner $banner)
    {
        return view('admin.banners.show', compact('banner'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => ['required', 'string', Rule::in(BannerType::values())],
            'sub_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $image = $request->file('image');
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/banners'), $fileName);

        Banner::create([
            'title' => $validated['title'],
            'sub_title' => $validated['sub_title'],
            'description' => $validated['description'],
            'type' => $validated['type'],
            'image' => 'uploads/banners/' . $fileName,
        ]);

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner created successfully');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => ['required', 'string', Rule::in(BannerType::values())],
            'sub_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if (file_exists(public_path($banner->image))) {
                unlink(public_path($banner->image));
            }

            // Upload new image
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/banners'), $fileName);
            $validated['image'] = 'uploads/banners/' . $fileName;
        }

        $banner->update([
            'title' => $validated['title'],
            'sub_title' => $validated['sub_title'],
            'description' => $validated['description'],
            'type' => $validated['type'],
            'image' => $validated['image'] ?? $banner->image,
        ]);

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner updated successfully');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->images) {
            foreach ($banner->images as $image) {
                if (file_exists(public_path($image['path']))) {
                    unlink(public_path($image['path']));
                }
            }
        }

        $banner->delete();

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner deleted successfully');
    }
}
