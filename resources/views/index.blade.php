@extends('layouts.app')

@section('main')
    <div class="row-container">
        <div class="article" style="background-image: url('{{ asset('images/dummy-article.jpg') }}')">
            <div class="article-bar">
                <p class="last-article-text">Całe rodziny polaków z nożami w plecach. Piotr Zychowicz: Wołyń skonał w osamotnieniu</p>
            </div>
        </div>

        <div class="statue" style="background-image: url('{{ asset('images/statuetka.jpg') }}')">
            <p class="statue-text">Konkurs na statuetkę "Sprawiedliwi wśród ukraińców został rozstrzygnięty.</p>
            <a href=""><button>Wesprzyj nas</button></a>
        </div>
    </div>
@endsection
