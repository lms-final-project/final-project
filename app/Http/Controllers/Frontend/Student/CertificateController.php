<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PDF;
class CertificateController extends Controller
{
    public function certificate(Request $request){

        Certificate::create([
            'course_id'=>$request->course_id,
            'user_id'=>auth()->user()->id,
            'certification_request'=>true,
        ]);
        return redirect()->route('student.certificate.index')->with('success','Certification request send to admin');


   }

   public function index_certificate(){
      $All_Certificate_Request=Certificate::where('user_id','=',auth()->user()->id)->get();
      return view('frontend.student.panel.certificate.index',compact('All_Certificate_Request'));
   }

   public function delete_certificate(Certificate $certificate){
    $certificate->delete();
    return redirect()->route('student.certificate.index')->with('danger','Certification request delete');
   }

   public function print_certificate(Certificate $certificate){
        $pdf=PDF::loadView('frontend.student.panel.certificate.print',compact('certificate'));
        return $pdf->download('certificate.pdf');


   }
}
