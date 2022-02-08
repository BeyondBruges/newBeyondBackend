<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartnerUser extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const STATUS_SELECT = [
        '0' => 'inactive',
        '1' => 'active',
    ];

    public $table = 'partner_users';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'partner_id',
        'user_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
