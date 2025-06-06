@extends('layouts.app')

@section('main')
    @if(!App\Models\User::first())
        <h1>ZAREJESTRUJ PIERWSZEGO ADMINISTRATORA PRZED DEPLOYEM STRONY!!! <a href="{{ route('register') }}">Odnośnik do rejestracji</a></h1>
    @endif

    <div class="row-container">
        @if($post)
        <div class="article" style="background-image: url('{{ asset('images/' . $post->path) }}'); background-size: auto 600px;">
            <a href="{{ route('post.show', ['post' => $post->id]) }}">
                <div class="article-bar">
                    <p class="last-article-text">{{ $post->title }}</p>
                </div>
            </a>
        </div>
        @else
        <div class="article" style="background: url('{{ asset('images/dummy-article.jpg') }}') bottom">
            <a href="#">
                <div class="article-bar">
                    <p class="last-article-text">TUTAJ BĘDZIE NAJNOWSZY ARTYKUŁ</p>
                </div>
            </a>
        </div>
        @endif

        <div class="statue" style="background-image: url('{{ asset('images/statuetka.jpg') }}'); background-position: bottom;">
            <p class="statue-text">Konkurs na statuetkę "Sprawiedliwi wśród ukraińców został rozstrzygnięty.</p>
            <a href="{{ route('konkurs') }}"><button class="button">Wesprzyj nas</button></a>
        </div>
    </div>

    <div class="row-container">
        <div class="bar">
            <p class="bar-text">Jeśli chcesz podzielić się z nami ciekawą historią pomocy Ukraińców - Polakom w czasie wojny , napisz do nas - chętnie Cię wysłuchamy!</p>
        </div>
    </div>

    <div class="row-container">
        <div class="graveyard" style="background-image: url('{{ asset('images/odznaczeniespr.jpg') }}">
            <div class="graveyard-col">
                <h1>Odznaczenie – Sprawiedliwi wśród Ukraińców</h1>
                <p>
                    Celem ufundowania powyższego odznaczenia jest uhonorowanie Ukraińców, którzy nieśli pomoc Polakom, narażając przy tym swoje życie.
                    W skład odznaczenia wchodzi dyplom honorowy, medal , statuetka.
                </p>
                <h1>Kto może otrzymać?</h1>
                <p>
                    Osoba uznana za Sprawiedliwego jest odznaczana specjalnie wybitym medalem noszącym napisem SPRAWIEDLIWY WSRÓD UKRAIŃCÓW, statuetka I dyplomem honorowym . Każda osoba, którą uznano za Sprawiedliwego wśród Ukraińców, jest uprawniona do otrzymania od fundacji stosownego certyfikatu.
                </p>
                <p>
                    Jeśli osoba ta nie żyje, jej krewny może wystąpić o przyznanie jej tytułu Sprawiedliwego Wśród Ukraińców
                </p>
            </div>

            <div class="graveyard-col">
                <p class="graveyard-text">
                    Historie Ukraińców ratujących Polaków, Rzez wołyńska czy tez uratowani Polacy na Wołyniu - to tematyka którą będziemy się tu niezależnie zajmować.
                </p>
                <p class="graveyard-text">
                    Tu będziemy zbierać informacje o eksterminacji polskiej ludności mieszkającej na kresach wschodnich przez ukraińskich nacjonalistów. Chcemy poznać ofiary, miejsca ich pochówku.
                </p>
                <p class="graveyard-text">
                    Nacjonaliści ukraińscy dokonali eksterminacji ludności polskiej zamieszkującej Kresy Wschodnie Rzeczypospolitej, które znalazły się pod okupacją sowiecką i niemiecką. Od pojedynczych napadów oraz rzezi na masową skalę. Zginęło tam, według różnych szacunków, ok. 100- 150 tys. osób. Trudno datować poszczególne masowe mogiły - nie mając dostępu do tych miejsc.
                </p>
                <p class="graveyard-text">
                    Opowiemy historie Ukraińców ratujących Polaków, pokażemy pomniki ludobójstwa OUN-UPA na podkarpaciu, przedstawimy zachowane relacje. Przedstawimy i opiszemy zbrodniarzy ukraińskich.
                </p>
            </div>
        </div>
    </div>

    <div class="row-container">
        <div class="help" style="background-image: url('{{ asset('images/help.jpg') }}')">
            <div class="help-col">
                <h1>Pomóż odnaleźć ludzi, którzy pomogli</h1>
            </div>

            <div class="help-col">
                <p>Wesprzyj nas i pomóż nam okazać wdzięczność tym, którzy kiedyś wyciągneli pomocną dłoń. Jeśli masz jakieś informacje, mogące okazać się przydatne, koniecznie skontaktuj się z nami!</p>
            </div>
        </div>
    </div>

    <div class="row-container">
        <div class="words">
            <h1>Kilka słów...</h1>
            <h2>Pro publico bono inaczej pro bono (łac.)- dla dobra publicznego, dla dobra ogółu.</h2>
            <p>• Dzieje obu narodów - polskiego i ukraińskiego - pełne są dramatycznych wydarzeń. Powinny być przestrogą dla potomnych</p>
            <p>• Idealnie by było, gdyby mówienie o tragicznych wydarzeniach sprzed lat nie wpływało na kształt bieżących relacji międzyludzkich</p>
            <p>• Teza, jakoby stanem wojny można wytłumaczyć wszystkie okrucieństwa na ludności cywilnej – jest błędna. To było ludobójstwo i tak powinno być traktowane</p>
        </div>
    </div>

    <div class="row-container">
        <div id="index-literatura">
            @foreach ($literatura as $post)
                <div class="index-literatura-item">
                    <a href="{{ route('post.show', ['post' => $post]) }}">
                        @if(!is_null($post->path))
                            <img id="panel-post-img" src="{{ asset('images/' . $post->path) }}" alt="image">
                        @else
                            <img id="panel-post-img" src="https://placehold.co/350x200" alt="article image">
                        @endif

                        <h2>{{ $post->title }}</h2>

                        @if(strlen($post->content) > 200)
                            <p>{{ strip_tags(Str::limit($post->content, 200)) }}[...]</p>
                        @else
                            <p>{{ strip_tags($post->content) }}</p>
                        @endif
                    </a>
                </div>
            @endforeach

            <div>
                <a href="{{ route('publicystyka.kategoria', ['category' => 'literatura']) }}"><button class="button">Zobacz więcej</button></a>
            </div>
        </div>
    </div>
@endsection
