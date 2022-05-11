<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Governorate;
use App\Models\BloodType;
use App\Models\Post;
use App\Models\Category;
use App\Models\Sitting;
use App\Models\DonationRequest;
use App\Traits\apiResponseTraits;
use Dotenv\Validator;
use GrahamCampbell\ResultType\Success;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class MainController extends Controller
{
    use apiResponseTraits;
    //start cities function
    public function governorates()
    {
        $governorate=Governorate::all();
        return $this->apiResponse(1,'success',$governorate);
    }
    public function cities(Request $request){
        $city=City::where(function($query) use($request) {
            if($request->has('governorate_id')){
                $query->where('governorate_id',$request->governorate_id);
            }
        })->get();
        return $this->apiResponse(1,'success',$city);
    }
    //end cities function
    //start bloodTypes function
    public function bloodTypes(Request $request)
    {
        $bloodtube=BloodType::all();
        return $this->apiResponse(1,'success',$bloodtube);
    }
    //end bloodTypes function
    //start post function
    public function category(){
        $category=Category::all();
        return $this->apiResponse(1,'Success',$category);
    }
    public function posts(Request $request){
        $posts=Post::where(function($query) use($request){
            if($request->has('category_id')){
                $query->where('category_id',$request->category_id);
            }
        })->with('Category')->paginate(3);
        return $this->apiResponse(1,'success',$posts);
    }
    public function post(Request $request){
        $post=Post::find($request->id);
        if($post == null){
            return $this->apiResponse(0,'هناك خطأ ما');
        }
        return $this->apiResponse(1,'success',$post);
    }
    //end post function
    //start settings function
    public function settings(){
        return $this->apiResponse(1,'success',Sitting::first());
    }
    //end settings function
    //start donations  function
    public function createDonations(Request $request){
        $validator=validator()->make($request->all(),[
            'patient_name'                  =>'required ',
            'patient_phone'                 =>'required',
            'hospital_name'                 =>'required',
            'hospital_address'              =>'required',
            'patient_age'                   =>'required',
            'bags_num'                      =>'required',
            'city_id'                       =>'required|exists:cities,id',
            'blood_type_id'                 =>'required|exists:blood_types,id',
            'client_id'                     =>'required|exists:clients,id',
            'details'                       =>'required',
            'latitude'                      =>'required',
            'longitude'                     =>'required',
        ]);
        if($validator->fails()){
            return $this->apiResponse(0,$validator->errors()->first(),$validator->errors());
        }
        $donations=DonationRequest::create($request->all());
        $donations->save();
        return $this->apiResponse(1,'تمت اضافه الطلب بنجاح',$donations);
    }
    public function donations(Request $request){
        $donations=DonationRequest::all();
        return $this->apiResponse(1,'نجاح',$donations);
    }
    public function donationId(Request $request){
        $donation=DonationRequest::find($request->id);
        if($donation == null){
            return $this->apiResponse(0,'هناك خطأ ما');
        }
        return $this->apiResponse(1,'success',$donation);
    }
    //end donations  function
}
