<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SideQuest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'key',
        'level_id'
    ];


    public function usersidequest()
    {
        return $this->hasMany(UserSideQuest::class, 'side_quest_id', 'id');
    }
        public function levels()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}
