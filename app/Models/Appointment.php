<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patients;

class Appointment extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function patients(){
        return $this->hasMany(Patients::class, 'id', 'patient_id');
    }
}
