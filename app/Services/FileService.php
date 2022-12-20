<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileService
{
    public function getUrl($path, $data, $target)
    {
        try {
            foreach ($data as &$row) {
                $row->$target = Storage::url($path . $row->$target);
            }
            return $data;
        } catch (\Exception$th) {
            return $th;
        }
    }
    public function store($path, $image)
    {
        if (!is_null($image)) {
            try {
                // Storage::put($image, $path);
                $image->store($path);
                return $image->hashName();
            } catch (\Exception$th) {
                throw $th;
            }
        } else {
            return null;
        }

    }
    public function update($path, $old_image, $new_image = null)
    {
        try {
            if (!is_null($new_image)) {
                try {
                    Storage::delete($path . $old_image);
                    Storage::put($path, $new_image, 'public');
                    return $new_image->hashName();
                } catch (\Exception$th) {
                    return response($th);
                }
            } else {
                return $old_image;
            }
        } catch (\Throwable$th) {
            return false;
        }
    }
    public function delete($path, $image)
    {
        if (!is_null($image)) {
            Storage::delete($path . $image);
        }
    }
}
