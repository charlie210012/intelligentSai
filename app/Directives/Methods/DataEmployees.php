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
        $users = User::all();

        foreach($users as $user){
            $employees[] = [
                "id"=>$user->id,
                "name" => $user->name,
                "email" => $user->email,
                "identification" => $user->identification,
                "phone" => $user->employee->phone??0,
                "birthday" => $user->employee->birthday??'0000-00-00',
                "dateOfHire"=> $user->employee->date_of_hire??'0000-00-00',
                "address" => $user->employee->address??'No tiene',
                "role" => $user->employee->role_id??0,
                "area" => $user->employee->area_id??0,
                "status" => $user->employee->status_id??0,
            ];
        }

        $message = "Estos son los datos de los empleados: ".json_encode($employees)." usa estos datos para responde a esta pregunta  ".$input->input('message')." responde de la forma mas amable posible, si en los datos no hay informacion para resolver la pregunta, responde que no hay informacion al respecto dentro de nuestro sistema";
        return $this->sai->consult($message);
    }
}
