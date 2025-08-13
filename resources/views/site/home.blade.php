<x-layouts.site>

    <x-slot name="head">
        <meta name="description" content="{{ __('Gere QR Codes grátis online em poucos cliques. Escolha o tipo de conteúdo, personalize cores e baixe sua imagem em alta qualidade, rápido e fácil!') }}">
        <meta name="keywords" content="qr code, qr code fácil, código qr, quick response, v-card, gerar v-card, criar qr code gratuito, gerar qr code gratuito, criar qr code personalizado, qr code personalizado gratuito, gerador de QR code, criar QR code online, QR code grátis, gerar QR code personalizado, QR code colorido, criar código QR, QR code para Wi-Fi, QR code vCard, QR code para link">
        <meta name="author" content="Grupo Alvoz">

        <meta property="og:title" content="{{ config('app.name') }}">
        <meta property="og:description" content="{{ __('Gere QR Codes grátis online, personalize cores e baixe sua imagem em alta qualidade rápido e fácil.') }}">
        <meta property="og:url" content="{{ env('APP_URL') }}">
        <meta property="og:image" content="{{ asset('src/images/seo.webp') ?? null }}">

        <!-- Twitter Cards -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ config('app.name') }}">
        <meta name="twitter:description" content="Crie QR Codes grátis em poucos cliques e baixe em alta qualidade.">
        <meta name="twitter:image" content="{{ asset('src/images/seo.webp') ?? null }}">

        <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
    </x-slot>

    <div class="w-full h-full">
        <div class="container mx-auto max-w-6xl px-6 py-8">
            <div class="w-full mb-10 flex flex-col lg:flex-row items-start justify-start gap-8">
                <div>
                    <h1 class="text-4xl text-white font-bold mb-4">{{ __('Crie QR Codes Gratuitos e Personalizados') }}</h1>
                    <p class="text-lg text-white lg:text-balance">{{ __('Gere QR Codes online e grátis em poucos cliques. Escolha o tipo de conteúdo, personalize cores e baixe sua imagem em alta qualidade, rápido e fácil!') }}</p>
                </div>
                <div class="aspect-square max-w-[320px]">
                    <amp-ad width="100vw" height="320"
                        type="adsense"
                        data-ad-client="ca-pub-5245256872718049"
                        data-ad-slot="3060867822"
                        data-auto-format="rspv"
                        data-full-width="">
                        <div overflow=""></div>
                    </amp-ad>
                </div>
            </div>
            @livewire('app.qr-code.gerador')
        </div>

        <div class="pb-10">
            <amp-ad width="100vw" height="320"
                type="adsense"
                data-ad-client="ca-pub-5245256872718049"
                data-ad-slot="3032662251"
                data-auto-format="rspv"
                data-full-width="">
                <div overflow=""></div>
            </amp-ad>
        </div>
    </div>
</x-layouts.site>
