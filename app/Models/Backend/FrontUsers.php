<?php

namespace App\Models\Backend;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Image\Manipulations;


class FrontUsers extends Authenticatable implements HasMedia
{
    use HasRoles;
    use HasFactory;
    use Notifiable;
    use InteractsWithMedia;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [ 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    /*protected $appends = [
        'profile_photo_url',
    ];*/


    public function getUserAvatar($type="thumb"){
        if($this->avatar==null)
            return env('DEFAULT_IMAGE_AVATAR');
        else
            return env("STORAGE_URL").'/'.\MainHelper::get_conversion($this->avatar,$type);
    }
    
    public function scopeWithoutTimestamps()
    {
        $this->timestamps = false;
        return $this;
    }
    public function contacts(){
        return $this->hasMany(\App\Models\Contact::class);
    }
    public function articles(){
        return $this->hasMany(\App\Models\Article::class);
    }
    public function comments(){
        return $this->hasMany(\App\Models\ArticleComment::class);
    }
    public function traffics(){
        return $this->hasMany(\App\Models\RateLimit::class);
    }

    public function report_errors(){
        return $this->hasMany(\App\Models\ReportError::class);
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

    public function is_online(){
        if($this->last_activity<\Carbon::now()->subMinutes(10)->format('Y-m-d H:i:s'))
            return 0;return 1;
        //return $this->last_activity;
    }


    public function item_seens()
    {
        return $this->hasMany(\App\Models\ItemSeen::class,'type_id','id')->where('type',"USER");
    }

}