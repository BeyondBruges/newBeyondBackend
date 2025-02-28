<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dialogue extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'dialogues';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'key',
        'hotspot_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hotspot()
    {
        return $this->belongsTo(Hotspot::class, 'hotspot_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
