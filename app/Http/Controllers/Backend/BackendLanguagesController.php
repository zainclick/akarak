<?php

namespace App\Http\Controllers\Backend;

use MainHelper;
use Illuminate\Http\Request;
use App\Models\Backend\languages;
use App\Http\Controllers\Controller;

class BackendLanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $languages =  languages::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name_ar','LIKE','%'.$request->q.'%')->orWhere('name_en','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();

        return view('admin.languages.index',compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.languages.create');

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
            'status'=>"required|in:0,1",
            'slug'=>"required|max:190|unique:languages,slug",
        ]);

        $language = languages::create([
            "name_ar"=>$request->name_ar,
            "name_en"=>$request->name_en,
            "status"=>$request->status,
            "slug"=>$request->slug,
        ]);

        toastr()->success(__('admin/utils/toastr.language_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.languages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(languages $languages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(languages $language)
    {
        return view('admin.languages.edit',compact('language'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, languages $language)
    {
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'name_ar'=>"required|max:190",
            'name_en'=>"required|max:190",
            'status'=>"required|in:0,1",
            'slug'=>"required|max:190|unique:citys,slug,".$language->id,
        ]);

        $language->update([

            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'status' => $request->status,
            'slug' => $request->slug,
        ]);


        toastr()->success(__('admin/utils/toastr.language_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.languages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(languages $language)
    {
        {
            $language->delete();
            toastr()->success(__('admin/utils/toastr.language_destroy_success_message'), __('utils/toastr.successful_process_message'));
            return redirect()->route('admin.languages.index');
        }
    }
}
