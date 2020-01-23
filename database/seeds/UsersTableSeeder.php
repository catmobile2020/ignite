<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'=>'admin',
            'username'=>'admin',
            'email'=>'m.mohamed@cat.com.eg',
            'password'=>bcrypt(123456),
        ]);
    }
}
