@extends('layouts.frontend')

@section('content')
    <div class="col-md-12 text-center welcome-message">
        {!!  get_config('otp-login-setting.welcome_message') !!}
    </div>
    <div class="container container-margin-top">

        <div class="card bg-white mb-4at" style="border: none !important;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 login-sec">
                        <div class="text-center"><img src="{{get_config('otp-login-setting.logo')}}" alt="logo" class="mb-3" style="width: 80px;"></div>
                        <form method="POST" action="{{ route('check_otp') }}" id="login">
                            @csrf
                        <div class="login-form">
                            <input id="phone" type="number" class="form-control"
                                   name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                            <div class="form-check text-center">
                                @if(!get_config('site-setting.require_otp', true))
{{--                                    todo: write new function for otp not required--}}
                                <!-- <div>
                                <button type="button" class="btn btn btn-outline-custom" onclick="login()">@lang('ui.login')</button>
                                </div> -->
                                <div class="wrap">
                                <button type="button" class="button btn btn btn-outline-custom" onclick="login()">@lang('ui.login')</button>
                                </div>
                                @else
                                <button type="button" class="btn btn btn-outline-custom" onclick="showModal()" data-toggle="modal" data-target="#otpModal">@lang('ui.get_otp')</button>
                                @endif
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <img src={{asset(get_config('otp-login-setting.background_photo'))}} alt="image" class="pt-4" style="width:100%;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--model for otp verification start--}}
    <div class="modal fade" id="otpModal" tabindex="-1" role="dialog" aria-labelledby="otpModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('ui.otp_code')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <div class="alert alert-danger alert-block" id="error"
                             style="display:none;">
                            <button type="button" onclick="hideError()" class="close">×</button>
                        </div>
                        <div class="form-group d-flex justify-content-center px-5 py-3">
                            <div>
                                <label for="otp"><h5>@lang('ui.enter_otp')</h5></label>
                                <input id="otp" type="number"
                                       class="form-control text-dark text-center @error('phone') is-invalid @enderror"
                                       value="" required maxlength="4" autofocus>
                                <br><br>
                                <p>
                                    @lang('ui.check_otp')
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                        @lang('ui.close')
                    </button>
                    <button type="button" onclick="check_otp()"
                            class="btn btn-primary otp-button">
                        @lang('ui.login')
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--model for otp verification end--}}
@endsection

@push('scripts')
    <script >
        $(document).ready(function () {
            $('.otp-button').attr('disabled', true);
            $('.modal-body input').keyup(function () {
                if ($(this).val().length == 4) {
                    $('.otp-button').attr('disabled', false);

                } else {
                    $('.otp-button').attr('disabled', true);
                }
            })
        });
        function showModal() {
            $('#otpModal').modal('show');
            this.send_phone_number();
        }
        function send_phone_number() {
            let phone_number = $('#phone').val();
            if (phone_number == '') {
                $('#error').show();
                $('.text').remove();
                $('#error').append("<p class='text mb-0'>@lang('ui.fill_number')</p>");
            } else {
                $('#error').hide();
                $.ajax({
                    type: "POST",
                    data: {"_token": "{{csrf_token()}}", "phone": phone_number},
                    url: "{{route('request_otp')}}",
                    success: function (msg) {

                    }
                })
            }
        }
        function hideError() {
            $('#error').hide();
        }

        function check_otp() {
            let otp_code = $('#otp').val();
            let phone = $('#phone').val();
            $.ajax({
                type: "POST",
                data: {"_token": "{{csrf_token()}}", "otp_code": otp_code, 'phone': phone},
                url: "{{route('check_otp')}}",
                success: function (msg) {
                    if (msg == true) {
                        window.location.replace('{{route('enroll.create')}}')
                    } else {
                        $('#error').show();
                        $('.text').remove();
                        $('#error').append("<p class='text mb-0'>Your OTP code is incorrect.</p>")
                    }
                }
            })

        }

        function login() {
            let phone = $('#phone').val();
            $.ajax({
                type: "POST",
                data: {"_token": "{{ csrf_token() }}", 'phone': phone},
                url: "{{route('no-otp-login')}}",
                success: function (msg) {
                    if (msg === true) window.location.replace('{{route('enroll.create')}}')
                },

                statusCode: {
                    422: () => {
                        Swal.fire({
                        icon: 'error',
                        title: 'Sorry',
                        text: 'Please enter valid Phone Number!',
                        })
                    }
                }
            })
        }

    </script>
@endpush

