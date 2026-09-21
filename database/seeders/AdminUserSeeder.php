<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'surygin.ai@yandex.ru'],
            [
                'name' => 'Администратор',
                'password' => Hash::make('1234'),
                'is_admin' => true,
                'is_manager' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin2@example.com'],
            [
                'name' => 'Администратор 2',
                'password' => Hash::make('1234'),
                'is_admin' => false,
                'is_manager' => true,
            ]
        );
    }
}
