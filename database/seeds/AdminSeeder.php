<?php


use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $user = \App\User::firstOrCreate([
            'name' => "Marduk",
            'email' => 'marduk@mail.com',
            'password' => bcrypt('123456789'),
        ]);
        $adminRole = \App\Role::where('id','=',1)->first();
        $user->roles()->attach($adminRole);
    }

}