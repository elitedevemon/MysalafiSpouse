<section id="page-account-settings">
    <div class="row">
        <div class="col-12">
            <div class="row" wire:ignore.self>
                <!-- left menu section -->
                <div class="col-md-3 mb-2 mb-md-0 pills-stacked">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item" wire:ignore>
                            <a class="nav-link d-flex align-items-center active"
                                id="account-pill-general" data-toggle="pill" href="#account-vertical-general"
                                aria-expanded="true">
                                <i class="bx bx-envelope"></i>
                                <span>Email Config</span>
                            </a>
                        </li>
                        <li class="nav-item" wire:ignore>
                            <a class="nav-link d-flex align-items-center"
                                id="account-pill-password" data-toggle="pill" href="#account-vertical-password"
                                aria-expanded="false">
                                <i class="bx bx-key"></i>
                                <span>Secret Key</span>
                            </a>
                        </li>
                        <li class="nav-item" wire:ignore>
                            <a class="nav-link d-flex align-items-center"
                                id="account-pill-info" data-toggle="pill" href="#account-vertical-info"
                                aria-expanded="false">
                                <i class="bx bx-box"></i>
                                <span>Package</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                                <i class="bx bxl-twitch"></i>
                                <span>Social links</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" id="account-pill-connections" data-toggle="pill" href="#account-vertical-connections" aria-expanded="false">
                                <i class="bx bx-link"></i>
                                <span>Connections</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" id="account-pill-notifications" data-toggle="pill" href="#account-vertical-notifications" aria-expanded="false">
                                <i class="bx bx-bell"></i>
                                <span>Notifications</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
                <!-- right content section -->
                <div class="col-md-9">

                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                @if (session()->has('message'))
                                <div class="alert alert-success alert-dismissible mb-2" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-like"></i>
                                        <span>
                                            {{ session('message') }}
                                        </span>
                                    </div>
                                </div>
                                @endif
                                <div role="tabpanel" class="tab-pane active"
                                    id="account-vertical-general" wire:ignore.self
                                    aria-labelledby="account-pill-general" aria-expanded="true">

                                    <div class="row">
                                        <h6 class="m-1">Notification</h6>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input wire:change="emailConfig" wire:model="email_match_request" type="checkbox" class="custom-control-input" checked=""
                                                    id="accountSwitch1">
                                                <label class="custom-control-label mr-1" for="accountSwitch1"></label>
                                                <span class="switch-label w-100">Match request</span>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input wire:change="emailConfig" wire:model="email_decision_request" type="checkbox" class="custom-control-input" checked=""
                                                    id="accountSwitch2">
                                                <label class="custom-control-label mr-1" for="accountSwitch2"></label>
                                                <span class="switch-label w-100">Match Decision</span>
                                            </div>
                                        </div>
                                      
                                    </div>
                                </div>
                                <div class="tab-pane fade"
                                    id="account-vertical-password" role="tabpanel" wire:ignore.self
                                    aria-labelledby="account-pill-password" aria-expanded="false">
                                    <div class="row">
                                        <h6 class="m-1">Stripe</h6>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="stripe_client_id">Stripe Client ID</label>
                                                <input type="text" id="stripe_client_id" class="form-control"
                                                    wire:model.defer="stripe_client_id">
                                                @error('stripe_client_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="stripe_secret_key">Stripe Secret Key</label>
                                                <input type="text" id="stripe_secret_key" class="form-control"
                                                    wire:model.defer="stripe_secret_key">
                                                @error('stripe_secret_key')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <h6 class="m-1">Paypal</h6>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="paypal_client_id">Paypal Client ID</label>
                                                <input type="text" id="paypal_client_id" class="form-control"
                                                    wire:model.defer="paypal_client_id">
                                                @error('paypal_client_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="paypal_secret_key">Paypal Secret Key</label>
                                                <input type="text" id="paypal_secret_key" class="form-control"
                                                    wire:model.defer="paypal_secret_key">
                                                @error('paypal_secret_key')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <h6 class="m-1">Other Payment method</h6>
                                     
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="bank_western">Bank/ Western Union or others</label>
                                                <input type="text" id="bank_western" class="form-control"
                                                    wire:model.defer="bank_western">
                                                @error('bank_western')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="bracnh_name">Branch/Bank Name</label>
                                                <input type="text" id="bracnh_name" class="form-control"
                                                    wire:model.defer="bracnh_name">
                                                @error('bracnh_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="iban">IBAN/SWIFT or others</label>
                                                <input type="text" id="iban" class="form-control"
                                                    wire:model.defer="iban">
                                                @error('iban')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <h6 class="m-1">Instagram</h6>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="instagram_client_id">Insgram Client ID</label>
                                                <input type="text" id="instagram_client_id" class="form-control"
                                                    wire:model.defer="instagram_client_id">
                                                @error('instagram_client_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="instagram_secret_key">Insgram Secret Key</label>
                                                <input type="text" id="instagram_secret_key" class="form-control"
                                                    wire:model.defer="instagram_secret_key">
                                                @error('instagram_secret_key')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="button" wire:loading.attr='disabled' wire:target='payment'
                                                wire:click.prevent='payment' class="mr-1 btn btn-primary">
                                                Save & Change
                                                <div wire:loading wire:target="payment">
                                                    <i id="icon-arrow" class=" bx bx-loader-circle bx-spin"></i>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-vertical-info"
                                    role="tabpanel" wire:ignore.self aria-labelledby="account-pill-info"
                                    aria-expanded="false">
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <label class="d-block">Match Request Fee</label>
                                            <fieldset>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            $ 
                                                        </span>
                                                    </div>
                                                    <input  wire:model.defer="match_request_fee" type="text"
                                                        class="form-control" aria-describedby="basic-addon1">

                                                </div>
                                            </fieldset>
                                            @error('match_request_fee')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <fieldset>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            € 
                                                        </span>
                                                    </div>
                                                    <input  wire:model.defer="match_request_fee_euro" type="text"
                                                        class="form-control" aria-describedby="basic-addon1">

                                                </div>
                                            </fieldset>
                                            @error('match_request_fee_euro')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="match_request_fee">Match Request Fee</label>
                                                <input type="text" id="match_request_fee" class="form-control"
                                                    wire:model.defer="match_request_fee">
                                                @error('match_request_fee')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> --}}
                                       

                                        {{-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="match_cacnel_fee">Match Cancel Fee</label>
                                                <input type="text" id="match_cacnel_fee" class="form-control"
                                                    wire:model.defer="match_cacnel_fee">
                                                @error('match_cacnel_fee')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-12 mb-1">
                                            <label class="d-block">Match Cancel Fee</label>
                                            <fieldset>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            $ 
                                                        </span>
                                                    </div>
                                                    <input  wire:model.defer="match_cacnel_fee" type="text"
                                                        class="form-control" aria-describedby="basic-addon1">

                                                </div>
                                            </fieldset>
                                            @error('match_cacnel_fee')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <fieldset>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            € 
                                                        </span>
                                                    </div>
                                                    <input  wire:model.defer="match_cacnel_fee_euro" type="text"
                                                        class="form-control" aria-describedby="basic-addon1">

                                                </div>
                                            </fieldset>
                                            @error('match_cacnel_fee_euro')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 mb-1">
                                            <label class="d-block">Match Edit Profile</label>
                                            <fieldset>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            $ 
                                                        </span>
                                                    </div>
                                                    <input  wire:model.defer="edit_profile_fee" type="text"
                                                        class="form-control" aria-describedby="basic-addon1">

                                                </div>
                                            </fieldset>
                                            @error('edit_profile_fee')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <fieldset>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            € 
                                                        </span>
                                                    </div>
                                                    <input  wire:model.defer="edit_profile_fee_euro" type="text"
                                                        class="form-control" aria-describedby="basic-addon1">

                                                </div>
                                            </fieldset>
                                            @error('edit_profile_fee_euro')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="edit_profile_fee">Match Edit Profile Fee</label>
                                                <input type="text" id="edit_profile_fee" class="form-control"
                                                    wire:model.defer="edit_profile_fee">
                                                @error('edit_profile_fee')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="anual_fee">Anual Fee</label>
                                                <input type="text" id="anual_fee" class="form-control"
                                                    wire:model.defer="anual_fee">
                                                @error('anual_fee')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-12 mb-1">
                                            <label class="d-block">Anual Fee</label>
                                            <fieldset>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            $ 
                                                        </span>
                                                    </div>
                                                    <input  wire:model.defer="anual_fee" type="text"
                                                        class="form-control" aria-describedby="basic-addon1">

                                                </div>
                                            </fieldset>
                                            @error('anual_fee')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <fieldset>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            € 
                                                        </span>
                                                    </div>
                                                    <input  wire:model.defer="anual_fee_euro" type="text"
                                                        class="form-control" aria-describedby="basic-addon1">

                                                </div>
                                            </fieldset>
                                            @error('anual_fee_euro')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 mb-1">
                                            <label class="d-block">Deactive Fee</label>
                                            <fieldset>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            $ 
                                                        </span>
                                                    </div>
                                                    <input  wire:model.defer="deactive_fee" type="text"
                                                        class="form-control" aria-describedby="basic-addon1">

                                                </div>
                                            </fieldset>
                                            @error('anual_fee')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <fieldset>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            € 
                                                        </span>
                                                    </div>
                                                    <input  wire:model.defer="deactive_fee_pound" type="text"
                                                        class="form-control" aria-describedby="basic-addon1">

                                                </div>
                                            </fieldset>
                                            @error('anual_fee_euro')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="button" wire:loading.attr='disabled' wire:target='package'
                                                wire:click.prevent='package' class="mr-1 btn btn-primary">
                                                Save & Change
                                                <div wire:loading wire:target="package">
                                                    <i id="icon-arrow" class=" bx bx-loader-circle bx-spin"></i>
                                                </div>
                                            </button>

                                        </div>

                                    </div       
                                </div>
                                <div class="tab-pane fade" id="account-vertical-social" role="tabpanel"
                                    aria-labelledby="account-pill-social" aria-expanded="false">
                                    {{-- <form> --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="text" class="form-control" placeholder="Add link"
                                                    value="https://www.twitter.com">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="text" class="form-control" placeholder="Add link">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Google+</label>
                                                <input type="text" class="form-control" placeholder="Add link">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>LinkedIn</label>
                                                <input type="text" class="form-control" placeholder="Add link"
                                                    value="https://www.linkedin.com">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <input type="text" class="form-control" placeholder="Add link">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Quora</label>
                                                <input type="text" class="form-control" placeholder="Add link">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                changes</button>
                                            <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                        </div>
                                    </div>
                                    {{-- </form> --}}
                                </div>
                                <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel"
                                    aria-labelledby="account-pill-connections" aria-expanded="false">
                                    <div class="row">
                                        <div class="col-12 my-2">
                                            <a href="javascript: void(0);" class="btn btn-info">Connect to
                                                <strong>Twitter</strong></a>
                                        </div>
                                        <hr>
                                        <div class="col-12 my-2">
                                            <button class=" btn btn-sm btn-light-secondary float-right">edit</button>
                                            <h6>You are connected to facebook.</h6>
                                            <p>Johndoe@gmail.com</p>
                                        </div>
                                        <hr>
                                        <div class="col-12 my-2">
                                            <a href="javascript: void(0);" class="btn btn-danger">Connect to
                                                <strong>Google</strong>
                                            </a>
                                        </div>
                                        <hr>
                                        <div class="col-12 my-2">
                                            <button class=" btn btn-sm btn-light-secondary float-right">edit</button>
                                            <h6>You are connected to Instagram.</h6>
                                            <p>Johndoe@gmail.com</p>
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                changes</button>
                                            <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel"
                                    aria-labelledby="account-pill-notifications" aria-expanded="false">
                                    <div class="row">
                                        <h6 class="m-1">Activity</h6>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" checked=""
                                                    id="accountSwitch1">
                                                <label class="custom-control-label mr-1" for="accountSwitch1"></label>
                                                <span class="switch-label w-100">Email me when someone comments
                                                    onmy
                                                    article</span>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" checked=""
                                                    id="accountSwitch2">
                                                <label class="custom-control-label mr-1" for="accountSwitch2"></label>
                                                <span class="switch-label w-100">Email me when someone answers on
                                                    my
                                                    form</span>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="accountSwitch3">
                                                <label class="custom-control-label mr-1" for="accountSwitch3"></label>
                                                <span class="switch-label w-100">Email me hen someone follows
                                                    me</span>
                                            </div>
                                        </div>
                                        <h6 class="m-1">Application</h6>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" checked=""
                                                    id="accountSwitch4">
                                                <label class="custom-control-label mr-1" for="accountSwitch4"></label>
                                                <span class="switch-label w-100">News and announcements</span>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="accountSwitch5">
                                                <label class="custom-control-label mr-1" for="accountSwitch5"></label>
                                                <span class="switch-label w-100">Weekly product updates</span>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" checked=""
                                                    id="accountSwitch6">
                                                <label class="custom-control-label mr-1" for="accountSwitch6"></label>
                                                <span class="switch-label w-100">Weekly blog digest</span>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                changes</button>
                                            <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
