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
        $user = \App\User::create([
            'name' => 'superadmin',
            'email' => 'super_admin@app.com',
            'mobile' => '01091447746',
            'password' => bcrypt('123456'),
        ]);

        $user->attachRole('super_admin');
        //
    }
}
