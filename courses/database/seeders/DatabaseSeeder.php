<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run individual seeders
        $this->call([
            StudentSeeder::class,
            CourseSeeder::class,
            ProfessorSeeder::class,
        ]);

        // Create one test user for login
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
