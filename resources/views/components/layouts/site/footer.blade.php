<footer class="w-full bg-tertiary">
    <div class="container mx-auto px-6 max-w-6xl">
        <div class="flex flex-col justify-center items-center gap-4 pt-10">
            <div>
                <a href="{{ route('home') }}">
                    <x-logos.logo-vertical class="w-32" />
                </a>
            </div>
            <div>
                <ul>
                    <li class="flex gap-6 items-center justify-center text-sm">
                        <x-links.nav-link-home :href="route('privacidade')" :active="request()->routeIs('privacidade')">
                            {{ __('Política de privacidade') }}
                        </x-links.nav-link-home>
                        <x-links.nav-link-home :href="route('termos')" :active="request()->routeIs('termos')">
                            {{ __('Termos de Uso') }}
                        </x-links.nav-link-home>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full px-4 py-8 flex flex-col justify-center items-center">
            <span class="text-sm text-center text-accent">©2025 - {{ date('Y') }}. {{__('Klipo by ')}} <a href="https://alvoz.com.br/" target="_blank">Alvoz</a>. {{ __('Todos os direitos reservados.') }} CNPJ: 60.146.242/0001-10. {{ __('Feito por nós com') }} 💚.</span>
        </div>
    </div>
</footer>