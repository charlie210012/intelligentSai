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
            "2. Consultar datos de los empleados - estado: Terminada",
            "3. Registrar nuevos empleados - estado: Terminada",
            "4. Actualizar datos de los empleados - estado: En desarrollo",
            "5. Eliminar empleados - estado: En desarrollo"
            ]
        ];
    }
}
