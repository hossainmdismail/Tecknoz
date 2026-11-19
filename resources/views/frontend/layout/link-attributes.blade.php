@if (\Illuminate\Support\Facades\Route::has($name))
    href="{{ route($name, $parameters ?? []) }}"
@elseif (isset($homeSection))
    href="{{ route('home') }}#{{ $homeSection }}"
@else
    aria-disabled="true"
@endif
