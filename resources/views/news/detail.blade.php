@extends('layout.app')

<title>Просмотр новости</title>
@section("content")

    <div style="padding: 8px">
        <h1>{{$item['title']}}</h1>
        <p>{{$item->published_at}}</p>
        <p>{{$item->text}}</p>
    </div>

@endsection
