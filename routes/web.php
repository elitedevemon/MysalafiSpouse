<?php

use App\Http\Controllers\ChangeLockProfileDateOfBirth;
use App\Http\Controllers\CommonController;
use App\Http\Livewire\Admin\Login;
use App\Http\Livewire\AdminMatch;
use App\Http\Livewire\BuyRequest;
use App\Http\Livewire\Config;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Dahboard;
use App\Http\Livewire\EditProfile;
use App\Http\Livewire\Faqs;
use App\Http\Livewire\ForgotPassword;
use App\Http\Livewire\Index;
use App\Http\Livewire\LockProfile;
use App\Http\Livewire\MatchMakingProcess;
use App\Http\Livewire\MatchRequestView;
use App\Http\Livewire\MyProfile;
use App\Http\Livewire\Notification;
use App\Http\Livewire\PaymentConfirm;
use App\Http\Livewire\ProfileEdit;
use App\Http\Livewire\ProfileUpdateView;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\Setting;
use App\Http\Livewire\SignupView;
use App\Http\Livewire\Site;
use App\Http\Livewire\TableView\PaymentCollection;
use App\Http\Livewire\TableView\Profile as TableViewProfile;
use App\Http\Livewire\TableView\SignupRequest;
use App\Http\Livewire\TableView\Subscribe;
use App\Http\Livewire\TableView\UpdateProfile;
use App\Http\Livewire\User\AddOn;
use App\Http\Livewire\User\AllProfile;
use App\Http\Livewire\User\ChangePassword;
use App\Http\Livewire\User\Dashboard;
use App\Http\Livewire\User\Login as UserLogin;
use App\Http\Livewire\User\ProfileView;
use App\Http\Livewire\User\ResetPassword as UserResetPassword;
use App\Http\Livewire\User\VerifyForgotPassword;
use App\Http\Livewire\VisitAllProfiles;
use App\Http\Livewire\WantToSignUp;
use App\Models\WantToSignup as ModelsWantToSignup;
use App\Http\Controllers\CollectedPyamentDelete;
use App\Http\Livewire\Changedob;
use Illuminate\Support\Facades\Route;
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
//Route::get('change-date-of-lock-profile', [ChangeLockProfileDateOfBirth::class, 'index']);
Route::get('superadmin/login', Login::class);
Route::get('logout', 'App\Http\Controllers\CommonController@logout');
Route::get('test', 'App\Http\Controllers\CommonController@test');
Route::get('forgot/password', ForgotPassword::class);
Route::get('reset/password', ResetPassword::class);
Route::middleware(['loggedin',])->group(function () {
    Route::get('superadmin/dashboard', Dahboard::class)->middleware('isadmin');
    Route::get('superadmin/profile/modify', Profile::class)->middleware('isadmin');
    Route::get('superadmin/profile', TableViewProfile::class)->middleware('isadmin');
    Route::get('superadmin/config', Config::class)->middleware('isadmin');
    Route::get('superadmin/website', Site::class)->middleware('isadmin');
    Route::get('superadmin/edit-profile', EditProfile::class)->middleware('isadmin');
    Route::get('superadmin/signup-request', SignupRequest::class)->middleware('isadmin');
    Route::get('superadmin/match', AdminMatch::class)->middleware('isadmin');
    Route::get('superadmin/match-request-view/{reqID}', MatchRequestView::class)->middleware('isadmin');
    Route::get('superadmin/subscribe', Subscribe::class)->middleware('isadmin');
    Route::get('signup-view', SignupView::class)->middleware('isadmin');
    Route::get('superadmin/payment-collection', PaymentCollection::class)->middleware('isadmin');
    Route::get('superadmin/profile-update', UpdateProfile::class)->middleware('isadmin');
    Route::get('superadmin/payment-collection/{payId}', PaymentConfirm::class)->middleware('isadmin');
    Route::get('superadmin/payment-collection/delete/{payId}', [CollectedPyamentDelete::class, 'destroy']);
    Route::get('superadmin-profile-update-view/{userID}', ProfileUpdateView::class)->middleware('isadmin');
    Route::get('superadmin/profile/delete/{DelId}', 'App\Http\Controllers\CommonController@deleteProfile')->middleware('isadmin');
    Route::get('superadmin/delete-account/{DelId}', 'App\Http\Controllers\CommonController@del')->middleware('isadmin');
    Route::get('superadmin/match-read-status/{id}', 'App\Http\Controllers\CommonController@matchReadStatus')->middleware('isadmin');
    Route::get('superadmin/read-status-signup/{id}', 'App\Http\Controllers\CommonController@signupReadStatus')->middleware('isadmin');
});
Route::get('/', Index::class)->name('login');
/**Terms and condition & privacy policy routes */
Route::view('termsandcondition', 'termsandcondition')->name('terms.condition');
Route::view('privacypolicy', 'privacypolicy')->name('privacy.policy');
Route::get('the-matchmaking-process', MatchMakingProcess::class);
Route::get('visit-all-profiles', VisitAllProfiles::class);
Route::get('faqs', Faqs::class);
Route::get('want-to-signup', WantToSignUp::class);
Route::get('login', UserLogin::class);
Route::get('forgot-password', UserResetPassword::class);
Route::get('user-reset-password', VerifyForgotPassword::class);
Route::middleware(['changedob', 'loggedin'])->group(function () {
    Route::get('dashboard', Dashboard::class)->middleware('isuser');
    Route::get('all-profile', AllProfile::class)->middleware('isuser');
    Route::get('add-ons', AddOn::class)->middleware('isuser');
    Route::get('buy-now', BuyRequest::class)->middleware('isuser');
    Route::get('profile-edit', ProfileEdit::class)->middleware('isuser');
    Route::get('change-password', ChangePassword::class)->middleware('isuser');
    Route::get('profile-view/{userID}', ProfileView::class)->middleware('isuser');
    
    Route::get('notification', Notification::class)->middleware('isuser');
    Route::get('setting', Setting::class)->middleware('isuser');
    Route::get('my-profile', MyProfile::class)->middleware('isuser');
    Route::get('delete-account', 'App\Http\Controllers\CommonController@deleteSelf')->middleware('isuser');
    Route::get('deactive-myaccount', 'App\Http\Controllers\CommonController@deactiveMyAccount')->middleware('isuser');
  
    
    // stripe 
    
   
    // paypal
    // Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'App\Http\Controllers\PaypalController@payWithPaypal',));
    Route::get('pay-now-with-paypal', array('as' => 'paypal','uses' => '\App\Http\Controllers\PaypalController@postPaymentWithpaypal',));
    Route::get('paypal', array('as' => 'status','uses' => '\App\Http\Controllers\PaypalController@getPaymentStatus',));

});
Route::get('lock-profile', LockProfile::class)->middleware('auth');
Route::get('change-dob', Changedob::class)->middleware('auth');
Route::get('pay-now-with-stripe', 'App\Http\Controllers\StripePaymentController@stripe')->middleware('auth');
Route::post('stripe', 'App\Http\Controllers\StripePaymentController@stripePost')->name('stripe.post')->middleware('auth');
Route::get('/abc', function(){
    // dd(Request::ip()); // the above method
    // $data;
    return view('emails.want-to-signup', [
        'data[data]' => ModelsWantToSignup::find(1)
    ]);
});
Route::get('/instagram-auth-response', function(){
    // dd('asd');
    $was_successful = request('result') === 'success';
    // dd($was_successful);
    if($was_successful){
        $profile = \Dymantic\InstagramFeed\Profile::where('username', 'mysalafispouse')->first();
       dd($profile->feed($limit = 2));
    return;
    }
    // return $profile;
});
Route::get('/asdkjasdhaskdjhasashghikuipufghdahasdkjshadklashdsklajdhkljhkjh', function(){
    App\Models\Balance::truncate();
    App\Models\User::truncate();
    App\Models\RequestLog::truncate();
});
