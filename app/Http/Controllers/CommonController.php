<?php

namespace App\Http\Controllers;

use App\Http\Livewire\WantToSignUp;
use App\Models\Balance;
use App\Models\PaymentMange;
use App\Models\RequestLog;
use App\Models\User;
use App\Models\WantToSignup as ModelsWantToSignup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommonController extends Controller
{
    public function logout()
    {
        if(Auth::user()->user_type == 'user'){
            Auth::logout();
            return redirect('/login');
        }
        else
        {
            Auth::logout();
            return redirect('superadmin/login');
        }
       
    }
    public function deleteProfile($id)
    {
        return "<b>Are you sure you want to delete this user<b><br><br>
        <a style='background:gray;padding:10px 40px 10px 40px;color:white;' href='/superadmin/delete-account/$id'>Yes</a>
        &nbsp;&nbsp;&nbsp;&nbsp;<a style='background:gray;padding:10px 40px 10px 40px;color:white;' href='/superadmin/profile?filter=Female'>No</a>";
       
    }
    public function del($id)
    {
        $request = RequestLog::where('user_id', $id)->delete();
        $balance = Balance::where('user_id', $id)->delete();
        $payment = PaymentMange::where('user_id', $id)->delete();
        $user = User::where('id', $id)->delete();
        return redirect('superadmin/profile?filter=Female')->with('message', 'User delete successfully');
    }
    public function deleteSelf()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->deleted = 'yes';
        $user->update();
        Auth::logout();
        return redirect('/');
    }
    public function deactiveMyAccount()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->deactive = 'yes';
        $user->update();
        Auth::logout();
        return redirect('/');
    }
    public function matchReadStatus($id)
    {
        $reqLog = RequestLog::find($id);
        $reqLog->r_status = 1;
        $reqLog->update();
        return redirect()->back();
    }
    public function signupReadStatus($id)
    {
        // return $id;
        $reqLog = ModelsWantToSignup::find($id);
        $reqLog->status = 1;
        $reqLog->update();
        return redirect()->back();
    }


}
