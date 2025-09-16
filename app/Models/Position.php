<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Position extends Model
{
    use LogsActivity;

    protected $fillable=['name',  'slug', 'description'];    

    public function links():BelongsToMany
    {
        return $this->belongsToMany(Link::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'slug', 'description']);
    }
}
