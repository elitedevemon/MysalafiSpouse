<?php

namespace App\Http\Middleware;

use App\Http\Livewire\Config;
use App\Models\Config as ModelsConfig;
use App\Models\PaymentMange;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // return 'sada';
    //    return redirect('lock-profile');
        if(Auth::check())
        {
            // dd(Auth::user()->email);
            if(date('Y-m-d') > Auth::user()->lock_profile_date)
            {
                // dd('ad');
                $auth = Auth::user();
                $config = ModelsConfig::first();
                if($auth->type == 'UK Base'){
                    $fee =  '£'.$config->anual_fee_euro;
                }else{
                    $fee =  '$'.$config->anual_fee;
                }
                $thandamessage = '';
                $message = '';
                $plusage = Auth::user()->age +1;
                $payment = PaymentMange::where('payment_status', 'Unpaid')->where('user_id', Auth::user()->id)
                ->where('paid_against', 'Anual Fee')->first();
                if($payment){
                    $thandamessage = 'Your annual profile update fee payment is currently processing. We will get back to you shortly with a payment confirmation email. Thank you for your patience.<br/><br/>

                    BarakAllāhu Feekum,
                    MySalafiSpouse team';    
                }else{
                $message = "
                <p style='text-align:center;'>السلام عليكم ورحمة الله وبركاته</p>
                <br><br>
                Our records show that your profile is due a mandatory age edit. As you are now $plusage  & your profile displays $auth->age.
                <br><br>
                Your profile will be edited and reposted to our Instagram page, Facebook page & website. There's a small fee of just $fee to make the annual profile edit. You can continue to use your unlimited UK match requests as usual after you have edited your profile.
                <br><br>
                Would you like to proceed with the Annual Profile Edit?";
            }
            
                return redirect('lock-profile')
                ->with('garammessage', $message)
                ->with('thandamessage', $thandamessage);
            }
        }
        if(!Auth::check()) return redirect('/');
        return $next($request);
    }
}
