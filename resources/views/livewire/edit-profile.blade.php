<section id="basic-vertical-layouts">
    <div class="row match-height">
        {{-- <div class="col-md-2"></div> --}}
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Profile</h4>
                </div>
                <div class="card-body">
                    <form class="form form-vertical">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
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
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Name </label>
                                                <input type="text" id="name" class="form-control"
                                                    wire:model.defer="name">
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input wire:model="email" disabled type="text" id="email"
                                                    class="form-control">
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="current_password">Current Password </label>
                                                <input type="password" id="current_password" class="form-control"
                                                    wire:model.defer="current_password">
                                                @error('current_password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="new_password">New Password </label>
                                                <input type="password" id="new_password" class="form-control"
                                                    wire:model.defer="new_password">
                                                @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="confirm_password">Confirm Password </label>
                                                <input type="password" id="confirm_password" class="form-control"
                                                    wire:model.defer="confirm_password">
                                                @error('confirm_password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="button" wire:loading.attr='disabled' wire:target='updatePassword'
                                        wire:click.prevent='updatePassword' class="mr-1 btn btn-primary">
                                        Create
                                        <div wire:loading wire:target="updatePassword">
                                            <i id="icon-arrow" class=" bx bx-loader-circle bx-spin"></i>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
