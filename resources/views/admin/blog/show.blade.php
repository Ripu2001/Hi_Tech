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
                <span class="text-primary">Title:</span>
                <h4>{{$row->title}}</h4>
                <span class="text-primary">Description: </span>
                <p>
                    {{$row->description}}
                </p>
                <span class="text-primary">Image</span>

                <img class="w-100" src="{{asset($path.'/'.$row->image_path)}}" alt="" >
                <div>
                    <span class="text-primary">catetory :</span>
                    <span>{{$row->category->title}}</span>
                </div>
                <span class="text-primary">Status :</span>
                @if($row->status==1)
                    <a class="badge badge-success pill text-white">Active</a>
                @else
                    <a class="badge badge-danger pill text-white">Inactive</a>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>