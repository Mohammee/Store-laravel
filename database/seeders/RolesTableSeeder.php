<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
           ['name' => 'admin'],
            ['name' => 'subadmin'],
            ['name' => 'caller'],
            ['name' => 'moderator'],
        ]);
    }
}
