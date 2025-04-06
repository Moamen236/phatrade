<?php

namespace App\Services;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageService
{
    public function optimizeAndStore($image, $path, $width = 800)
    {
        $filename = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $fullPath = $path . '/' . $filename;

        $img = Image::make($image)
            ->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode('webp', 85);

        Storage::disk('public')->put($fullPath, $img->stream());

        return $fullPath;
    }

    public function delete($path)
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            return true;
        }
        return false;
    }
} 