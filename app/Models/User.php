<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Controllers\Dashboard\ConstantController;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasApiTokens;
   

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'type',
        'status',
        'avatar',
        'remember_token',
        'device_token',
        'verified_at',
        'device_id',
      
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'verified_at' => 'datetime',
    ];

    public function scopeNotAdmin($query)
    {
        return $query->where('type','!=',ConstantController::ADMIN);
    } 
    
    public function verifyUser()
    {
        return $this->hasOne(VerifyUser::class);
    }

    public function userToken()
    {
        return $this->hasOne(UserToken::class);
    }

     /**
    * Verify user mobile number
    * @return true
    */
    public function verify()
    {
        $this->verified = true;

        $this->save();

        $this->verifyUser()->delete();
    }
   
}
