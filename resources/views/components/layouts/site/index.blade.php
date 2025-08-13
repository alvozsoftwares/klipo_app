<!DOCTYPE html>
<html lang="pt_BR" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(isset($title))
        <title>{{ $title . ' | '. config('app.name') ?? config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <meta name="theme-color" content="#3d1365">
    <meta name="apple-mobile-web-app-status-bar-style" content="#3d1365">
    <meta name="msapplication-navbutton-color" content="#3d1365">
    <meta property="og:type" content="website">

    <link rel="canonical" href="{{ env('APP_URL') }}">
    <meta name="robots" content="index, follow">
    <meta property="og:locale" content="pt_BR">

    <meta name="google-adsense-account" content="ca-pub-5245256872718049">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @if(isset($head))
        {!! $head !!}
    @endif
</head>
<body class="min-h-screen antialiased gradiente flex flex-col relative">
    <div x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 500)">

        <!-- Splash screen -->
        <div 
            x-show="loading" 
            x-transition.opacity
            class="fixed inset-0 flex items-center justify-center bg-primary gradiente z-50"
        >
            <x-logos.logo-vertical class="w-32 animate-pulse" />
        </div>

        <div x-show="!loading" x-transition class="w-full flex flex-col relative h-screen max-h-screen">
            <x-layouts.site.header />
            
            <div class="flex-1 overflow-hidden">
                <div class="w-full h-full overflow-y-auto">
                    <div class="w-full h-full flex flex-col">
                        <div class="w-full flex-1">
                            {{ $slot }}
                        </div>
                        <x-layouts.site.footer />
                    </div>
                </div>
            </div>
            
            <x-popups.cookies />
        </div>
    </div>
    
    @fluxScripts
</body>
</html>