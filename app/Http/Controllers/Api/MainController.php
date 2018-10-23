<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Citiy;
use App\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\donationRequests;
use App\Category;
use App\ArticleClient;
use App\Report;
use App\ContactUs;
use App\Client;
use App\AppSettings;



class MainController extends Controller
{
  // add notification settings city,blood type
  public function  notification_settings(Request $request){
    $validator=validator()->make($request->all(),[
        'city_id'=>'required',
    ]);
    if ($validator ->fails()){
        return responseJson(0,$validator->errors()->first(),$validator->errors());
    }
  $request->user()->city_notification()->attach($request->city_id);

  return responseJson(1,"تمت الاضافه الى الاعدادات");
  }
//get app settings
public function settings(Request $request){
  $settings=AppSettings::all();
  return responseJson(1,'success settings',$settings);
}
// get all articles wich has favourites only
public function article_fav(Request $request){

}

//contact us
public function contact_us(Request $request){

$validator=validator()->make($request->all(),[
    'message_title'=>'required',
    'message_body'=>'required',
    'client_id'=>'required',
]);
if ($validator ->fails()){
    return responseJson(0,$validator->errors()->first(),$validator->errors());

}
   $contact_us=ContactUs::create($request->all());
   $contact_us->save();
   return responseJson(1,"تمت الاضافه بنجاح",[
      'contact_us'=>$contact_us
   ]);
}
//report
public function make_report(Request $request){

  $client_id=Client::where(function ($query)use ($request){
  if($request ->has('api_token')){
  $query->where ('api_token',$request->api_token);
  }
  })->get();

// return $this->apiResponse(1,"تمت الاضافه بنجاح",$client_id);
$validator=validator()->make($request->all(),[
    'msg'=>'required',

]);
if ($validator ->fails()){
    return responseJson(0,$validator->errors()->first(),$validator->errors());

}
   $report=Report::create([
     'msg'=>$request->msg,
    'client_id'=>$request->client_id,
   ]);
   $report->save();
   return responseJson(1,"تمت الاضافه بنجاح",[
      'report'=>$report
   ]);
}
// add article to favourites
public function favourites(Request $request){
  $validator=validator()->make($request->all(),[
      'article_id'=>'required',
  ]);
  if ($validator ->fails()){
      return responseJson(0,$validator->errors()->first(),$validator->errors());
  }
$request->user()->makeFav()->attach($request->article_id);

return responseJson(1,"تم الاضافه الى المفضله");
}
// update profile
public function update_profile(Request $request){
  $validator=validator()->make($request->all(),[
      'name'=>'required',
      'email'=>'required|unique:clients',
      'birth_date'=>'required',
      'blood_type'=>'required|in:O+,O-,A+,A-,AB+,AB-',
      'city_id'=>'required',
      'phone'=>'required',
      'password'=>'required|confirmed',
      'donation_last_date'=>'required',

  ]);
  if ($validator ->fails()){
      return responseJson(0,$validator->errors()->first(),$validator->errors());
  }
  $request->merge(['password'=> bcrypt($request->password)]);

$request->user()->update([
'name'=> $request->name,
            'email'=> $request->email,
            'birth_date'=> $request->birth_date,
            'blood_type'=> $request->blood_type,
            'city_id'=> $request->city_id,
            'phone'=> $request->phone,
            'password'=> $request->password,
            'donation_last_date'=> $request->donation_last_date,
          ]);

     return responseJson(1,"تمت الاضافه بنجاح");

  }
//add_donationRequests
public function add_donationRequests(Request $request){
  $validator=validator()->make($request->all(),[
      'patient_name'=>'required',
      'patient_age'=>'required',
      'blood_type'=>'required|in:O+,O-,A+,A-,AB+,AB-',
      'bags_num'=>'required',
      'hospital_name'=>'required',
      'hospital_add'=>'required',
      'city_id'=>'required',
      'phone_num'=>'required',
      'latitude'=>'required',
      'longitude'=>'required',
  ]);
  if ($validator ->fails()){
      return responseJson(0,$validator->errors()->first(),$validator->errors());

  }
     $add_donationRequests=DonationRequests::create($request->all());
     return responseJson(1,"تمت الاضافه بنجاح",[

        'add_donationRequests'=>$add_donationRequests
     ]);
}
//get Donation requests
//get one Donation request depending on Donation request id
public function donationRequests(Request $request){
  $donationRequests=donationRequests::where(function ($query)use ($request){
  if($request ->has('id')){
    $query->where ('id',$request->id);
  }
})->get();

    return responseJson(1,'success donationRequests',$donationRequests);
}
//get articles when user has a permission
//get one article when pass id
public function articles(Request $request){
      $articles=Article::where(function ($query)use ($request){
    if($request ->has('id')){
      $query->where ('id',$request->id);
    }
    })->get();
    return responseJson(1,'success article',$articles);
}
//get article categories
public function categories(){
    $categories=Category::all();
    return responseJson(1,'success categories',$categories);
}
//get  governorates
public function governorate(){

        $governorate=Governorate::all();
        return responseJson(1,'success',$governorate);
    }
//get  cities
public function cities(Request $request){

        $cities=Citiy::where(function ($query)use ($request){
            if($request ->has('governorate_id')){
              $query->where ('governorate_id',$request->governorate_id);
            }
        })->get();

        return responseJson(1,'success',$cities);
    }

}

//get one article depending on category
