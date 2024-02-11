<?php

namespace App\Http\Controllers\Agent;

use App\Helpers\MainHelper;
use App\Traits\packageTrait;
use Illuminate\Http\Request;
use App\Models\Backend\citys;
use App\Models\Backend\Agents;
use App\Models\Backend\Features;
use App\Models\Backend\Properties;
use App\Http\Controllers\Controller;
use App\Models\Backend\PropertysTyps;
use App\Models\Backend\PropertysStatus;
use App\Models\Backend\PropertiesImages;
use Illuminate\Support\Facades\Redirect;
use App\Models\Backend\PropertiesFeatures;
use App\Models\Backend\PropertiesFeaturesIcons;

class AgentPropertiesController extends Controller
{

    public function __construct(){
        $this->middleware('CheckSubscribed')->except('index');
    }

    use packageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $agent_id = auth()->user()->id;
        $agent = Agents::where('id',$agent_id)->with('agency_fk')->first();
        $properties = Properties::with('agency_fk','agent_fk')->paginate(10);
       return view('agent.properties.index',compact('properties','agent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $agent_id = auth()->user()->id;
        $agent = Agents::where('id',$agent_id)->with('agency_fk')->first();
        $citys = citys::where('status',0)->get();
        $features = Features::where('status',0)->get();
        $types = PropertysTyps::where('status',0)->get();
        $p_status = PropertysStatus::where('status',0)->get();

        $check = $this->checkProperties($agent->agency_fk->package_fk->id,$agent->agency);
        if($check == 'cant'){
            return Redirect::back()->withErrors(['msg' => 'خطتك الحالية لا تسمح بإضافة أعلان جديد']);
        }else{
            return view('agent.properties.create',compact('agent','citys','features','types','p_status'));
            
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $agent_id = auth()->user()->id;
        $agent = Agents::where('id',$agent_id)->with('agency_fk')->first();


        $request->merge([
            'name'=>MainHelper::slug($request->name)
        ]);
        
        $request->validate([
            'name'=>"required|max:190",
            'property_status'=>"required|integer",
            'property_type'=>"required|integer",
            'price'=>"required|integer",
            'area'=>"required|max:190",
            'sqft' => "required",
            'bedrooms'=>"required|integer",
            'bathrooms'=>"required|integer",
            'address'=>"required|max:190",
            'city'=>"required|integer",
            'zip'=>"required|integer",
            'age'=>"required|integer",
            'activity_status'=>"required|integer",
            'description'=>"required",
        ]);

        if($request->rent_type){

            $rent_type = $request->rent_type;
        }else{
            $rent_type = "";
        }


        $agency = Properties::create([
            "title_ar"=>str_replace('-',' ', $request->name),
            "title_en"=>str_replace('-',' ', $request->name),
            "slug"=>$request->name."-".rand(1000,100000),
            "type"=>$request->property_type,
            "property_status"=>$request->property_status,
            "rent_type" => $rent_type,
            "price"=>$request->price,
            "area"=>$request->area,
            "bedrooms"=>$request->bedrooms,
            "bathrooms"=>$request->bathrooms,
            "address"=>$request->address,
            "city"=>$request->city,
            "description"=>$request->description,
            "age"=>$request->age,
            "zip"=>$request->zip,
            "sqft" => $request->sqft,
            "activity_status" => $request->activity_status,
            'agency' => $agent->agency,
            'agent' => auth()->user()->id,
        ]);

        //Insert features of property
        $lastid = Properties::latest()->first()->id;
        $insertFeatures = [];
        foreach($request->features as $key){
        
            $insertFeatures[] = [
                'feature' => $key,
                'property' => $lastid,
            ];
            }
            PropertiesFeaturesIcons::insert($insertFeatures);

            if ($request->hasfile('images')) {

                foreach ($request->file('images') as $image) {
                    $names = $image->getClientOriginalName();
                    $image->move(public_path() . '/images/properties', $names);
                    $images[] = $names;
                   
    
                }
    
                foreach($images as $image){
    
                    PropertiesImages::create([
                        'image' => $image,
                        'property' => $lastid,
                    ]);
                }
            }

            return redirect()->route('agent-properties');

    }

    public function images(){

         
    }




    /**
     * Display the specified resource.
     */
    public function show(Properties $properties)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Properties $properties)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Properties $properties)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Properties $properties)
    {
        //
    }
}
