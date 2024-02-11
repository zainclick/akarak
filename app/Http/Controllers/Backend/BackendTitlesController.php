<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\MainHelper;
use Illuminate\Http\Request;
use App\Models\Backend\titles;
use App\Http\Controllers\Controller;

class BackendTitlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $titles =  titles::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name_ar','LIKE','%'.$request->q.'%')->orWhere('name_en','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();

        return view('admin.titles.index',compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.titles.create');

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
            'slug'=>"required|max:190|unique:titles,slug",
        ]);

        $title = titles::create([
            "name_ar"=>$request->name_ar,
            "name_en"=>$request->name_en,
            "status"=>$request->status,
            "slug"=>$request->slug,
        ]);

        toastr()->success(__('admin/utils/toastr.title_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.titles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(titles $titles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(titles $title)
    {
        return view('admin.titles.edit',compact('title'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, titles $title)
    {
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'name_ar'=>"required|max:190",
            'name_en'=>"required|max:190",
            'status'=>"required|in:0,1",
            'slug'=>"required|max:190|unique:titles,slug,".$title->id,
        ]);

        $title->update([

            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'status' => $request->status,
            'slug' => $request->slug,
        ]);


        toastr()->success(__('admin/utils/toastr.title_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.titles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(titles $title)
    {
        $title->delete();
        toastr()->success(__('admin/utils/toastr.title_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.titles.index');
    }
}
