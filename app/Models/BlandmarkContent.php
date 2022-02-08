<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlandmarkContent extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'blandmark_contents';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'landmark_id',
        'key',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function landmark()
    {
        return $this->belongsTo(BLandMark::class, 'landmark_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
