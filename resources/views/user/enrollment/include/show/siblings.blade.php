<div class="col-md-4">
    <div class="card card-nav-tabs">
        <div class="card-header card-header-custom">
            <h4 class="card-title">Siblings Information</h4>
        </div>
        @foreach($siblings as $sibling)
            <div class="card-body detail-page">
                @if($sibling->name)
                    <h5>Name <span>:</span> {{$sibling->name}}</h5>
                    <h5>Nrc <span>:</span> {{$sibling->nrc}}</h5>
                    <h5>Issued at <span>:</span> {{$sibling->nrc_issued_at}}</h5>
                    <h5>Work <span>:</span> {{$sibling->work}}</h5>
                    <h5>Address <span>:</span> {{$sibling->address}}</h5>

                    <div class="progress progress-line-info">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100"
                             aria-valuemin="0"
                             aria-valuemax="100" style="width: 100%;">
                            <span class="sr-only">100% Complete</span>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
