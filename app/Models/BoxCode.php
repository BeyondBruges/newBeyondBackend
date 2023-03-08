<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'box_category_id',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(BoxCodeCategory::class, 'box_category_id');
    }

}
