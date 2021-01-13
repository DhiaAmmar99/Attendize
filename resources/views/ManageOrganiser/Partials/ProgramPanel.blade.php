<div class="panel panel-success event">
    <div class="panel-heading" data-style="background-color: red; background-size: cover;">
        {{-- <div class="event-date">
            <div class="month">
                 {{strtoupper(explode("|", trans("basic.months_short"))[$program->start_date->format('n')])}} 
            </div>
            <div class="day">
                 {{$program->start_date->format('d')}} 
            </div>
        </div> --}}
        <ul class="event-meta">
            <li class="event-title">
                <h4>
                {{-- <h4 title="{{{$program->title}}}" href="{{route('showEventDashboard', ['event_id'=>$program->id])}}"> --}}
                    {{{ Str::limit($program->day, $limit = 75, $end = '...') }}}
                </h4>
            </li>
            {{-- <li class="event-organiser">
                By <a href='{{route('showOrganiserDashboard', ['organiser_id' => $program->organiser->id])}}'>{{{$program->organiser->name}}}</a>
            </li> --}}
        </ul>

    </div>

    <div class="panel-body">
        <ul class="nav nav-section nav-justified mt5 mb5">
            <li>
                <div class="section">
                    <h4 class="nm">
                        {{$program->date}} 
                    </h4>
                    <p class="nm text-muted">Date of program</p>
                </div>
            </li>
           
             {{-- <li>
                <div class="section">
                    <h4 class="nm">
                        {{$program->end_date}} 
                    </h4>
                    <p class="nm text-muted">End date</p>
                </div>
            </li>  --}}
        </ul>
    </div>
    <div class="panel-footer">
        <ul class="nav nav-section nav-justified">
            <li>
                <a href="" data-modal-id="updateProgram" data-href="{{route('showUpdateProgram', ['organiser_id' => @$organiser->id, 'prog_id' => $program->id  ])}}" class="loadModal" id="{{$program->id}}"><i class="ico-edit"></i> @lang("basic.edit")</a>
            </li>
            <li>
                {{-- <a href="" data-modal-id="removeProgram" data-href="{{route('removeProgram', ['id' => $program->id  ])}}"  id="{{$program->id}}"><i class="ico-remove"></i> Remove</a> --}}
                <a  data-modal-id="removeProgram"  id="{{$program->id}}" onclick="popupRMV({{$program->id}})"><i class="ico-remove"></i> Remove</a>
            </li>

             {{-- <li>
                <a href="{{route('showEventDashboard', ['event_id' => $program->id])}}">
                    <i class="ico-cog"></i> @lang("basic.manage")
                </a>
            </li>  --}}
        </ul>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function popupRMV(id){
       
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                jQuery.ajax({
                    type: "get",
                    url: window.location.origin+"/removeProgram",
                    data: {"id": id},
                });
                // jQuery(`#${id}`).remove();

                

                swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
                buttons: false,
                });
                location.reload();

            } 
            });
    }
</script>
