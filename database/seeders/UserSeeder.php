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
            'name' => 'Md.Masum',
            'username' => 'masum20',
            'first_mobile' => '01750752781',
            'email' => 'mdmasum.uv@gmail.com',
            'present_address' => 'Mohammadpur',
            'password' => Hash::make('masum2781'),
        ]);

        DB::table('users')->insert([
            'role_id' => '3',
            'donor_id' => $id+1,
            'name' => 'Md.Admin',
            'username' => 'admin20',
            'first_mobile' => '01892273250',
            'email' => 'admin@gmail.com',
            'present_address' => 'Mohammadpur',
            'password' => Hash::make('admin2781'),
        ]);
    }
}
