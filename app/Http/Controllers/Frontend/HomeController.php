<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $categories=Category::all();
      //  $about=About::all();
       $about = DB::table('abouts')->limit(4)->get();



        return view('frontend.index',compact('categories','about'));
    }
}
