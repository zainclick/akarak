<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\User\UsersFavorites;
use App\Http\Controllers\Controller;

class favoritePropertiesController extends Controller
{
    public function index(Request $request)
    {
        $user_id = auth('front-user')->user()->id;
        $properties = UsersFavorites::where(['user' => $user_id])->with('property_fk')->paginate(10);
       return view('user.properties.fav-properties',compact('properties'));

    }

    public function fav_property(Request $request){

        if(!auth('front-user')->check()){
            return redirect()->route('user-login');
        }else{
            $user = auth('front-user')->user()->id;
            $check_fave = UsersFavorites::where(['user' => $user,'property' => $request->property])->first();
            if($check_fave != null){
                $check_fave->delete();  
            }else{
                UsersFavorites::create([

                    'property' => $request->property,
                    'user' => $user,
                ]);
            }
        }
    }

    public function remove_fave(Request $request){

        if(!auth('front-user')->check()){

        }else{
            $user = auth('front-user')->user()->id;
            $check_fave = UsersFavorites::where(['user' => $user,'property' => $request->property])->first();
            
                $check_fave->delete();  
          
        }

    }
}
