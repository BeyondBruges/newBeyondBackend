<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Partner extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public $table = 'partners';

    public static $searchable = [
        'name',
        'email',
    ];

    protected $appends = [
        'logo',
        'gallery',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'url',
        'lat',
        'lng',
        'facebook',
        'instagram',
        'tiktok',
        'email',
        'created_at',
        'updated_at',
        'deleted_at',
        'phone',
        'address',
        'partner_category_id'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function partnerCoupons()
    {
        return $this->hasMany(Coupon::class, 'partner_id', 'id');
    }

    public function partnerPartnerUsers()
    {
        return $this->hasMany(PartnerUser::class, 'partner_id', 'id');
    }

    public function partnerPartnerDescriptions()
    {
        return $this->hasMany(PartnerDescription::class, 'partner_id', 'id');
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

    public function getGalleryAttribute()
    {
        $files = $this->getMedia('gallery');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()

    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(PartnerCategory::class, 'partner_category_id');
    }

}
