<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Employe;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeController extends Controller
{
    public function index()
    {
        return view('employees', [
            'employees' => Employe::all()
        ]);
    }

    public function list()
    {
        return [
            'areas'=>Area::all(),
            'roles'=>Role::all(),
            'status'=>Status::all(),
        ];
    }

    public function create(Request $request){

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'identification'=>$request->identification,
            'password'=>Hash::make(2205),
        ]);

        if($user){
            $employe = Employe::create([
                'user_id'=>$user->id,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'birthday'=>$request->birthday,
                'area_id'=>$request->area,
                'role_id'=>$request->role,
                'date_of_hire'=>$request->dateOfHire,
                'status_id'=>$request->status,
            ]);

            if($employe){
                return response()->json([
                    'message'=>'Empleado creado correctamente',
                    'process'=>true,
                    'user_id'=>$user,
                ], 200);
            }
        }





    }
}
