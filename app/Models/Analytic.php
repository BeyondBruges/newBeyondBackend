<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Analytic extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'analytics';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'value',
        'type_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function type()
    {
        return $this->belongsTo(AnalyticType::class, 'type_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
