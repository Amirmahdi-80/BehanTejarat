<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\MyFavorite;
use Illuminate\Http\Request;
use App\Models\AboutMe;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="امیرمهدی اسدی";
        $about="تو این صفحه میتونم اطلاعات خودم رو بارگذاری کنم";
        $aboutme= AboutMe::query()->orderByDesc('id')->paginate(1);
        $favorite= MyFavorite::query()->orderByDesc('id')->paginate(3);
        return view('About.AboutMe',compact('title','aboutme','about','favorite'));
    }
}
