@extends('Shared.Layouts.Master')

@section('title')
    Programs
@stop

@section('page_title')
   <p> Programs</p>
@stop

@section('top_nav')
    @include('ManageOrganiser.Partials.TopNav')
@stop

@section('head')
    {!! Html::script('https://maps.googleapis.com/maps/api/js?libraries=places&key='.config("attendize.google_maps_geocoding_key")) !!}
    {!! Html::script('vendor/geocomplete/jquery.geocomplete.min.js')!!}
@stop

@section('menu')
    @include('ManageOrganiser.Partials.Sidebar')
@stop

@section('page_header')
    <div class="col-md-9">
        <div class="btn-toolbar">
            <div class="btn-group btn-group-responsive">
                <a href="#" data-modal-id="CreateProgram" data-href="{{route('showCreateProgram', ['organiser_id' => @$organiser->id])}}" class="btn btn-success loadModal"><i class="ico-plus"></i> create program</a>
            </div>
        </div>
    </div>
@stop

@section('content')



    <div class="row">
        @if($programs->count())
            @foreach($programs as $program)
                <div class="col-md-6 col-sm-6 col-xs-12">
                    @include('ManageOrganiser.Partials.ProgramPanel')
                   
                </div>
            @endforeach
        @endif
    </div>
@stop