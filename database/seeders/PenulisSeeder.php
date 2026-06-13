<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penulis;

class PenulisSeeder extends Seeder
{
    public function run(): void
    {
        Penulis::create([
            'nama_depan' => 'Admin',
            'nama_belakang' => 'System',
            'user_name' => 'admin',
            'password' => bcrypt('admin123'),
            'foto' => null
        ]);
    }
}