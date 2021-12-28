@extends('layout.app')
<head>
    <title>Новости</title>
</head>
@section("content")
    <h1 class="justify-center flex">Новости</h1>
    <div style="padding: 8px">
        @foreach($items as $item)
            <a href="{{route('news_item', ['slug' => $item->slug])}}">{{ $item['title'] }}</a>
            <br>
            <p class="dark:text-gray-200">{{$item->published_at}}</p>
            @if(isset($item->description))
                <p>{{$item->description}}</p>
            @endif
            <hr style="background: black; height:2px;"/>
        @endforeach
    </div>
    <div class="justify-center flex">
        {{ $items->links() }}
    </div>
@endsection
