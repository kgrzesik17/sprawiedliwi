@extends('layouts.main')

@section('content')
    <h1>Logowanie</h1>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="auth-form">
            <label for="name">Login:</label >
            <input type="text" name="name" required value="{{ old('login') }}">
        </div>

        <div class="auth-form">
            <label for="password">Hasło:</label>
            <input type="password" name="password" required>
        </div>

        <div id="auth-button-container">
            <button type="submit" class="button">Zaloguj</button>
        </div>

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>
@endsection
