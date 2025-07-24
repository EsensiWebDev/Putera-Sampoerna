<x-layouts.dynamic :page="$page" :content="$content" :footer="$footer">
    {!! $content['html'] ?? '' !!}
    @include('components.toolbox')
    {{-- Footer --}}
    {!! $footer['html'] ?? '' !!}
</x-layouts.dynamic>
