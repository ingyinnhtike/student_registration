@extends('layouts.app')

@section('content')

    <h4 style="text-align: center;font-weight: 600;margin-bottom: 15px;">Online Registration Form
        အားအောင်မြင်စွာဖြည့်သွင်းပြီးဖြစ်ပါတယ်...</h4>
    <h5 style="text-align: center;font-weight: 600;margin-bottom: 15px;">မိမိရရှိသည့် Form No. အား မှတ်ထား၍
        ကျောင်းသားရေးရာသို့ပြောပြီး Approve ရယူခြင်း ငွေသွင်းခြင်းများ ဆက်လက်ပြုလုပ်ပါရန်။</h5>

    <div class="row pl-1 pr-1">


        @foreach($forms as $form)

            <div class="card mb-3 mx-auto col-md-4" style="max-width: 22rem;">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <h4 class="card-title col-10">{{Str::ucfirst($form->type).' Form'}}</h4>
                        <div class="col-2">
                            <a class="btn btn-outline-info" href="{{route('enroll.show',['enroll'=>$form->id])}}">
                                <strong class="fa fa-eye"></strong>
                            </a>
                        </div>
                    </div>

                    <p class="card-subtitle">Form No. {{$form->id}}</p>

                </div>
                <div class="card-body">
                    <div class="d-inline-block mb-3">
                        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">

                            {{--                            info--}}

                            <li class="nav-item">
                                <a class="nav-link active" id="info-tab{{$form->id}}" data-toggle="tab"
                                   href="#info{{$form->id}}" role="tab"
                                   aria-controls="info{{$form->id}}" aria-selected="true"><span
                                        class="fa fa-user"> Info</span></a>
                            </li>

                            {{--                            approval--}}

                            <li class="nav-item">
                                <a class="nav-link" id="approval-tab{{$form->id}}" data-toggle="tab"
                                   href="#approval{{$form->id}}" role="tab"
                                   aria-controls="approval{{$form->id}}" aria-selected="false"><span
                                        class="fa fa-check">Approval</span></a>
                            </li>

                            {{--                            payment--}}

                            <li class="nav-item">
                                <a class="nav-link" id="payment-tab{{$form->id}}" data-toggle="tab"
                                   href="#payment{{$form->id}}" role="tab"
                                   aria-controls="contact" aria-selected="false"><span
                                        class="fa fa-money"> Payment</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-block">

                        <div class="tab-content" id="myTabContent">

                            {{--                            info--}}

                            <div class="tab-pane fade show active" id="info{{$form->id}}" role="tabpanel"
                                 aria-labelledby="info-tab{{$form->id}}">
                                <p class="card-text"><span class="fa fa-user"> {{$form->data['name_mm']}}</span></p>
                                <p class="card-text"><span class="fa fa-address-book"> {{$form->data['roll_no']}}</span>
                                </p>
                                <p class="card-text"><span class="fa fa-book"> {{$form->data['year']}}</span></p>
                            </div>

                            {{--                            approval--}}

                            <div class="tab-pane fade" id="approval{{$form->id}}" role="tabpanel"
                                 aria-labelledby="approval-tab{{$form->id}}">

                                <p class="card-text"><span
                                        class="fa fa-check"> {{get_approved_status($form->approved_status)}}</span></p>
                                <p class="card-text"><span class="fa fa-calendar">
                            @if($form->approved_at)
                                            {{$form->approved_at->diffForHumans()}}
                                        @endif</span></p>
                                <p class="card-text"><span class="fa fa-comment">
                                {{$form->approved_messaga}}</span>
                                </p>
                            </div>

                            {{--                            payment--}}

                            <div class="tab-pane fade" id="payment{{$form->id}}" role="tabpanel"
                                 aria-labelledby="contact-tab{{$form->id}}">

                                <p class="card-text"><span
                                        class="fa fa-money"> {{get_payment_status($form->payment_receive_status)}}</span>
                                </p>
                                <p class="card-text"><span class="fa fa-calendar">
                            @if($form->payment_received_at)
                                            {{$form->payment_received_at->diffForHumans()}}
                                        @endif</span></p>
                                <p class="card-text"><span class="fa fa-comment">
                                {{$form->payment_receive_message}}
                            </span>
                                </p>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-footer bg-transparent">
                    <p class="card-subtitle">Submitted at: {{$form->created_at->diffForHumans()}}</p>
                </div>
            </div>

        @endforeach
        {{-- <table class="table table-striped">
             <thead>
             <tr>
                 <th scope="col">Action</th>
                 <th scope="col">Form No.</th>
                 <th scope="col">Type</th>
                 <th scope="col">Submitted At</th>
                 <th scope="col">Approved At</th>
                 <th scope="col">Payment Received At</th>
             </tr>
             </thead>
             <tbody>
             @foreach($forms as $form)
                 <tr>
                     <th scope="row">
                         <a class="btn btn-primary" href="{{route('enroll.show',['enroll'=>$form->id])}}">
                             <span class="fa fa-eye"></span>
                         </a>
                     </th>
                     <th>{{$form->id}}</th>
                     <td>{{$form->type}}</td>
                     <td>{{$form->created_at->diffForHumans()}}</td>
                     <td>{{$form->approved_at ??'-'}}</td>
                     <td>{{$form->payment_received_at ??'-'}}</td>
                 </tr>
             @endforeach

             </tbody>
         </table>--}}
>>>>>>> 9d959fcde69eed404365599bdf1d6961c53d490e
    </div>


@endsection
