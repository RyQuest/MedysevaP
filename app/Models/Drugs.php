<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PrescriptionsItems;

class Drugs extends Model
{
    use HasFactory;
    
    protected $table = "drugs";
    protected $guarded = ['id'];
}
