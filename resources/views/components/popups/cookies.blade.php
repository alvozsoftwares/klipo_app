<div 
    x-data="cookieConsent()"
    x-init="init()"
    x-show="show"
    x-cloak
    class="fixed bottom-0 lg:bottom-6 w-full flex justify-center px-4"
    x-transition:leave="transition transform ease-in duration-300"
    x-transition:leave-start="translate-y-0"
    x-transition:leave-end="translate-y-full"
>
    <div class="bg-white rounded-t-2xl lg:rounded-2xl p-4 flex items-center text-sm gap-4 max-w-[850px] mx-auto lg:px-8 lg:py-5 lg:!text-base shadow-lg">
        <div>
            <span>Este website utiliza cookies para melhorar a sua experiência e personalizarmos serviços e anúncios. Ao utilizar nosso site, você concorda com nossa <a href="{{ route('privacidade') }}" class="text-tertiary hover:underline hover:text-accent">Política de privacidade</a>.</span>
        </div>
        <button 
            type="button" 
            class="px-4 py-3 rounded-md text-black font-bold bg-accent cursor-pointer"
            onclick="consentGrantedAdStorage()"
            @click="accept()"
        >
            Concordo
        </button>
    </div>
</div>

<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}

    gtag('consent', 'default', {
        'ad_storage': 'denied',
        'ad_user_data': 'denied',
        'ad_personalization': 'denied',
        'analytics_storage': 'denied'
    });
</script>

<script>
    function cookieConsent() {
        return {
            show: false,
            init() {
                this.show = !localStorage.getItem('cookie_consent');
            },
            accept() {
                localStorage.setItem('cookie_consent', 'true');
                this.show = false;
            }
        }
    }
</script>

<script>
    function consentGrantedAdStorage() {
        gtag('consent', 'update', {
            'ad_storage': 'granted',
            'ad_user_data': 'granted',
            'ad_personalization': 'granted',
            'analytics_storage': 'granted'
        });
    }
</script>
