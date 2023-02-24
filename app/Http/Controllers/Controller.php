<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function destroyFile($pathFile)
    {
        if (File::exists(public_path($pathFile))) {
            File::delete(public_path($pathFile));
        }
    }

    public function loadFile(Request $request, $key, $path_image)
    {
        $path_complete = null;
        if ($request->file($key)) {
            if (!file_exists(public_path() . '/' . $path_image)) {
                if (File::makeDirectory(public_path() . '/' . $path_image, 0777, true)) {
                    $folder_base = $string = Str::of($path_image)->dirname(1);
                    chmod(public_path() . '/' . $folder_base, 0777);
                    chmod(public_path() . '/' . $path_image, 0777);
                }
            }
            $file = $request->file($key);
            $name = "file-" . $file->getClientOriginalName();
            $file->move(public_path($path_image), $name);
            $path_complete = env('URL_DOMAIN') . '/' . $path_image . '/' . $name;
            chmod(public_path() . '/' . $path_image . '/' . $name, 0777);
            return $path_complete;
        }
        return $path_complete;
    }
}
