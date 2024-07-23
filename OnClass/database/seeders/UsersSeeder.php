<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        DB::table('users')->insert([
//            "name" => "Hieu",
//            "email" => "hieu@gmail.com",
//            "password" => Hash::make('12345678'),
//            "created_at" => Carbon::now(),
//            "updated_at" => Carbon::now(),
//        ]);

        User::factory(10)->create();
    }
}
