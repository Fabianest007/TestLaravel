<?php

use App\User;
use Illuminate\Database\Seeder;

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
        $user->name= 'Fabián';
        $user->email = 'fabianestefania@gmail.com';
        $user->password = bcrypt('secreto');
        $user->save();
    }
}
