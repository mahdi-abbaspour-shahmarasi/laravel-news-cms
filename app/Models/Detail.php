<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Detail extends Model
{
    use LogsActivity;

    protected $fillable=['property_id', 'post_id', 'value'];
    
    public function property():BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function post():BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['property_id', 'post_id', 'value']);
    }
}
