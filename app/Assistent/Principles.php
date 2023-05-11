<?php

namespace App\Assistent;

use App\Models\Employe;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Sidevtech\Sai\Src\Assistent\Principles as SaiPrinciples;

class Principles extends SaiPrinciples {
    public function __invoke()
    {


        return array_merge(
            array_map(function ($principle) {
                return $principle;
            }, $this->default),
            [
                "Estos son los datos del cliente del chat: ".json_encode(Auth::user())." si el cliente del chat hace una de estas preguntas, ['cual es mi informacion personal?', 'cuales son mis datos?', 'cuales son mis datos en el sistema?', 'cual es mi informacion?', 'podrias mostrarme mis datos'] o cualquier pregunta similar a las que te mostre, responde de la forma mas amable usando los datos del cliente del chat y en un lenguaje muy entendible para el cliente del chat, al responder di que son datos del sistema",
            ]);
    }
}
