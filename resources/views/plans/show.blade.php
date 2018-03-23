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
            <li><span>{{ $plan->name }}</span></li>
        </ul>
    </div>
@endsection

@section('page-content')
    <h4 class="heading_b uk-margin-bottom">Plans and Coverage</h4>

    <div class="md-card" style="padding: 20px;">
        <div class="md-card-content">
            <h2 class="heading_a">
                [{{ sprintf('%06d', $plan->id) }}] {{ $plan->name }}
                <span class="sub-heading">{{ $plan->corporate->name }}</span>
            </h2>
            <hr class="md-hr"/>

            <h3 class="full_width_in_card heading_c uk-margin-small-top">Details</h3>

            <div style="padding-left: 20px; padding-right: 20px;" class="md-card-content uk-margin-large-bottom uk-margin-medium-top">
                <div class="uk-grid">
                    <div class="uk-width-1-3">
                        <label>Shared Limit</label>
                        <input class="md-input" type="text" name="" value="{{ $plan->shared_limit ? "YES" : "NO" }}" readonly>
                    </div>
                    <div class="uk-width-1-3">
                        <label>Cover Pre-existing</label>
                        <input class="md-input" type="text" name="" value="{{ $plan->cover_preexisting ? "YES" : "NO" }}" readonly>
                    </div>
                    <div class="uk-width-1-3">
                        <label>Covered Period</label>
                        <input type="text" class="md-input" value="{{ $plan->start_date->toFormattedDateString() . ' to ' . $plan->end_date->toFormattedDateString() }}" readonly>
                    </div>
                </div>
                <div class="uk-grid">
                    <div class="uk-width-1-2">
                        <label>Plan Type</label>
                        <input type="text" value="{{ strtoupper($plan->type) }}" class="md-input label-fixed" readonly>
                    </div>
                    <div class="uk-width-1-2">
                        <label>Plan Limit</label>
                        <input type="text" value="{{ strtoupper($plan->limit) }}" class="md-input label-fixed" readonly>
                    </div>
                </div>
                <div class="uk-grid">
                    <div class="uk-width-1-3">
                        <label>Intervening Period</label>
                        <input type="text" name="intervening_period" value="{{ $plan->intervening_period }}" class="md-input label-fixed" readonly/>
                    </div>
                    <div class="uk-width-1-3">
                        <label>CoPay c/o Company (%)</label>
                        <input type="text" name="copay_company" value="{{ $plan->copay_company * 100 }}" class="md-input label-fixed" readonly/>
                    </div>
                    <div class="uk-width-1-3">
                        <label>CoPay c/o Member (%)</label>
                        <input type="text" name="copay_member" value="{{ $plan->copay_member * 100 }}" class="md-input label-fixed" readonly/>
                    </div>
                </div>
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <p>
                            <span class="uk-text-muted uk-text-small uk-display-block uk-margin-small-bottom">Covered Dreaded Diseases</span>
                            {{ $plan->covered_dreaded_diseases }}
                        </p>
                    </div>
                </div>
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <p>
                            <span class="uk-text-muted uk-text-small uk-display-block uk-margin-small-bottom">Other Exclusions and remarks</span>
                            {{ $plan->exclusions }}
                        </p>
                    </div>
                </div>
            </div>

            <h3 class="full_width_in_card heading_c uk-margin-small-top">Coverage</h3>

            <div style="padding-left: 20px; padding-right: 20px;" class="uk-grid uk-margin-large-bottom">
                <div class="uk-width-1-1">
                    <table class="uk-table">
                        <thead>
                            <tr class="uk-text-upper">
                                <th>Title</th>
                                <th width="25%" class="uk-text-center">Covered</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Inpatient</span><br/>
                                </td>
                                <td class="uk-text-center">
                                    @if ($planCoverage->inpatient)
                                        <i class="material-icons uk-text-success md-24">&#xE876;</i>
                                    @endif
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Outpatient</span><br/>
                                </td>
                                <td class="uk-text-center">
                                    @if ($planCoverage->outpatient)
                                        <i class="material-icons uk-text-success md-24">&#xE876;</i>
                                    @endif
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large" style="padding-left: 30px;">Basic Consultation</span><br/>
                                </td>
                                <td class="uk-text-center">
                                    @if ($planCoverage->op_basic_consultation)
                                        <i class="material-icons uk-text-success md-24">&#xE876;</i>
                                    @endif
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large" style="padding-left: 30px;">Referral to Specialist</span><br/>
                                </td>
                                <td class="uk-text-center">
                                    @if ($planCoverage->op_referral_to_specialist)
                                        <i class="material-icons uk-text-success md-24">&#xE876;</i>
                                    @endif
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large" style="padding-left: 30px;">OP Laboratory</span><br/>
                                </td>
                                <td class="uk-text-center">
                                    @if ($planCoverage->op_laboratory)
                                        <i class="material-icons uk-text-success md-24">&#xE876;</i>
                                    @endif
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large" style="padding-left: 30px;">OPD-OR</span><br/>
                                </td>
                                <td class="uk-text-center">
                                    @if ($planCoverage->op_opd_or)
                                        <i class="material-icons uk-text-success md-24">&#xE876;</i>
                                    @endif
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large" style="padding-left: 30px;">Facility Fee</span><br/>
                                </td>
                                <td class="uk-text-center">
                                    @if ($planCoverage->op_facility_fee)
                                        <i class="material-icons uk-text-success md-24">&#xE876;</i>
                                    @endif
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large" style="padding-left: 30px;">Clinic Setting</span><br/>
                                </td>
                                <td class="uk-text-center">
                                    @if ($planCoverage->op_clinic_setting)
                                        <i class="material-icons uk-text-success md-24">&#xE876;</i>
                                    @endif
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Annual Physical Exam</span><br/>
                                </td>
                                <td class="uk-text-center">
                                    @if ($planCoverage->annual_physical_exam)
                                        <i class="material-icons uk-text-success md-24">&#xE876;</i>
                                    @endif
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Emergency</span><br/>
                                </td>
                                <td class="uk-text-center">
                                    @if ($planCoverage->emergency)
                                        <i class="material-icons uk-text-success md-24">&#xE876;</i>
                                    @endif
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Maternity</span><br/>
                                </td>
                                <td class="uk-text-center">
                                    @if ($planCoverage->maternity)
                                        <i class="material-icons uk-text-success md-24">&#xE876;</i>
                                    @endif
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large" style="padding-left: 30px;">Pre and Post Natal Consultation</span><br/>
                                </td>
                                <td class="uk-text-center">
                                    @if ($planCoverage->maternity_pre_and_post_natal)
                                        <i class="material-icons uk-text-success md-24">&#xE876;</i>
                                    @endif
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large" style="padding-left: 30px;">Laboratory</span><br/>
                                </td>
                                <td class="uk-text-center">
                                    @if ($planCoverage->maternity_laboratory)
                                        <i class="material-icons uk-text-success md-24">&#xE876;</i>
                                    @endif
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large" style="padding-left: 30px;">Delivery</span><br/>
                                </td>
                                <td class="uk-text-center">
                                    @if ($planCoverage->maternity_delivery)
                                        <i class="material-icons uk-text-success md-24">&#xE876;</i>
                                    @endif
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Reimbursement</span><br/>
                                </td>
                                <td class="uk-text-center">
                                    @if ($planCoverage->reimbursement)
                                        <i class="material-icons uk-text-success md-24">&#xE876;</i>
                                    @endif
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large" style="padding-left: 30px;">Inpatient</span><br/>
                                </td>
                                <td class="uk-text-center">
                                    @if ($planCoverage->reimbursement_inpatient)
                                        <i class="material-icons uk-text-success md-24">&#xE876;</i>
                                    @endif
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large" style="padding-left: 30px;">Outpatient</span><br/>
                                </td>
                                <td class="uk-text-center">
                                    @if ($planCoverage->reimbursement_outpatient)
                                        <i class="material-icons uk-text-success md-24">&#xE876;</i>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <h3 class="full_width_in_card heading_c uk-margin-small-top">Benefit Limit</h3>

            <div style="padding-left: 20px; padding-right: 20px;" class="uk-grid uk-margin-large-bottom">
                <div class="uk-width-medium-2-10">
                    <span class="uk-display-block uk-margin-small-top uk-text-large uk-text-success">INPATIENT</span>
                </div>
                <div class="uk-width-8-10">
                    <table class="uk-table">
                        <thead>
                            <tr class="uk-text-upper">
                                <th>Inner Limit</th>
                                <th width="25%" class="uk-text-right">Basic Limit</th>
                                <th width="25%" class="uk-text-right">Major Limit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Max Limit</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toPeso($planBenefitLimit->ip_max_limit_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toPeso($planBenefitLimit->ip_max_limit_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Room & Board (Category)</span><br/>
                                </td>
                                <td colspan="2" class="uk-text-right">
                                    {{ strtoupper($planBenefitLimit->ip_room_board_category) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Room & Board (Peso)</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->ip_room_board_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->ip_room_board_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Miscelaneous Hospital Services</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->ip_hospital_services_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->ip_hospital_services_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Surgical Fee</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->ip_surgical_fee_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->ip_surgical_fee_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Physician Fee</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->ip_physician_fee_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->ip_physician_fee_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Nurse Fee</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->ip_nurse_fee_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->ip_nurse_fee_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">OPD-OR</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->ip_opd_or_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->ip_opd_or_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">ECU</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->ip_ecu_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->ip_ecu_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Anesthesiologist Rate</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toPercentageAsCharged($planBenefitLimit->ip_anesthesiologist_rate_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toPercentageAsCharged($planBenefitLimit->ip_anesthesiologist_rate_major) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="padding-left: 20px; padding-right: 20px;"  class="uk-grid uk-margin-large-bottom">
                <div class="uk-width-medium-2-10">
                    <span class="uk-display-block uk-margin-small-top uk-text-large uk-text-success">OUTPATIENT</span>
                </div>
                <div class="uk-width-8-10">
                    <table class="uk-table">
                        <thead>
                            <tr class="uk-text-upper">
                                <th>Inner Limit</th>
                                <th width="25%" class="uk-text-right">Basic Limit</th>
                                <th width="25%" class="uk-text-right">Major Limit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Max Limit</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toPeso($planBenefitLimit->op_max_limit_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toPeso($planBenefitLimit->op_max_limit_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Basic Consultation</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->op_basic_consultation_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->op_basic_consultation_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Laboratory</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->op_laboratory_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->op_laboratory_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Clinic Setting</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->op_clinic_setting_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->op_clinic_setting_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Emergency</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->op_emergency_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->op_laboratory_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Medicine</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->op_medicine_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->op_medicine_major) }}
                                </td>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Total # of Visits</span><br/>
                                </td>
                                <td colspan="2" class="uk-text-right">
                                    {{ $planBenefitLimit->op_total_number_of_visit }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="padding-left: 20px; padding-right: 20px;"  class="uk-grid uk-margin-large-bottom">
                <div class="uk-width-medium-2-10">
                    <span class="uk-display-block uk-margin-small-top uk-text-large uk-text-success">MATERNITY</span>
                </div>
                <div class="uk-width-8-10">
                    <table class="uk-table">
                        <thead>
                            <tr class="uk-text-upper">
                                <th>Inner Limit</th>
                                <th width="25%" class="uk-text-right">Basic Limit</th>
                                <th width="25%" class="uk-text-right">Major Limit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Max Limit</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toPeso($planBenefitLimit->maternity_max_limit_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toPeso($planBenefitLimit->maternity_max_limit_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Normal Delivery</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->maternity_normal_delivery_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->maternity_normal_delivery_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Cesarian Section</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->maternity_cesarian_section_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->maternity_cesarian_section_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Home Delivery</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->maternity_home_delivery_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->maternity_home_delivery_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Miscarriage</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->maternity_miscarriage_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->maternity_miscarriage_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Maternity Complication</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->maternity_complication_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->maternity_complication_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Nursery</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->maternity_nursery_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->maternity_nursery_major) }}
                                </td>
                            </tr>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Pre and Post Natal</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->maternity_pre_post_natal_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toAsCharged($planBenefitLimit->maternity_pre_post_natal_major) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="padding-left: 20px; padding-right: 20px;"  class="uk-grid uk-margin-large-bottom">
                <div class="uk-width-medium-2-10">
                    <span class="uk-display-block uk-margin-small-top uk-text-large uk-text-success">ANNUAL PHYSICAL EXAM</span>
                </div>
                <div class="uk-width-8-10">
                    <table class="uk-table">
                        <thead>
                            <tr class="uk-text-upper">
                                <th>Inner Limit</th>
                                <th width="25%" class="uk-text-right">Basic Limit</th>
                                <th width="25%" class="uk-text-right">Major Limit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Max Limit</span><br/>
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toPeso($planBenefitLimit->ape_max_limit_basic) }}
                                </td>
                                <td class="uk-text-right">
                                    {{ \AppHelper::toPeso($planBenefitLimit->ape_max_limit_major) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
