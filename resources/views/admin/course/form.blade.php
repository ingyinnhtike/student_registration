@csrf
<div class="card-body">
    <h4 class="text-center text-black">Courses</h4>

    <div class="form-group col-md-4">
        <label for="year" class="text-black">သင်တန်းနှစ်</label>
        <select id="year" name="year_id" class="form-control">
{{--            <option selected disabled>သင်တန်းနှစ်ရွေးချယ်ရန်</option>--}}
            @foreach($years as $year)

                <option value="{{$year->id}}"
                    {{($course->year->id??'')==$year->id?'selected':''}}
                >{{$year->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-4">
        <label for="major" class="text-black">အဓိကဘာသာ</label>
        <select id="major" name="major_id" class="form-control">
{{--            <option selected disabled>အဓိကဘာသာရွေးချယ်ရန်</option>--}}
            @foreach($majors as $major)
                <option value="{{$major->id}}"
                    {{($course->major->id??'')==$major->id?'selected':''}}
                >{{$major->name}}</option>
            @endforeach
        </select>
    </div>

    <label for="name" class="text-black">သင်တန်းဖွင့်/ပိတ် </label>
    <input name="status" value="1" type="hidden">
    <input type="checkbox" name="status" value="0"
           {{($course->status??'0') == '0'?'checked':''}}
           data-on="ဖွင့်" data-off="ပိတ်"
           data-toggle="toggle" data-onstyle="info">
    <hr/>

    @if(isset($course))
        <h4>သင်တန်းကြေးများ</h4>
    @foreach($course->fees as $course_fee)
        <div class="row fee_add">
            <div class="form-group col-md-3">
                <span class="text-black">{{$course_fee->name}}</span>
            </div>

            <div class="form-group col-md-3">
                <span>{{$course_fee->pivot->amount}}</span>
            </div>
            <div class="col-md-2">
                <button class='btn btn-outline-primary confirm_edit'
                        data-amount="{{$course_fee->pivot->amount??''}}"
                        data-fee="{{$course_fee->name}}"
                        data-url="{{route('admin.course_fee.update',$course_fee->pivot->id)}}"
                        type="button"
                ><span class='fa fa-edit'/></button>
                <button class='btn btn-outline-danger confirm-delete'
                        data-url='{{route('admin.course_fee.destroy',$course_fee->pivot->id)}}'
                        data-message='{{$course_fee->name}} ကိုဖျက်ရန် သေချာပါသလား?'
                        data-reload="true"
                ><span class='fa fa-trash'/>
                </button>
            </div>
        </div>
    @endforeach

        <button class="btn btn-primary add_new_fee" type="button" data-course="{{$course->id}}">Add New Fee</button>
    @endif

</div>


<button class="btn btn-primary" type="submit">
    {{isset($is_edit)&&$is_edit?'Update':'Create'}}
</button>

@include('admin.partials.delete')

@push('scripts')
    <script>
        var constants = {
            fees: {!! $fees!!},
        };
        var routes = {
            addFeeUrl: '{{route('admin.course_fee.store')}}',
        };

        $(document).ready(function () {
            $('.add_new_fee').on('click', function (event) {
                let course = $(this).data('course');
                showAddFeeModel(course);
            });
            $('.confirm_edit').on('click', function (event) {
                let target = $(this);
                let fee = target.data('fee');
                let amount = target.data('amount');
                let url = target.data('url');

                showEditFeeModel(fee, amount, url);
            });
        });

        function showEditFeeModel(fee_name, amount, url) {
            Swal.fire({
                title: fee_name,
                input: 'number',
                inputValue: amount,
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) {
                        return 'တစ်ခုခုရေးရန်လိုအပ်ပါသည်။'
                    } else if (value <= 0) {
                        return 'သုညထက်ကြီးရန်လိုအပ်ပါသည်။'
                    }
                }
            }).then((result) => {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "put",
                    url: url,
                    data: {
                        'amount': result.value,
                    },
                    success: function (response) {
                        Swal.fire({
                            title: 'Success',
                            text: response.message,
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Reload'
                        }).then((result) => {
                            if (result.value) {
                                location.reload(true);
                            }
                        });
                    },
                    fail: function (response) {
                        Swal.fire(
                            'Error!',
                            "Error",
                            'error'
                        );
                    },
                    error: function (response) {
                        console.log(response);
                    }
                });

            })
        }


        function getAddingFeeModelBody() {

            var html = '<label for="fee" class="text-black">သင်တန်းကြေးအမျိုးအစား</label>' +
                '<select id="fee" class="swal2-input" name="fee">';

            constants.fees.forEach(function (fee) {

                html += '<option value="' +
                    fee.id +
                    '">' +
                    fee.name +
                    '</option>';
            });

            html += '</select>' +
                '<label for="amount" class="text-black">ငွေကျပ်ပမာဏ</label>' +
                '<input id="amount" type="number" class="form-control" min="0" name="amount" value="">';
            //    constants.addingFeeModelBody = html;


            return html;
        }


        function showAddFeeModel(id) {
            let html = getAddingFeeModelBody();

            Swal.fire({
                title: 'သင်တန်းကြေးထပ်ထည့်ရန်',
                html: html,
                focusConfirm: false,
                showCancelButton: true,
                preConfirm: () => {
                    return [
                        document.getElementById('fee').value,
                        document.getElementById('amount').value,
                    ]
                }
            }).then((result) => {
                if (result.value) {
                    let fee = $('#fee').val();
                    let amount = $('#amount').val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "post",
                        url: routes.addFeeUrl,
                        data: {
                            'course': id,
                            'fee': fee,
                            'amount': amount,
                        },
                        success: function (response) {
                            Swal.fire({
                                title: 'Success',
                                text: response.message,
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Reload'
                            }).then((result) => {
                                if (result.value) {
                                    location.reload(true);
                                }
                            });
                        },
                        fail: function (response) {
                            Swal.fire(
                                'Error!',
                                "Error",
                                'error'
                            );
                        },
                        error: function (response) {
                            console.log(response);
                        }
                    });
                }
            })

        }
    </script>
@endpush
