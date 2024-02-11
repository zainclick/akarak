<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersFavorites extends Model
{
    use HasFactory;
    public $guarded=[];

    public function property_fk(){
        return $this->belongsTo(\App\Models\Backend\Properties::class,'property');
    }
}
