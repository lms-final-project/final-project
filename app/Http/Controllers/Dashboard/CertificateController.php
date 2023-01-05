<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificateController extends Controller
{
       public function certificate(){
          $All_Certificate=Certificate::all();
          return view('dashboard.Certificate.index',compact('All_Certificate'));
       }

       public function accept_certificate(Certificate $certificate){
          $certificate->update([
            'status'=>'accepted',
          ]);
        return redirect()->route('dashboard.all_certificate')->with('success','Acceptted certificate request');
    }
        public function reject_certificate(Certificate $certificate){
            $certificate->update([
                'status'=>'rejected',
            ]);
            return redirect()->route('dashboard.all_certificate')->with('danger','Rejected certificate request');
       }
}
