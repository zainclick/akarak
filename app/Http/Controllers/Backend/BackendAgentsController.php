<?php

namespace App\Http\Controllers\Backend;

use App\Models\countries;
use App\Helpers\MainHelper;
use App\Models\Backend\SuperAgents;
use Illuminate\Http\Request;
use App\Models\Backend\citys;
use App\Models\Backend\Agents;
use App\Models\Backend\titles;
use App\Models\Backend\agencies;
use App\Models\Backend\Packages;
use App\Models\Backend\languages;
use App\Http\Controllers\Controller;
use App\Models\Backend\AgentsFeatures;
use App\Models\Backend\AgentsLanguages;

class BackendAgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $agents =  Agents::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name','LIKE','%'.$request->q.'%');
        })->with(['agency_fk','agent_features_fk'])->orderBy('id','DESC')->paginate();

        return view('admin.agents.index',compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agencies = agencies::where('status',0)->get();
        $languages = languages::where('status',0)->get();
        $citys = citys::where('status',0)->get();
        $titles = titles::where('status',0)->get();
        $countries = countries::all();

        return view('admin.agents.create',compact('agencies','languages','citys','titles','countries'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->merge([
            'slug'=>MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'name_ar'=>"required|max:190",
            'name_en'=>"required|max:190",
            'agency'=>"required|integer",
            'title'=>"required|integer",
            'city'=>"required|integer",
            'slug'=>"required|max:190|unique:agents,slug",
            'country'=>"required|integer",
            'status'=>"required|integer",
            'bio_ar'=>"nullable|max:100000",
            'bio_en'=>"nullable|max:100000",
            'mobile'=>"required|integer",
            'password'=>"required|min:8|max:24",
            'email'=>"required|email|unique:agents,email",
            'facebook'=>"nullable|max:100000",
            'whatsapp'=>"nullable|integer",
            'address'=>"required",
        ]);
      

        $agent = Agents::create([
            "name_ar"=>$request->name_ar,
            "name_en"=>$request->name_en,
            "agency"=>$request->agency,
            "slug"=>$request->slug .'-'.rand(1000,100000),
            "status"=>$request->status,
            "title"=>$request->title,
            "bio_ar"=>$request->bio_ar,
            "bio_en"=>$request->bio_en,
            "email" => $request->email,
            'password' => \Hash::make($request->password),
            "mobile"=>$request->mobile,
            "brn"=>rand(1000,100000),
            "whatsapp"=>$request->whatsapp,
            "country"=>$request->country,
            "since"=>$request->since,
            "city"=>$request->city ,
            "facebook"=>$request->facebook,
            "address" => $request->address,
        ]);

        MainHelper::move_media_to_model_by_id($request->temp_file_selector,$agent,"logo");
        if($request->hasFile('logo')){
            $main_image = $agent->addMedia($request->logo)->toMediaCollection('image');
            $agent->update(['logo'=>$main_image->id.'/'.$main_image->file_name]);
        }

        //Insert languages of agent
        $lastid = Agents::latest()->first()->id;
        $insertLanguages = [];
        foreach($request->lang as $key){

            $insertLanguages[] = [
                'language' => $key,
                'agent' => $lastid,
            ];
        }
        AgentsLanguages::insert($insertLanguages);

        toastr()->success(__('admin/utils/toastr.agent_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.agents.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agents $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agents $agent)
    {
        $agencies = agencies::where('status',0)->get();
        $languages = languages::where('status',0)->get();
        $citys = citys::where('status',0)->get();
        $titles = titles::where('status',0)->get();
        $countries = countries::all();
        $agent_laguages = AgentsLanguages::where('agent',$agent->id)->get();

        return view('admin.agents.edit',compact('agent','agencies','languages','citys','titles','countries','agent_laguages'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agents $agent)
    {
        $request->merge([
            'slug'=>MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'name_ar'=>"required|max:190",
            'name_en'=>"required|max:190",
            'agency'=>"required|integer",
            'title'=>"required|integer",
            'city'=>"required|integer",
            'slug'=>"required|max:190|unique:agents,slug,".$agent->id,
            'country'=>"required|integer",
            'status'=>"required|integer",
            'bio_ar'=>"nullable|max:100000",
            'bio_en'=>"nullable|max:100000",
            'mobile'=>"required|integer",
            'email'=>"required|email|unique:agents,email,".$agent->id,
            'facebook'=>"nullable|max:100000",
            'whatsapp'=>"nullable|integer",
            'address' => "nullable",
        ]);

        $agent->update([
            "name_ar"=>$request->name_ar,
            "name_en"=>$request->name_en,
            "agency"=>$request->agency,
            "slug"=>$request->slug,
            "status"=>$request->status,
            "title"=>$request->title,
            "bio_ar"=>$request->bio_ar,
            "bio_en"=>$request->bio_en,
            "email" => $request->email,
            "mobile"=>$request->mobile,
            "whatsapp"=>$request->whatsapp,
            "country"=>$request->country,
            "since"=>$request->since,
            "city"=>$request->city ,
            "facebook"=>$request->facebook,
            "address" => $request->address,
        ]);

        if($request->password!=null){
            $agent->update([
                "password"=>\Hash::make($request->password)
            ]);
        }

        $agent_laguages = AgentsLanguages::where('agent',$agent->id)->get();
        foreach($agent_laguages as $agent_laguage){
            $agent_laguage->delete();
        }
        

        $insertLanguages = [];
        foreach($request->lang as $key){

            $insertLanguages[] = [
                'language' => $key,
                'agent' => $agent->id,
            ];
        }
        AgentsLanguages::insert($insertLanguages);

        if($request->hasFile('logo')){
            $main_image = $agent->addMedia($request->logo)->toMediaCollection('image');
            $agent->update(['logo'=>$main_image->id.'/'.$main_image->file_name]);
        }

        toastr()->success(__('admin/utils/toastr.agent_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.agents.index');
    }


    public function add_agent_features($slug){

        $agent = Agents::where('slug',$slug)->first();
       
        $agent_features = AgentsFeatures::create([
            "agent"=>$agent->id,
            "agency"=>$agent->agency,
        ]);

        toastr()->success(__('admin/utils/toastr.agency_store_success_message'), __('utils/toastr.successful_process_message'));

        if(auth('web')->check()){
            return redirect()->route('admin.agents.index');
        }elseif(auth('agency')->check()){
            return redirect()->route('agency-agents');
        }

    }

    public function remove_agent_features($slug){

        $agent = Agents::where('slug',$slug)->first();
        $agent_features = AgentsFeatures::where('agent',$agent->id)->first();
        $agent_features->delete();

        toastr()->success(__('admin/utils/toastr.agency_store_success_message'), __('utils/toastr.successful_process_message'));

        if(auth('web')->check()){
            return redirect()->route('admin.agents.index');
        }elseif(auth('agency')->check()){
            return redirect()->route('agency-agents');
        }

    }

    public function add_super_agent($slug){

        $agent = Agents::where('slug',$slug)->first();
       
        $super_agent = SuperAgents::create([
            "agent"=>$agent->id,
            "agency"=>$agent->agency,
        ]);

        toastr()->success(__('admin/utils/toastr.agency_store_success_message'), __('utils/toastr.successful_process_message'));

        if(auth('web')->check()){
            return redirect()->route('admin.agents.index');
        }elseif(auth('agency')->check()){
            return redirect()->route('agency-agents');
        }

    }

    public function remove_super_agent($slug){

        $agent = Agents::where('slug',$slug)->first();
       
        $super_agent = SuperAgents::where('agent',$agent->id)->first();
        $super_agent->delete();

        toastr()->success(__('admin/utils/toastr.agency_store_success_message'), __('utils/toastr.successful_process_message'));

        if(auth('web')->check()){
            return redirect()->route('admin.agents.index');
        }elseif(auth('agency')->check()){
            return redirect()->route('agency-agents');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agents $agent)
    {
        $agent->delete();
        toastr()->success(__('admin/utils/toastr.agent_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.agents.index');
    }
}
