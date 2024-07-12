<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function getResume($nama_file)
    {
        $file_path = public_path('storage/resume/' . $nama_file);
        if (file_exists($file_path)) {
            // Mendownload file menggunakan response()->download()
            return response()->download($file_path, $nama_file);
        } else {
            // Jika file tidak ditemukan, return response not found atau sesuai kebutuhan
            abort(404, 'File not found');
        }
    }

    public function getUnggahan($nama_file)
    {
        $file_path = public_path('storage/unggahan/' . $nama_file);
        if (file_exists($file_path)) {
            // Mendownload file menggunakan response()->download()
            return response()->download($file_path, $nama_file);
        } else {
            // Jika file tidak ditemukan, return response not found atau sesuai kebutuhan
            abort(404, 'File not found');
        }
    }

    public function getLuaran($nama_file)
    {
        $file_path = public_path('storage/luaran/' . $nama_file);
        if (file_exists($file_path)) {
            // Mendownload file menggunakan response()->download()
            return response()->download($file_path, $nama_file);
        } else {
            // Jika file tidak ditemukan, return response not found atau sesuai kebutuhan
            abort(404, 'File not found');
        }
    }
}
