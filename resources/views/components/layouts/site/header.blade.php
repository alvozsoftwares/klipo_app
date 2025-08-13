<header class="w-full" x-data="{
    isOpen: window.innerWidth >= 1024,
    init() {
        window.addEventListener('resize', () => {
            this.isOpen = window.innerWidth >= 1024
        })
        }
    }"
    x-init="init()">
    <div class="container mx-auto px-6 max-w-6xl border-b border-white/10">
        <div class="w-full flex">
            <div class="w-full lg:w-auto py-4 flex items-center justify-between">
                <a href="{{ route('home') }}">
                    <x-logos.logo class="w-32" />
                </a>

                <!-- Botão Abrir menu -->
                <button 
                    @click="isOpen = true" 
                    type="button"
                    class="lg:hidden hover:scale-95 focus:scale-95 active:scale-95 transition duration-200 ease-in-out group">
                    <span class="sr-only">{{ __('Abrir menu') }}</span>
                    <x-icons.menu class="size-9 fill-accent group-hover:fill-accent/80 group-focus:fill-accent/80 group-active:fill-accent/80" />
                </button>
            </div>

            <div class="w-full flex flex-col justify-center items-center lg:flex-row bg-primary lg:bg-transparent fixed inset-0 lg:relative z-50 lg:z-auto"
                x-show="isOpen"
                x-transition:enter="transition transform ease-out duration-300"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition transform ease-in duration-300"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                @keydown.escape.window="isOpen = false"
            >
                <!-- Botão fechar menu -->
                <button
                    type="button"
                    class="absolute lg:hidden top-6 right-6 p-2 rounded-md border border-accent/10 group transition duration-200 ease-in-out active:bg-tertiary focus:bg-tertiary hover:bg-tertiary"
                    @click="isOpen = false"
                    >
                    <span class="sr-only">{{ __('Fechar menu') }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-accent" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <nav class="flex flex-col gap-4 lg:gap-6 items-center justify-center lg:flex-row lg:items-center lg:justify-end lg:w-full">
                    <x-links.nav-link-home :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Página Inicial') }}
                    </x-links.nav-link-home>
                    <x-links.nav-link-home 
                        {{-- :href="route('planos')" 
                        :active="request()->routeIs('planos')"  --}}
                        class="!text-gray-400 hover:!text-gray-400 hover:!border-transparent"
                    >
                        <x-icons.cadeado class="size-5 fill-gray-400" />
                        {{ __('Planos e preços') }}
                    </x-links.nav-link-home>
                    {{-- <x-links.nav-link-home :href="route('contato')" :active="request()->routeIs('contato')">
                        {{ __('Contato') }}
                    </x-links.nav-link-home> --}}
                </nav>
            </div>
        </div>
    </div>
</header>