@extends('layout.app')
<head>
    <title>Новости</title>
</head>
@section("content")

    <h1 class="justify-center flex">Новости</h1>
    <div style="padding: 8px">
        @foreach($items as $obj)
            <a href="{{route('news_item', ['slug' => $obj->slug])}}">{{ $obj["title"] }}</a>
            <br>
            <p class="text-grey-light">{{$obj->published_at}}</p>
            @if(isset($obj->description))
                <p>{{$obj->description}}</p>

            @endif
            <hr style="background: black; height:2px;"/>
        @endforeach
    </div>
    <div class="justify-center flex">
        {{ $items->links() }}
    </div>

@endsection
