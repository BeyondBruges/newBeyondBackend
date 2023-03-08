<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxCodeCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function codes()
    {
        return $this->hasMany(BoxCode::class, 'box_category_id', 'id');
    }
}
