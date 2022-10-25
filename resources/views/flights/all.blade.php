<h1>{{ __('Tous les vols') }} </h1>

@foreach ($allFlights as $flight)
    <x-flight :$flight />
@endforeach