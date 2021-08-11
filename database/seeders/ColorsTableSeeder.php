<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $red = Color::create(['code' => '#FF0000']);
        $black = Color::create(['code' => '#000000']);
        $green = Color::create(['code' => '#008000']);
        $blue = Color::create(['code' => '#87CEEB']);

        $red->translations()->create([
            'lang_id' => 1,
            'name' => 'red'
        ]);

        $black->translations()->create([
            'lang_id' => 1,
            'name' => 'black'
        ]);

        $green->translations()->create([
            'lang_id' => 1,
            'name' => 'green'
        ]);

        $blue->translations()->create([
            'lang_id' => 1,
            'name' => 'blue'
        ]);

        $red->translations()->create([
            'lang_id' => 2,
            'name' => 'احمر'
        ]);

        $black->translations()->create([
            'lang_id' => 2,
            'name' => 'اسود'
        ]);

        $green->translations()->create([
            'lang_id' => 2,
            'name' => 'اخضر'
        ]);

        $blue->translations()->create([
            'lang_id' => 2,
            'name' => 'ازرق'
        ]);
    }
}
