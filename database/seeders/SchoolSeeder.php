<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = School::create([
            'name' => 'demo',
            'domain' => 'http://yhdengdeng.net',
            'description' => '测试',
            'user_id' => 1,
            'tel' => '18090900234',
            'email' => '18090900233@qq.com',
        ]);
    }
}
