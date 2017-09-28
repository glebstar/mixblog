@extends('layouts.admin.main')

@section('content')
    <div id="main-header" class="page-header">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>Мой блог
                <span class="divider">&raquo;</span>
            </li>
            <li>
                <a href="/admin">Главная</a>
            </li>
        </ul>

        <h1 id="main-heading">
            Главная <span>Основные настройки</span>
        </h1>
    </div>

    <div id="main-content">
        <div class="row-fluid">
            <div class="span12 widget">
                <div class="widget-header">
                    <span class="title"><i class="icon-resize-horizontal"></i> Настройки главной страницы сафта</span>
                </div>
                <div class="widget-content form-container">
                    <form class="form-horizontal" method="post" action="{{route('admin.index')}}">
                        {{ csrf_field() }}
                        <div class="control-group">
                            <label class="control-label" for="input01">Название сайта</label>
                            <div class="controls">
                                <input type="text" class="span12" id="input01" name="title" value="{{ $settings->title }}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="input01">Url изображения</label>
                            <div class="controls">
                                <input type="text" class="span12" id="input01" name="img" value="{{ $settings->img }}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="input01">Приветствие</label>
                            <div class="controls">
                                <input type="text" class="span12" id="input01" name="head" value="{{ $settings->head }}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="input05">Текст</label>
                            <div class="controls">
                                <textarea class="span12" id="input05" name="body" rows="4">{{ $settings->body }}</textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection