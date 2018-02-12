@extends('layouts.main')

@section('nav_providers')
    current_section
@endsection

@section('breadcrumbs')
    <div id="top_bar">
        <ul id="breadcrumbs">
            <li><a href="{{ route('providers.index') }}">Providers</a></li>
            <li><a href="{{ route('providers.show', $provider->id) }}">{{ $provider->name }}</a></li>
            <li><span>Edit</span></li>
        </ul>
    </div>
@endsection

@section('page-content')
    <h4 class="heading_b uk-margin-bottom">Providers</h4>
    @if ($errors->any())
        <div class="uk-alert uk-alert-danger" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            @foreach ($errors->all() as $error)
                <span> &nbsp;&nbsp;- {{ $error }}</span><br>
            @endforeach
            <span> &nbsp;&nbsp; Note: If you attach a sign-off document, re-attach the file again before submtiting.</span>
        </div>
    @endif
    <div class="md-card" style="padding: 20px;">
        <div class="md-card-content">
            <h2 class="heading_a">
                Enrollment Form
                <span class="sub-heading">Fill up all the required fields and click submit</span>
            </h2>
            <hr class="md-hr"/>
            <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#tabs_anim2', animation:'slide-horizontal'}">
                <li class="uk-active"><a href="#">Information</a></li>
                <li class="uk-width-1-6"><a href="#">Payment</a></li>
                <li class="uk-width-1-6"><a href="#">Contact Persons</a></li>
                <li class="uk-width-1-6"><a href="#">Others</a></li>
            </ul>
            <form action="{{ route('providers.update', $provider->id) }}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <ul id="tabs_anim2" class="uk-switcher uk-margin">
                    {{-- START INFORMATION TAB --}}
                    <li>
                        <div class="md-card-content">
                            <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Business Details</h3>
                            <div class="uk-grid">
                                <div class="uk-width-medium-2-3 ">
                                    <label>Name<span class="req">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') ?: $provider->name }}" required class="md-input {{ $errors->has('name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-medium-1-3 ">
                                    <label>Short Name</label>
                                    <input type="text" name="short_name" value="{{ old('short_name') ?: $provider->short_name }}" class="md-input {{ $errors->has('short_name') ? ' md-input-danger' : '' }}"/>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-1 ">
                                    <label>Licensed Name</label>
                                    <input type="text" name="licensed_name" value="{{ old('licensed_name') ?: $provider->licensed_name }}" class="md-input {{ $errors->has('licensed_name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('licensed_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('licensed_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-3">
                                    <select data-md-selectize name="business_type" class="{{ $errors->has('business_type') ? ' md-input-danger' : '' }}"  data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Business Type">
                                        <option value="">Business Type*...</option>
                                        @if (old('business_type'))
                                            <option value="hospital" @if(old('business_type') == 'hospital') selected @endif>Hospital</option>
                                            <option value="clinic" @if(old('business_type') == 'clinic') selected @endif>Clinic</option>
                                        @else
                                            <option value="hospital" @if($provider->business_type == 'hospital') selected @endif>Hospital</option>
                                            <option value="clinic" @if($provider->business_type == 'clinic') selected @endif>Clinic</option>
                                        @endif

                                    </select>
                                    @if ($errors->has('business_type'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('business_type') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <label>Business Hours</label>
                                    <input type="text" name="business_hours" value="{{ old('business_hours') ?: $provider->business_hours }}" class="md-input {{ $errors->has('business_hours') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('business_hours'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('business_hours') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <label>Number of Beds</label>
                                    <input type="number" name="number_of_beds" value="{{ old('number_of_beds') ?: $provider->number_of_beds }}" class="md-input {{ $errors->has('number_of_beds') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('number_of_beds'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('number_of_beds') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-2-4">
                                    <label>Tax Identification Number</label>
                                    <input type="text" name="tin" value="{{ old('tin') ?: $provider->tin }}" class="md-input {{ $errors->has('tin') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('tin'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('tin') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-medium-1-4">
                                    <p class="uk-margin-small-top">
                                        @if ($errors->any())
                                            <input type="checkbox" name="tax_exempt" value="1" id="check_tax_exempt" data-md-icheck @if (old('tax_exempt')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="tax_exempt" value="1" id="check_tax_exempt" data-md-icheck @if ($provider->tax_exempt) checked @endif/>
                                        @endif
                                        <label for="check_tax_exempt" class="inline-label">Tax Exempt</label>
                                    </p>
                                </div>
                                <div class="uk-width-medium-1-4">
                                    <p class="uk-margin-small-top">
                                        @if ($errors->any())
                                            <input type="checkbox" name="withheld" value="1" id="check_withheld" data-md-icheck @if (old('withheld')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="withheld" value="1" id="check_withheld" data-md-icheck @if ($provider->withheld) checked @endif/>
                                        @endif
                                        <label for="check_withheld" class="inline-label">Withheld</label>
                                    </p>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-1">
                                    <select data-md-selectize name="accreditation_status" class="{{ $errors->has('accreditation_status') ? ' md-input-danger' : '' }}"  data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Accreditation Status">
                                        <option value="">Accreditation Status*...</option>
                                        @if (old('accreditation_status'))
                                            <option value="accredited" @if(old('accreditation_status') == 'accredited') selected @endif>Accredited</option>
                                            <option value="non-accredited" @if(old('accreditation_status') == 'non-accredited') selected @endif>Non-Accredited</option>
                                        @else
                                            <option value="accredited" @if($provider->accreditation_status == 'accredited') selected @endif>Accredited</option>
                                            <option value="non-accredited" @if($provider->accreditation_status == 'non-accredited') selected @endif>Non-Accredited</option>
                                        @endif

                                    </select>
                                    @if ($errors->has('accreditation_status'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('accreditation_status') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-medium-top">
                                <div class="uk-width-medium-1-2">
                                    <p>
                                        @if ($errors->any())
                                            <input type="checkbox" name="top_hospital" value="1" id="check_top_hospital" data-md-icheck @if(old('top_hospital')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="top_hospital" value="1" id="check_top_hospital" data-md-icheck @if($provider->top_hospital) checked @endif/>
                                        @endif
                                        <label for="check_top_hospital" class="inline-label">Top Hospital <i class="material-icons" title="All Corporate Accounts will have no access to this provider by default unless explicitly specified.">&#xE887;</i></label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="checkbox" name="suspected_fraud" value="1" id="check_suspected_fraud" data-md-icheck @if(old('suspected_fraud')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="suspected_fraud" value="1" id="check_suspected_fraud" data-md-icheck @if($provider->suspected_fraud) checked @endif/>
                                        @endif

                                        <label for="check_suspected_fraud" class="inline-label">Suspected Fraud <i class="material-icons" title="All transactions made with this provider will be rejected by the system. Previous transactions are not affected.">&#xE887;</i></label>
                                    </p>
                                </div>
                            </div>
                            <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Bank Details</h3>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <label>Account Name</label>
                                    <input type="text" name="bank_account_name" value="{{ old('bank_account_name') ?: $provider->bank_account_name }}" class="md-input {{ $errors->has('bank_account_name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('bank_account_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('bank_account_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <label>Account Number</label>
                                    <input type="text" name="bank_account_no" value="{{ old('bank_account_no') ?: $provider->bank_account_no }}" class="md-input {{ $errors->has('bank_account_no') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('bank_account_no'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('bank_account_no') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <label>Bank Name</label>
                                    <input type="text" name="bank_name" value="{{ old('bank_name') ?: $provider->bank_name }}" class="md-input {{ $errors->has('bank_name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('bank_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('bank_name') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-2">
                                    <label>Bank Branch</label>
                                    <input type="text" name="bank_branch" value="{{ old('bank_branch') ?: $provider->bank_branch }}" class="md-input {{ $errors->has('bank_branch') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('bank_branch'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('bank_branch') }}</span>
                                    @endif
                                </div>
                            </div>
                            <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">PHIC Accreditation</h3>
                            <div class="uk-grid">
                                <div class="uk-width-large-1-2 uk-width-1-1">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <label for="dp_phic_accreditation_from">Start Date</label>
                                        <input class="md-input" type="text" name="phic_accreditation_from" value="{{ old('phic_accreditation_from') ?: optional($provider->phic_accreditation_from)->format('Y-m-d') }}" id="dp_phic_accreditation_from">
                                    </div>
                                </div>
                                <div class="uk-width-large-1-2 uk-width-medium-1-1">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <label for="dp_phic_accreditation_to">End Date</label>
                                        <input class="md-input" type="text" name="phic_accreditation_to" value="{{ old('phic_accreditation_to') ?: optional($provider->phic_accreditation_to)->format('Y-m-d') }}" id="dp_phic_accreditation_to">
                                    </div>
                                </div>
                            </div>
                            <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Address</h3>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-1">
                                    <div class="uk-form-row">
                                        <label>Complete Business Address</label>
                                        <textarea cols="30" rows="4" name="address" class="md-input">{{ old('address') ?: $provider->address }}</textarea> </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- END INFORMATION TAB --}}

                    {{-- START PAYMENT --}}
                    <li>
                        <div class="md-card-content">
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <h3 class="heading_c"><u>Payment Setup</u> </h3>
                                    <p>
                                        @if ($errors->any())
                                            <input type="radio" name="payment_setup" value="blanket" id="radio_payment_setup_blanket" data-md-icheck @if(old('payment_setup') == 'blanket') checked @endif/>
                                        @else
                                            <input type="radio" name="payment_setup" value="blanket" id="radio_payment_setup_blanket" data-md-icheck @if($provider->payment_setup == 'blanket') checked @endif/>
                                        @endif
                                        <label for="radio_payment_setup_blanket" class="inline-label">Blanket</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="radio" name="payment_setup" value="non-blanket" id="radio_payment_setup_non_blanket" data-md-icheck @if(old('payment_setup') == 'non-blanket') checked @endif/>
                                        @else
                                            <input type="radio" name="payment_setup" value="non-blanket" id="radio_payment_setup_non_blanket" data-md-icheck @if($provider->payment_setup == 'non-blanket') checked @endif/>
                                        @endif
                                        <label for="radio_payment_setup_non_blanket" class="inline-label">Non-Blanket</label>
                                    </p>
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-medium-top">
                                <div class="uk-width-1-2">
                                    <h3 class="heading_c"><u>Payment Terms</u> </h3>
                                    <p>
                                        @if ($errors->any())
                                            <input type="radio" name="payment_terms" value="15" id="radio_payment_terms_15" data-md-icheck @if(old('payment_terms') == 15) checked @endif/>
                                        @else
                                            <input type="radio" name="payment_terms" value="15" id="radio_payment_terms_15" data-md-icheck @if($provider->payment_terms == 15) checked @endif/>
                                        @endif
                                        <label for="radio_payment_terms_15" class="inline-label">15 Days</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="radio" name="payment_terms" value="10" id="radio_payment_terms_10" data-md-icheck @if(old('payment_terms') == 10) checked @endif/>
                                        @else
                                            <input type="radio" name="payment_terms" value="10" id="radio_payment_terms_10" data-md-icheck @if($provider->payment_terms == 10) checked @endif/>
                                        @endif
                                        <label for="radio_payment_terms_10" class="inline-label">10 Days</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="radio" name="payment_terms" value="7" id="radio_payment_terms_7" data-md-icheck @if(old('payment_terms') == 7) checked @endif/>
                                        @else
                                            <input type="radio" name="payment_terms" value="7" id="radio_payment_terms_7" data-md-icheck @if($provider->payment_terms == 7) checked @endif/>
                                        @endif

                                        <label for="radio_payment_terms_7" class="inline-label">7 Days</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="radio" name="payment_terms" value="3" id="radio_payment_terms_3" data-md-icheck @if(old('payment_terms') == 3) checked @endif/>
                                        @else
                                            <input type="radio" name="payment_terms" value="3" id="radio_payment_terms_3" data-md-icheck @if($provider->payment_terms == 3) checked @endif/>
                                        @endif
                                        <label for="radio_payment_terms_3" class="inline-label">3 Days</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="radio" name="payment_terms" value="1" id="radio_payment_terms_1" data-md-icheck @if(old('payment_terms') == 1) checked @endif/>
                                        @else
                                            <input type="radio" name="payment_terms" value="1" id="radio_payment_terms_1" data-md-icheck @if($provider->payment_terms == 1) checked @endif/>
                                        @endif
                                        <label for="radio_payment_terms_1" class="inline-label">24 Hours</label>
                                    </p>
                                </div>
                                <div class="uk-width-1-2">
                                    <h3 class="heading_c"><u>Submission of Claims</u> </h3>
                                    <p>
                                        @if ($errors->any())
                                            <input type="radio" name="submission_of_claims" value="90" id="radio_submission_of_claims_90" data-md-icheck @if(old('submission_of_claims') == 90) checked @endif/>
                                        @else
                                            <input type="radio" name="submission_of_claims" value="90" id="radio_submission_of_claims_90" data-md-icheck @if($provider->submission_of_claims == 90) checked @endif/>
                                        @endif
                                        <label for="radio_submission_of_claims_90" class="inline-label">90 Days</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="radio" name="submission_of_claims" value="60" id="radio_submission_of_claims_60" data-md-icheck @if(old('submission_of_claims') == 60) checked @endif/>
                                        @else
                                            <input type="radio" name="submission_of_claims" value="60" id="radio_submission_of_claims_60" data-md-icheck @if($provider->submission_of_claims == 60) checked @endif/>
                                        @endif
                                        <label for="radio_submission_of_claims_60" class="inline-label">60 Days</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="radio" name="submission_of_claims" value="30" id="radio_submission_of_claims_30" data-md-icheck @if(old('submission_of_claims') == 30) checked @endif/>
                                        @else
                                            <input type="radio" name="submission_of_claims" value="30" id="radio_submission_of_claims_30" data-md-icheck @if($provider->submission_of_claims == 30) checked @endif/>
                                        @endif
                                        <label for="radio_submission_of_claims_30" class="inline-label">30 Days</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="radio" name="submission_of_claims" value="15" id="radio_submission_of_claims_15" data-md-icheck @if(old('submission_of_claims') == 15) checked @endif/>
                                        @else
                                            <input type="radio" name="submission_of_claims" value="15" id="radio_submission_of_claims_15" data-md-icheck @if($provider->submission_of_claims == 15) checked @endif/>
                                        @endif
                                        <label for="radio_submission_of_claims_15" class="inline-label">15 Days</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="radio" name="submission_of_claims" value="7" id="radio_submission_of_claims_7" data-md-icheck @if(old('submission_of_claims') == 7) checked @endif/>
                                        @else
                                            <input type="radio" name="submission_of_claims" value="7" id="radio_submission_of_claims_7" data-md-icheck @if($provider->submission_of_claims == 7) checked @endif/>
                                        @endif
                                        <label for="radio_submission_of_claims_7" class="inline-label">7 Days</label>
                                    </p>
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-medium-top">
                                <div class="uk-width-1-1">
                                    <label for="masked_cashbond">Cash Bond</label>
                                    <input class="md-input masked_input" name="cash_bond" value="{{ old('cash_bond') ?: $provider->cash_bond }}" id="masked_cash_bond" type="text" data-inputmask="'alias': 'currency', 'groucashpSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                    @if ($errors->has('cash_bond'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('cash_bond') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <label for="masked_cashbond">Credit Limit</label>
                                    <input class="md-input masked_input" name="credit_limit" value="{{ old('credit_limit') ?: $provider->credit_limit }}" id="masked_credit_limit" type="text" data-inputmask="'alias': 'currency', 'groucashpSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                    @if ($errors->has('credit_limit'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('credit_limit') }}</span>
                                    @endif
                                </div>
                            </div>
                            <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Prompt Payment</h3>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <p>
                                        @if ($errors->any())
                                            <input type="checkbox" name="prompt_payment_discount" value="1" id="check_prompt_payment_discount" data-md-icheck @if(old('prompt_payment_discount') == 1) checked @endif/>
                                        @else
                                            <input type="checkbox" name="prompt_payment_discount" value="1" id="check_prompt_payment_discount" data-md-icheck @if($provider->prompt_payment_discount == 1) checked @endif/>
                                        @endif
                                        <label for="check_prompt_payment_discount" class="inline-label">Allow Prompt Payment Discount</label>
                                    </p>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <label for="masked_prompt_payment_discount_rate">Prompt Payment Discount Rate (0.5%- 20%)</label>
                                    <input class="md-input masked_input {{ $errors->has('prompt_payment_discount_rate') ? ' md-input-danger' : '' }}"
                                        @if ($errors->any())
                                            @if(! old('prompt_payment_discount')) disabled @endif
                                        @else
                                            @if (! $provider->prompt_payment_discount) disabled @endif
                                        @endif
                                        name="prompt_payment_discount_rate" value="{{ old('prompt_payment_discount_rate') ?: $provider->prompt_payment_discount_rate }}" id="masked_prompt_payment_discount_rate" type="text"
                                        data-inputmask="'alias': 'currency', 'prefix': '', 'suffix': ' %' " data-inputmask-showmaskonhover="false" />
                                    @if ($errors->has('prompt_payment_discount_rate'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('prompt_payment_discount_rate') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-2">
                                    <span class="icheck-inline uk-margin-small-top">
                                        @if ($errors->any())
                                            <input type="radio" name="prompt_payment_discount_terms" value="outright" id="radio_prompt_payment_discount_terms_outright" @if(! old('prompt_payment_discount')) disabled @endif data-md-icheck @if(old('prompt_payment_discount_terms') == 'outright') checked @endif/>
                                        @else
                                            <input type="radio" name="prompt_payment_discount_terms" value="outright" id="radio_prompt_payment_discount_terms_outright" @if (! $provider->prompt_payment_discount) disabled @endif data-md-icheck @if($provider->prompt_payment_discount_terms == 'outright') checked @endif/>
                                        @endif
                                        <label for="radio_prompt_payment_discount_terms_outright" class="inline-label">Outright</label>
                                    </span>
                                    <span class="icheck-inline">
                                        @if ($errors->any())
                                            <input type="radio" name="prompt_payment_discount_terms" value="rebate" id="radio_prompt_payment_discount_terms_rebate" @if(! old('prompt_payment_discount')) disabled @endif data-md-icheck @if(old('prompt_payment_discount_terms') == 'rebate') checked @endif/>
                                        @else
                                            <input type="radio" name="prompt_payment_discount_terms" value="rebate" id="radio_prompt_payment_discount_terms_rebate" @if(! $provider->prompt_payment_discount) disabled @endif data-md-icheck @if($provider->prompt_payment_discount_terms == 'rebate') checked @endif/>
                                        @endif
                                        <label for="radio_prompt_payment_discount_terms_rebate" class="inline-label">Rebate</label>
                                    </span>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <label for="masked_late_payment_interest">Late Payment Interest</label>
                                    <input class="md-input masked_input {{ $errors->has('late_payment_interest') ? ' md-input-danger' : '' }}"
                                        name="late_payment_interest" value="{{ old('late_payment_interest') ?: $provider->late_payment_interest }}" id="masked_late_payment_interest" type="text"
                                        data-inputmask="'alias': 'currency', 'prefix': '', 'suffix': ' %' " data-inputmask-showmaskonhover="false" />
                                    @if ($errors->has('late_payment_interest'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('late_payment_interest') }}</span>
                                    @endif
                                </div>
                            </div>

                            <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Provider Setup</h3>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <h3 class="heading_c uk-margin-small-bottom"><u>In-patient / OPD-OR</u></h3>

                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            @if ($errors->any())
                                                <input id="check_ip_opd_or_whole" type="checkbox" name="ip_opd_or_whole" value="1" @if(old('ip_opd_or_whole')) checked @endif data-md-icheck/>
                                            @else
                                                <input id="check_ip_opd_or_whole" type="checkbox" name="ip_opd_or_whole" value="1" @if($provider->ip_opd_or_whole) checked @endif data-md-icheck/>
                                            @endif
                                            <label for="check_ip_opd_or_whole" class="inline-label">Whole</label>
                                        </span>
                                        <select id="select_ip_opd_or_whole_through" data-md-selectize name="ip_opd_or_whole_through" class= "{{ $errors->has('ip_opd_or_whole_through') ? ' md-input-danger' : '' }}">
                                            <option value="">Through...</option>
                                            @if ($errors->any())
                                                <option value="bank deposit" @if(old('ip_opd_or_whole_through') == 'bank deposit') selected @endif>Bank Deposit</option>
                                                <option value="check pick-up" @if(old('ip_opd_or_whole_through') == 'check pick-up') selected @endif>Check Pick-up</option>
                                                <option value="check delivery" @if(old('ip_opd_or_whole_through') == 'check delivery') selected @endif>Check Delivery</option>
                                                <option value="auto credit" @if(old('ip_opd_or_whole_through') == 'auto credit') selected @endif>Auto Credit</option>
                                            @else
                                                <option value="bank deposit" @if($provider->ip_opd_or_whole_through == 'bank deposit') selected @endif>Bank Deposit</option>
                                                <option value="check pick-up" @if($provider->ip_opd_or_whole_through == 'check pick-up') selected @endif>Check Pick-up</option>
                                                <option value="check delivery" @if($provider->ip_opd_or_whole_through == 'check delivery') selected @endif>Check Delivery</option>
                                                <option value="auto credit" @if($provider->ip_opd_or_whole_through == 'auto credit') selected @endif>Auto Credit</option>
                                            @endif
                                        </select>
                                    </div>

                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            @if ($errors->any())
                                                <input id="check_ip_opd_or_split_hb_hospital" type="checkbox" name="ip_opd_or_split_hb_hospital" value="1" @if(old('ip_opd_or_split_hb_hospital')) checked @endif data-md-icheck/>
                                            @else
                                                <input id="check_ip_opd_or_split_hb_hospital" type="checkbox" name="ip_opd_or_split_hb_hospital" value="1" @if($provider->ip_opd_or_split_hb_hospital) checked @endif data-md-icheck/>
                                            @endif
                                            <label for="check_ip_opd_or_split_hb_hospital" class="inline-label">Split - HB to Hospital</label>
                                        </span>
                                        <select data-md-selectize name="ip_opd_or_split_hb_hospital_through" class="{{ $errors->has('ip_opd_or_split_hb_hospital_through') ? ' md-input-danger' : '' }}">
                                            <option value="">Through...</option>
                                            @if ($errors->any())
                                                <option value="bank deposit" @if(old('ip_opd_or_split_hb_hospital_through') == 'bank deposit') selected @endif>Bank Deposit</option>
                                                <option value="check pick-up" @if(old('ip_opd_or_split_hb_hospital_through') == 'check pick-up') selected @endif>Check Pick-up</option>
                                                <option value="check delivery" @if(old('ip_opd_or_split_hb_hospital_through') == 'check delivery') selected @endif>Check Delivery</option>
                                                <option value="auto credit" @if(old('ip_opd_or_split_hb_hospital_through') == 'auto credit') selected @endif>Auto Credit</option>
                                            @else
                                                <option value="bank deposit" @if($provider->ip_opd_or_split_hb_hospital_through == 'bank deposit') selected @endif>Bank Deposit</option>
                                                <option value="check pick-up" @if($provider->ip_opd_or_split_hb_hospital_through == 'check pick-up') selected @endif>Check Pick-up</option>
                                                <option value="check delivery" @if($provider->ip_opd_or_split_hb_hospital_through == 'check delivery') selected @endif>Check Delivery</option>
                                                <option value="auto credit" @if($provider->ip_opd_or_split_hb_hospital_through == 'auto credit') selected @endif>Auto Credit</option>
                                            @endif
                                        </select>
                                    </div>

                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            @if ($errors->any())
                                                <input id="check_ip_opd_or_split_pf_doctor" type="checkbox" name="ip_opd_or_split_pf_doctor" value="1" @if(old('ip_opd_or_split_pf_doctor')) checked @endif data-md-icheck/>
                                            @else
                                                <input id="check_ip_opd_or_split_pf_doctor" type="checkbox" name="ip_opd_or_split_pf_doctor" value="1" @if($provider->ip_opd_or_split_pf_doctor) checked @endif data-md-icheck/>
                                            @endif
                                            <label for="check_ip_opd_or_split_pf_doctor" class="inline-label">Split - PF to Doctor</label>
                                        </span>
                                        <select data-md-selectize name="ip_opd_or_split_pf_doctor_through" class="{{ $errors->has('ip_opd_or_split_pf_doctor_through') ? ' md-input-danger' : '' }}">
                                            <option value="">Through...</option>
                                            @if ($errors->any())
                                                <option value="bank deposit" @if(old('ip_opd_or_split_pf_doctor_through') == 'bank deposit') selected @endif>Bank Deposit</option>
                                                <option value="check pick-up" @if(old('ip_opd_or_split_pf_doctor_through') == 'check pick-up') selected @endif>Check Pick-up</option>
                                                <option value="check delivery" @if(old('ip_opd_or_split_pf_doctor_through') == 'check delivery') selected @endif>Check Delivery</option>
                                            @else
                                                <option value="bank deposit" @if($provider->ip_opd_or_split_pf_doctor_through == 'bank deposit') selected @endif>Bank Deposit</option>
                                                <option value="check pick-up" @if($provider->ip_opd_or_split_pf_doctor_through == 'check pick-up') selected @endif>Check Pick-up</option>
                                                <option value="check delivery" @if($provider->ip_opd_or_split_pf_doctor_through == 'check delivery') selected @endif>Check Delivery</option>
                                            @endif
                                        </select>
                                    </div>

                                </div>
                                <div class="uk-width-1-2">
                                    <h3 class="heading_c uk-margin-small-bottom"><u>Emergency</u></h3>

                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            <label class="inline-label">Paid to Hospital</label>
                                        </span>
                                        <select data-md-selectize name="emergency_paid_to_hospital_through" class="{{ $errors->has('emergency_paid_to_hospital_through') ? ' md-input-danger' : '' }}">
                                            <option value="">Through...</option>
                                            @if ($errors->any())
                                                <option value="bank deposit" @if(old('emergency_paid_to_hospital_through') == 'bank deposit') selected @endif>Bank Deposit</option>
                                                <option value="check pick-up" @if(old('emergency_paid_to_hospital_through') == 'check pick-up') selected @endif>Check Pick-up</option>
                                                <option value="check delivery" @if(old('emergency_paid_to_hospital_through') == 'check delivery') selected @endif>Check Delivery</option>
                                                <option value="auto credit" @if(old('emergency_paid_to_hospital_through') == 'auto credit') selected @endif>Auto Credit</option>
                                            @else
                                                <option value="bank deposit" @if($provider->emergency_paid_to_hospital_through == 'bank deposit') selected @endif>Bank Deposit</option>
                                                <option value="check pick-up" @if($provider->emergency_paid_to_hospital_through == 'check pick-up') selected @endif>Check Pick-up</option>
                                                <option value="check delivery" @if($provider->emergency_paid_to_hospital_through == 'check delivery') selected @endif>Check Delivery</option>
                                                <option value="auto credit" @if($provider->emergency_paid_to_hospital_through == 'auto credit') selected @endif>Auto Credit</option>
                                            @endif
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <h3 class="heading_c uk-margin-small-bottom"><u>OP-Consult/Referral</u></h3>

                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            @if ($errors->any())
                                                <input id="check_op_consult_referral_paid_to_hospital" type="checkbox" name="op_consult_referral_paid_to_hospital" value="1" @if(old('op_consult_referral_paid_to_hospital')) checked @endif data-md-icheck/>
                                            @else
                                                <input id="check_op_consult_referral_paid_to_hospital" type="checkbox" name="op_consult_referral_paid_to_hospital" value="1" @if($provider->op_consult_referral_paid_to_hospital) checked @endif data-md-icheck/>
                                            @endif
                                            <label for="check_op_consult_referral_paid_to_hospital" class="inline-label">Paid to Hospital</label>
                                        </span>
                                        <select data-md-selectize name="op_consult_referral_paid_to_hospital_through" class="{{ $errors->has('op_consult_referral_paid_to_hospital_through') ? ' md-input-danger' : '' }}">
                                            <option value="">Through...</option>
                                            @if ($errors->any())
                                                <option value="bank deposit" @if(old('op_consult_referral_paid_to_hospital_through') == 'bank deposit') selected @endif>Bank Deposit</option>
                                                <option value="check pick-up" @if(old('op_consult_referral_paid_to_hospital_through') == 'check pick-up') selected @endif>Check Pick-up</option>
                                                <option value="check delivery" @if(old('op_consult_referral_paid_to_hospital_through') == 'check delivery') selected @endif>Check Delivery</option>
                                                <option value="auto credit" @if(old('op_consult_referral_paid_to_hospital_through') == 'auto credit') selected @endif>Auto Credit</option>
                                            @else
                                                <option value="bank deposit" @if($provider->op_consult_referral_paid_to_hospital_through == 'bank deposit') selected @endif>Bank Deposit</option>
                                                <option value="check pick-up" @if($provider->op_consult_referral_paid_to_hospital_through == 'check pick-up') selected @endif>Check Pick-up</option>
                                                <option value="check delivery" @if($provider->op_consult_referral_paid_to_hospital_through == 'check delivery') selected @endif>Check Delivery</option>
                                                <option value="auto credit" @if($provider->op_consult_referral_paid_to_hospital_through == 'auto credit') selected @endif>Auto Credit</option>
                                            @endif
                                        </select>
                                    </div>

                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            @if ($errors->any())
                                                <input id="check_op_consult_referral_paid_to_doctor" type="checkbox" name="op_consult_referral_paid_to_doctor" value="1" @if(old('op_consult_referral_paid_to_doctor')) checked @endif data-md-icheck/>
                                            @else
                                                <input id="check_op_consult_referral_paid_to_doctor" type="checkbox" name="op_consult_referral_paid_to_doctor" value="1" @if($provider->op_consult_referral_paid_to_doctor) checked @endif data-md-icheck/>
                                            @endif
                                            <label for="check_op_consult_referral_paid_to_doctor" class="inline-label">Paid to Doctor</label>
                                        </span>
                                        <select data-md-selectize name="op_consult_referral_paid_to_doctor_through" class="{{ $errors->has('op_consult_referral_paid_to_doctor_through') ? ' md-input-danger' : '' }}">
                                            <option value="">Through...</option>
                                            @if ($errors->any())
                                                <option value="bank deposit" @if(old('op_consult_referral_paid_to_doctor_through') == 'bank deposit') selected @endif>Bank Deposit</option>
                                                <option value="check pick-up" @if(old('op_consult_referral_paid_to_doctor_through') == 'check pick-up') selected @endif>Check Pick-up</option>
                                                <option value="check delivery" @if(old('op_consult_referral_paid_to_doctor_through') == 'check delivery') selected @endif>Check Delivery</option>
                                            @else
                                                <option value="bank deposit" @if($provider->op_consult_referral_paid_to_doctor_through == 'bank deposit') selected @endif>Bank Deposit</option>
                                                <option value="check pick-up" @if($provider->op_consult_referral_paid_to_doctor_through == 'check pick-up') selected @endif>Check Pick-up</option>
                                                <option value="check delivery" @if($provider->op_consult_referral_paid_to_doctor_through == 'check delivery') selected @endif>Check Delivery</option>
                                            @endif
                                        </select>
                                    </div>

                                </div>
                                <div class="uk-width-1-2">
                                    <h3 class="heading_c uk-margin-small-bottom"><u>OP-Lab/APE/Facility Fee</u></h3>

                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            <label class="inline-label">Paid to Hospital</label>
                                        </span>
                                        <select data-md-selectize name="op_lab_ape_facility_fee_paid_to_hospital_through" class="{{ $errors->has('op_lab_ape_facility_fee_paid_to_hospital_through') ? ' md-input-danger' : '' }}">
                                            <option value="">Through...</option>
                                            @if ($errors->any())
                                                <option value="bank deposit" @if(old('op_lab_ape_facility_fee_paid_to_hospital_through') == 'bank deposit') selected @endif>Bank Deposit</option>
                                                <option value="check pick-up" @if(old('op_lab_ape_facility_fee_paid_to_hospital_through') == 'check pick-up') selected @endif>Check Pick-up</option>
                                                <option value="check delivery" @if(old('op_lab_ape_facility_fee_paid_to_hospital_through') == 'check delivery') selected @endif>Check Delivery</option>
                                                <option value="auto credit" @if(old('op_lab_ape_facility_fee_paid_to_hospital_through') == 'auto credit') selected @endif>Auto Credit</option>
                                            @else
                                                <option value="bank deposit" @if($provider->op_lab_ape_facility_fee_paid_to_hospital_through == 'bank deposit') selected @endif>Bank Deposit</option>
                                                <option value="check pick-up" @if($provider->op_lab_ape_facility_fee_paid_to_hospital_through == 'check pick-up') selected @endif>Check Pick-up</option>
                                                <option value="check delivery" @if($provider->op_lab_ape_facility_fee_paid_to_hospital_through == 'check delivery') selected @endif>Check Delivery</option>
                                                <option value="auto credit" @if($provider->op_lab_ape_facility_fee_paid_to_hospital_through == 'auto credit') selected @endif>Auto Credit</option>
                                            @endif
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <h3 class="heading_c uk-margin-small-bottom"><u>Clinic Setting</u></h3>

                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            @if ($errors->any())
                                                <input id="check_clinic_setting_paid_to_hospital" type="checkbox" name="clinic_setting_paid_to_hospital" value="1" @if(old('clinic_setting_paid_to_hospital')) checked @endif data-md-icheck/>
                                            @else
                                                <input id="check_clinic_setting_paid_to_hospital" type="checkbox" name="clinic_setting_paid_to_hospital" value="1" @if($provider->clinic_setting_paid_to_hospital) checked @endif data-md-icheck/>
                                            @endif

                                            <label for="check_clinic_setting_paid_to_hospital" class="inline-label">Paid to Hospital</label>
                                        </span>
                                        <select data-md-selectize name="clinic_setting_paid_to_hospital_through" class="{{ $errors->has('clinic_setting_paid_to_hospital_through') ? ' md-input-danger' : '' }}">
                                            <option value="">Through...</option>
                                            @if ($errors->any())
                                                <option value="bank deposit" @if(old('clinic_setting_paid_to_hospital_through') == 'bank deposit') selected @endif>Bank Deposit</option>
                                                <option value="check pick-up" @if(old('clinic_setting_paid_to_hospital_through') == 'check pick-up') selected @endif>Check Pick-up</option>
                                                <option value="check delivery" @if(old('clinic_setting_paid_to_hospital_through') == 'check delivery') selected @endif>Check Delivery</option>
                                                <option value="auto credit" @if(old('clinic_setting_paid_to_hospital_through') == 'auto credit') selected @endif>Auto Credit</option>
                                            @else
                                                <option value="bank deposit" @if($provider->clinic_setting_paid_to_hospital_through == 'bank deposit') selected @endif>Bank Deposit</option>
                                                <option value="check pick-up" @if($provider->clinic_setting_paid_to_hospital_through == 'check pick-up') selected @endif>Check Pick-up</option>
                                                <option value="check delivery" @if($provider->clinic_setting_paid_to_hospital_through == 'check delivery') selected @endif>Check Delivery</option>
                                                <option value="auto credit" @if($provider->clinic_setting_paid_to_hospital_through == 'auto credit') selected @endif>Auto Credit</option>
                                            @endif
                                        </select>
                                    </div>

                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            @if ($errors->any())
                                                <input id="check_clinic_setting_paid_to_doctor" type="checkbox" name="clinic_setting_paid_to_doctor" value="1" @if(old('clinic_setting_paid_to_doctor')) checked @endif data-md-icheck/>
                                            @else
                                                <input id="check_clinic_setting_paid_to_doctor" type="checkbox" name="clinic_setting_paid_to_doctor" value="1" @if($provider->clinic_setting_paid_to_doctor) checked @endif data-md-icheck/>
                                            @endif
                                            <label for="check_clinic_setting_paid_to_doctor" class="inline-label">Paid to Doctor</label>
                                        </span>
                                        <select data-md-selectize name="clinic_setting_paid_to_doctor_through" class="{{ $errors->has('clinic_setting_paid_to_doctor_through') ? ' md-input-danger' : '' }}">
                                            <option value="">Through...</option>
                                            @if ($errors->any())
                                                <option value="bank deposit" @if(old('clinic_setting_paid_to_doctor_through') == 'bank deposit') selected @endif>Bank Deposit</option>
                                                <option value="check pick-up" @if(old('clinic_setting_paid_to_doctor_through') == 'check pick-up') selected @endif>Check Pick-up</option>
                                                <option value="check delivery" @if(old('clinic_setting_paid_to_doctor_through') == 'check delivery') selected @endif>Check Delivery</option>
                                            @else
                                                <option value="bank deposit" @if($provider->clinic_setting_paid_to_doctor_through == 'bank deposit') selected @endif>Bank Deposit</option>
                                                <option value="check pick-up" @if($provider->clinic_setting_paid_to_doctor_through == 'check pick-up') selected @endif>Check Pick-up</option>
                                                <option value="check delivery" @if($provider->clinic_setting_paid_to_doctor_through == 'check delivery') selected @endif>Check Delivery</option>
                                            @endif
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Check Delivery</h3>
                            <div class="uk-grid">
                                <div class="uk-width-2-3">
                                    <label>Name</label>
                                    <input type="text" name="check_delivery_contact_person" value="{{ old('check_delivery_contact_person') ?: $provider->check_delivery_contact_person }}" class="md-input {{ $errors->has('check_delivery_contact_person') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('check_delivery_contact_person'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('check_delivery_contact_person') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-3">
                                    <label>Contact Number</label>
                                    <input type="text" name="check_delivery_contact_no" value="{{ old('check_delivery_contact_no') ?: $provider->check_delivery_contact_no }}" class="md-input {{ $errors->has('check_delivery_contact_no') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('check_delivery_contact_no'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('check_delivery_contact_no') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <label>Department</label>
                                    <input type="text" name="check_delivery_department" value="{{ old('check_delivery_department') ?: $provider->check_delivery_department }}" class="md-input {{ $errors->has('check_delivery_department') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('check_delivery_department'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('check_delivery_department') }}</span>
                                    @endif
                                </div>
                            </div>

                            <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Professional Fees</h3>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <p>
                                        @if ($errors->any())
                                            <input type="checkbox" name="with_mc" value="1" id="check_with_mc" data-md-icheck @if(old('with_mc')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="with_mc" value="1" id="check_with_mc" data-md-icheck @if($provider->with_mc) checked @endif/>
                                        @endif
                                        <label for="check_with_mc" class="inline-label">With Medical Coordinator (MC)</label>
                                    </p>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-2-3">
                                    <label>Doctor's Name</label>
                                    <input type="text" name="mc_name" value="{{ old('mc_name') ?: $provider->mc_name }}" class="md-input {{ $errors->has('mc_name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('mc_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('mc_name') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-3">
                                    <label>Specialization</label>
                                    <input type="text" name="mc_specialization" value="{{ old('mc_specialization') ?: $provider->mc_specialization }}" class="md-input {{ $errors->has('mc_specialization') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('mc_specialization'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('mc_specialization') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <label>Secretary Name</label>
                                    <input type="text" name="mc_secretary_name" value="{{ old('mc_secretary_name') ?: $provider->mc_secretary_name }}" class="md-input {{ $errors->has('mc_secretary_name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('mc_secretary_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('mc_secretary_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-3">
                                    <label>Clinic Hours</label>
                                    <input type="text" name="mc_clinic_hours" value="{{ old('mc_clinic_hours') ?: $provider->mc_clinic_hours }}" class="md-input {{ $errors->has('mc_clinic_hours') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('mc_clinic_hours'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('mc_clinic_hours') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-3">
                                    <label>Room Number</label>
                                    <input type="text" name="mc_room_no" value="{{ old('mc_room_no') ?: $provider->mc_room_no }}" class="md-input {{ $errors->has('mc_room_no') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('mc_room_no'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('mc_room_no') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-3">
                                    <label>Contact Number</label>
                                    <input type="text" name="mc_contact_no" value="{{ old('mc_contact_no') ?: $provider->mc_contact_no }}" class="md-input {{ $errors->has('mc_contact_no') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('mc_contact_no'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('mc_contact_no') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label for="masked_mc_ip_fee">MC In-Patient Fee</label>
                                    <input class="md-input masked_input" id="masked_mc_ip_fee" name="mc_ip_fee" value="{{ old('mc_ip_fee') ?: $provider->mc_ip_fee }}" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label for="masked_mc_op_fee">MC Out-Patient Fee</label>
                                    <input class="md-input masked_input" id="masked_mc_op_fee" name="mc_op_fee" value="{{ old('mc_op_fee') ?: $provider->mc_op_fee }}" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                </div>
                            </div>

                            <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">In-patient PF Rates</h3>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label for="masked_ip_rates_ward">Ward</label>
                                    <input class="md-input masked_input" name="ip_rates_ward" value="{{ old('ip_rates_ward') ?: $provider->ip_rates_ward }}" id="masked_ip_rates_ward" type="text" data-inputmask="'alias': 'currency', 'groucashpSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label for="masked_ip_rates_suite">Suite</label>
                                    <input class="md-input masked_input" name="ip_rates_suite" value="{{ old('ip_rates_suite') ?: $provider->ip_rates_suite }}" id="masked_ip_rates_suite" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label for="masked_ip_rates_semi_private">Semi-Private</label>
                                    <input class="md-input masked_input" name="ip_rates_semi_private" value="{{ old('ip_rates_semi_private') ?: $provider->ip_rates_semi_private }}" id="masked_ip_rates_semi_private" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label for="masked_ip_rates_icu">ICU</label>
                                    <input class="md-input masked_input" name="ip_rates_icu" value="{{ old('ip_rates_icu') ?: $provider->ip_rates_icu }}" id="masked_ip_rates_icu" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label for="masked_ip_rates_private">Private</label>
                                    <input class="md-input masked_input" name="ip_rates_private" value="{{ old('ip_rates_private') ?: $provider->ip_rates_private }}" id="masked_ip_rates_private" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label for="masked_ip_rates_anes">Anes</label>
                                    <input class="md-input masked_input {{ $errors->has('ip_rates_anes') ? ' md-input-danger' : '' }}"
                                        name="ip_rates_anes" value="{{ old('ip_rates_anes') ?: $provider->ip_rates_anes }}" id="masked_ip_rates_anes" type="text"
                                        data-inputmask="'alias': 'currency', 'prefix': '', 'suffix': ' %' " data-inputmask-showmaskonhover="false" />
                                    @if ($errors->has('ip_rates_anes'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('ip_rates_anes') }}</span>
                                    @endif
                                </div>
                            </div>

                            <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Out-patient PF Rates</h3>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label for="masked_currency">PCP</label>
                                    <input class="md-input masked_input" name="op_rates_pcp" value="{{ old('op_rates_pcp') ?: $provider->op_rates_pcp }}" id="masked_currency" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label for="masked_currency">Specialist</label>
                                    <input class="md-input masked_input" name="op_rates_specialist" value="{{ old('op_rates_specialist') ?: $provider->op_rates_specialist }}" id="masked_currency" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                </div>
                            </div>

                        </div>
                    </li>
                    {{-- END PAYMENT --}}

                    {{-- START CONTACT PERSONS TAB --}}
                    <li>
                        <div class="md-card-content">
                            @php $departments = ['HMO / Industrial', 'Admitting', 'Emergency', 'Billing', 'Credit and Collection']; @endphp
                            @foreach ($departments as $key => $department)
                                @php
                                    $providerContactPerson = $provider->providerContactDetails->where('department', $department)->first();
                                @endphp
                                <input type="hidden" name="contact_person_department[]" value="{{ $department }}">
                                <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">{{ $department }}</h3>
                                <div class="uk-grid">
                                    <div class="uk-width-2-3">
                                        <label>Name</label>
                                        <input type="text" name="contact_person_name[]" value="{{ old('contact_person_name.' . $key) ?: optional($providerContactPerson)->name }}" class="md-input {{ $errors->has('contact_person_name.' . $key) ? ' md-input-danger' : '' }}" />
                                        @if ($errors->has('contact_person_name.' . $key))
                                            <span class="uk-form-help-block uk-text-danger">{{ $errors->first('contact_person_name.' . $key) }}</span>
                                        @endif
                                    </div>
                                    <div class="uk-width-1-3">
                                        <label>Designation</label>
                                        <input type="text" class="md-input" name="contact_person_designation[]" value="{{ old('contact_person_designation.' . $key) ?: optional($providerContactPerson)->designation }}">
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-1-2">
                                        <div class="uk-input-group">
                                            <span class="uk-input-group-addon">
                                                <i class="material-icons">&#xE325;</i>
                                            </span>
                                            <label for="wizard_phone">Mobile Number</label>
                                            <input type="text" class="md-input" name="contact_person_mobile_no[]" value="{{ old('contact_person_mobile_no.' . $key) ?: optional($providerContactPerson)->mobile_no }}"/>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-2">
                                        <div class="uk-input-group">
                                            <span class="uk-input-group-addon">
                                                <i class="material-icons">&#xE0BE;</i>
                                            </span>
                                            <label for="wizard_phone">Email</label>
                                            <input type="text" class="md-input" name="contact_person_email[]" value="{{ old('contact_person_email.' . $key) ?: optional($providerContactPerson)->email }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-1-2">
                                        <div class="uk-input-group">
                                            <span class="uk-input-group-addon">
                                                <i class="material-icons">&#xE8AD;</i>
                                            </span>
                                            <label for="wizard_phone">Fax Number</label>
                                            <input type="text" class="md-input" name="contact_person_fax_no[]" value="{{ old('contact_person_fax_no.' . $key) ?: optional($providerContactPerson)->fax_no }}"/>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-2">
                                        <div class="uk-input-group">
                                            <span class="uk-input-group-addon">
                                                <i class="material-icons">&#xE0CD;</i>
                                            </span>
                                            <label for="wizard_phone">Landline Number</label>
                                            <input type="text" class="md-input" name="contact_person_telephone_no[]" value="{{ old('contact_person_telephone_no.' . $key) ?: optional($providerContactPerson)->telephone_no }}"/>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </li>
                    {{-- END CONTACT PERSONS TAB --}}

                    {{-- START OTHERS TAB --}}
                    <li>
                        <div class="md-card-content">
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <select data-md-selectize name="mode_of_releasing" class="{{ $errors->has('mode_of_releasing') ? ' md-input-danger' : '' }}"  data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Mode of Releasing">
                                        <option value="">Mode of Releasing...</option>
                                        @if ($errors->any())
                                            <option value="ada" @if(old('mode_of_releasing') == 'ada') selected @endif>ADA</option>
                                            <option value="courier" @if(old('mode_of_releasing') == 'courier') selected @endif>Courier</option>
                                            <option value="pick-up" @if(old('mode_of_releasing') == 'pick') selected @endif>Pick-up</option>
                                        @else
                                            <option value="ada" @if($provider->mode_of_releasing == 'ada') selected @endif>ADA</option>
                                            <option value="courier" @if($provider->mode_of_releasing == 'courier') selected @endif>Courier</option>
                                            <option value="pick-up" @if($provider->mode_of_releasing == 'pick') selected @endif>Pick-up</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('mode_of_releasing'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('mode_of_releasing') }}</span>
                                    @endif
                                </div>
                            </div>
                            <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Accreditation</h3>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <h3 class="heading_c"><u>Doctor Accreditation</u> </h3>
                                    <p>
                                        @if ($errors->any())
                                            <input type="radio" name="doctor_accreditation" value="umbrella" id="radio_doctor_accreditation_umbrella" @if(old('doctor_accreditation') == 'umbrella') checked @endif data-md-icheck />
                                        @else
                                            <input type="radio" name="doctor_accreditation" value="umbrella" id="radio_doctor_accreditation_umbrella" @if($provider->doctor_accreditation == 'umbrella') checked @endif data-md-icheck />
                                        @endif
                                        <label for="radio_doctor_accreditation_umbrella" class="inline-label">Umbrella</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="radio" name="doctor_accreditation" value="non-umbrella" id="radio_doctor_accreditation_non_umbrella" @if(old('doctor_accreditation') == 'non-umbrella') checked @endif data-md-icheck/>
                                        @else
                                            <input type="radio" name="doctor_accreditation" value="non-umbrella" id="radio_doctor_accreditation_non_umbrella" @if($provider->doctor_accreditation == 'non-umbrella') checked @endif data-md-icheck/>
                                        @endif
                                        <label for="radio_doctor_accreditation_non_umbrella" class="inline-label">Non-Umbrella</label>
                                    </p>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-large-1-2 uk-width-1-1">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <label for="dp_accreditation_date">Accreditation Date</label>
                                        <input class="md-input" type="text" name="accreditation_date" value="{{ old('accreditation_date') ?: optional($provider->accreditation_date)->format('Y-m-d') }}" id="dp_accreditation_date">
                                    </div>
                                </div>
                                <div class="uk-width-large-1-2 uk-width-medium-1-1">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <label for="dp_disaccreditation_date">Disaccreditation Date</label>
                                        <input class="md-input" type="text" name="disaccreditation_date" value="{{ old('disaccreditation_date') ?: optional($provider->disaccreditation_date)->format('Y-m-d') }}" id="dp_disaccreditation_date">
                                    </div>
                                </div>
                            </div>
                            <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Signatories</h3>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <label>Left Name</label>
                                    <input type="text" name="signatory_left_name" value="{{ old('signatory_left_name') ?: $provider->signatory_left_name }}" class="md-input {{ $errors->has('signatory_left_name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('signatory_left_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('signatory_left_name') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-2">
                                    <label>Right Name</label>
                                    <input type="text" name="signatory_right_name" value="{{ old('signatory_right_name') ?: $provider->signatory_right_name }}" class="md-input {{ $errors->has('signatory_right_name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('signatory_right_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('signatory_right_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <label>Left Designation</label>
                                    <input type="text" name="signatory_left_designation" value="{{ old('signatory_left_designation') ?: $provider->signatory_left_designation }}" class="md-input {{ $errors->has('signatory_left_designation') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('signatory_left_designation'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('signatory_left_designation') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-2">
                                    <label>Right Designation</label>
                                    <input type="text" name="signatory_right_designation" value="{{ old('signatory_right_designation') ?: $provider->signatory_right_designation }}" class="md-input {{ $errors->has('signatory_right_designation') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('signatory_right_designation'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('signatory_right_designation') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="uk-grid uk-margin-medium-top">
                                <div class="uk-width-medium-1-2">
                                    <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Internet Connectivity</h3>
                                    <p class="uk-margin-medium-top">
                                        @if ($errors->any())
                                            <input type="checkbox" name="internet_access_industrial" value="1" id="check_internet_access_industrial" data-md-icheck @if(old('internet_access_industrial')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="internet_access_industrial" value="1" id="check_internet_access_industrial" data-md-icheck @if($provider->internet_access_industrial) checked @endif/>
                                        @endif
                                        <label for="check_internet_access_industrial" class="inline-label">Industrial Department</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="checkbox" name="internet_access_billing" value="1" id="check_internet_access_billing" data-md-icheck @if(old('internet_access_billing')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="internet_access_billing" value="1" id="check_internet_access_billing" data-md-icheck @if($provider->internet_access_billing) checked @endif/>
                                        @endif
                                        <label for="check_internet_access_billing" class="inline-label">Billing Department</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="checkbox" name="internet_access_emergency" value="1" id="check_internet_access_emergency" data-md-icheck @if(old('internet_access_emergency')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="internet_access_emergency" value="1" id="check_internet_access_emergency" data-md-icheck @if($provider->internet_access_emergency) checked @endif/>
                                        @endif
                                        <label for="check_internet_access_emergency" class="inline-label">Emergency Department</label>
                                    </p>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Areas with Free Wi-Fi</h3>
                                    <p class="uk-margin-medium-top">
                                        @if ($errors->any())
                                            <input type="checkbox" name="free_wifi_industrial_hmo" value="1" id="check_free_wifi_industrial_hmo" data-md-icheck @if(old('free_wifi_industrial_hmo')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="free_wifi_industrial_hmo" value="1" id="check_free_wifi_industrial_hmo" data-md-icheck @if($provider->free_wifi_industrial_hmo) checked @endif/>
                                        @endif
                                        <label for="check_free_wifi_industrial_hmo" class="inline-label">HMO / Industrial Department</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="checkbox" name="free_wifi_ip_rooms" value="1" id="check_free_wifi_ip_rooms" data-md-icheck @if(old('free_wifi_ip_rooms')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="free_wifi_ip_rooms" value="1" id="check_free_wifi_ip_rooms" data-md-icheck @if($provider->free_wifi_ip_rooms) checked @endif/>
                                        @endif
                                        <label for="check_free_wifi_ip_rooms" class="inline-label">Hospital In-Patient Rooms</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="checkbox" name="free_wifi_emergency" value="1" id="check_free_wifi_emergency" data-md-icheck @if(old('free_wifi_emergency')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="free_wifi_emergency" value="1" id="check_free_wifi_emergency" data-md-icheck @if($provider->free_wifi_emergency) checked @endif/>
                                        @endif
                                        <label for="check_free_wifi_emergency" class="inline-label">Emergency Department</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="checkbox" name="free_wifi_mab" value="1" id="check_free_wifi_mab" data-md-icheck @if(old('free_wifi_mab')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="free_wifi_mab" value="1" id="check_free_wifi_mab" data-md-icheck @if($provider->free_wifi_mab) checked @endif/>
                                        @endif
                                        <label for="check_free_wifi_mab" class="inline-label">MAB</label>
                                    </p>
                                </div>
                            </div>

                            <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Orientation</h3>
                            <div class="uk-grid">
                                <div class="uk-width-2-3">
                                    <label>Oreintation Contact Person</label>
                                    <input type="text" name="orientation_contact_person" value="{{ old('orientation_contact_person') ?: $provider->orientation_contact_person }}" class="md-input {{ $errors->has('orientation_contact_person') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('orientation_contact_person'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('orientation_contact_person') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-3">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <label for="uk_dp_1">Orientation Date</label>
                                        <input class="md-input" type="text" name="orientation_date" value="{{ old('orientation_date') ?: optional($provider->orientation_date)->format('Y-m-d') }}" id="dp_orientation_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                    </div>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <h3 class="heading_a uk-margin-small-bottom">
                                        Sign-off Document (max: 5mb)
                                    </h3>
                                    <input type="file" class="dropify" name="sign_off_document" value="{{ old('sign_off_document') }}" data-default-file="/storage/{{ $provider->sign_off_document_url }}" data-max-file-size="5000K"/>
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-large-top">
                                <div class="uk-width-medium-1-1">
                                    <div class="uk-form-row">
                                        <label>Remarks</label>
                                        <textarea cols="30" rows="4" name="remarks" class="md-input">{{ old('remarks') ?: $provider->remarks }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- END OTHERS TAB --}}
                </ul>

                <div class="uk-grid">
                    <div class="uk-width-medium-1-1">
                        <button class="md-btn md-btn-primary md-btn-wave-light" type="submit">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="/assets/skins/dropify/css/dropify.css">
@endsection

@section('scripts')
    <script src="/bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
    <script src="/assets/js/custom/dropify/dist/js/dropify.min.js"></script>
    <script>
        $(function () {
            $('.dropify').dropify();

            var ip_opd_or_whole = $('#check_ip_opd_or_whole');
            var ip_opd_or_split_hb_hospital = $('#check_ip_opd_or_split_hb_hospital');
            var ip_opd_or_split_pf_doctor = $('#check_ip_opd_or_split_pf_doctor');

            ip_opd_or_whole.on('ifChecked', function (event) {
                ip_opd_or_split_hb_hospital.iCheck('uncheck');
                ip_opd_or_split_pf_doctor.iCheck('uncheck');
            });

            ip_opd_or_split_hb_hospital.on('ifChecked', function (event) {
                ip_opd_or_whole.iCheck('uncheck');
                ip_opd_or_split_pf_doctor.iCheck('check');
            }).on('ifUnchecked', function (event) {
                ip_opd_or_split_pf_doctor.iCheck('uncheck');
            });

            ip_opd_or_split_pf_doctor.on('ifChecked', function (event) {
                ip_opd_or_whole.iCheck('uncheck');
                ip_opd_or_split_hb_hospital.iCheck('check');
            }).on('ifUnchecked', function (event) {
                ip_opd_or_split_hb_hospital.iCheck('uncheck');
            });

            var op_consult_referral_paid_to_hospital = $('#check_op_consult_referral_paid_to_hospital');
            var op_consult_referral_paid_to_doctor = $('#check_op_consult_referral_paid_to_doctor');

            op_consult_referral_paid_to_hospital.on('ifChecked', function (event) {
                op_consult_referral_paid_to_doctor.iCheck('uncheck');
            });

            op_consult_referral_paid_to_doctor.on('ifChecked', function (event) {
                op_consult_referral_paid_to_hospital.iCheck('uncheck');
            });

            var clinic_setting_paid_to_hospital = $('#check_clinic_setting_paid_to_hospital');
            var clinic_setting_paid_to_doctor = $('#check_clinic_setting_paid_to_doctor');

            clinic_setting_paid_to_hospital.on('ifChecked', function (event) {
                clinic_setting_paid_to_doctor.iCheck('uncheck');
            });

            clinic_setting_paid_to_doctor.on('ifChecked', function (event) {
                clinic_setting_paid_to_hospital.iCheck('uncheck');
            });

            var prompt_payment_discount = $('#check_prompt_payment_discount');
            var masked_prompt_payment_discount_rate = $('#masked_prompt_payment_discount_rate');
            var prompt_payment_discount_terms_outright = $('#radio_prompt_payment_discount_terms_outright');
            var prompt_payment_discount_terms_rebate = $('#radio_prompt_payment_discount_terms_rebate');

            prompt_payment_discount.on('ifChecked', function (event) {
                masked_prompt_payment_discount_rate.prop('disabled', false);
                prompt_payment_discount_terms_outright.iCheck('enable');
                prompt_payment_discount_terms_rebate.iCheck('enable');
            });

            prompt_payment_discount.on('ifUnchecked', function (event) {
                masked_prompt_payment_discount_rate.prop('disabled', true);
                masked_prompt_payment_discount_rate.val(0);
                prompt_payment_discount_terms_outright.iCheck('disable');
                prompt_payment_discount_terms_rebate.iCheck('disable');
            });



            var $dp_phic_accreditation_from = $('#dp_phic_accreditation_from'),
                $dp_phic_accreditation_to = $('#dp_phic_accreditation_to');

            var start_date = UIkit.datepicker($dp_phic_accreditation_from, {
                format:'YYYY-MM-DD'
            });

            var end_date = UIkit.datepicker($dp_phic_accreditation_to, {
                format:'YYYY-MM-DD'
            });

            $dp_phic_accreditation_from.on('change',function() {
                end_date.options.minDate = $dp_phic_accreditation_from.val();
                setTimeout(function() {
                    $dp_phic_accreditation_to.focus();
                },300);
            });

            $dp_phic_accreditation_to.on('change',function() {
                start_date.options.maxDate = $dp_phic_accreditation_to.val();
            });

            var $dp_orientation_date = $('#dp_orientation_date');

            UIkit.datepicker($dp_orientation_date, { format:'YYYY-MM-DD' });

            $maskedInput = $('.masked_input').inputmask();
            if($maskedInput.length) {
                $maskedInput.inputmask();
            }

            var $dp_accreditation_date = $('#dp_accreditation_date'),
                $dp_disaccreditation_date = $('#dp_disaccreditation_date');

            var start_date = UIkit.datepicker($dp_accreditation_date, {
                format:'YYYY-MM-DD'
            });

            var end_date = UIkit.datepicker($dp_disaccreditation_date, {
                format:'YYYY-MM-DD'
            });

            $dp_accreditation_date.on('change',function() {
                end_date.options.minDate = $dp_accreditation_date.val();
                setTimeout(function() {
                    $dp_disaccreditation_date.focus();
                },300);
            });

            $dp_disaccreditation_date.on('change',function() {
                start_date.options.maxDate = $dp_disaccreditation_date.val();
            });

            $maskedInput = $('.masked_input').inputmask();
            if($maskedInput.length) {
                $maskedInput.inputmask();
            }
        });
    </script>
@endsection