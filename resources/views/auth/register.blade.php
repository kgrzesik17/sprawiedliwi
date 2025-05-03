@extends('layouts.main')

@section('content')
    <div id="edit-container">
        <h2><a href="{{ route('panel') }}">←Powrót do panelu</a></h2>
        <h1>Rejestracja</h1>
    </div>

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="auth-form">
            <label for="name">Login:</label >
            <input type="text" name="name" required value="{{ old('login') }}">
        </div>

        <div class="auth-form">
            <label for="password">Hasło:</label>
            <input type="password" name="password" required>
        </div>

        <div class="auth-form">
            <label for="password_confirmation">Potwierdź hasło:</label>
            <input type="password" name="password_confirmation" required>
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
