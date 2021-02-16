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
        App\User::create([
            'name' => 'Arturo Muñoz',
            'email' => 'admin@admin.com',
            'email_verified_at' => '2021-02-09 14:36:19',
            'password' => bcrypt('123'),

        ]);

        factory(\App\User::class, 7)->create();
    }
}
