
<h2>Formulaire de contact</h2>
<form method="POST" {{ $attributes }}>
    {{-- Include le champs caché pour la protection CSRF --}}
    @csrf

    {{-- On test si la variable message est définie ou pas --}}
    @if (empty($message))
        {{-- Pas de variable, on affiche le formulaire --}}
        <textarea name="message"></textarea>

        <button>
            {{ __('site.Soumettre') }}
        </button>
    @else
        {{-- La variable existe, on affiche le contenu --}}
        <p>
            {{ $message }}
        </p>
    @endif

    {{ $slot }}
</form>
