<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Mr. Admin';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('password');
        $user->type = 'Admin';
        $user->save();

        $user = new User();
        $user->name = 'Mr. Seller';
        $user->email = 'seller@gmail.com';
        $user->password = bcrypt('password');
        $user->type = 'Seller';
        $user->save();

        $user = new User();
        $user->name = 'Mr. Customer';
        $user->email = 'customer@gmail.com';
        $user->password = bcrypt('password');
        $user->type = 'Customer';
        $user->save();
    }
}
