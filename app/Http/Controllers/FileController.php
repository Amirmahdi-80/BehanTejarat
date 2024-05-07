<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function show($path)
    {
        return response()->download(storage_path("app/" . $path));
    }
}
