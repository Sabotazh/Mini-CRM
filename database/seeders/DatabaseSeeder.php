<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
         User::factory(50)->create();

         User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@admin.com',
             'password' => 'password',
             'role' => 'admin',
         ]);

        $this->call([
            CompanySeeder::class,
        ]);
    }
}
