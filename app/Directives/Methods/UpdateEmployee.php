<?php

namespace App\Directives\Methods;

use App\Models\User;
use Sidevtech\Directives\Implementations\DirectivesAnswers;
use Sidevtech\Sai\Src\Helpers\SaiHelpers;
use Sidevtech\Sai\src\Sai;

class UpdateEmployee implements DirectivesAnswers
{
    protected $name;

    private $translate = [
        "nombre"=>"name",
        "email"=>"email",
        "identificación"=>"identification",
        "telefono"=>"phone",
        "fecha de cumpleaños"=>"birthday",
        "fecha de creación"=>"dateOfHire",
        "direccion"=>"address",
        "rol"=>"role",
        "area"=>"area",
        "estado"=>"status",
        "datos"=>"data",
    ];

    protected $parameter;
    public function __construct()
    {
        $this->name = new SaiHelpers('GetName');
        $this->parameter = new SaiHelpers('GetParameter');
    }

    public function outPut($input)
    {
        $name = $this->name->call($input->input('message'));

        $prevUser = User::where('name', 'like', "%$name%");

        if ($prevUser->count() == 0) {
            return [
                "message" => "Lo siento, no encontré a ningún empleado con el nombre $name, ¿podrías verificarlo?",
                "update" => false,
            ];
        }else if($prevUser->count() > 1){
            return [
                "message" => "Lo siento, encontré a más de un empleado con el nombre $name, ¿podrías verificarlo?",
                "update" => false,
            ];
        }else if($prevUser->count() == 1){

            $user = $prevUser->first();


            $employee = [
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


            return [
                "message" => $this->translate[$this->parameter->call($input->input('message'))]?"Habilite solo el campo ".$this->parameter->call($input->input('message'))." para evitar que te equivoques modificando otros campos":"Habilite todos los datos para que puedas actualizar el que deseas. ",
                "update" => true,
                "employee" => $employee,
                "parameter" => $this->translate[$this->parameter->call($input->input('message'))],
            ];


        }
    }
}
