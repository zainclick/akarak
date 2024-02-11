<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertiesFeaturesIcons extends Model
{
    use HasFactory;
    public $guarded=[];


    public function features_fk(){
        return $this->belongsTo(\App\Models\Backend\Features::class,'feature','id');
    }
    
}
