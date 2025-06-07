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
        // Check if user with this email already exists
        $user = User::where('email', 'johntraya9@gmail.com')->first();
        
        if ($user) {
            // Update existing user
            $user->update([
                'name' => 'Admin User',
                'phone' => '09393731828',
                'address' => 'Admin Address',
                'usertype' => '1', // Admin user type
                'password' => Hash::make('09393731828a'),
            ]);
            
            $this->command->info('Admin user updated successfully.');
        } else {
            // Create new user
            User::create([
                'name' => 'Admin User',
                'email' => 'johntraya9@gmail.com',
                'phone' => '09393731828',
                'address' => 'Admin Address',
                'usertype' => '1', // Admin user type
                'password' => Hash::make('09393731828a'),
            ]);
            
            $this->command->info('Admin user created successfully.');
        }
    }
} 