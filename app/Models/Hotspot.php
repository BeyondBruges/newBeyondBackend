<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotspot extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'hotspots';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'level_id',
        'key',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
