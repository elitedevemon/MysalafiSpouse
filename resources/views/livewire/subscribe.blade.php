{{-- <h4 class="widget-title">SUBSCRIBED</h4> --}}

<div class="form-cover">
    @if(session('message'))
<!-- <h4 class="widget-title"> {{session('message')}}</h4> -->
@endif
    <div data-auto-scroll="" data-no-message-redirect="" data-thousand="" data-decimal="." data-delay="" data-id="1"
       
        class="fc-form fc-form-1 align- fc-temp-class save-form- dont-submit-hidden- icons-hide- disable-enter- label-placeholder field-border-visible frame-hidden field-alignment-left options-fade remove-asterisk-true"
        style="width: ; color: #666666; font-size: 100%; background: none">
        <div class="form-page form-page-0" data-index="0">
            
            <div class="form-page-content">
                <div data-identifier="field1" data-index="0" style="width: 50%"
                    class=" form-element form-element-field1 options-false index-false form-element-0 default-false form-element-type-oneLineText is-required-false odd -handle">
                    <div class="form-element-html">
                        <div><label class="oneLineText-cover field-cover"><span class="sub-label-false"><span
                                        class="main-label"><span>Name</span></span><span
                                        class="sub-label"></span></span>
                                <div><span class="error"></span><input type="text" placeholder="Name"
                                        make-read-only="false" data-field-id="field1" wire:model="name" data-min-char=""
                                        data-max-char="" data-val-type="" data-regexp="" data-is-required="false"
                                        data-allow-spaces="" class="validation-lenient" data-placement="right"
                                        data-toggle="tooltip" tooltip="" data-trigger="focus" data-html="true"
                                        data-input-mask="" data-mask-placeholder="" data-original-title=""><i
                                        class="formcraft-icon formcraft-icon-type-"></i>
                                </div>
                            </label></div>
                        @error('name')
                        <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div data-identifier="field2" data-index="1" style="width: 50%"
                    class=" even form-element form-element-field2 form-element-1 default-false form-element-type-email is-required-true -handle options-true index-true">
                    <div class="form-element-html">
                        <div><label class="email-cover field-cover  "><span class="sub-label-true"><span
                                        class="main-label"><span>Email</span></span><span class="sub-label"><span>a
                                            valid
                                            email</span></span></span>
                                <div><span class="error"></span><input placeholder="Email" data-field-id="field2"
                                        type="text" data-val-type="email" make-read-only="" data-is-required="true"
                                        wire:model="email" class="validation-lenient" data-placement="right"
                                        data-toggle="tooltip" tooltip="" data-trigger="focus" data-html="true"
                                        data-original-title=""><i class="formcraft-icon"></i>
                                </div>
                            </label></div>
                        @error('email')
                        <span style="color:red;">{{ $message }}</span>
                        @enderror

                    </div>

                </div>
                <div data-identifier="field3" data-index="2" style="width: 100%"
                    class=" form-element form-element-field3 options-false index-false form-element-2 default-false form-element-type-submit is-required-false odd -handle">
                    <div class="form-element-html">
                        <div>
                            <div class="align-right wide-true submit-cover field-cover">
                                <button wire:click="store" class="button submit-button"><span
                                        class="text ">Subscribe</span><span class="spin-cover"><i style="color:"
                                            class="loading-icon icon-cog animate-spin"></i></span></button>
                            </div>
                            <div class="submit-response "></div>
                            <label><input type="text" class="required_field" name="website"
                                    autocomplete="maple-syrup-pot"></label>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="prev-next prev-next-1" style="width: ; color: #666666; font-size: 100%; background: none">
        <div><label><input type="text" class="  "></label><span class="inactive page-prev "><i
                    class="formcraft-icon">keyboard_arrow_left</i>Previous</span>
        </div>
        <div><label><input type="text" class="  "></label><span class="page-next ">Next<i
                    class="formcraft-icon">keyboard_arrow_right</i></span>
        </div>
    </div>
</div>
