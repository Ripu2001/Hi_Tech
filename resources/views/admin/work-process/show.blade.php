<!-- Show modal content -->
<div id="showModal-{{$key}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    {{$title}}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h4> <span class="text-primary">Name:</span> {{$row->title}}</h4>
                @if (isset($row->description))
                    <h5><span class="text-primary">Description: </span>{{$row->description}}</h5>
                @endif
                <span class="text-primary d-block mt-3">Status :
                @if($row->status==1)
                    <a class="badge badge-success pill text-white">Active</a>
                @else
                    <a class="badge badge-danger pill text-white">Inactive</a>
                @endif
                </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>