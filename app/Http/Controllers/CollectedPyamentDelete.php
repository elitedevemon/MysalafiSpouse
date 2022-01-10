<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMange;

class CollectedPyamentDelete extends Controller
{
  public function destroy($payId)
  {
    PaymentMange::where('payment_status', 'Unpaid')->where('id', $payId)->delete();
    return back();
  }
}
