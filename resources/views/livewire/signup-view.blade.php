<div class="row">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-body">
                <form class="form form-horizontal">
                    <div class="form-body">
                        <div class="row">
                           
                            <div class="col-md-6">
                                <div class="card-header" style="padding-left: 0px;">
                                    <h4 class="card-title">Signup Detail</h4>
                                </div>
                                <div>
                                    <b>Email: </b><span>{{ $user->email }}</span>
                                </div>
                                <br>
                                <div>
                                    <b>Gender?: </b><span>{{ $user->gender }}</span>
                                </div>
                                <br>
                                <div>
                                    <b>Ethnicity & Residence?: </b><span>{{ $user->ethnicity_residence }}</span>
                                </div>
                                <br>
                                <div>
                                    <b>Age & Height?: </b><span>{{ $user->age_height }}</span>
                                </div>
                                <br>
                                <div>
                                    <b>A Brief Background About Yourself?: </b><span>{{ $user->background }}</span>
                                </div>  
                                <br>
                                <div>
                                    <b>What Are You Looking For In A Potential Spouse?: </b><span>{{ $user->potential }}</span>
                                </div>
                               
                                
                                <br>
                                <div>
                                    <b>What Ulema (Scholars) Do You Listen To?: </b>
                                    @foreach($user->scholar as $item)
                                    @if(isset($item))
                                   
                                    <span>{{ $item }},</span>
                                    @endif
                                    @endforeach
                                    @if($user->other_scholar)
                                      <span>{{ $user->other_scholar }}</span>
                                    @endif 
                                </div> 
                                <br>
                                @if(isset($user->other_scholar))
                                <div>
                                    <b>Other Scholar?: </b><span>{{ $user->other_scholar }}</span>
                                </div>
                                @endif
                                 <br>
                                @if(isset($user->before_married))
                                <div>
                                    <b>Before Married?: </b><span>{{ $user->before_married }}</span>
                                </div>
                                @endif
                                <div style="padding-top: 20px;">
                              
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                                {{-- <button type="submit" class="btn btn-primary mr-1">Submit</button> --}}
                                <a href="{{ url('/superadmin/signup-request') }}" type="reset"
                                    class="btn btn-light-info">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
</div>
