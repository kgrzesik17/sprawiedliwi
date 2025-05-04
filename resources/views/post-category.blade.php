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
        @foreach($posts as $post)
            <div class="article">
                <a href="{{ route('post.show', ['post' => $post]) }}"><h1>{{ $post->title }}</h1></a>

                @if(!is_null($post->path))
                        <img id="panel-post-img" src="{{ asset('images/' . $post->path) }}" alt="image">
                    @else
                        <img id="panel-post-img" src="https://placehold.co/350x200" alt="article image">
                    @endif

                @if(strlen($post->content) > 200)
                    <p>{{ strip_tags(Str::limit($post->content, 200)) }}[...]</p>
                    <a href="{{ route('post.show', ['post' => $post]) }}">Czytaj dalej...</a>
                @else
                    <p>{{ strip_tags($post->content) }}</p>
                    <a href="{{ route('post.show', ['post' => $post]) }}">Czytaj artykuł...</a>
                @endif
            </div>
        @endforeach
    </div>
@endsection

{{-- <script>
    document.getElementById("select-category"),addEventListener("click", dropdown);

    function dropdown() {
        alert('works');
    }
</script> --}}
