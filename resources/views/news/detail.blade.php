@extends('layout.app')

<title>Просмотр новости</title>
@section("content")
    <body class="antialiased">

    <header class="popover-header"
            style="height: 6vh; background-color: #2e92ff">
        <a class="header-element card-header-tabs" style="padding-left: 8px"
           href="{{route('news_list')}}">Все новости</a>
    </header>

    <div style="padding: 8px">
        <h1>{{$item['title']}}</h1>
        <p>{{$item['published_at']}}</p>
        <p>{{$item['text']}}</p>
    </div>
    </body>

@endsection
