<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Chamber;
use App\Models\Patients;
use App\Models\Prescriptions;
use App\Models\Drugs;

class PrescriptionsItems extends Model
{
    protected $table = "prescription_items";

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'chamber_id',
        'patient_id',
        'appointment_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * Get the user which belongs to this prescription .
    */
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function chamber(){
        return $this->belongsTo(Chamber::class, 'chamber_id', 'uid');
    }

    public function patient(){
        return $this->belongsTo(Patients::class, 'patient_id', 'id');
    }

    public function drugs(){
        return $this->belongsTo(Drugs::class, 'drug_id', 'id');
    }
}
