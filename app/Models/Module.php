<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    
    public function getFileLinkAttribute($value)
    {
        if($value!=NULL){
            return file_get_contents(public_path().'/pages/'.$value);
        }else{
            return '';
        }

    }
    public function assessments() {
        return $this->hasMany(Assessment::class);
    }
    public function is_attempted()
    {
       return $this->hasMany(SubmitAssessment::class);
    }
    public function is_complited(){
        return ($this->hasOne(Answer::class))?true:false;
    }
}
