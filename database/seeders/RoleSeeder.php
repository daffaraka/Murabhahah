<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Role::create([
            'name' => 'Manager Cabang Utama',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'Manager Pembiayaan',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'Manager Operasional',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'Account Officer',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'Teller',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'Admin',
            'guard_name' => 'web'
        ]);
    }
}
