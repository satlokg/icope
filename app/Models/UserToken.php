<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserToken extends Model
{
    use HasFactory;
    protected $fillable=[
        'device_id','user_id'
    ];
    public function scopeDevice($query, $device_id,$user_id)
    {
        return $query->where('device_id', $device_id)->where('user_id',$user_id);
    }
}
