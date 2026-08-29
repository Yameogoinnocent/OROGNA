<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait HandlesImageUploads
{
    /**
     * Store an uploaded image or return the current path.
     */
    protected function storeImage(Request $request, string $field, string $folder, ?string $current = null): ?string
    {
        if (!$request->hasFile($field)) {
            return $current;
        }

        $file = $request->file($field);
        $dir = public_path('uploads/' . $folder);

        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
            . '-' . Str::lower(Str::random(8))
            . '.' . $file->getClientOriginalExtension();

        $file->move($dir, $name);

        return 'uploads/' . $folder . '/' . $name;
    }

    /**
     * Delete a stored image if it exists in uploads directory.
     */
    protected function deleteStoredImage(?string $path): void
    {
        if (!$path || !str_starts_with($path, 'uploads/')) {
            return;
        }

        $full = public_path($path);
        if (is_file($full)) {
            @unlink($full);
        }
    }
}
