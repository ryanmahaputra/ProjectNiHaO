<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\TrueType;

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

    $image->move(public_path('diagnosa_output'), $imageName);

    $imageDataPath = public_path('diagnosa_output/' . $imageName);

    $pythonScript = public_path('diagnosa_output/diagnosa.py');

    // Jalankan proses eksternal menggunakan proc_open()
    $descriptorspec = [
        0 => ["pipe", "r"], // stdin
        1 => ["pipe", "w"], // stdout
        2 => ["pipe", "w"]  // stderr
    ];

    $process = proc_open("python $pythonScript $imageDataPath", $descriptorspec, $pipes);

    if (is_resource($process)) {
        // Baca output dari proses
        $output = stream_get_contents($pipes[1]);
        fclose($pipes[1]);

        // Tutup proses
        proc_close($process);

        // Menghilangkan bagian atas dan bawah dari output
        $startPos = strpos($output, "{");
        $endPos = strrpos($output, "}");

        // Ambil bagian yang relevan dari output
        $relevantOutput = substr($output, $startPos, $endPos - $startPos + 1);

        // Konversi ke format JSON
        $relevantOutputJSON = json_decode($relevantOutput, true);

        // Tampilkan dalam format yang lebih mudah dibaca
        // dd($relevantOutputJSON);

        // Ambil bagian 'predictions' dari respons
        if (isset($relevantOutputJSON['predictions'])) {
            $predictions = $relevantOutputJSON['predictions'];
        } else {
            // Jika tidak ada, kita isi dengan array JSON kosong
            $predictions = json_encode(array(
                "Error" => "Silakan Scan Kembali",
            ));
        }

        // Kemudian, Anda dapat menggunakan $predictions sesuai kebutuhan Anda

        return view('diagnosa_output', ['data' => $predictions, 'imageName' => $imageName]);
    } else {
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to execute Python script.'
        ], 500);
    }
}




}