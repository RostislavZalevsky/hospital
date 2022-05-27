<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Role Types
         *
         */
        $RoleItems = [
            [
                'name'        => 'Doctor',
                'slug'        => 'doctor',
                'description' => 'Doctor Role',
//                'level'       => ,
            ],
            [
                'name'        => 'Patient',
                'slug'        => 'patient',
                'description' => 'Patient Role',
//                'level'       => ,
            ],
        ];

        /*
         * Add Role Items
         *
         */
        foreach ($RoleItems as $RoleItem) {
            $newRoleItem = config('roles.models.role')::where('slug', '=', $RoleItem['slug'])->first();
            if ($newRoleItem === null) {
                $newRoleItem = config('roles.models.role')::create([
                    'name'          => $RoleItem['name'],
                    'slug'          => $RoleItem['slug'],
                    'description'   => $RoleItem['description'],
//                    'level'         => $RoleItem['level'],
                ]);
            }
        }

        if (config('app.env') === 'production') { return; }

        $users = User::all();
        $roles = Role::all();
        foreach ($users as $user) {
            $user->attachRole($roles[random_int(0, count($roles) - 1)]);
        }
    }
}
