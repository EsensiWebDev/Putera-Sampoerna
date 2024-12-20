<x-layouts.app>
    @include('components.home.hero-banner')
    @include('components.home.founder')
    @include('components.home.slide')
    @include('components.home.journey')
    @include('components.transform')
    @include('components.instagram-content')
    <livewire:news.latest-update />
    @include('components.impression')
    @include('components.contact-us')
</x-layouts.app>
