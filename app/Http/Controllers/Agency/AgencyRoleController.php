<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AgencyRoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:roles-create', ['only' => ['create','store']]);
        $this->middleware('can:roles-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:roles-update',   ['only' => ['edit','update']]);
        $this->middleware('can:roles-delete',   ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles =  Role::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name','LIKE','%'.$request->q.'%')->orWhere('display_name','LIKE','%'.$request->q.'%')->orWhere('description','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();
        return view('agencies.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agencies.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>"required|unique:roles,name",
            'display_name'=>"required|min:3",
        ]);
        $role = Role::create([
            'name'=>$request->name,
            'display_name'=>$request->display_name,
            'description'=>$request->description,
        ]);
        $role->syncPermissions($request->permissions);
        toastr()->success("تمت العملية بنجاح");
        return redirect()->route('agency.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Role $role)
    {
        $permissions = $role->permissions()->groupBy('table')->get();
        //dd($permissions);
        return view('agencies.roles.show',compact('role','permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Role $role)
    {
        return view('agencies.roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Role $role)
    {
        $request->validate([
            'name'=>"required|unique:roles,name,".$role->id,
            'display_name'=>"required|min:3",
        ]);
        $role->update([
            'name'=>$request->name,
            'display_name'=>$request->display_name,
            'description'=>$request->description,
        ]);
        $role->syncPermissions($request->permissions);
        toastr()->success("تمت العملية بنجاح");
        return redirect()->route('agency.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        toastr()->success("تمت العملية بنجاح");
        return redirect()->route('agency.roles.index');
    }
}
