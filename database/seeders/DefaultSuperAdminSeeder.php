<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DefaultSuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
            'name' => 'Super Admin',
            'email' => env('SUPER_ADMIN_EMAIL', 'sp-admin@example.com'),
            'password' => bcrypt(env('SUPER_ADMIN_PASSWORD', 'laravel123')),
            ]
            );
    }
}
