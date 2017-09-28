@extends('layouts.main')

@section('content')
    <div class="jumbotron">
        <div class="media">
            <div class="media-left">
                <img class="media-object my-photo" src="{{ $settings->img }}" alt="Моё фото">
            </div>
            <div class="media-body">
                <h2 class="media-heading">{{ $settings->head }}</h2>
                <p>{!! nl2br($settings->body) !!}</p>
            </div>
        </div>
    </div>
@endsection