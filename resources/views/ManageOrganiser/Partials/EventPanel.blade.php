<div class="panel panel-success event">
    <div class="panel-heading" data-style="background-color: {{{$event->bg_color}}};background-image: url({{{$event->bg_image_url}}}); background-size: cover;">
        <div class="event-date">
            <div class="month">
                {{strtoupper(explode("|", trans("basic.months_short"))[$event->start_date->format('n')])}}
            </div>
            <div class="day">
                {{$event->start_date->format('d')}}
            </div>
        </div>
        <ul class="event-meta">
            <li class="event-title">
                <h4 title="{{{$event->title}}}" href="{{route('showEventDashboard', ['event_id'=>$event->id])}}">
                    {{{ Str::limit($event->title, $limit = 75, $end = '...') }}}
                </h4>
            </li>
            {{-- <li class="event-organiser">
                By <a href='{{route('showOrganiserDashboard', ['organiser_id' => $event->organiser->id])}}'>{{{$event->organiser->name}}}</a>
            </li> --}}
        </ul>

    </div>

    <div class="panel-body">
        <ul class="nav nav-section nav-justified mt5 mb5">
            <li>
                <div class="section">
                    <h4 class="nm">
                        {{ $event->tickets->sum('quantity_sold') }}
                    </h4>
                    <p class="nm text-muted">@lang("Attendees")</p>
                </div>
            </li>
           
            {{-- <li>
                <div class="section">
                    <h4 class="nm">{{ $event->getEventRevenueAmount()->display() }}</h4>
                    <p class="nm text-muted">@lang("Event.revenue")</p>
                </div>
            </li> --}}
        </ul>
    </div>
    <div class="panel-footer">
        <ul class="nav nav-section nav-justified">
            <li>
                <a   data-modal-id="updateEvent" data-href="{{route('updateEvent', ['organiser_id' => @$organiser->id, 'event_id' => $event->id])}}" class="loadModal" ><i class="ico-edit"></i> @lang("basic.edit")</a>

            </li>
            <li>
                <a data-modal-id="removeSession"  class="rmv"  id="{{$event->id}}" onclick="popup({{$event->id}})"><i class="ico-remove"></i> Remove</a>
            </li>
        </ul>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function popup(id){
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
                    type: "post",
                    url: window.location.origin+"/removeSession",
                    data: {"id": id},
                });
                // jQuery(`#${id}`).remove();
                

                swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
                buttons: false,
                });
                setTimeout(function(){ location.reload(); }, 1000);
            } 
            });
    }
</script>
