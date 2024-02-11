<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperAgents extends Model
{
    use HasFactory;
    public $guarded=[];


    public function agent_fk(){
        return $this->belongsTo(\App\Models\Backend\Agents::class,'agent','id');
    }

    public function agency_fk(){
        return $this->belongsTo(\App\Models\Backend\agencies::class,'agency','id');
    }
}
