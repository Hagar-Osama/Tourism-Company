<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait UploaderTrait

{

    private function uploadFile($file, $path, $oldFile = null)
    {
        $path = $file->storePublicly($path, 's3');
        Storage::disk('s3')->url($path);
        $fileData = explode('/', $path);
        $fileName = end($fileData);


        if(!is_null($oldFile))
        {
            if(Storage::disk('s3')->exists($path . '/' . $oldFile))
            {
                Storage::disk('s3')->delete($path . '/' . $oldFile);
            }
        }
        return $fileName;
    }

    public function deleteFile($fileUrl)
    {
        if (Storage::disk('s3')->exists($fileUrl)) {
            Storage::disk('s3')->delete($fileUrl);
        }
    }



}
