<!-- Modal -->
<div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{$url}}" method="POST">
                <div class="modal-body">
                    <span id="confirm_message"></span>
                </div>
                <div class="form-group col-md-12">
                    <input class="form-control" type="text" name="approved_message" id="approved_message"
                           placeholder="Remark.....">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    @csrf
                    <input type="hidden" name="id" id="confirm_id">
                    <input type="hidden" name="status" id="confirm_status">
                    <button type="submit" class="btn btn-primary btn-blue">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function confirmAccept(element) {
            var id = $(element).data('id');
            var message = $(element).data('message');
            $('#confirm_message').html('Are you sure to <strong>approve</strong> this request?' + message);
            $('#confirm_status').val(1);
            $('#confirm_id').val(id);
            $('#myModal').modal().show();
        }

        function confirmReject(element) {
            var id = $(element).data('id');
            var message = $(element).data('message');
            $('#confirm_message').html('Are you sure to <strong>REJECT</strong> this request?' + message);
            $('#confirm_status').val(2);
            $('#confirm_id').val(id);
            $('#myModal').modal().show();
        }
    </script>
@endpush
