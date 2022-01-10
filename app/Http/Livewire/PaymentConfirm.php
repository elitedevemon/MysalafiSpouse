<?php

namespace App\Http\Livewire;

use App\Mail\PaymentConfirm as MailPaymentConfirm;
use Livewire\Component;
use App\Models\PaymentMange;
use App\Models\Balance;
use App\Models\EmailLog;
use App\Models\RequestLog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentConfirm extends Component
{
    public $payId;
    public $payment;
    public function mount()
    {
        $this->payId;
    }
    public function render()
    {
        // dd($this->payId);
        $this->payment=PaymentMange::where('payment_status', 'Unpaid')->where('id', $this->payId)->first();
        return view('livewire.payment-confirm');
    }
    public function store()
    {
       
        if($this->payment->paid_against == 'Anual Fee')
        {
            $user = User::find($this->payment->user_id);
            $lock_profile_date = date('m-d', strtotime($user->dob));
            $currentDate = date('Y-').$lock_profile_date;
            $user->lock_profile_date  = date('Y-m-d', strtotime($currentDate.'+1 years'));
            $user->update();
        }
        if($this->payment->paid_against == "Cancel Request")
        {
          
            $updateStatus=RequestLog::where('id',$this->payment->req_id)->where('status','new')->first();
            $updateStatus->status = 'Cancelled';
            $updateStatus->update();
            $user = User::find($this->payment->user_id);
            $user->update();
        }
        elseif($this->payment->paid_against == 'Deactive Account')
        {
            // dd('adsa');
            $user = User::find($this->payment->user_id);
            $user->deactive = 'yes';
            $user->update();
            // $user->lock_profile_date  = date('Y-m-d', strtotime($currentDate.'+1 years'));
        }
        else{
            Balance::forceCreate([
                'user_id' => $this->payment->user_id,
                'type' => $this->payment->paid_against,
                'qty' => $this->payment->qty,
            ]);
        }
        $payments = PaymentMange::find($this->payment->id);
        $payments->payment_status = 'Paid';
        $payments->update();
        $user1 = User::find($this->payment->user_id);
        Mail::to($user1->email)->send(new MailPaymentConfirm(['user' => $user1]));
        EmailLog::forceCreate([
            'type' => 'Payment Receipt',
            'user_id' => $user1->id,
            'message' => 'We can confirm we have received your fee payment.',
            'profile_link' => 'test'
        ]);
        session()->flash('message', 'Payment paid successfully.');
        return redirect('/superadmin/payment-collection');
    }
}
