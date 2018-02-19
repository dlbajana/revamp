@extends('layouts.main')

@section('nav_providers')
    current_section
@endsection

@section('breadcrumbs')
    <div id="top_bar">
        <ul id="breadcrumbs">
            <li><a href="{{ route('providers.index') }}">Providers</a></li>
            <li><span>New Provider</span></li>
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
            <form action="{{ route('providers.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <ul id="tabs_anim2" class="uk-switcher uk-margin">
                    {{-- START INFORMATION TAB --}}
                    <li>
                        <div class="md-card-content">
                            <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Business Details</h3>
                            <div class="uk-grid">
                                <div class="uk-width-medium1-1">
                                    <label>Code</label>
                                    <input type="text" name="code" value="{{ old('code') }}" class="md-input {{ $errors->has('code') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('code'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('code') }}</span>
                                    @else
                                        <span class="uk-form-help-block">If left blank, system will generate a unique code for this provider</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-2-3 ">
                                    <label>Name<span class="req">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}" required class="md-input {{ $errors->has('name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-medium-1-3 ">
                                    <label>Short Name</label>
                                    <input type="text" name="short_name" value="{{ old('short_name') }}" class="md-input {{ $errors->has('short_name') ? ' md-input-danger' : '' }}"/>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-1 ">
                                    <label>Licensed Name</label>
                                    <input type="text" name="licensed_name" value="{{ old('licensed_name') }}" class="md-input {{ $errors->has('licensed_name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('licensed_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('licensed_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-3">
                                    <select data-md-selectize name="business_type" class="{{ $errors->has('business_type') ? ' md-input-danger' : '' }}"  data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Business Type">
                                        <option value="">Business Type*...</option>
                                        <option value="hospital" @if(old('business_type') == 'hospital') selected @endif>Hospital</option>
                                        <option value="clinic" @if(old('business_type') == 'clinic') selected @endif>Clinic</option>
                                    </select>
                                    @if ($errors->has('business_type'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('business_type') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <label>Business Hours</label>
                                    <input type="text" name="business_hours" value="{{ old('business_hours') }}" class="md-input {{ $errors->has('business_hours') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('business_hours'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('business_hours') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <label>Number of Beds</label>
                                    <input type="number" name="number_of_beds" value="{{ old('number_of_beds') }}" class="md-input {{ $errors->has('number_of_beds') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('number_of_beds'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('number_of_beds') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-2-4">
                                    <label>Tax Identification Number</label>
                                    <input type="text" name="tin" value="{{ old('tin') }}" class="md-input {{ $errors->has('tin') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('tin'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('tin') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-medium-1-4">
                                    <p class="uk-margin-small-top">
                                        <input type="checkbox" name="tax_exempt" value="1" id="check_tax_exempt" data-md-icheck @if(old('tax_exempt')) checked @endif/>
                                        <label for="check_tax_exempt" class="inline-label">Tax Exempt</label>
                                    </p>
                                </div>
                                <div class="uk-width-medium-1-4">
                                    <p class="uk-margin-small-top">
                                        <input type="checkbox" name="withheld" value="1" id="check_withheld" data-md-icheck @if(old('withheld')) checked @endif/>
                                        <label for="check_withheld" class="inline-label">Withheld</label>
                                    </p>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-1">
                                    <select data-md-selectize name="accreditation_status" class="{{ $errors->has('accreditation_status') ? ' md-input-danger' : '' }}"  data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Accreditation Status">
                                        <option value="">Accreditation Status*...</option>
                                        <option value="accredited" @if(old('accreditation_status') == 'accredited') selected @endif>Accredited</option>
                                        <option value="disaccredited" @if(old('accreditation_status') == 'disaccredited') selected @endif>Disaccredited</option>
                                        <option value="non-accredited" @if(old('accreditation_status') == 'non-accredited') selected @endif>Non-Accredited</option>
                                    </select>
                                    @if ($errors->has('accreditation_status'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('accreditation_status') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-medium-top">
                                <div class="uk-width-medium-1-2">
                                    <p>
                                        <input type="checkbox" name="default_corporate_no_access" value="1" id="check_default_corporate_no_access" data-md-icheck @if(old('default_corporate_no_access')) checked @endif/>
                                        <label for="check_default_corporate_no_access" class="inline-label">Default Corporate No-Access <i class="material-icons" title="All Corporate Accounts will have no access to this provider by default unless explicitly specified.">&#xE887;</i></label>
                                    </p>
                                    <p>
                                        <input type="checkbox" name="suspected_fraud" value="1" id="check_suspected_fraud" data-md-icheck @if(old('suspected_fraud')) checked @endif/>
                                        <label for="check_suspected_fraud" class="inline-label">Suspected Fraud <i class="material-icons" title="All transactions made with this provider will be rejected by the system. Previous transactions are not affected.">&#xE887;</i></label>
                                    </p>
                                </div>
                            </div>
                            <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Bank Details</h3>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <label>Account Name</label>
                                    <input type="text" name="bank_account_name" value="{{ old('bank_account_name') }}" class="md-input {{ $errors->has('bank_account_name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('bank_account_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('bank_account_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <label>Account Number</label>
                                    <input type="text" name="bank_account_no" value="{{ old('bank_account_no') }}" class="md-input {{ $errors->has('bank_account_no') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('bank_account_no'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('bank_account_no') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <label>Bank Name</label>
                                    <input type="text" name="bank_name" value="{{ old('bank_name') }}" class="md-input {{ $errors->has('bank_name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('bank_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('bank_name') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-2">
                                    <label>Bank Branch</label>
                                    <input type="text" name="bank_branch" value="{{ old('bank_branch') }}" class="md-input {{ $errors->has('bank_branch') ? ' md-input-danger' : '' }}" />
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
                                        <input class="md-input" type="text" name="phic_accreditation_from" value="{{ old('phic_accreditation_from') }}" id="dp_phic_accreditation_from">
                                    </div>
                                </div>
                                <div class="uk-width-large-1-2 uk-width-medium-1-1">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <label for="dp_phic_accreditation_to">End Date</label>
                                        <input class="md-input" type="text" name="phic_accreditation_to" value="{{ old('phic_accreditation_to') }}" id="dp_phic_accreditation_to">
                                    </div>
                                </div>
                            </div>
                            <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Address</h3>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <select id="select-address-region" name="address_region" data-uk-tooltip="{pos:'top'}" title="Region">
                                        <option value="0">&nbsp;</option>
                                        @foreach ($addresses->unique('region_id')->values() as $key => $address)
                                            @if ($errors->any())
                                                <option value="{{ $address->region_id }}" @if(old('address_region') == $address->region_id) selected @endif>
                                                    {{ $address->region }}
                                                </option>
                                            @else
                                                <option value="{{ $address->region_id }}">
                                                    {{ $address->region }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <span class="uk-form-help-block">Region</span>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <select id="select-address-province" name="address_province" data-uk-tooltip="{pos:'top'}" title="Province" @if(! $errors->any()) disabled @endif>
                                        @if ($errors->any())
                                            <option value="0">&nbsp;</option>
                                            @foreach ($addresses->where('region_id', old('address_region'))->unique('province_id')->values() as $key => $address)
                                                <option value="{{ $address->province_id }}" @if(old('address_province') == $address->province_id) selected @endif>
                                                    {{ $address->province }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="uk-form-help-block">Province</span>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <select id="select-address-city" name="address_city" data-uk-tooltip="{pos:'top'}" title="City" @if(! $errors->any()) disabled @endif>
                                        @if ($errors->any())
                                            <option value="0">&nbsp;</option>
                                            @foreach ($addresses->where('province_id', old('address_province'))->unique('city_id')->values() as $key => $address)
                                                <option value="{{ $address->city_id }}" @if(old('address_city') == $address->city_id) selected @endif>
                                                    {{ $address->city }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="uk-form-help-block">City</span>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <select id="select-address-baranggay" name="address_baranggay" ata-uk-tooltip="{pos:'top'}" title="Baranggay" @if(! $errors->any()) disabled @endif>
                                        @if ($errors->any())
                                            <option value="0">&nbsp;</option>
                                            @foreach ($addresses->where('city_id', old('address_city'))->unique('baranggay_id')->values() as $key => $address)
                                                <option value="{{ $address->baranggay_id }}" @if(old('address_baranggay') == $address->baranggay_id) selected @endif>
                                                    {{ $address->baranggay }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="uk-form-help-block">Baranggay</span>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-1">
                                    <div class="uk-form-row">
                                        <label>Street/Building/Subd/Village</label>
                                        <textarea cols="30" rows="4" name="address" class="md-input">{{ old('address') }}</textarea>
                                    </div>
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
                                        <input type="radio" name="payment_setup" value="blanket" id="radio_payment_setup_blanket" data-md-icheck @if(old('payment_setup') == 'blanket') checked @endif/>
                                        <label for="radio_payment_setup_blanket" class="inline-label">Blanket</label>
                                    </p>
                                    <p>
                                        <input type="radio" name="payment_setup" value="non-blanket" id="radio_payment_setup_non_blanket" data-md-icheck @if(old('payment_setup') == 'non-blanket') checked @elseif(! old('payment_setup')) checked @endif/>
                                        <label for="radio_payment_setup_non_blanket" class="inline-label">Non-Blanket</label>
                                    </p>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <select name="payment_terms" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Payment Terms">
                                        <option value="">Select...</option>
                                        <option value="15" @if (old('payment_terms') == 15) selected @elseif(! $errors->any()) selected @endif>15 Days</option>
                                        <option value="10" @if (old('payment_terms') == 10) selected @endif>10 Days</option>
                                        <option value="7" @if (old('payment_terms') == 7) selected @endif>7 Days</option>
                                        <option value="3" @if (old('payment_terms') == 3) selected @endif>3 Days</option>
                                        <option value="1" @if (old('payment_terms') == 1) selected @endif>24 Hours</option>
                                    </select>
                                    <span class="uk-form-help-block">Payment Terms</span>
                                </div>
                                <div class="uk-width-1-2">
                                    <select name="submission_of_claims" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Submission of Claims">
                                        <option value="">Select...</option>
                                        <option value="90" @if (old('submission_of_claims') == 90) selected @endif>90 Days</option>
                                        <option value="60" @if (old('submission_of_claims') == 60) selected @endif>60 Days</option>
                                        <option value="30" @if (old('submission_of_claims') == 30) selected @endif>30 Days</option>
                                        <option value="15" @if (old('submission_of_claims') == 15) selected @endif>15 Days</option>
                                        <option value="7" @if (old('submission_of_claims') == 7) selected @elseif(! $errors->any()) selected @endif>7 Days</option>
                                    </select>
                                    <span class="uk-form-help-block">Submission of Claims</span>
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-medium-top">
                                <div class="uk-width-1-1">
                                    <label for="masked_cashbond">Cash Bond</label>
                                    <input class="md-input masked_input" name="cash_bond" value="{{ old('cash_bond') }}" id="masked_cash_bond" type="text" data-inputmask="'alias': 'currency', 'groucashpSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                    @if ($errors->has('cash_bond'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('cash_bond') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <label for="masked_cashbond">Credit Limit</label>
                                    <input class="md-input masked_input" name="credit_limit" value="{{ old('credit_limit') }}" id="masked_credit_limit" type="text" data-inputmask="'alias': 'currency', 'groucashpSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                    @if ($errors->has('credit_limit'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('credit_limit') }}</span>
                                    @endif
                                </div>
                            </div>
                            <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Prompt Payment</h3>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <p>
                                        <input type="checkbox" name="prompt_payment_discount" value="1" id="check_prompt_payment_discount" data-md-icheck @if(old('prompt_payment_discount') == 1) checked @endif/>
                                        <label for="check_prompt_payment_discount" class="inline-label">Allow Prompt Payment Discount</label>
                                    </p>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <label for="masked_prompt_payment_discount_rate">Prompt Payment Discount Rate (0.5%- 20%)</label>
                                    <input class="md-input masked_input {{ $errors->has('prompt_payment_discount_rate') ? ' md-input-danger' : '' }}" @if(! old('prompt_payment_discount')) disabled @endif
                                        name="prompt_payment_discount_rate" value="{{ old('prompt_payment_discount_rate') }}" id="masked_prompt_payment_discount_rate" type="text"
                                        data-inputmask="'alias': 'currency', 'prefix': '', 'suffix': ' %' " data-inputmask-showmaskonhover="false" />
                                    @if ($errors->has('prompt_payment_discount_rate'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('prompt_payment_discount_rate') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-2">
                                    <span class="icheck-inline uk-margin-small-top">
                                        <input type="radio" name="prompt_payment_discount_terms" value="outright" id="radio_prompt_payment_discount_terms_outright" @if(! old('prompt_payment_discount')) disabled @endif data-md-icheck @if(old('prompt_payment_discount_terms') == 'outright') checked @endif/>
                                        <label for="radio_prompt_payment_discount_terms_outright" class="inline-label">Outright</label>
                                    </span>
                                    <span class="icheck-inline">
                                        <input type="radio" name="prompt_payment_discount_terms" value="rebate" id="radio_prompt_payment_discount_terms_rebate" @if(! old('prompt_payment_discount')) disabled @endif data-md-icheck @if(old('prompt_payment_discount_terms') == 'rebate') checked @elseif(! old('prompt_payment_discount_terms')) checked @endif/>
                                        <label for="radio_prompt_payment_discount_terms_rebate" class="inline-label">Rebate</label>
                                    </span>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <label for="masked_late_payment_interest">Late Payment Interest</label>
                                    <input class="md-input masked_input {{ $errors->has('late_payment_interest') ? ' md-input-danger' : '' }}"
                                        name="late_payment_interest" value="{{ old('late_payment_interest') }}" id="masked_late_payment_interest" type="text"
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
                                            <input id="check_ip_opd_or_whole" type="checkbox" name="ip_opd_or_whole" value="1" @if(old('ip_opd_or_whole') == 1) checked @endif data-md-icheck/>
                                            <label for="check_ip_opd_or_whole" class="inline-label">Whole</label>
                                        </span>
                                        <select id="select_ip_opd_or_whole_through" data-md-selectize name="ip_opd_or_whole_through" class= "{{ $errors->has('ip_opd_or_whole_through') ? ' md-input-danger' : '' }}">
                                            <option value="">Through...</option>
                                            <option value="bank deposit" @if(old('ip_opd_or_whole_through') == 'bank deposit') selected @endif>Bank Deposit</option>
                                            <option value="check pick-up" @if(old('ip_opd_or_whole_through') == 'check pick-up') selected @endif>Check Pick-up</option>
                                            <option value="check delivery" @if(old('ip_opd_or_whole_through') == 'check delivery') selected @endif>Check Delivery</option>
                                            <option value="auto credit" @if(old('ip_opd_or_whole_through') == 'auto credit') selected @endif>Auto Credit</option>
                                        </select>
                                    </div>

                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            <input id="check_ip_opd_or_split_hb_hospital" type="checkbox" name="ip_opd_or_split_hb_hospital" value="1" @if(old('ip_opd_or_split_hb_hospital') == 1) checked @endif data-md-icheck/>
                                            <label for="check_ip_opd_or_split_hb_hospital" class="inline-label">Split - HB to Hospital</label>
                                        </span>
                                        <select data-md-selectize name="ip_opd_or_split_hb_hospital_through" class="{{ $errors->has('ip_opd_or_split_hb_hospital_through') ? ' md-input-danger' : '' }}">
                                            <option value="">Through...</option>
                                            <option value="bank deposit" @if(old('ip_opd_or_split_hb_hospital_through') == 'bank deposit') selected @endif>Bank Deposit</option>
                                            <option value="check pick-up" @if(old('ip_opd_or_split_hb_hospital_through') == 'check pick-up') selected @endif>Check Pick-up</option>
                                            <option value="check delivery" @if(old('ip_opd_or_split_hb_hospital_through') == 'check delivery') selected @endif>Check Delivery</option>
                                            <option value="auto credit" @if(old('ip_opd_or_split_hb_hospital_through') == 'auto credit') selected @endif>Auto Credit</option>
                                        </select>
                                    </div>

                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            <input id="check_ip_opd_or_split_pf_doctor" type="checkbox" name="ip_opd_or_split_pf_doctor" value="1" @if(old('ip_opd_or_split_pf_doctor') == 1) checked @endif data-md-icheck/>
                                            <label for="check_ip_opd_or_split_pf_doctor" class="inline-label">Split - PF to Doctor</label>
                                        </span>
                                        <select data-md-selectize name="ip_opd_or_split_pf_doctor_through" class="{{ $errors->has('ip_opd_or_split_pf_doctor_through') ? ' md-input-danger' : '' }}">
                                            <option value="">Through...</option>
                                            <option value="bank deposit" @if(old('ip_opd_or_split_pf_doctor_through') == 'bank deposit') selected @endif>Bank Deposit</option>
                                            <option value="check pick-up" @if(old('ip_opd_or_split_pf_doctor_through') == 'check pick-up') selected @endif>Check Pick-up</option>
                                            <option value="check delivery" @if(old('ip_opd_or_split_pf_doctor_through') == 'check delivery') selected @endif>Check Delivery</option>
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
                                            <option value="bank deposit" @if(old('emergency_paid_to_hospital_through') == 'bank deposit') selected @endif>Bank Deposit</option>
                                            <option value="check pick-up" @if(old('emergency_paid_to_hospital_through') == 'check pick-up') selected @endif>Check Pick-up</option>
                                            <option value="check delivery" @if(old('emergency_paid_to_hospital_through') == 'check delivery') selected @endif>Check Delivery</option>
                                            <option value="auto credit" @if(old('emergency_paid_to_hospital_through') == 'auto credit') selected @endif>Auto Credit</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <h3 class="heading_c uk-margin-small-bottom"><u>OP-Consult/Referral</u></h3>

                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            <input id="check_op_consult_referral_paid_to_hospital" type="checkbox" name="op_consult_referral_paid_to_hospital" value="1" @if(old('op_consult_referral_paid_to_hospital') == 1) checked @endif data-md-icheck/>
                                            <label for="check_op_consult_referral_paid_to_hospital" class="inline-label">Paid to Hospital</label>
                                        </span>
                                        <select data-md-selectize name="op_consult_referral_paid_to_hospital_through" class="{{ $errors->has('op_consult_referral_paid_to_hospital_through') ? ' md-input-danger' : '' }}">
                                            <option value="">Through...</option>
                                            <option value="bank deposit" @if(old('op_consult_referral_paid_to_hospital_through') == 'bank deposit') selected @endif>Bank Deposit</option>
                                            <option value="check pick-up" @if(old('op_consult_referral_paid_to_hospital_through') == 'check pick-up') selected @endif>Check Pick-up</option>
                                            <option value="check delivery" @if(old('op_consult_referral_paid_to_hospital_through') == 'check delivery') selected @endif>Check Delivery</option>
                                            <option value="auto credit" @if(old('op_consult_referral_paid_to_hospital_through') == 'auto credit') selected @endif>Auto Credit</option>
                                        </select>
                                    </div>

                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            <input id="check_op_consult_referral_paid_to_doctor" type="checkbox" name="op_consult_referral_paid_to_doctor" value="1" @if(old('op_consult_referral_paid_to_doctor') == 1) checked @endif data-md-icheck/>
                                            <label for="check_op_consult_referral_paid_to_doctor" class="inline-label">Paid to Doctor</label>
                                        </span>
                                        <select data-md-selectize name="op_consult_referral_paid_to_doctor_through" class="{{ $errors->has('op_consult_referral_paid_to_doctor_through') ? ' md-input-danger' : '' }}">
                                            <option value="">Through...</option>
                                            <option value="bank deposit" @if(old('op_consult_referral_paid_to_doctor_through') == 'bank deposit') selected @endif>Bank Deposit</option>
                                            <option value="check pick-up" @if(old('op_consult_referral_paid_to_doctor_through') == 'check pick-up') selected @endif>Check Pick-up</option>
                                            <option value="check delivery" @if(old('op_consult_referral_paid_to_doctor_through') == 'check delivery') selected @endif>Check Delivery</option>
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
                                            <option value="bank deposit" @if(old('op_lab_ape_facility_fee_paid_to_hospital_through') == 'bank deposit') selected @endif>Bank Deposit</option>
                                            <option value="check pick-up" @if(old('op_lab_ape_facility_fee_paid_to_hospital_through') == 'check pick-up') selected @endif>Check Pick-up</option>
                                            <option value="check delivery" @if(old('op_lab_ape_facility_fee_paid_to_hospital_through') == 'check delivery') selected @endif>Check Delivery</option>
                                            <option value="auto credit" @if(old('op_lab_ape_facility_fee_paid_to_hospital_through') == 'auto credit') selected @endif>Auto Credit</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <h3 class="heading_c uk-margin-small-bottom"><u>Clinic Setting</u></h3>

                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            <input id="check_clinic_setting_paid_to_hospital" type="checkbox" name="clinic_setting_paid_to_hospital" value="1" @if(old('clinic_setting_paid_to_hospital') == 1) checked @endif data-md-icheck/>
                                            <label for="check_clinic_setting_paid_to_hospital" class="inline-label">Paid to Hospital</label>
                                        </span>
                                        <select data-md-selectize name="clinic_setting_paid_to_hospital_through" class="{{ $errors->has('clinic_setting_paid_to_hospital_through') ? ' md-input-danger' : '' }}">
                                            <option value="">Through...</option>
                                            <option value="bank deposit" @if(old('clinic_setting_paid_to_hospital_through') == 'bank deposit') selected @endif>Bank Deposit</option>
                                            <option value="check pick-up" @if(old('clinic_setting_paid_to_hospital_through') == 'check pick-up') selected @endif>Check Pick-up</option>
                                            <option value="check delivery" @if(old('clinic_setting_paid_to_hospital_through') == 'check delivery') selected @endif>Check Delivery</option>
                                            <option value="auto credit" @if(old('clinic_setting_paid_to_hospital_through') == 'auto credit') selected @endif>Auto Credit</option>
                                        </select>
                                    </div>

                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            <input id="check_clinic_setting_paid_to_doctor" type="checkbox" name="clinic_setting_paid_to_doctor" value="1" @if(old('clinic_setting_paid_to_doctor') == 1) checked @endif data-md-icheck/>
                                            <label for="check_clinic_setting_paid_to_doctor" class="inline-label">Paid to Doctor</label>
                                        </span>
                                        <select data-md-selectize name="clinic_setting_paid_to_doctor_through" class="{{ $errors->has('clinic_setting_paid_to_doctor_through') ? ' md-input-danger' : '' }}">
                                            <option value="">Through...</option>
                                            <option value="bank deposit" @if(old('clinic_setting_paid_to_doctor_through') == 'bank deposit') selected @endif>Bank Deposit</option>
                                            <option value="check pick-up" @if(old('clinic_setting_paid_to_doctor_through') == 'check pick-up') selected @endif>Check Pick-up</option>
                                            <option value="check delivery" @if(old('clinic_setting_paid_to_doctor_through') == 'check delivery') selected @endif>Check Delivery</option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Check Delivery</h3>
                            <div class="uk-grid">
                                <div class="uk-width-2-3">
                                    <label>Name</label>
                                    <input type="text" name="check_delivery_contact_person" value="{{ old('check_delivery_contact_person') }}" class="md-input {{ $errors->has('check_delivery_contact_person') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('check_delivery_contact_person'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('check_delivery_contact_person') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-3">
                                    <label>Contact Number</label>
                                    <input type="text" name="check_delivery_contact_no" value="{{ old('check_delivery_contact_no') }}" class="md-input {{ $errors->has('check_delivery_contact_no') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('check_delivery_contact_no'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('check_delivery_contact_no') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <label>Department</label>
                                    <input type="text" name="check_delivery_department" value="{{ old('check_delivery_department') }}" class="md-input {{ $errors->has('check_delivery_department') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('check_delivery_department'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('check_delivery_department') }}</span>
                                    @endif
                                </div>
                            </div>

                            <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Professional Fees</h3>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <p>
                                        <input type="checkbox" name="with_mc" value="1" id="check_with_mc" data-md-icheck @if(old('with_mc') == 1) checked @endif/>
                                        <label for="check_with_mc" class="inline-label">With Medical Coordinator (MC)</label>
                                    </p>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-2-3">
                                    <label>Doctor's Name</label>
                                    <input type="text" name="mc_name" value="{{ old('mc_name') }}" class="md-input {{ $errors->has('mc_name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('mc_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('mc_name') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-3">
                                    <label>Specialization</label>
                                    <input type="text" name="mc_specialization" value="{{ old('mc_specialization') }}" class="md-input {{ $errors->has('mc_specialization') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('mc_specialization'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('mc_specialization') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <label>Secretary Name</label>
                                    <input type="text" name="mc_secretary_name" value="{{ old('mc_secretary_name') }}" class="md-input {{ $errors->has('mc_secretary_name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('mc_secretary_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('mc_secretary_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-3">
                                    <label>Clinic Hours</label>
                                    <input type="text" name="mc_clinic_hours" value="{{ old('mc_clinic_hours') }}" class="md-input {{ $errors->has('mc_clinic_hours') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('mc_clinic_hours'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('mc_clinic_hours') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-3">
                                    <label>Room Number</label>
                                    <input type="text" name="mc_room_no" value="{{ old('mc_room_no') }}" class="md-input {{ $errors->has('mc_room_no') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('mc_room_no'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('mc_room_no') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-3">
                                    <label>Contact Number</label>
                                    <input type="text" name="mc_contact_no" value="{{ old('mc_contact_no') }}" class="md-input {{ $errors->has('mc_contact_no') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('mc_contact_no'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('mc_contact_no') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label for="masked_mc_ip_fee">MC In-Patient Fee</label>
                                    <input class="md-input masked_input" id="masked_mc_ip_fee" name="mc_ip_fee" value="{{ old('mc_ip_fee') }}" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label for="masked_mc_op_fee">MC Out-Patient Fee</label>
                                    <input class="md-input masked_input" id="masked_mc_op_fee" name="mc_op_fee" value="{{ old('mc_op_fee') }}" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                </div>
                            </div>

                            <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">In-patient PF Rates</h3>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label for="masked_ip_rates_ward">Ward</label>
                                    <input class="md-input masked_input" name="ip_rates_ward" value="{{ old('ip_rates_ward') }}" id="masked_ip_rates_ward" type="text" data-inputmask="'alias': 'currency', 'groucashpSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label for="masked_ip_rates_suite">Suite</label>
                                    <input class="md-input masked_input" name="ip_rates_suite" value="{{ old('ip_rates_suite') }}" id="masked_ip_rates_suite" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label for="masked_ip_rates_semi_private">Semi-Private</label>
                                    <input class="md-input masked_input" name="ip_rates_semi_private" value="{{ old('ip_rates_semi_private') }}" id="masked_ip_rates_semi_private" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label for="masked_ip_rates_icu">ICU</label>
                                    <input class="md-input masked_input" name="ip_rates_icu" value="{{ old('ip_rates_icu') }}" id="masked_ip_rates_icu" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label for="masked_ip_rates_private">Private</label>
                                    <input class="md-input masked_input" name="ip_rates_private" value="{{ old('ip_rates_private') }}" id="masked_ip_rates_private" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label for="masked_ip_rates_anes">Anes</label>
                                    <input class="md-input masked_input {{ $errors->has('ip_rates_anes') ? ' md-input-danger' : '' }}"
                                        name="ip_rates_anes" value="{{ old('ip_rates_anes') }}" id="masked_ip_rates_anes" type="text"
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
                                    <input class="md-input masked_input" name="op_rates_pcp" value="{{ old('op_rates_pcp') }}" id="masked_currency" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label for="masked_currency">Specialist</label>
                                    <input class="md-input masked_input" name="op_rates_specialist" value="{{ old('op_rates_specialist') }}" id="masked_currency" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
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
                                <input type="hidden" name="contact_person_department[]" value="{{ $department }}">
                                <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">{{ $department }}</h3>
                                <div class="uk-grid">
                                    <div class="uk-width-2-3">
                                        <label>Name</label>
                                        <input type="text" name="contact_person_name[]" value="{{ old('contact_person_name.' . $key) }}" class="md-input {{ $errors->has('contact_person_name.' . $key) ? ' md-input-danger' : '' }}" />
                                        @if ($errors->has('contact_person_name.' . $key))
                                            <span class="uk-form-help-block uk-text-danger">{{ $errors->first('contact_person_name.' . $key) }}</span>
                                        @endif
                                    </div>
                                    <div class="uk-width-1-3">
                                        <label>Designation</label>
                                        <input type="text" class="md-input" name="contact_person_designation[]" value="{{ old('contact_person_designation.' . $key) }}">
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-1-2">
                                        <div class="uk-input-group">
                                            <span class="uk-input-group-addon">
                                                <i class="material-icons">&#xE325;</i>
                                            </span>
                                            <label for="wizard_phone">Mobile Number</label>
                                            <input type="text" class="md-input" name="contact_person_mobile_no[]" value="{{ old('contact_person_mobile_no.' . $key) }}"/>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-2">
                                        <div class="uk-input-group">
                                            <span class="uk-input-group-addon">
                                                <i class="material-icons">&#xE0BE;</i>
                                            </span>
                                            <label for="wizard_phone">Email</label>
                                            <input type="text" class="md-input" name="contact_person_email[]" value="{{ old('contact_person_email.' . $key) }}"/>
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
                                            <input type="text" class="md-input" name="contact_person_fax_no[]" value="{{ old('contact_person_fax_no.' . $key) }}"/>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-2">
                                        <div class="uk-input-group">
                                            <span class="uk-input-group-addon">
                                                <i class="material-icons">&#xE0CD;</i>
                                            </span>
                                            <label for="wizard_phone">Landline Number</label>
                                            <input type="text" class="md-input" name="contact_person_telephone_no[]" value="{{ old('contact_person_telephone_no.' . $key) }}"/>
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
                                        <option value="ada" @if(old('mode_of_releasing') == 'ada') selected @endif>ADA</option>
                                        <option value="courier" @if(old('mode_of_releasing') == 'courier') selected @endif>Courier</option>
                                        <option value="pick-up" @if(old('mode_of_releasing') == 'pick') selected @endif>Pick-up</option>
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
                                        <input type="radio" name="doctor_accreditation" value="umbrella" id="radio_doctor_accreditation_umbrella" @if(old('doctor_accreditation') == 'umbrella') checked @endif data-md-icheck />
                                        <label for="radio_doctor_accreditation_umbrella" class="inline-label">Umbrella</label>
                                    </p>
                                    <p>
                                        <input type="radio" name="doctor_accreditation" value="non-umbrella" id="radio_doctor_accreditation_non_umbrella" @if(old('doctor_accreditation') == 'non-umbrella') checked @elseif(! old('doctor_accreditation')) checked @endif data-md-icheck/>
                                        <label for="radio_doctor_accreditation_non_umbrella" class="inline-label">Non-Umbrella</label>
                                    </p>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-large-1-2 uk-width-1-1">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <label for="dp_accreditation_date">Accreditation Date</label>
                                        <input class="md-input" type="text" name="accreditation_date" value="{{ old('accreditation_date') }}" id="dp_accreditation_date">
                                    </div>
                                </div>
                                <div class="uk-width-large-1-2 uk-width-medium-1-1">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <label for="dp_disaccreditation_date">Disaccreditation Date</label>
                                        <input class="md-input" type="text" name="disaccreditation_date" value="{{ old('disaccreditation_date') }}" id="dp_disaccreditation_date">
                                    </div>
                                </div>
                            </div>
                            <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Signatories</h3>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <label>Left Name</label>
                                    <input type="text" name="signatory_left_name" value="{{ old('signatory_left_name') }}" class="md-input {{ $errors->has('signatory_left_name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('signatory_left_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('signatory_left_name') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-2">
                                    <label>Right Name</label>
                                    <input type="text" name="signatory_right_name" value="{{ old('signatory_right_name') }}" class="md-input {{ $errors->has('signatory_right_name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('signatory_right_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('signatory_right_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <label>Left Designation</label>
                                    <input type="text" name="signatory_left_designation" value="{{ old('signatory_left_designation') }}" class="md-input {{ $errors->has('signatory_left_designation') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('signatory_left_designation'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('signatory_left_designation') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-2">
                                    <label>Right Designation</label>
                                    <input type="text" name="signatory_right_designation" value="{{ old('signatory_right_designation') }}" class="md-input {{ $errors->has('signatory_right_designation') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('signatory_right_designation'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('signatory_right_designation') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="uk-grid uk-margin-medium-top">
                                <div class="uk-width-medium-1-2">
                                    <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Internet Connectivity</h3>
                                    <p class="uk-margin-medium-top">
                                        <input type="checkbox" name="internet_access_industrial" value="1" id="check_internet_access_industrial" data-md-icheck @if(old('internet_access_industrial')) checked @endif/>
                                        <label for="check_internet_access_industrial" class="inline-label">Industrial Department</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" name="internet_access_billing" value="1" id="check_internet_access_billing" data-md-icheck @if(old('internet_access_billing')) checked @endif/>
                                        <label for="check_internet_access_billing" class="inline-label">Billing Department</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" name="internet_access_emergency" value="1" id="check_internet_access_emergency" data-md-icheck @if(old('internet_access_emergency')) checked @endif/>
                                        <label for="check_internet_access_emergency" class="inline-label">Emergency Department</label>
                                    </p>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Areas with Free Wi-Fi</h3>
                                    <p class="uk-margin-medium-top">
                                        <input type="checkbox" name="free_wifi_industrial_hmo" value="1" id="check_free_wifi_industrial_hmo" data-md-icheck @if(old('free_wifi_industrial_hmo')) checked @endif/>
                                        <label for="check_free_wifi_industrial_hmo" class="inline-label">HMO / Industrial Department</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" name="free_wifi_ip_rooms" value="1" id="check_free_wifi_ip_rooms" data-md-icheck @if(old('free_wifi_ip_rooms')) checked @endif/>
                                        <label for="check_free_wifi_ip_rooms" class="inline-label">Hospital In-Patient Rooms</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" name="free_wifi_emergency" value="1" id="check_free_wifi_emergency" data-md-icheck @if(old('free_wifi_emergency')) checked @endif/>
                                        <label for="check_free_wifi_emergency" class="inline-label">Emergency Department</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" name="free_wifi_mab" value="1" id="check_free_wifi_mab" data-md-icheck @if(old('free_wifi_mab')) checked @endif/>
                                        <label for="check_free_wifi_mab" class="inline-label">MAB</label>
                                    </p>
                                </div>
                            </div>

                            <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Orientation</h3>
                            <div class="uk-grid">
                                <div class="uk-width-2-3">
                                    <label>Oreintation Contact Person</label>
                                    <input type="text" name="orientation_contact_person" value="{{ old('orientation_contact_person') }}" class="md-input {{ $errors->has('orientation_contact_person') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('orientation_contact_person'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('orientation_contact_person') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-3">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <label for="uk_dp_1">Orientation Date</label>
                                        <input class="md-input" type="text" name="orientation_date" value="{{ old('orientation_date') }}" id="dp_orientation_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                    </div>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <h3 class="heading_a uk-margin-small-bottom">
                                        Sign-off Document
                                    </h3>
                                    <input type="file" class="dropify" name="sign_off_document" value="{{ old('sign_off_document') }}"/>
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-large-top">
                                <div class="uk-width-medium-1-1">
                                    <div class="uk-form-row">
                                        <label>Remarks</label>
                                        <textarea cols="30" rows="4" name="remarks" class="md-input">{{ old('remarks') }}</textarea>
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
            amaphil.init();

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

        amaphil = {
            init: function() {
                amaphil.select_address();
            },
            select_address: function() {
                var xhr;
                var select_address_region, $select_address_region;
                var select_address_province, $select_address_province;
                var select_address_city, $select_address_city;
                var select_address_baranggay, $select_address_baranggay;

                $select_address_region = $('#select-address-region').selectize({
                    valueField: 'region_id',
                    labelField: 'region',
                    searchField: ['region'],

                    onChange: function(value) {
                        if (!value.length) return;
                        select_address_baranggay.disable();
                        select_address_baranggay.clearOptions();

                        select_address_city.disable();
                        select_address_city.clearOptions();

                        select_address_province.disable();
                        select_address_province.clearOptions();
                        select_address_province.load(function(callback) {
                            if (value == 0) return;
                            xhr && xhr.abort();
                            xhr = $.ajax({
                                url: '/api/address/regions/' + value + '/provinces',
                                success: function(results) {
                                    select_address_province.enable();
                                    callback(results);
                                },
                                error: function() {
                                    callback();
                                }
                            })
                        });
                    }
                });

                $select_address_province = $('#select-address-province').selectize({
                    valueField: 'province_id',
                    labelField: 'province',
                    searchField: ['province'],

                    onChange: function(value) {
                        if (!value.length) return;
                        select_address_baranggay.disable();
                        select_address_baranggay.clearOptions();

                        select_address_city.disable();
                        select_address_city.clearOptions();
                        select_address_city.load(function(callback) {
                            if (value == 0) return;
                            xhr && xhr.abort();
                            xhr = $.ajax({
                                url: '/api/address/regions/provinces/' + value + '/cities',
                                success: function(results) {
                                    select_address_city.enable();
                                    callback(results);
                                },
                                error: function() {
                                    callback();
                                }
                            })
                        });
                    }
                });
                select_address_province = $select_address_province[0].selectize;

                $select_address_city = $('#select-address-city').selectize({
                    valueField: 'city_id',
                    labelField: 'city',
                    searchField: ['city'],

                    onChange: function(value) {
                        if (!value.length) return;
                        select_address_baranggay.disable();
                        select_address_baranggay.clearOptions();
                        select_address_baranggay.load(function(callback) {
                            if (value == 0) return;
                            xhr && xhr.abort();
                            xhr = $.ajax({
                                url: '/api/address/regions/provinces/cities/' + value + '/baranggays',
                                success: function(results) {
                                    select_address_baranggay.enable();
                                    callback(results);
                                },
                                error: function() {
                                    callback();
                                }
                            })
                        });
                    }
                });
                select_address_city = $select_address_city[0].selectize;

                $select_address_baranggay = $('#select-address-baranggay').selectize({
                    valueField: 'baranggay_id',
                    labelField: 'baranggay',
                    searchField: ['baranggay'],
                });
                select_address_baranggay = $select_address_baranggay[0].selectize;
            }
        }
    </script>
@endsection
