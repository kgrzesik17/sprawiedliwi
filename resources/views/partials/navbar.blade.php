<nav>
    <div class="navbar-container">
        <ul>
            <a href="{{ route('index') }}"><li>
                <span class="navbar-text">STRONA GŁÓWNA</span>
            </li></a>

            <a href="{{ route('about-us') }}"><li>
                <span class="navbar-text">O SPRAWIEDLIWYCH</span>
            </li></a>

            <a href="{{ route('about-project') }}"><li class=>
                <span class="navbar-text">O PROJEKCIE</span>
            </li></a>

            <a href="{{ route('publicystyka.kategoria', ['category' => 'miejsca pamięci']) }}"><li>
                <span class="navbar-text">MIEJSCA PAMIĘCI</span>
            </li></a>

            <a href="{{ route('publicystyka') }}"><li>
                <span class="navbar-text">PUBLICYSTYKA</span>
            </li></a>

            <a href="{{ route('patronaty') }}"><li>
                <span class="navbar-text">PATRONATY</span>
            </li></a>

            <a href="{{ route('partners') }}"><li>
                <span class="navbar-text">PARTNERZY</span>
            </li></a>

            <a href="{{ route('contact') }}"><li>
                <span class="navbar-text">KONTAKT</span>
            </li></a>



            @if(auth()->check())
                <a href="{{ route('panel') }}"><li>
                    <span class="navbar-text">PANEL</span>
                </li></a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <li>
                        <input id="navbar-logout" type="submit" class="button button-delete" value="LOGOUT">
                    </li>
                </form>
            @endif

        </ul>
    </div>
</nav>
