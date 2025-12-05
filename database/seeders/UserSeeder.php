<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            'super_admin' => 1,
            'admin' => 2,
            'manager' => 3,
            'client' => 4,
        ];

        foreach ($positions as $role => $id) {
            User::updateOrCreate(
                ['username' => $role],
                [
                    'name' => strtoupper($role),
                    'password' => Hash::make('1234'),
                    'position_id' => $id,
                    'phone' => '+998935273335' . $id,
                    'passport' => 'AB7938253' . $id,
                    'jshshir' => '50510016810045' . $id,
                    'email' => 'user' . $id . '@example.com',
                ]
            );
        }
    }
}
