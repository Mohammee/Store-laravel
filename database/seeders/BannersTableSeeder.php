<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $banner1 = Banner::create([
           'background' => 'uploads/admin/banners/laptop-banner.jpg',
           'image' => 'uploads/admin/banners/lap.jpg',
           'show_title' => 1, 'show_description' => 1,
           'position' => 1
       ]);

       $banner1->translations()->updateOrCreate(
           ['lang_id' => 1],
           ['lang_id' => 1 , 'name' => 'Laptop Lenovo X1 Carbon' , 'url' => env('APP_URL') . '/category/laptop']
           );

        $banner1->translations()->updateOrCreate(
            ['lang_id' => 2],
            ['lang_id' => 2 , 'name' => 'لابتب ثينك باد كاربون اكس1' , 'url' => env('APP_URL') . '/category/لابتب']
        );

        $banner2 = Banner::create([
            'background' => 'uploads/admin/banners/banner2.jpg',
            'image' => 'uploads/admin/banners/ipade.jpg',
            'show_title' => 1, 'show_description' => 1,
            'position' => 0
        ]);

        $banner2->translations()->updateOrCreate(
            ['lang_id' => 1],
            ['lang_id' => 1 , 'name' => 'Ipage Apple 2021' , 'url' => env('APP_URL') . '/category/ipade']
        );

        $banner2->translations()->updateOrCreate(
            ['lang_id' => 2],
            ['lang_id' => 2 , 'name' => 'لابتب ثينك باد كاربون اكس1' , 'url' => env('APP_URL') . '/category/ايباد']
        );
    }
}
