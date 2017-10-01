@extends('layouts.admin.main')

@section('content')
    <div id="main-header" class="page-header">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>Мой блог
                <span class="divider">&raquo;</span>
            </li>
            <li>
                <a href="/admin/blog">Блог - все записи</a>
            </li>
        </ul>

        <h1 id="main-heading">
            Блог <span>Все записи</span>
        </h1>
    </div>

    <div id="main-content">
        <div class="row-fluid" style="margin-bottom: 20px;">
            <div class="col-sm-12 pull-right"><a class="btn btn-primary" href="{{ route('admin.blog.add') }}">Добавить запись</a></div>
        </div>

        <div class="row-fluid">
            <div class="span12 widget">
                <div class="widget-header">
                    <span class="title">
                        <i class="icol-page-copy"></i> Блог - все записи
                    </span>
                </div>
                <div class="widget-content table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Дата</th>
                                <th>Название</th>
                                <th>Картинка</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $article)
                            <tr>
                                <td>{{ date('d.m.Y H:i', $article->create_time) }}</td>
                                <td>{{ $article->title }}</td>
                                <td><img src="{{ $article->img }}" style="width: 50px;" /></td>
                                <td>
                                    <a href="/blog/{{ $article->slug }}/{{ $article->id }}"><i class="icol-eye"></i></a>&nbsp;
                                    <a href="{{ route('admin.blog.edit') }}?id={{ $article->id }}"><i class="icol-pencil"></i></a>&nbsp;
                                    <a href="{{ route('admin.blog.del') }}?id={{ $article->id }}" onclick="return confirm('Действительно удалить?');"><i class="icol-cross"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('admin.paginate', ['paginator' => $articles])
        </div>
    </div>
@endsection