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
    <div class="row">
        <div id="disqus_thread"></div>
        <script>

            /**
             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

            var disqus_config = function () {
            this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = 'blog-{{ $article->id }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };

            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://mix-edelen-ru.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    </div>
@endsection