<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use LogsActivity;

    protected $fillable=['on_titr', 'titr', 'lead', 'remote_thumbnail', 'local_thumbnail', 'text', 'view_count', 'is_published', 'allow_comments', 'tags', 'user_id', 'source_name', 'source_url', 'auther'];
    
    protected $appends = [
        'thumbnail',
        'auther_name'
    ];

    public function getThumbnailAttribute()
    { 
        if($this->remote_thumbnail!='')       
            return $this->remote_thumbnail;
        else
            return $this->local_thumbnail;
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories():BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function details():HasMany
    {
        return $this->hasMany(Detail::class);
    }

    public function getAutherNameAttribute()
    {
        if($this->auther!="")
        {
            return $this->auther;
        }
        else
        {
            return $this->user->name;
        }
    }
   

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['on_titr', 'titr', 'lead', 'remote_thumbnail', 'local_thumbnail', 'text', 'view_count', 'is_published', 'allow_comments', 'tags', 'user_id', 'source_name', 'source_url', 'auther']);
    }
}