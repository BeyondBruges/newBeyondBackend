<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Company extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'companies';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'logo_white',
        'logo_color',
        'favicon',
        'logo',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'lat',
        'lng',
        'google_analyitics',
        'sendinblue_user',
        'sendinblue_password',
        'onesignal_appid',
        'onesignal_apikey',
        'created_at',
        'updated_at',
        'deleted_at',
        'landmark_cost',
        'level_cost',
        'status_ios',
        'bryghia_store',
        'facebook_login',
        'unlock_all_price',
        'unlock_time_quest_price',
        'unlock_visit_price',
        'welcome_email'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getLogoWhiteAttribute()
    {
        $file = $this->getMedia('logo_white')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getLogoColorAttribute()
    {
        $file = $this->getMedia('logo_color')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getFaviconAttribute()
    {
        return $this->getMedia('favicon')->last();
    }

    public function getLogoAttribute()
    {
        $file = $this->getMedia('logo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
