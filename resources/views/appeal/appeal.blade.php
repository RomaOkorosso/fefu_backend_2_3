@extends('layout.app')

<title>Обращение</title>

@section('content')

    @if (empty($errors))
        <div class="alert alert-success">Обращение отправленно</div>
    @endif
    <form action="{{ route('appeal') }}" method="POST">
        @csrf
        <div>
            <label for="name">Имя</label>
            <input
                class="@error('name') is-invalid @enderror"
                type="text"
                name="name"
                placeholder="Роман"
                value="{{ old('name') }}"
            />
            @error('name')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="surname">Фамилия</label>
            <input
                class="@error('surname') is-invalid @enderror"
                type="text"
                name="surname"
                placeholder="Затрутин"
                value="{{ old('surname') }}"
            />
            @error('surname')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="patronymic">Отчество</label>
            <input
                class="@error('patronymic') is-invalid @enderror"
                type="text"
                name="patronymic"
                placeholder="Сергеевич"
                value="{{ old('patronymic') }}"
            />
            @error('patronymic')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="phone">Телефон</label>
            <input
                class="@error('phone') is-invalid @enderror"
                type="text"
                name="phone"
                placeholder="+79876543210"
                value="{{ old('phone') }}"
            />
            @error('phone')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">Электронный адресс</label>
            <input
                class="@error('email') is-invalid @enderror"
                type="text"
                name="email"
                placeholder="example@mail.ru"
                value="{{ old('email') }}"
            />
            @error('email')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="age">Возраст</label>
            <input
                class="@error('age') is-invalid @enderror"
                type="text"
                name="age"
                placeholder="20"
                value="{{ old('age') }}"
            />
            @error('age')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="gender">Пол</label>
            <select name="gender">

                @foreach (array_keys($genders) as $gender)
                    <option value="{{ $gender }}" {{ old('gender') == $gender ? 'selected' : '' }}>
                        {{ $gender }}
                    </option>
                @endforeach
            </select>
            @error('gender')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="message">Сообщение</label>
            <textarea
                class="@error('message') is-invalid @enderror"
                type="text"
                name="message"
                placeholder="У меня проблема..."
                rows="6"
            >{{ old('message') }}</textarea>
            @error('message')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <input type="submit" value="Отправить"/>
    </form>

@endsection
