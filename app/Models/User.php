<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;
    use HasFactory;
    use HasApiTokens;

    public $table = 'users';

    public static $searchable = [
        'name',
        'email',
    ];

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'udid',
        'created_at',
        'updated_at',
        'deleted_at',
        'device'
    ];

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function userTransactions()
    {
        return $this->hasMany(Transaction::class, 'user_id', 'id');
    }

    public function userPartnerUsers()
    {
        return $this->hasMany(PartnerUser::class, 'user_id', 'id');
    }

    public function userUserLandmarks()
    {
        return $this->hasMany(UserLandmark::class, 'user_id', 'id')->with('landmark');
    }

    public function userUserLevels()
    {
        return $this->hasMany(UserLevel::class, 'user_id', 'id');
    }

    public function userUserQrCodes()
    {
        return $this->hasMany(UserQrCode::class, 'user_id', 'id');
    }

    public function userUserTransactions()
    {
        return $this->hasMany(UserTransaction::class, 'user_id', 'id');
    }

    public function userUserCoupons()
    {
        return $this->hasMany(UserCoupon::class, 'user_id', 'id');
    }

    public function userUserDynamicCoupons()
    {
        return $this->hasMany(UserDynamicCoupon::class, 'user_id', 'id');
    }

    public function userUserLevelObjects()
    {
        return $this->hasMany(UserLevelObject::class, 'user_id', 'id');
    }

    public function userUserLevelQuestions()
    {
        return $this->hasMany(UserLevelQuestion::class, 'user_id', 'id');
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

        public function analytics()
    {
        return $this->hasMany(Analytic::class, 'user_id', 'id');
    }
    
        public function userCharacters()
    {
        return $this->hasMany(UserCharacter::class, 'user_id', 'id')->with('character');
    }

}
