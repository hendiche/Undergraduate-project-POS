<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Super';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('admin');
        $user->phone = 'none';
        $user->address = 'none';
        $user->save();

        $user->assignRole('admin');
    }
}
