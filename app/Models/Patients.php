<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\Appointment;

class Patients extends Authenticatable implements JWTSubject
{
    use HasApiTokens,HasFactory,Notifiable;
    
    protected $table = "patientses";
    protected $guarded = ['id'];
    
    public $timestamps = false;

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

    public function appointment(){
        return $this->belongsTo(Appointment::class, 'patient_id', 'id');
    }
}
