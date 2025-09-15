<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create system admin user
        if(User::latest()->count()==0)
        {
            $user = User::create([
            'name' => 'مدیرسیستم',
            'email'=>'admin@admin.com',
            'phone' => '0914',
            'password' => Hash::make('998877'),
            'is_active' => 1,
                'avatar' => '',
            ]);

            $role = \Spatie\Permission\Models\Role::create(['name'=>'Super Admin']);
            $user->assignRole(1);            
        }
        

    }
}
