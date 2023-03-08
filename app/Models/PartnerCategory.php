<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code'
    ];

    public function partners()
    {
        return $this->hasMany(Partner::class, 'partner_category_id', 'id');
    }
}
