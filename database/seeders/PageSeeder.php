<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Page::latest()->count()==0)
        {
            Page::create(['name'=>'درباره ما', 'slug'=>'درباره-ما', 'thumbnail'=>'', 'description'=>'درباره پایگاه خبری ما', 'text'=>'این قسمت محل درج اطلاعاتی در خصوص پایگاه خبری می باشد', 'view_count'=>0, 'is_published'=>1, 'allow_comments'=>1]);
        }
    }
}
