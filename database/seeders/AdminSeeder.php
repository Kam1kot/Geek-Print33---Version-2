<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            ['username' => config('auth.owner_login'), 'password' => bcrypt(config('auth.owner_pass'))],
            ['username' => config('auth.dev_login'), 'password' => bcrypt(config('auth.dev_pass'))],
        ];
        
        foreach ($admins as $admin) {
            Admin::firstOrCreate($admin);
        }
    }
}
