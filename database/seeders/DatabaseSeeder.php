<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([           
            UserSeeder::class,
            CategorySeeder::class,
            SettingSeeder::class,
            PageSeeder::class,
            PositionSeeder::class,
            LinkSeeder::class,
            LinkPositionSeeder::class,
            PostSeeder::class,
            CategoryPostSeeder::class,
            CommentSeeder::class,
            PropertySeeder::class,         
            DetailSeeder::class,   
        ]);
    }
}
