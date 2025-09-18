<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Agent\Agent;

class Visit extends Model
{

    protected $fillable=['ip_address', 'user_agent', 'url', 'parameters', 'user_id'];

    protected $appends = [
        'browser','platform', 'device', 'user'
    ];

    public function getBrowserAttribute()
    {
        //return User::where('id',1)->first()->name;
        $agent = new Agent();
        $agent->setUserAgent($this->user_agent);
        return $agent->browser();
    }

    public function getPlatformAttribute()
    {
        //return User::where('id',1)->first()->name;
        $agent = new Agent();
        $agent->setUserAgent($this->user_agent);
        return $agent->platform();
    }

    public function getDeviceAttribute()
    {
        $device="PC";
        $agent = new Agent();
        $agent->setUserAgent($this->user_agent);
        if($agent->isMobile())
        {
            $device="Mobile";
        }
        return $device;
    }

    public function getUserAttribute()
    {
        $user="میهمان";
        if($this->user_id!=null)
        {
            $user=User::where('id',$this->user_id)->first()->name;
        }
        return $user;
    }

}
