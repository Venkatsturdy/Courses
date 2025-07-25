<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->truncate();
        
        Admin::create([
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('Admin@123'),
            'status' => 1,
        ]);
    }
}
