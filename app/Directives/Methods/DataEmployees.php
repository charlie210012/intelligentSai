<?php

namespace App\Directives\Methods;

use App\Models\User;
use Sidevtech\Directives\Implementations\DirectivesAnswers;
use Sidevtech\Sai\src\Sai;

class DataEmployees implements DirectivesAnswers
{
    private $sai;
    public function __construct()
    {
        $apikey = env('OPENAI_API_KEY');
        $config = config('Sai');
        $this->sai = new Sai($config,$apikey);
    }
    public function outPut($input)
    {
        $message = "Estos son los datos de los empleados: ".json_encode(User::all())." usa estos datos para responde a esta pregunta  ".$input->input('message')." responde de la forma mas amable posible, si en los datos no hay informacion para resolver la pregunta, responde que no hay informacion al respecto dentro de nuestro sistema";
        return $this->sai->consult($message);
    }
}
