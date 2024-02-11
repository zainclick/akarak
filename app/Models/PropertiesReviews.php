<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertiesReviews extends Model
{
    use HasFactory;

    public $guarded=[];


    public function user_fk(){
        return $this->belongsTo(\App\Models\Backend\FrontUsers::class,'user');

    }
}
