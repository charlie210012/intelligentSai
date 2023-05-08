<?php

namespace App\Directives\Methods;

use Sidevtech\Directives\Implementations\directivesAnswers;

class GetFunctions implements directivesAnswers
{
    public function outPut($input)
    {
        return [
            "message" =>[
            "1. puedes preguntarme por tus datos, tu nombre, tu identificación, tu email, o tu fecha de creación - estado:Terminada",
            "2. Actualizar contraseña de usuario - estado: En desarrollo",
            "3. Actualizar email de usuario - estado: En desarrollo",
            ]
        ];
    }
}