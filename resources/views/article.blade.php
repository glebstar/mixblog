@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="media">
            <div class="media-left">
                <img class="media-object my-photo" src="{{ $article->img }}" alt="">
            </div>
            <div class="media-body">
                <h1 class="media-heading">{{ $article->title }}</h1>
                <p style="margin-top: 20px;"><span class="label label-primary">{{ date('d.m.Y H:i', $article->create_time) }}</span></p>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 20px; margin-bottom: 30px;">
        {!! $article->body !!}
        <hr />
        <a class="btn btn-success" href="/">На главную</a>
        @can('admin')
            <a class="btn btn-success" href="/admin/blog/edit?id={{ $article->id }}">Редактировать</a>
        @endcan
    </div>
@endsection