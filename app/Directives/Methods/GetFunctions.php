<?php

namespace App\Directives\Methods;

use Sidevtech\Directives\Implementations\DirectivesAnswers;

class GetFunctions implements DirectivesAnswers
{
    public function outPut($input)
    {
        return [
            "message" =>[
            "1. puedes preguntarme por tus datos, tu nombre, tu identificación, tu email, o tu fecha de creación - estado:Terminada",
            "2. Consultar datos de los empleados - estado: Terminados",
            ]
        ];
    }
}
