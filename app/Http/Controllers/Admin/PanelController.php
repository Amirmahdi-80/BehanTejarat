<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $Products=Products::all();
        $title='پنل بهان تجارت';
        $ip=$request->ip();
        return view('Admin.EditProfile',compact('title','ip','Products'));
    }
    public function showAvatar($path)
    {
        $file = Storage::get('Avatars/' . $path);
        $fileType = Storage::mimeType('Avatars/' . $path);
        return response($file)->header('Content-Type', $fileType);
    }
}
