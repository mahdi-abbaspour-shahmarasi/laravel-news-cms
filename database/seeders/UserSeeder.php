<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // نقش‌ها رو ایجاد کن
        Role::firstOrCreate(['name' => 'super_admin']); // <-- اضافه شد

        // حالا یوزر رو بساز و نقش اختصاص بده
        $user = User::create([
            'name' => 'مدیرسیستم',
            'email'=>'admin@admin.com',
            'phone' => '0914',
            'password' => '998877',
            'is_active' => 1,
            'avatar' => '',
        ]);

        $user->assignRole('super_admin');
    }
}
