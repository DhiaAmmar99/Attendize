<div class="panel panel-success event">
    <div class="panel-heading" data-style="background-color: red; background-size: cover;">
        {{-- <div class="event-date">
            <img src="{{$abstract->image}} " alt="" class="img">
        </div> --}}
        <ul class="event-meta">
            <li class="event-title">
                <h4>
                    {{{ Str::limit($abstract->title , $limit = 75, $end = '...') }}}
                </h4>
            </li>

        </ul>

    </div>

    {{-- <div class="panel-body">
        <ul class="nav nav-section nav-justified mt5 mb5">
            <li>
                <div class="section">
                    <h4 class="nm">
                        {{$abstract->couleur}} 
                    </h4>
                    <p class="nm text-muted">Color</p>
                </div>
            </li>

           
        </ul>
    </div> --}}
    <div class="panel-footer">
        <ul class="nav nav-section nav-justified">
            <li>
                <a href="" data-modal-id="update" data-href="{{route('showUpdateAbstract', ['organiser_id' => @$organiser->id, 'id_abstract' => $abstract->id  ])}}" class="loadModal" id="{{$abstract->id}}"><i class="ico-edit"></i> @lang("basic.edit")</a>
            </li>
            <li>
                <a  data-modal-id="removeAbstract"  id="{{$abstract->id}}" onclick="popupRMV({{$abstract->id}})"><i class="ico-remove"></i> Remove</a>
            </li>
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
                    url: window.location.origin+"/removeAbstract",
                    data: {"id": id},
                });

                swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
                buttons: false,
                });
                setTimeout(function(){ location.reload(); }, 1000);

            } 
            });
    }
</script>
<style>
    .img{
        width: 80%;
    }
    .event .event-meta {

        margin-left: 100px !important;
    
    }
    .event .event-date {

        width: 80px !important;
        
    }
</style>
