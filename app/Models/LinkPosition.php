<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class LinkPosition extends Model
{
    protected $table = 'link_position';
    use LogsActivity;

    protected $fillable=['link_id', 'position_id'];

    public function link():BelongsTo
    {
        return $this->belongsTo(Link::class);
    }

    public function position():BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['link_id','position_id']);
    }

}
