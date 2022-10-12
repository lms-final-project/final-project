<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Icon;
use App\Models\About;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $categories=Category::all();

      
      $About = About::orderBy('created_at', 'DESC')->get();
      //dd($About);
      $about = $About->skip(0)->take(4)->all();
     // dd($about);
        return view('frontend.index',compact('categories','about'));
    }
}
