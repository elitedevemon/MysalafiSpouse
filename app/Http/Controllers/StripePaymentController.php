<?php
   
namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Config;
use App\Models\PaymentMange;
use App\Models\RequestLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
// use Session;
use Stripe;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request)
    {
    //    return  date('Y-m-d', strtotime(Auth::user()->lock_profile_date . " +1 year") );
        $config = Config::first();
        if($request->type == 4){
            $log = RequestLog::where('id', $request->logid)->where('status', 'new')->where('user_id', Auth::user()->id)->first();
           
            $request['price'] = Auth::user()->type == 'International' ? $config->match_cacnel_fee : $config->match_cacnel_fee_euro;
        }
        if($request->type == 1 || $request->type == 2 || $request->type == 3)
        {
            $log = ['id' => 0];
            // return $log;
        }
        if($request->type == 5)
        {
            $log = ['id' => 0];
            $request['price'] = Auth::user()->type == 'International' ? $config->anual_fee : $config->anual_fee_euro;
            // return $log;
        }
      
        
        return view('livewire.buy-request')
        ->with('qty', $request->qty)
        ->with('type', $request->type)
        ->with('price', $request->price)
        ->with('log', $log);
    }
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        // return $request->All();
        $config = Config::first();
        if($request->qty > 0 && $request->price > 0 && $request->val == 1)
        {
            $fee = Auth::user()->type == 'International' ? $config->match_request_fee : $config->match_request_fee_euro;
            $amount = $request->qty * $fee;
            $paid_against = 'International match request';
        }
        if($request->qty > 0 && $request->price > 0 && $request->val == 2)
        {
            $fee = Auth::user()->type == 'International' ? $config->match_request_fee : $config->match_request_fee_euro;
            $amount = $request->qty * $fee;
            $paid_against = 'Match request';
        }
        elseif($request->qty > 0 && $request->price > 0 && $request->val == 3)
        {
            $fee = Auth::user()->type == 'International' ? $config->edit_profile_fee : $config->edit_profile_fee_euro;
            $amount = $request->qty * $fee;
            $paid_against = 'Profile edit';
        }
        elseif($request->price > 0 && $request->val == 4)
        {
            // return $config;
            $fee = Auth::user()->type == 'International' ? $config->match_cacnel_fee : $config->match_cacnel_fee_euro;
            $amount = $fee;
            // return
            $request['qty'] = 1;
            $paid_against = 'Cancel Request';
        }
        elseif($request->price > 0 && $request->val == 5)
        {
            // return $config;
            $fee = Auth::user()->type == 'International' ? $config->anual_fee : $config->anual_fee_euro;
            $amount = $fee;
            // return
            $request['qty'] = 1;
            $paid_against = 'Anual Fee';
        }
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $pay = Stripe\Charge::create ([
                "amount" =>  100 * $amount,
                "currency" => Auth::user()->type == 'International' ? 'usd' : 'gbp',
                "source" => $request->stripeToken,
                "description" => "payment from mysalafispouse.com." 
        ]);
        PaymentMange::forceCreate([
            'transaction_id' => $pay['id'],
            'user_id' => Auth::user()->id,
            'paid_against' => $paid_against,
            'payment_method' => 'Stripe',
            'payment_status' => 'Paid',
            'currency' => $pay['currency'],
            'amount' => $amount,
        ]);
        if($request->val == 5)
        {
            // dd('asd');
            $user = User::find(Auth::user()->id);
            $user->lock_profile_date = date('Y-m-d', strtotime(Auth::user()->lock_profile_date . " +1 year") );
            $user->update();
            Session::flash('message', 'Annual Fee Paid Successfully');
            return redirect('dashboard');
        }
        if($request->val == 4)
        {
            $log = RequestLog::where('id', $request->logid)->where('status', 'new')->where('user_id', Auth::user()->id)->first();
            $log->status = 'Cancelled';
            $log->update();
            Session::flash('message', 'Request Cancelled susseccfully');
            return redirect('dashboard?filter=sent');

        }
        if($request->val == 1 || $request->val == 2 || $request->val == 3)
        {
            Balance::forceCreate([
                'user_id' => Auth::user()->id,
                'qty' => $request->qty,
                'type' => $paid_against,
            ]);
            Session::flash('message', 'Thank you for purchasing request');
            return redirect('add-ons');
        }
        
    }
}