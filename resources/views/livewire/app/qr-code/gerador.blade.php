<div>
    <div class="w-full flex flex-col lg:flex-row gap-8">
        <div class="w-full flex-1 mb-10">
            <section x-data="{ tab: 'basico', conteudo: 'link_unico' }" class="flex flex-wrap gap-8 items-start content-start">
                <div class="w-full flex flex-wrap gap-4 items-start content-start">
                    <div class="w-full">
                        <p class="text-xl text-white font-bold text-center lg:text-left">Selecione o tipo de conteúdo</p>
                    </div>
                    <div class="w-full flex flex-col items-start justify-start">
                        <div class="bg-light1 px-4 pt-4 pb-1 rounded-t-3xl flex gap-2 w-full lg:w-auto flex justify-center items-center">
                            <button type="button" 
                                @click="tab = 'basico'" 
                                :class="tab === 'basico' ? '!bg-accent' : 'bg-white'"
                                class="px-4 lg:px-7 py-2 lg:py-3 text-sm lg:text-base bg-white inline-flex items-center justify-center rounded-full font-bold text-black cursor-pointer transition duration-200 ease-in-out hover:scale-95 gap-2">
                                Básico
                            </button>
                            <button type="button" 
                                {{-- @click="tab = 'premium'" 
                                :class="tab === 'premium' ? '!bg-accent' : 'bg-white'" --}}
                                class="px-4 lg:px-7 py-2 lg:py-3 text-sm lg:text-base bg-white inline-flex items-center justify-center rounded-full font-bold text-gray-400 transition duration-200 ease-in-out gap-2">
                                <x-icons.cadeado class="size-5 fill-gray-200" />
                                Premium
                            </button>
                        </div>
                        <div class="bg-light1 p-4 rounded-b-3xl lg:rounded-r-3xl w-full -mt-1">
                            <div x-show="tab === 'basico'" class="w-full">
                                <div class="w-full grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 lg:gap-4">
                                    <x-buttons.tipo-conteudo 
                                        wire:click="changeType('link_unico')"
                                        @click="conteudo = 'link_unico'"
                                        ::class="{ '!bg-tertiary !text-white': (conteudo === 'link_unico') }"
                                    >
                                        <x-icons.link class="size-4 lg:size-5 fill-accent" />
                                        <span class="flex-1">{{ __('Link Único') }}</span>
                                    </x-buttons.tipo-conteudo>
                                    <x-buttons.tipo-conteudo
                                        wire:click="changeType('texto')"
                                        @click="conteudo = 'texto'"
                                        ::class="{ '!bg-tertiary !text-white': (conteudo === 'texto') }"
                                    >
                                        <x-icons.texto class="size-4 lg:size-5 stroke-accent" />
                                        <span class="flex-1">{{ __('Texto') }}</span>
                                    </x-buttons.tipo-conteudo>
                                    <x-buttons.tipo-conteudo
                                        wire:click="changeType('contato')"
                                        @click="conteudo = 'contato'"
                                        ::class="{ '!bg-tertiary !text-white': (conteudo === 'contato') }"
                                    >
                                        <x-icons.contato class="size-4 lg:size-5 fill-accent" />
                                        <span class="flex-1">{{ __('Contato') }}</span>
                                    </x-buttons.tipo-conteudo>
                                    <x-buttons.tipo-conteudo
                                        wire:click="changeType('whatsapp')"
                                        @click="conteudo = 'whatsapp'"
                                        ::class="{ '!bg-tertiary !text-white': (conteudo === 'whatsapp') }"
                                    >
                                        <x-icons.whatsapp class="size-4 lg:size-5 fill-accent" />
                                        <span class="flex-1">{{ __('WhatsApp') }}</span>
                                    </x-buttons.tipo-conteudo>
                                    <x-buttons.tipo-conteudo
                                        wire:click="changeType('wifi')"
                                        @click="conteudo = 'wifi'"
                                        ::class="{ '!bg-tertiary !text-white': (conteudo === 'wifi') }"
                                    >
                                        <x-icons.wifi class="size-4 lg:size-5 fill-accent" />
                                        <span class="flex-1">{{ __('Wi-fi') }}</span>
                                    </x-buttons.tipo-conteudo>
                                    <x-buttons.tipo-conteudo
                                        wire:click="changeType('pix')"
                                        @click="conteudo = 'pix'"
                                        ::class="{ '!bg-tertiary !text-white': (conteudo === 'pix') }"
                                    >
                                        <x-icons.pix class="size-4 lg:size-5 fill-accent" />
                                        <span class="flex-1">{{ __('Pix') }}</span>
                                    </x-buttons.tipo-conteudo>
                                    <x-buttons.tipo-conteudo
                                        class="text-gray-200 !bg-gray-400/80"
                                        {{-- wire:click="changeType('email')" --}}
                                        {{-- @click="conteudo = 'email'"
                                        ::class="{ '!bg-tertiary !text-white': (conteudo === 'email') }" --}}
                                    >
                                        <x-icons.cadeado class="size-4 lg:size-5 fill-gray-200" />
                                        <span class="flex-1">{{ __('E-mail') }}</span>
                                    </x-buttons.tipo-conteudo>
                                    <x-buttons.tipo-conteudo
                                        class="text-gray-200 !bg-gray-400/80"
                                        {{-- wire:click="changeType('localizacao')" --}}
                                        {{-- @click="conteudo = 'localizacao'"
                                        ::class="{ '!bg-tertiary !text-white': (conteudo === 'localizacao') }" --}}
                                    >
                                        <x-icons.cadeado class="size-4 lg:size-5 fill-gray-200" />
                                        <span class="flex-1">{{ __('Localização') }}</span>
                                    </x-buttons.tipo-conteudo>
                                </div>
                            </div>
                            <div x-show="tab === 'premium'" class="w-full">
                                <div class="w-full">
                                    {{-- Em breve --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full flex flex-wrap gap-4 items-start content-start">
                    <div class="w-full">
                        <p class="text-xl text-white font-bold text-center lg:text-left">Conteúdo</p>
                    </div>
                    <div class="w-full flex flex-col items-start justify-start">
                        <div class="bg-light1 px-4 py-6 lg:px-6 rounded-3xl w-full">

                            <div x-show="conteudo === 'link_unico'" class="w-full flex flex-col">
                                <label for="link_unico" class="mb-1 font-bold">{{ __('Link único') }}</label>
                                <flux:input placeholder="https://..." type="url" wire:model="link_unico" id="link_unico" />
                            </div>

                            <div x-show="conteudo === 'texto'" class="w-full flex flex-col">
                                <label for="texto" class="mb-1 font-bold">{{ __('Texto') }}</label>
                                <flux:textarea placeholder="Digite o texto aqui..." wire:model="texto" id="texto" />
                            </div>

                            <div x-show="conteudo === 'whatsapp'" class="w-full flex flex-col gap-4">
                                <div class="flex flex-col">
                                    <label for="whatsapp_numero" class="mb-1 font-bold">{{ __('Número do WhatsApp') }}</label>
                                    <flux:input placeholder="+55..." wire:model="whatsapp_numero" id="whatsapp_numero" value="+55"
                                    x-data="{ mask: null }"
                                    x-init="mask = IMask($el, {
                                        mask: [
                                            { mask: '+00 (00) 0000-0000' },
                                            { mask: '+00 (00) 00000-0000' }
                                            ]
                                        })"
                                    />
                                </div>
                                <div class="flex flex-col">
                                    <label for="whatsapp_texto" class="mb-1 font-bold">{{ __('Mensagem') }}</label>
                                    <flux:textarea placeholder="Digite a mensagem aqui..." wire:model="whatsapp_texto" id="whatsapp_texto" />
                                </div>
                            </div>

                            <div x-show="conteudo === 'wifi'" class="w-full grid lg:grid-cols-3 gap-4">
                                <div class="flex flex-col">
                                    <label for="wifi_nome" class="mb-1 font-bold">{{ __('Nome da rede') }}</label>
                                    <flux:input placeholder="SSID" wire:model="wifi_nome" id="wifi_nome" />
                                </div>
                                <div class="flex flex-col">
                                    <label for="wifi_encriptacao" class="mb-1 font-bold">{{ __('Tipo de encriptação') }}</label>
                                    <flux:select wire:model="wifi_encriptacao" id="wifi_encriptacao">
                                        <flux:select.option value="WPA">WPA</flux:select.option>
                                        <flux:select.option value="WPA">WPA/WPA2-Personal</flux:select.option>
                                        <flux:select.option value="WPA2">WPA2</flux:select.option>
                                        <flux:select.option value="WPA/WPA2">WPA/WPA2</flux:select.option>
                                        <flux:select.option value="WEP">WEP</flux:select.option>
                                        <flux:select.option value="nopass">Sem senha</flux:select.option>
                                    </flux:select>
                                </div>
                                <div class="flex flex-col">
                                    <label for="wifi_senha" class="mb-1 font-bold">{{ __('Senha') }}</label>
                                    <flux:input placeholder="Senha" wire:model="wifi_senha" id="wifi_senha" />
                                </div>
                            </div>

                            <div x-show="conteudo === 'contato'" class="w-full grid lg:grid-cols-2 gap-4">
                                <div class="flex flex-col">
                                    <label for="contato_nome" class="mb-1 font-bold">{{ __('Primeiro nome') }}</label>
                                    <flux:input placeholder="Nome" wire:model="contato_nome" id="contato_nome" />
                                </div>
                                <div class="flex flex-col">
                                    <label for="contato_sobrenome" class="mb-1 font-bold">{{ __('Último nome') }}</label>
                                    <flux:input placeholder="Nome" wire:model="contato_sobrenome" id="contato_sobrenome" />
                                </div>
                                <div class="flex flex-col">
                                    <label for="contato_chamada" class="mb-1 font-bold">{{ __('Chamada') }}</label>
                                    <flux:input placeholder="+55..." wire:model="contato_chamada" id="contato_chamada" value="+55"
                                    x-data="{ mask: null }"
                                    x-init="mask = IMask($el, {
                                        mask: [
                                            { mask: '+00 (00) 0000-0000' },
                                            { mask: '+00 (00) 00000-0000' }
                                            ]
                                        })"
                                    />
                                </div>
                                <div class="flex flex-col">
                                    <label for="contato_celular" class="mb-1 font-bold">{{ __('Celular') }}</label>
                                    <flux:input placeholder="+55..." wire:model="contato_celular" id="contato_celular" value="+55"
                                    x-data="{ mask: null }"
                                    x-init="mask = IMask($el, {
                                        mask: [
                                            { mask: '+00 (00) 0000-0000' },
                                            { mask: '+00 (00) 00000-0000' }
                                            ]
                                        })"
                                    />
                                </div>
                                <div class="flex flex-col lg:col-span-2">
                                    <label for="contato_email" class="mb-1 font-bold">{{ __('E-mail') }}</label>
                                    <flux:input placeholder="contato@exemplo.com" type="email" wire:model="contato_email" id="contato_email" />
                                </div>
                                <div class="flex flex-col lg:col-span-2">
                                    <label for="contato_empresa" class="mb-1 font-bold">{{ __('Empresa') }}</label>
                                    <flux:input placeholder="Nome da empresa" wire:model="contato_empresa" id="contato_empresa" />
                                </div>
                                <div class="flex flex-col lg:col-span-2">
                                    <label for="contato_site" class="mb-1 font-bold">{{ __('Site') }}</label>
                                    <flux:input placeholder="https://..." type="url" wire:model="contato_site" id="contato_site" />
                                </div>
                                <div class="flex flex-col">
                                    <label for="contato_cargo" class="mb-1 font-bold">{{ __('Cargo') }}</label>
                                    <flux:input placeholder="Cargo" wire:model="contato_cargo" id="contato_cargo" />
                                </div>
                                <div class="flex flex-col">
                                    <label for="contato_fax" class="mb-1 font-bold">{{ __('Fax') }}</label>
                                    <flux:input placeholder="Fax" wire:model="contato_fax" id="contato_fax" />
                                </div>
                                <div class="flex flex-col lg:col-span-2">
                                    <label for="contato_endereco" class="mb-1 font-bold">{{ __('Endereço') }}</label>
                                    <flux:input placeholder="Endereço" wire:model="contato_endereco" id="contato_endereco" />
                                </div>
                                <div class="lg:col-span-2 grid lg:grid-cols-3 gap-4">
                                    <div class="flex flex-col">
                                        <label for="contato_cidade" class="mb-1 font-bold">{{ __('Cidade') }}</label>
                                        <flux:input placeholder="Cidade" wire:model="contato_cidade" id="contato_cidade" />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="contato_estado" class="mb-1 font-bold">{{ __('Estado') }}</label>
                                        <flux:input placeholder="Estado" wire:model="contato_estado" id="contato_estado" />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="contato_cep" class="mb-1 font-bold">{{ __('CEP') }}</label>
                                        <flux:input placeholder="Cidade" wire:model="contato_cep" id="contato_cep"
                                        x-data="{ mask: null }"
                                        x-init="mask = IMask($el, {
                                            mask: [
                                                { mask: '00.000-000' }
                                                ]
                                            })"
                                         />
                                    </div>
                                </div>
                            </div>

                            <div x-show="conteudo === 'pix'" class="w-full grid lg:grid-cols-4 gap-4">
                                <div class="flex flex-col">
                                    <label for="pix_tipo_chave" class="mb-1 font-bold">{{ __('Tipo de chave') }}</label>
                                    <flux:select wire:model.live="pix_tipo_chave" id="pix_tipo_chave">
                                        <flux:select.option value="cpf">CPF</flux:select.option>
                                        <flux:select.option value="cnpj">CNPJ</flux:select.option>
                                        <flux:select.option value="email">E-mail</flux:select.option>
                                        <flux:select.option value="celular">Celular</flux:select.option>
                                        <flux:select.option value="aleatoria">Aleatória</flux:select.option>
                                    </flux:select>
                                </div>
                                <div class="flex flex-col lg:col-span-3">
                                    <label for="pix_chave" class="mb-1 font-bold">{{ __('Chave Pix') }}</label>
                                    <flux:input 
                                        wire:model="pix_chave" 
                                        id="pix_chave"
                                        placeholder="Digite a chave pix"
                                        x-data="{ mask: null }"
                                        x-init="mask = IMask($el, {
                                            mask: [
                                                { mask: '000.000.000-00' },
                                                { mask: '+00 (00) 0000-0000' },
                                                { mask: '+00 (00) 00000-0000' },
                                                { mask: '00.000.000.0000/00' },
                                                { mask: /^\S*@?\S*$/ }
                                                ]
                                            })"
                                        />
                                    <flux:error name="pix_chave" />
                                </div>
                                <div class="flex flex-col lg:col-span-2">
                                    <label for="pix_identificador" class="mb-1 font-bold">{{ __('Identificador') }} <span class="text-xs text-gray-500">{{ __('(opcional)') }}</span></label>
                                    <flux:input placeholder="PGTOLOJA123" wire:model="pix_identificador" id="pix_identificador" />
                                </div>
                                <div class="flex flex-col lg:col-span-2">
                                    <label for="pix_valor" class="mb-1 font-bold">{{ __('Valor') }} <span class="text-xs text-gray-500">{{ __('(opcional)') }}</span></label>
                                    <flux:input.group>
                                        <flux:input.group.prefix>R$</flux:input.group.prefix>
                                        <flux:input placeholder="20,00" wire:model="pix_valor" id="pix_valor" type="number" step="0.01" />
                                    </flux:input.group>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="w-full flex flex-wrap gap-4 items-start content-start">
                    <div class="w-full">
                        <p class="text-xl text-white font-bold text-center lg:text-left">Personalização</p>
                    </div>
                    <div class="w-full flex flex-col items-start justify-start">
                        <div class="bg-light1 px-4 py-6 lg:px-6 rounded-3xl w-full">
                            <div class="w-full grid grid-cols-2 lg:flex lg:flex-wrap lg:items-start lg:content-start gap-4">

                                <div class="flex flex-col">
                                    <div class="mb-1 font-bold">{{ __('Cor do fundo') }}</div>
                                    <div class="flex items-center gap-2 bg-white rounded-lg p-2">
                                        <input
                                            type="color" 
                                            wire:model="cor_fundo" 
                                            class="size-6 rounded cursor-pointer border-none p-0"
                                            id="cor_fundo"
                                        />
                                        <label for="cor_fundo" class="text-text-black font-mono cursor-pointer">{{ $cor_fundo }}</label>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="mb-1 font-bold">{{ __('Cor do corpo') }}</div>
                                    <div class="flex items-center gap-2 bg-white rounded-lg p-2">
                                        <input
                                            type="color" 
                                            wire:model="cor_principal" 
                                            class="size-6 rounded cursor-pointer border-none p-0"
                                            id="cor_principal"
                                        />
                                        <label for="cor_principal" class="text-text-black font-mono cursor-pointer">{{ $cor_principal }}</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="w-full lg:w-80 relative">
            <div class="flex flex-col sticky top-10 gap-4 items-center">
                <div class="w-full border rounded-lg border-gray-300 overflow-hidden ">
                    @if ($qrcode != null)
                        <img src="{!! $qrcode !!}" class="w-full">
                    @else
                        <div class="w-full aspect-square flex justify-center items-center bg-gray-100 p-4">
                            <img src="{{ asset('src/images/qr.webp') }}" alt="" class="w-full">
                        </div>
                    @endif
                </div>
    
                <div class="w-full">
                    <flux:button variant="primary" class="w-full cursor-pointer !py-6 !text-lg !text-black !font-bold" type="button" wire:click="gerarQrCode">
                        Gerar QR code
                    </flux:button>
                </div>

                @if($qrcode)    
                    <div>
                        <flux:button.group class="gap-[1px]">
                            <flux:button icon="arrow-down-tray" variant="primary" class="cursor-pointer !text-black !font-bold" type="button" wire:click="downloadPng">
                                PNG
                            </flux:button>
                            <flux:button icon="arrow-down-tray" variant="primary" class="cursor-pointer !text-black !font-bold" type="button" wire:click="downloadJpg">
                                JPG
                            </flux:button>
                            <flux:button icon="arrow-down-tray" variant="primary" class="cursor-pointer !text-black !font-bold" type="button" wire:click="downloadWebp">
                                Webp
                            </flux:button>
                        </flux:button.group>
                    </div>
                    
                    <div>
                        <flux:button variant="filled" class="cursor-pointer !text-white !font-bold" type="button" wire:click="resetQrCode">
                            Gerar novo QR code
                        </flux:button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
