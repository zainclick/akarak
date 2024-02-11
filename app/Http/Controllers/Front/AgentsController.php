<?php

namespace App\Http\Controllers\Front;
use Illuminate\Http\Request;

use App\Models\Backend\citys;
use App\Models\Backend\Agents;
use App\Models\Backend\Features;
use App\Models\Backend\Properties;
use App\Http\Controllers\Controller;
use App\Models\Backend\PropertysTyps;
use App\Models\Backend\PropertysStatus;
use App\Models\Backend\PropertiesFeatures;

class AgentsController extends Controller
{
    public function index(){
        $features = Features::where('status',0)->get();
        $citys = citys::where('status',0)->get();
        $types = PropertysTyps::all();
        $statuses = PropertysStatus::all();
        $agents = Agents::where('status',0)->with('language_fk','agency_fk')->paginate(10);
        return view('front.agents.index',compact('agents','features','citys','types','statuses'));
    }

    public function searchAgent(Request $request){

     
        if($request->agent != null || $request->agent != " "){
            
            $agents = Agents::where('name_ar', 'like', '%' . $request->agency . '%')
            ->orWhere('name_en', 'like', '%' . $request->agent . '%')
            ->paginate(10);
            
            if($agents->count() > 0){
                return view('front.agents.search-ajax',compact('agents'));
            }else{
                $agencagentsies = Agents::where('status',0)->paginate(10);
                return view('front.agents.search-ajax',compact('agents'));
            }
        }else{
            $agents = Agents::where('status',0)->paginate(10);
            return view('front.agents.search-ajax',compact('agents'));
        }

        
    }

    public function show($slug){

        $agent = Agents::where(['slug' => $slug])->first();
        $props_rents = Properties::where(['property_status' => 1,'agent' => $agent->id,'activity_status' => 0])->get();
        $props_sales = Properties::where(['property_status' => 2,'agent' => $agent->id,'activity_status' => 0])->get();
        $props_features_all = PropertiesFeatures::with('property_fk')->get();
        $props_feaures_agent= PropertiesFeatures::where('agent',$agent->id)->with('property_fk')->get();
        if($props_feaures_agent->count() > 0){
            $props_features = $props_feaures_agent;
        }else{
            $props_features = $props_features_all;
        }
        return view('front.agents.show',compact('agent','props_rents','props_sales','props_features'));
    }
}
