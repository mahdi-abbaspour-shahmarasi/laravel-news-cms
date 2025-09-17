<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Comment extends Model
{
    use LogsActivity;

    protected $fillable=['name',  'email', 'phone', 'content_type', 'content_id', 'content', 'is_published', 'like_count', 'dislike_count'];
    protected $appends = [
        'content_title',
    ];

    public function getContentTitleAttribute()
    {
        if($this->content_type=="PAGE")
        {
            return Page::where('id', $this->content_id)->first()->name;
        }
        else
        {
            return Page::where('id', $this->content_id)->first()->name;
        }
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name',  'email', 'phone', 'content_type', 'content_id', 'content', 'is_published', 'like_count', 'dislike_count']);
    }
}
