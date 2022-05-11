<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Facade\FlareClient\Api;
use App\Traits\apiResponseTraits;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use apiResponseTraits;
    public function register(Request $request){
        // return $request->all();
        $validator=validator()->make($request->all(),[
            'name'                  =>'required ',
            'email'                 =>'required|email|unique:clients',
            'd_o_b'                 =>'required|date|date_format:Y-m-d|before:yesterday',
            'blood_type_id'         =>'required',
            'last_donation_date'    =>'required|date|date_format:Y-m-d|before:yesterday',
            'phone'                 =>'required',
            'city_id'               =>'required',
            'password'              =>'required',
            // 'api_token'              =>'required'
        ]);
        if($validator->fails()){
            return $this->apiResponse(0,$validator->errors()->first(),$validator->errors());
        }
        $request->merge(['password'=>bcrypt($request->password)]);
        $client=Client::create($request->all());
        $client->api_token= Str::random(60);
        $client->save();
        return $this->apiResponse(1,'تم الاضافه بنجاح',[
            'api_token'=>$client->api_token,
            'client'=>$client
        ]);
        // return $request;
    }

    public function login(Request $request)
    {
        $validator=validator()->make($request->all(),[
            'phone'                 =>'required',
            'password'              =>'required',
        ]);
        if($validator->fails()){
            return $this->apiResponse(0,$validator->errors()->first(),$validator->errors());
        }
        $client=Client::where('phone',$request->phone)->first();
        if($client){
            if(Hash::check($request->password,$client->password)){
                return $this->apiResponse(1,'البيانات  صحيحه',[
                    'api_token'=>$client->api_token,
                    'client'=>$client
                ]);
            }else{
                return $this->apiResponse(0,'البيانات غير صحيحه');
            }

        }else{
            return $this->apiResponse(0,'البيانات غير صحيحه');
        }
        // $client=auth()->guard('api')->validate($request->all());
        // // if($client=='1'){
        // //     return $this->apiResponse(1,'البيانات  صحيحه',[
        // //         'pin_code'=>$request->pin_code,
        // //         'client'=>$request
        // //     ]);
        // // }else{
        // //     return $this->apiResponse(0,'البيانات غير صحيحه');
        // // }
        // return $client;
        // النتيحه معايه بترجع ب1 لما برجه بالكلاينت ولما بتشك عليها بترجع ب0
    }
    public function showData(Request $request){
        $client=$request->user();
        return $this->apiResponse(1,'success',$client);
    }
    public function update_profile(Request $request){
        $client=$request->user();
        if($client){
            $client->name=$request->name;
            $client->email=$request->email;
            $client->d_o_b=$request->d_o_b;
            $client->blood_type_id=$request->blood_type_id;
            $client->last_donation_date=$request->last_donation_date;
            $client->phone=$request->phone;
            $client->city_id=$request->city_id;
            $client->password=$request->password;
            $client->save();
        }else{
            return $this->apiResponse(0,'لا يوجد عميل بهذهي البيانات',$client);
        }
        return $this->apiResponse(1,'success',$client);
    }
    public function reset(Request $request){
        $validator=validator()->make($request->all(),[
            'phone'=>'required',
        ]);
        if($validator->fails()){
            return $this->apiResponse(0,$validator->errors()->first(),$validator->errors());
        }
        $user=Client::where('phone',$request->phone)->first();
        if($user){
            $code=rand(1111,9999);
            $user->pin_code=$code;
            // $user->save();
            $update=$user->update(['pin_code'=>$code]);
            if($update){

                Mail::to($request->user())
                    ->bcc('ahmedmohammedalkayyal@gmail.com')
                    ->send(new ResetPassword($code));
                    return $this->apiResponse(1,'برجاء فحص الايميل',[
                        'pin_code'=>$code,
                        'email'=>$user->email,
                    ]);
            }else{
                return $this->apiResponse(0,'حدث خطأ ما');
            }

        }
        return $this->apiResponse(0,'لا يوجد عميل بهذهي البيانات');
    }
    public function Password(Request $request){
        $validator=validator()->make($request->all(),[
            'phone'=>'required',
            'pin_code'=>'required',
            'pass'=>'required|confirmed',
            /**
             * //|confirmed
             *  لما باجي اعمل كده بضيف حقل للتاكيد بسميه
             *pass_confirm
             */
        ]);
        if($validator->fails()){
            return $this->apiResponse(0,$validator->errors()->first(),$validator->errors());
        }
        $user=Client::where('pin_code',$request->pin_code)->where('pin_code','!=',0)->
                            where('phone',$request->phone)->first();
        if($user){
            $user->password=bcrypt($request->pass);
            $user->pin_code=null;
            $user->save();
            if($user->save()){
                return $this->apiResponse(1,'تم التغير بنجاح');
            }else{
                return $this->apiResponse(0,"هناك خطأ ما");
            }

        }else{
            return $this->apiResponse(0,'هذا الكود خطأ');
        }
    }
    public function notificationSetting(Request $request){
        $validator=validator()->make($request->all(),[
            'bloodTypes'=>'required',
            'governorates'=>'required',
        ]);
        if($validator->fails()){
            return $this->apiResponse(0,$validator->errors()->first(),$validator->errors());
        }
        if($request->has('bloodTypes')){
            $request->user()->bloodTypes()->sync($request->bloodTypes);
        }
        if($request->has('governorates')){
            $request->user()->governorates()->sync($request->governorates);
        }
        $data=[
            'governorates'=>$request->user()->governorates()->pluck('governorates.id')->toArray(),
            'bloodTypes'=>$request->user()->bloodTypes()->pluck('blood_types.id')->toArray(),
        ];
        return $data;
    }
}
