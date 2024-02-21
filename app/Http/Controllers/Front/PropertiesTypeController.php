<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Backend\citys;
use App\Models\Backend\Features;
use App\Models\Backend\Properties;
use App\Http\Controllers\Controller;
use App\Models\Backend\PropertysTyps;
use App\Models\Backend\PropertysStatus;
use App\Models\Backend\PropertiesFeatures;

class PropertiesTypeController extends Controller
{
    public function index(){
        return 'index';
    }

    public function type($slug){

        $type = PropertysTyps::where('slug',$slug)->first();
        $props_features = PropertiesFeatures::inRandomOrder()->with('property_fk')->limit(5)->get();
        $features = Features::where('status',0)->get();
        $citys = citys::where('status',0)->get();
        $types = PropertysTyps::with('properties_fk')->get();
        $statuses = PropertysStatus::all();

        if($type != null){

            $properties = Properties::where('type',$type->id)->paginate(10);

            if($properties->count() > 0){
                return view('front.property-types.index',compact('properties','props_features','features','citys','types','statuses'));
            }else{
                return redirect()->route('front-properties-type');
            }
            
        }else{
            return redirect()->route('front-properties-type');
        }
      
    }
}
