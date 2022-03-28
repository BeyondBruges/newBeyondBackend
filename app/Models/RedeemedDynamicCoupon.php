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

}
