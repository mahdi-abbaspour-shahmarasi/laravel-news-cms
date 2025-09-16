<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LinkPosition;

class LinkPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(LinkPosition::latest()->count()==0)
        {
            LinkPosition::create(['link_id'=>1, 'position_id'=>1]);
        }
    }
}
