<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const COUPONTYPE_SELECT = [
        'free'      => 'Free',
        'discount'  => 'Discount',
        'twoforone' => '2x1',
    ];

    public $table = 'coupons';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'description',
        'value',
        'coupontype',
        'partner_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
