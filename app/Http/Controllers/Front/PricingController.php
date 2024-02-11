<?php

namespace App\Http\Controllers\Front;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\Backend\agencies;
use App\Models\Backend\Packages;
use Laravel\Cashier\Subscription;
use App\Models\Plan as ModelsPlan;
use App\Http\Controllers\Controller;

class PricingController extends Controller
{
    public function index(){

        $plans_monthly = ModelsPlan::where(['status' => 0,'pilling_period' => 'month'])->get();
        $plans_year = ModelsPlan::where(['status' => 0,'pilling_period' => 'year'])->get();

        return view('front.pages.pricing',compact('plans_monthly','plans_year'));

    }

    public function checkout($slug){

        
        $plan = ModelsPlan::where('slug',$slug)->first();
        $agency = auth('agency')->user();
        if($plan != null){

            return view('front.checkout.index',['plan'=>$plan,'intent'=>$agency->createSetupIntent()]);

        }else{
            return redirect()->back();
        }

    }

    public function complete(Request $request){
  
        $agency = auth('agency')->user();
        $agency->createOrGetStripeCustomer();
        $paymentMethod = null;
        $paymentMethod = $request->payment_method;
        if($paymentMethod != null){
            $paymentMethod = $agency->addPaymentMethod($paymentMethod);
        }

        $plan = $request->plan_id;
        
        try{
            $plan_check = ModelsPlan::where('plan_id',$plan)->first();
            if($plan_check->pilling_period == 'day'){
                $durationType = $plan_check->interval_count * 1;
            }elseif($plan_check->pilling_period == 'week'){
                $durationType = $plan_check->interval_count * 7;
            }elseif($plan_check->pilling_period == 'month'){
                $durationType = $plan_check->interval_count * 30;
            }else{
                $durationType = $plan_check->interval_count * 365;
            }

            $agency->newSubscription(
                'default', $plan
            )->trialDays($durationType)->create($paymentMethod != null ? $paymentMethod->id: '');
            $agency->trial_ends_at = Carbon::now()->addDays($durationType);
            $agency->save();
            
            return redirect()->route('front-pricing-success-payment',$agency->slug);

        }catch(Exception $ex){
            dd($ex);
        }
        /*
        $amount = $request->amount;
        
        $agency->charge($amount, $paymentMethod->id);
        

        return $request;
        exit;

        $amount = $request->amount;
        $agency = auth('agency')->user();
        $describtion  = "company :" . $agency->name_en . " is pay for monthly package" .$amount. "AED";
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51Og7wcDJlKzz2Dx11amLO4hA8KQ3Nhzto3Wn1g6a1GwfL82A14cazfGvmDuEDhc428a3MClVEuRcLR5mN8O2KXv900Jg7tsmfw');
        $amount = $request->amount;
        $amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
            'amount' => $amount,
            'currency' => 'AED',
            'description' => $describtion,
            'payment_method_types' => ['card'],
            'automatic_payment_methods' => ['enabled' => true],
            
        ]);
        $intent = $payment_intent->client_secret;
        */
   
    }

    public function successPayment($agency){

        $agency = agencies::where('slug',$agency)->first();
        if($agency->stripe_id != null){
            $subscription = Subscription::where('agencies_id',$agency->id)->first();
            return view('front.pages.payment-success',compact('agency','subscription'));
        }else{
            route('front-pricing');
        }


    }
}
