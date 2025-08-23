<?php

namespace Database\Seeders;

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
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $admin = User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('test'),
        ]);

        //$admin->syncRoles(['admin']);

        $this->call([
            StudentSeeder::class,
            InstructorSeeder::class,
        ]);
    }
}
