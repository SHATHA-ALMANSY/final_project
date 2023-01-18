<div class="alert alert-{{ $type }}">
    <!-- Test Message ! -->
    <!-- {{ $slot }} -->

    @if( (string) $slot )
    {{ $slot }}
    @else 
    Defult Message 
    @endif
</div>