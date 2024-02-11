<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    use HasFactory;
    public $guarded=[];

    public function p_features_fk(){
        return $this->hasMany(\App\Models\Backend\PropertiesFeatures::class,'id','feature');
    }

}
