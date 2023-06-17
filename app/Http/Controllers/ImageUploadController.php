<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        try {
           
            // $file_name = "img_main_picture".time().rand(10000,99999).".png";
            // $img_base64 = mb_split(",", $request->image)[1];

            // Storage::disk('public')->put(
            //     $file_name,
            //     base64_decode($img_base64)
            // );

            $path = $request->file('file')->store('public');
            $path = mb_split("/", $path)[1];
            
            $response = [
                'name' => $path,
                'status' => 'finished',
                'url' => asset('storage/'.$path)
            ];

        }catch(Exception $e) {
            $response = [
                'name' => "上傳失敗",
                'status' => "error"
            ];
        }

        return response()->json($response, 200);
        
    }
}