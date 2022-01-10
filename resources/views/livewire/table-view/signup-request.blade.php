{{-- <section id="basic-horizontal-layouts"> --}}
    <div class="row match-height">
        @if(session('resetmessage'))
        <div class="col-md-12">
            <div class="alert alert-success">
                {{session('resetmessage')}}
            </div>
        </div>
        @endif
     
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile</h4>
                 
                </div>
                @php $users = \App\Models\WantToSignup::count(); @endphp
                @if($users > 0)
                <div class="card-body">
                    <div class="form form-horizontal">
                        <div class="form-body">
                            <div class="row">
                                {{-- <div class="col-md-12 text-right">
                                    <a href="/projects/create">
                                        <button class="btn btn-primary">
                                            New Project
                                        </button>
                                    </a>
                                </div> --}}
                                {{-- @if(session("message")) --}}
                                @if(session('message'))
                                <div class="col-md-12 mt-3" style="margin-top: 1rem!important;">
                                    <div class="alert alert-success alert-dismissible mb-2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">×</span>
                                        </button>
                                        <div class="d-flex align-items-center">
                                          <i class="bx bx-like"></i>
                                          <span>
                                            {{session('message')}}
                                          </span>
                                        </div>
                                      </div>
                                </div>
                                @endif
                                {{-- @endif --}}
                                <div class="col-md-12">
                                    <div class="
                                            table-responsive
                                            mt-2
                                        ">
                                         <livewire:table.signup-request/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
{{-- </section> --}}