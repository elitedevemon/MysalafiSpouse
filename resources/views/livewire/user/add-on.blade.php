<div class="defaultsitecolor" style="padding-bottom: 60px;width:100%;height:715px;">
    <h1 style="text-align: center;">Add Ons</h1>
    <h2 style="text-align: center;"><u style="color:white;">Purchase:</u></h2>
    @if($user->type != 'International')
    <div>
        <div class="customalink">
            <a style="color: red;" wire:click="extraMatchRequest('extraMatchRequestbuy')">x1 Additional Match
                Request</a>
        </div>
    </div>
    @endif
    <div style="padding-top: 38px;">
        <div class="customalink">
            <a wire:click="extraMatchRequest('internationalmatchRequest')" id="myBtn"
                style="color: red;cursor:pointer">@if(Auth::user()->type == 'UK Base')x1 International Match Request
                @else x1 Additional Match Request @endif</a>
        </div>
    </div>
    <div style="padding-top: 38px;" class="cusrespon">
        <div class="customalink">
            <a style="color: red;" wire:click="extraMatchRequest('profileEditbuy')">x1 Profile Edit</a>

        </div>
    </div>
    <div class="modal" style="{{ $interextraMatchRequest  ? 'display:block' : 'display:none;' }}">
        @if($interextraMatchRequest == 1)
        <div class="modal-content" style="color:black;padding-bottom:80px;">
            <div>
                <div style="text-align: right;">
                    <span class="close" wire:click="extraMatchRequest('closeinternationalmatchRequest')"> &times;</span>
                    {{-- <span on></span>  --}}
                </div>
                <div style="text-align: center;color:red;">
                    <b style="text-align: center;">@if(Auth::user()->type == 'UK Base')x1 International Match Request
                        @else
                        x1 Additional Match Request @endif</b>
                </div>
                @if(session('message'))
                <div class="col-md-8">
                    <h4 style="color:green;">{{ session('message') }}</h4>
                </div>
                @endif
            @if(!session('message'))
                <p style="text-align: center;">
                    <br>
                         @if(Auth::user()->type ==
                        'International')
                        
                        We highly recommend all our applicants to match request multiple profiles at once, in order to increase their potential in finding a successful match by achieving a faster response!
<br>
                        <br>
If you would like to request/accept multiple match requests at one time then there is an additional fee for that of just ${{ $config->match_request_fee }} USD/£{{ $config->match_request_fee_euro }} per additional match/match request, as your current package enables you to match with x1 profile match request at a time.
<br>
                        <br>
Your current package allows you to match with just 1 profile at a time.
<br>
                        <br>
Would you like to proceed with the additional match request fee payment?
If yes, please kindly select your payment method below & confirm your payment:
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        @else Your current package covers unlimited  @if(Auth::user()->type == 'UK Base') UK @endif match requests.
                        
                        We charge a small fee of just £{{ $config->match_request_fee_euro }}  for our UK applicants to request an international profile. <br><br>
                        
                        Would you like to proceed with your match request + fee payment?
                        <br>
                        <br>
                        If yes, please kindly select your payment method below & confirm your payment:
                        @endif
                </p>
            </div>
            <div class="row">

                <div class="col-md-1">
                    <br>
                    <div style="border: 1px solid;text-align:center;cursor: pointer;" wire:click="plusincreament">
                        <i class="fa fa-plus"></i>
                    </div>
                </div>
                <div class="col-md-4">
                    <br>
                    <input disabled wire:model="qty" style="height: 30px;border-radius: 0px;text-align:center;"
                        type="number">
                </div>
                <div class="col-md-1">
                    <br>
                    <div style="border: 1px solid;text-align:center;cursor: pointer;" wire:click="minusincreament">
                        <i class="fa fa-minus"></i>
                    </div>
                </div>
                <div class="col-md-5">
                    <br>
                    {{ $qty }} X @if($user->type =='International') $ @else £ @endif{{ $total }} = @if($user->type
                    =='International') $ @else £ @endif{{$grandTotal}} Total
                </div>

                <div class="col-md-8">
                    <br>
                    <div style="width: 100%;">
                        <select wire:model="payment_mode"
                            style="width: 100%;height: 30px;border-radius: 0px;padding-left: 11px;border-color:#224794;">
                            <option value="" hidden>Select</option>
                            @if($user->type == 'International')
                            {{-- <option value="stripe">Stripe</option> --}}
                            <option value="paypal">Paypal</option>
                            @endif
                            <option value="other">Bank Transfer</option>
                        </select>
                    </div>
                </div>
                
                @if(!session('message'))
                @if($payment_mode == 'other')
                <div class="col-md-8">
                    <br>
                    @if(Auth::user()->type == "UK Base")
                    <p><b>UK Bank Transfer ( £10 GBP)</b></p>
                    @else
                    <p><b>
                            <p><b>Western Union Transfer ( £10 GBP)</b></p>
                        </b></p>
                    @endif
                    @if($user->type != 'UK Base')

                    {{-- <br> --}}
                    <!-- <p><b>Bank/ Western Union or others</b> {{ $config->bank_western }}</p>
                    <p><b>Branch/Bank Name</b> {{ $config->bracnh_name }}</p>
                    <p><b>IBAN/SWIFT or others</b> {{ $config->iban }}</p>
                    <p>MTCN Number</p> -->
                    <p><b>Account name:</b> MR HAIDER RAZAQ</p>
                    <p><b>Account Number:</b> 87757629</p>
                    <p><b>Sort Code:</b> 09-01-28</p>
                    <p><b>Bank:</b> SANTANDER (UK)</p>
                    <input type="text" wire:model="mtn_no"
                        style="width: 100%;height: 30px;border-radius: 0px;padding-left: 11px;border-color:#224794;"
                        placeholder="MTCN Number">
                    @error('mtn_no')
                    <span style="color: red">MTCN Number is required</span>
                    @enderror

                    @else
                    <p><b>Account name:</b> H Razaq</p>
                    <p><b>Sort code:</b> 04-00-04</p>
                    <p><b>Account number:</b> 03970943</p>
                    <p><b>Bank:</b> Monzo (UK)</p>
                    @endif


                    <br>
                    <br>
                    <p>Attach Payment Screenshot (Optional)</p>
                    <input type="file" wire:model="evidence"
                        style="width: 100%;height: 30px;border-radius: 0px;padding-left: 0px;border-color:#224794;"
                        placeholder="Evidence">
                    @error('evidence')
                    <span style="color: red">{{ $message }}</span>
                    @enderror

                    {{-- <br>
                    <p>Date</p>
                    <input type="date" style="width: 100%;height: 30px;border-radius: 0px;padding-left: 11px;border-color:#224794;" placeholder="MTCN Number"> --}}
                </div>
                @endif
                @if($payment_mode == 'paypal')
                            <div class="col-md-8">
                                <br>
                                <div style="text-align: center;">
                                    <p><b style="text-align:center;">x1 Additional Match Request Fee
                                        @if(Auth::user()->type == 'UK Base')
                                        £{{$config->match_request_fee_euro}} @else ${{$config->match_request_fee}} @endif 
                                        <br>
                                        Pay through our PayPal link below:
                                    </b></p>
                                </div>
                                @if($user->type != 'UK Base')
                                <div style="text-align: center;">
                            
                                    <u><a target="blank" style="color:blue;text-align:center;" href="https://www.paypal.me/HR5454">Click here to pay!
                                    </a></u>
                                </div>
                                <br>
                                <br>
                                <p>Attach Payment Screenshot (Optional)</p>
                                <input type="file" wire:model="evidence"
                                    style="width: 100%;height: 30px;border-radius: 0px;padding-left: 0px;border-color:#224794;"
                                    placeholder="Evidence">
                                @error('evidence')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                                @endif
                                <br>
                                <br>
                            </div>
                            @endif
                @endif
            </div>
            <br>
            <div class="col-md-1"></div>
            <div class="col-md-4 custom_buy" style="padding:0px;padding-top:20px;">
                @if($payment_mode != 'other')
                <!-- <button wire:click="buynow" class="buy_custom"
                    style="padding-left:10px;padding-right:10px;color:red;border:none;">Buy Now</button> -->
                @endif
                @if(!session('message'))
                @if($payment_mode == 'other' || $payment_mode == 'paypal')
                <button wire:click="manuaReq('International match request')" class="buy_custom"
                    style="padding-left:10px;padding-right:10px;color:green;border:none;">I confirm my payment</button>
                @endif
                @endif
            </div>
            <div class="col-md-6 custom_cancel" style="color: red;border:none;">

                <button style="color: red;border:none;"
                    wire:click="extraMatchRequest('closeinternationalmatchRequest')">No, I have changed my mind.</button>
            </div>
            @endif
        </div>
        @elseif($interextraMatchRequest == 2)
        <div class="modal-content" style="color:black;padding-bottom:80px;">
            <div>
                <div style="text-align: right;">
                    <span class="close" wire:click="extraMatchRequest('closeinternationalmatchRequest')"> &times;</span>
                    {{-- <span on></span>  --}}
                </div>
                <div style="text-align: center;color:red;">
                    <b style="text-align: center;">X1 Additional Match Request</b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <br>
                    {{-- <p>
                        Your current package covers UK match requests.
    
                        We charge a small fee of just @if(Auth::user()->type ==
                        'International')${{ $config->match_request_fee }} @else £{{ $config->match_request_fee_euro }}
                    @endif for our UK applicants to request an international profile.

                    Would you like to proceed with your match request + fee payment?
                    <br>
                    <br>
                    If yes, please kindly select your payment method below & confirm your payment:
                    </p> --}}
                    <p style="text-align: center;">
                        We highly recommend all our applicants to match request multiple profiles at once, in order to
                        increase their potential in finding a successful match by achieving a faster response!

                        If you would like to request/accept multiple match requests at one time then there is an
                        additional fee for that of just @if(Auth::user()->type ==
                        'International')USD{{ $config->match_request_fee }} @else
                        £{{ $config->match_request_fee_euro }} GBP
                        @endif per additional match/match request, as your
                        current package enables you to match with x1 profile match request at a time.

                        Your current package allows you to match with just 1 profile at a time.
                        <br><br>
                        Would you like to proceed with the additional match request fee payment? <br><br>
                        If yes, please kindly select your payment method below & confirm your payment:
                    </p>
                </div>
                <div class="col-md-1">
                    <br>
                    <div style="border: 1px solid;text-align:center;cursor: pointer;" wire:click="plusincreament">
                        <i class="fa fa-plus"></i>
                    </div>
                </div>
                <div class="col-md-4">
                    <br>
                    <input disabled wire:model="qty" style="height: 30px;border-radius: 0px;text-align:center;"
                        type="number">
                </div>
                <div class="col-md-1">
                    <br>
                    <div style="border: 1px solid;text-align:center;cursor: pointer;" wire:click="minusincreament">
                        <i class="fa fa-minus"></i>
                    </div>
                </div>
                <div class="col-md-5">

                    <br>
                    {{ $qty }} X @if($user->type =='International') $ @else £ @endif{{ $total }} = @if($user->type
                    =='International') $ @else £ @endif{{$grandTotal}} Total
                </div>

                <div class="col-md-8">
                    <br>

                    <div style="width: 100%;">
                        <select wire:model="payment_mode"
                            style="width: 100%;height: 30px;border-radius: 0px;padding-left: 11px;border-color:#224794;">
                            <option value="" hidden>Select</option>
                            @if($user->type == 'International')
                            {{-- <option value="stripe">Stripe</option> --}}
                            <option value="paypal">Paypal</option>
                            @endif
                            <option value="other">Bank Transfer</option>
                        </select>
                    </div>
                </div>
                @if(session('message'))
                <div class="col-md-8">
                    <h6 style="color:green;">{{ session('message') }}</h6>
                </div>
                @endif
                @if(!session('message'))
                @if($payment_mode == 'other')
                <div class="col-md-8">
                    <br>
                    @if(Auth::user()->type == "UK Base")
                    <p><b>UK Bank Transfer ( £10 GBP)</b></p>
                    @else
                    <p><b>
                            <p><b>Western Union Transfer ( £10 GBP)</b></p>
                        </b></p>
                    @endif
                    @if($user->type != 'UK Base')

                    {{-- <br> --}}
                    <!-- <p><b>Bank/ Western Union or others</b> {{ $config->bank_western }}</p>
                    <p><b>Branch/Bank Name</b> {{ $config->bracnh_name }}</p>
                    <p><b>IBAN/SWIFT or others</b> {{ $config->iban }}</p> -->
                    <p><b>Account name:</b> MR HAIDER RAZAQ</p>
                    <p><b>Account Number:</b> 87757629</p>
                    <p><b>Sort Code:</b> 09-01-28</p>
                    <p><b>Bank:</b> SANTANDER (UK)</p>
                    <p>MTCN Number</p>
                    <input type="text" wire:model="mtn_no"
                        style="width: 100%;height: 30px;border-radius: 0px;padding-left: 11px;border-color:#224794;"
                        placeholder="MTCN Number">
                    @error('mtn_no')
                    <span style="color: red">MTCN Number is required</span>
                    @enderror
                    @else
                    <p><b>Account name:</b> H Razaq</p>
                    <p><b>Sort code:</b> 04-00-04</p>
                    <p><b>Account number:</b> 03970943</p>
                    <p><b>Bank:</b> Monzo (UK)</p>

                    @endif

                    <br>
                    <br>
                    <p>Attach Payment Screenshot (Optional)</p>
                    <input type="file" wire:model="evidence"
                        style="width: 100%;height: 30px;border-radius: 0px;padding-left: 0px;border-color:#224794;"
                        placeholder="Evidence">
                    @error('evidence')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                    {{-- <br>
                    <p>Date</p>
                    <input type="date" style="width: 100%;height: 30px;border-radius: 0px;padding-left: 11px;border-color:#224794;" placeholder="MTCN Number"> --}}
                </div>
                @endif
                @endif
            </div>
            <br>
            <div class="col-md-1"></div>
            <div class="col-md-4 custom_buy" style="padding:0px;padding-top:20px;">
                {{-- <a wire:click="buynow"
                    class="buy_custom" style="padding-left:10px;padding-right:10px;color:red;border:none;">Buy Now</a> --}}
                @if($payment_mode != 'other')
                <!-- <button wire:click="buynow" class="buy_custom"
                    style="padding-left:10px;padding-right:10px;color:red;border:none;">Buy Now</button> -->
                @endif
                @if(!session('message'))
                @if($payment_mode == 'other')
                <button wire:click="manuaReq('Match request')" class="buy_custom"
                    style="padding-left:10px;padding-right:10px;color:green;border:none;">I confirm my payment.</button>
                @endif
                @endif
            </div>
            <div class="col-md-6 custom_cancel" style="padding:0px;padding-top:20px;">

                <button style="color: red;border:none;"
                    wire:click="extraMatchRequest('closeinternationalmatchRequest')">No, I have changed my mind.</button>
            </div>
        </div>
        @elseif($interextraMatchRequest == 3)
        <div class="modal-content" style="color:black;padding-bottom:80px;">
          
            <div>
                <div style="text-align: right;">
                    <span class="close" wire:click="extraMatchRequest('closeinternationalmatchRequest')"> &times;</span>
                    {{-- <span on></span>  --}}
                </div>
                <div style="text-align: center;color:red;">
                    <b style="text-align: center;">Profile Edit</b>
                </div>
                @if(session('message'))
                <div class="col-md-12">
                    <h4 style="color:green;">{{ session('message') }}</h4>
                </div>
                @endif
                

            </div>
            @if(!session('message'))
                <p style="text-align: center;">
                    
                    @if($user->type == 'International')
                             Your current profile will be edited and reposted to our Instagram page, Facebook page & website. There's a small fee of just $17 USD/£10 to make the profile edit. You can continue to use your unlimited International Match Requests as usual after you have edited your profile.
                                <br> <br>
                                Would you like to proceed with the profile edit fee payment?<br> <br>
                                If yes, please kindly select your payment method below & confirm your payment:
                                @else
                                 Your current profile will be edited and reposted to our Instagram page, Facebook page & website.
                                    There's a small fee of just £10 to make the profile edit. You can continue to use your unlimited
                                    UK match requests as usual after you have edited your profile. <br> <br>
                                    Would you like to proceed with the profile edit fee payment? <br> <br>
                                    If yes, please kindly select your payment method below & confirm your payment:
                            @endif
                    
                </p>
            <div class="row">

                <div class="col-md-1">
                    <br>
                    <div style="border: 1px solid;text-align:center;cursor: pointer;" wire:click="plusincreament">
                        <i class="fa fa-plus"></i>
                    </div>
                </div>
                <div class="col-md-4">
                    <br>
                    <input disabled wire:model="qty" style="height: 30px;border-radius: 0px;text-align:center;"
                        type="number">
                </div>
                <div class="col-md-1">
                    <br>
                    <div style="border: 1px solid;text-align:center;cursor: pointer;" wire:click="minusincreament">
                        <i class="fa fa-minus"></i>
                    </div>
                </div>
                <div class="col-md-5">
                    <br>
                    {{ $qty }} X @if($user->type =='International') $ @else £ @endif{{ $profile_price }} =
                    @if($user->type =='International') $ @else £ @endif{{$grandTotal}} Total
                </div>
                <div class="col-md-8">
                    <br>
                    <div style="width: 100%;">
                        <select wire:model="payment_mode"
                            style="width: 100%;height: 30px;border-radius: 0px;padding-left: 11px;border-color:#224794;">
                            <option value="" hidden>Select</option>
                            @if($user->type == 'International')
                            {{-- <option value="stripe">Stripe</option> --}}
                            <option value="paypal">Paypal</option>
                            @endif
                            <option value="other">Bank Transfer</option>
                        </select>
                    </div>
                </div>
                
                @if(!session('message'))
                @if($payment_mode == 'other')
                <div class="col-md-8">
                    <br>
                    @if(Auth::user()->type == "UK Base")
                    <p><b>UK Bank Transfer ( £10 GBP)</b></p>
                    @else
                    <p><b>
                            <p><b>Western Union Transfer ( £10 GBP)</b></p>
                        </b></p>
                    @endif
                    @if($user->type != 'UK Base')

                    {{-- <br> --}}
                    <p><b>Account name:</b> MR HAIDER RAZAQ</p>
                    <p><b>Account Number:</b> 87757629</p>
                    <p><b>Sort Code:</b> 09-01-28</p>
                    <p><b>Bank:</b> SANTANDER (UK)</p>
                  
                    <p>MTCN Number</p>
                    <input type="text" wire:model="mtn_no"
                        style="width: 100%;height: 30px;border-radius: 0px;padding-left: 11px;border-color:#224794;"
                        placeholder="MTCN Number">
                    @error('mtn_no')
                    <span style="color: red">MTCN Number is required</span>
                    @enderror
                    @else
                    <p><b>Account name:</b> H Razaq</p>
                    <p><b>Sort code:</b> 04-00-04</p>
                    <p><b>Account number:</b> 03970943</p>
                    <p><b>Bank:</b> Monzo (UK)</p>
                    @endif
                    <br>
                    <br>
                    <p>Attach Payment Screenshot (Optional)</p>
                    <input type="file" wire:model="evidence"
                        style="width: 100%;height: 30px;border-radius: 0px;padding-left: 0px;border-color:#224794;"
                        placeholder="Evidence">
                    @error('evidence')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                    {{-- <br>
                    <p>Date</p>
                    <input type="date" style="width: 100%;height: 30px;border-radius: 0px;padding-left: 11px;border-color:#224794;" placeholder="MTCN Number"> --}}
                </div>
                @endif
                @if($payment_mode == 'paypal')
                <div class="col-md-8">
                    <br>
                    <div style="text-align: center;">
                        <p><b style="text-align:center;">Profile Edit Fee
                            @if(Auth::user()->type == 'UK Base')
                            £{{$config->edit_profile_fee_euro}} @else ${{$config->edit_profile_fee}} @endif 
                            <br>Pay through our PayPal link below:
                        </b></p>
                    </div>
                    @if($user->type != 'UK Base')
                    <div style="text-align: center;">
                            
                        <u><a target="blank" style="color:blue;text-align:center;" href="https://www.paypal.me/HR5454">Click here to pay!
                        </a></u>
                    </div>
                    <br>
                    <br>
                    <p>Attach Payment Screenshot (Optional)</p>
                    <input type="file" wire:model="evidence"
                        style="width: 100%;height: 30px;border-radius: 0px;padding-left: 0px;border-color:#224794;"
                        placeholder="Evidence">
                    @error('evidence')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                    @endif
                    <br>
                    <br>
                </div>
                @endif
                @endif
            </div>
            @endif
            <br>
           
            {{-- <div class="col-md-12 custom_buy" style="padding:0px;padding-top:20px;"> --}}
                {{-- <button wire:click="buynow"
                    class="buy_custom" style="padding-left:10px;padding-right:10px;color:red;border:none;">Buy Now</button> --}}
                @if($payment_mode != 'other')
                <!-- <button wire:click="buynow" class="buy_custom"
                    style="padding-left:10px;padding-right:10px;color:red;border:none;">Buy Now</button> -->
                @endif
                @if(!session('message'))
                @if($payment_mode == 'other' || $payment_mode == 'paypal')
                <button wire:click="manuaReq('Profile edit')" class="buy_custom"
                    style="color:green;">I confirm my payment.</button>
                @endif
                @endif
             
                  
            {{-- </div> --}}
            {{-- <div class="col-md-12 custom_buy" style="padding:0px;padding-top:20px;"> --}}
            <button style="color: red;border:none;"
            wire:click="extraMatchRequest('closeinternationalmatchRequest')">No, I have changes my mind.</button>
        {{-- </div> --}}
            
            {{-- </div> --}}
        </div>
        @endif
    </div>
</div>
