<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadAPLController extends Controller
{
    public function download($file)
    {
        $filePath = storage_path('app/public/' . $file);

        if (file_exists($filePath)) {
            return response()->download($filePath, $file);
        } else {
            // File not found response, you can customize this as needed.
            return response()->json(['error' => 'File not found.'], 404);
        }
    }
}
