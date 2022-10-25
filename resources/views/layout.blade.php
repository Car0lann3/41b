<html lang="{{ app()->getLocale() }}">
    <head>
        <title>@yield('title') - Exercice 1</title>
    </head>
    <body>
        <nav>
            {{-- app()->getLocale() === config('app.locale') --}}
            <a href="/{{ app()->getLocale() }}/accueil">{{ __('site.Accueil') }}</a>
            <a href="/{{ app()->getLocale() }}/a-propos">{{ __('site.À propos') }}</a>
            <a href="/{{ app()->getLocale() }}/equipe">{{ __('site.Équipe') }}</a>
            <a href="/{{ app()->getLocale() }}/contact">{{ __('site.Contact') }}</a>

            @if (app()->getLocale() == 'fr')
                <a href="/en/accueil">EN</a>
            @endif
            @if (app()->getLocale() == 'en')
                <a href="/fr/accueil">FR</a>
            @endif
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>