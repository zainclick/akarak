<?php

namespace App\Http\Controllers\Backend;
use App\Helpers\MainHelper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\PropertysTyps;

class BackendPropertyTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $types =  PropertysTyps::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name_ar','LIKE','%'.$request->q.'%')->orWhere('name_en','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();

        return view('admin.property-types.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.property-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'name_ar'=>"required|max:190",
            'name_en'=>"required|max:190",
            'status'=>"required|in:0,1",
            'slug'=>"required|max:190|unique:propertys_typs,slug",
        ]);

        $type = PropertysTyps::create([
            "name_ar"=>$request->name_ar,
            "name_en"=>$request->name_en,
            "status"=>$request->status,
            "slug"=>$request->slug,
        ]);

        MainHelper::move_media_to_model_by_id($request->temp_file_selector,$type,"logo");
        if($request->hasFile('logo')){
            $main_image = $type->addMedia($request->logo)->toMediaCollection('image');
            $type->update(['logo'=>$main_image->id.'/'.$main_image->file_name]);
        }
        toastr()->success(__('admin/utils/toastr.city_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.property-types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $proeprtyType = PropertysTyps::Where('slug',$slug)->first();
        if($proeprtyType != null){
            return $proeprtyType;
        }else{
            return redirect()->back();
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $type = PropertysTyps::Where('slug',$slug)->first();
        if($type != null){
            
            return view('admin.property-types.edit',compact('type'));

        }else{
            return redirect()->back();
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        if($request->slug){
            $type = PropertysTyps::Where('slug',$request->slug)->first();
            if($type != null){

                $request->merge([
                    'slug'=>\MainHelper::slug($request->slug)
                ]);
        
                $request->validate([
                    'name_ar'=>"required|max:190",
                    'name_en'=>"required|max:190",
                    'status'=>"required|in:0,1",
                ]);
        
                $type->update([
        
                    'name_ar' => $request->name_ar,
                    'name_en' => $request->name_en,
                    'status' => $request->status,
                    
                ]);
        
                if($request->hasFile('logo')){
                    $main_image = $type->addMedia($request->logo)->toMediaCollection('image');
                    $type->update(['logo'=>$main_image->id.'/'.$main_image->file_name]);
                }
        
                toastr()->success(__('admin/utils/toastr.city_update_success_message'), __('utils/toastr.successful_process_message'));
                return redirect()->route('admin.property-types.index');


            }else{
                return redirect()->back();
            }
        }else{
                return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $type = PropertysTyps::Where('slug',$slug)->first();
        if($type != null){
            
            $type->delete();
            toastr()->success(__('admin/utils/toastr.agency_destroy_success_message'), __('utils/toastr.successful_process_message'));
            return redirect()->route('admin.property-types.index');

        }else{
            return redirect()->back();
        }
    }
}
