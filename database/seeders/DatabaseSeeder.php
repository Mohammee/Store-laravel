<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([

            LanguagesSeeder::class,
            RolesTableSeeder::class,
            AdminsTableSeeder::class,
            CategoriesTableSeeder::class,
            ProductsTableSeeder::class,
            BannersTableSeeder::class,
            ColorsTableSeeder::class,
            OptionsTableSeeder::class

        ]);
    }
}
