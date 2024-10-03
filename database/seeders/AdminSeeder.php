<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'ali',
            'email' => 'ali1@gmail.com',
            'password' => bcrypt('12341234a'),
            'phone' => '+971 56 445 7760',
            'role' => 2
        ]);

        $admin = User::find(1);
        $wallet = Wallet::create([
            'user_id' => $admin->id,
            'number' => random_int(1000000000000, 9000000000000),
            'value' => 0,
        ]);
    }
}
