@php
    use App\Models\Post;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($html_title) ? $html_title . ' - ' : '' }}Sprawiedliwi wśród Ukraińców</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('partials.top')
    @include('partials.navbar')
    @include('partials.sm')

    <div class="main">
        <div class="post-view container">
            <div class="post-left">
                <h1 class="title">
                    @yield('title')
                </h1>

                <p class="content">
                    @yield('content')
                </p>
            </div>

            <div class="post-right">
                <div class="search">
                    <form action="#" method="POST">
                        @csrf
                        <div>
                            <input type="text" id="edit-title" placeholder="Szukaj">
                        </div>

                        <div>
                            <button class="button" type="submit">Szukaj...</button>
                        </div>
                    </form>
                </div>

                <div class="latest">
                    <h1>Ostatnie wpisy</h1>

                    <ul>
                        @foreach(Post::orderBy('id', 'desc')->take(4)->get() as $post)
                            <a href="{{ route('post.show', ['post' => $post]) }}"><li>{{ $post->title }}</li></a>
                        @endforeach
                    </ul>


                </div>

                <div class="contact">
                    <h1>Kontakt</h1>

                    <p><strong>Fundacja Pro Publico Bono RP </strong></p>
                    <p><strong>Tel.: </strong>603 557 777</p>
                    <p><strong>Adres: </strong>Ul. J.H. Dąbrowskiego 75/70, 60-523 Poznań</p>
                    <p><strong>Numer KRS: </strong>0000661466</p>
                    <p><strong>NIP: </strong>7811941237</p>
                    <p><strong>Region: </strong>36649664100000</p>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
</body>
</html>
