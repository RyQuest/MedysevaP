<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patients;
use DB;

class PatientController extends Controller
{
    //
    public function index(){
        $data['data'] = Patients::latest()->get();
        
        return view('user.patient.index',$data);
    }
    public function viewDetails($id){
        $data['data'] = Patients::find($id);
        return view('user.patient.view',$data);    
    }
}
