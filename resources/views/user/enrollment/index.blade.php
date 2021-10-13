@extends('layouts.material-app')

@section('content')
    <div class="section section-tabs my-section">
        <div class="container">
            <div id="nav-tabs">
                <div class="row">
                    <div class="col-md-8 offset-md-2 offset-sm-1">
                        <!-- Tabs with icons on Card -->
                        @foreach($student->appliedForms as $form)
                            <div class="card card-nav-tabs">
                                <div class="card-header card-header-custom">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#info" data-toggle="tab">
                                                        <i class="material-icons">info_outline</i> {{Str::ucfirst($form->type).' Form No'}}. {{$form->id}}
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{route('enroll.show',['enroll'=>$form->id])}}">
                                                        <i class="material-icons">remove_red_eye</i> Info Detail
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
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                            <span class="sr-only">60% Complete</span>
                                                        </div>
                                                    </div>
                                                    <h4><span class="fa fa-user">&nbsp;&nbsp;</span>{{$form->data['name_mm']}}</h4>
                                                    <h4><span class="fa fa-address-book">&nbsp;&nbsp;</span>{{$form->data['roll_no']}}</h4>
                                                    <h4><span class="fa fa-book">&nbsp;&nbsp;</span>{{$form->data['year']}}</h4>
                                                </div>
                                                <hr>
                                                <div class="col-md-4">
                                                    <h4><strong>Approved</strong></h4>
                                                    <div class="progress progress-line-info">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                            <span class="sr-only">60% Complete</span>
                                                        </div>
                                                    </div>
                                                    <h4><span class="fa fa-info"> {{get_approved_status($form->approved_status)}}</span></h4>
                                                    <h4><span class="fa fa-calendar"> @if($form->approved_at) {{$form->approved_at->diffForHumans()}}@else &nbsp;-&nbsp; @endif</span></h4>
                                                    <h4><span class="fa fa-comment">@if($form->approved_message != '') {{$form->approved_message}} @else &nbsp;Pending&nbsp; @endif</span></h4>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4><strong>Payment</strong></h4>
                                                    <div class="progress progress-line-info">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                            <span class="sr-only">60% Complete</span>
                                                        </div>
                                                    </div>
                                                    <h4><span class="fa fa-money"> {{get_payment_status($form->payment_receive_status)}}</span></h4>
                                                    <h4><span class="fa fa-calendar"> @if($form->payment_received_at) {{$form->payment_received_at->diffForHumans()}}@else &nbsp;-&nbsp; @endif</span></h4>
                                                    <h4><span class="fa fa-comment"> {{get_payment_status($form->payment_receive_message)}}</span></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress progress-line-info" style="margin-top: 20px;">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                    <h4>Submitted at: {{$form->created_at->diffForHumans()}}</h4>
                                </div>
                            </div>
                    @endforeach
                    <!-- End Tabs with icons on Card -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
