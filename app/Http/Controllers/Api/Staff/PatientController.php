<?php

namespace App\Http\Controllers\Api\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use Config;
use App\Models\Patients;
use App\Models\Chamber;

class PatientController extends Controller
{
    //
    public function __construct()
    {
        Config::set('jwt.user', Staff::class);
        Config::set('auth.providers', ['users' => [
            'driver' => 'eloquent',
            'model' => Staff::class,
        ]]);
    }
    public function create(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required|unique:patientses',
            'dob' => 'required',
            'govt_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response(['status' => 0, 'msg' => $validator->errors()->first()]);
        }
        $user = JWTAuth::parseToken()->authenticate($request->get('token'));

        $chamber = $user->chamber_id;
        $chamber = Chamber::find($chamber->id);
        Patients::create([
            'chamber_id' => $chamber->uid,

            'user_id' => $user_id,

            'name' => $this->input->post('name', true),

            'email' => $this->input->post('email', true),

            'mr_number' => rand(11111, 99999),
            // 'mr_number' => $new_mr_number,

            'about_id' => $this->input->post('about_medyseva', true),
            'other' => $this->input->post('other', true),

            'age' => $this->input->post('age', true),

            'weight' => $this->input->post('weight', true),

            'sex' => $this->input->post('sex', true),

            'mobile' => $this->input->post('mobile', true),

            'dob' => date('Y-m-d', strtotime($this->input->post('dob', true))),

            'religion' => $this->input->post('religion', true),

            'occuptation' => $this->input->post('occuptation', true),

            'govt_id' => $this->input->post('govt_id', true),

            'govt_id_detail' => $this->input->post('govt_id_detail', true),

            'reg_date' => $this->input->post('reg_date', true),

            'password' => bcrypt($request->get('password')),
            'added_by' => $this->session->userdata['id'],
            'added_by_role' => $this->session->userdata['role'],
            'present_address' => $this->input->post('present_address', true),

            'permanent_address' => $this->input->post('permanent_address', true),

            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
