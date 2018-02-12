@extends('layouts.main')

@section('nav_providers')
    current_section
@endsection

@section('breadcrumbs')
    <div id="top_bar">
        <ul id="breadcrumbs">
            <li><a href="{{ route('providers.index') }}">Providers</a></li>
            <li><span>{{ $provider->name }}</span></li>
        </ul>
    </div>
@endsection

@section('page-content')
    <h4 class="heading_b uk-margin-bottom">Providers</h4>
    <div class="md-card">
        <div class="user_heading">
            <div class="user_heading_menu hidden-print">
                <div class="uk-display-inline-block" data-uk-dropdown="{pos:'left-top'}">
                    <i class="md-icon material-icons md-icon-light">&#xE5D4;</i>
                    <div class="uk-dropdown uk-dropdown-small">
                        <ul class="uk-nav">
                            <li><a href="#">Disaccredit</a></li>
                            <li><a href="#">Suspend</a></li>
                            <li><a href="#">Terminate</a></li>
                        </ul>
                    </div>
                </div>
                <div class="uk-display-inline-block"><i class="md-icon md-icon-light material-icons" id="page_print">&#xE8ad;</i></div>
            </div>
            <div class="user_heading_avatar">
                <div class="thumbnail">

                    <img src="/assets/img/clipart_hospital.png"/>
                </div>
            </div>
            <div class="user_heading_content">
                <h2 class="heading_b uk-margin-bottom">
                    <span class="uk-text-truncate">[{{ sprintf('%06d', $provider->id) }}] {{ $provider ->name }}</span>
                    <span class="sub-heading">{{ $provider->address }}</span>
                </h2>
                <ul class="user_stats">
                    <li>
                        <h4 class="heading_a">0 <span class="sub-heading">Physicians</span></h4>
                    </li>
                    <li>
                        <h4 class="heading_a">0 <span class="sub-heading">Transactions</span></h4>
                    </li>
                    <li>
                        <h4 class="heading_a">0 <span class="sub-heading">Claims</span></h4>
                    </li>
                </ul>
            </div>
            <a class="md-fab md-fab-small md-fab-accent hidden-print" href="{{ route('providers.edit', $provider->id) }}">
                <i class="material-icons">&#xE150;</i>
            </a>
        </div>
        <div class="user_content">
            <ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}">
                <li class="uk-active"><a href="#">Details</a></li>
                <li><a href="#">Physicians</a></li>
                <li><a href="#">Logs</a></li>
            </ul>
            <ul id="user_profile_tabs_content" class="uk-switcher uk-margin">
                <li>
                    <h3 class="full_width_in_card heading_c uk-margin-small-top">
                        Information
                    </h3>
                    <div class="uk-grid">
                        <div class="uk-width-medium-2-3 ">
                            <label>Name<span class="req">*</span></label>
                            <input type="text" name="name" value="{{ $provider->name }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-medium-1-3 ">
                            <label>Short Name</label>
                            <input type="text" value="{{ $provider->short_name }}" readonly class="md-input label-fixed"/>
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-medium-1-1 ">
                            <label>Licensed Name</label>
                            <input type="text" value="{{ $provider->licensed_name }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-3">
                            <label>Business Type</label>
                            <input type="text" value="{{ strtoupper($provider->business_type) }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-3">
                            <label>Business Hours</label>
                            <input type="text" value="{{ strtoupper($provider->business_hours) }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-3">
                            <label>Number of Beds</label>
                            <input type="text" value="{{ strtoupper($provider->number_of_beds) }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-2-4">
                            <label>Tax Identification Number</label>
                            <input type="text" value="{{ strtoupper($provider->tin) }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-4">
                            <label>Tax Exempt</label>
                            <input type="text" value="{{ $provider->tax_exempt ? "YES" : "NO" }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-4">
                            <label>Withheld</label>
                            <input type="text" value="{{ $provider->withheld ? "YES" : "NO" }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-2-4">
                            <label>Accreditation Status</label>
                            <input type="text" value="{{ strtoupper($provider->accreditation_status) }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-4">
                            <label>Top Hospital</label>
                            <input type="text" value="{{ $provider->top_hospital ? "YES" : "NO" }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-4">
                            <label>Suspected Fraud</label>
                            <input type="text" value="{{ $provider->suspected_fraud ? "YES" : "NO" }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>Account Name</label>
                            <input type="text" value="{{ strtoupper($provider->bank_account_name) }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-2">
                            <label>Account Number</label>
                            <input type="text" value="{{ strtoupper($provider->bank_account_no) }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>Bank Name</label>
                            <input type="text" value="{{ strtoupper($provider->bank_name) }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-2">
                            <label>Bank Branch</label>
                            <input type="text" value="{{ strtoupper($provider->bank_branch) }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>PHIC Accreditation Start Date</label>
                            <input type="text" value="{{ optional($provider->phic_accreditation_from)->toFormattedDateString() }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-2">
                            <label>PHIC Accreditation End Date</label>
                            <input type="text" value="{{ optional($provider->phic_accreditation_to)->toFormattedDateString() }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                <label>Business Address</label>
                                <textarea cols="30" rows="2" class="md-input label-fixed" readonly>{{ $provider->address }}</textarea>
                            </div>
                        </div>
                    </div>
                    <h3 class="full_width_in_card heading_c uk-margin-large-top">
                        Payment
                    </h3>
                    <div class="uk-grid">
                        <div class="uk-width-1-3">
                            <label>Payment Setup</label>
                            <input type="text" value="{{ strtoupper($provider->payment_setup) }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-3">
                            <label>Payment Terms</label>
                            <input type="text" value="{{ strtoupper($provider->payment_terms) . " Days" }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-3">
                            <label>Submission of Claims</label>
                            <input type="text" value="{{ strtoupper($provider->submission_of_claims) . " Days" }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label for="masked_cashbond">Cash Bond</label>
                            <input class="md-input masked_input" value="{{ $provider->cash_bond }}" id="masked_cash_bond" type="text" data-inputmask="'alias': 'currency', 'groucashpSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" readonly/>
                        </div>
                        <div class="uk-width-1-2">
                            <label for="masked_credit_limit">Credit Limit</label>
                            <input class="md-input masked_input" value="{{ $provider->credit_limit }}" id="masked_credit_limit" type="text" data-inputmask="'alias': 'currency', 'groucashpSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" readonly/>
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-3">
                            <label>Prompt Payment Discount</label>
                            <input type="text" value="{{ $provider->prompt_payment_discount ? "YES" : "NO" }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-3">
                            <label>Prompt Payment Discount Terms</label>
                            <input type="text" value="{{ strtoupper($provider->prompt_payment_discount_terms) }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-3">
                            <label for="masked_prompt_payment_discount_rate">Prompt Payment Discount Rate (0.5%- 20%)</label>
                            <input class="md-input masked_input label-fixed" value="{{ $provider->prompt_payment_discount_rate }}" id="masked_prompt_payment_discount_rate" type="text"
                                data-inputmask="'alias': 'currency', 'prefix': '', 'suffix': ' %' " data-inputmask-showmaskonhover="false" readonly />
                        </div>
                    </div>
                    <div class="uk-grid uk-margin-large-top">
                        <div class="uk-width-1-2">
                            <h3 class="heading_c uk-margin-small-bottom"><u>In-patient / OPD-OR</u></h3>

                            <div class="uk-input-group">
                                <span class="uk-input-group-addon">
                                    <input id="check_ip_opd_or_whole" type="checkbox" {{ $provider->ip_opd_or_whole ? "checked" : "" }} data-md-icheck/>
                                    <label for="check_ip_opd_or_whole" class="inline-label">Whole</label>
                                </span>
                                <input type="text" value="{{ strtoupper($provider->ip_opd_or_whole_through) }}" readonly class="md-input label-fixed" />
                            </div>

                            <div class="uk-input-group">
                                <span class="uk-input-group-addon">
                                    <input id="check_ip_opd_or_split_hb_hospital" type="checkbox" {{ $provider->ip_opd_or_split_hb_hospital ? "checked" : "" }} data-md-icheck/>
                                    <label for="check_ip_opd_or_split_hb_hospital" class="inline-label">Split - HB to Hospital</label>
                                </span>
                                <input type="text" value="{{ strtoupper($provider->ip_opd_or_split_hb_hospital_through) }}" readonly class="md-input label-fixed" />
                            </div>

                            <div class="uk-input-group">
                                <span class="uk-input-group-addon">
                                    <input id="check_ip_opd_or_split_pf_doctor" type="checkbox" {{ $provider->ip_opd_or_split_pf_doctor ? "checked" : "" }} data-md-icheck/>
                                    <label for="check_ip_opd_or_split_pf_doctor" class="inline-label">Split - PF to Doctor</label>
                                </span>
                                <input type="text" value="{{ strtoupper($provider->ip_opd_or_split_pf_doctor_through) }}" readonly class="md-input label-fixed" />
                            </div>

                        </div>
                        <div class="uk-width-1-2">
                            <h3 class="heading_c uk-margin-small-bottom"><u>Emergency</u></h3>

                            <div class="uk-input-group">
                                <span class="uk-input-group-addon">
                                    <label class="inline-label">Paid to Hospital</label>
                                </span>
                                <input type="text" value="{{ strtoupper($provider->emergency_paid_to_hospital_through) }}" readonly class="md-input label-fixed" />
                            </div>

                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <h3 class="heading_c uk-margin-small-bottom"><u>OP-Consult/Referral</u></h3>

                            <div class="uk-input-group">
                                <span class="uk-input-group-addon">
                                    <input id="check_op_consult_referral_paid_to_hospital" type="checkbox" {{ $provider->op_consult_referral_paid_to_hospital ? "checked" : "" }} data-md-icheck/>
                                    <label for="check_op_consult_referral_paid_to_hospital" class="inline-label">Paid to Hospital</label>
                                </span>
                                <input type="text" value="{{ strtoupper($provider->op_consult_referral_paid_to_hospital_through) }}" readonly class="md-input label-fixed" />
                            </div>

                            <div class="uk-input-group">
                                <span class="uk-input-group-addon">
                                    <input id="check_op_consult_referral_paid_to_doctor" type="checkbox" name="op_consult_referral_paid_to_doctor" {{ $provider->op_consult_referral_paid_to_doctor ? "checked" : ""}} data-md-icheck/>
                                    <label for="check_op_consult_referral_paid_to_doctor" class="inline-label">Paid to Doctor</label>
                                </span>
                                <input type="text" value="{{ strtoupper($provider->op_consult_referral_paid_to_doctor_through) }}" readonly class="md-input label-fixed" />
                            </div>

                        </div>
                        <div class="uk-width-1-2">
                            <h3 class="heading_c uk-margin-small-bottom"><u>OP-Lab/APE/Facility Fee</u></h3>

                            <div class="uk-input-group">
                                <span class="uk-input-group-addon">
                                    <label class="inline-label">Paid to Hospital</label>
                                </span>
                                <input type="text" value="{{ strtoupper($provider->op_lab_ape_facility_fee_paid_to_hospital_through) }}" readonly class="md-input label-fixed" />
                            </div>

                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <h3 class="heading_c uk-margin-small-bottom"><u>Clinic Setting</u></h3>

                            <div class="uk-input-group">
                                <span class="uk-input-group-addon">
                                    <input id="check_clinic_setting_paid_to_hospital" type="checkbox" {{ $provider->clinic_setting_paid_to_hospital ? "checked" : "" }} data-md-icheck/>
                                    <label for="check_clinic_setting_paid_to_hospital" class="inline-label">Paid to Hospital</label>
                                </span>
                                <input type="text" value="{{ strtoupper($provider->clinic_setting_paid_to_hospital_through) }}" readonly class="md-input label-fixed" />
                            </div>

                            <div class="uk-input-group">
                                <span class="uk-input-group-addon">
                                    <input id="check_clinic_setting_paid_to_doctor" type="checkbox" {{ $provider->clinic_setting_paid_to_doctor ? "checked" : "" }} data-md-icheck/>
                                    <label for="check_clinic_setting_paid_to_doctor" class="inline-label">Paid to Doctor</label>
                                </span>
                                <input type="text" value="{{ strtoupper($provider->clinic_setting_paid_to_doctor_through) }}" readonly class="md-input label-fixed" />
                            </div>

                        </div>
                    </div>
                    <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Check Delivery</h3>
                    <div class="uk-grid">
                        <div class="uk-width-2-3">
                            <label>Name</label>
                            <input type="text" name="check_delivery_contact_person" value="{{ $provider->check_delivery_contact_person }}" class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-3">
                            <label>Contact Number</label>
                            <input type="text" name="check_delivery_contact_no" value="{{ $provider->check_delivery_contact_no }}" class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <label>Department</label>
                            <input type="text" name="check_delivery_department" value="{{ $provider->check_delivery_department }}" class="md-input label-fixed" />
                        </div>
                    </div>
                    <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Professional Fees</h3>
                    <div class="uk-grid">
                        <div class="uk-width-1-4">
                            <label>With MC</label>
                            <input type="text" value="{{ $provider->with_mc ? "YES" : "NO" }}" class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-2-4">
                            <label>Doctor's Name</label>
                            <input type="text" value="{{ $provider->mc_name }}" class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-4">
                            <label>Specialization</label>
                            <input type="text" value="{{ $provider->mc_specialization }}" class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-3">
                            <label>Secretary Name</label>
                            <input type="text" value="{{ $provider->mc_secretary_name }}" class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-3">
                            <label>Clinic Hours</label>
                            <input type="text" value="{{ $provider->mc_clinic_hours }}" class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-3">
                            <label>Room No</label>
                            <input type="text" value="{{ $provider->mc_room_no }}" class="md-input label-fixed">
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-3">
                            <label>Contact No</label>
                            <input type="text" name="" value="{{ $provider->mc_contact_no }}" class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-3">
                            <label for="masked_mc_ip_fee">MC IP Fee</label>
                            <input class="md-input masked_input" value="{{ $provider->mc_ip_fee }}" id="masked_mc_ip_fee" type="text" data-inputmask="'alias': 'currency', 'groucashpSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" readonly/>
                        </div>
                        <div class="uk-width-1-3">
                            <label for="masked_mc_op_fee">MC OP Fee</label>
                            <input class="md-input masked_input" value="{{ $provider->mc_op_fee }}" id="masked_mc_op_fee" type="text" data-inputmask="'alias': 'currency', 'groucashpSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" readonly/>
                        </div>
                    </div>
                    <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">In-patient PF Rates</h3>
                    <div class="uk-grid">
                        <div class="uk-width-medium-1-3">
                            <label for="masked_ip_rates_ward">Ward</label>
                            <input class="md-input masked_input label-fixed" value="{{ $provider->ip_rates_ward }}" readonly id="masked_ip_rates_ward" type="text" data-inputmask="'alias': 'currency', 'groucashpSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                        </div>
                        <div class="uk-width-medium-1-3">
                            <label for="masked_ip_rates_semi_private">Semi-Private</label>
                            <input class="md-input masked_input label-fixed" value="{{ $provider->ip_rates_semi_private }}" readonly id="masked_ip_rates_semi_private" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                        </div>
                        <div class="uk-width-medium-1-3">
                            <label for="masked_ip_rates_private">Private</label>
                            <input class="md-input masked_input label-fixed" value="{{ $provider->ip_rates_private }}" readonly id="masked_ip_rates_private" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-medium-1-3">
                            <label for="masked_ip_rates_suite">Suite</label>
                            <input class="md-input masked_input label-fixed" value="{{ $provider->ip_rates_suite }}" readonly id="masked_ip_rates_suite" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                        </div>
                        <div class="uk-width-medium-1-3">
                            <label for="masked_ip_rates_icu">ICU</label>
                            <input class="md-input masked_input label-fixed" value="{{ $provider->ip_rates_icu }}" readonly id="masked_ip_rates_icu" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                        </div>
                        <div class="uk-width-medium-1-3">
                            <label for="masked_ip_rates_anes">Anes</label>
                            <input class="md-input masked_input label-fixed" value="{{ $provider->ip_rates_anes }}" readonly id="masked_ip_rates_anes" type="text" data-inputmask="'alias': 'currency', 'prefix': '', 'suffix': ' %' " data-inputmask-showmaskonhover="false" />
                        </div>
                    </div>
                    <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Out-patient PF Rates</h3>
                    <div class="uk-grid">
                        <div class="uk-width-medium-1-2">
                            <label for="masked_currency">PCP</label>
                            <input class="md-input masked_input" value="{{ $provider->op_rates_pcp }}" id="masked_currency" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                        </div>
                        <div class="uk-width-medium-1-2">
                            <label for="masked_currency">Specialist</label>
                            <input class="md-input masked_input" value="{{ $provider->op_rates_specialist }}" id="masked_currency" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                        </div>
                    </div>
                    <h3 class="full_width_in_card heading_c uk-margin-large-top">
                        Contact Persons
                    </h3>
                    @php $departments = ['HMO / Industrial', 'Admitting', 'Emergency', 'Billing', 'Credit and Collection']; @endphp
                    @foreach ($departments as $key => $department)
                        @php
                            $providerContactPerson = $provider->providerContactPersons->where('department', $department)->first();
                        @endphp
                        <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">{{ $department }}</h3>
                        <div class="uk-grid">
                            <div class="uk-width-2-4">
                                <label>Name</label>
                                <input type="text" class="md-input label-fixed" value="{{ optional($providerContactPerson)->name }}"/>
                            </div>
                            <div class="uk-width-1-4">
                                <label>Designation</label>
                                <input type="text" class="md-input label-fixed" value="{{ optional($providerContactPerson)->designation }}">
                            </div>
                            <div class="uk-width-1-4">
                                <label>Mobile No</label>
                                <input type="text" class="md-input label-fixed" value="{{ optional($providerContactPerson)->mobile_no }}">
                            </div>
                        </div>
                        <div class="uk-grid">
                            <div class="uk-width-1-3">
                                <label for="wizard_phone">Email</label>
                                <input type="text" class="md-input label-fixed" value="{{ optional($providerContactPerson)->email }}"/>
                            </div>
                            <div class="uk-width-1-3">
                                <label for="wizard_phone">Fax Number</label>
                                <input type="text" class="md-input label-fixed" value="{{ optional($providerContactPerson)->fax_no }}"/>
                            </div>
                            <div class="uk-width-1-3">
                                <label for="wizard_phone">Landline Number</label>
                                <input type="text" class="md-input label-fixed" value="{{ optional($providerContactPerson)->telephone_no }}"/>
                            </div>
                        </div>
                    @endforeach
                    <h3 class="full_width_in_card heading_c uk-margin-large-top">
                        Others
                    </h3>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <label>Mode of Releasing</label>
                            <input type="text" class="md-input label-fixed" value="{{ strtoupper($provider->mode_of_releasing) }}">
                        </div>
                    </div>
                    <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Accreditation</h3>
                    <div class="uk-grid">
                        <div class="uk-width-1-3">
                            <label>Doctor Accreditation</label>
                            <input type="text" class="md-input label-fixed" value="{{ strtoupper($provider->doctor_accreditation) }}">
                        </div>
                        <div class="uk-width-1-3">
                            <label>Accreditation Date</label>
                            <input type="text" value="{{ optional($provider->accreditation_date)->toFormattedDateString() }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-3">
                            <label>Disaccreditation Date</label>
                            <input type="text" value="{{ optional($provider->disaccreditation_date)->toFormattedDateString() }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Signatories</h3>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>Left Name</label>
                            <input type="text" value="{{ $provider->signatory_left_name }}" class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-2">
                            <label>Right Name</label>
                            <input type="text" value="{{ $provider->signatory_left_designation }}" class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>Left Designation</label>
                            <input type="text" value="{{ $provider->signatory_right_name }}" class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-2">
                            <label>Right Designation</label>
                            <input type="text" value="{{ $provider->signatory_right_designation }}" class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-medium-1-2">
                            <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Internet Connectivity</h3>
                            <p class="uk-margin-medium-top">
                                <input type="checkbox" id="check_internet_access_industrial" {{ $provider->internet_access_industrial ? "checked" : "" }} data-md-icheck />
                                <label for="check_internet_access_industrial" class="inline-label">Industrial Department</label>
                            </p>
                            <p>
                                <input type="checkbox" name="internet_access_billing" value="1" id="check_internet_access_billing" {{ $provider->internet_access_billing ? "checked" : "" }} data-md-icheck/>
                                <label for="check_internet_access_billing" class="inline-label">Billing Department</label>
                            </p>
                            <p>
                                <input type="checkbox" name="internet_access_emergency" value="1" id="check_internet_access_emergency" {{ $provider->internet_access_emergency ? "checked" : "" }} data-md-icheck/>
                                <label for="check_internet_access_emergency" class="inline-label">Emergency Department</label>
                            </p>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Areas with Free Wi-Fi</h3>
                            <p class="uk-margin-medium-top">
                                <input type="checkbox" name="free_wifi_industrial_hmo" value="1" id="check_free_wifi_industrial_hmo" {{ $provider->free_wifi_industrial_hmo ? "checked" : "" }} data-md-icheck/>
                                <label for="check_free_wifi_industrial_hmo" class="inline-label">HMO / Industrial Department</label>
                            </p>
                            <p>
                                <input type="checkbox" name="free_wifi_ip_rooms" value="1" id="check_free_wifi_ip_rooms" {{ $provider->free_wifi_ip_rooms ? "checked" : "" }} data-md-icheck/>
                                <label for="check_free_wifi_ip_rooms" class="inline-label">Hospital In-Patient Rooms</label>
                            </p>
                            <p>
                                <input type="checkbox" name="free_wifi_emergency" value="1" id="check_free_wifi_emergency" {{ $provider->free_wifi_emergency ? "checked" : "" }} data-md-icheck/>
                                <label for="check_free_wifi_emergency" class="inline-label">Emergency Department</label>
                            </p>
                            <p>
                                <input type="checkbox" name="free_wifi_mab" value="1" id="check_free_wifi_mab" data-md-icheck {{ $provider->free_wifi_mab ? "checked" : "" }}/>
                                <label for="check_free_wifi_mab" class="inline-label">MAB</label>
                            </p>
                        </div>
                    </div>
                    <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Orientation</h3>
                    <div class="uk-grid">
                        <div class="uk-width-2-3">
                            <label>Oreintation Contact Person</label>
                            <input type="text" value="{{ $provider->orientation_contact_person }}" class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-3">
                            <label>Orientation Date</label>
                            <input type="text" value="{{ optional($provider->orientation_date)->toFormattedDateString() }}" class="md-input label-fixed">
                        </div>
                    </div>

                    <h3 class="heading_c uk-margin-small-bottom"><u>Sign off Document:</u></h3>
                    <div id="user_profile_gallery" data-uk-check-display class="uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-2" data-uk-grid="{gutter: 4}">
                        <div>
                            <a href="/storage/{{ $provider->sign_off_document_url }}" data-uk-lightbox="{group:'user-photos'}">
                                <img src="/storage/{{ $provider->sign_off_document_url }}" alt=""/>
                            </a>
                        </div>
                    </div>

                    <div class="uk-grid uk-margin-large-top">
                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                <label>Remarks</label>
                                <textarea cols="30" rows="2" class="md-input label-fixed" readonly>{{ $provider->remarks }}</textarea>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <table id="dt_scroll" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                        </tr>
                        <tr>
                            <td>Cedric Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2012/03/29</td>
                            <td>$433,060</td>
                        </tr>
                        <tr>
                            <td>Airi Satou</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>33</td>
                            <td>2008/11/28</td>
                            <td>$162,700</td>
                        </tr>
                        <tr>
                            <td>Brielle Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>
                            <td>2012/12/02</td>
                            <td>$372,000</td>
                        </tr>
                        <tr>
                            <td>Herrod Chandler</td>
                            <td>Sales Assistant</td>
                            <td>San Francisco</td>
                            <td>59</td>
                            <td>2012/08/06</td>
                            <td>$137,500</td>
                        </tr>
                        <tr>
                            <td>Rhona Davidson</td>
                            <td>Integration Specialist</td>
                            <td>Tokyo</td>
                            <td>55</td>
                            <td>2010/10/14</td>
                            <td>$327,900</td>
                        </tr>
                        <tr>
                            <td>Colleen Hurst</td>
                            <td>Javascript Developer</td>
                            <td>San Francisco</td>
                            <td>39</td>
                            <td>2009/09/15</td>
                            <td>$205,500</td>
                        </tr>
                        <tr>
                            <td>Sonya Frost</td>
                            <td>Software Engineer</td>
                            <td>Edinburgh</td>
                            <td>23</td>
                            <td>2008/12/13</td>
                            <td>$103,600</td>
                        </tr>
                        <tr>
                            <td>Jena Gaines</td>
                            <td>Office Manager</td>
                            <td>London</td>
                            <td>30</td>
                            <td>2008/12/19</td>
                            <td>$90,560</td>
                        </tr>
                        <tr>
                            <td>Quinn Flynn</td>
                            <td>Support Lead</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2013/03/03</td>
                            <td>$342,000</td>
                        </tr>
                        <tr>
                            <td>Charde Marshall</td>
                            <td>Regional Director</td>
                            <td>San Francisco</td>
                            <td>36</td>
                            <td>2008/10/16</td>
                            <td>$470,600</td>
                        </tr>
                        <tr>
                            <td>Haley Kennedy</td>
                            <td>Senior Marketing Designer</td>
                            <td>London</td>
                            <td>43</td>
                            <td>2012/12/18</td>
                            <td>$313,500</td>
                        </tr>
                        <tr>
                            <td>Tatyana Fitzpatrick</td>
                            <td>Regional Director</td>
                            <td>London</td>
                            <td>19</td>
                            <td>2010/03/17</td>
                            <td>$385,750</td>
                        </tr>
                        <tr>
                            <td>Michael Silva</td>
                            <td>Marketing Designer</td>
                            <td>London</td>
                            <td>66</td>
                            <td>2012/11/27</td>
                            <td>$198,500</td>
                        </tr>
                        <tr>
                            <td>Paul Byrd</td>
                            <td>Chief Financial Officer (CFO)</td>
                            <td>New York</td>
                            <td>64</td>
                            <td>2010/06/09</td>
                            <td>$725,000</td>
                        </tr>
                        <tr>
                            <td>Gloria Little</td>
                            <td>Systems Administrator</td>
                            <td>New York</td>
                            <td>59</td>
                            <td>2009/04/10</td>
                            <td>$237,500</td>
                        </tr>
                        <tr>
                            <td>Bradley Greer</td>
                            <td>Software Engineer</td>
                            <td>London</td>
                            <td>41</td>
                            <td>2012/10/13</td>
                            <td>$132,000</td>
                        </tr>
                        <tr>
                            <td>Dai Rios</td>
                            <td>Personnel Lead</td>
                            <td>Edinburgh</td>
                            <td>35</td>
                            <td>2012/09/26</td>
                            <td>$217,500</td>
                        </tr>
                        <tr>
                            <td>Jenette Caldwell</td>
                            <td>Development Lead</td>
                            <td>New York</td>
                            <td>30</td>
                            <td>2011/09/03</td>
                            <td>$345,000</td>
                        </tr>
                        <tr>
                            <td>Yuri Berry</td>
                            <td>Chief Marketing Officer (CMO)</td>
                            <td>New York</td>
                            <td>40</td>
                            <td>2009/06/25</td>
                            <td>$675,000</td>
                        </tr>
                        <tr>
                            <td>Caesar Vance</td>
                            <td>Pre-Sales Support</td>
                            <td>New York</td>
                            <td>21</td>
                            <td>2011/12/12</td>
                            <td>$106,450</td>
                        </tr>
                        <tr>
                            <td>Doris Wilder</td>
                            <td>Sales Assistant</td>
                            <td>Sidney</td>
                            <td>23</td>
                            <td>2010/09/20</td>
                            <td>$85,600</td>
                        </tr>
                        <tr>
                            <td>Angelica Ramos</td>
                            <td>Chief Executive Officer (CEO)</td>
                            <td>London</td>
                            <td>47</td>
                            <td>2009/10/09</td>
                            <td>$1,200,000</td>
                        </tr>
                        <tr>
                            <td>Gavin Joyce</td>
                            <td>Developer</td>
                            <td>Edinburgh</td>
                            <td>42</td>
                            <td>2010/12/22</td>
                            <td>$92,575</td>
                        </tr>
                        <tr>
                            <td>Jennifer Chang</td>
                            <td>Regional Director</td>
                            <td>Singapore</td>
                            <td>28</td>
                            <td>2010/11/14</td>
                            <td>$357,650</td>
                        </tr>
                        <tr>
                            <td>Brenden Wagner</td>
                            <td>Software Engineer</td>
                            <td>San Francisco</td>
                            <td>28</td>
                            <td>2011/06/07</td>
                            <td>$206,850</td>
                        </tr>
                        <tr>
                            <td>Fiona Green</td>
                            <td>Chief Operating Officer (COO)</td>
                            <td>San Francisco</td>
                            <td>48</td>
                            <td>2010/03/11</td>
                            <td>$850,000</td>
                        </tr>
                        <tr>
                            <td>Shou Itou</td>
                            <td>Regional Marketing</td>
                            <td>Tokyo</td>
                            <td>20</td>
                            <td>2011/08/14</td>
                            <td>$163,000</td>
                        </tr>
                        <tr>
                            <td>Michelle House</td>
                            <td>Integration Specialist</td>
                            <td>Sidney</td>
                            <td>37</td>
                            <td>2011/06/02</td>
                            <td>$95,400</td>
                        </tr>
                        <tr>
                            <td>Suki Burks</td>
                            <td>Developer</td>
                            <td>London</td>
                            <td>53</td>
                            <td>2009/10/22</td>
                            <td>$114,500</td>
                        </tr>
                        <tr>
                            <td>Prescott Bartlett</td>
                            <td>Technical Author</td>
                            <td>London</td>
                            <td>27</td>
                            <td>2011/05/07</td>
                            <td>$145,000</td>
                        </tr>
                        <tr>
                            <td>Gavin Cortez</td>
                            <td>Team Leader</td>
                            <td>San Francisco</td>
                            <td>22</td>
                            <td>2008/10/26</td>
                            <td>$235,500</td>
                        </tr>
                        <tr>
                            <td>Martena Mccray</td>
                            <td>Post-Sales support</td>
                            <td>Edinburgh</td>
                            <td>46</td>
                            <td>2011/03/09</td>
                            <td>$324,050</td>
                        </tr>
                        <tr>
                            <td>Unity Butler</td>
                            <td>Marketing Designer</td>
                            <td>San Francisco</td>
                            <td>47</td>
                            <td>2009/12/09</td>
                            <td>$85,675</td>
                        </tr>
                        <tr>
                            <td>Howard Hatfield</td>
                            <td>Office Manager</td>
                            <td>San Francisco</td>
                            <td>51</td>
                            <td>2008/12/16</td>
                            <td>$164,500</td>
                        </tr>
                        <tr>
                            <td>Hope Fuentes</td>
                            <td>Secretary</td>
                            <td>San Francisco</td>
                            <td>41</td>
                            <td>2010/02/12</td>
                            <td>$109,850</td>
                        </tr>
                        <tr>
                            <td>Vivian Harrell</td>
                            <td>Financial Controller</td>
                            <td>San Francisco</td>
                            <td>62</td>
                            <td>2009/02/14</td>
                            <td>$452,500</td>
                        </tr>
                        <tr>
                            <td>Timothy Mooney</td>
                            <td>Office Manager</td>
                            <td>London</td>
                            <td>37</td>
                            <td>2008/12/11</td>
                            <td>$136,200</td>
                        </tr>
                        <tr>
                            <td>Jackson Bradshaw</td>
                            <td>Director</td>
                            <td>New York</td>
                            <td>65</td>
                            <td>2008/09/26</td>
                            <td>$645,750</td>
                        </tr>
                        <tr>
                            <td>Olivia Liang</td>
                            <td>Support Engineer</td>
                            <td>Singapore</td>
                            <td>64</td>
                            <td>2011/02/03</td>
                            <td>$234,500</td>
                        </tr>
                        <tr>
                            <td>Bruno Nash</td>
                            <td>Software Engineer</td>
                            <td>London</td>
                            <td>38</td>
                            <td>2011/05/03</td>
                            <td>$163,500</td>
                        </tr>
                        <tr>
                            <td>Sakura Yamamoto</td>
                            <td>Support Engineer</td>
                            <td>Tokyo</td>
                            <td>37</td>
                            <td>2009/08/19</td>
                            <td>$139,575</td>
                        </tr>
                        <tr>
                            <td>Thor Walton</td>
                            <td>Developer</td>
                            <td>New York</td>
                            <td>61</td>
                            <td>2013/08/11</td>
                            <td>$98,540</td>
                        </tr>
                        <tr>
                            <td>Finn Camacho</td>
                            <td>Support Engineer</td>
                            <td>San Francisco</td>
                            <td>47</td>
                            <td>2009/07/07</td>
                            <td>$87,500</td>
                        </tr>
                        <tr>
                            <td>Serge Baldwin</td>
                            <td>Data Coordinator</td>
                            <td>Singapore</td>
                            <td>64</td>
                            <td>2012/04/09</td>
                            <td>$138,575</td>
                        </tr>
                        <tr>
                            <td>Zenaida Frank</td>
                            <td>Software Engineer</td>
                            <td>New York</td>
                            <td>63</td>
                            <td>2010/01/04</td>
                            <td>$125,250</td>
                        </tr>
                        <tr>
                            <td>Zorita Serrano</td>
                            <td>Software Engineer</td>
                            <td>San Francisco</td>
                            <td>56</td>
                            <td>2012/06/01</td>
                            <td>$115,000</td>
                        </tr>
                        <tr>
                            <td>Jennifer Acosta</td>
                            <td>Junior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>43</td>
                            <td>2013/02/01</td>
                            <td>$75,650</td>
                        </tr>
                        <tr>
                            <td>Cara Stevens</td>
                            <td>Sales Assistant</td>
                            <td>New York</td>
                            <td>46</td>
                            <td>2011/12/06</td>
                            <td>$145,600</td>
                        </tr>
                        <tr>
                            <td>Hermione Butler</td>
                            <td>Regional Director</td>
                            <td>London</td>
                            <td>47</td>
                            <td>2011/03/21</td>
                            <td>$356,250</td>
                        </tr>
                        <tr>
                            <td>Lael Greer</td>
                            <td>Systems Administrator</td>
                            <td>London</td>
                            <td>21</td>
                            <td>2009/02/27</td>
                            <td>$103,500</td>
                        </tr>
                        <tr>
                            <td>Jonas Alexander</td>
                            <td>Developer</td>
                            <td>San Francisco</td>
                            <td>30</td>
                            <td>2010/07/14</td>
                            <td>$86,500</td>
                        </tr>
                        <tr>
                            <td>Shad Decker</td>
                            <td>Regional Director</td>
                            <td>Edinburgh</td>
                            <td>51</td>
                            <td>2008/11/13</td>
                            <td>$183,000</td>
                        </tr>
                        <tr>
                            <td>Michael Bruce</td>
                            <td>Javascript Developer</td>
                            <td>Singapore</td>
                            <td>29</td>
                            <td>2011/06/27</td>
                            <td>$183,000</td>
                        </tr>
                        <tr>
                            <td>Donna Snider</td>
                            <td>Customer Support</td>
                            <td>New York</td>
                            <td>27</td>
                            <td>2011/01/25</td>
                            <td>$112,000</td>
                        </tr>
                        </tbody>
                    </table>
                </li>
                <li>
                    <ul class="md-list">
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Nemo dolorem veniam voluptas aut.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">28 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">1</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">615</span>
                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Dolor aliquid atque aliquam odit libero minus.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">07 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">12</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">926</span>
                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Qui vel magnam sit.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">13 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">28</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">152</span>
                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Velit qui ut et quo mollitia.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">16 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">8</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">177</span>
                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Deleniti quibusdam ut dolor sunt laborum.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">27 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">4</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">818</span>
                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Laboriosam voluptatum ab qui dolorum maxime.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">15 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">14</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">804</span>
                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Maxime doloremque numquam consequatur.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">03 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">16</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">300</span>
                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Esse sit cupiditate eos.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">07 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">24</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">584</span>
                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Consequatur cum sunt magni a rerum voluptatem.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">08 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">12</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">612</span>
                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Asperiores maxime vel et quia veniam possimus molestias aut.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">15 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">13</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">719</span>
                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Iste perspiciatis rerum voluptate et aut praesentium rerum sit.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">11 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">12</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">741</span>
                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Rerum omnis et sint exercitationem facere pariatur voluptatem.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">27 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">18</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">219</span>
                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Ut natus quo sunt laboriosam aut voluptates vero.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">25 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">1</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">197</span>
                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Molestias qui omnis quia.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">27 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">16</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">451</span>
                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Vel pariatur consequuntur eligendi eveniet quas nihil cumque.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">29 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">13</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">571</span>
                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Excepturi ut quisquam officia voluptatem possimus est rerum.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">23 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">26</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">104</span>
                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Provident in autem eius sed id.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">17 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">28</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">618</span>
                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Eos quia hic laborum enim facere non impedit.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">23 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">5</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">457</span>
                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Dolores et explicabo veritatis quaerat suscipit facilis.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">10 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">11</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">832</span>
                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Pariatur quaerat quae reiciendis tenetur nihil similique.</a></span>
                                <div class="uk-margin-small-top">
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">26 Oct 2016</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">25</span>
                                </span>
                                <span class="uk-margin-right">
                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">340</span>
                                </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/assets/js/custom/datatables/datatables.uikit.min.js"></script>
    <script src="/bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $(function() {

            var $dt_scroll = $('#dt_scroll');
            if($dt_scroll.length) {
                $dt_scroll.DataTable({
                    "bLengthChange": false,
                    "paging": true
                });
            }

            $maskedInput = $('.masked_input').inputmask();
            if($maskedInput.length) {
                $maskedInput.inputmask();
            }

        });
    </script>
@endsection
