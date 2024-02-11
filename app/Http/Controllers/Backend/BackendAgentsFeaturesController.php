<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Backend\AgentsFeatures;

class BackendAgentsFeaturesController extends Controller
{
    public function index(Request $request)
    {
        $agents_features =  AgentsFeatures::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name','LIKE','%'.$request->q.'%');
        })->with(['agent_fk','agency_fk'])->orderBy('id','DESC')->paginate();

        return view('admin.agents_features.index',compact('agents_features'));
    }
}
