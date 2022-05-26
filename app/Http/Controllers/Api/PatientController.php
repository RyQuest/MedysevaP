<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Patients;
use App\Models\Prescriptions;

class PatientController extends Controller
{
    public function store(Request $request)
    {
        \Log::info($request->all());
        try {
            $headerInfo = $request->header('api_key');
            if ($headerInfo != "bd50beee-8d1a-46e3-8480-36d95f4a83fe") {
                return response(['status' => 0, 'msg' => 'Invalid api request']);
            }
            $validator = \Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'cid' => 'required',
                'mmid' => 'required',
                'scan_id' => 'required',
                'mobile' => 'min:10|max:10'

            ]);

            if ($validator->fails()) {
                return response(['status' => 0, 'msg' => $validator->errors()]);
            }

            $patient = Patients::create([
                'user_id' => 0,
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'mr_number' => rand('11111', '99999'),
                'sex' => $request->get('gender'),
                'dob' => $request->get('dob'),
                'mobile' => $request->get('mobile'),
                'weight' => $request->get('weight'),
                'religion' => $request->get('religion'),
                'occuptation' => $request->get('occuptation'),
                'present_address' => $request->get('present_address'),
                'permanent_address' => $request->get('permanent_address'),
                'cid' => $request->get('cid'),
                'mmid' => $request->get('mmid'),
                'scan_id' => $request->get('scan_id'),
                'role' => 'patient',
                'created_at' => date('Y-m-d H:i:s')

            ]);

            if ($patient) {
                return response(['status' => 1, 'msg' => 'Patient saved successfully']);
            }
            return response(['status' => 0, 'msg' => 'Opps! Something went wrong.Please try again']);
        } catch (\Exception $ex) {
            return response(['status' => 0, 'msg' => $ex->getMessage()]);
        }
    }

    public function savePatient(Request $request)
    {
        try {

            $params = $request->all();
            $params['bpMed'] = false;
            $params['subscription'] = true;
            $params['medHistory'] = false;

            // \Log::info($params);
            $client = new \GuzzleHttp\Client();
            $call = "https://dev-main.abhayparimitii.cloudns.asia/auth/user/register";
            $request = $client->post($call, [
                //  'headers' => ['Content-Type' => 'application/json'],
                'json' => $params
            ]);
            $response =  json_decode($request->getBody()->getContents(), true);
            if ($response['success']) {
                return response(['status' => 1, 'msg' => $response]);
            }
            return response(['status' => 0, 'msg' => '']);
        } catch (\Exception $ex) {
            return response(['status' => 0, 'msg' => $ex->getMessage()]);
        }
    }

    public function gettotalscansfrommobile($mobile)
    {
        try {
            $client = new \GuzzleHttp\Client();
            $call = "https://dev-main.abhayparimitii.cloudns.asia/user/gettotalscansfrommobile/" . $mobile;
            $request = $client->get($call);
            $response =  json_decode($request->getBody()->getContents(), true);

            return response(['status' => 1, 'msg' => $response]);
        } catch (\Exception $ex) {
            return response(['status' => 0, 'msg' => $ex->getMessage()]);
        }
    }

    public function gethealthframefromscanidandCID($scan_id, $cid)
    {
        try {
            // \Log::info($scan_id);
            // \Log::info($cid);
            $client = new \GuzzleHttp\Client();
            $call = "https://dev-main.abhayparimitii.cloudns.asia/userdata/gethealthframefromscanidandCID/" . $scan_id . "/" . $cid;
            $request = $client->get($call);
            $response =  json_decode($request->getBody()->getContents(), true);

            return response(['status' => 1, 'data' => $response]);
        } catch (\Exception $ex) {
            return response(['status' => 0, 'msg' => $ex->getMessage()]);
        }
    }

    public function importPatient(Request $request)
    {
        ini_set('max_execution_time', 500);
        ini_set('memory_limit', '1600M');
        $data = \Excel::toArray([], $request->file('file'));
        foreach ($data[0] as $key => $row) {
            if ($key != 0) {
                if ($row[0]) {
                    $patient = null;
                    $patient = Patients::where('email', $row[4])->first();
                    $date = date('Y-m-d H:i:s');

                    $about_id = 0;
                    $about = strtolower($row[10]);

                    if ($about == "website") {
                        $about_id = "1";
                    } else if ($about == "instagram") {
                        $about_id = "2";
                    } else if ($about == "instagram") {
                        $about_id = "2";
                    } else if ($about == "fFacebook") {
                        $about_id = "3";
                    } else if ($about == "whatsapp") {
                        $about_id = "4";
                    } else if ($about == "hoardings") {
                        $about_id = "5";
                    } else if ($about == "pamphlet" || $about == "pamphlets") {
                        $about_id = "6";
                    } else if ($about == "word of mouth") {
                        $about_id = "7";
                    } else if ($about == "Doctor ") {
                        $about_id = "8";
                    } else if ($about == "other") {
                        $about_id = "9";
                    } else if ($about == "school") {
                        $about_id = "10";
                    } else if ($about == "vehicle") {
                        $about_id = "11";
                    } else if ($about == "no reply") {
                        $about_id = "12";
                    }



                    if ($row[2] != NULL || $row[2] != 'NULL') {
                        $date = date('Y-m-d H:i:s', strtotime($row[2]));
                    }
                    $patient_count = Patients::where('chamber_id', $row['29'])->count();
                    $patient_count = $patient_count + 1;

                    if (null == $patient) {
                        $patient = Patients::create([
                            'chamber_id' => $row['29'],
                            'user_id' => $row[0],
                            'name' => $row[3],
                            'email' => $row[4] != NULL ? $row[4] : null,
                            'mobile' => $row[5] != NULL ? $row[5] : null,
                            'mr_number' => "MED/2022/" . $patient_count,
                            'age' => $row[5],
                            'weight' => $row[17],
                            'sex' => $row[11] == "Female" || $row[11] == "female" ? 2 : 1,
                            'role' => 'patient',
                            'password' => bcrypt(123456),
                            'created_at' => $date,
                            'about_id' => $about_id,
                            'added_by' => 1,
                            'added_by_role' => 1,
                            'present_address' => $row[8]
                        ]);
                    }

                    $serial = Appointment::where('status', 0)->where('date', $date)->orderBy('id', 'desc')->count();
                    $app = Appointment::create([
                        'chamber_id' => $row['29'],
                        'user_id' => $row[0],
                        'patient_id' => $patient->id,
                        'camp_type' => "on_line",
                        'camp_name' => "Internal Medicine",

                        'serial_id' => $serial,

                        'date' => $date,

                        'time' => "0",

                        'status' => 0,

                        'type' => "",

                        't' => $row[12],

                        'p' => $row[13],

                        'r' => $row[14],

                        'bp' => $row[15],

                        'ht' => $row[16],

                        'wt' => $row[17],

                        'spo2' => $row[18],

                        'chief_complains' => $row[19],
                        'consultations_type'  => "",
                        'med_histry' => $row[20],

                        'allergies' => $row[23],

                        'prov_diagn' => "",
                        'center_location' => "",

                        'follow_up' => "",

                        'created_at' => $date,
                        'added_by' => "1",
                        'added_by_role' => "admin",
                        'appointment_type' => "1"
                    ]);


                    // create prescrption
                    /*$pre = Prescriptions::create([
                        'chamber_id' => $app->chamber_id,

                        'patient_id' => $patient->id,
                        'appointment_id' => $app->id,
                        't' => $row[9],

                        'p' => $row[10],

                        'r' => $row[11],

                        'bp' => $row[12],

                        'ht' => $row[13],

                        'wt' => $row[14],

                        'spo2' => $row[15],

                        'chief_complains' =>  $row[16],

                        'med_histry' => $row[17],

                        'allergies' => $row[20],

                        'past_history' => $row[18],

                        'personal_history' => $row[19],

                        'next_visit' => '',

                        'user_id' => $app->user_id,

                        'created_at' =>$date,
                    ]);*/

                    /*$diagonosis = $row[28];
                    if(null != $diagonosis && $diagonosis != 'NULL'){
                        $diagonosis = explode(",",$diagonosis);
                        foreach ($diagonosis as $value_1) {
                            $data_1 = array(           
                               'prescription_id' => $pre->id,           
                               'diagonosis_id' => $value_1,           
                            );                   
                           \DB::table('pre_diagonosis')->insert($data_1);           
                        }
                    }*/
                    /*$ad_advice = $row[24];
                    if(null != $ad_advice && $ad_advice != 'NULL'){
                        $ad_advice = explode(",",$ad_advice);

                        foreach ($ad_advice as $value_2) {
                            $data_2 = array(           
                               'prescription_id' => $app->id,           
                               'ad_advices_id' => $value_2,           
                            ); 
                            \DB::table('pre_ad_advices')->insert($data_2);
                        }
                    }*/

                    /*$advice = $row[26];
                    if(null != $advice && $advice != 'NULL'){
                        $advice = explode(",",$advice);

                        foreach ($advice as $value_2) {
                            $data_2 = array(
                               'prescription_id' => $app->id,
                               'advice_id' => $value_2,
                            );
                            \DB::table('pre_advice')->insert($data_2);
                        }
                    }*/
                }
                // \Log::info($app);
            }
        }
    }
}
