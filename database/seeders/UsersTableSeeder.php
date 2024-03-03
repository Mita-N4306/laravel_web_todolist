<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追加

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('users')->insert([
        'name' => '三田村',
        'email' => 'zango3333@yahoo.co.jp',
        'password' => bcrypt('12345678'),
      ]);
      DB::table('users')->insert([
        'name' => '北山',
        'email' => 'kita-shi0605@gmail.com',
        'password' => bcrypt('12345678'),
      ]);
      DB::table('users')->insert([
        'name' => '山田',
        'email' => 'yama0302@yahoo.co.jp',
        'password' => bcrypt('12345678'),
      ]);
      DB::table('users')->insert([
        'name' => '鈴木',
        'email' => 'suzuki0710@yahoo.co.jp',
        'password' => bcrypt('12345678'),
      ]);
      DB::table('users')->insert([
        'name' => 'MORI',
        'email' => 'shi-mo0528@gmail.com',
        'password' => bcrypt('12345678'),
      ]);
      DB::table('users')->insert([
        'name' => '坂井',
        'email' => 'saka-0623@yahoo.co.jp',
        'password' => bcrypt('12345678'),
      ]);
      DB::table('users')->insert([
        'name' => 'DAI',
        'email' => 'daiki0812@yahoo.co.jp',
        'password' => bcrypt('12345678'),
      ]);
    }
}
