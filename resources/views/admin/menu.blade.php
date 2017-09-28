@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/adm/plugins/msgbox/jquery.msgbox.css" media="screen">
@endsection

@section('content')
    <div id="main-header" class="page-header">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>Мой блог
                <span class="divider">&raquo;</span>
            </li>
            <li>
                <a href="/admin/menu">Главное меню</a>
            </li>
        </ul>

        <h1 id="main-heading">
            Главное меню <span>Настройки сайта</span>
        </h1>
    </div>

    <div id="main-content">
        <div class="row-fluid" style="margin-bottom: 20px;">
            <div class="col-sm-12 pull-right"><a class="btn btn-primary" href="{{ route('admin.menu.add') }}">Добавить</a></div>
        </div>
        <div class="row-fluid">
            <div class="span12 widget">
                <div class="widget-header">
                    <span class="title">
                        <i class="icol-table"></i> Главное меню сайта
                    </span>
                </div>
                <div class="widget-content table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Путь</th>
                                <th>Заголовок</th>
                                <th>Сортировка</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menu as $item)
                            <tr class="menu-tr" data-item-id="{{ $item->id }}">
                                <td class="path">{{ $item->path }}</td>
                                <td class="title">{{ $item->title }}</td>
                                <td class="sort">{{ $item->sort }}</td>
                                <td>
                                    <a href="#" id="edit-menu" class="edit-item"><i class="icol-pencil"></i></a>&nbsp;
                                    <a href="{{ route('admin.menu.del') }}?id={{ $item->id }}" onclick="return confirm('Действительно удалить?');"><i class="icol-cross"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div style="display: none" id="save-form">
        <table>
            <tr>
                <td>Путь:</td>
                <td><input type='text' class='menu-save-path' />
                </td>
            </tr>
            <tr>
                <td>Название: </td>
                <td><input type='text' class='menu-save-title' /></td>
            </tr>
            <tr>
                <td>Сортировка: </td>
                <td><input type='number' class='menu-save-sort' /></td>
            </tr>
        </table>
    </div>
@endsection

@section('scripts')
    <script src="/adm/plugins/msgbox/jquery.msgbox.min.js"></script>
    <script src="{{ mix('/adm/js/menu.js') }}"></script>
@endsection