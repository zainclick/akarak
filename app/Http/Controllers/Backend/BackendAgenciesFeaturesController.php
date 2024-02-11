<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Backend\AgenciesFeatures;

class BackendAgenciesFeaturesController extends Controller
{
    public function index(Request $request)
    {
        $agencies_features =  AgenciesFeatures::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name','LIKE','%'.$request->q.'%');
        })->with(['agency_fk'])->orderBy('id','DESC')->paginate();

        return view('admin.agencies_features.index',compact('agencies_features'));
    }
}
