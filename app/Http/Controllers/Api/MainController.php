<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Governorate;
use App\Models\BloodType;
use App\Models\Post;
use App\Models\Category;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class MainController extends Controller
{
    private function apiResponse($status,$massage,$data=null){
        $response=[
            'status'    =>$status,
            'massage'   =>$massage,
            'data'      =>$data
        ];
        return response()->json($response);
    }
    public function governorate()
    {
        $governorate=Governorate::all();
        return $this->apiResponse(1,'success',$governorate);
    }
    public function city(Request $request){
        $city=City::where(function($query) use($request) {
            if($request->has('governorate_id')){
                $query->where('governorate_id',$request->governorate_id);
            }
        })->get();
        return $this->apiResponse(1,'success',$city);
    }
    public function bloodTupe(Request $request)
    {
        $bloodtube=BloodType::all();
        return $this->apiResponse(1,'success',$bloodtube);
    }
    public function category(){
        $category=Category::all();
        return $this->apiResponse(1,'Success',$category);
    }
    public function posts(Request $request){
        $posts=Post::where(function($query) use($request){
            if($request->has('category_id')){
                $query->where('category_id',$request->category_id);
            }
        })->get();
        return $this->apiResponse(1,'success',$posts);
    }
}
