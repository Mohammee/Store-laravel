<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

     $product1 =  Product::create(['price' => 2000,
         'quantity' => 100,'sku' => 'ABC123','views' => 0
      ]);

     $product1->translations()->updateOrCreate(
            ['translatable_id' => '1' , 'translatable_type' => 'App\Models\Product', 'lang_id' => '1'] ,
            ['lang_id' => '1' , 'name' => 'Think Pad' , 'url' => 'think-pad']
        );

        $product1->translations()->updateOrCreate(
            ['translatable_id' => '1' , 'translatable_type' => 'App\Models\Product', 'lang_id' => '2'] ,
            ['lang_id' => '2' , 'name' => 'ثينك باد' , 'url' => 'ثينك-باد']
        );


        $product2 =  Product::create(['price' => 2500,
            'quantity' => 59,'sku' => 'ABC456','views' => 0
        ]);

        $product2->translations()->updateOrCreate(
            ['translatable_id' => '2' , 'translatable_type' => 'App\Models\Product', 'lang_id' => '1'] ,
            ['lang_id' => '1' , 'name' => 'Accer' , 'url' => 'accer']
        );

        $product2->translations()->updateOrCreate(
            ['translatable_id' => '2' , 'translatable_type' => 'App\Models\Product', 'lang_id' => '2'] ,
            ['lang_id' => '2' , 'name' => "اسر لابتب" , 'url' => 'اسر-لاب']
        );

        $product3 =  Product::create(['price' => 2500,
            'quantity' => 59,'sku' => 'ABC789','views' => 0
        ]);

        $product3->translations()->updateOrCreate(
            ['translatable_id' => '3' , 'translatable_type' => 'App\Models\Product', 'lang_id' => '1'] ,
            ['lang_id' => '1' , 'name' => 'Iphone-X' , 'url' => 'iphone-x']
        );

        $product3->translations()->updateOrCreate(
            ['translatable_id' => '3' , 'translatable_type' => 'App\Models\Product', 'lang_id' => '2'] ,
            ['lang_id' => '2' , 'name' => "ايفون اكس" , 'url' => 'ايفون-اكس']
        );


        $product4 =  Product::create(['price' => 2500,
            'quantity' => 59,'sku' => 'ABC888','views' => 0
        ]);

        $product4->translations()->updateOrCreate(
            ['translatable_id' => '4' , 'translatable_type' => 'App\Models\Product', 'lang_id' => '1'] ,
            ['lang_id' => '1' , 'name' => 'TV' , 'url' => 'tv']
        );

        $product4->translations()->updateOrCreate(
            ['translatable_id' => '4' , 'translatable_type' => 'App\Models\Product', 'lang_id' => '2'] ,
            ['lang_id' => '2' , 'name' => "تلفاز" , 'url' => 'تلفاز']
        );

        $product5 =  Product::create(['price' => 2500,
            'quantity' => 59,'sku' => 'ABC77','views' => 0
        ]);

        $product5->translations()->updateOrCreate(
            ['translatable_id' => '5' , 'translatable_type' => 'App\Models\Product', 'lang_id' => '1'] ,
            ['lang_id' => '1' , 'name' => 'Ipade' , 'url' => 'ipade']
        );

        $product5->translations()->updateOrCreate(
            ['translatable_id' => '5' , 'translatable_type' => 'App\Models\Product', 'lang_id' => '2'] ,
            ['lang_id' => '2' , 'name' => "ايباد" , 'url' => 'ايباد']
        );



        $product6 =  Product::create(['price' => 2500,
            'quantity' => 59,'sku' => 'ABC889','views' => 0
        ]);

        $product6->translations()->updateOrCreate(
            ['translatable_id' => '6' , 'translatable_type' => 'App\Models\Product', 'lang_id' => '1'] ,
            ['lang_id' => '1' , 'name' => 'Radio' , 'url' => 'radio']
        );

        $product6->translations()->updateOrCreate(
            ['translatable_id' => '6' , 'translatable_type' => 'App\Models\Product', 'lang_id' => '2'] ,
            ['lang_id' => '2' , 'name' => "راديو" , 'url' => 'راديو']
        );


        $product1->categories()->sync([1,2,3]);
        $product2->categories()->sync([1,2,3]);
        $product3->categories()->sync([1,2,3]);
        $product4->categories()->sync([1,2,3]);
        $product5->categories()->sync([1,2,3]);
        $product6->categories()->sync([1]);


    }
}
