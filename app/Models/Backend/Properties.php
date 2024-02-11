<?php

namespace App\Models\Backend;

use MainHelper;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Properties extends Model
{
    use HasFactory;
    use InteractsWithMedia;
    use SoftDeletes;
    public $guarded=[];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function agency_fk(){
        return $this->belongsTo(\App\Models\Backend\agencies::class,'agency','id');
    }

    public function agent_fk(){
        return $this->belongsTo(\App\Models\Backend\Agents::class,'agent','id');
    }

    public function property_features_fk(){
        return $this->hasMany(\App\Models\Backend\PropertiesFeatures::class,'property','id');
    }

    public function property_imgs_fk(){
        return $this->hasMany(\App\Models\Backend\PropertiesImages::class,'property','id');
    }


    public function city_fk(){
        return $this->belongsTo(\App\Models\Backend\citys::class,'city');
    }

    public function country_fk(){
        return $this->belongsTo(\App\Models\countries::class,'country');
    }

    public function type_fk(){
        return $this->belongsTo(\App\Models\Backend\PropertysTyps::class,'type');
    }

    public function status_fk(){
        return $this->belongsTo(\App\Models\Backend\PropertysStatus::class,'property_status');
    }



    public function main_image($type='thumb'){
        if($this->logo==null)
            return env('DEFAULT_IMAGE');
        else
            return env("STORAGE_URL").'/'.MainHelper::get_conversion($this->logo,$type);
    }

    public function second_image($type='thumb'){
        if($this->orn==null)
            return env('DEFAULT_IMAGE');
        else
            return env("STORAGE_URL").'/'.MainHelper::get_conversion($this->orn,$type);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('tiny')
            ->fit(Manipulations::FIT_MAX, 120, 120)
            ->width(120)
            ->format(Manipulations::FORMAT_WEBP)
            ->nonQueued();

        $this
            ->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_MAX, 350, 1000)
            ->width(350)
            ->format(Manipulations::FORMAT_WEBP)
            ->nonQueued();

        $this
            ->addMediaConversion('original')
            ->fit(Manipulations::FIT_MAX, 1200,10000)
            ->width(1200)
            ->format(Manipulations::FORMAT_WEBP)
            ->nonQueued();

    }
}
