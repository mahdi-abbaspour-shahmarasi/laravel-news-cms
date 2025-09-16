<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Category::latest()->count()==0)
        {
            Category::create(['name'=>'دسته اصلی', 'slug'=>'دسته-اصلی', 'thumbnail'=>'', 'description'=>'']);
            Category::create(['parent_id'=>1, 'name'=>'اخبار', 'slug'=>'اخبار', 'thumbnail'=>'', 'description'=>'']);
            Category::create(['parent_id'=>1, 'name'=>'گزارش', 'slug'=>'گزارش', 'thumbnail'=>'', 'description'=>'']);
            Category::create(['parent_id'=>1, 'name'=>'مصاحبه', 'slug'=>'مصاحبه', 'thumbnail'=>'', 'description'=>'']);
            Category::create(['parent_id'=>1, 'name'=>'یادداشت', 'slug'=>'یادداشت', 'thumbnail'=>'', 'description'=>'']);
            Category::create(['parent_id'=>1, 'name'=>'گزارش تصویری', 'slug'=>'گزارش تصویری', 'thumbnail'=>'', 'description'=>'']);           
        }
    }
}
