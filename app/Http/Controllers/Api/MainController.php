<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Governorate;
use App\Models\BloodType;
use App\Models\Post;
use App\Models\Category;
use App\Traits\apiResponseTraits;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class MainController extends Controller
{
    use apiResponseTraits;

    public function governorates()
    {
        $governorate=Governorate::all();
        return $this->apiResponse(1,'success',$governorate);
    }
    public function citys(Request $request){
        $city=City::where(function($query) use($request) {
            if($request->has('governorate_id')){
                $query->where('governorate_id',$request->governorate_id);
            }
        })->get();
        return $this->apiResponse(1,'success',$city);
    }
    public function bloodTypes(Request $request)
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
        })->with('Category')->paginate(3);
        return $this->apiResponse(1,'success',$posts);
    }
}
