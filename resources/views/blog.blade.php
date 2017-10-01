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

    @foreach($articles as $article)
        <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-2">
                <h3><span class="label label-primary">{{ date('d.m.Y H:i', $article->create_time) }}</span></h3>
            </div>
            <div class="col-md-10">
                <div class="media">
                    <div class="media-left">
                        <img class="media-object my-photo" src="{{ $article->img }}" alt="">
                    </div>
                    <div class="media-body">
                        <h2 class="media-heading">{{ $article->title }}</h2>
                        <p style="margin-top: 20px;"><a type="button" class="btn btn-success" href="/blog/{{ $article->slug }}/{{ $article->id }}">Читать</a></p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $articles->links() }}
@endsection