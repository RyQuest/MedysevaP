<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Prescriptions extends Model
{
    protected $table = "prescription";

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

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
