<?php

namespace App\Http\Controllers\User;

use App\Models\EmailAgent;
use App\Models\EmailAgency;
use Illuminate\Http\Request;
use App\Models\Backend\Agents;
use App\Models\Backend\agencies;
use App\Models\PropertiesReviews;
use App\Models\Backend\FrontUsers;
use App\Models\Backend\Properties;
use App\Models\User\UsersFavorites;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function dashboard(){

        return view('user.index');
    }

    public function account(){

        $user = auth('front-user')->user();
        $properties = UsersFavorites::where(['user' => $user->id])->with('property_fk')->paginate(10);
        return view('user.account',compact('properties','user'));
    }

    public function account_action(Request $request){

    $user_id = auth('front-user')->user()->id;
    $user = FrontUsers::where('id',$user_id)->first();

        $request->validate([
            'name'=>"required|max:190",
            'password'=>"nullable|string",
            'phone'=>"nullable|string",
        ]);

  
        $user->update([
            "name"=>$request->name,
            "email"=>$user->email,
            "phone"=>$request->phone,
        ]);
       
        if($request->password!=null){
            $user->update([
                "password"=>\Hash::make($request->password)
            ]);
        }

        toastr()->success(__('admin/utils/toastr.update_success_message'), __('utils/toastr.successful_process_message'));

        return redirect()->route('front-user-account');
        
    }

    public function propertyReview(Request $request){

        $user_id = auth('front-user')->user()->id;
        $property = Properties::where('id',$request->property)->first();
        

        if(auth('front-user')->check()){

            $request->validate([
                'msg'=>"required|string",
            ]);
    
      
            PropertiesReviews::create([
                "property"=>$request->property,
                "user"=>$user_id,
                "message"=>$request->msg,
            ]);

            toastr()->success(__('admin/utils/toastr.update_success_message'), __('utils/toastr.successful_process_message'));
            return redirect()->route('front-properties-show',$property->slug);

        }else{
            return redirect()->route('user-login');
        }
       
    }

    public function emailAgent(Request $request){

        
        $property = Properties::where('id',$request->property)->first();
        $agent_check = Agents::where('id',$request->agent)->first();
        $request->validate([
            'name'=>"required|max:190",
            'email'=>"required|email",
            'phone'=>"required|string",
            'msg'=>"required|string",
            'property'=>"required|integer",

        ]);

     

        if($agent_check != null){
            EmailAgent::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->msg,
                'property' => $request->property,
                'agent' => $request->agent,
            ]);
            
            toastr()->success(__('admin/utils/toastr.update_success_message'), __('utils/toastr.successful_process_message'));

        }

        if($property != null){
            return redirect()->route('front-properties-show',$property->slug);

        }else{
            return redirect()->route('front-agents-show',$agent_check->slug);

        }
        
    }

    public function emailAgency(Request $request){

        
        $agency_check = agencies::where('id',$request->agency)->first();
        $request->validate([
            'name'=>"required|max:190",
            'email'=>"required|email",
            'phone'=>"required|string",
            'msg'=>"required|string",
            'agency'=>"required|integer",

        ]);

     
        if($agency_check != null){
            EmailAgency::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->msg,
                'agency' => $request->agency,
            ]);
            
            toastr()->success(__('admin/utils/toastr.update_success_message'), __('utils/toastr.successful_process_message'));

        }
    
            return redirect()->route('front-agencies-show',$agency_check->slug);
        
    }

}
