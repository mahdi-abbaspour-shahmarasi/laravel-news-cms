<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Setting extends Model
{
    use LogsActivity;

    protected $fillable=['name', 'value', 'thumbnail', 'description'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'value', 'thumbnail', 'description']);
    }
}