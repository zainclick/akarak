<?php

namespace App\Http\Controllers\Backend;

use MainHelper;
use App\Models\User;
use App\Models\countries;
use Illuminate\Http\Request;
use App\Models\Backend\citys;
use App\Models\Backend\agencies;
use App\Models\Backend\Packages;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Backend\AgenciesFeatures;

class BackendAgenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $agencies = Agencies::paginate(10);
        return view('admin.agencies.index',compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $roles = Role::get();
        $packages = Packages::where('status',0)->get();
        $citys = citys::where('status',0)->get();
        $countries = countries::get();
        return view('admin.agencies.create',compact('roles','packages','citys','countries'));
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
            'package'=>"required|integer",
            'status'=>"required|integer",
            'slug'=>"required|max:190|unique:agencies,slug",
            'bio_ar'=>"nullable|max:100000",
            'bio_en'=>"nullable|max:100000",
            'email'=>"required|unique:agencies,email",
            'orn'=>"required|unique:agencies,orn",
            'password'=>"required|min:8|max:190",
            'stab' => "required",
            'website'=>"nullable|max:100000",
            'mobile'=>"required|max:9999999999999999999",
            'facebook'=>"nullable|max:100000",
            'whatsapp'=>"nullable|max:9999999999999999999",
            'address'=>"nullable|max:100000",
        ]);

        $agency = agencies::create([
            "name_ar"=>$request->name_ar,
            "name_en"=>$request->name_en,
            "package"=>$request->package,
            "status"=>$request->status,
            "slug"=>$request->slug,
            "bio_ar"=>$request->bio_ar,
            "bio_en"=>$request->bio_en,
            "email"=>$request->email,
            "password"=>\Hash::make($request->password),
            'stab' => $request->stab,
            'country'  => $request->country,
            'city' => $request->city,
            "website"=>$request->website,
            "mobile"=>$request->mobile,
            "facebook"=>$request->facebook,
            "whatsapp"=>$request->whatsapp,
            "address"=>$request->address,
            'orn' => $request->orn,
            'admin_id' => auth()->user()->id,
        ]);

        MainHelper::move_media_to_model_by_id($request->temp_file_selector,$agency,"baio");
        if($request->hasFile('logo')){
            $main_image = $agency->addMedia($request->logo)->toMediaCollection('image');
            $agency->update(['logo'=>$main_image->id.'/'.$main_image->file_name]);
        }

        if($request->hasFile('orn')){
            $main_image = $agency->addMedia($request->orn)->toMediaCollection('image');
            $agency->update(['orn'=>$main_image->id.'/'.$main_image->file_name]);
        }
        toastr()->success(__('admin/utils/toastr.agency_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.agencies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(agencies $agency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(agencies $agency)
    {
        $packages = Packages::where('status',0)->get();
        return view('admin.agencies.edit',compact('agency','packages'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, agencies $agency)
    {
        $request->validate([
            'name_ar'=>"required|max:190",
            'name_en'=>"required|max:190",
            'package'=>"required|integer",
            'status'=>"required|integer",
            'slug'=>"required|max:190|unique:agencies,slug,".$agency->id,
            'bio_ar'=>"nullable|max:100000",
            'bio_en'=>"nullable|max:100000",
            'email'=>"required|unique:agencies,email,".$agency->id,
            'orn'=>"required|unique:agencies,orn,".$agency->id,
            'password'=>"required|min:8|max:190",
            'stab' => "required",
            'website'=>"nullable|max:100000",
            'mobile'=>"required|max:9999999999999999",
            'facebook'=>"nullable|max:100000",
            'whatsapp'=>"nullable|max:9999999999999999",
            'address'=>"nullable|max:100000",
        ]);

        $agency->update([
            "name_ar"=>$request->name_ar,
            "name_en"=>$request->name_en,
            "package"=>$request->package,
            "status"=>$request->status,
            "slug"=>$request->slug,
            "bio_ar"=>$request->bio_ar,
            "bio_en"=>$request->bio_en,
            "stab" => $request->stab,
            "website"=>$request->website,
            "mobile"=>$request->mobile,
            "facebook"=>$request->facebook,
            "whatsapp"=>$request->whatsapp,
            "address"=>$request->address,
            'orn' => $request->orn,
        ]);

        if($request->password!=null){
            $agency->update([
                "password"=>\Hash::make($request->password)
            ]);
        }

        if($request->hasFile('logo')){
            $main_image = $agency->addMedia($request->logo)->toMediaCollection('image');
            $agency->update(['logo'=>$main_image->id.'/'.$main_image->file_name]);
        }

        if($request->hasFile('orn')){
            $main_image = $agency->addMedia($request->orn)->toMediaCollection('image');
            $agency->update(['orn'=>$main_image->id.'/'.$main_image->file_name]);
        }

        toastr()->success(__('admin/utils/toastr.agency_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.agencies.index');
    }

    public function add_agency_features($slug){

        $agency = agencies::where('slug',$slug)->first();

        $agent_features = AgenciesFeatures::create([
            "agency"=>$agency->id,
            "admin_id" => auth()->user()->id,
            "expiry_date"=> '01/01/2025',
        ]);

        toastr()->success(__('admin/utils/toastr.agency_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.agencies.index');

    }

    public function remove_agency_features($slug){

        $agency = agencies::where('slug',$slug)->first();
        $agency_features = AgenciesFeatures::where('agency',$agency->id)->first();
        $agency_features->delete();

        toastr()->success(__('admin/utils/toastr.agency_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.agencies.features');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(agencies $agency)
    {
        $agency->delete();
        toastr()->success(__('admin/utils/toastr.agency_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.agencies.index');
    }
}
