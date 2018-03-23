@php
    $planBenefitLimit = $plan->planBenefitLimit;
    $planCoverage = $plan->planCoverage;
@endphp

@extends('layouts.main')

@section('nav_corporate')
    current_selection
@endsection

@section('nav_corporate_plans')
    act_item
@endsection

@section('breadcrumbs')
    <div id="top_bar">
        <ul id="breadcrumbs">
            <li><a href="{{ route('plans.index') }}">Plans and Coverage</a></li>
            <li><a href="{{ route('plans.show', $plan->id) }}">{{ $plan->name }}</a></li>
            <li><span>Edit</span> </li>
        </ul>
    </div>
@endsection

@section('page-content')
    <h4 class="heading_b uk-margin-bottom">Plans and Coverage</h4>

    @if ($errors->any())
        <div class="uk-alert uk-alert-danger" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            @foreach ($errors->all() as $error)
                <span> &nbsp;&nbsp;- {{ $error }}</span><br>
            @endforeach
        </div>
    @endif

    <div class="md-card" style="padding: 20px;">
        <div class="md-card-content">
            <h2 class="heading_a">
                Edit Plan
                <span class="sub-heading">Fill up all the required fields and click submit</span>
            </h2>
            <hr class="md-hr"/>
            <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#tabs_anim2', animation:'slide-horizontal'}">
                <li class="uk-active"><a href="#">Plan Information</a></li>
                <li class="uk-width-1-6"><a href="#">Coverage</a></li>
                <li class="uk-width-1-6"><a href="#">Benefit Limit</a></li>
            </ul>

            <form class="" action="{{ route('plans.update', $plan->id) }}" method="post">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <ul id="tabs_anim2" class="uk-switcher uk-margin">
                    {{-- START PLAN INFORMATION --}}
                    <li>
                        <div class="md-card-content">
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <select id="select_demo_4" name="corporate_id" data-md-selectize>
                                        <option value="">Corporate*...</option>
                                        @foreach ($corporates as $key => $corporate)
                                            @if ($errors->any())
                                                <option value="{{ $corporate->id }}" @if(old('corporate_id') == $corporate->id) selected @endif>
                                                    {{ $corporate->name }}
                                                </option>
                                            @else
                                                <option value="{{ $corporate->id }}" @if($plan->corporate_id == $corporate->id) selected @endif>
                                                    {{ $corporate->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <label>Name <span class="req uk-text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') ?: $plan->name }}" class="md-input {{ $errors->has('name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-large-1-2 uk-width-1-1">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <label for="dp_phic_accreditation_from">Start Date <span class="req uk-text-danger">*</span></label>
                                        <input class="md-input {{ $errors->has('start_date') ? ' md-input-danger' : '' }}" type="text" name="start_date" value="{{ old('start_date') ?: $plan->start_date->format('Y-m-d') }}" id="plan_start">
                                    </div>
                                </div>
                                <div class="uk-width-large-1-2 uk-width-medium-1-1">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <label for="dp_phic_accreditation_to">End Date <span class="req uk-text-danger">*</span></label>
                                        <input class="md-input {{ $errors->has('end_date') ? ' md-input-danger' : '' }}" type="text" name="end_date" value="{{ old('end_date') ?: $plan->end_date->format('Y-m-d') }}" id="plan_end">
                                    </div>
                                </div>
                            </div>
                            <div class="uk-grid" style="margin-top: 40px;">
                                <div class="uk-width-1-1">
                                    <p>
                                        @if ($errors->any())
                                            <input type="checkbox" name="shared_limit" value="1" id="check_shared_limit" data-md-icheck @if(old('shared_limit')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="shared_limit" value="1" id="check_shared_limit" data-md-icheck @if($plan->shared_limit) checked @endif/>
                                        @endif
                                        <label for="check_shared_limit" class="inline-label">Shared Limit</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="checkbox" name="cover_preexisting" value="1" id="check_cover_preexisting" data-md-icheck @if(old('cover_preexisting')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="cover_preexisting" value="1" id="check_cover_preexisting" data-md-icheck @if($plan->cover_preexisting) checked @endif/>
                                        @endif
                                        <label for="check_cover_preexisting" class="inline-label">Cover Pre-existing</label>
                                    </p>
                                </div>
                            </div>
                            <div class="uk-grid" style="margin-top: 40px;">
                                <div class="uk-width-1-2">
                                    <h3 class="heading_c"><u>Plan Type</u> </h3><p></p>
                                    <span class="icheck-inline">
                                        @if ($errors->any())
                                            <input type="radio" name="type" value="principal" id="radio_type_principal" data-md-icheck @if(old('type') == 'principal') checked @endif/>
                                        @else
                                            <input type="radio" name="type" value="principal" id="radio_type_principal" data-md-icheck @if($plan->type == 'principal') checked @endif/>
                                        @endif
                                        <label for="radio_type_principal" class="inline-label">Principal</label>
                                    </span>
                                    <span class="icheck-inline">
                                        @if ($errors->any())
                                            <input type="radio" name="type" value="dependent" id="radio_type_dependent" data-md-icheck @if(old('type') == 'dependent') checked @endif/>
                                        @else
                                            <input type="radio" name="type" value="dependent" id="radio_type_dependent" data-md-icheck @if($plan->type == 'dependent') checked @endif/>
                                        @endif
                                        <label for="radio_type_dependent" class="inline-label">Dependent</label>
                                    </span>
                                    <span class="icheck-inline">
                                        @if ($errors->any())
                                            <input type="radio" name="type" value="both" id="radio_type_both" data-md-icheck @if(old('type') == 'both') checked @endif/>
                                        @else
                                            <input type="radio" name="type" value="both" id="radio_type_both" data-md-icheck @if($plan->type == 'both') checked @endif/>
                                        @endif
                                        <label for="radio_type_both" class="inline-label">Both</label>
                                    </span>
                                </div>
                                <div class="uk-width-1-2">
                                    <h3 class="heading_c"><u>Plan Limit</u> </h3><p></p>
                                    <span class="icheck-inline">
                                        @if ($errors->any())
                                            <input type="radio" name="limit" value="mbl only" id="radio_limit_mbl_only" data-md-icheck @if(old('limit') == 'mbl only') checked @endif/>
                                        @else
                                            <input type="radio" name="limit" value="mbl only" id="radio_limit_mbl_only" data-md-icheck @if($plan->limit == 'mbl only') checked @endif/>
                                        @endif

                                        <label for="radio_limit_mbl_only" class="inline-label">MBL Only</label>
                                    </span>
                                    <span class="icheck-inline">
                                        @if ($errors->any())
                                            <input type="radio" name="limit" value="abl only" id="radio_limit_abl_only" data-md-icheck @if(old('limit') == 'abl only') checked @endif/>
                                        @else
                                            <input type="radio" name="limit" value="abl only" id="radio_limit_abl_only" data-md-icheck @if($plan->limit == 'abl only') checked @endif/>
                                        @endif

                                        <label for="radio_limit_abl_only" class="inline-label">ABL Only</label>
                                    </span>
                                    <span class="icheck-inline">
                                        @if ($errors->any())
                                            <input type="radio" name="limit" value="mbl and abl" id="radio_limit_both_mbl_and_abl" data-md-icheck @if(old('limit') == 'mbl and abl') checked @endif/>
                                        @else
                                            <input type="radio" name="limit" value="mbl and abl" id="radio_limit_both_mbl_and_abl" data-md-icheck @if($plan->limit == 'mbl and abl') checked @endif/>
                                        @endif

                                        <label for="radio_limit_both_mbl_and_abl" class="inline-label">Both MBL & ABL</label>
                                    </span>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-3">
                                    <label>Intervening Period</label>
                                    <input type="number" min="0" name="intervening_period" value="{{ old('intervening_period') ?: $plan->intervening_period }}" class="md-input {{ $errors->has('intervening_period') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('intervening_period'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('intervening_period') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-3">
                                    <label>CoPay c/o Company (%) <span class="req uk-text-danger">*</span></label>
                                    <input type="number" min="0" max="100" name="copay_company" value="{{ old('copay_company') ?: ($plan->copay_company * 100) }}" class="md-input {{ $errors->has('copay_company') ? ' md-input-danger' : '' }}" onchange="$('#field_copay_member').val(100 - this.value)" />
                                    @if ($errors->has('copay_company'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('copay_company') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-3">
                                    <label>CoPay c/o Member (%) <span class="req uk-text-danger">*</span></label>
                                    <input id="field_copay_member" type="number" min="0" max="100" name="copay_member" value="{{ old('copay_member') ?: ($plan->copay_member * 100) }}" class="md-input label-fixed {{ $errors->has('copay_member') ? ' md-input-danger' : '' }}" readonly/>
                                    @if ($errors->has('copay_member'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('copay_member') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <div class="uk-form-row">
                                        <label>Covered Dreaded Diseases</label>
                                        <textarea cols="30" rows="4" name="covered_dreaded_diseases" class="md-input">{{ old('covered_dreaded_diseases') ?: $plan->covered_dreaded_diseases }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <div class="uk-width-1-1">
                                        <label>Other Exclusions and Remarks</label>
                                        <input type="text" name="exclusions" value="{{ old('exclusions') ?: $plan->exclusions }}" class="md-input {{ $errors->has('exclusions') ? ' md-input-danger' : '' }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- END PLAN INFORMATION --}}

                    {{-- START COVERAGE --}}
                    <li>
                        <div class="md-card-content">
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <p>
                                        @if ($errors->any())
                                            <input type="checkbox" name="inpatient" value="1" id="check_inpatient" data-md-icheck @if(old('inpatient')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="inpatient" value="1" id="check_inpatient" data-md-icheck @if($planCoverage->inpatient) checked @endif/>
                                        @endif
                                        <label for="check_inpatient" class="inline-label">Inpatient</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="checkbox" name="outpatient" value="1" id="check_outpatient" data-md-icheck @if(old('outpatient')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="outpatient" value="1" id="check_outpatient" data-md-icheck @if($planCoverage->outpatient) checked @endif/>
                                        @endif
                                        <label for="check_outpatient" class="inline-label">Outpatient</label>
                                    </p>
                                    <p style="margin-left: 40px;">
                                        @if ($errors->any())
                                            <input type="checkbox" name="op_basic_consultation" value="1" id="check_op_basic_consultation" data-md-icheck @if(old('op_basic_consultation')) checked @endif @if(is_null(old('outpatient'))) disabled @endif/>
                                        @else
                                            <input type="checkbox" name="op_basic_consultation" value="1" id="check_op_basic_consultation" data-md-icheck @if($planCoverage->op_basic_consultation) checked @endif @if(! $planCoverage->outpatient) disabled @endif/>
                                        @endif
                                        <label for="check_op_basic_consultation" class="inline-label">Basic Consultation</label>
                                    </p>
                                    <p style="margin-left: 40px;">
                                        @if ($errors->any())
                                            <input type="checkbox" name="op_referral_to_specialist" value="1" id="check_op_referral_to_specialist" data-md-icheck @if(old('op_referral_to_specialist')) checked @endif @if(is_null(old('outpatient'))) disabled @endif/>
                                        @else
                                            <input type="checkbox" name="op_referral_to_specialist" value="1" id="check_op_referral_to_specialist" data-md-icheck @if($planCoverage->op_referral_to_specialist) checked @endif @if(! $planCoverage->outpatient) disabled @endif/>
                                        @endif
                                        <label for="check_op_referral_to_specialist" class="inline-label">Referral to Specialist</label>
                                    </p>
                                    <p style="margin-left: 40px;">
                                        @if ($errors->any())
                                            <input type="checkbox" name="op_laboratory" value="1" id="check_op_laboratory" data-md-icheck @if(old('op_laboratory')) checked @endif @if(is_null(old('outpatient'))) disabled @endif/>
                                        @else
                                            <input type="checkbox" name="op_laboratory" value="1" id="check_op_laboratory" data-md-icheck @if($planCoverage->op_laboratory) checked @endif @if(! $planCoverage->outpatient) disabled @endif/>
                                        @endif
                                        <label for="check_op_laboratory" class="inline-label">OP Laboratory</label>
                                    </p>
                                    <p style="margin-left: 40px;">
                                        @if ($errors->any())
                                            <input type="checkbox" name="op_opd_or" value="1" id="check_op_opd_or" data-md-icheck @if(old('op_opd_or')) checked @endif @if(is_null(old('outpatient'))) disabled @endif/>
                                        @else
                                            <input type="checkbox" name="op_opd_or" value="1" id="check_op_opd_or" data-md-icheck @if($planCoverage->op_opd_or) checked @endif @if(! $planCoverage->outpatient) disabled @endif/>
                                        @endif

                                        <label for="check_op_opd_or" class="inline-label">OPD-OR</label>
                                    </p>
                                    <p style="margin-left: 40px;">
                                        @if ($errors->any())
                                            <input type="checkbox" name="op_facility_fee" value="1" id="check_op_facility_fee" data-md-icheck @if(old('op_facility_fee')) checked @endif @if(is_null(old('outpatient'))) disabled @endif/>
                                        @else
                                            <input type="checkbox" name="op_facility_fee" value="1" id="check_op_facility_fee" data-md-icheck @if($planCoverage->op_facility_fee) checked @endif @if(! $planCoverage->outpatient) disabled @endif/>
                                        @endif
                                        <label for="check_op_facility_fee" class="inline-label">Facility Fee</label>
                                    </p>
                                    <p style="margin-left: 40px;">
                                        @if ($errors->any())
                                            <input type="checkbox" name="op_clinic_setting" value="1" id="check_op_clinic_setting" data-md-icheck @if(old('op_clinic_setting')) checked @endif @if(is_null(old('outpatient'))) disabled @endif/>
                                        @else
                                            <input type="checkbox" name="op_clinic_setting" value="1" id="check_op_clinic_setting" data-md-icheck @if($planCoverage->op_clinic_setting) checked @endif @if(! $planCoverage->outpatient) disabled @endif/>
                                        @endif

                                        <label for="check_op_clinic_setting" class="inline-label">Clinic Setting</label>
                                    </p>
                                </div>
                                <div class="uk-width-1-2">
                                    <p>
                                        @if ($errors->any())
                                            <input type="checkbox" name="annual_physical_exam" value="1" id="check_annual_physical_exam" data-md-icheck @if(old('annual_physical_exam')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="annual_physical_exam" value="1" id="check_annual_physical_exam" data-md-icheck @if($planCoverage->annual_physical_exam) checked @endif/>
                                        @endif
                                        <label for="check_annual_physical_exam" class="inline-label">Annual Physical Exam</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="checkbox" name="emergency" value="1" id="check_emergency" data-md-icheck @if(old('emergency')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="emergency" value="1" id="check_emergency" data-md-icheck @if($planCoverage->emergency) checked @endif/>
                                        @endif
                                        <label for="check_emergency" class="inline-label">Emergency</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="checkbox" name="maternity" value="1" id="check_maternity" data-md-icheck @if(old('maternity')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="maternity" value="1" id="check_maternity" data-md-icheck @if($planCoverage->maternity) checked @endif/>
                                        @endif
                                        <label for="check_maternity" class="inline-label">Maternity</label>
                                    </p>
                                    <p style="margin-left: 40px;">
                                        @if ($errors->any())
                                            <input type="checkbox" name="maternity_pre_and_post_natal" value="1" id="check_maternity_pre_and_post_natal" data-md-icheck @if(old('maternity_pre_and_post_natal')) checked @endif @if(is_null(old('maternity'))) disabled @endif/>
                                        @else
                                            <input type="checkbox" name="maternity_pre_and_post_natal" value="1" id="check_maternity_pre_and_post_natal" data-md-icheck @if($planCoverage->maternity_pre_and_post_natal) checked @endif @if(! $planCoverage->maternity) disabled @endif/>
                                        @endif
                                        <label for="check_maternity_pre_and_post_natal" class="inline-label">Pre and Post Natal Consultation</label>
                                    </p>
                                    <p style="margin-left: 40px;">
                                        @if ($errors->any())
                                            <input type="checkbox" name="maternity_laboratory" value="1" id="check_maternity_laboratory" data-md-icheck @if(old('maternity_laboratory')) checked @endif @if(is_null(old('maternity'))) disabled @endif/>
                                        @else
                                            <input type="checkbox" name="maternity_laboratory" value="1" id="check_maternity_laboratory" data-md-icheck @if($planCoverage->maternity_laboratory) checked @endif @if(! $planCoverage->maternity) disabled @endif/>
                                        @endif
                                        <label for="check_maternity_laboratory" class="inline-label">Laboratory</label>
                                    </p>
                                    <p style="margin-left: 40px;">
                                        @if ($errors->any())
                                            <input type="checkbox" name="maternity_delivery" value="1" id="check_maternity_delivery" data-md-icheck @if(old('maternity_delivery')) checked @endif @if(is_null(old('maternity'))) disabled @endif/>
                                        @else
                                            <input type="checkbox" name="maternity_delivery" value="1" id="check_maternity_delivery" data-md-icheck @if($planCoverage->maternity_delivery) checked @endif @if(! $planCoverage->maternity) disabled @endif/>
                                        @endif

                                        <label for="check_maternity_delivery" class="inline-label">Delivery</label>
                                    </p>
                                    <p>
                                        @if ($errors->any())
                                            <input type="checkbox" name="reimbursement" value="1" id="check_reimbursement" data-md-icheck @if(old('reimbursement')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="reimbursement" value="1" id="check_reimbursement" data-md-icheck @if($planCoverage->reimbursement) checked @endif/>
                                        @endif

                                        <label for="check_reimbursement" class="inline-label">Reimbursement</label>
                                    </p>
                                    <p style="margin-left: 40px;">
                                        @if ($errors->any())
                                            <input type="checkbox" name="reimbursement_inpatient" value="1" id="check_reimbursement_inpatient" data-md-icheck @if(old('reimbursement_inpatient')) checked @endif @if(is_null(old('reimbursement'))) disabled @endif/>
                                        @else
                                            <input type="checkbox" name="reimbursement_inpatient" value="1" id="check_reimbursement_inpatient" data-md-icheck @if($planCoverage->reimbursement_inpatient) checked @endif @if(! $planCoverage->reimbursement) disabled @endif/>
                                        @endif

                                        <label for="check_reimbursement_inpatient" class="inline-label">Inpatient</label>
                                    </p>
                                    <p style="margin-left: 40px;">
                                        @if ($errors->any())
                                            <input type="checkbox" name="reimbursement_outpatient" value="1" id="check_reimbursement_outpatient" data-md-icheck @if(old('reimbursement_outpatient')) checked @endif @if(is_null(old('reimbursement'))) disabled @endif/>
                                        @else
                                            <input type="checkbox" name="reimbursement_outpatient" value="1" id="check_reimbursement_outpatient" data-md-icheck @if($planCoverage->reimbursement_outpatient) checked @endif @if(! $planCoverage->reimbursement) disabled @endif/>
                                        @endif
                                        <label for="check_reimbursement_outpatient" class="inline-label">Outpatient</label>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- END COVERAGE --}}

                    {{-- START BENEFIT LIMIT --}}
                    <li>
                        <div class="md-card-content">
                            <div class="uk-accordion" data-uk-accordion="{ collapse: false }">
                                <h3 class="uk-accordion-title">Inpatient</h3>
                                <div class="uk-accordion-content">
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Max Limit</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <label>Basic Limit</label>
                                            <input class="md-input masked_input" id="masked_ip_max_limit_basic" name="ip_max_limit_basic" value="{{ old('ip_max_limit_basic') ?: $planBenefitLimit->ip_max_limit_basic }}" type="text"
                                                data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                data-inputmask-showmaskonhover="false" />
                                        </div>
                                        <div class="uk-width-2-5">
                                            <label>Major Limit</label>
                                            <input class="md-input masked_input" id="masked_ip_max_limit_major" name="ip_max_limit_major" value="{{ old('ip_max_limit_major') ?: $planBenefitLimit->ip_max_limit_major }}" type="text"
                                                data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                data-inputmask-showmaskonhover="false" />
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Room & Board (Category)</p>
                                        </div>
                                        <div class="uk-width-4-5">
                                            <select name="ip_room_board_category" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Basic Limit">
                                                @if ($errors->any())
                                                    <option value="" @if(old('ip_room_board_category') == '') selected @endif>N/A</option>
                                                    <option value="ward" @if(old('ip_room_board_category') == 'ward') selected @endif>Ward</option>
                                                    <option value="semi-private" @if(old('ip_room_board_category') == 'semi-private') selected @endif>Semi-Private</option>
                                                    <option value="private" @if(old('ip_room_board_category') == 'private') selected @endif>Private</option>
                                                    <option value="suite" @if(old('ip_room_board_category') == 'suite') selected @endif>Suite</option>
                                                @else
                                                    <option value="" @if(is_null($planBenefitLimit->ip_room_board_category)) selected @endif>N/A</option>
                                                    <option value="ward" @if($planBenefitLimit->ip_room_board_category == 'ward') selected @endif>Ward</option>
                                                    <option value="semi-private" @if($planBenefitLimit->ip_room_board_category == 'semi-private') selected @endif>Semi-Private</option>
                                                    <option value="private" @if($planBenefitLimit->ip_room_board_category == 'private') selected @endif>Private</option>
                                                    <option value="suite" @if($planBenefitLimit->ip_room_board_category == 'suite') selected @endif>Suite</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Room & Board (Peso)</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_ip_room_board_basic" name="ip_room_board_basic" value="{{ old('ip_room_board_basic') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('ip_room_board_basic'))) disabled style="color: white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_ip_room_board_basic" name="ip_room_board_basic" value="{{ $planBenefitLimit->ip_room_board_basic }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->ip_room_board_basic)) disabled style="color: white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('ip_room_board_basic'))) uk-active @endif" target-input="#masked_ip_room_board_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->ip_room_board_basic)) uk-active @endif" target-input="#masked_ip_room_board_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif

                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_ip_room_board_major" name="ip_room_board_major" value="{{ old('ip_room_board_major') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('ip_room_board_major'))) disabled style="color: white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_ip_room_board_major" name="ip_room_board_major" value="{{ $planBenefitLimit->ip_room_board_major }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->ip_room_board_major)) disabled style="color: white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('ip_room_board_major'))) uk-active @endif" target-input="#masked_ip_room_board_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->ip_room_board_major)) uk-active @endif" target-input="#masked_ip_room_board_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Misc. Hospital Services</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_ip_hospital_services_basic" name="ip_hospital_services_basic" value="{{ old('ip_hospital_services_basic') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('ip_hospital_services_basic'))) disabled style="color: white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_ip_hospital_services_basic" name="ip_hospital_services_basic" value="{{ $planBenefitLimit->ip_hospital_services_basic }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->ip_hospital_services_basic)) disabled style="color: white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('ip_hospital_services_basic'))) uk-active @endif"  target-input="#masked_ip_hospital_services_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->ip_hospital_services_basic)) uk-active @endif" target-input="#masked_ip_hospital_services_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_ip_hospital_services_major" name="ip_hospital_services_major" value="{{ old('ip_hospital_services_major') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('ip_hospital_services_major'))) disabled style="color: white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_ip_hospital_services_major" name="ip_hospital_services_major" value="{{ $planBenefitLimit->ip_hospital_services_major }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->ip_hospital_services_major)) disabled style="color: white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('ip_hospital_services_major'))) uk-active @endif" target-input="#masked_ip_hospital_services_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->ip_hospital_services_major)) uk-active @endif" target-input="#masked_ip_hospital_services_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Surgical Fee</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_ip_surgical_fee_basic" name="ip_surgical_fee_basic" value="{{ old('ip_surgical_fee_basic') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('ip_surgical_fee_basic'))) disabled style="color: white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_ip_surgical_fee_basic" name="ip_surgical_fee_basic" value="{{ $planBenefitLimit->ip_surgical_fee_basic }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->ip_surgical_fee_basic)) disabled style="color: white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('ip_surgical_fee_basic'))) uk-active @endif" target-input="#masked_ip_surgical_fee_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->ip_surgical_fee_basic)) uk-active @endif" target-input="#masked_ip_surgical_fee_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_ip_surgical_fee_major" name="ip_surgical_fee_major" value="{{ old('ip_surgical_fee_major') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('ip_surgical_fee_major'))) disabled style="color: white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_ip_surgical_fee_major" name="ip_surgical_fee_major" value="{{ $planBenefitLimit->ip_surgical_fee_major }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->ip_surgical_fee_major)) disabled style="color: white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('ip_surgical_fee_major'))) uk-active @endif" target-input="#masked_ip_surgical_fee_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->ip_surgical_fee_major)) uk-active @endif" target-input="#masked_ip_surgical_fee_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Physician Fee</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_ip_physician_fee_basic" name="ip_physician_fee_basic" value="{{ old('ip_physician_fee_basic') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('ip_physician_fee_basic'))) disabled style="color: white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_ip_physician_fee_basic" name="ip_physician_fee_basic" value="{{ $planBenefitLimit->ip_physician_fee_basic }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->ip_physician_fee_basic)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('ip_physician_fee_basic'))) uk-active @endif" target-input="#masked_ip_physician_fee_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->ip_physician_fee_basic)) uk-active @endif" target-input="#masked_ip_physician_fee_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_ip_physician_fee_major" name="ip_physician_fee_major" value="{{ old('ip_physician_fee_major') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('ip_physician_fee_major'))) disabled style="color: white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_ip_physician_fee_major" name="ip_physician_fee_major" value="{{ $planBenefitLimit->ip_physician_fee_major }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->ip_physician_fee_major)) disabled style="color: white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('ip_physician_fee_major'))) uk-active @endif" target-input="#masked_ip_physician_fee_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->ip_physician_fee_major)) uk-active @endif" target-input="#masked_ip_physician_fee_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Nurse Fee</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_ip_nurse_fee_basic" name="ip_nurse_fee_basic" value="{{ old('ip_nurse_fee_basic') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('ip_nurse_fee_basic'))) disabled style="color: white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_ip_nurse_fee_basic" name="ip_nurse_fee_basic" value="{{ $planBenefitLimit->ip_nurse_fee_basic }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->ip_nurse_fee_basic)) disabled style="color: white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('ip_nurse_fee_basic'))) uk-active @endif" target-input="#masked_ip_nurse_fee_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->ip_nurse_fee_basic)) uk-active @endif" target-input="#masked_ip_nurse_fee_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_ip_nurse_fee_major" name="ip_nurse_fee_major" value="{{ old('ip_nurse_fee_major') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('ip_nurse_fee_major'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_ip_nurse_fee_major" name="ip_nurse_fee_major" value="{{ $planBenefitLimit->ip_nurse_fee_major }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->ip_nurse_fee_major)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('ip_nurse_fee_major'))) uk-active @endif" target-input="#masked_ip_nurse_fee_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->ip_nurse_fee_major)) uk-active @endif" target-input="#masked_ip_nurse_fee_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">OPD-OR</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_ip_opd_or_basic" name="ip_opd_or_basic" value="{{ old('ip_opd_or_basic') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('ip_opd_or_basic'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_ip_opd_or_basic" name="ip_opd_or_basic" value="{{ $planBenefitLimit->ip_opd_or_basic }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->ip_opd_or_basic)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('ip_opd_or_basic'))) uk-active @endif" target-input="#masked_ip_opd_or_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->ip_opd_or_basic)) uk-active @endif" target-input="#masked_ip_opd_or_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_ip_opd_or_major" name="ip_opd_or_major" value="{{ old('ip_opd_or_major') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('ip_opd_or_major'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_ip_opd_or_major" name="ip_opd_or_major" value="{{ $planBenefitLimit->ip_opd_or_major }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->ip_opd_or_major)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('ip_opd_or_major'))) uk-active @endif" target-input="#masked_ip_opd_or_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->ip_opd_or_major)) uk-active @endif" target-input="#masked_ip_opd_or_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">ECU</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_ip_ecu_basic" name="ip_ecu_basic" value="{{ old('ip_ecu_basic') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('ip_ecu_basic'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_ip_ecu_basic" name="ip_ecu_basic" value="{{ $planBenefitLimit->ip_ecu_basic }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->ip_ecu_basic)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('ip_ecu_basic'))) uk-active @endif" target-input="#masked_ip_ecu_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->ip_ecu_basic)) uk-active @endif" target-input="#masked_ip_ecu_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_ip_ecu_major" name="ip_ecu_major" value="{{ old('ip_ecu_major') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('ip_ecu_major'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_ip_ecu_major" name="ip_ecu_major" value="{{ $planBenefitLimit->ip_ecu_major }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->ip_ecu_major)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('ip_ecu_major'))) uk-active @endif" target-input="#masked_ip_ecu_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->ip_ecu_major)) uk-active @endif" target-input="#masked_ip_ecu_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Anes. Rate</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_ip_anesthesiologist_rate_basic" name="ip_anesthesiologist_rate_basic" value="{{ old('ip_anesthesiologist_rate_basic') }}" id="masked_ip_anesthesiologist_rate_basic" type="text"
                                                        data-inputmask="'alias': 'currency', 'prefix': '', 'suffix': ' %' " data-inputmask-showmaskonhover="false" max="100" @if(is_null(old('ip_anesthesiologist_rate_basic'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_ip_anesthesiologist_rate_basic" name="ip_anesthesiologist_rate_basic" value="{{ $planBenefitLimit->ip_anesthesiologist_rate_basic * 100 }}" id="masked_ip_anesthesiologist_rate_basic" type="text"
                                                        data-inputmask="'alias': 'currency', 'prefix': '', 'suffix': ' %' " data-inputmask-showmaskonhover="false" max="100" @if(is_null($planBenefitLimit->ip_anesthesiologist_rate_basic)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('ip_anesthesiologist_rate_basic'))) uk-active @endif" target-input="#masked_ip_anesthesiologist_rate_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->ip_anesthesiologist_rate_basic)) uk-active @endif" target-input="#masked_ip_anesthesiologist_rate_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_ip_anesthesiologist_rate_major" name="ip_anesthesiologist_rate_major" value="{{ old('ip_anesthesiologist_rate_major') }}" id="masked_ip_anesthesiologist_rate_major" type="text"
                                                        data-inputmask="'alias': 'currency', 'prefix': '', 'suffix': ' %' " data-inputmask-showmaskonhover="false" max="100" @if(is_null(old('ip_anesthesiologist_rate_major'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_ip_anesthesiologist_rate_major" name="ip_anesthesiologist_rate_major" value="{{ $planBenefitLimit->ip_anesthesiologist_rate_major * 100 }}" id="masked_ip_anesthesiologist_rate_major" type="text"
                                                        data-inputmask="'alias': 'currency', 'prefix': '', 'suffix': ' %' " data-inputmask-showmaskonhover="false" max="100" @if(is_null($planBenefitLimit->ip_anesthesiologist_rate_major)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('ip_anesthesiologist_rate_major'))) uk-active @endif" target-input="#masked_ip_anesthesiologist_rate_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->ip_anesthesiologist_rate_major)) uk-active @endif" target-input="#masked_ip_anesthesiologist_rate_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="uk-accordion-title">Outpatient</h3>
                                <div class="uk-accordion-content">
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Max Limit</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <label>Basic Limit</label>
                                            <input class="md-input masked_input" id="masked_op_max_limit_basic" name="op_max_limit_basic" value="{{ old('op_max_limit_basic') ?: $planBenefitLimit->op_max_limit_basic }}" type="text"
                                                data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                data-inputmask-showmaskonhover="false" />
                                        </div>
                                        <div class="uk-width-2-5">
                                            <label>Major Limit</label>
                                            <input class="md-input masked_input" id="masked_op_max_limit_major" name="op_max_limit_major" value="{{ old('op_max_limit_major') ?: $planBenefitLimit->op_max_limit_major }}" type="text"
                                                data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                data-inputmask-showmaskonhover="false" />
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Basic Consultation</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_op_basic_consultation_basic" name="op_basic_consultation_basic" value="{{ old('op_basic_consultation_basic') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('op_basic_consultation_basic'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_op_basic_consultation_basic" name="op_basic_consultation_basic" value="{{ $planBenefitLimit->op_basic_consultation_basic }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->op_basic_consultation_basic)) disabled style="color:white;" @endif/>
                                                @endif

                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('op_basic_consultation_basic'))) uk-active @endif" target-input="#masked_op_basic_consultation_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->op_basic_consultation_basic)) uk-active @endif" target-input="#masked_op_basic_consultation_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_op_basic_consultation_major" name="op_basic_consultation_major" value="{{ old('op_basic_consultation_major') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('op_basic_consultation_major'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_op_basic_consultation_major" name="op_basic_consultation_major" value="{{ $planBenefitLimit->op_basic_consultation_major }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->op_basic_consultation_major)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('op_basic_consultation_major'))) uk-active @endif" target-input="#masked_op_basic_consultation_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->op_basic_consultation_major)) uk-active @endif" target-input="#masked_op_basic_consultation_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Laboratory</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_op_laboratory_basic" name="op_laboratory_basic" value="{{ old('op_laboratory_basic') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('op_laboratory_basic'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_op_laboratory_basic" name="op_laboratory_basic" value="{{ $planBenefitLimit->op_laboratory_basic }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->op_laboratory_basic)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('op_laboratory_basic'))) uk-active @endif" target-input="#masked_op_laboratory_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->op_laboratory_basic)) uk-active @endif" target-input="#masked_op_laboratory_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_op_laboratory_major" name="op_laboratory_major" value="{{ old('op_laboratory_major') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('op_laboratory_major'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_op_laboratory_major" name="op_laboratory_major" value="{{ $planBenefitLimit->op_laboratory_major }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->op_laboratory_major)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('op_laboratory_major'))) uk-active @endif" target-input="#masked_op_laboratory_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->op_laboratory_major)) uk-active @endif" target-input="#masked_op_laboratory_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Clinic Setting</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_op_clinic_setting_basic" name="op_clinic_setting_basic" value="{{ old('op_clinic_setting_basic') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('op_clinic_setting_basic'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_op_clinic_setting_basic" name="op_clinic_setting_basic" value="{{ $planBenefitLimit->op_clinic_setting_basic }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->op_clinic_setting_basic)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('op_clinic_setting_basic'))) uk-active @endif" target-input="#masked_op_clinic_setting_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->op_clinic_setting_basic)) uk-active @endif" target-input="#masked_op_clinic_setting_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_op_clinic_setting_major" name="op_clinic_setting_major" value="{{ old('op_clinic_setting_major') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('op_clinic_setting_major'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_op_clinic_setting_major" name="op_clinic_setting_major" value="{{ $planBenefitLimit->op_clinic_setting_major }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->op_clinic_setting_major)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('op_clinic_setting_major'))) uk-active @endif" target-input="#masked_op_clinic_setting_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->op_clinic_setting_major)) uk-active @endif" target-input="#masked_op_clinic_setting_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Emergency</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_op_emergency_basic" name="op_emergency_basic" value="{{ old('op_emergency_basic') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('op_emergency_basic'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_op_emergency_basic" name="op_emergency_basic" value="{{ $planBenefitLimit->op_emergency_basic }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->op_emergency_basic)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('op_emergency_basic'))) uk-active @endif" target-input="#masked_op_emergency_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->op_emergency_basic)) uk-active @endif" target-input="#masked_op_emergency_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_op_emergency_major" name="op_emergency_major" value="{{ old('op_emergency_major') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('op_emergency_major'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_op_emergency_major" name="op_emergency_major" value="{{ $planBenefitLimit->op_emergency_major }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->op_emergency_major)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('op_emergency_major'))) uk-active @endif" target-input="#masked_op_emergency_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->op_emergency_major)) uk-active @endif" target-input="#masked_op_emergency_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Medicine</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_op_medicine_basic" name="op_medicine_basic" value="{{ old('op_medicine_basic') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('op_medicine_basic'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_op_medicine_basic" name="op_medicine_basic" value="{{ $planBenefitLimit->op_medicine_basic }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->op_medicine_basic)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('op_medicine_basic'))) uk-active @endif" target-input="#masked_op_medicine_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->op_medicine_basic)) uk-active @endif" target-input="#masked_op_medicine_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_op_medicine_major" name="op_medicine_major" value="{{ old('op_medicine_major') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('op_medicine_major'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_op_medicine_major" name="op_medicine_major" value="{{ $planBenefitLimit->op_medicine_major }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->op_medicine_major)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('op_medicine_major'))) uk-active @endif" target-input="#masked_op_medicine_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->op_medicine_major)) uk-active @endif" target-input="#masked_op_medicine_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Total # of Visits</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <label>Basic Limit</label>
                                            <input type="number" name="op_total_number_of_visit" value="{{ old('op_total_number_of_visit') ?: $planBenefitLimit->op_total_number_of_visit }}" class="md-input {{ $errors->has('op_total_number_of_visit') ? ' md-input-danger' : '' }}" />
                                        </div>
                                    </div>
                                </div>
                                <h3 class="uk-accordion-title">Maternity</h3>
                                <div class="uk-accordion-content">
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Max Limit</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <label>Basic Limit</label>
                                            <input class="md-input masked_input" id="masked_maternity_max_limit_basic" name="maternity_max_limit_basic" value="{{ old('maternity_max_limit_basic') ?: $planBenefitLimit->maternity_max_limit_basic }}" type="text"
                                                data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                data-inputmask-showmaskonhover="false" />
                                        </div>
                                        <div class="uk-width-2-5">
                                            <label>Major Limit</label>
                                            <input class="md-input masked_input" id="masked_maternity_max_limit_major" name="maternity_max_limit_major" value="{{ old('maternity_max_limit_major') ?: $planBenefitLimit->maternity_max_limit_major }}" type="text"
                                                data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                data-inputmask-showmaskonhover="false" />
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Normal Delivery</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_maternity_normal_delivery_basic" name="maternity_normal_delivery_basic" value="{{ old('maternity_normal_delivery_basic') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('maternity_normal_delivery_basic'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_maternity_normal_delivery_basic" name="maternity_normal_delivery_basic" value="{{ $planBenefitLimit->maternity_normal_delivery_basic }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->maternity_normal_delivery_basic)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('maternity_normal_delivery_basic'))) uk-active @endif" target-input="#masked_maternity_normal_delivery_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->maternity_normal_delivery_basic)) uk-active @endif" target-input="#masked_maternity_normal_delivery_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_maternity_normal_delivery_major" name="maternity_normal_delivery_major" value="{{ old('maternity_normal_delivery_major') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('maternity_normal_delivery_major'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_maternity_normal_delivery_major" name="maternity_normal_delivery_major" value="{{ $planBenefitLimit->maternity_normal_delivery_major }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->maternity_normal_delivery_major)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('maternity_normal_delivery_major'))) uk-active @endif" target-input="#masked_maternity_normal_delivery_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->maternity_normal_delivery_major)) uk-active @endif" target-input="#masked_maternity_normal_delivery_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Cesarian Section</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_maternity_cesarian_section_basic" name="maternity_cesarian_section_basic" value="{{ old('maternity_cesarian_section_basic') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('maternity_cesarian_section_basic'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_maternity_cesarian_section_basic" name="maternity_cesarian_section_basic" value="{{ $planBenefitLimit->maternity_cesarian_section_basic }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->maternity_cesarian_section_basic)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('maternity_cesarian_section_basic'))) uk-active @endif" target-input="#masked_maternity_cesarian_section_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->maternity_cesarian_section_basic)) uk-active @endif" target-input="#masked_maternity_cesarian_section_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_maternity_cesarian_section_major" name="maternity_cesarian_section_major" value="{{ old('maternity_cesarian_section_major') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('maternity_cesarian_section_major'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_maternity_cesarian_section_major" name="maternity_cesarian_section_major" value="{{ $planBenefitLimit->maternity_cesarian_section_major }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->maternity_cesarian_section_major)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('maternity_cesarian_section_major'))) uk-active @endif" target-input="#masked_maternity_cesarian_section_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->maternity_cesarian_section_major)) uk-active @endif" target-input="#masked_maternity_cesarian_section_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Home Delivery</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_maternity_home_delivery_basic" name="maternity_home_delivery_basic" value="{{ old('maternity_home_delivery_basic') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('maternity_home_delivery_basic'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_maternity_home_delivery_basic" name="maternity_home_delivery_basic" value="{{ $planBenefitLimit->maternity_home_delivery_basic }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->maternity_home_delivery_basic)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('maternity_home_delivery_basic'))) uk-active @endif" target-input="#masked_maternity_home_delivery_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->maternity_home_delivery_basic)) uk-active @endif" target-input="#masked_maternity_home_delivery_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_maternity_home_delivery_major" name="maternity_home_delivery_major" value="{{ old('maternity_home_delivery_major') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('maternity_home_delivery_major'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_maternity_home_delivery_major" name="maternity_home_delivery_major" value="{{ $planBenefitLimit->maternity_home_delivery_major }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->maternity_home_delivery_major)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('maternity_home_delivery_major'))) uk-active @endif" target-input="#masked_maternity_home_delivery_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->maternity_home_delivery_major)) uk-active @endif" target-input="#masked_maternity_home_delivery_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Miscarriage</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_maternity_miscarriage_basic" name="maternity_miscarriage_basic" value="{{ old('maternity_miscarriage_basic') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('maternity_miscarriage_basic'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_maternity_miscarriage_basic" name="maternity_miscarriage_basic" value="{{ $planBenefitLimit->maternity_miscarriage_basic }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->maternity_miscarriage_basic)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('maternity_miscarriage_basic'))) uk-active @endif" target-input="#masked_maternity_miscarriage_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->maternity_miscarriage_basic)) uk-active @endif" target-input="#masked_maternity_miscarriage_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_maternity_miscarriage_major" name="maternity_miscarriage_major" value="{{ old('maternity_miscarriage_major') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('maternity_miscarriage_major'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_maternity_miscarriage_major" name="maternity_miscarriage_major" value="{{ $planBenefitLimit->maternity_miscarriage_major }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->maternity_miscarriage_major)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('maternity_miscarriage_major'))) uk-active @endif" target-input="#masked_maternity_miscarriage_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->maternity_miscarriage_major)) uk-active @endif" target-input="#masked_maternity_miscarriage_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Maternity Complication</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_maternity_complication_basic" name="maternity_complication_basic" value="{{ old('maternity_complication_basic') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('maternity_complication_basic'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_maternity_complication_basic" name="maternity_complication_basic" value="{{ $planBenefitLimit->maternity_complication_basic }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->maternity_complication_basic)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('maternity_complication_basic'))) uk-active @endif" target-input="#masked_maternity_complication_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->maternity_complication_basic)) uk-active @endif" target-input="#masked_maternity_complication_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_maternity_complication_major" name="maternity_complication_major" value="{{ old('maternity_complication_major') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('maternity_complication_major'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_maternity_complication_major" name="maternity_complication_major" value="{{ $planBenefitLimit->maternity_complication_major }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->maternity_complication_major)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('maternity_complication_major'))) uk-active @endif" target-input="#masked_maternity_complication_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->maternity_complication_major)) uk-active @endif" target-input="#masked_maternity_complication_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Nursery</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_maternity_nursery_basic" name="maternity_nursery_basic" value="{{ old('maternity_nursery_basic') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('maternity_nursery_basic'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_maternity_nursery_basic" name="maternity_nursery_basic" value="{{ $planBenefitLimit->maternity_nuresery_basic }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->maternity_nursery_basic)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('maternity_nursery_basic'))) uk-active @endif" target-input="#masked_maternity_nursery_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->maternity_nursery_basic)) uk-active @endif" target-input="#masked_maternity_nursery_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_maternity_nursery_major" name="maternity_nursery_major" value="{{ old('maternity_nursery_major') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('maternity_nursery_major'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_maternity_nursery_major" name="maternity_nursery_major" value="{{ $planBenefitLimit->maternity_nuresery_major }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->maternity_nursery_major)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('maternity_nursery_major'))) uk-active @endif" target-input="#masked_maternity_nursery_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->maternity_nursery_major)) uk-active @endif" target-input="#masked_maternity_nursery_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Pre and Post Natal</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Basic Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_maternity_pre_post_natal_basic" name="maternity_pre_post_natal_basic" value="{{ old('maternity_pre_post_natal_basic') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('maternity_pre_post_natal_basic'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_maternity_pre_post_natal_basic" name="maternity_pre_post_natal_basic" value="{{ $planBenefitLimit->maternity_pre_post_natal_basic }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->maternity_pre_post_natal_basic)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('maternity_pre_post_natal_basic'))) uk-active @endif" target-input="#masked_maternity_pre_post_natal_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->maternity_pre_post_natal_basic)) uk-active @endif" target-input="#masked_maternity_pre_post_natal_basic" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <div class="uk-input-group">
                                                <label>Major Limit</label>
                                                @if ($errors->any())
                                                    <input class="md-input masked_input" id="masked_maternity_pre_post_natal_major" name="maternity_pre_post_natal_major" value="{{ old('maternity_pre_post_natal_major') }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null(old('maternity_pre_post_natal_major'))) disabled style="color:white;" @endif/>
                                                @else
                                                    <input class="md-input masked_input" id="masked_maternity_pre_post_natal_major" name="maternity_pre_post_natal_major" value="{{ $planBenefitLimit->maternity_pre_post_natal_major }}" type="text"
                                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                        data-inputmask-showmaskonhover="false" @if(is_null($planBenefitLimit->maternity_pre_post_natal_major)) disabled style="color:white;" @endif/>
                                                @endif
                                                <span class="uk-input-group-addon">
                                                    <div data-uk-button-checkbox="{target:'.md-btn'}">
                                                        @if ($errors->any())
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null(old('maternity_pre_post_natal_major'))) uk-active @endif" target-input="#masked_maternity_pre_post_natal_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @else
                                                            <button type="button" class="md-btn md-btn-flat md-btn-flat-success @if(is_null($planBenefitLimit->maternity_pre_post_natal_major)) uk-active @endif" target-input="#masked_maternity_pre_post_natal_major" onclick="toggleAsCharged(this)">AS CHARGED</button>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="uk-accordion-title">Annual Physical Exam</h3>
                                <div class="uk-accordion-content">
                                    <div class="uk-grid">
                                        <div class="uk-width-1-5">
                                            <p class="uk-text-large">Max Limit</p>
                                        </div>
                                        <div class="uk-width-2-5">
                                            <label>Basic Limit</label>
                                            <input class="md-input masked_input" id="masked_ape_max_limit_basic" name="ape_max_limit_basic" value="{{ old('ape_max_limit_basic') ?: $planBenefitLimit->ape_max_limit_basic}}" type="text"
                                                data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                data-inputmask-showmaskonhover="false" />
                                        </div>
                                        <div class="uk-width-2-5">
                                            <label>Major Limit</label>
                                            <input class="md-input masked_input" id="masked_ape_max_limit_major" name="ape_max_limit_major" value="{{ old('ape_max_limit_major') ?: $planBenefitLimit->ape_max_limit_major }}" type="text"
                                                data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                                data-inputmask-showmaskonhover="false" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- END BENEFIT LIMIT --}}
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

@section('scripts')
    <script src="/bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $(function() {
            amaphil.init();

            $maskedInput = $('.masked_input').inputmask();
            if($maskedInput.length) {
                $maskedInput.inputmask();
            }
        });

        function toggleAsCharged(element) {
            $this = $(element);
            $targetInput = $($this.attr('target-input'));

            if ($this.hasClass('uk-active')) {
                $targetInput.attr('disabled', false);
                $targetInput.css('color', 'black');
            } else {
                $targetInput.attr('disabled', true);
                $targetInput.val("");
                $targetInput.css('color', 'white');
            }
        }

        amaphil = {
            init: function() {
                amaphil.select_corporate();
                amaphil.date_range_cover_period();
                amaphil.coverage_outpatient();
                amaphil.coverage_maternity();
                amaphil.coverage_reimbursement();
            },

            select_corporate: function() {
                $select_corporate = $('#select-corporate').selectize({
                    allowEmptyOption: true,
                });
            },

            date_range_cover_period: function() {
                var $dp_phic_accreditation_from = $('#plan_start'),
                    $dp_phic_accreditation_to = $('#plan_end');

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
            },

            coverage_outpatient: function() {
                var outpatient = $('#check_outpatient'),
                    op_basic_consultation = $('#check_op_basic_consultation'),
                    op_referral_to_specialist = $('#check_op_referral_to_specialist'),
                    op_laboratory = $('#check_op_laboratory'),
                    op_opd_or = $('#check_op_opd_or'),
                    op_facility_fee = $('#check_op_facility_fee'),
                    op_clinic_setting = $('#check_op_clinic_setting');


                outpatient.on('ifChecked', function (event) {
                    op_basic_consultation.iCheck('check');
                    op_referral_to_specialist.iCheck('check');
                    op_laboratory.iCheck('check');
                    op_opd_or.iCheck('check');
                    op_facility_fee.iCheck('check');
                    op_clinic_setting.iCheck('check');

                    op_basic_consultation.iCheck('enable');
                    op_referral_to_specialist.iCheck('enable');
                    op_laboratory.iCheck('enable');
                    op_opd_or.iCheck('enable');
                    op_facility_fee.iCheck('enable');
                    op_clinic_setting.iCheck('enable');
                });

                outpatient.on('ifUnchecked', function (event) {
                    op_basic_consultation.iCheck('uncheck');
                    op_referral_to_specialist.iCheck('uncheck');
                    op_laboratory.iCheck('uncheck');
                    op_opd_or.iCheck('uncheck');
                    op_facility_fee.iCheck('uncheck');
                    op_clinic_setting.iCheck('uncheck');

                    op_basic_consultation.iCheck('disable');
                    op_referral_to_specialist.iCheck('disable');
                    op_laboratory.iCheck('disable');
                    op_opd_or.iCheck('disable');
                    op_facility_fee.iCheck('disable');
                    op_clinic_setting.iCheck('disable');
                });
            },

            coverage_maternity: function() {
                var maternity = $('#check_maternity'),
                    maternity_pre_and_post_natal = $('#check_maternity_pre_and_post_natal'),
                    maternity_laboratory = $('#check_maternity_laboratory'),
                    maternity_delivery = $('#check_maternity_delivery');

                maternity.on('ifChecked', function (event) {
                    maternity_pre_and_post_natal.iCheck('check');
                    maternity_laboratory.iCheck('check');
                    maternity_delivery.iCheck('check');

                    maternity_pre_and_post_natal.iCheck('enable');
                    maternity_laboratory.iCheck('enable');
                    maternity_delivery.iCheck('enable');
                });

                maternity.on('ifUnchecked', function (event) {
                    maternity_pre_and_post_natal.iCheck('uncheck');
                    maternity_laboratory.iCheck('uncheck');
                    maternity_delivery.iCheck('uncheck');

                    maternity_pre_and_post_natal.iCheck('disable');
                    maternity_laboratory.iCheck('disable');
                    maternity_delivery.iCheck('disable');
                });
            },

            coverage_reimbursement: function() {
                var reimbursement = $('#check_reimbursement'),
                    reimbursement_inpatient = $('#check_reimbursement_inpatient'),
                    reimbursement_outpatient = $('#check_reimbursement_outpatient');

                reimbursement.on('ifChecked', function (event) {
                    reimbursement_inpatient.iCheck('check');
                    reimbursement_outpatient.iCheck('check');

                    reimbursement_inpatient.iCheck('enable');
                    reimbursement_outpatient.iCheck('enable');
                });

                reimbursement.on('ifUnchecked', function (event) {
                    reimbursement_inpatient.iCheck('uncheck');
                    reimbursement_outpatient.iCheck('uncheck');

                    reimbursement_inpatient.iCheck('disable');
                    reimbursement_outpatient.iCheck('disable');
                });
            }
        }
    </script>
@endsection
