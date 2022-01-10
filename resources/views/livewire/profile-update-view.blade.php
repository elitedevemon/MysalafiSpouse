<div class="row">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-body">
                <form class="form form-horizontal">
                    <div class="form-body">
                        <div class="row">
                            @if(session('message'))
                            <div class="col-md-12">
                                <div class="alert alert-success">
                                    {{session('message')}}
                                </div>
                            </div>
                            @endif
                            @if($new_changes->status ==0)
                            <div class="col-md-12">
                                <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                    data-target="#default1">
                                    Approve
                                </button>
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                    data-target="#default">
                                    Reject
                                </button>
                            </div>
                            @endif

                            <div class="col-md-6">
                                <div class="card-header" style="padding-left: 0px;">
                                    <h4 class="card-title">Curretn Detail</h4>
                                </div>
                                {{-- <div>
                                    <b>Status: </b><span><span
                                            class='badge badge-info'>{{ $reqLog->status }}</span></span>
                            </div> --}}


                            <div style="padding-top: 20px;">
                                <b>Residence: </b><span>{{ $user->residence }}</span>
                            </div>
                            <div style="padding-top: 20px;">
                                <b>Ethnicity: </b><span>{{ $user->ethnicity }}</span>
                            </div>
                            <div style="padding-top: 20px;">
                                <b>Age: </b><span>{{ $user->age }}</span>
                            </div>
                            <div style="padding-top: 20px;">
                                <b>Height: </b><span>{{ $user->height }}</span>
                            </div>
                            <div style="padding-top: 20px;">
                                <b>About: </b><span>{{ $user->about }}</span>
                            </div>
                            <div style="padding-top: 20px;">
                                <b>Potential Spouse: </b><span>{{ $user->potential_spouse }}</span>
                            </div>
                            <div style="padding-top: 20px;">
                                <b>Any Other Information:
                                </b><span>{{ $user->any_other_information }}</span>
                            </div>
                            @if($user->gender == 'Female')
                            <div style="padding-top: 20px;">
                                <b>Guardian:
                                </b><span>{{ $user->guardian }}</span>
                            </div>
                            @endif
                            <div style="padding-top: 20px;">
                                <b>Scholar:
                                </b><br>
                                    @foreach($user->userScholars as $item)
                                    <br>
                                <span>{{ $item->name }}</span><br>
                                @endforeach
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="card-header" style="padding-left: 0px;">
                                <h4 class="card-title">New Changes</h4>
                            </div>

                            <div style="padding-top: 20px;">
                                <b>Residence: </b><span>{{ $new_changes->residence }}</span>
                            </div>
                            <div style="padding-top: 20px;">
                                <b>Ethnicity: </b><span>{{ $new_changes->ethnicity }}</span>
                            </div>
                            <div style="padding-top: 20px;">
                                <b>Age: </b><span>{{ $new_changes->age }}</span>
                            </div>
                            <div style="padding-top: 20px;">
                                <b>Height: </b><span>{{ $new_changes->height }}</span>
                            </div>
                            <div style="padding-top: 20px;">
                                <b>About: </b><span>{{ $new_changes->about }}</span>
                            </div>
                            <div style="padding-top: 20px;">
                                <b>Potential Spouse: </b><span>{{ $new_changes->potential_spouse }}</span>
                            </div>
                            
                            <div style="padding-top: 20px;">
                                <b>Any Other Information:
                                </b><span>{{ $new_changes->any_other_information }}</span>
                            </div>
                            @if($user->gender == 'Female')
                            <div style="padding-top: 20px;">
                                <b>Guardian:
                                </b><span>{{ $new_changes->guardian }}</span>
                            </div>
                            @endif
                            <div style="padding-top: 20px;">
                                <b>Scholar:
                                </b><br>
                                    @foreach($new_changes->userScholars as $item)
                                    <br>
                                <span>{{ $item->name }}</span><br>
                                @endforeach
                            </div>


                        </div>
                        <div class="col-sm-12 d-flex justify-content-end">
                            {{-- <button type="submit" class="btn btn-primary mr-1">Submit</button> --}}
                            <a href="{{ url('/superadmin/profile-update') }}" type="reset" class="btn btn-light-info">Back</a>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- reject --}}
<div class="modal fade text-left" id="default" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel1">Reject</h3>
                <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0">
                    Are you sure you want to reject this request ?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">No</span>
                </button>
                <button type="button" wire:loading.attr='disabled' wire:target='reject' wire:click.prevent='reject'
                    class="mr-1 btn btn-primary">
                    Yes
                    <div wire:loading wire:target="reject">
                        <i id="icon-arrow" class=" bx bx-loader-circle bx-spin"></i>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>
{{-- //in-process// --}}
<div class="modal fade text-left" id="default1" tabindex="-1" aria-labelledby="myModalLabel2" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel2">Approve</h3>
                <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0">
                    Are you sure you want to in-process this proposal ?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">No</span>
                </button>
                <button type="button" wire:loading.attr='disabled' wire:target='approve'
                    wire:click.prevent='approve' class="mr-1 btn btn-primary">
                    Yes
                    <div wire:loading wire:target="approve">
                        <i id="icon-arrow" class=" bx bx-loader-circle bx-spin"></i>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>
</div>
