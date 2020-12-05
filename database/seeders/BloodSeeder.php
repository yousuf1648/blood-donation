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
        Blood::create(['blood_value'=>'11','blood_name'=>'A+']);
        Blood::create(['blood_value'=>'12','blood_name'=>'A-']);
        Blood::create(['blood_value'=>'13','blood_name'=>'B+']);
        Blood::create(['blood_value'=>'14','blood_name'=>'B-']);
        Blood::create(['blood_value'=>'15','blood_name'=>'O+']);
        Blood::create(['blood_value'=>'16','blood_name'=>'O-']);
        Blood::create(['blood_value'=>'17','blood_name'=>'AB+']);
        Blood::create(['blood_value'=>'18','blood_name'=>'AB-']);
    }
}
