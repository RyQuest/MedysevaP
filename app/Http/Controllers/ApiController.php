<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\Patient;
use App\Models\User;
use App\Models\Appointment;
class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data=DB::table('specialities')->get();
       return $data->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
         $validator =Validator::make($request->all(),[
        'name' => 'required',
        'mobile' => 'required|min:10|numeric',
        'dob' => 'required',
        'gender' => 'required',
        'dob' => 'required',
        'date' => 'required',
        'partner_id' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
         }
        else
          {
               $data=$request->all();
               
              $checkAuth=User::Where('id',$data['partner_id'])->count();
              if($checkAuth>0){
                  
                  
              
              $user=DB::table('users')->where('mobile',$data['mobile'])->count();
              if($user>0){
                    
                     $patient=DB::table('patients')->where('mobile',$data['mobile'])->first();
                     
                     $appointment=array();
                     $appointment['patient_id']=$patient->id;
                     
                     $appointment['doctor_id']='0';
                     
                     $appointment['date']=$data['date'];

                     $appointment['created_by']=$data['partner_id'];
                     
                     $appointmentArr=Appointment::create($appointment);
                     
                     return response()->json($appointmentArr,200);
                 }
                 else
                 {
                     $userArr=['name'=>$data['name'],
                               'mobile'=>$data['mobile'],
                               'email'=>$data['email'],
                               'password'=> Hash::make("Test@123"),
                               'role'=>'patient'];
                               
                    $user=User::create($userArr);
                    
                    $patientArr=['name'=>$data['name'],
                                 'mobile'=>$data['mobile'],
                                 'user_id'=>$user->id,
                                 'dob'=>$data['dob'],
                                 'gender'=>$data['gender'],
                                 ];
                                 
                    $patient=Patient::create($patientArr);
                    
                    
                    
                     $appointment=array();
                     $appointment['patient_id']=$patient->id;
                     
                     $appointment['doctor_id']='0';
                     
                     $appointment['date']=$data['date'];

                     $appointment['created_by']=$data['partner_id'];
                     
                     $appointmentArr=Appointment::create($appointment);
                     
                     return response()->json($appointmentArr,200);
                 }
                  
              }else
                {
                    return response()->json(['error'=>'Wrong partner details ']);

                }
              
             
              
          }
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Test Notification*
    */
    public function testNotification(Request $request){
        $firebaseToken = User::whereNotNull('device_token')
                            ->where('device_token', '!=', '')
                            ->where('device_token', '!=', '0')
                            ->pluck('device_token')
                            ->all();
        $data = [
            'firebaseToken' => $firebaseToken,
            'title' => 'New Appointment has been arrised',
            'body' => 'Hello Dr. there are new appointment booked, please check!',
        ];

        $res = sendNotification($data);

        return json_encode(['status'=>1, 'data' => json_decode($res, true)]);
    }
}
