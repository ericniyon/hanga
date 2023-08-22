<div>
    @section('title', 'Resources')
    @livewireStyles
    @include('partials.includes._home_nav')

    <div class="container my-3">
        <livewire:v2.resources-tabs/>
    </div>
    @livewireScripts
</div>
