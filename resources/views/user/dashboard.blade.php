@extends('layouts.material-app')

@section('content')


    <div class="section section-tabs my-section">
        <div class="container">
            @php($site_name = config('common.site'))
            @if($form)
                <h4 style="text-align: center;font-weight: 600;margin-bottom: 15px;">Online Registration Form
                    အားအောင်မြင်စွာဖြည့်သွင်းပြီးဖြစ်ပါသည်...</h4>
                @if($site_name == 'um1_yangon')
                    <h5 style="text-align: center;font-weight: 600;margin-bottom: 15px;">မိမိရရှိသည့် Form No. အား
                        မှတ်ထား၍ ကျောင်းသားရေးရာသို့ပြောပြီး Approve ရယူခြင်း ငွေသွင်းခြင်းများ ဆက်လက်ပြုလုပ်ပါရန်။</h5>
                @elseif($site_name == 'nuac')
                    <h5 style="text-align: center;font-weight: 600;margin-bottom: 15px;">၁) မိမိရရှိသည့် Form
                        No.အားမှတ်ထားပြီး Bank သို့ပြသပြီးငွေပေးသွင်းရန်</h5>
                    <h5 style="text-align: center;font-weight: 600;margin-bottom: 35px;">၂) ငွေရပြေစာအား
                        ကျောင်းသားရေးရာသို့ပြသပြီး ကျောင်းသားအဖြစ် Approved ရယူခြင်းများဆက်လက်ပြုလုပ်ပါရန််</h5>
                @endif
            @else
                <a class="btn btn-outline-info" href="{{route('enroll.create')}}">Create Form</a>
            @endif

            <div id="nav-tabs" style="margin-top: 20px;">
                <div class="row">
                    <div class="col-md-8 offset-md-2 offset-sm-1">
                        <!-- Tabs with icons on Card -->
                        @if($form)
                            {{--                        @foreach($forms as $form)--}}
                            <div class="card card-nav-tabs">
                                <div class="card-header card-header-custom">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <h4> Form No - {{$form->id}}</h4>
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active"
                                                       href="{{route('enroll.show',['enroll'=>$form->id])}}">
                                                        <i class="material-icons">remove_red_eye</i> View Detail
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active"
                                                       href="#" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="material-icons">credit_card</i> Payment
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="info">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4><strong>Info</strong></h4>
                                                    <div class="progress progress-line-info">
                                                        <div class="progress-bar progress-bar-info" role="progressbar"
                                                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                             style="width: 60%;">
                                                            <span class="sr-only">60% Complete</span>
                                                        </div>
                                                    </div>
                                                    <h4><span
                                                            class="fa fa-user">&nbsp;&nbsp;</span>{{$form->data['name_mm']}}
                                                    </h4>
                                                    <h4><span
                                                            class="fa fa-address-book">&nbsp;&nbsp;</span>{{$form->data[config('site-setting.roll_no_to_show','roll_no')]??'-'}}
                                                    </h4>
                                                    <h4><span
                                                            class="fa fa-book">&nbsp;&nbsp;</span>{{$form->data['year']}}
                                                    </h4>
                                                </div>
                                                <hr>
                                                <div class="col-md-4">
                                                    <h4><strong>Approved</strong></h4>
                                                    <div class="progress progress-line-info">
                                                        <div class="progress-bar progress-bar-info" role="progressbar"
                                                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                             style="width: 60%;">
                                                            <span class="sr-only">60% Complete</span>
                                                        </div>
                                                    </div>
                                                    <h4><span
                                                            class="fa fa-info"> {{get_approved_status($form->approved_status)}}</span>
                                                    </h4>
                                                    <h4><span
                                                            class="fa fa-calendar"> @if($form->approved_at) {{$form->approved_at->diffForHumans()}}@else
                                                                &nbsp;-&nbsp; @endif</span></h4>
                                                    <h4><span
                                                            class="fa fa-comment">@if($form->approved_message != '') {{$form->approved_message}} @else
                                                                No remark&nbsp; @endif</span></h4>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4><strong>Payment</strong></h4>
                                                    <div class="progress progress-line-info">
                                                        <div class="progress-bar progress-bar-info" role="progressbar"
                                                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                             style="width: 60%;">
                                                            <span class="sr-only">60% Complete</span>
                                                        </div>
                                                    </div>
                                                    <h4><span
                                                            class="fa fa-money"> {{get_payment_status($form->payment_receive_status)}}</span>
                                                    </h4>
                                                    <h4><span
                                                            class="fa fa-calendar"> @if($form->payment_received_at) {{$form->payment_received_at->diffForHumans()}}@else
                                                                &nbsp;-&nbsp; @endif</span></h4>
                                                    <h4><span
                                                            class="fa fa-comment"> @if($form->payment_receive_message != '') {{$form->payment_receive_message}} @else
                                                                No remark @endif</span>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress progress-line-info" style="margin-top: 20px;">
                                        <div class="progress-bar progress-bar-info" role="progressbar"
                                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 60%;">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                    <h4>Submitted at: {{$form->created_at->diffForHumans()}}</h4>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document" data-modal-effect="slide-top">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Payment</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="pl-lg-5">
                                                <table class="payment-table">
                                                    <tbody>
                                                    @foreach($fees as $fee)
                                                        <tr>
                                                            <td>{{$fee->name}}</td>
                                                            <td><span class="fee-info">-</span>{{$fee->pivot->amount}}
                                                                ကျပ်
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td>စုစုပေါင်း</td>
                                                        <td><span
                                                                class="fee-info">-</span>{{$fees->sum('pivot.amount')}}
                                                            ကျပ်
                                                        </td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{env('PAYMENT_END_POINT', 'https://bppays.com/payment')}}"
                                                  id="payment" method='POST' name='paymentform'>
                                                <input type="hidden" name="merchant_id"
                                                       value="{{ config('site-setting.payment_merchant_id') }}">
                                                <input type="hidden" name="service_name"
                                                       value="{{ config('site-setting.payment_service_name') }}">
                                                <input type="hidden" name="email"
                                                       value="{{ config('site-setting.payment_email') }}">
                                                <input type="hidden" name="password"
                                                       value="{{ config('site-setting.payment_password') }}">
                                                <input type="hidden" name="amount"
                                                       value="{{ $fees->sum('pivot.amount') }}">
                                                <input type="hidden" name="order_id"
                                                       value="{{ \Illuminate\Support\Str::random(8) }}">
                                                <button type="submit" class="btn btn-blue">Pay</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{--                    @endforeach--}}
                    @endif
                    <!-- End Tabs with icons on Card -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
