<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@sdnsindangmulya04.sch.id'],
            [
                'name'     => 'Admin',
                'email'    => 'admin@sdnsindangmulya04.sch.id',
                'password' => Hash::make('admin123456'),
            ]
        );
    }
}
