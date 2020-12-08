<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = User::latest('id')->first();
        $id = null;
        $dis_code = "33";
        $blood_code = "11";
        $last_disit = "101";
        if(empty($userId)){
            $id = $dis_code.$blood_code.$last_disit;
        }
        $user =  User::create([
            'role_id' => '1',
            'donor_id' => $id,
            'name' => 'Projanmo IT',
            'username' => 'admin_proit',
            'first_mobile' => '017512131313',
            'email' => 'admin@projanmoit.com',
            'present_address' => 'Mohammadpur',
            'password' => Hash::make('Proit@1971.net'),
        ]);

        DB::table('users')->insert([
            'role_id' => '3',
            'donor_id' => $id+1,
            'name' => 'Md.User',
            'username' => 'user',
            'first_mobile' => '017512141414',
            'email' => 'user@gmail.com',
            'present_address' => 'Mohammadpur',
            'password' => Hash::make('user'),
        ]);
    }
}
