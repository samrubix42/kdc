<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the application's default admin user.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@kdc.com'],
            [
                'name' => 'KDC Admin',
                'password' => 'admin12345',
            ]
        );
    }
}
