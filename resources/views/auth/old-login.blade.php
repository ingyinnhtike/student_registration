@extends('layouts.login-layout')

@section('content')
    @php($site_name = config('common.site'))
    <div class="limiter">
        <div class="container-login100 {{get_config('otp-login-setting.background_photo')}}">
            <div class="wrap-login100 {{get_config('otp-login-setting.form_css_class')}}">
                <form method="POST" action="{{ route('check_otp') }}" id="login">
                    @csrf

                    <span class="login100-form-title {{get_config('otp-login-setting.welcome_css_class')}}">
						@if(get_config('otp-login-setting.welcome_logo'))<img
                            src="{{asset(get_config('otp-login-setting.welcome_logo'))}}" alt=""
                            style="width: 150px;">@endif
                        {!! get_config('otp-login-setting.welcome_message') !!}
					</span>

                    <div class="wrap-input100 validate-input" data-validate="Please enter valid phone number">
                        <input id="phone" type="number" class="input100 @error('phone') is-invalid @enderror "
                               name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                                <i class="fa fa-phone-alt" aria-hidden="true"></i>
                            </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button  class="login100-form-btn" onclick="showModal()" data-toggle="modal"
                                data-target="#otpModal" ->
                            @lang('ui.get_otp')
                        </button>
                    </div>
                    {{--model for otp verification start--}}
                    <div class="modal fade" id="otpModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <label for=""
                                                       class=""><h5>@lang('ui.enter_otp')</h5></label>
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
                </form>
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')
    <script>
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
    </script>
@endpush
