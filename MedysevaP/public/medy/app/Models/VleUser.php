<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VleUser extends Model
{
    use HasFactory;
    
    protected $table = "vle_users";
    protected $guarded = ['id'];

    public function chamber(){
        return $this->belongsTo(\App\Models\Chamber::class,'chamber_id');
    }
}
