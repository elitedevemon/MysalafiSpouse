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
                            <div class="col-md-12">
                                @if($reqLog->status =='new')
                                <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                    data-target="#default1">
                                    In-Process
                                </button>
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                    data-target="#default">
                                    Reject
                                </button>
                                @endif
                                @if($reqLog->share ==0 && $reqLog->status == 'accept')
                                <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                    data-target="#default2">
                                    Share Guardian Information
                                </button>
                                @endif
                            </div>
                            @if($reqLog->status =='in-process')
                            <div class="col-md-12">
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                    data-target="#default">
                                    Reject
                                </button>
                            </div>
                            @endif
                            <div class="col-md-6">
                                <div class="card-header" style="padding-left: 0px;">
                                    <h4 class="card-title">Sender Detail</h4>
                                </div>
                                <div>
                                    <b>Status: </b><span><span
                                            class='badge badge-info'>{{ $reqLog->status }}</span></span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Profile Code: </b><span>{{ $reqLog->senderuser->profile_code }}</span>
                                </div>

                                <div style="padding-top: 20px;">
                                    <b>Email: </b><span>{{ $reqLog->senderuser->email }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>DOB: </b><span>{{ $reqLog->senderuser->dob }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Gender: </b><span>{{ $reqLog->senderuser->gender }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Residence: </b><span>{{ $reqLog->senderuser->residence }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Type: </b><span>{{ $reqLog->senderuser->type }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Ethnicity: </b><span>{{ $reqLog->senderuser->ethnicity }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Age: </b><span>{{ $reqLog->senderuser->age }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Height: </b><span>{{ $reqLog->senderuser->height }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>About: </b><span>{{ $reqLog->senderuser->about }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Potential Spouse: </b><span>{{ $reqLog->senderuser->potential_spouse }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Any Other Information:
                                    </b><span>{{ $reqLog->senderuser->any_other_information }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Visibility: </b><span>{{ $reqLog->senderuser->visibility }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Status: </b><span>{{ $reqLog->senderuser->status }}</span>
                                </div>
                                @if($reqLog->senderuser->gender == 'Female')
                                <div style="padding-top: 20px;">
                                    <b>Guardian: </b><span>{{ $reqLog->senderuser->guardian }}</span>
                                </div>
                                @endif
                              
                                <div style="padding-top: 20px;">
                                    <b>Guardian information shared: </b><span>{{ $reqLog->share == 1 ? 'Yes' : 'No' }}</span>
                                </div>
                              
                            </div>
                            <div class="col-md-6">
                                <div class="card-header" style="padding-left: 0px;">
                                    <h4 class="card-title">Receiver Detail</h4>
                                </div>
                                <div>
                                    <b>Profile Code: </b><span>{{ $reqLog->user->profile_code }}</span>
                                </div>

                                <div style="padding-top: 20px;">
                                    <b>Email: </b><span>{{ $reqLog->user->email }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>DOB: </b><span>{{ $reqLog->user->dob }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Gender: </b><span>{{ $reqLog->user->gender }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Residence: </b><span>{{ $reqLog->user->residence }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Type: </b><span>{{ $reqLog->user->type }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Ethnicity: </b><span>{{ $reqLog->user->ethnicity }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Age: </b><span>{{ $reqLog->user->age }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Height: </b><span>{{ $reqLog->user->height }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>About: </b><span>{{ $reqLog->user->about }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Potential Spouse: </b><span>{{ $reqLog->user->potential_spouse }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Any Other Information:
                                    </b><span>{{ $reqLog->user->any_other_information }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Visibility: </b><span>{{ $reqLog->user->visibility }}</span>
                                </div>
                                <div style="padding-top: 20px;">
                                    <b>Status: </b><span>{{ $reqLog->user->status }}</span>
                                </div>
                                @if($reqLog->user->gender == 'Female')
                                <div style="padding-top: 20px;">
                                    <b>Guardian: </b><span>{{ $reqLog->user->guardian }}</span>
                                </div>
                                @endif
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                                {{-- <button type="submit" class="btn btn-primary mr-1">Submit</button> --}}
                                <a href="{{ url('/superadmin/match') }}" type="reset"
                                    class="btn btn-light-info">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- reject --}}
    <div class="modal fade text-left" id="default2" tabindex="-1" aria-labelledby="myModalLabel2" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel2">Share Guardian Information</h3>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">
                        Are you sure you want to share guardian information ?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">No</span>
                    </button>
                    <button type="button" wire:loading.attr='disabled' wire:target='share' wire:click.prevent='share'
                        class="mr-1 btn btn-primary">
                        Yes
                        <div wire:loading wire:target="share">
                            <i id="icon-arrow" class=" bx bx-loader-circle bx-spin"></i>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
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
                        Are you sure you want to reject this proposal ?
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
                    <h3 class="modal-title" id="myModalLabel2">In-Process</h3>
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
                    <button type="button" wire:loading.attr='disabled' wire:target='inprocess'
                        wire:click.prevent='inprocess' class="mr-1 btn btn-primary">
                        Yes
                        <div wire:loading wire:target="inprocess">
                            <i id="icon-arrow" class=" bx bx-loader-circle bx-spin"></i>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
