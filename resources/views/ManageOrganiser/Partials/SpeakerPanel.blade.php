<div class="panel panel-success event">
    <div class="panel-heading" data-style="background-color: red; background-size: cover;">
        <div class="event-date">
            {{-- <div class="month">
                 {{strtoupper(explode("|", trans("basic.months_short"))[$program->start_date->format('n')])}} 
            </div>
            <div class="day">
                 {{$program->start_date->format('d')}} 
            </div> --}}
            
            <img src="{{$speaker->image}} " alt="" class="img">
        </div>
        <ul class="event-meta">
            <li class="event-title">
                <h4>
                {{-- <h4 title="{{{$program->title}}}" href="{{route('showEventDashboard', ['event_id'=>$program->id])}}"> --}}
                    {{{ Str::limit($speaker->firstname." ".$speaker->lastname , $limit = 75, $end = '...') }}}
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
                        {{$speaker->email}} 
                    </h4>
                    <p class="nm text-muted">Email</p>
                </div>
            </li>
            <li>
                <div class="section">
                    <h4 class="nm">
                        {{$speaker->organization}} 
                    </h4>
                    <p class="nm text-muted">Organization</p>
                </div>
            </li>
           
             {{-- <li>
                <div class="section">
                    <h4 class="nm">
                        {{$speaker->country}} 
                    </h4>
                    <p class="nm text-muted">country</p>
                </div>
            </li>  --}}
        </ul>
    </div>
    <div class="panel-footer">
        <ul class="nav nav-section nav-justified">
            <li>
                <a href="" data-modal-id="update" data-href="{{route('showUpdateSpeaker', ['organiser_id' => @$organiser->id, 'speaker_id' => $speaker->id  ])}}" class="loadModal" id="{{$speaker->id}}"><i class="ico-edit"></i> @lang("basic.edit")</a>
            </li>
            <li>
                <a  data-modal-id="removeProgram"  id="{{$speaker->id}}" onclick="popupRMV({{$speaker->id}})"><i class="ico-remove"></i> Remove</a>
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
                    url: window.location.origin+"/removeSpeaker",
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
<style>
    .img{
        width: 80%;
    }
</style>
