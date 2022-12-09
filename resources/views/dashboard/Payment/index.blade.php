@extends('dashboard.layouts.app',[
    'active_button' => 'dashboard',
    'page_title'    => 'about page'
])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Free</th>
                                    <th>Amount_Paid</th>
                                    <th>Payment Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($All_payments as $payment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$payment->user_id->name }}</td>
                                        <td>{{$payment->course_id->title}}</td>

                                         @if ($payment->is_free)
                                                <td>Yes</td>
                                        @else
                                                <td>No</td>
                                        @endif

                                        @if ($payment->amount_paid)
                                            <td>{{$payment->amount_paid}}$</td>
                                        @else
                                            <td>0$</td>
                                        @endif
                                            <td>{{$payment->created_at}}</td>

                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="5">No Payment has been registered for any course yet</th>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot >
                                <td class="price_txt " style="background-color:#20c997; "  scope="col" colspan="2">Total Amount Paid</td>
                                <td align="center">{{$Total_paid}}$</td>

                              </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
