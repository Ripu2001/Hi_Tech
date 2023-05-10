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
                <h4> <span class="text-primary">Name:</span> {{$row->name}}</h4>
                <span class="text-primary">Image</span>

                <img class="w-100" src="{{asset($path.'/'.$row->image_path)}}" alt="" >

                <span class="text-primary d-block mt-3">Status :
                @if($row->status==1)
                    <a class="badge badge-success pill text-white">Active</a>
                @else
                    <a class="badge badge-danger pill text-white">Inactive</a>
                @endif
                </span>
                <div class="text-primary team-social-text mb-3">Social Media :</div>
                <ul class="team-social">
                    <li>
                        <a href="{{$row->facebook}}">
                            <i class="fe-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{$row->twitter}}">
                            <i class="fe-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{$row->instagram}}">
                            <i class="fe-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{$row->linkedin}}">
                            <i class="fe-linkedin"></i>
                        </a>
                    </li>
                </ul>
                <h6><span class="text-primary">Phone : </span>{{$row->phone}}</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>