@extends('layouts.main')

@section('content')
    <div class="row">
        <h1>Напишите мне:</h1>
        <form id="contactForm" class="form-horizontal" method="POST" action="{{ route('contact') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Ваше имя</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="inputName" placeholder="Ваше имя">
                </div>
            </div>
            <div class="form-group">
                <label for="inputBody" class="col-sm-2 control-label">Сообщение</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="5" name="body" id="inputBody" placeholder="Сообщение"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Отправить</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ mix('/js/contact.js') }}"></script>
@endsection