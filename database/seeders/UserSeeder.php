<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(50)->create();
        $user = $users[0];
        $user['name'] = '吴侬软语';
        $user['mobile'] = 18090900235;
        $user['password'] = Hash::make('admin888');
        $user->save();

        $user = $users[1];
        $user['name'] = '张三';
        $user['mobile'] = 18090900236;
        $user['password'] =  Hash::make('admin888');
        $user->save();
    }
}
