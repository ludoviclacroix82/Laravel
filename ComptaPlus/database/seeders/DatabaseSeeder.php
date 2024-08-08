<?php

namespace Database\Seeders;

use App\Models\Clients;
use App\Models\Invoices;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ludovic',
            'email' => 'ludo@comptaPlus.com',
            'password' => 'root',
            'role'=>'admin'
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@comptaPlus.com',
            'password' => 'root',
            'role'=>'user'
        ]);

        User::factory(15)->create();
        Clients::factory(50)->create();
        Invoices::factory(50)->create();
    }
}
