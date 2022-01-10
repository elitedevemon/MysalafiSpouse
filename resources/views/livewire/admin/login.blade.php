<div class="content-body">
    <!-- login page start -->
    <section id="auth-login" class="row flexbox-container">
        <div class="col-xl-8 col-11">
            <div class="card bg-authentication mb-0">
                <div class="row m-0">
                    <!-- left section-login -->
                    <div class="col-md-6 col-12 px-0">
                        <div
                            class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                            <div class="card-header pb-1">
                                <div class="card-title">
                                    <h4 class="text-center mb-2">MySalafiSpouse</h4> <span>Admin Portal</span>
                                </div>
                            </div>
                            <div class="form-group">
                                @error('credentials')
                                <div class="alert alert-danger">
                                    <span class="text-white">{{ $message }}</span>
                                </div>
                                @enderror
                                @if(session('resetmessage'))
                                    <div class="alert alert-success">
                                        <span class="text-white">{{session('resetmessage')}}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">

                                <div class="divider">
                                    <div class="divider-text text-uppercase text-muted"><small>or login with
                                            email</small>
                                    </div>
                                </div>
                                {{-- <form action="index.html"> --}}
                                    <div class="form-group mb-50">
                                        <label class="text-bold-600" for="exampleInputEmail1">Email
                                            address</label>
                                        <input type="email" wire:model="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="Email address">
                                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    <div class="form-group">
                                        <label class="text-bold-600"
                                            for="exampleInputPassword1">Password</label>
                                        <input wire:model="password" type="password" class="form-control"
                                            id="exampleInputPassword1" placeholder="Password">
                                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div
                                        class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                                        <div class="text-left">
                                            <div class="checkbox checkbox-sm">
                                                <input type="checkbox" class="form-check-input"
                                                    id="exampleCheck1">
                                                <label class="checkboxsmall" for="exampleCheck1"><small>Keep
                                                        me logged
                                                        in</small></label>
                                            </div>
                                        </div>
                                        <div class="text-right"><a href="{{ url('/forgot/password') }}"
                                                class="card-link"><small>Forgot Password?</small></a></div>
                                    </div>
                                    <button wire:loading.attr='disabled' wire:target='login' type="button" wire:click.prevent="login"  class="
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
                                <hr>
                            </div>
                        </div>
                    </div>
                    <!-- right section image -->
                    <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                        <img class="img-fluid" src="{{ url('/') }}/site/images/3e.png"
                            alt="branding logo">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login page ends -->

</div>