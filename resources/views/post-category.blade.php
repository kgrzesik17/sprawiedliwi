@extends('layouts.main')

@section('content')
    <div class="post-category">
        <h1>Kategoria:
            {{-- <select class="select-category" name="category" id="category">
                <option value="{{ $category }}"><a href="ee">{{ $category = 'Publicystyka' ? 'Wszystko ▼' : $category }}</a></option>
            </select> --}}

        <span class="dropdown">
        <button class="button" id="select-category">{{ $category == 'Publicystyka' ? 'Wszystko' : Str::title($category) }} ▼</button>
        <span class="dropdown-content">
            <a href="{{ route('publicystyka') }}">
            <div>
                Wszystko
            </div>
            </a>

            @foreach(App\Models\Category::all() as $category)
                <a href="{{ route('publicystyka.kategoria', ['category' => $category->category_name]) }}">
                <div>
                    {{ Str::title($category->category_name) }}
                </div>
                </a>
            @endforeach
        </span>
        </h1>
        </span>
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

{{-- <script>
    document.getElementById("select-category"),addEventListener("click", dropdown);

    function dropdown() {
        alert('works');
    }
</script> --}}
