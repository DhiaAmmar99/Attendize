<section id="intro" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="organiser_logo">
                <div class="thumbnail">
                {!! Html::image('assets/images/Light-Logo.png') !!}
                </div>
            </div>
            <h1>{{$organiser->name}}</h1>
            @if($organiser->about)
            <div class="description pa10">
                {!! $organiser->about !!}
            </div>
            @endif
        </div>
    </div>
</section>
<style>
    .thumbnail img{
        width: 30%;
    }
</style>
