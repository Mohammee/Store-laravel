<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Language::insert([
           ['title' => 'English' , 'label' => 'en' , 'local' => 'en_EN'],
           ['title' => 'Arabic' , 'label' => 'ar' , 'local' => 'ar_AR'],
       ]);
    }
}
