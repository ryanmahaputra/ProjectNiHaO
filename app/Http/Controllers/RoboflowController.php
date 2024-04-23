<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class RoboflowController extends Controller
{
    public function checkApiConnection()
    {
        
        $url = 'https://api.roboflow.com/https://detect.roboflow.com/tilapia-diseases/1?api_key=AaxVQyfDGfG11CPPcsG1';
        $apiKey = 'AaxVQyfDGfG11CPPcsG1'; 

        try {
            $response = Http::withHeaders([
                'Authorization' => "Bearer {$apiKey}",
                'Accept' => 'application/json',
            ])->get($url);

            if ($response->successful()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'API connection is successful',
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to connect to API',
                    'response' => $response->body(),
                ], $response->status());
            }

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function processImage(Request $request)
{
    $url = 'https://api.roboflow.com/https://detect.roboflow.com/tilapia-diseases/1?api_key=AaxVQyfDGfG11CPPcsG1';
    $apiKey = 'AaxVQyfDGfG11CPPcsG1';

    try {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$apiKey}",
            'Accept' => 'application/json',
        ])->attach('image', $request->file('image')->path(), $request->file('image')->getClientOriginalName())
          ->post($url);
        

        if ($response->successful()) {
            return response()->json([
                'status' => 'success',
                'data' => $response->json(),
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to process image',
                'response' => $response->body(),
            ], $response->status());
        }

    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'An error occurred',
            'error' => $e->getMessage(),
        ], 500);
    }
}

public function index()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ]);
    
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
    
        // Simpan gambar ke direktori public/diagnosa_output
        $image->move(public_path('diagnosa_output'), $imageName);
    
        // Membaca file gambar sebagai string dan mengkonversinya ke base64
        $imageData = base64_encode(file_get_contents(public_path('diagnosa_output/' . $imageName)));
    
        $response = Http::post('https://detect.roboflow.com/tilapia-diseases/1?api_key=AaxVQyfDGfG11CPPcsG1', [
            'api_key' => 'AaxVQyfDGfG11CPPcsG1',
            'image' => $imageData,
        ]);
    
        return view('diagnosa_output', ['data' => $response->json(), 'imageName' => $imageName]);
    }
    

}