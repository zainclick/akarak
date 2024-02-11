<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\Properties;
use App\Http\Controllers\Controller;
use App\Models\Backend\PropertiesFeatures;

class BackendPropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $properties =  Properties::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name','LIKE','%'.$request->q.'%');
        })->with(['agency_fk','agent_fk','property_features_fk'])->orderBy('id','DESC')->paginate();

        return view('admin.properties.index',compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function add_property_features($slug){

        $property = Properties::where('slug',$slug)->first();

        $property_features = PropertiesFeatures::create([
            "property"=>$property->id,
            "agency"=>$property->agency,
            "agent" => $property->agent,
            "admin_id" => auth()->user()->id,
            "expiry_date"=> '01/01/2025',
        ]);

        toastr()->success(__('admin/utils/toastr.agency_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.properties.index');

    }

    public function remove_property_features($slug){

        $property = Properties::where('slug',$slug)->first();
        $prop_features = PropertiesFeatures::where('property',$property->id)->first();
        $prop_features->delete();

        toastr()->success(__('admin/utils/toastr.agency_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.properties-features');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
