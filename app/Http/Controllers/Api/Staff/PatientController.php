<?php

namespace App\Http\Controllers\Api\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use Config;
use App\Models\Patients;
use App\Models\Chamber;
use App\Models\Staff;

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
        $chamber = Chamber::find($chamber);

        Patients::create([
            'chamber_id' => $chamber ? $chamber->uid : 0,

            'user_id' => $user->id,

            'name' => $request->get('name'),

            'email' => $request->get('email'),

            'mr_number' => rand(11111, 99999),
            // 'mr_number' => $new_mr_number,

            'about_id' => $request->get('about_medyseva'),
            'other' => $request->get('other'),

            'age' => $request->get('age'),

            'weight' => $request->get('weight'),

            'sex' => $request->get('sex'),

            'mobile' => $request->get('mobile'),

            'dob' => $request->get('dob'),

            'religion' => $request->get('religion'),

            'occuptation' => $request->get('occuptation'),

            'govt_id' => $request->get('govt_id'),

            'govt_id_detail' => $request->get('govt_id_detail'),

            'reg_date' => $request->get('reg_date'),

            'password' => bcrypt($request->get('password')),
            'added_by' => $user->id,
            'added_by_role' => 'staff',
            'present_address' => $request->get('present_address'),

            'permanent_address' => $request->get('permanent_address'),

            'created_at' => date('Y-m-d H:i:s')
        ]);
        return response(['status' => 1, 'msg' => 'Patient created successfully']);
    }

    public function index(Request $request)
    {
        $patient = Patients::latest()->get();
        return response(['status' => 1, 'data' => $patient]);
    }

    public function details($id)
    {
        $patient = Patients::find($id);
        return response(['status' => 1, 'data' => $patient]);
    }

    public function deleteData(Request $request)
    {
        $id = $request->get('id');
        if (null == $id) {
            return response(['status' => 0, 'data' => 'Patient id is required']);
        }
        $patient = Patients::where('id', $id)->delete();
        return response(['status' => 1, 'data' => 'Patient deleted successfully']);
    }

    public function updateData(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            // 'email' => 'required',
            // 'mobile' => 'required',
            'dob' => 'required',
            'govt_id' => 'required',
            'patient_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response(['status' => 0, 'msg' => $validator->errors()->first()]);
        }
        $user = JWTAuth::parseToken()->authenticate($request->get('token'));
        $patient = Patients::find($request->get('patient_id'));

        $patient->name = $request->get('name');
        $patient->about_id = $request->get('about_medyseva');
        $patient->other = $request->get('other');
        $patient->age = $request->get('age');
        $patient->weight = $request->get('weight');
        $patient->sex = $request->get('sex');
        $patient->mobile = $request->get('mobile');
        $patient->dob = $request->get('dob');
        $patient->religion = $request->get('religion');
        $patient->occuptation = $request->get('occuptation');
        $patient->govt_id = $request->get('govt_id');
        $patient->govt_id_detail = $request->get('govt_id_detail');
        $patient->present_address = $request->get('present_address');
        $patient->permanent_address = $request->get('permanent_address');
        $patient->save();

        return response(['status' => 1, 'msg' => 'Patient updated successfully']);
    }
}
