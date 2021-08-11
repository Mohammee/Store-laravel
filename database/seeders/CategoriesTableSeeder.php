<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cateogry1 = Category::create([
           'parent_id' => 0 , 'discount' => 0
        ]);

        $cateogry1->translations()->updateOrCreate(
            ['lang_id' => '1'] ,
            ['lang_id' => '1' , 'name' => 'Laptop' , 'url' => 'laptop']
        );

        $cateogry1->translations()->updateOrCreate(
            ['lang_id' => '2'] ,
            ['lang_id' => '2' , 'name' => 'لابتب' , 'url' => 'لابتب-1']
        );

        $cateogry2 = Category::create([
            'parent_id' => 0 , 'discount' => 0
        ]);

        $cateogry2->translations()->updateOrCreate(
            [ 'lang_id' => '1'] ,
            ['lang_id' => '1' , 'name' => 'Phone' , 'url' => 'phone']
        );

        $cateogry2->translations()->updateOrCreate(
            [ 'lang_id' => '2'] ,
            ['lang_id' => '2' , 'name' => 'ايفون' , 'url' => 'ايفون-1']
        );


        $cateogry3 = Category::create([
            'parent_id' => 0 , 'discount' => 234.33
        ]);

        $cateogry3->translations()->updateOrCreate(
            [ 'lang_id' => '1'] ,
            ['lang_id' => '1' , 'name' => 'Ipade' , 'url' => 'ipade']
        );

        $cateogry3->translations()->updateOrCreate(
            ['lang_id' => '2'] ,
            ['lang_id' => '2' ,'name' => 'ايباد' , 'url' => 'ايباد-1']
        );
    }
}
