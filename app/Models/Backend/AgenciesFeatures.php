<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgenciesFeatures extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $guarded=[];

    public function agency_fk(){
        return $this->belongsTo(\App\Models\Backend\agencies::class,'agency','id');
    }
}
