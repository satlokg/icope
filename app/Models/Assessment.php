<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;
    protected $table = 'assestments';
    public function aoptions()
    {
        return $this->hasMany(Aoption::class);
    }
}
