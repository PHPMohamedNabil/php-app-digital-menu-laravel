<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     

         User::create(['name'=>'admin',
                       'email'=>'admin@admin.com',
                       'password'=>bcrypt('123'),
                       'email_verified_at'=>NOW()]);
    }
}
