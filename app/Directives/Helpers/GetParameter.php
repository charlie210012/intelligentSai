<?php

namespace App\Directives\Helpers;

use Sidevtech\Sai\Src\Helpers\Pattern\Methods\HelperBase;

class GetParameter extends HelperBase
{
    public function outPut($input)
    {

        if (preg_match('/(\bdatos\b|\bteléfono\b|\bestado\b|\brol\b|\barea\b|\bfecha\b|\bidentificación\b|\bidentificacion\b|\bnombre\b|\bdireccion\b|\bcorreo\b|\btelefono\b|\bdirección\b)\s+(de|del)/i', $input, $matches)) {
            return $matches[1];
        } else {
            return false;
        }

    }
}
