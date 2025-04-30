@extends('layouts.main')



@section('content')
    <div class="post-category">
        <h1>Kategoria: {{ $category }}</h1>
    </div>

    <div class="articles">
        <div class="article">
            <h1>W Hucie Pieniackiej uczczono pamięć pomordowanych Polaków</h1>

            <img src="{{ asset('images/0007Y9Y0JUQ37RBA-C116-F4-300x217.jpg') }}" alt="article image">

            <p>W Hucie Pieniackiej w obwodzie lwowskim w niedzielę oddano hołd Polakom, pomordowanym w 1944 r. przez ukraińskich żołnierzy dywizji SS […]</p>

            <a href="">Czytaj dalej...</a>
        </div>

        <div class="article">
            <h1>W Hucie Pieniackiej uczczono pamięć pomordowanych Polaków</h1>

            <img src="{{ asset('images/0007Y9Y0JUQ37RBA-C116-F4-300x217.jpg') }}" alt="article image">

            <p>W Hucie Pieniackiej w obwodzie lwowskim w niedzielę oddano hołd Polakom, pomordowanym w 1944 r. przez ukraińskich żołnierzy dywizji SS […]</p>

            <a href="">Czytaj dalej...</a>
        </div>
    </div>
@endsection
