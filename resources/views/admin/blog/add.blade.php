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
            <li>
                <a href="/admin/blog/add">Добавить запись</a>
            </li>
        </ul>

        <h1 id="main-heading">
            Блог <span>Добавить запись</span>
        </h1>
    </div>

    <div id="main-content">
        <div class="row-fluid">
            <div class="span12 widget">
                <div class="widget-header">
                    <span class="title"><i class="icon-penci"></i> Новая запись блога</span>
                </div>
                <div class="widget-content form-container">
                    <form class="form-horizontal" id="addForm" method="POST" action="{{ route('admin.blog.add') }}">
                        {{ csrf_field() }}
                        <div class="control-group">
                            <label class="control-label" for="inputTitle">Название</label>
                            <div class="controls">
                                <input type="text" class="span12" id="inputTitle" name="title" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputImg">Картинка</label>
                            <div class="controls">
                                <input type="text" class="span12" id="inputImg" name="img" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputBody">Текст</label>
                            <div class="controls">
                                <textarea class="span12" id="inputBody" name="body" rows="3"></textarea>
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

@section('scripts')
    <script src="/simplecms/ckeditor/ckeditor.js"></script>
    <script src="{{ mix('/adm/js/blog/add.js') }}"></script>
@endsection