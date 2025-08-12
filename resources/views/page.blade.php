<x-layouts.dynamic :page="$page" :content="$content" :header="$header" :footer="$footer">
    {!! $header['html'] ?? '' !!}
    
    {!! $content['html'] ?? '' !!}
    @include('components.toolbox')
    {{-- Footer --}}
    {!! $footer['html'] ?? '' !!}
</x-layouts.dynamic>
