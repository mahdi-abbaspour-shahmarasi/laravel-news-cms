<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use LogsActivity;

    protected $fillable=['on_titr', 'titr', 'lead', 'remote_thumbnail', 'local_thumbnail', 'text', 'view_count', 'is_published', 'allow_comments', 'tags', 'user_id'];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories():BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['on_titr', 'titr', 'lead', 'remote_thumbnail', 'local_thumbnail', 'text', 'view_count', 'is_published', 'allow_comments', 'tags', 'user_id']);
    }
}