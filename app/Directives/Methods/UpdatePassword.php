<?php

namespace App\Directives\Methods;

use Sidevtech\Directives\Implementations\DirectivesAnswers;

class UpdatePassword implements DirectivesAnswers
{
    public function outPut($input)
    {
        return "De acuerdo vamos a cambiar tu contraseña, enviame la nueva contraseña por favor, en este formato 'Mi nueva contraseña es: 1245367' recuerda no elegir una contraseña muy facil de adivinar";
    }
}
