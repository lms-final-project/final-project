<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\CourseZoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZoomController extends Controller
{
    public function index(){
        $All_Zoom_Meeting=CourseZoom::all();
        return view('dashboard.Zoom.index',compact('All_Zoom_Meeting'));
    }

}
