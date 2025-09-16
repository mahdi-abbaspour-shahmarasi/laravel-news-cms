<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Link;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Link::latest()->count()==0)
        {
            Link::create(['name'=>'خانه', 'thumbnail'=>'', 'url'=>'./', 'target'=>'_self', 'click_count'=>0, 'is_published'=>1]);
        }
    }
}
