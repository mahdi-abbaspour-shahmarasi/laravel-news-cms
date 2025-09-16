<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Page extends Model
{
    use LogsActivity;

    protected $fillable=['name', 'slug', 'thumbnail', 'description', 'text', 'view_count', 'is_published', 'allow_comments'];  
   
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'slug', 'thumbnail', 'description', 'text', 'view_count', 'is_published', 'allow_comments']);
    }
}
