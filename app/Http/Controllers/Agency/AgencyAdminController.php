<?php

namespace App\Http\Controllers\Agency;

use Illuminate\Http\Request;
use App\Models\Backend\Agents;
use App\Models\Backend\agencies;
use Laravel\Cashier\Subscription;
use App\Http\Controllers\Controller;

class AgencyAdminController extends Controller
{

    public function index(Request $request)
    {
        $agency_id = auth()->user()->id;
        $agency = agencies::where('id',$agency_id)->with('package_fk')->first();
        $agents = Agents::where('agency',$agency_id)->get();
        $subscription = Subscription::where('agencies_id',$agency_id)->first();

       return view('agencies.index',compact('agency','agents','subscription'));
    }
       
}
