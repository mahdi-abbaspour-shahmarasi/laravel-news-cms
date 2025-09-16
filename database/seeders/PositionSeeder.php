<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Position::latest()->count()==0)
        {
            Position::create(['name'=>'منوی اصلی',  'slug'=>'mainMenu', 'description'=>'']);
            Position::create(['name'=>'منوی پاورقی',  'slug'=>'footer', 'description'=>'']);            
        }
    }
}
