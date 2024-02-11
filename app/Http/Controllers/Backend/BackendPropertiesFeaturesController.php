<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Backend\PropertiesFeatures;

class BackendPropertiesFeaturesController extends Controller
{
    public function index(Request $request)
    {
        $prop_features =  PropertiesFeatures::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name','LIKE','%'.$request->q.'%');
        })->with(['property_fk','agency_fk'])->orderBy('id','DESC')->paginate();

        return view('admin.properties_features.index',compact('prop_features'));
    }
}
