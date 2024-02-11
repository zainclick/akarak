<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\MainHelper;
use Illuminate\Http\Request;
use App\Models\Backend\citys;
use App\Http\Controllers\Controller;

class BackendCitysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $citys =  citys::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name_ar','LIKE','%'.$request->q.'%')->orWhere('name_en','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();

        return view('admin.citys.index',compact('citys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.citys.create');

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
            'slug'=>"required|max:190|unique:citys,slug",
        ]);

        $city = citys::create([
            "name_ar"=>$request->name_ar,
            "name_en"=>$request->name_en,
            "status"=>$request->status,
            "slug"=>$request->slug,
        ]);
        MainHelper::move_media_to_model_by_id($request->temp_file_selector,$city,"logo");
        if($request->hasFile('logo')){
            $main_image = $city->addMedia($request->logo)->toMediaCollection('image');
            $city->update(['logo'=>$main_image->id.'/'.$main_image->file_name]);
        }
        toastr()->success(__('admin/utils/toastr.city_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.citys.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(citys $citys)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(citys $city)
    {
        return view('admin.citys.edit',compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, citys $city)
    {
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'name_ar'=>"required|max:190",
            'name_en'=>"required|max:190",
            'status'=>"required|in:0,1",
            'slug'=>"required|max:190|unique:citys,slug,".$city->id,
        ]);

        $city->update([

            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'status' => $request->status,
            'slug' => $request->slug,
        ]);

        if($request->hasFile('logo')){
            $main_image = $city->addMedia($request->logo)->toMediaCollection('image');
            $city->update(['logo'=>$main_image->id.'/'.$main_image->file_name]);
        }

        toastr()->success(__('admin/utils/toastr.city_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.citys.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(citys $city)
    {
        $city->delete();
        toastr()->success(__('admin/utils/toastr.city_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.citys.index');
    }
}
