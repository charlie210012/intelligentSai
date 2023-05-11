<?php

namespace App\Directives\Methods;

use App\Models\User;
use Sidevtech\Directives\Implementations\DirectivesAnswers;
use Sidevtech\Sai\src\Sai;

class RegisterEmployee implements DirectivesAnswers
{

    public function outPut($input)
    {
        return [
            "message" => "Claro que sí, iniciemos con el registro del nuevo empleado, llena este formulario",
            "register" => true,
        ];
    }
}
