<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSideQuest extends Model
{

    protected $fillable = [
        'user_id',
        'side_quest_id'
    ];


    use HasFactory;

    public function sidequest()
    {
        return $this->belongsTo(SideQuest::class, 'side_quest_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
