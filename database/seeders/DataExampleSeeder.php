<?php

namespace Database\Seeders;

use App\Models\area;
use App\Models\Employe;
use App\Models\role;
use App\Models\status;
use App\Models\User;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class DataExampleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $listAreas = ['Produccion','Administracion','Gerencia','Ventas','Compras'];

         // create 5 areas with random names
         foreach($listAreas as $area) {
            Area::create([
                'name' => $area
            ]);
        }

        $listRoles = ['Administracion','Empleado','cliente','proveedor','gerente'];

        // create 5 roles with random names
        foreach($listRoles as $role) {
            Role::create([
                'name' => $role
            ]);
        }

        $listStatus = ['Activo','Inactivo','Suspendido'];

        // create 3 statuses with random names
        foreach($listStatus as $status) {
            status::create([
                'name' => $status
            ]);
        }


        // create 10 employees with random data
        for ($i = 0; $i < 10; $i++) {

            $user = User::create([
                'name' => $faker->name(),
                'identification' => $faker->unique()->randomNumber(),
                'email' => $faker->unique()->email(),
                'password' => bcrypt('password')
            ]);

            $employee = new Employe([
                'phone' => $faker->phoneNumber(),
                'address' => $faker->address(),
                'birthday' => $faker->date(),
                'date_of_hire' => $faker->date(),
                'status_id' => $faker->numberBetween(1, 3),
                'user_id' => $user->id
            ]);

            // set a random area and role for the employee
            $area = area::inRandomOrder()->first();
            $role = role::inRandomOrder()->first();
            $employee->area_id = $area->id;
            $employee->role_id = $role->id;

            $employee->save();
        }

    }
}
