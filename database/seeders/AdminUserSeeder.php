<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminEmail = 'admin@example.com';

        // Check if admin user already exists
        if (User::where('email', $adminEmail)->exists()) {
            $this->command->info('Admin user already exists.');
            return;
        }

        $user = User::create([
            'name' => 'Admin User',
            'email' => $adminEmail,
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $this->command->info('Admin user created successfully!');
        $this->command->newLine();
        $this->command->info('Email: ' . $adminEmail);
        $this->command->info('Password: password');
        $this->command->newLine();
        $this->command->warn('Please change the password after first login!');
    }
}
