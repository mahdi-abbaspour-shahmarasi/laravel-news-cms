<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Setting::latest()->count()==0)
        {
            Setting::create(['name'=>'SiteTitle', 'value'=>'سایت خبری من', 'thumbnail'=>'', 'description'=>'']);
            Setting::create(['name'=>'SiteDescription', 'value'=>'پایگاه خبری تحلیلی من', 'thumbnail'=>'', 'description'=>'']);
        }
    }
}
