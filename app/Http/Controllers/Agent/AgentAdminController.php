<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Models\Backend\Agents;
use App\Models\Backend\agencies;
use App\Http\Controllers\Controller;

class AgentAdminController extends Controller
{
    public function index(Request $request)
    {
        $agent_id = auth()->user()->id;
        $agent = Agents::where('id',$agent_id)->with('agency_fk')->first();
       return view('agent.index',compact('agent'));
    }
       
}
