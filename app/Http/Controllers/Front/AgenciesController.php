<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Backend\citys;
use App\Models\Backend\Agents;
use App\Models\Backend\agencies;
use App\Models\Backend\Features;
use App\Models\Backend\Properties;
use App\Http\Controllers\Controller;
use App\Models\Backend\PropertysTyps;
use App\Models\Backend\PropertysStatus;
use App\Models\Backend\PropertiesFeatures;

class AgenciesController extends Controller
{
    public function index(){

        $agencies = agencies::where('status',0)->with('agent_fk')->paginate(10);
        $features = Features::where('status',0)->get();
        $citys = citys::where('status',0)->get();
        $types = PropertysTyps::all();
        $statuses = PropertysStatus::all();
  
        return view('front.agencies.index',compact('agencies','features','citys','types','statuses'));
    }

    public function searchAgency(Request $request){

     
        if($request->agency != null || $request->agency != " "){
            
            $agencies = agencies::where('name_ar', 'like', '%' . $request->agency . '%')
            ->orWhere('name_en', 'like', '%' . $request->agency . '%')
            ->paginate(10);
            
            if($agencies->count() > 0){
                return view('front.agencies.search-ajax',compact('agencies'));
            }else{
                $agencies = agencies::where('status',0)->paginate(10);
                return view('front.agencies.search-ajax',compact('agencies'));
            }
        }else{
            $agencies = agencies::where('status',0)->paginate(10);
            return view('front.agencies.search-ajax',compact('agencies'));
        }

        
    }

    public function show($slug){

        $agency = agencies::where('slug',$slug)->first();
        $props_rents = Properties::where(['agency' => $agency->id,'property_status' => 1,'activity_status' => 0])->paginate(10);
        $props_sales = Properties::where(['agency' => $agency->id,'property_status' => 2,'activity_status' => 0])->paginate(10);
        $agents = Agents::where(['agency' => $agency->id,'status' => 0])->paginate();
        $props_feaures_agency = PropertiesFeatures::where(['agency' => $agency->id])->with('property_fk')->get();
        $props_feaures_all = PropertiesFeatures::with('property_fk')->get();
        if($props_feaures_agency->count() > 0){
            $props_features = $props_feaures_agency;
        }else{
            $props_features = $props_feaures_all;
        }
        return view('front.agencies.show',compact('agency','props_rents','props_sales','agents','props_features'));
    }
}
