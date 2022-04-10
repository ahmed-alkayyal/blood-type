<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Facade\FlareClient\Api;
use App\Traits\apiResponseTraits;
use Illuminate\Http\Request;
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
}
