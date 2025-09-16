<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Category extends Model
{
    use LogsActivity;

    protected $fillable=['parent_id', 'name',  'slug', 'thumbnail', 'description'];

    public function parent():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['parent_id','name', 'slug', 'thumbnail', 'description']);
    }
}
