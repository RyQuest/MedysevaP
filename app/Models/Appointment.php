<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patients;
use App\Models\Chamber;
use App\Models\User;
use App\Models\PaymentUser;

class Appointment extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function patients(){
        return $this->hasMany(Patients::class, 'id', 'patient_id');
    }

    public function patient(){
        return $this->hasOne(Patients::class, 'id', 'patient_id');
    }

    public function chamber(){
        return $this->belongsTo(Chamber::class, 'chamber_id', 'uid');
    }

    public function doctor(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function payment_user(){
        return $this->hasOne(PaymentUser::class, 'appointment_id', 'id');
    }
}
