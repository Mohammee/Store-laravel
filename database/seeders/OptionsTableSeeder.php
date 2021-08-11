<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Variation;
use App\Models\VariationValue;
use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $optoin1 = Option::create();
        $optoin1->translations()->create(['lang_id' => 1, 'name' => 'color']);
        $optoin1->translations()->create(['lang_id' => 2, 'name' => 'اللون']);

        $value1 = $optoin1->optionValues()->create();
        $value1->translations()->create(['lang_id' => 1, 'name' => 'red']);
        $value1->translations()->create(['lang_id' => 2, 'name' => 'احمر']);


        $value2 = $optoin1->optionValues()->create();
        $value2->translations()->create(['lang_id' => 1, 'name' => 'black']);
        $value2->translations()->create(['lang_id' => 2, 'name' => 'اسود']);


        $optoin2 = Option::create();
        $optoin2->translations()->create(['lang_id' => 1, 'name' => 'size']);
        $optoin2->translations()->create(['lang_id' => 2, 'name' => 'الحجم']);

        $value3 = $optoin2->optionValues()->create();
        $value3->translations()->create(['lang_id' => 1, 'name' => 'xl']);
        $value3->translations()->create(['lang_id' => 2, 'name' => 'xl']);

        $variation1 = Variation::create([
            'product_id' => 1,
            'price' => 200,
            'stock' => 20,
            'option_values' => [1,3],
            'color_id' => 1
        ]);

        $variation2 = Variation::create([
            'product_id' => 1,
            'price' => 300,
            'stock' => 30,
            'option_values' => [2,3],
            'color_id' => 2
        ]);


    }
}
