<section id="content" class="full-width">
    @if($openModel)
    <div class="modal" style="display:block;" x-data="{ show: false }">
        <div class="modal-content" style="color:black;padding-bottom:80px;">
            <div>
                <div style="text-align: right;">
                    <span wire:click="closeModel" class="close" wire:click="closemodel('true')"> &times;</span>
                    {{-- <span on></span>  --}}
                </div>
                <b style="text-align: center;">Proposal</b>
            </div>
            <div class="row">
                @if(session('message'))
                <div class="col-md-12">
                    <br>
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                </div>
                @endif
                @if(!session('message'))
                <div class="col-md-8" style="text-align: left;">
                    Are you sure you want update profile
                </div>
                @endif

            </div>
            <br>

            <div class="col-md-8 custom_buy" style="padding:0px;padding-top:10px;text-align:left;">
                @if(session('message'))
                <a style="color: red;background:#ccc5c5;" href="{{ url('/add-ons') }}" class="buy_custom"
                    style="padding-left:10px;padding-right:10px;color:red;border:none;"> Buy now

                </a>
                @endif
                @if(!session('message'))
                <button wire:click="confirmUpdate" class="buy_custom" style="padding-left:10px;padding-right:10px;color:red;border:none;"> Yes,
                    Update
                    <div style="float: left;padding-left:3px;" wire:loading wire:target="acceptrequest">
                        Loading
                    </div>
                </button>
                @endif

                <button wire:click="closeModel"  class="buy_custom"
                    style="padding-left:10px;padding-right:10px;color:red;border:none;">Close</button>
            </div>

        </div>
    </div>
    @endif
    <div id="post-3275" class="post-3275 page type-page status-publish hentry">
        <span class="entry-title rich-snippet-hidden">Login!</span><span class="vcard rich-snippet-hidden"><span
                class="fn"><a href="https://mysalafispouse.com/author/devsite/" title="Posts by H"
                    rel="author">H</a></span></span><span
            class="updated rich-snippet-hidden">2021-07-20T22:59:27+00:00</span>
        <div class="post-content">
            <div class="fusion-fullwidth fullwidth-box fusion-builder-row-3 fusion-flex-container nonhundred-percent-fullwidth non-hundred-percent-height-scrolling"
                style="background-color: #02427d;background-position: center center;background-repeat: no-repeat;border-width: 0px 0px 0px 0px;border-color:rgba(0,0,0,0.08);border-style:solid;">
                <div class="fusion-builder-row fusion-row fusion-flex-align-items-flex-start"
                    style="max-width:1372.8px;margin-left: calc(-4% / 2 );margin-right: calc(-4% / 2 );">
                    <div
                        class="fusion-layout-column fusion_builder_column fusion-builder-column-7 fusion_builder_column_1_1 1_1 fusion-flex-column">
                        <div class="fusion-column-wrapper fusion-flex-justify-content-flex-start fusion-content-layout-column"
                            style="background-position: left top; background-repeat: no-repeat; background-size: cover; padding: 0px; min-height: 0px;">
                            <style type="text/css">
                                @media only screen and (max-width:1024px) {
                                    .fusion-title.fusion-title-1 {
                                        margin-top: 0px !important;
                                        margin-bottom: 0px !important;
                                    }
                                }

                                @media only screen and (max-width:640px) {
                                    .fusion-title.fusion-title-1 {
                                        margin-top: 12px !important;
                                        margin-bottom: 24px !important;
                                    }
                                }

                            </style>
                            <div class="fusion-title title fusion-title-1 fusion-sep-none fusion-title-center fusion-title-text fusion-title-size-one fusion-border-below-title"
                                style="font-size:35px;margin-top:0px;margin-bottom:0px;">
                                <h1 class="title-heading-center fusion-responsive-typography-calculated"
                                    style="margin: 0px; font-size: 1em; color: rgb(255, 255, 255); --fontSize:35; line-height: 1.12;"
                                    data-fontsize="35" data-lineheight="39.2px">Edit My Profile:</h1>
                                <p style="margin-top:10px;color: white;font-size:11px;">Profile Edits Remaining: ({{ $balanceTotal }})</p>
                                <p style="margin-top:10px;color: white;font-size:11px;">Email: {{ $email }}</p>
                                <p style="margin-top:10px;color: white;font-size:11px;">Profile Code: {{ $profile_code }}</p>
                                <p style="margin-top:10px;color: white;font-size:11px;">D.O.B: {{ $dob }}</p>
                               
                              
                            </div>
                        </div>
                    </div>
                    <style type="text/css">
                        .fusion-body .fusion-builder-column-7 {
                            width: 100% !important;
                            margin-top: 0px;
                            margin-bottom: 0px;
                        }

                        .fusion-builder-column-7>.fusion-column-wrapper {
                            padding-top: 0 !important;
                            padding-right: 0px !important;
                            margin-right: 1.92%;
                            padding-bottom: 0 !important;
                            padding-left: 0px !important;
                            margin-left: 1.92%;
                        }

                        @media only screen and (max-width:1024px) {
                            .fusion-body .fusion-builder-column-7 {
                                width: 100% !important;
                                order: 0;
                            }

                            .fusion-builder-column-7>.fusion-column-wrapper {
                                margin-right: 1.92%;
                                margin-left: 1.92%;
                            }
                        }

                        @media only screen and (max-width:640px) {
                            .fusion-body .fusion-builder-column-7 {
                                width: 100% !important;
                                order: 0;
                            }

                            .fusion-builder-column-7>.fusion-column-wrapper {
                                margin-right: 1.92%;
                                margin-left: 1.92%;
                            }
                        }

                    </style>
                </div>
                <style type="text/css">
                    .fusion-body .fusion-flex-container.fusion-builder-row-3 {
                        padding-top: 25px;
                        margin-top: 0;
                        padding-right: 32px;
                        padding-bottom: 25px;
                        margin-bottom: 0;
                        padding-left: 32px;
                    }

                </style>
            </div>
            {{-- <div class="fusion-fullwidth fullwidth-box fusion-builder-row-4 fusion-flex-container nonhundred-percent-fullwidth non-hundred-percent-height-scrolling"
                style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;border-width: 0px 0px 0px 0px;border-color:rgba(0,0,0,0.08);border-style:solid;"> --}}
            <div class="fusion-builder-row fusion-row fusion-flex-align-items-flex-start"
                style="max-width:1372.8px;margin-left: calc(-4% / 2 );margin-right: calc(-4% / 2 );">

                <div
                    class="fusion-layout-column fusion_builder_column fusion-builder-column-8 fusion_builder_column_1_1 1_1 fusion-flex-column fusion-flex-align-self-center">
                    <div class="fusion-column-wrapper fusion-flex-justify-content-center fusion-content-layout-column"
                        style="background-position: left top; background-repeat: no-repeat; background-size: cover; padding: 0px; min-height: 0px;">
                        <style type="text/css">
                            @media only screen and (max-width:1024px) {
                                .fusion-title.fusion-title-2 {
                                    margin-top: 12px !important;
                                    margin-bottom: 24px !important;
                                }
                            }

                            @media only screen and (max-width:640px) {
                                .fusion-title.fusion-title-2 {
                                    margin-top: 12px !important;
                                    margin-bottom: 24px !important;
                                }
                            }

                        </style>

                    </div>
                </div>
                <style type="text/css">
                    .fusion-body .fusion-builder-column-8 {
                        width: 100% !important;
                        margin-top: 20px;
                        margin-bottom: 20px;
                    }

                    .fusion-builder-column-8>.fusion-column-wrapper {
                        padding-top: 0px !important;
                        padding-right: 0px !important;
                        margin-right: 1.92%;
                        padding-bottom: 0px !important;
                        padding-left: 0px !important;
                        margin-left: 1.92%;
                    }

                    @media only screen and (max-width:1024px) {
                        .fusion-body .fusion-builder-column-8 {
                            width: 100% !important;
                            order: 0;
                        }

                        .fusion-builder-column-8>.fusion-column-wrapper {
                            margin-right: 1.92%;
                            margin-left: 1.92%;
                        }
                    }

                    @media only screen and (max-width:640px) {
                        .fusion-body .fusion-builder-column-8 {
                            width: 100% !important;
                            order: 0;
                        }

                        .fusion-builder-column-8>.fusion-column-wrapper {
                            margin-right: 1.92%;
                            margin-left: 1.92%;
                        }
                    }

                </style>
            </div>
            <style type="text/css">
                .fusion-body .fusion-flex-container.fusion-builder-row-4 {
                    padding-top: 50px;
                    margin-top: 0px;
                    padding-right: 32px;
                    padding-bottom: 40px;
                    margin-bottom: 0px;
                    padding-left: 32px;
                }

            </style>
            {{-- </div> --}}

            <div class="fusion-fullwidth fullwidth-box fusion-builder-row-5 fusion-flex-container nonhundred-percent-fullwidth non-hundred-percent-height-scrolling"
                style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;border-width: 0px 0px 0px 0px;border-color:rgba(0,0,0,0.08);border-style:solid;">

                <div class="fusion-builder-row fusion-row fusion-flex-align-items-flex-start"
                    style="max-width:1372.8px;margin-left: calc(-4% / 2 );margin-right: calc(-4% / 2 );">
                    <div
                        class="fusion-layout-column fusion_builder_column fusion-builder-column-9 fusion_builder_column_1_5 1_5 fusion-flex-column">
                        <div class="fusion-column-wrapper fusion-flex-justify-content-flex-start fusion-content-layout-column"
                            style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;padding: 0px 0px 0px 0px;">
                        </div>
                    </div>
                    <style type="text/css">
                        .fusion-body .fusion-builder-column-9 {
                            width: 20% !important;
                            margin-top: 20px;
                            margin-bottom: 20px;
                        }

                        .fusion-builder-column-9>.fusion-column-wrapper {
                            padding-top: 0px !important;
                            padding-right: 0px !important;
                            margin-right: 9.6%;
                            padding-bottom: 0px !important;
                            padding-left: 0px !important;
                            margin-left: 9.6%;
                        }

                        @media only screen and (max-width:1024px) {
                            .fusion-body .fusion-builder-column-9 {
                                width: 20% !important;
                                order: 0;
                            }

                            .fusion-builder-column-9>.fusion-column-wrapper {
                                margin-right: 9.6%;
                                margin-left: 9.6%;
                            }
                        }

                        @media only screen and (max-width:640px) {
                            .fusion-body .fusion-builder-column-9 {
                                width: 100% !important;
                                order: 0;
                            }

                            .fusion-builder-column-9>.fusion-column-wrapper {
                                margin-right: 1.92%;
                                margin-left: 1.92%;
                            }
                        }

                    </style>
                    <div
                        class="fusion-layout-column fusion_builder_column fusion-builder-column-10 fusion_builder_column_3_5 3_5 fusion-flex-column">
                        <div class="fusion-column-wrapper fusion-flex-justify-content-flex-start fusion-content-layout-column"
                            style="background-position: left top; background-repeat: no-repeat; background-size: cover; padding: 0px; min-height: 0px;">
                            <div class="fusion-text fusion-text-1">
                                <link rel="stylesheet" property="stylesheet"
                                    href="https://mysalafispouse.com/wp-content/plugins/happyforms-upgrade/inc/assets/css/frontend/layout.css?ver=1.18.4">
                                <link rel="stylesheet" property="stylesheet"
                                    href="https://mysalafispouse.com/wp-content/plugins/happyforms-upgrade/inc/assets/css/frontend/color.css?ver=1.18.4">
                                <link rel="stylesheet" property="stylesheet"
                                    href="https://mysalafispouse.com/wp-content/plugins/happyforms-upgrade/inc/assets/css/frontend/poll.css?1.18.4">
                                <link rel="stylesheet" property="stylesheet"
                                    href="https://mysalafispouse.com/wp-content/plugins/happyforms-upgrade/integrations/assets/css/frontend/payments.css?1.18.4">
                                <!-- HappyForms CSS variables -->
                                <style>
                                    #happyforms-3443 {
                                        --happyforms-form-width: 100%;
                                        --happyforms-form-title-font-size: 32px;
                                        --happyforms-part-title-font-size: 16px;
                                        --happyforms-part-description-font-size: 14px;
                                        --happyforms-part-value-font-size: 16px;
                                        --happyforms-submit-button-font-size: 16px;
                                        --happyforms-color-primary: #000000;
                                        --happyforms-color-success-notice: #ebf9f0;
                                        --happyforms-color-success-notice-text: #1eb452;
                                        --happyforms-color-error: #f23000;
                                        --happyforms-color-error-notice: #ffeeea;
                                        --happyforms-color-error-notice-text: #f23000;
                                        --happyforms-color-part-title: #000000;
                                        --happyforms-color-part-value: #000000;
                                        --happyforms-color-part-placeholder: #888888;
                                        --happyforms-color-part-description: #454545;
                                        --happyforms-color-part-border: #dbdbdb;
                                        --happyforms-color-part-border-focus: #7aa4ff;
                                        --happyforms-color-part-background: #ffffff;
                                        --happyforms-color-part-background-focus: #ffffff;
                                        --happyforms-color-submit-background: #000000;
                                        --happyforms-color-submit-background-hover: #000000;
                                        --happyforms-color-submit-border: transparent;
                                        --happyforms-color-submit-text: #ffffff;
                                        --happyforms-color-submit-text-hover: #ffffff;
                                        --happyforms-color-rating: #cccccc;
                                        --happyforms-color-rating-hover: #ffbf00;
                                        --happyforms-color-table-row-odd: #fcfcfc;
                                        --happyforms-color-table-row-even: #efefef;
                                        --happyforms-color-table-row-odd-text: #000000;
                                        --happyforms-color-table-row-even-text: #000000;
                                        --happyforms-color-divider-hr: #cccccc;
                                        --happyforms-color-choice-checkmark-bg: #000000;
                                        --happyforms-color-choice-checkmark-bg-focus: #16bc00;
                                        --happyforms-color-choice-checkmark-color: #ffffff;
                                        --happyforms-color-dropdown-item-bg: #ffffff;
                                        --happyforms-color-dropdown-item-text: #000000;
                                        --happyforms-color-dropdown-item-bg-hover: #f4f4f5;
                                        --happyforms-color-dropdown-item-text-hover: #000000;
                                        --happyforms-color-progress-bar-primary: #e6e6e6;
                                        --happyforms-color-progress-bar-primary-bg: #ffffff;
                                        --happyforms-color-progress-bar-secondary: #000000;
                                        --happyforms-color-progress-bar-text-primary: #ABABAB;
                                        --happyforms-color-progress-bar-text-secondary: #ffffff;
                                        --happyforms-color-multistep-previous-background: #dfdfdf;
                                        --happyforms-color-multistep-previous-background-hover: #cdcdcd;
                                        --happyforms-color-multistep-previous-text: #000000;
                                        --happyforms-color-multistep-previous-text-hover: #000000;
                                        --happyforms-poll-bar-color: #e8e8e8;
                                        --happyforms-poll-link-color: #000000;
                                        --happyforms-poll-winner-color: #000000;
                                    }

                                </style>
                                <!-- End of HappyForms CSS variables -->
                                <div class="happyforms-form happyforms-styles happyforms-form--hide-title happyforms-form--submit-button-border-radius-pill happyforms-form--submit-button-fullwidth"
                                    id="happyforms-3443">
                                    <h3 class="happyforms-form__title fusion-responsive-typography-calculated"
                                        data-fontsize="32" data-lineheight="40.32px"
                                        style="--fontSize:32; line-height: 1.26;">Update</h3>
                                    <div class="happyforms-flex">
                                        @error('credentials')
                                        <div
                                            style="text-align: center;width:100%;background:#ffc4c4;color:red;padding:10px;border-radius:10px;">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                       

                                        
                                        <div class="happyforms-part--with-autocomplete happyforms-form__part happyforms-part happyforms-part--email happyforms-part--width-full happyforms-part--label-above"
                                            id="happyforms-3443_email_7-part" data-mode="autocomplete"
                                            data-happyforms-type="email" data-happyforms-id="email_7"
                                            data-happyforms-required="">
                                            <div class="happyforms-part-wrap">
                                                <div class="happyforms-part__label-container">
                                                    <label for="happyforms-3443_email_7" class="happyforms-part__label">
                                                        <span class="label">Your Ethnicity?</span>
                                                    </label>
                                                </div>
                                                <div class="happyforms-part__el">
                                                    <input {{ $balanceTotal == 0 ? 'disabled' : '' }} type="text"
                                                        wire:model.defer="ethnicity"
                                                        placeholder="This field is required">
                                                    <div class="happyforms-part-error-notice"
                                                        id="happyforms-error-3443_password_7">
                                                        @error('password')
                                                        <p style="color:red;">This field is required</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="happyforms-part--with-autocomplete happyforms-form__part happyforms-part happyforms-part--email happyforms-part--width-full happyforms-part--label-above"
                                            id="happyforms-3443_email_7-part" data-mode="autocomplete"
                                            data-happyforms-type="email" data-happyforms-id="email_7"
                                            data-happyforms-required="">
                                            <div class="happyforms-part-wrap">
                                                <div class="happyforms-part__label-container">
                                                    <label for="happyforms-3443_email_7" class="happyforms-part__label">
                                                        <span class="label">Your Residence?</span>
                                                    </label>
                                                </div>
                                                <div class="happyforms-part__el">
                                                    <input {{ $balanceTotal == 0 ? 'disabled' : '' }} type="email"
                                                        wire:model="residence" placeholder="This field is required">
                                                    <div class="happyforms-part-error-notice"
                                                        id="happyforms-error-3443_email_7">
                                                        @error('email')
                                                        <p style="color:red;">This field is required</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="happyforms-part--with-autocomplete happyforms-form__part happyforms-part happyforms-part--email happyforms-part--width-full happyforms-part--label-above"
                                            id="happyforms-3443_email_7-part" data-mode="autocomplete"
                                            data-happyforms-type="email" data-happyforms-id="email_7"
                                            data-happyforms-required="">
                                            <div class="happyforms-part-wrap">
                                                <div class="happyforms-part__label-container">
                                                    <label for="happyforms-3443_email_7" class="happyforms-part__label">
                                                        <span class="label">Your Age?</span>
                                                    </label>
                                                </div>
                                                <div class="happyforms-part__el">
                                                    <input {{ $balanceTotal == 0 ? 'disabled' : '' }} type="number"
                                                        wire:model.defer="age" placeholder="This field is required">
                                                    <div class="happyforms-part-error-notice"
                                                        id="happyforms-error-3443_password_7">
                                                        @error('password')
                                                        <p style="color:red;">This field is required</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="happyforms-part--with-autocomplete happyforms-form__part happyforms-part happyforms-part--email happyforms-part--width-full happyforms-part--label-above"
                                            id="happyforms-3443_email_7-part" data-mode="autocomplete"
                                            data-happyforms-type="email" data-happyforms-id="email_7"
                                            data-happyforms-required="">
                                            <div class="happyforms-part-wrap">
                                                <div class="happyforms-part__label-container">
                                                    <label for="happyforms-3443_email_7" class="happyforms-part__label">
                                                        <span class="label">Your Height?</span>
                                                    </label>
                                                </div>
                                                <div class="happyforms-part__el">
                                                    <input {{ $balanceTotal == 0 ? 'disabled' : '' }} type="text"
                                                        wire:model.defer="height" placeholder="This field is required">
                                                    <div class="happyforms-part-error-notice"
                                                        id="happyforms-error-3443_password_7">
                                                        @error('password')
                                                        <p style="color:red;">This field is required</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="happyforms-part--choice display-type--block happyforms-part-options-width--auto happyforms-form__part happyforms-part happyforms-part--radio happyforms-part--width-full happyforms-part--label-above"
                                            id="happyforms-3443_radio_10-part" data-happyforms-type="radio"
                                            data-happyforms-id="radio_10" data-happyforms-required="">
                                            <div class="happyforms-part-wrap">
                                                <div class="happyforms-part__label-container">
                                                    <label for="happyforms-3443_radio_10"
                                                        class="happyforms-part__label">
                                                        <span class="label">Type</span>
                                                    </label>
                                                </div>
                                                <div class="happyforms-part__el">
                                                    <div class="happyforms-part__option happyforms-part-option"
                                                        id="radio_10_option_1626839212225">
                                                        <label class="option-label">
                                                            <input {{ $balanceTotal == 0 ? 'disabled' : '' }}
                                                                value="UK Base" type="radio"
                                                                class="happyforms-visuallyhidden" wire:model="type">
                                                            <span class="checkmark"><span
                                                                    class="happyforms-radio-circle"></span></span>
                                                            <span class="label">UK Base</span>
                                                        </label>
                                                        <span class="happyforms-part-option__description"></span>
                                                    </div>
                                                    <div class="happyforms-part__option happyforms-part-option"
                                                        id="radio_10_option_1626839228076">
                                                        <label class="option-label">
                                                            <input {{ $balanceTotal == 0 ? 'disabled' : '' }}
                                                                value="International" type="radio"
                                                                class="happyforms-visuallyhidden" wire:model="type">
                                                            <span class="checkmark"><span
                                                                    class="happyforms-radio-circle"></span></span>
                                                            <span class="label">International</span>
                                                        </label>
                                                        <span class="happyforms-part-option__description"></span>
                                                    </div>
                                                    <div class="happyforms-part-error-notice"
                                                        id="happyforms-error-3443_email_7">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="happyforms-form__part happyforms-part happyforms-part--multi_line_text happyforms-part--width-full happyforms-part--label-above"
                                            id="happyforms-3443_multi_line_text_3-part"
                                            data-happyforms-type="multi_line_text"
                                            data-happyforms-id="multi_line_text_3" data-happyforms-required="">
                                            <div class="happyforms-part-wrap">
                                                <div class="happyforms-part__label-container">
                                                    <label for="happyforms-3443_multi_line_text_3"
                                                        class="happyforms-part__label">
                                                        <span class="label">A Brief Background About Yourself?</span>
                                                    </label>
                                                </div>
                                                <div class="happyforms-part__el">
                                                    <textarea placeholder="Please include facts about yourself like your education, job/occupation, your hobbies, your personality and any other important info." {{ $balanceTotal == 0 ? 'disabled' : '' }}
                                                        id="happyforms-3443_multi_line_text_3" wire:model="about"
                                                        rows="5" placeholder="This field is required"></textarea>
                                                    {{-- <span class="happyforms-part__description">Please include facts
                                                    about yourself like your education, job/occupation, your
                                                    hobbies, your personality and any other important
                                                    info.</span> --}}
                                                    <div class="happyforms-part-error-notice"
                                                        id="happyforms-error-3443_email_7">
                                                        @error('about')
                                                        <p style="color:red;">This field is required</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="happyforms-form__part happyforms-part happyforms-part--multi_line_text happyforms-part--width-full happyforms-part--label-above"
                                            id="happyforms-3443_multi_line_text_3-part"
                                            data-happyforms-type="multi_line_text"
                                            data-happyforms-id="multi_line_text_3" data-happyforms-required="">
                                            <div class="happyforms-part-wrap">
                                                <div class="happyforms-part__label-container">
                                                    <label for="happyforms-3443_multi_line_text_3"
                                                        class="happyforms-part__label">
                                                        <span class="label">What Are You Looking For In A Potential Spouse?</span>
                                                    </label>
                                                </div>
                                                <div class="happyforms-part__el">
                                                    <textarea {{ $balanceTotal == 0 ? 'disabled' : '' }}
                                                        id="happyforms-3443_multi_line_text_3"
                                                        wire:model="potential_spouse" rows="5"
                                                        placeholder="This field is required"></textarea>
                                                    {{-- <span class="happyforms-part__description">Please include facts
                                                    potential_spouse yourself like your education, job/occupation, your
                                                    hobbies, your personality and any other important
                                                    info.</span> --}}
                                                    <div class="happyforms-part-error-notice"
                                                        id="happyforms-error-3443_email_7">
                                                        @error('potential_spouse')
                                                        <p style="color:red;">This field is required</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="happyforms-form__part happyforms-part happyforms-part--multi_line_text happyforms-part--width-full happyforms-part--label-above"
                                            id="happyforms-3443_multi_line_text_3-part"
                                            data-happyforms-type="multi_line_text"
                                            data-happyforms-id="multi_line_text_3" data-happyforms-required="">
                                            <div class="happyforms-part-wrap">
                                                <div class="happyforms-part__label-container">
                                                    <label for="happyforms-3443_multi_line_text_3"
                                                        class="happyforms-part__label">
                                                        <span class="label">Any Other Information</span>
                                                    </label>
                                                </div>
                                                <div class="happyforms-part__el">
                                                    <textarea {{ $balanceTotal == 0 ? 'disabled' : '' }}
                                                        id="happyforms-3443_multi_line_text_3"
                                                        wire:model="any_other_information" rows="5"
                                                        placeholder="This field is required"></textarea>
                                                    {{-- <span class="happyforms-part__description">Please include facts
                                                any_other_information yourself like your education, job/occupation, your
                                                hobbies, your personality and any other important
                                                info.</span> --}}
                                                    <div class="happyforms-part-error-notice"
                                                        id="happyforms-error-3443_email_7">
                                                        @error('any_other_information')
                                                        <p style="color:red;">This field is required</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(Auth::user()->gender == 'Female')
                                        <div class="happyforms-form__part happyforms-part happyforms-part--multi_line_text happyforms-part--width-full happyforms-part--label-above"
                                        id="happyforms-3443_multi_line_text_3-part"
                                        data-happyforms-type="multi_line_text"
                                        data-happyforms-id="multi_line_text_3" data-happyforms-required="">
                                        <div class="happyforms-part-wrap">
                                            <div class="happyforms-part__label-container">
                                                <label for="happyforms-3443_multi_line_text_3"
                                                    class="happyforms-part__label">
                                                    <span class="label">Guardian</span>
                                                </label>
                                            </div>
                                            <div class="happyforms-part__el">
                                                <textarea {{ $balanceTotal == 0 ? 'disabled' : '' }}
                                                    id="happyforms-3443_multi_line_text_3"
                                                    wire:model="guardian" rows="5"
                                                    placeholder="This field is required"></textarea>
                                                {{-- <span class="happyforms-part__description">Please include facts
                                            any_other_information yourself like your education, job/occupation, your
                                            hobbies, your personality and any other important
                                            info.</span> --}}
                                                <div class="happyforms-part-error-notice"
                                                    id="happyforms-error-3443_email_7">
                                                    @error('any_other_information')
                                                    <p style="color:red;">This field is required</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                        <div class="happyforms-part--choice display-type--block happyforms-part-options-width--auto happyforms-form__part happyforms-part happyforms-part--checkbox happyforms-part--width-full happyforms-part--label-above"
                                            id="happyforms-3443_checkbox_9-part" data-happyforms-type="checkbox"
                                            data-happyforms-id="checkbox_9" data-happyforms-required="">
                                            <div class="happyforms-part-wrap">
                                                <div class="happyforms-part__label-container">
                                                    <label for="happyforms-3443_checkbox_9"
                                                        class="happyforms-part__label">
                                                        <span class="label">What Ulema (Scholars) Do You Listen To?</span>
                                                    </label>
                                                </div>
                                                <div class="happyforms-part__el">
                                                    <div class="happyforms-part__option happyforms-part-option"
                                                        id="checkbox_9_option_1626837466266">
                                                        <label class="option-label">
                                                            <input {{ $balanceTotal == 0 ? 'disabled' : '' }}
                                                                type="checkbox" value="Shaykh al-Albani"
                                                                class="happyforms-visuallyhidden happyforms-checkbox"
                                                                wire:model="scholar.0">
                                                            <span class="checkmark"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="12" viewBox="0 0 24 24">
                                                                    <path fill="currentColor"
                                                                        d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z">
                                                                    </path>
                                                                </svg></span>
                                                            <span class="label">Shaykh al-Albani</span>
                                                        </label>
                                                        <span class="happyforms-part-option__description"></span>
                                                    </div>
                                                    <div class="happyforms-part__option happyforms-part-option"
                                                        id="checkbox_9_option_1626837495814">
                                                        <label class="option-label">
                                                            <input {{ $balanceTotal == 0 ? 'disabled' : '' }}
                                                                wire:model="scholar.1" type="checkbox"
                                                                class="happyforms-visuallyhidden happyforms-checkbox"
                                                                value="Shaykh Ibn Bāz">
                                                            <span class="checkmark"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="12" viewBox="0 0 24 24">
                                                                    <path fill="currentColor"
                                                                        d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z">
                                                                    </path>
                                                                </svg></span>
                                                            <span class="label">Shaykh Ibn Bāz</span>
                                                        </label>
                                                        <span class="happyforms-part-option__description"></span>
                                                    </div>
                                                    <div class="happyforms-part__option happyforms-part-option"
                                                        id="checkbox_9_option_1626837542303">
                                                        <label class="option-label">
                                                            <input {{ $balanceTotal == 0 ? 'disabled' : '' }}
                                                                wire:model="scholar.2" type="checkbox"
                                                                class="happyforms-visuallyhidden happyforms-checkbox"
                                                                value="Shaykh Ibn Uthaymeen">
                                                            <span class="checkmark"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="12" viewBox="0 0 24 24">
                                                                    <path fill="currentColor"
                                                                        d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z">
                                                                    </path>
                                                                </svg></span>
                                                            <span class="label">Shaykh Ibn Uthaymeen</span>
                                                        </label>
                                                        <span class="happyforms-part-option__description"></span>
                                                    </div>
                                                    <div class="happyforms-part__option happyforms-part-option"
                                                        id="checkbox_9_option_1626837518309">
                                                        <label class="option-label">
                                                            <input {{ $balanceTotal == 0 ? 'disabled' : '' }}
                                                                wire:model="scholar.3" type="checkbox"
                                                                class="happyforms-visuallyhidden happyforms-checkbox"
                                                                value="Shaykh Salih al-Fawzan">
                                                            <span class="checkmark"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="12" viewBox="0 0 24 24">
                                                                    <path fill="currentColor"
                                                                        d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z">
                                                                    </path>
                                                                </svg></span>
                                                            <span class="label">Shaykh Salih al-Fawzan</span>
                                                        </label>
                                                        <span class="happyforms-part-option__description"></span>
                                                    </div>
                                                    <div class="happyforms-part__option happyforms-part-option"
                                                        id="checkbox_9_option_1626837568327">
                                                        <label class="option-label">
                                                            <input {{ $balanceTotal == 0 ? 'disabled' : '' }}
                                                                wire:model="scholar.4" type="checkbox"
                                                                class="happyforms-visuallyhidden happyforms-checkbox"
                                                                value="Imām Ibn Taymiyyah">
                                                            <span class="checkmark"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="12" viewBox="0 0 24 24">
                                                                    <path fill="currentColor"
                                                                        d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z">
                                                                    </path>
                                                                </svg></span>
                                                            <span class="label">Imām Ibn Taymiyyah</span>
                                                        </label>
                                                        <span class="happyforms-part-option__description"></span>
                                                    </div>
                                                    <div class="happyforms-part__option happyforms-part-option"
                                                        id="checkbox_9_option_1626837589110">
                                                        <label class="option-label">
                                                            <input {{ $balanceTotal == 0 ? 'disabled' : '' }}
                                                                wire:model="scholar.5" type="checkbox"
                                                                class="happyforms-visuallyhidden happyforms-checkbox"
                                                                value="Imām Ibn al Qayyim">
                                                            <span class="checkmark"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="12" viewBox="0 0 24 24">
                                                                    <path fill="currentColor"
                                                                        d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z">
                                                                    </path>
                                                                </svg></span>
                                                            <span class="label">Imām Ibn al Qayyim</span>
                                                        </label>
                                                        <span class="happyforms-part-option__description"></span>
                                                    </div>
                                                    <div class="happyforms-part__option happyforms-part-option"
                                                        id="checkbox_9_option_1626837616488">
                                                        <label class="option-label">
                                                            <input {{ $balanceTotal == 0 ? 'disabled' : '' }}
                                                                wire:model="scholar.6" type="checkbox"
                                                                class="happyforms-visuallyhidden happyforms-checkbox"
                                                                value="Shaykh Muhammad Ibn Abdul Wahāb">
                                                            <span class="checkmark"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="12" viewBox="0 0 24 24">
                                                                    <path fill="currentColor"
                                                                        d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z">
                                                                    </path>
                                                                </svg></span>
                                                            <span class="label">Shaykh Muhammad Ibn Abdul Wahāb</span>
                                                        </label>
                                                        <span class="happyforms-part-option__description"></span>
                                                    </div>
                                                    <div class="" id="checkbox_9_other">
                                                        <label class="option-label">
                                                            <input type="checkbox" class="happyforms-visuallyhidden"
                                                                wire:model="chk">
                                                            <span class="checkmark"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="12" viewBox="0 0 24 24">
                                                                    <path fill="currentColor"
                                                                        d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z">
                                                                    </path>
                                                                </svg></span>
                                                            <span class="label"
                                                                id="hf-label-3443_checkbox_9">Other</span>
                                                        </label>
                                                        @if($chk)
                                                        <input type="text" wire:model="other_scholars"
                                                            placeholder="Please kindly name other scholars you listen to">
                                                    </div>
                                                    @error('other_scholars')
                                                    <p style="color:red;">This field is required</p>
                                                    @enderror
                                                    @endif
                                                </div>
                                            </div>


                                        </div>

                                        <div class="happyforms-form__part happyforms-part happyforms-part--submit">
                                            <button wire:click="update"
                                                style="padding: 15px 30px;1px solid transparent;ont-size: var(--happyforms-submit-button-font-size);color:white;background:#02427d;width:100%;border-radius: 47px;"
                                                type="submit"
                                                class="happyforms-submit happyforms-button--submit devsite">UPDATE MY PROFILE!
                                            </button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <style type="text/css">
                        .fusion-body .fusion-builder-column-10 {
                            width: 60% !important;
                            margin-top: 20px;
                            margin-bottom: 20px;
                        }

                        .fusion-builder-column-10>.fusion-column-wrapper {
                            padding-top: 0px !important;
                            padding-right: 0px !important;
                            margin-right: 3.2%;
                            padding-bottom: 0px !important;
                            padding-left: 0px !important;
                            margin-left: 3.2%;
                        }

                        @media only screen and (max-width:1024px) {
                            .fusion-body .fusion-builder-column-10 {
                                width: 60% !important;
                                order: 0;
                            }

                            .fusion-builder-column-10>.fusion-column-wrapper {
                                margin-right: 3.2%;
                                margin-left: 3.2%;
                            }
                        }

                        @media only screen and (max-width:640px) {
                            .fusion-body .fusion-builder-column-10 {
                                width: 100% !important;
                                order: 0;
                            }

                            .fusion-builder-column-10>.fusion-column-wrapper {
                                margin-right: 1.92%;
                                margin-left: 1.92%;
                            }
                        }

                    </style>

                    <style type="text/css">
                        .fusion-body .fusion-builder-column-11 {
                            width: 20% !important;
                            margin-top: 20px;
                            margin-bottom: 20px;
                        }

                        .fusion-builder-column-11>.fusion-column-wrapper {
                            padding-top: 0px !important;
                            padding-right: 0px !important;
                            margin-right: 9.6%;
                            padding-bottom: 0px !important;
                            padding-left: 0px !important;
                            margin-left: 9.6%;
                        }

                        @media only screen and (max-width:1024px) {
                            .fusion-body .fusion-builder-column-11 {
                                width: 20% !important;
                                order: 0;
                            }

                            .fusion-builder-column-11>.fusion-column-wrapper {
                                margin-right: 9.6%;
                                margin-left: 9.6%;
                            }
                        }

                        @media only screen and (max-width:640px) {
                            .fusion-body .fusion-builder-column-11 {
                                width: 100% !important;
                                order: 0;
                            }

                            .fusion-builder-column-11>.fusion-column-wrapper {
                                margin-right: 1.92%;
                                margin-left: 1.92%;
                            }
                        }

                    </style>
                </div>
                <style type="text/css">
                    .fusion-body .fusion-flex-container.fusion-builder-row-5 {
                        padding-top: 0px;
                        margin-top: 0px;
                        padding-right: 32px;
                        padding-bottom: 0px;
                        margin-bottom: 0px;
                        padding-left: 32px;
                    }

                </style>
            </div>
        </div>
    </div>
</section>
