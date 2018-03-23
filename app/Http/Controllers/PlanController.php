<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Corporate;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $plans = Plan::with(['corporate'])->get();
        return view('plans.index', compact('plans'));
    }

    public function create()
    {
        $corporates = Corporate::get();
        return view('plans.create', compact('corporates'));
    }

    public function store(Request $request)
    {
        if ($request->ip_anesthesiologist_rate_basic) {
            $request['ip_anesthesiologist_rate_basic'] = str_replace([' %', ','], '', $request->ip_anesthesiologist_rate_basic);
        }
        if ($request->ip_anesthesiologist_rate_major) {
            $request['ip_anesthesiologist_rate_major'] = str_replace([' %', ','], '', $request->ip_anesthesiologist_rate_major);
        }

        $request->validate([
            'corporate_id' => 'required',
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'copay_company' => 'required|max:100|min:0',
            'copay_company' => 'required|max:100|min:0',
            'ip_anesthesiologist_rate_basic' => 'numeric|min:0|max:100',
            'ip_anesthesiologist_rate_major' => 'numeric|min:0|max:100',
        ]);

        // Plan
        $plan = Plan::create([
            'corporate_id' => $request->corporate_id,
            'name' => $request->name,
            'status' => 'active',
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'shared_limit' => $request->shared_limit ?: 0,
            'cover_preexisting' => $request->cover_preexisting ?: 0,
            'type' => $request->type,
            'limit' => $request->limit,
            'intervening_period' => $request->intervening_period,
            'copay_company' => $request->copay_company / 100,
            'copay_member' => $request->copay_member / 100,
            'covered_dreaded_diseases' => $request->covered_dreaded_diseases,
            'exclusions' => $request->exclusions,
            'created_by' => auth()->user()->id,
        ]);

        // Plan Coverage
        $plan->planCoverage()->create([
            'inpatient' => $request->inpatient ?: 0,
            'outpatient' => $request->outpatient ?: 0,
            'op_basic_consultation' => $request->op_basic_consultation ?: 0,
            'op_referral_to_specialist' => $request->op_referral_to_specialist ?: 0,
            'op_laboratory' => $request->op_laboratory ?: 0,
            'op_opd_or' => $request->op_opd_or ?: 0,
            'op_facility_fee' => $request->op_facility_fee ?: 0,
            'op_clinic_setting' => $request->op_clinic_setting ?: 0,
            'annual_physical_exam' => $request->annual_physical_exam ?: 0,
            'emergency' => $request->emergency ?: 0,
            'maternity' => $request->maternity ?: 0,
            'maternity_pre_and_post_natal' => $request->maternity_pre_and_post_natal ?: 0,
            'maternity_laboratory' => $request->maternity_laboratory ?: 0,
            'maternity_delivery' => $request->maternity_delivery ?: 0,
            'reimbursement' => $request->reimbursement ?: 0,
            'reimbursement_inpatient' => $request->reimbursement_inpatient ?: 0,
            'reimbursement_outpatient' => $request->reimbursement_outpatient ?: 0,
        ]);

        // Plan Benefit Limit
        $plan->planBenefitLimit()->create([
            'ip_max_limit_basic' => \AppHelper::trimPesoSign($request->ip_max_limit_basic),
            'ip_max_limit_major' => \AppHelper::trimPesoSign($request->ip_max_limit_major),

            'ip_room_board_basic' => \AppHelper::trimPesoSign($request->ip_room_board_basic),
            'ip_room_board_major' => \AppHelper::trimPesoSign($request->ip_room_board_major),
            'ip_room_board_category' => $request->ip_room_board_category,

            'ip_hospital_services_basic' => \AppHelper::trimPesoSign($request->ip_hospital_services_basic) ,
            'ip_hospital_services_major' => \AppHelper::trimPesoSign($request->ip_hospital_services_major),

            'ip_surgical_fee_basic' => \AppHelper::trimPesoSign($request->ip_surgical_fee_basic),
            'ip_surgical_fee_major' => \AppHelper::trimPesoSign($request->ip_surgical_fee_major),

            'ip_physician_fee_basic' => \AppHelper::trimPesoSign($request->ip_physician_fee_basic),
            'ip_physician_fee_major' => \AppHelper::trimPesoSign($request->ip_physician_fee_major),

            'ip_nurse_fee_basic' => \AppHelper::trimPesoSign($request->ip_nurse_fee_basic),
            'ip_nurse_fee_major' => \AppHelper::trimPesoSign($request->ip_nurse_fee_major),

            'ip_opd_or_basic' => \AppHelper::trimPesoSign($request->ip_opd_or_basic),
            'ip_opd_or_major' => \AppHelper::trimPesoSign($request->ip_opd_or_major),

            'ip_ecu_basic' => \AppHelper::trimPesoSign($request->ip_ecu_basic),
            'ip_ecu_major' => \AppHelper::trimPesoSign($request->ip_ecu_major),

            'ip_anesthesiologist_rate_basic' => \AppHelper::trimPercentSign($request->ip_anesthesiologist_rate_basic),
            'ip_anesthesiologist_rate_major' => \AppHelper::trimPercentSign($request->ip_anesthesiologist_rate_major),


            'op_max_limit_basic' => \AppHelper::trimPesoSign($request->op_max_limit_basic),
            'op_max_limit_major' => \AppHelper::trimPesoSign($request->op_max_limit_major),

            'op_total_number_of_visit' => $request->op_total_number_of_visit,

            'op_basic_consultation_basic' => \AppHelper::trimPesoSign($request->op_basic_consultation_basic),
            'op_basic_consultation_major' => \AppHelper::trimPesoSign($request->op_basic_consultation_major),

            'op_laboratory_basic' => \AppHelper::trimPesoSign($request->op_laboratory_basic),
            'op_laboratory_major' => \AppHelper::trimPesoSign($request->op_laboratory_major),

            'op_clinic_setting_basic' => \AppHelper::trimPesoSign($request->op_clinic_setting_basic),
            'op_clinic_setting_major' => \AppHelper::trimPesoSign($request->op_clinic_setting_major),

            'op_emergency_basic' => \AppHelper::trimPesoSign($request->op_emergency_basic),
            'op_emergency_major' => \AppHelper::trimPesoSign($request->op_emergency_major),

            'op_medicine_basic' => \AppHelper::trimPesoSign($request->op_medicine_basic),
            'op_medicine_major' => \AppHelper::trimPesoSign($request->op_medicine_major),


            'maternity_max_limit_basic' => \AppHelper::trimPesoSign($request->maternity_max_limit_basic),
            'maternity_max_limit_major' => \AppHelper::trimPesoSign($request->maternity_max_limit_major),

            'maternity_normal_delivery_basic' => \AppHelper::trimPesoSign($request->maternity_normal_delivery_basic),
            'maternity_normal_delivery_major' => \AppHelper::trimPesoSign($request->maternity_normal_delivery_major),

            'maternity_cesarian_section_basic' => \AppHelper::trimPesoSign($request->maternity_cesarian_section_basic),
            'maternity_cesarian_section_major' => \AppHelper::trimPesoSign($request->maternity_cesarian_section_major),

            'maternity_home_delivery_basic' => \AppHelper::trimPesoSign($request->maternity_home_delivery_basic),
            'maternity_home_delivery_major' => \AppHelper::trimPesoSign($request->maternity_home_delivery_major),

            'maternity_miscarriage_basic' => \AppHelper::trimPesoSign($request->maternity_miscarriage_basic),
            'maternity_miscarriage_major' => \AppHelper::trimPesoSign($request->maternity_miscarriage_major),

            'maternity_complication_basic' => \AppHelper::trimPesoSign($request->maternity_complication_basic),
            'maternity_complication_major' => \AppHelper::trimPesoSign($request->maternity_complication_major),

            'maternity_nursery_basic' => \AppHelper::trimPesoSign($request->maternity_nursery_basic),
            'maternity_nursery_major' => \AppHelper::trimPesoSign($request->maternity_9nursery_major),

            'maternity_pre_post_natal_basic' => \AppHelper::trimPesoSign($request->maternity_pre_post_natal_basic),
            'maternity_pre_post_natal_major' => \AppHelper::trimPesoSign($request->maternity_pre_post_natal_major),


            'ape_max_limit_basic' => \AppHelper::trimPesoSign($request->ape_max_limit_basic),
            'ape_max_limit_major' => \AppHelper::trimPesoSign($request->ape_max_limit_major),
        ]);

        session()->flash('notify', [
            'message' => 'Plan created successful!',
            'type' => 'success',
        ]);

        return redirect()->route('plans.index');
    }

    public function show(Plan $plan)
    {
        $plan->load(['corporate', 'planCoverage', 'planBenefitLimit', 'createdBy']);
        return view('plans.show', compact('plan'));
    }

    public function edit(Plan $plan)
    {
        $plan->load(['corporate', 'planCoverage', 'planBenefitLimit']);
        $corporates = Corporate::get();
        return view('plans.edit', compact('plan', 'corporates'));
    }

    public function update(Request $request, Plan $plan)
    {
        if ($request->ip_anesthesiologist_rate_basic) {
            $request['ip_anesthesiologist_rate_basic'] = str_replace([' %', ','], '', $request->ip_anesthesiologist_rate_basic);
        }
        if ($request->ip_anesthesiologist_rate_major) {
            $request['ip_anesthesiologist_rate_major'] = str_replace([' %', ','], '', $request->ip_anesthesiologist_rate_major);
        }

        $request->validate([
            'corporate_id' => 'required',
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'copay_company' => 'required|max:100|min:0',
            'copay_company' => 'required|max:100|min:0',
            'ip_anesthesiologist_rate_basic' => 'numeric|min:0|max:100',
            'ip_anesthesiologist_rate_major' => 'numeric|min:0|max:100',
        ]);

        // Plan
        $plan->update([
            'corporate_id' => $request->corporate_id,
            'name' => $request->name,
            'status' => 'active',
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'shared_limit' => $request->shared_limit ?: 0,
            'cover_preexisting' => $request->cover_preexisting ?: 0,
            'type' => $request->type,
            'limit' => $request->limit,
            'intervening_period' => $request->intervening_period,
            'copay_company' => $request->copay_company / 100,
            'copay_member' => $request->copay_member / 100,
            'covered_dreaded_diseases' => $request->covered_dreaded_diseases,
            'exclusions' => $request->exclusions,
        ]);

        // Plan Coverage
        $plan->planCoverage->update([
            'inpatient' => $request->inpatient ?: 0,
            'outpatient' => $request->outpatient ?: 0,
            'op_basic_consultation' => $request->op_basic_consultation ?: 0,
            'op_referral_to_specialist' => $request->op_referral_to_specialist ?: 0,
            'op_laboratory' => $request->op_laboratory ?: 0,
            'op_opd_or' => $request->op_opd_or ?: 0,
            'op_facility_fee' => $request->op_facility_fee ?: 0,
            'op_clinic_setting' => $request->op_clinic_setting ?: 0,
            'annual_physical_exam' => $request->annual_physical_exam ?: 0,
            'emergency' => $request->emergency ?: 0,
            'maternity' => $request->maternity ?: 0,
            'maternity_pre_and_post_natal' => $request->maternity_pre_and_post_natal ?: 0,
            'maternity_laboratory' => $request->maternity_laboratory ?: 0,
            'maternity_delivery' => $request->maternity_delivery ?: 0,
            'reimbursement' => $request->reimbursement ?: 0,
            'reimbursement_inpatient' => $request->reimbursement_inpatient ?: 0,
            'reimbursement_outpatient' => $request->reimbursement_outpatient ?: 0,
        ]);

        // Plan Benefit Limit
        $plan->planBenefitLimit->update([
            'ip_max_limit_basic' => \AppHelper::trimPesoSign($request->ip_max_limit_basic),
            'ip_max_limit_major' => \AppHelper::trimPesoSign($request->ip_max_limit_major),

            'ip_room_board_basic' => \AppHelper::trimPesoSign($request->ip_room_board_basic),
            'ip_room_board_major' => \AppHelper::trimPesoSign($request->ip_room_board_major),
            'ip_room_board_category' => $request->ip_room_board_category,

            'ip_hospital_services_basic' => \AppHelper::trimPesoSign($request->ip_hospital_services_basic),
            'ip_hospital_services_major' => \AppHelper::trimPesoSign($request->ip_hospital_services_major),

            'ip_surgical_fee_basic' => \AppHelper::trimPesoSign($request->ip_surgical_fee_basic),
            'ip_surgical_fee_major' => \AppHelper::trimPesoSign($request->ip_surgical_fee_major),

            'ip_physician_fee_basic' => \AppHelper::trimPesoSign($request->ip_physician_fee_basic),
            'ip_physician_fee_major' => \AppHelper::trimPesoSign($request->ip_physician_fee_major),

            'ip_nurse_fee_basic' => \AppHelper::trimPesoSign($request->ip_nurse_fee_basic),
            'ip_nurse_fee_major' => \AppHelper::trimPesoSign($request->ip_nurse_fee_major),

            'ip_opd_or_basic' => \AppHelper::trimPesoSign($request->ip_opd_or_basic),
            'ip_opd_or_major' => \AppHelper::trimPesoSign($request->ip_opd_or_major),

            'ip_ecu_basic' => \AppHelper::trimPesoSign($request->ip_ecu_basic),
            'ip_ecu_major' => \AppHelper::trimPesoSign($request->ip_ecu_major),

            'ip_anesthesiologist_rate_basic' => \AppHelper::trimPercentSign($request->ip_anesthesiologist_rate_basic),
            'ip_anesthesiologist_rate_major' => \AppHelper::trimPercentSign($request->ip_anesthesiologist_rate_major),


            'op_max_limit_basic' => \AppHelper::trimPesoSign($request->op_max_limit_basic),
            'op_max_limit_major' => \AppHelper::trimPesoSign($request->op_max_limit_major),

            'op_total_number_of_visit' => $request->op_total_number_of_visit,

            'op_basic_consultation_basic' => \AppHelper::trimPesoSign($request->op_basic_consultation_basic),
            'op_basic_consultation_major' => \AppHelper::trimPesoSign($request->op_basic_consultation_major),

            'op_laboratory_basic' => \AppHelper::trimPesoSign($request->op_laboratory_basic),
            'op_laboratory_major' => \AppHelper::trimPesoSign($request->op_laboratory_major),

            'op_clinic_setting_basic' => \AppHelper::trimPesoSign($request->op_clinic_setting_basic),
            'op_clinic_setting_major' => \AppHelper::trimPesoSign($request->op_clinic_setting_major),

            'op_emergency_basic' => \AppHelper::trimPesoSign($request->op_emergency_basic),
            'op_emergency_major' => \AppHelper::trimPesoSign($request->op_emergency_major),

            'op_medicine_basic' => \AppHelper::trimPesoSign($request->op_medicine_basic),
            'op_medicine_major' => \AppHelper::trimPesoSign($request->op_medicine_major),


            'maternity_max_limit_basic' => \AppHelper::trimPesoSign($request->maternity_max_limit_basic),
            'maternity_max_limit_major' => \AppHelper::trimPesoSign($request->maternity_max_limit_major),

            'maternity_normal_delivery_basic' => \AppHelper::trimPesoSign($request->maternity_normal_delivery_basic),
            'maternity_normal_delivery_major' => \AppHelper::trimPesoSign($request->maternity_normal_delivery_major),

            'maternity_cesarian_section_basic' => \AppHelper::trimPesoSign($request->maternity_cesarian_section_basic),
            'maternity_cesarian_section_major' => \AppHelper::trimPesoSign($request->maternity_cesarian_section_major),

            'maternity_home_delivery_basic' => \AppHelper::trimPesoSign($request->maternity_home_delivery_basic),
            'maternity_home_delivery_major' => \AppHelper::trimPesoSign($request->maternity_home_delivery_major),

            'maternity_miscarriage_basic' => \AppHelper::trimPesoSign($request->maternity_miscarriage_basic),
            'maternity_miscarriage_major' => \AppHelper::trimPesoSign($request->maternity_miscarriage_major),

            'maternity_complication_basic' => \AppHelper::trimPesoSign($request->maternity_complication_basic),
            'maternity_complication_major' => \AppHelper::trimPesoSign($request->maternity_complication_major),

            'maternity_nursery_basic' => \AppHelper::trimPesoSign($request->maternity_nursery_basic),
            'maternity_nursery_major' => \AppHelper::trimPesoSign($request->maternity_nursery_major),

            'maternity_pre_post_natal_basic' => \AppHelper::trimPesoSign($request->maternity_pre_post_natal_basic),
            'maternity_pre_post_natal_major' => \AppHelper::trimPesoSign($request->maternity_pre_post_natal_major),


            'ape_max_limit_basic' => \AppHelper::trimPesoSign($request->ape_max_limit_basic),
            'ape_max_limit_major' => \AppHelper::trimPesoSign($request->ape_max_limit_major),
        ]);

        session()->flash('notify', [
            'message' => 'Plan updated successful!',
            'type' => 'success',
        ]);

        return redirect()->route('plans.index');
    }

    public function destroy(Plan $plan)
    {
        //
    }
}
