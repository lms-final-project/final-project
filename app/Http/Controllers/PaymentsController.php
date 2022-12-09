<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseUser;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaymentsController extends Controller
{
    public function freePayment($course_id){
        CourseUser::create([
            'user_id'   =>  auth()->user()->id,
            'course_id' =>  $course_id
        ]);
        return redirect()->back()->withSuccess('Course purchased successfully');
    }

    // paypal methods
    public function payment($course_id){
        $course = Course::findOrFail($course_id);
        $data = [];
        $data['items'] = [
            [
                'name'          => $course->title,
                'price'         => (double)$course->price,
                'description'   => $course->description,
                'qty'           => 1
            ]
        ];
        $data['invoice_id'] = 1;
        $data['invoice_description'] = 'asdf asdf sadg ';
        $data['return_url'] = route('paypal.success' , $course_id);
        $data['cancel_url'] = route('paypal.cancel', $course_id);
        $data['total'] = (double)$course->price;

        $provider = new ExpressCheckout();
        $response = $provider->setExpressCheckout($data);
        $response = $provider->setExpressCheckout($data , true);
        return redirect($response['paypal_link']);
    }

    public function success(Request $request ,$course_id){
        $course=Course::findorfail($course_id);
        $provider = new ExpressCheckout();
        $response = $provider->getExpressCheckoutDetails($request->token);
        if( in_array( strtoupper($response['ACK']) , ['SUCCESS' , 'SUCCESSWITHWARNING'] ) ){
            CourseUser::create([
                'course_id'   => $course->id,
                'user_id'     => auth()->user()->id,
                'is_free'     => false,
                'amount_paid' => $course->price,
            ]);
            return redirect()->route('course_details' , $course_id)->with('success' , 'Course purchased successfully');
        }
        return redirect()->route('course_details' , $course_id)->with('danger' , 'Something went wrong, try again later');
    }

    public function cancel($course_id){
        return redirect()->route('course_details' , $course_id)->with('danger' , 'You cancel the payment !');

    }

}
