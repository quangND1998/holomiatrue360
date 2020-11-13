<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
        $user1->assignRole('administrator');

        $user2 = User::create([
            'name' => '3Dcontent',
            'email' => '3dcontent@3dcontent.com',
            'password' => bcrypt('password')
        ]);
        $user2->assignRole('3dcontent');

    }
}
