<x-layout>

    {{-- équivalent à @yield('title') --}}
    <x-slot:title>
        Contact du component    
    </x-slot>

    
    <h1>
        {{ __('Contact') }}
    </h1>

    {{-- @include('form'): copy paste --}}

    {{-- new ContactForm($message) --}}

    <x-contact-form :message="$message">
        <h4>Le contenu de la variable $slot</h4>
    </x-contact-form>
</x-layout>
