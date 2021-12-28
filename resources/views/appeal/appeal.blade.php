@extends('layout.app')

<title>Обращение</title>

@section('content')

    @if ($success ?? false)
        <div class="success-message">
            <p>Отзыв успешно отпраален</p>
        </div>
    @endif

    <form action="{{ route('appeal') }}" method="POST">
        @csrf
        <div>
            <label for="name">Имя</label>
            <input
                type="text"
                name="name"
                placeholder="Иван"
                value="{{ request()->isMethod('post') ? old('name') : '' }}"
                maxlength="20"
                size="20"
            />
        </div>
        <div>
            <label for="phone">Телефон</label>
            <input
                type="tel"
                name="phone"
                placeholder="+79991234567"
                value="{{ request()->isMethod('post') ? old('phone') : '' }}"
                maxlength="11"
                size="11"
            />
        </div>
        <div>
            <label for="email">Email</label>
            <input
                type="email"
                name="email"
                placeholder="example@gmail.com"
                value="{{ request()->isMethod('post') ? old('email') : '' }}"
                maxlength="100"
                size="30"
            />
        </div>
        <div>
            <label for="message">Сообщение</label>
            <textarea
                type="text"
                name="message"
                placeholder="Ваше обращение"
                maxlength="100" rows="6"
            >{{ request()->isMethod('post') ? old('message') : '' }}</textarea>
        </div>
        <input type="submit" value="Отправить"/>
    </form>


    @if ($errors)
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
