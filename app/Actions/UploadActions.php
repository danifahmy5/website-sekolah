<?php

namespace App\Actions;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class UploadActions
{

    static function singgleUpload($image): string
    {
        if ($image) {
            $generateName = generateRandomString(25) . '.' . $image->getClientOriginalExtension();

            $image->storePubliclyAs('images', $generateName, 'public');

            return $generateName;
        }

        return '';
    }

    static function mutiUpload($images): array
    {
        $output = [];
        if (count($images) > 0) {
            foreach ($images as $key => $image) {
                $generateName = generateRandomString(25) . '.' . $image->getClientOriginalExtension();
                $image->storePubliclyAs('images', $generateName, 'public');
                $output[] = $generateName;
            }
        }

        return $output;
    }

    static function deleteFile($file)
    {
        $file = Storage::path("public/images/$file");

        if (File::exists($file)) {
            File::delete($file);
        }
    }
}
