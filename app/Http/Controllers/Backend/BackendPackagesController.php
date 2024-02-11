<?php

namespace App\Http\Controllers\Backend;

use MainHelper;
use Illuminate\Http\Request;
use App\Models\Backend\Packages;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class BackendPackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   


    public function index(Request $request)
    {
        $packages =  Packages::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name','LIKE','%'.$request->q.'%')->orWhere('price','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();

        return view('admin.packages.index',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.packages.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        return $request;
        exit;
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'name'=>"required|max:190",
            'price'=>"required|integer|max:99999999",
            'status'=>"required|integer",
            'slug'=>"required|max:190|unique:agencies,slug",
            'bio'=>"nullable|max:100000",
            'agent_count'=>"required|integer|max:9999999999999999999",
            'properties_count'=>"required|integer|max:9999999999999999999",
            'properties_features_count'=>"required|integer|max:9999999999999999999",
            'adds_count'=>"required|integer|max:9999999999999999999",
          
        ]);



        $package = Packages::create([
            "name"=>$request->name,
            "price"=>$request->price,
            "status"=>$request->status,
            "slug"=>$request->slug,
            "bio"=>$request->bio,
            'agent_count'=>$request->agent_count,
            'properties_count'=>$request->properties_count,
            'properties_features_count'=>$request->properties_features_count,
            'adds_count'=>$request->adds_count,
            'admin_id' => auth()->user()->id,
        ]);
        MainHelper::move_media_to_model_by_id($request->temp_file_selector,$package,"logo");
        if($request->hasFile('logo')){
            $main_image = $package->addMedia($request->logo)->toMediaCollection('image');
            $package->update(['logo'=>$main_image->id.'/'.$main_image->file_name]);
        }
        toastr()->success(__('admin/utils/toastr.package_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.packages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Packages $backendPackages)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Packages $package)
    {
        return view('admin.packages.edit',compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Packages $package)
    {
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);

        
        $request->validate([
            'name'=>"required|max:190",
            'price'=>"required|integer|max:99999999",
            'status'=>"required|integer",
            'slug'=>"required|max:190|unique:packages,slug,".$package->id,
            'bio'=>"nullable|max:100000",
            'agent_count'=>"required|integer|max:9999999999999999999",
            'properties_count'=>"required|integer|max:9999999999999999999",
            'properties_features_count'=>"required|integer|max:9999999999999999999",
            'adds_count'=>"required|integer|max:9999999999999999999",
          
        ]);


        $package->update([

            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
            'slug' => $request->slug,
            'bio' => $request->bio,
            'agent_count'=>$request->agent_count,
            'properties_count'=>$request->properties_count,
            'properties_features_count'=>$request->properties_features_count,
            'adds_count'=>$request->adds_count,
        ]);

        if($request->hasFile('logo')){
            $main_image = $package->addMedia($request->logo)->toMediaCollection('image');
            $package->update(['logo'=>$main_image->id.'/'.$main_image->file_name]);
        }

        toastr()->success(__('admin/utils/toastr.package_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.packages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Packages $package)
    {
        $package->delete();
        toastr()->success(__('admin/utils/toastr.package_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.packages.index');
    }
}
