<?php

namespace App\Assistent;

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
                
                "Estos son los datos del cliente del chat: ".json_encode(Auth::user())." si el cliente del chat te pregunta por sus datos, responde de la forma mas amable usando los datos del cliente del chat"
            ]);
    }
}