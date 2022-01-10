<section id="page-account-settings">
    <div class="row">
        <div class="col-12">
            <div class="row" wire:ignore.self>
                <!-- left menu section -->
                <div class="col-md-3 mb-2 mb-md-0 pills-stacked">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item" wire:ignore>
                            <a class="nav-link d-flex align-items-center {{ $review_id || $faq_id ? '' : 'active' }}" id="account-pill-general"
                                data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                <i class="bx bx-cog"></i>
                                <span>About us</span>
                            </a>
                        </li>
                        <li class="nav-item" wire:ignore>
                            <a class="nav-link d-flex align-items-center {{ $review_id ? 'active' : '' }}" id="account-pill-password" data-toggle="pill"
                                href="#account-vertical-password" aria-expanded="false">
                                <i class="bx bx-lock"></i>
                                <span>Reviews</span>
                            </a>
                        </li>
                        <li class="nav-item" wire:ignore>
                            <a class="nav-link d-flex align-items-center {{ $faq_id ? 'active' : '' }}" id="account-pill-info" data-toggle="pill"
                                href="#account-vertical-info" aria-expanded="false">
                                <i class="bx bx-info-circle"></i>
                                <span>FAQs</span>
                            </a>
                        </li>
                        <li class="nav-item" wire:ignore>
                            <a class="nav-link d-flex align-items-center" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                                <i class="bx bxl-twitch"></i>
                                <span>Social links</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
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
                                <div role="tabpanel" class="tab-pane {{ $review_id || $faq_id ? '' : 'active' }}" id="account-vertical-general"
                                    wire:ignore.self aria-labelledby="account-pill-general" aria-expanded="true">


                                    {{-- <form class="validate-form" novalidate="novalidate"> --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="about_us">About Us</label>
                                            <fieldset class="form-group">
                                                <textarea rows="5" class="form-control" id="about_us"
                                                    wire:model.defer="about_us"></textarea>
                                                @error('about_us')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="video_link">Vidoe link</label>
                                                <input type="text" id="video_link" class="form-control"
                                                    wire:model.defer="video_link">
                                                @error('video_link')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8 offset-md-4 form-group" style="margin: 0px;">
                                            <fieldset>
                                                <div class="checkbox">
                                                    <input type="checkbox" wire:model="active" class="checkbox__input"
                                                        id="checkbox1" checked="">
                                                    <label for="checkbox1">Active</label>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="button" wire:loading.attr='disabled' wire:target='store'
                                                wire:click.prevent='store' class="mr-1 btn btn-primary">
                                                Save & Change
                                                <div wire:loading wire:target="store">
                                                    <i id="icon-arrow" class=" bx bx-loader-circle bx-spin"></i>
                                                </div>
                                            </button>

                                        </div>

                                    </div>
                                    {{-- </form> --}}
                                </div>
                                <div class="tab-pane fade {{ $review_id ? 'active show' : '' }}" id="account-vertical-password" role="tabpanel"
                                    wire:ignore.self aria-labelledby="account-pill-password" aria-expanded="false">
                                    {{-- <form class="validate-form" novalidate="novalidate"> --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="reviews_name">Name</label>
                                                <input type="text" id="reviews_name" class="form-control"
                                                    wire:model.defer="reviews_name">
                                                @error('reviews_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="reviews_text">Text</label>
                                            <fieldset class="form-group">
                                                <textarea rows="5" class="form-control" id="reviews_text"
                                                    wire:model.defer="reviews_text"></textarea>
                                                @error('reviews_text')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                        </div>

                                        <div class="col-12 col-md-8 offset-md-4 form-group" style="margin: 0px;">
                                            <fieldset>
                                                <div class="checkbox">
                                                    <input wire:model.defer="type" type="checkbox" class=""
                                                        id="type"  />
                                                    <label for="type">Female</label>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-12 col-md-8 offset-md-4 form-group" style="margin: 0px;">
                                            <fieldset>
                                                <div class="checkbox">
                                                    <input wire:model.defer="reviews_active" type="checkbox" class=""
                                                        id="reviews_active" checked />
                                                    <label for="reviews_active">Active</label>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            @if(!$review_id)
                                            <button type="button" wire:loading.attr='disabled'
                                                wire:target='reviewsStore' wire:click='reviewsStore'
                                                class="mr-1 btn btn-primary">
                                                Save & Change
                                                <div wire:loading wire:target="reviewsStore">
                                                    <i id="icon-arrow" class=" bx bx-loader-circle bx-spin"></i>
                                                </div>
                                            </button>
                                            @else
                                            <button type="button" wire:loading.attr='disabled'
                                                wire:target='reviewsUpdate' wire:click='reviewsUpdate'
                                                class="mr-1 btn btn-warning">
                                                Update
                                                <div wire:loading wire:target="reviewsUpdate">
                                                    <i id="icon-arrow" class=" bx bx-loader-circle bx-spin"></i>
                                                </div>
                                            </button>
                                            @endif

                                        </div>
                                        <div class="col-md-12">
                                            <livewire:table.reviews/>
                                        </div>

                                    </div>
                                    {{-- </form> --}}
                                </div>
                                <div class="tab-pane fade {{ $faq_id ? 'active show' : '' }}" id="account-vertical-info" role="tabpanel" wire:ignore.self
                                    aria-labelledby="account-pill-info" aria-expanded="false">
                                    {{-- <form class="validate-form" novalidate="novalidate"> --}}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="question">Question</label>
                                                    <input type="text" id="question" class="form-control"
                                                        wire:model.defer="question">
                                                    @error('question')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="answer">Abswer</label>
                                                <fieldset class="form-group">
                                                    <textarea rows="5" class="form-control" id="answer"
                                                        wire:model.defer="answer"></textarea>
                                                    @error('answer')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </fieldset>
                                            </div>
    
                                            <div class="col-12 col-md-8 offset-md-4 form-group" style="margin: 0px;">
                                                <fieldset>
                                                    <div class="checkbox">
                                                        <input wire:model.defer="faq_active" type="checkbox" class=""
                                                            id="faq_active" checked />
                                                        <label for="faq_active">Active</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                @if(!$faq_id)
                                                <button type="button" wire:loading.attr='disabled'
                                                    wire:target='faqStore' wire:click='faqStore'
                                                    class="mr-1 btn btn-primary">
                                                    Save & Change
                                                    <div wire:loading wire:target="faqStore">
                                                        <i id="icon-arrow" class=" bx bx-loader-circle bx-spin"></i>
                                                    </div>
                                                </button>
                                                @else
                                                <button type="button" wire:loading.attr='disabled'
                                                    wire:target='faqUpdate' wire:click='faqUpdate'
                                                    class="mr-1 btn btn-warning">
                                                    Update
                                                    <div wire:loading wire:target="faqUpdate">
                                                        <i id="icon-arrow" class=" bx bx-loader-circle bx-spin"></i>
                                                    </div>
                                                </button>
                                                @endif
    
                                            </div>
                                            <div class="col-md-12">
                                                <livewire:table.faqs />
                                            </div>
    
                                        </div>
                                    {{-- </form> --}}
                                </div>
                                <div class="tab-pane fade" id="account-vertical-social" role="tabpanel" wire:ignore.self
                                    aria-labelledby="account-pill-social" aria-expanded="false">
                                    {{-- <form> --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <input type="text" wire:model="instagram" class="form-control" placeholder="Add link">
                                                @error('instagram')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="text" wire:model="facebook" class="form-control" placeholder="Add link">
                                                @error('facebook')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="text" wire:model="twiter" class="form-control" placeholder="Add link"
                                                    >
                                                    @error('twiter')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>LinkedIn</label>
                                                <input type="text" wire:model="linkdin" class="form-control" placeholder="Add link"
                                                    >
                                                    @error('linkdin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                        </div>
                                       
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" wire:model="address" class="form-control" placeholder="Add Address">
                                                @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" wire:model="email" class="form-control" placeholder="Add Email">
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12  d-flex flex-sm-row flex-column justify-content-end">
                                            <button wire:click="socialLinkStore"  class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                changes</button>
                                            
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
