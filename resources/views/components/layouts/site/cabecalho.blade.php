@props(['title'])
<div class="container mx-auto max-w-6xl flex flex-col justify-center items-center text-center px-6 py-8">
    <h1 class="text-3xl lg:text-4xl text-accent font-bold text-balance">{{ $title }}</h1>
    {{ $slot }}
</div>