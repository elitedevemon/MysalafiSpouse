<section id="basic-vertical-layouts">
    <div class="row match-height">
        {{-- <div class="col-md-2"></div> --}}
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile</h4>
                    <a href="{{ url('/superadmin/profile?filter=Female') }}" class="btn btn-primary">
                        View profile
                    </a>
                </div>
                <div class="card-body">
                    <form class="form form-vertical">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" id="email"
                                                    class="form-control" wire:model.defer="email">
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="dob">DOB</label>
                                                <input type="date" wire:model="dob" class="form-control">
                                                @error('dob')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="d-block">Gender</label>
                                                <div class="custom-control-inline">
                                                    <div class="radio mr-1">
                                                        <input value="Male" wire:model="gender" type="radio"
                                                            name="bsradio" id="radio1">
                                                        <label for="radio1">Male</label>
                                                    </div>
                                                    <div class="radio">
                                                        <input value="Female" wire:model="gender" type="radio"
                                                            name="bsradio" id="radio2">
                                                        <label for="radio2">Female</label>
                                                    </div>
                                                </div>

                                            </div>
                                            @error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email">Type</label>
                                                <select class="form-control" wire:model="type">
                                                    <option hidden value="">Select Type</option>
                                                    <option value="UK Base">UK Base</option>
                                                    <option value="International">International</option>
                                                </select>
                                                @error('type')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-1">
                                            <label class="d-block">Profile code</label>
                                            <fieldset>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            @if($gender == 'Female' && $type == 'UK Base')
                                                            #F
                                                            @elseif($gender == 'Female' && $type == 'International')
                                                            #IF
                                                            @elseif($gender == 'Male' && $type == 'UK Base')
                                                            #M
                                                            @elseif($gender == 'Male' && $type == 'International')
                                                            #IM
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <input wire:model.defer="profile_code" type="text"
                                                        class="form-control" aria-describedby="basic-addon1">

                                                </div>
                                            </fieldset>
                                            @error('profile_code')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @if($gender == 'Female')
                                        <div class="col-md-12">
                                            <label for="guardian">Guardian</label>
                                            <fieldset class="form-group">
                                                <textarea rows="5" class="form-control" id="guardian"
                                                    wire:model.defer="guardian"></textarea>
                                                @error('guardian')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                        </div>
                                        @endif

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="ethnicity">Ethnicity</label>
                                                <input type="text" id="ethnicity" class="form-control"
                                                    wire:model.defer="ethnicity">
                                                @error('ethnicity')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="residence">Residence</label>
                                                <input type="text" id="residence" class="form-control"
                                                    wire:model.defer="residence">
                                                @error('residence')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="age">Age</label>
                                                <input type="number" id="age" class="form-control"
                                                    wire:model.defer="age">
                                                @error('age')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="height">Height</label>
                                                <input type="text" id="height" class="form-control"
                                                    wire:model.defer="height">
                                                @error('height')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="padding:0px;">
                                            <div class="form-group" style="padding-left: 20px;">
                                                <label for="">Ulema (Scholars)</label>
                                                <fieldset>
                                                    <br>
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input value="Shaykh al-Albani" type="checkbox" id="checkboxGlow0" autocomplete="off" wire:model="scholars.0">
                                                        <label for="checkboxGlow0">Shaykh al-Albani</label>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input value="Shaykh Ibn Bāz" type="checkbox" id="checkboxGlow1" autocomplete="off" wire:model="scholars.1">
                                                        <label for="checkboxGlow1">
                                                            Shaykh Ibn Bāz</label>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input value="Shaykh Ibn Uthaymeen" type="checkbox" id="checkboxGlow2" wire:model="scholars.2">
                                                        <label for="checkboxGlow2">
                                                            Shaykh Ibn Uthaymeen</label>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input value="Shaykh Salih al-Fawzan" type="checkbox" id="checkboxGlow3" wire:model="scholars.3">
                                                        <label for="checkboxGlow3">Shaykh Salih al-Fawzan</label>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input value="Imām Ibn Taymiyyah" type="checkbox" id="checkboxGlow4" wire:model="scholars.4">
                                                        <label for="checkboxGlow4">
                                                            Imām Ibn Taymiyyah</label>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input value="Imām Ibn al Qayyim" type="checkbox" id="checkboxGlow5" wire:model="scholars.5">
                                                        <label for="checkboxGlow5">
                                                            Imām Ibn al Qayyim</label>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input value="Shaykh Muhammad Ibn Abdul Wahāb" type="checkbox" id="checkboxGlow6" wire:model="scholars.6">
                                                        <label for="checkboxGlow6">
                                                            Shaykh Muhammad Ibn Abdul Wahāb</label>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" id="checkboxGlow7" wire:model="schlr">
                                                        <label for="checkboxGlow7">
                                                            Other</label>
                                                    </div>
                                                </fieldset>
                                                @error('scholars')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="scholars">Ulema (Scholars)</label>
                                                <select id="scholars" class="form-control" wire:model="scholars">
                                                    <option hidden value="">Select Ulema (Scholar)</option>
                                                    <option value="1">test</option>
                                                    <option value="2">test1</option>
                                                </select>
                                                @error('scholars')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                    </div>
                                    @if($schlr)
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          
                                            <input type="text" id="other_scholars" class="form-control"
                                                wire:model.defer="other_scholars">
                                            @error('other_scholars')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @endif  

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12" style="padding:0px;">
                                    <label for="about">About</label>
                                    <fieldset class="form-group">
                                        <textarea rows="7" class="form-control" id="about"
                                            wire:model.defer="about"></textarea>
                                        @error('about')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-md-12" style="padding:0px;padding-top:8px;">
                                    <div class="form-group">
                                        <label for="potential_spouse">Potential Spouse</label>
                                        <textarea rows="14" class="form-control" id="about"
                                        wire:model.defer="potential_spouse"></textarea>
                                       
                                        @error('potential_spouse')
                                        <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12" style="padding:0px;">
                                    <label for="any_other_information">Any other Information</label>
                                    <fieldset class="form-group">
                                        <textarea rows="5" class="form-control" id="any_other_information"
                                            wire:model.defer="any_other_information"></textarea>
                                        @error('any_other_information')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-md-12" style="padding:0px;">
                                    <div class="form-group">
                                        <label for="visibility">Visibility</label>
                                        <select id="visibility" class="form-control" wire:model="visibility">
                                            <option hidden value="">Select Visibility</option>
                                            <option value="Public">Public</option>
                                            <option value="Private">Private</option>
                                        </select>
                                        @error('visibility')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12" style="padding:0px;">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select id="status" class="form-control" wire:model="status">
                                            <option hidden value="">Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                        @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                @if($user_id)
                                <button type="button" wire:loading.attr='disabled' wire:target='update'
                                    wire:click.prevent='update' class="mr-1 btn btn-warning">
                                    Update
                                    <div wire:loading wire:target="update">
                                        <i id="icon-arrow" class=" bx bx-loader-circle bx-spin"></i>
                                    </div>
                                </button>

                                @else
                                {{-- <button type="button" wire:click="store"
                                    class="btn btn-primary mr-1">Submit</button> --}}
                                <button type="button" wire:loading.attr='disabled' wire:target='store'
                                    wire:click.prevent='store' class="mr-1 btn btn-primary">
                                    Create
                                    <div wire:loading wire:target="store">
                                        <i id="icon-arrow" class=" bx bx-loader-circle bx-spin"></i>
                                    </div>
                                </button>
                                @endif
                                {{-- <button type="reset" class="btn btn-light-secondary">Reset</button> --}}
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    </div>
</section>
