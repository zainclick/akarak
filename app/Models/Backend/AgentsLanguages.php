<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentsLanguages extends Model
{
    use HasFactory;
    public $guarded=[];
    public function getRouteKeyName(){
        return 'slug';
    }

    public function language_fk(){
        return $this->belongsTo(\App\Models\Backend\languages::class,'language');
    }
}
