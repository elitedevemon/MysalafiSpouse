{{-- <section id="basic-horizontal-layouts"> --}}
    <div class="row match-height">
        @if(session('resetmessage'))
        <div class="col-md-12">
            <div class="alert alert-success">
                {{session('resetmessage')}}
            </div>
        </div>
        @endif
       <div class="col md-12 col-12">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link {{ $filter == 'Female' ? 'active' : '' }}"  href="{{ url('/superadmin/profile?filter=Female') }}">
                <i class="bx bx-female align-middle"></i>
                <span class="align-middle">UK Female</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $filter == 'InternationalFemale' ? 'active' : '' }}"  href="{{ url('/superadmin/profile?filter=InternationalFemale') }}">
                  <i class="bx bx-female align-middle"></i>
                  <span class="align-middle">International Female</span>
                </a>
              </li>
            <li class="nav-item">
              <a class="nav-link {{ $filter == 'Male' ? 'active' : '' }}"  href="{{ url('/superadmin/profile?filter=Male') }}">
                <i class="bx bx-male align-middle"></i>
                <span class="align-middle">UK Male</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ $filter == 'InternationalMale' ? 'active' : '' }}"  href="{{ url('/superadmin/profile?filter=InternationalMale') }}">
                <i class="bx bx-male align-middle"></i>
                <span class="align-middle">International Male</span>
              </a>
            </li>
          </ul>
       </div>
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile</h4>
                    <a href="{{ url('/superadmin/profile/modify') }}" class="btn btn-primary" >
                        Add profile
                    </a>
                </div>
                @php $users = \App\Models\User::count(); @endphp
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
                                         <livewire:table.profile :params="['filter' => $this->filter]"/>
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