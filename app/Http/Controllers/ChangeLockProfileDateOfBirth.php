<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class ChangeLockProfileDateOfBirth extends Controller
{
  public function index()
  {
    $changeable = User::where('lock_profile_date', '2022-01-01')->where('dob', '!=', '1990-01-01')->get();
    foreach ($changeable as $change ) {
      $set_date = new DateTime($change->dob);
      $today = new DateTime();
      $interval = $set_date->diff($today);
      $lock_profile_date = date('Y-m-d', strtotime($change->dob. " +$interval->y Year"." +1 Year"));
      // dd($lock_profile_date);
      User::where('profile_code', $change->profile_code)->update([
        'lock_profile_date' => $lock_profile_date
      ]);
    }
    print "Total changed profile: ". count($changeable)."<br/>";
    print "<br>Profile code: <br>";
    foreach ($changeable as  $chng) {
      print($chng->profile_code).", ";
    }
    print "<br>Profile date of birth: <br>";
    foreach ($changeable as  $chng) {
      print($chng->dob).", ";
    }
    print "<br>Profile lock date of birth: <br>";
    foreach ($changeable as  $chng) {
      print($chng->lock_profile_date).", ";
    }
    return "<h2 style='color: green'>Successfuly changed all of the profile's lock profile date according their date of birth</h2>";
  }
}
