<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        App\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'address' => 'Kbn nanas',
            'phone' => '087899887788',
            'role' => 'admin'
        ]);

        // sample customer
        App\User::create([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('secret'),
            'address' => 'Cikokol',
            'phone' => '081266335242',
            'role' => 'customer'
        ]);

    }
}
