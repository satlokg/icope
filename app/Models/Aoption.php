<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aoption extends Model
{
    use HasFactory;
    protected $hidden = [
        'created_at',
        'updated_at',
        'assessment_id'
    ];

}
