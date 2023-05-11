<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Employe;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

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
}
