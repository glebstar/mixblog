<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $settings->title }} - Персональный блог @if(isset($page)) | {{$page->title}} @endif @if(isset($article)) | {{$article->title}} @endif</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="@if(isset($page)){{$page->description}} @endif" />
    <meta name="keywords" content="@if(isset($page)){{$page->keywords}} @endif" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('/css/style.css') }}">
</head>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">{{ $settings->title }}</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="@if(\Request::path() == '/') active @endif"><a href="/">Мой блог</a></li>
                    <!--
                    <li><a href="#about">Обо мне</a></li>
                    -->
                    @foreach($menu as $item)
                        <li class="@if(\Request::path() == $item->path) active @endif"><a href="/{{ $item->path }}">{{ $item->title }}</a></li>
                    @endforeach

                    <li class="@if(\Request::path() == 'contact') active @endif"><a href="{{ route('contact') }}">Написать мне</a></li>
                    @can('admin')
                        <li><a href="/admin">Админка</a></li>
                        <li><a href="/cms">CMS</a></li>
                        <li><a href="/laravel-filemanager">Файлы</a></li>
                    @endcan

                    <!--
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                    -->
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <div class="container theme-showcase" role="main">
        @yield('content')
        @yield('cmspagebody')
        <script type="text/javascript" src="https://vk.com/js/api/openapi.js?160"></script>

        <!-- VK Widget -->
        <div id="vk_community_messages"></div>
        <script type="text/javascript">
            VK.Widgets.CommunityMessages("vk_community_messages", 154584018, {expanded: "1",tooltipButtonText: "Есть вопрос?"});
        </script>

        <footer class="footer">
            <p>&copy; 2017 MixBlog</p>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    @yield('scripts')
</body>
</html>