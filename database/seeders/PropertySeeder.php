<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Property;
class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        if(Property::latest()->count()==0)
        {
            Property::create(['name'=>'مدت زمان مطالعه خبر', 'thumbnail'=>'', 'description'=>'']);
            Property::create(['name'=>'نویسنده', 'thumbnail'=>'', 'description'=>'']);
        }
    }
}
