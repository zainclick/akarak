<?php

namespace App\Http\Controllers\Front;

use App\Helpers\MainHelper;
use Illuminate\Http\Request;
use App\Models\Backend\citys;
use App\Models\Backend\Agents;
use App\Events\PropertiesViewer;
use App\Models\Backend\Features;
use App\Models\PropertiesReviews;
use App\Models\Backend\Properties;
use App\Http\Controllers\Controller;
use App\Models\Backend\PropertysTyps;
use App\Models\Backend\PropertysStatus;
use App\Models\Backend\PropertiesImages;
use Illuminate\Support\Facades\Redirect;
use App\Models\Backend\PropertiesFeatures;
use App\Models\Backend\PropertiesFeaturesIcons;

class PropertiesController extends Controller
{
    public function index(){

      $properties = Properties::where(['activity_status'=>0])->with('agency_fk')->orderBy('id', 'DESC')->paginate(10);
      $props_features = PropertiesFeatures::inRandomOrder()->with('property_fk')->limit(5)->get();
      $features = Features::where('status',0)->get();
      $citys = citys::where('status',0)->get();
      $types = PropertysTyps::all();
      $statuses = PropertysStatus::all();

       return view('front.properties.index',compact('properties','props_features','features','citys','types','statuses'));
    }


     public function show($slug)
     {

      $property = Properties::where(['slug' => $slug,'activity_status' => 0])->with('agent_fk','type_fk','city_fk','status_fk')->first();
      if($property != null){
      
        event(new PropertiesViewer($property));
      $images = PropertiesImages::where('property',$property->id)->get();
      $prop_features_icons = PropertiesFeaturesIcons::where('property',$property->id)->with('features_fk')->get();
      $props_features = PropertiesFeatures::inRandomOrder()->with('property_fk')->limit(5)->get();
      $reviews = PropertiesReviews::where('property',$property->id)->with('user_fk')->get();
      
        return view('front.properties.show',compact('property','images','prop_features_icons','props_features','reviews'));
      }else{
        return redirect()->route('front-properties');
      }
     }

     public function search(Request $request){


      $city = $request->city;
      $min = $request->min;
      $max = $request->max;
      $type = $request->type;
      $status = $request->property_status;
      $bedrooms = $request->bedrooms;
      $bathrooms = $request->bathrooms;
      $features = $request->features;
      $sort = $request->sort;

      $features = Features::where('status',0)->get();
      $citys = citys::where('status',0)->get();
      $types = PropertysTyps::all();
      $statuses = PropertysStatus::all();
      $max_views = Properties::max('views');

          if($sort != null){

            if($sort == 'ASC'){
              $order_by = "ASC";
            }elseif($sort == 'DESC'){
              $order_by = "DESC";
            }

          }else{
            $order_by = "DESC";
          }
          
          if($city == null && $min == null && $max == null && $type == null && $status == null && $bedrooms == null && $bathrooms == null && $sort == null){
            $properties = Properties::where('activity_status' ,0)->paginate(10);
            return view('front.properties.properties-ajax',compact('properties','features','citys','types','statuses'));

          }elseif($city == null && $min == null && $max == null && $type == null && $status == null && $bedrooms == null && $bathrooms == null && $sort != null){

            $properties = Properties::where('activity_status' ,0)->orderBy('id',$order_by)->paginate(10);
            return view('front.properties.properties-ajax',compact('properties','features','citys','types','statuses'));

          }else{
          
            $properties = Properties::where('city' ,'=',$city )
            ->orWhere('type', '=', $type)
            ->orWhere('property_status', '=', $status)
            ->orWhere('bedrooms', '=', $bedrooms)
            ->orWhere('bathrooms', '=', $bathrooms)
            ->whereBetween('price', array($min, $max))
            ->orderBy('id',$order_by)
            ->paginate(10);
            if($properties){
              return view('front.properties.properties-ajax',compact('properties','features','citys','types','statuses'));

            }else{
              return "Not fount";
            }
            
          }


        
     }

     public function searchFront(Request $request){


      $city = $request->city;
      $min = $request->min;
      $max = $request->max;
      $type = $request->type;
      $status = $request->property_status;
      $bedrooms = $request->bedrooms;
      $bathrooms = $request->bathrooms;
      $features = $request->features;
      $sort = 'DESC';

      $features = Features::where('status',0)->get();
      $citys = citys::where('status',0)->get();
      $types = PropertysTyps::all();
      $statuses = PropertysStatus::all();
      $max_views = Properties::max('views');

          if($sort != null){

            if($sort == 'ASC'){
              $order_by = "ASC";
            }elseif($sort == 'DESC'){
              $order_by = "DESC";
            }

          }else{
            $order_by = "DESC";
          }
          
          if($city == null && $min == null && $max == null && $type == null && $status == null && $bedrooms == null && $bathrooms == null && $sort == null){
            $properties = Properties::where('activity_status' ,0)->paginate(10);
            
            return view('front.properties.search-front',compact('properties','features','citys','types','statuses'));

          }elseif($city == null && $min == null && $max == null && $type == null && $status == null && $bedrooms == null && $bathrooms == null && $sort != null){

            $properties = Properties::where('activity_status' ,0)->orderBy('id',$order_by)->paginate(10);
            return view('front.properties.search-front',compact('properties','features','citys','types','statuses'));

          }else{
            if($status == 'all'){
              
              $properties = Properties::where('city' ,'=',$city )
              ->orWhere('type', '=', $type)
              ->orWhere('bedrooms', '=', $bedrooms)
              ->orWhere('property_status', '=', 1)
              ->orWhere('property_status', '=', 2)
              ->orWhere('bathrooms', '=', $bathrooms)
              ->whereBetween('price', array($min, $max))
              ->orderBy('id',$order_by)
              ->paginate(10);
              if($properties->count() > 0){
                
                return view('front.properties.search-front',compact('properties','features','citys','types','statuses'));
              
              }else{
                $properties = Properties::where('activity_status' ,0)->paginate(10);
            return view('front.properties.search-front',compact('properties','features','citys','types','statuses'));
              }

            }else{
              if($status == 'rent'){
                $status = 1;
              }else{
                $status = 2;
              }

              $properties = Properties::where('city' ,'=',$city )
              ->orWhere('type', '=', $type)
              ->orWhere('property_status', '=', $status)
              ->orWhere('bedrooms', '=', $bedrooms)
              ->orWhere('bathrooms', '=', $bathrooms)
              ->whereBetween('price', array($min, $max))
              ->orderBy('id',$order_by)
              ->paginate(10);
              if($properties->count() > 0){
                return view('front.properties.search-front',compact('properties','features','citys','types','statuses'));
  
              }else{
                $properties = Properties::where('activity_status' ,0)->paginate(10);
            return view('front.properties.search-front',compact('properties','features','citys','types','statuses'));
              }
              
            }
          

            
          }


        
     }


     public function city($slug){

      $getCity = citys::where('slug',$slug)->first();
      $props_rents = Properties::where(['city'=>$getCity->id,'property_status' => 1,'activity_status' => 0])->with('agency_fk')->orderBy('id', 'DESC')->paginate(10);
      $props_sales = Properties::where(['city'=>$getCity->id,'property_status' => 2,'activity_status' => 0])->with('agency_fk')->orderBy('id', 'DESC')->paginate(10);
      $props_feaures = PropertiesFeatures::with('property_fk')->paginate(6);

       return view('front.properties.city',compact('props_rents','props_sales','props_feaures','getCity'));
     }

    
}
