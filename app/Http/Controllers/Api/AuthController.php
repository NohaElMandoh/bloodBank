<?php

namespace App\Http\Controllers\Api;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;
class AuthController extends Authenticatable
{
      public function register(Request $request){

    $validator=validator()->make($request->all(),[
        'name'=>'required',
        'phone'=>'required',
        'city_id'=>'required',
        'blood_type'=>'required|in:O+,O-,A+,A-,AB+,AB-',
        'donation_last_date'=>'required',
        'password'=>'required|confirmed',
        'email'=>'required|unique:clients',
    ]);
    if ($validator ->fails()){
        return responseJson(0,$validator->errors()->first(),$validator->errors());
    }
    $request->merge(['password'=> bcrypt($request->password)]);
       $client=Client::create($request->all());
       $client->api_token=str_random(60);
       $client->save();
       return responseJson(1,"تمت الاضافه بنجاح",[
          'api_token'=>$client->api_token,
          'client'=>$client
       ]);

    }
    public function login(Request $request){
    $validator=validator()->make($request->all(),[
        'phone'=>'required',
        'password'=>'required',
    ]);
    if ($validator ->fails()){
        return responseJson(0,$validator->errors()->first(),$validator->errors());

    }
    $client=client::where('phone',$request->phone)->first();
    if ($client) {
      if (Hash::check($request->password,$client->password)) {
        return responseJson(0,"Done",[
          'api_token'=>$client->api_token,
          'client'=>$client

        ]);

      }
      else{
        return responseJson(0,"error pass or email",$validator->errors());

      }

    }
    else{
      return responseJson(0,"error email or pass",$validator->errors());

    }
    $auth= auth()->guard('api')->validate($request->all());
    return responseJson(0,'',$auth);
    }
}
