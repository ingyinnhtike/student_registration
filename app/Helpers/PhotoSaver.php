<?php


namespace App\Helpers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoSaver
{
    /**
     * @param Request $request
     * @param string $key
     * @param string $path
     * @param string $disk
     * @return array|\Illuminate\Http\UploadedFile|\Illuminate\Http\UploadedFile[]|null
     */
    public function savePhoto(Request $request, string $key = 'photo', string $path = 'photos', string $disk = 'public')
    {

        if ($request->has($key)) {
            $photo = $request->file($key);
            $photo = Storage::disk($disk)->putFile($path, $photo);
            return $photo;
        }
        return null;
    }
}
