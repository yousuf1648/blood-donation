<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Blood;

class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blood::create(['blood_value'=>'11','blood_name'=>'A+ পজেটিভ']);
        Blood::create(['blood_value'=>'12','blood_name'=>'A- নেগেটিভ']);
        Blood::create(['blood_value'=>'13','blood_name'=>'B+ পজেটিভ']);
        Blood::create(['blood_value'=>'14','blood_name'=>'B- নেগেটিভ']);
        Blood::create(['blood_value'=>'15','blood_name'=>'O+ পজেটিভ']);
        Blood::create(['blood_value'=>'16','blood_name'=>'O- নেগেটিভ']);
        Blood::create(['blood_value'=>'17','blood_name'=>'AB+ পজেটিভ']);
        Blood::create(['blood_value'=>'18','blood_name'=>'AB- নেগেটিভ']);
    }
}
