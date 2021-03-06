@extends('layouts.main')

@section('nav_medical')
    current_section
@endsection

@section('nav_providers')
    act_item
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
                            <li>
                                <a href="#" data-uk-modal="{target:'#modal_update_status'}">Actions</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="uk-display-inline-block"><i class="md-icon md-icon-light material-icons" id="provider_print">&#xE8ad;</i></div>
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
                        <h4 class="heading_a">{{ $provider->physicians->count() }} <span class="sub-heading">Affiliated Physicians</span></h4>
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
                <li><a href="#">Affiliated Physicians</a></li>
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
                            <label>Default Corporate No-Access</label>
                            <input type="text" value="{{ $provider->default_corporate_no_access ? "YES" : "NO" }}" readonly class="md-input label-fixed" />
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
                                <textarea cols="30" rows="2" class="md-input label-fixed" readonly>{{ $provider->completeBusinessAddress() }}</textarea>
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
                    <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Specialization</th>
                            <th>Room No</th>
                            <th>Schedule</th>
                            <th>Contact No.</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Specialization</th>
                            <th>Room No</th>
                            <th>Schedule</th>
                            <th>Contact No.</th>
                        </tr>
                        </tfoot>

                        <tbody>
                            @foreach ($provider->physicians as $key => $physician)
                                <tr>
                                    <td><a href="{{ route('physicians.show', $physician->id) }}">{{ sprintf('%06d', $physician->id) }}</a></td>
                                    <td><a href="{{ route('physicians.show', $physician->id) }}">{{ $physician->fullName() }}</a></td>
                                    <td>{{ optional($physician->specialization)->specialization_name }}</td>
                                    <td>{{ $physician->affiliation->room_no }}</td>
                                    <td>{{ $physician->affiliation->schedule }}</td>
                                    <td>
                                        {{ $physician->mobile_no }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </li>
                <li>
                    <ul class="md-list">
                        @foreach ($provider->providerLogs->sortByDesc('created_at') as $key => $log)
                            <li>
                                <div class="md-list-content">
                                    <span class="md-list-heading"><a href="#">{{ $log->title }}</a></span>
                                    <div class="uk-margin-small-top">
                                    <span class="uk-margin-right">
                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">{{ $log->created_at->toDateTimeString() }}</span>
                                    </span>
                                    @if ($log->createdBy)
                                        <span class="uk-margin-right">
                                            <i class="material-icons">&#xE853;</i> <span class="uk-text-muted uk-text-small">{{ $log->createdBy->fullName() }}</span>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div class="uk-modal" id="modal_update_status">
        <div class="uk-modal-dialog">
            <form action="{{ route('providers.action', $provider->id) }}" method="post">
                {{ csrf_field() }}
                <div class="uk-modal-header">
                    <h3 class="uk-modal-title">Update Status</h3>
                </div>
                <p>
                    You may update the providers's status immediately or you may specify a date where the action will take effect.
                    Terminated provider can <span class="uk-text-bold">no longer be reactivated</span> .
                </p>
                <div class="uk-grid">
                    <div class="uk-width-1-2">
                        <select name="status" class="md-input" style="margin-top: 20px;">
                            <option value="" disabled selected hidden>Action...</option>
                            <option value="suspended">Suspend</option>
                            <option value="accredited">Accredit</option>
                            <option value="disaccredited">Disaccredit</option>
                            <option value="terminated">Terminate</option>
                            <option value="reactivated">Reactivate</option>
                        </select>
                    </div>
                    <div class="uk-width-1-2">
                        <span class="uk-input-group-addon" style="padding-top: 15px;">
                            <input id="check_effective_immediately" type="checkbox" name="effective_immediately" value="1" data-md-icheck/>
                            <label for="check_effective_immediately" class="inline-label">Effective Immediately</label>
                        </span>
                    </div>
                </div>
                <div class="uk-grid uk-margin-large-small">
                    <div class="uk-width-1-1">
                        <div class="uk-form-row" id="row_effectivity_date">
                            <label for="dp_effectivity_date">Effectivity Date</label>
                            <input class="md-input" type="text" name="effectivity_date" value="" id="dp_effectivity_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-margin-medium-top">
                    <div class="uk-form-row">
                        <label>Reason *</label>
                        <textarea cols="30" name="reason" rows="2" class="md-input"></textarea>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-margin-medium-top">
                    <div class="uk-form-row">
                        <label>Remarks</label>
                        <textarea cols="30" name="remarks" rows="2" class="md-input"></textarea>
                    </div>
                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                    <button type="submit" class="md-btn md-btn-flat md-btn-flat-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/assets/js/custom/datatables/datatables.uikit.min.js"></script>
    <script src="/bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $(function() {

            var check_effective_immediately = $('#check_effective_immediately');
            var row_effectivity_date = $('#row_effectivity_date');
            var effectivity_date = $('#dp_effectivity_date');

            check_effective_immediately.on('ifChecked', function (event) {
                effectivity_date.hide();
                row_effectivity_date.hide();
            });

            check_effective_immediately.on('ifUnchecked', function (event) {
                effectivity_date.show();
                row_effectivity_date.show();
            });

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

            var $dt_individual_search = $('#dt_individual_search');
            if($dt_individual_search.length) {

                // Setup - add a text input to each footer cell
                $dt_individual_search.find('tfoot th').each( function() {
                    var title = $dt_individual_search.find('tfoot th').eq( $(this).index() ).text();
                    $(this).html('<input type="text" class="md-input" placeholder="' + title + '" />');
                } );

                // reinitialize md inputs
                altair_md.inputs();

                // DataTable
                var individual_search_table = $dt_individual_search.DataTable();

                // Apply the search
                individual_search_table.columns().every(function() {
                    var that = this;

                    $('input', this.footer()).on('keyup change', function() {
                        that
                            .search( this.value )
                            .draw();
                    } );
                });
            }

            $body.on('click','#provider_print',function(e) {
                e.preventDefault();
                UIkit.modal.confirm('Do you want to print Provider Enrollment Form?', function () {
                    var win = window.open('{{ route('providers.print', $provider->id) }}', '_blank');
                    if (win) {
                        //Browser has allowed it to be opened
                        win.focus();
                    } else {
                        //Browser has blocked it
                        alert('Please allow popups for this website');
                    }
                }, {
                    labels: {
                        'Ok': 'print'
                    }
                });
            });
        });
    </script>
@endsection
