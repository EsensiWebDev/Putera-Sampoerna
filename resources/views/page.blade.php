<x-layouts.dynamic :page="$page" :content="$content">
    {!! $content['html'] ?? '' !!}
    @include('components.toolbox')
    {{-- Footer --}}
    {!! $footer['html'] ?? '' !!}
</x-layouts.dynamic>
