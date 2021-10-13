@push('scripts')
    <script>

        $(document).on('click', '.confirm-delete', function (event) {
            event.preventDefault();
            confirmDelete(this);
        });


        function confirmDelete(element) {

            var element = $(element);
            var url = element.data('url');
            var confirm_message = element.data('message');
            var isRequiredReload = element.data('reload') === true;
            console.log(url);
            Swal.fire({
                title: 'ဖျက်ရန်သေချာပါသလား?',
                text: confirm_message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'ဖျက်မည်',
                cancelButtonText: 'မဖျက်ပါနှင့်',
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "delete",
                        url: url,
                        success: function (response) {
                            $('.buttons-reload').click();
                            Swal.fire({
                                title: 'Deleted!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.value) {
                                    if (isRequiredReload) {
                                        location.reload(true);
                                    }
                                }
                            });
                        },
                        fail: function (response) {
                            console.log('fail');
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
