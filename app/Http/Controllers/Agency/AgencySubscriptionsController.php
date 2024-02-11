<?php

namespace App\Http\Controllers\Agency;
use Illuminate\Http\Request;

use Laravel\Cashier\Subscription;
use App\Http\Controllers\Controller;

class AgencySubscriptionsController extends Controller
{
    public function index(){

        $agency = auth('agency')->user();
        $subscriptions = Subscription::where('agencies_id',$agency->id)->paginate(10);
        return view('agencies.subscriptions.index',compact('subscriptions'));
    }

    public function cancelSubscription(Request $request){

        $agency = auth('agency')->user();
        $subName = $request->subscriptionId;
        $subscription = Subscription::where('agencies_id',$agency->id)->first();

        if($subName != null){
          
            if($subscription->ends_at != null){
                $agency->subscription($subName)->resume();
                toastr()->success(__('admin/utils/toastr.agent_store_success_message'), __('utils/toastr.successful_process_message'));
                return 'subscription resumed done';
            }else{
                $agency->subscription($subName)->cancel();
                toastr()->success(__('admin/utils/toastr.agent_store_success_message'), __('utils/toastr.successful_process_message'));
                return 'subscription cancel done';
            }
           
        }
    }



}
