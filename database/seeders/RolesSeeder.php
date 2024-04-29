<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear roles
        Role::create(['name' => 'dev']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'archivo']);
        Role::create(['name' => 'admision']);
        Role::create(['name' => 'invitado']);
    }
}
