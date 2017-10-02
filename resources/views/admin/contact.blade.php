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
                <a href="/contact">Сообщения</a>
            </li>
        </ul>

        <h1 id="main-heading">
            Сообщения <span>Все сообщения</span>
        </h1>
    </div>

    <div id="main-content">
        <div class="row-fluid">
            <div class="span12 widget">
                <div class="widget-header">
                    <span class="title">
                        <i class="icol-comment"></i> Все сообщения
                    </span>
                </div>
                <div class="widget-content table-container">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Автор</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td>{{ date('d.m.Y H:i', $message->create_time) }}</td>
                                <td>{{ $message->name }}</td>
                                <td>
                                    <a href="#" data-message="{{ $message->body }}" class="open-mess"><i class="icol-eye"></i></a>&nbsp;
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('admin.paginate', ['paginator' => $messages])
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/adm/plugins/msgbox/jquery.msgbox.min.js"></script>
    <script src="{{ mix('/adm/js/contact.js') }}"></script>
@endsection