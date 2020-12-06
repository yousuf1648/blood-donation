<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            'text' => 'Blood Donation',
            'link' => '',
            'image' => 'backend/img/slider/default_slider.jpg',
        ]);
    }
}
