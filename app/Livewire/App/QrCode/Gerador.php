<?php

namespace App\Livewire\App\QrCode;

use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Gerador extends Component
{
    public $qrcode = null;
    public $qrcode_link = null;
    public $url = null;

    public $cor_principal = '#000000';
    public $cor_principal_r = 0;
    public $cor_principal_g = 0;
    public $cor_principal_b = 0;

    public $cor_fundo = '#ffffff';
    public $cor_fundo_r = 255;
    public $cor_fundo_g = 255;
    public $cor_fundo_b = 255;

    public $gradient_select = false;
    public $gradient_from = '#ffffff';
    public $gradient_to = '#737373';
    public $gradient_from_array = [255, 255, 255];
    public $gradient_to_array = [115, 115, 115];

    public $margem = 1;
    public $tamanho = 500;
    public $estilo_principal = 'square';
    public $estilo_olhos = 'square';

    public $tipo_conteudo = 'link_unico';
    public $link_unico = null;
    public $texto = null;

    public $whatsapp_numero = '+55';
    public $whatsapp_texto = null;

    public $wifi_nome = null;
    public $wifi_encriptacao = 'WPA';
    public $wifi_senha = null;

    public $contato_nome = null;
    public $contato_sobrenome = null;
    public $contato_empresa = null;
    public $contato_cargo = null;
    public $contato_chamada = '+55';
    public $contato_celular = '+55';
    public $contato_fax = null;
    public $contato_email = null;
    public $contato_site = null;
    public $contato_endereco = null;
    public $contato_cidade = null;
    public $contato_estado = null;
    public $contato_cep = null;

    public function mount()
    {
        $this->url = request()->query('url');
    }

    public function changeType($type)
    {
        $this->tipo_conteudo = $type;
    }

    public function transformCorPrincipal()
    {
        list(
            $this->cor_principal_r, 
            $this->cor_principal_g, 
            $this->cor_principal_b
        ) = sscanf($this->cor_principal, "#%02x%02x%02x");
    }

    public function transformCorFundo()
    {
        list(
            $this->cor_fundo_r, 
            $this->cor_fundo_g, 
            $this->cor_fundo_b
        ) = sscanf($this->cor_fundo, "#%02x%02x%02x");
    }

    public function transformCorGradiente()
    {
        list( $a, $b, $c ) = sscanf($this->gradient_from, "#%02x%02x%02x");
        $this->gradient_from_array = [$a, $b, $c];

        list( $d, $e, $f ) = sscanf($this->gradient_to, "#%02x%02x%02x");
        $this->gradient_to_array = [$d, $e, $f];
    }

    public function gerarQrCode()
    {
        $conteudo = '';

        if($this->tipo_conteudo == 'link_unico') 
        {
            $validated = $this->validate([
                'link_unico' => 'required|url'
            ]);
            $conteudo = $validated['link_unico'];
        } 
        elseif($this->tipo_conteudo == 'texto') 
        {
            $validated = $this->validate([
                'texto' => 'required|string'
            ]);

            $conteudo = $validated['texto'];
        }
        elseif($this->tipo_conteudo == 'whatsapp') 
        {
            $validated = $this->validate([
                'whatsapp_numero' => 'required|string',
                'whatsapp_texto' => 'required|string'
            ]);

            $conteudo = "https://api.whatsapp.com/send?phone=".$validated['whatsapp_numero']."&text=".$validated['whatsapp_texto']; 
        }
        elseif($this->tipo_conteudo == 'wifi') 
        {
            $validated = $this->validate([
                'wifi_nome' => 'required|string',
                'wifi_encriptacao' => 'required|string',
                'wifi_senha' => 'string|nullable',
            ]);

            // Função para escapar caracteres especiais do padrão Wi-Fi
            function escapeWifiString($str) {
                return str_replace(['\\', ';', ','], ['\\\\', '\;', '\,'], $str);
            }

            $ssid  = escapeWifiString($validated['wifi_nome']);
            $senha = escapeWifiString($validated['wifi_senha'] ?? '');

            if ($validated['wifi_encriptacao'] === 'nopass') {
                $conteudo = "WIFI:T:nopass;S:{$ssid};;";
            } else {
                $conteudo = "WIFI:T:".$validated['wifi_encriptacao'].";S:".$ssid.";P:".$senha.";;";
            }
        } 
        elseif ($this->tipo_conteudo == 'contato') {
            $validated = $this->validate([
                'contato_nome'      => 'required|string',
                'contato_sobrenome' => 'nullable|string',
                'contato_chamada'   => 'nullable|string',
                'contato_celular'   => 'required|string',
                'contato_fax'       => 'nullable|string',
                'contato_email'     => 'nullable|string',
                'contato_empresa'   => 'nullable|string',
                'contato_site'      => 'nullable|string',
                'contato_cargo'     => 'nullable|string',
                'contato_endereco'  => 'nullable|string',
                'contato_cidade'    => 'nullable|string',
                'contato_estado'    => 'nullable|string',
                'contato_cep'       => 'nullable|string',
            ]);

            // Função para codificar em Quoted-Printable UTF-8 preservando maiúsculas/minúsculas
            function qp($value) {
                $utf8 = mb_convert_encoding($value ?? '', 'UTF-8', 'auto');
                $encoded = quoted_printable_encode($utf8);
                return preg_replace_callback('/=([0-9a-fA-F]{2})/', function($matches) {
                    return strtoupper($matches[0]); // Apenas bytes da codificação ficam em maiúsculo
                }, $encoded);
            }

            $conteudo  = "BEGIN:VCARD\n";
            $conteudo .= "VERSION:3.0\n";
            $conteudo .= "N;CHARSET=UTF-8;ENCODING=QUOTED-PRINTABLE:" . qp($validated['contato_sobrenome']) . ";" . qp($validated['contato_nome']) . ";;;\n";
            $conteudo .= "FN;CHARSET=UTF-8;ENCODING=QUOTED-PRINTABLE:" . qp($validated['contato_nome']) . " " . qp($validated['contato_sobrenome']) . "\n";

            if (!empty($validated['contato_empresa'])) {
                $conteudo .= "ORG;CHARSET=UTF-8;ENCODING=QUOTED-PRINTABLE:" . qp($validated['contato_empresa']) . "\n";
            }
            if (!empty($validated['contato_cargo'])) {
                $conteudo .= "TITLE;CHARSET=UTF-8;ENCODING=QUOTED-PRINTABLE:" . qp($validated['contato_cargo']) . "\n";
            }
            if (!empty($validated['contato_chamada'])) {
                $conteudo .= "TEL;TYPE=work,voice:" . $validated['contato_chamada'] . "\n";
            }
            if (!empty($validated['contato_celular'])) {
                $conteudo .= "TEL;TYPE=cell:" . $validated['contato_celular'] . "\n";
            }
            if (!empty($validated['contato_fax'])) {
                $conteudo .= "TEL;TYPE=fax:" . $validated['contato_fax'] . "\n";
            }
            if (!empty($validated['contato_email'])) {
                $conteudo .= "EMAIL;CHARSET=UTF-8;ENCODING=QUOTED-PRINTABLE:" . qp($validated['contato_email']) . "\n";
            }
            if (!empty($validated['contato_site'])) {
                $conteudo .= "URL;CHARSET=UTF-8;ENCODING=QUOTED-PRINTABLE:" . qp($validated['contato_site']) . "\n";
            }
            if (!empty($validated['contato_endereco']) || !empty($validated['contato_cidade']) || !empty($validated['contato_estado']) || !empty($validated['contato_cep'])) {
                $conteudo .= "ADR;TYPE=work;CHARSET=UTF-8;ENCODING=QUOTED-PRINTABLE:;;" 
                        . qp($validated['contato_endereco']) . ";" 
                        . qp($validated['contato_cidade']) . ";" 
                        . qp($validated['contato_estado']) . ";" 
                        . qp($validated['contato_cep']) . ";Brasil\n";
            }

            $conteudo .= "END:VCARD";
        }

        $this->transformCorPrincipal();
        $this->transformCorFundo();

        $manager = new ImageManager(new Driver());

        if($this->gradient_select) {

            $this->transformCorGradiente();

            $from = $this->gradient_from_array;
            $to = $this->gradient_to_array;

            $qrBinary = base64_encode(
                QrCode::format('png')
                    ->size($this->tamanho)
                    ->style($this->estilo_principal)
                    ->eye($this->estilo_olhos)
                    ->color($this->cor_principal_r, $this->cor_principal_g, $this->cor_principal_b)
                    ->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
                    ->backgroundColor($this->cor_fundo_r, $this->cor_fundo_g, $this->cor_fundo_b)
                    ->margin($this->margem)
                    ->generate($conteudo)
            );
        } else {
            $qrBinary = base64_encode(
                QrCode::format('png')
                    ->size($this->tamanho)
                    ->style($this->estilo_principal)
                    ->eye($this->estilo_olhos)
                    ->color($this->cor_principal_r, $this->cor_principal_g, $this->cor_principal_b)
                    ->backgroundColor($this->cor_fundo_r, $this->cor_fundo_g, $this->cor_fundo_b)
                    ->margin($this->margem)
                    ->generate($conteudo)
            );
        }

        $qrImage = $manager->read($qrBinary);

        // $iconeSize = intval($this->tamanho * 0.1);

        // switch ($this->estilo_principal) {
        //     case 'square':
        //         $icone_img = public_path('src/images/icone-k-square.png');
        //         break;
        //     case 'dot':
        //         $icone_img = public_path('src/images/icone-k-dot.png');
        //         break;
        //     default:
        //         $icone_img = public_path('src/images/icone-k-arredondado.png');
        //         break;
        // }

        // $icone = $manager
        //     ->read($icone_img)
        //     ->resize($iconeSize, $iconeSize);

        // $qrImage->place($icone, 'bottom-right', 3, 3);

        $this->qrcode = $qrImage->toPng()->toDataUri();
    }
    
    public function render()
    {
        return view('livewire.app.qr-code.gerador');
    }
}
