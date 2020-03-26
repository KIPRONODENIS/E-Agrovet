<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(RolesTableSeeder::class);
       $this->call(UsersTableSeeder::class);
       $this->call(ProductTableSeeder::class);
       $this->call(ServicesTableSeeder::class);
       $this->call(RolePermissionSeeder::class);


    }
}
