<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedeemedDynamicCoupon extends Model
{
    use HasFactory;

        protected $fillable = [

            'partner_id',
            'dynamic_coupon_id',
            'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dynamicCoupon()
    {
        return $this->belongsTo(DynamicCoupon::class, 'dynamic_coupon_id');
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }


}
