<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@eims.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Technician User',
            'email' => 'tech@eims.com',
            'password' => bcrypt('password'),
            'role' => 'technician',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Reporter User',
            'email' => 'reporter@eims.com',
            'password' => bcrypt('password'),
            'role' => 'reporter',
        ]);

        \App\Models\Equipment::create([
            'name' => 'X-Ray Machine Gate 1',
            'serial_number' => 'XR-2023-001',
            'purchase_date' => '2023-01-15',
            'location' => 'Keberangkatan Gate 1',
            'status' => 'active',
        ]);

        \App\Models\Equipment::create([
            'name' => 'Walkthrough Metal Detector Gate 2',
            'serial_number' => 'WTMD-2023-005',
            'purchase_date' => '2023-02-20',
            'location' => 'Keberangkatan Gate 2',
            'status' => 'maintenance',
        ]);
    }
}
