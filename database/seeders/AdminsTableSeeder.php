<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
           ['name' => 'Admin' , 'role_id' => 2 , 'email' => 'admin@admin.com' , 'password' => bcrypt('admin')
           ,'mobile' => '9700592828060' , 'status' => 1 ,'lastActivity' => '2020-04-04 2:22:23' ],
            ['name' => 'Ali Hassan' , 'role_id' => 2 , 'email' => 'ali@admin.com' , 'password' => bcrypt('admin')
                ,'mobile' => '9700591232424' , 'status' => 1,'lastActivity' => '2020-04-04 2:22:23' ],
        ]);
    }
}
