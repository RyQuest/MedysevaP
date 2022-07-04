<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

use App\Models\Educations;
use App\Models\Experiences;
use App\Models\Chamber;
use App\Models\UserProfile;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    //     'guest' => 'boolean',
    //     'student' => 'boolean',
    //     'patient' => 'boolean',
    //     'check' => 'boolean',
    //     'bpMed' => 'boolean',
    //     'subscription' => 'boolean',
    //     'preScanCompleted' => 'boolean',
    // ];
    
    
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
 
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Get the educations for the user.
     */
    public function educations(){
        return $this->hasMany(Educations::class, 'user_id', 'id');
    }

    /**
     * Get the experiences for the user.
     */
    public function experiences(){
        return $this->hasMany(Experiences::class, 'user_id', 'id');
    }

    /**
     * Get the experiences for the user.
     */
    public function profile(){
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }

}
