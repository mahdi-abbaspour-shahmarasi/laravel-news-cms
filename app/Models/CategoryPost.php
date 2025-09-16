<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class CategoryPost extends Model
{
    use LogsActivity;

    protected $fillable=['category_id', 'post_id'];

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function post():BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['category_id', 'post_id']);
    }
}
