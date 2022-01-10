<div class="content-body">
    <!-- forgot password start -->
    <section class="row flexbox-container">
        <div class="col-xl-7 col-md-9 col-10  px-0">
            <div class="card bg-authentication mb-0">
                <div class="row m-0">
                    <!-- left section-forgot password -->

                    <div class="col-md-6 col-12 px-0">

                        <div class="card disable-rounded-right mb-0 p-2">
                            <div class="">
                                @if(session('error'))
                                <div class="col-md-12 mt-3" style="margin-top: 1rem!important;">
                                    <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <div class="d-flex align-items-center">
                                            <i class="bx bx-cross"></i>
                                            <span>
                                                {{session('error')}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if(session('message'))
                                <div class="col-md-12 mt-3" style="margin-top: 1rem!important;">
                                    <div class="alert alert-success alert-dismissible mb-2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <div class="d-flex align-items-center">
                                            <i class="bx bx-cross"></i>
                                            <span>
                                                {{session('message')}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="card-title">
                                    <h4 class="text-center mb-2">Forgot Password?</h4>
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-between align-items-center mb-2">
                                <div class="text-left">
                                    <div class="ml-3 ml-md-2 mr-1"><a href="{{ url('superadmin/login') }}"
                                            class="card-link btn btn-outline-primary text-nowrap">Sign
                                            in</a></div>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="text-muted text-center mb-2"><small>Enter the email you
                                        used
                                        when you joined
                                        and we will send otp</small></div>
                                {{-- <form class="mb-2" action="index.html"> --}}
                              
                                <div class="form-group mb-2">
                                    <label class="text-bold-600" for="exampleInputEmailPhone1">Email</label>
                                    <input wire:model="email" type="text" class="form-control"
                                        id="exampleInputEmailPhone1" placeholder="Email">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button wire:loading.attr='disabled' wire:target='forgot' type="button"
                                    wire:click.prevent="forgot" class="
                                btn btn-primary
                                glow
                                w-100
                                position-relative
                            ">
                                    Login
                                    <i id="icon-arrow" class="
                                    bx bx-right-arrow-alt
                                "></i>
                                </button>
                               
                                {{-- </form> --}}
                                <div class="text-center mb-2"><a href="auth-login.html"><small class="text-muted">I
                                            remembered my
                                            password</small></a></div>
                                <div class="divider mb-2">
                                    <div class="divider-text">Or Sign in as</div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- right section image -->
                    <div class="col-md-6 d-md-block d-none text-center align-self-center">
                        <img class="img-fluid" src="../../../app-assets/images/pages/forgot-password.png"
                            alt="branding logo" width="300">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- forgot password ends -->

</div>
