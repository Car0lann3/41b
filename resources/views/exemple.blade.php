<button class="tata toto">

</button>


<x-button>
    testst
</x-button>

@foreach (['Chien', 'Chat'] as $item)
    <x-dynamic-component :component="$item" class="mt-4" />

    @if ($item == 'Chien')
        <x-chien />
    @else
        <x-chat />
    @endif
    
@endforeach


