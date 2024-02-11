<?php

namespace App\Http\Controllers\Agency;

use App\Models\countries;
use App\Helpers\MainHelper;
use App\Traits\packageTrait;
use Illuminate\Http\Request;
use App\Models\Backend\citys;
use App\Models\Backend\Agents;
use App\Models\Backend\titles;
use App\Models\Backend\agencies;
use App\Models\Backend\languages;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Backend\AgentsLanguages;
use Illuminate\Support\Facades\Redirect;

class AgenciesAgentsController extends Controller
{
    use packageTrait;

    public function __construct(){
        $this->middleware('CheckSubscribed')->except('index');
    }

    public function index(Request $request){

        $agency_id = auth()->user()->id;
        $agency = agencies::where('id',$agency_id)->with('package_fk')->first();
        $agents = Agents::where('agency',$agency_id)->with('city_fk')->paginate();
        return view('agencies.agents.index',compact('agency','agents'));
    }

    public function create(Request $request){

        $agency_id = auth()->user()->id;
        $agency = agencies::where('id',$agency_id)->with('package_fk')->first();
        $citys = citys::where('status',0)->get();
        $countries = countries::all();
        $titles = titles::where('status',0)->get();
        $languages = languages::where('status',0)->get();
        $agents = Agents::where('agency',$agency_id)->get();

        $check = $this->checkAgent($agency->package,$agency->agency);
        if($check == 'cant'){
            return Redirect::back()->withErrors(['msg' => __('agencies/msgs.cant_add_agent')]);
        }else{
            return view('agencies.agents.create',compact('agency','agents','citys','countries','titles','languages'));
            
        }


    }

    public function store(Request $request)
    {
       
        $request->merge([
            'name_en'=>MainHelper::slug($request->name_en)
        ]);

        $request->validate([
            'name_ar'=>"required|max:190",
            'name_en'=>"required|max:190",
            'email'=>"required|email|unique:agents,email",
            'password'=>"required|max:190",
            'status'=>"required|integer",
            'title'=>"required|integer",
            'city'=>"required|integer",
            'country'=>"required|integer",
            'mobile'=>"required|string",
            'since'=>"required",
            'bio'=>"nullable|max:100000",
            'facebook'=>"nullable|max:100000",
            'whatsapp'=>"nullable|string",
            'address'=>"required|max:200",
        ]);



        $agent = Agents::create([
            "name_ar"=>$request->name_ar,
            "name_en"=>$request->name_en,
            "agency"=>auth()->user()->id,
            "slug"=>$request->name_en.'-'.rand(1000,100000),
            "status"=>$request->status,
            "title"=>$request->title,
            "bio_ar"=>$request->bio_ar,
            "bio_en"=>$request->bio_en,
            "email" => $request->email,
            'password'=>Hash::make($request['password']),
            "mobile"=>$request->mobile,
            "whatsapp"=>$request->whatsapp,
            "brn"=>rand(1000,100000),
            "country"=>$request->country,
            "since"=>$request->since,
            "city"=>$request->city ,
            "facebook"=>$request->facebook,
            'address' => $request->address,
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
        return redirect()->route('agency-agents');
    }

    public function edit(Request $request,$id){


        $citys = citys::where('status',0)->get();
        $countries = countries::all();
        $titles = titles::where('status',0)->get();
        $languages = languages::where('status',0)->get();
        $agent = Agents::where('slug',$id)->first();

        return view('agencies.agents.edit',compact('agent','citys','countries','titles','languages'));

    }

    public function update(Request $request,$slug)
    {

        $agent = Agents::where('slug',$slug)->first();

        $request->validate([
            'name_ar'=>"required|max:190",
            'name_en'=>"required|max:190",
            'title'=>"required|integer",
            'city'=>"required|integer",
            'country'=>"required|integer",
            'status'=>"required|integer",
            'bio_ar'=>"nullable|max:100000",
            'bio_en'=>"nullable|max:100000",
            'mobile'=>"required|integer",
            'facebook'=>"nullable|max:100000",
            'whatsapp'=>"nullable|integer",
            'address' => "nullable",
        ]);

        $agent->update([
            "name_ar"=>$request->name_ar,
            "name_en"=>$request->name_en,
            "status"=>$request->status,
            "title"=>$request->title,
            "bio_ar"=>$request->bio_ar,
            "bio_en"=>$request->bio_en,
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
        return redirect()->route('agency-agents');
    }   

    public function show(Request $request,$id){

        $agency_id = auth()->user()->id;
        $agency = agencies::where('id',$agency_id)->with('package_fk')->first();
        $agent = Agents::where('id',$id)->with('city_fk','country_fk')->first();

        return view('agencies.agents.show',compact('agency','agent'));

    }

    public function pending(Request $request){

        $agency_id = auth()->user()->id;
        $agency = agencies::where('id',$agency_id)->with('package_fk')->first();
        $agents = Agents::where(['agency'=> $agency_id,'status' => 1])->with('city_fk')->paginate();
        return view('agencies.agents.pending',compact('agency','agents'));
    }

    public function blocked(Request $request,$slug){

        $agent = Agents::where('slug',$slug)->first();

        if($agent->status == 0){
            $agent->update([
                'status' => 1,
            ]);
        }else{
            $agent->update([
                'status' => 0,
            ]);
        }

        toastr()->success(__('admin/utils/toastr.agent_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('agency-agents');

    }

    public function delete(Request $request){

        $slug = $request->slug;
        $agent = Agents::where('slug',$slug)->first();
        $agent->delete();

        toastr()->success(__('admin/utils/toastr.agency_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('agency-agents');

    }
}
