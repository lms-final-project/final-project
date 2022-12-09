<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\CourseUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
public function index(){
    $All_payments=CourseUser::all();
    $Total_paid=CourseUser::sum('amount_paid');
return view('dashboard.Payment.index',compact('All_payments','Total_paid'));
}
}
