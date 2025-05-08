@extends('layouts.main')

<script src="https://cdn.ckeditor.com/ckeditor5/45.0.0/ckeditor5.umd.js"></script>

@section('content')
    <div id="edit-container">
        <h2><a href="{{ route('panel') }}">←Powrót do panelu</a></h2>
        <h1>Nowy post</h1>
    </div>


    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <input id="edit-title" name="title" type="text" placeholder="Tytuł artykułu">

            <select name="category_id" id="category_id">
                {{-- <option value="{{ $post->category->id }}">{{ $post->category->category_name }}</option> --}}

                @foreach(App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div id="edit-content-container">
            <textarea name="content" id="edit-content" cols="60" rows="20"></textarea>
        </div>

        <div id="input-file-container">
            <input type="file" name="input_file" id="input_file">
        </div>

        <div>
            <input type="submit" class="button" value="Dodaj">
        </form>
        </div>

        <script>
            const {
                ClassicEditor,
                Essentials,
                Bold,
                Italic,
                Font,
                Paragraph,
                List,
                ListProperties
            } = CKEDITOR;

            ClassicEditor
                .create( document.querySelector( '#edit-content' ), {
                    licenseKey: '<ENTER YOUR LICENSE KEY>',
                    plugins: [ Essentials, Bold, Italic, Font, Paragraph, List, ListProperties ],
                    toolbar: [
                        'undo', 'redo', '|', 'bold', 'italic', '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                        'bulletedList', 'numberedList'
                    ]
                } )
                .then( /* ... */ )
                .catch( /* ... */ );
        </script>

@endsection
