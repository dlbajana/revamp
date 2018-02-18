<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\ProviderContactPerson;
use App\ProviderAction;
use App\ProviderLog;
use App\Address;

class Provider extends Model
{
    protected $table = 'providers';
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'phic_accreditation_from',
        'phic_accreditation_to',
        'accreditation_date',
        'disaccreditation_date',
        'orientation_date',
    ];

    protected $casts = [
        'tax_exempt' => 'boolean',
        'withheld' => 'boolean',
        'default_corporate_no_access' => 'boolean',
        'suspected_fraud' => 'boolean',
        'prompt_payment_discount' => 'boolean',
        'ip_opd_or_whole' => 'boolean',
        'ip_opd_or_split_hb_hospital' => 'boolean',
        'ip_opd_or_split_pf_doctor' => 'boolean',
        'op_consult_referral_paid_to_hospital' => 'boolean',
        'op_consult_referral_paid_to_doctor' => 'boolean',
        'clinic_setting_paid_to_hospital' => 'boolean',
        'clinic_setting_paid_to_doctor' => 'boolean',
        'with_mc' => 'boolean',
        'internet_access_industrial' => 'boolean',
        'internet_access_billing' => 'boolean',
        'internet_access_emergency' => 'boolean',
        'free_wifi_industrial_hmo' => 'boolean',
        'free_wifi_ip_rooms' => 'boolean',
        'free_wifi_emergency' => 'boolean',
        'free_wifi_mab' => 'boolean',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function addressRegion()
    {
        return $this->belongsTo(Address::class, 'address_region_id', 'region_id');
    }

    public function addressProvince()
    {
        return $this->belongsTo(Address::class, 'address_province_id', 'province_id');
    }

    public function addressCity()
    {
        return $this->belongsTo(Address::class, 'address_city_id', 'city_id');
    }

    public function addressBaranggay()
    {
        return $this->belongsTo(Address::class, 'address_baranggay_id', 'baranggay_id');
    }

    public function providerContactPersons()
    {
        return $this->hasMany(ProviderContactPerson::class, 'provider_id');
    }

    public function providerLogs()
    {
        return $this->hasMany(ProviderLog::class, 'provider_id');
    }

    public function providerActions()
    {
        return $this->hasMany(ProviderAction::class, 'provider_id');
    }

    public function logChangeAccreditationStatus($status, $createdById)
    {
        $this->providerLogs()->create([
            'title' => 'Change Accreditation Status to ' . strtoupper($status),
            'created_by' => $createdById,
        ]);
    }

    public function logCreateProviderRecord()
    {
        $this->providerLogs()->create([
            'title' => 'Create Provider Record',
            'created_by' => auth()->user()->id,
        ]);
    }

    public function logUpdateProviderRecord()
    {
        $this->providerLogs()->create([
            'title' => 'Update Provider Record',
            'created_by' => auth()->user()->id,
        ]);
    }

    public static function createFromRequest($request)
    {
        $provider = Provider::create([
            'id' => $request->code,
            'name' => $request->name,
            'short_name' => $request->short_name,
            'licensed_name' => $request->licensed_name,
            'business_type' => $request->business_type,
            'business_hours' => $request->business_hours,
            'number_of_beds' => $request->number_of_beds,
            'tin' => $request->tin,
            'tax_exempt' => $request->tax_exempt ?: 0,
            'withheld' => $request->withheld ?: 0,
            'accreditation_status' => $request->accreditation_status,

            'default_corporate_no_access' => $request->default_corporate_no_access ?: 0,
            'suspected_fraud' => $request->suspected_fraud ?: 0,

            'bank_account_name' => $request->bank_account_name,
            'bank_account_no' => $request->bank_account_no,
            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,

            'phic_accreditation_from' => $request->phic_accreditation_from,
            'phic_accreditation_to' => $request->phic_accreditation_to,

            'address' => $request->address,
            'address_region_id' => $request->address_region,
            'address_province_id' => $request->address_province,
            'address_city_id' => $request->address_city,
            'address_baranggay_id' => $request->address_baranggay,

            'payment_setup' => $request->payment_setup,
            'payment_terms' => $request->payment_terms,
            'submission_of_claims' => $request->submission_of_claims,

            'cash_bond' => str_replace(['₱ ', ','], '', $request->cash_bond),
            'credit_limit' => str_replace(['₱ ', ','], '', $request->credit_limit),

            'prompt_payment_discount' => $request->prompt_payment_discount ?: 0,
            'prompt_payment_discount_rate' => $request->prompt_payment_discount_rate ? str_replace([' %', ','], '', $request->prompt_payment_discount_rate) : null,
            'prompt_payment_discount_terms' => $request->prompt_payment_discount_terms,

            'late_payment_interest' => str_replace([' %', ','], '', $request->late_payment_interest),

            'ip_opd_or_whole' => $request->ip_opd_or_whole ?: 0,
            'ip_opd_or_whole_through' => $request->ip_opd_or_whole_through,

            'ip_opd_or_split_hb_hospital' => $request->ip_opd_or_split_hb_hospital ?: 0,
            'ip_opd_or_split_hb_hospital_through' => $request->ip_opd_or_split_hb_hospital_through,

            'ip_opd_or_split_pf_doctor' => $request->ip_opd_or_split_pf_doctor ?: 0,
            'ip_opd_or_split_pf_doctor_through' => $request->ip_opd_or_split_pf_doctor_through,

            'emergency_paid_to_hospital_through' => $request->emergency_paid_to_hospital_through,

            'op_consult_referral_paid_to_hospital' => $request->op_consult_referral_paid_to_hospital ?: 0,
            'op_consult_referral_paid_to_hospital_through' => $request->op_consult_referral_paid_to_hospital_through,

            'op_consult_referral_paid_to_doctor' => $request->op_consult_referral_paid_to_doctor ?: 0,
            'op_consult_referral_paid_to_doctor_through' => $request->op_consult_referral_paid_to_doctor_through,

            'op_lab_ape_facility_fee_paid_to_hospital_through' => $request->op_lab_ape_facility_fee_paid_to_hospital_through,

            'clinic_setting_paid_to_hospital' => $request->clinic_setting_paid_to_hospital ?: 0,
            'clinic_setting_paid_to_hospital_through' => $request->clinic_setting_paid_to_hospital_through,

            'clinic_setting_paid_to_doctor' => $request->clinic_setting_paid_to_doctor ?: 0,
            'clinic_setting_paid_to_doctor_through' => $request->clinic_setting_paid_to_doctor_through,

            'check_delivery_contact_person' => $request->check_delivery_contact_person,
            'check_delivery_contact_no' => $request->check_delivery_contact_no,
            'check_delivery_department' => $request->check_delivery_department,

            'with_mc' => $request->with_mc ?: 0,
            'mc_name' => $request->mc_name,
            'mc_specialization' => $request->mc_specialization,
            'mc_secretary_name' => $request->mc_secretary_name,
            'mc_clinic_hours' => $request->mc_clinic_hours,
            'mc_room_no' => $request->mc_room_no,
            'mc_contact_no' => $request->mc_contact_no,

            'mc_ip_fee' => str_replace(['₱ ', ','], '', $request->mc_ip_fee),
            'mc_op_fee' => str_replace(['₱ ', ','], '', $request->mc_op_fee),

            'ip_rates_ward' => str_replace(['₱ ', ','], '', $request->ip_rates_ward),
            'ip_rates_semi_private' => str_replace(['₱ ', ','], '', $request->ip_rates_semi_private),
            'ip_rates_private' => str_replace(['₱ ', ','], '', $request->ip_rates_private),
            'ip_rates_suite' => str_replace(['₱ ', ','], '', $request->ip_rates_suite),
            'ip_rates_icu' => str_replace(['₱ ', ','], '', $request->ip_rates_icu),
            'ip_rates_anes' => str_replace([' %', ','], '', $request->ip_rates_anes),
            'op_rates_pcp' => str_replace(['₱ ', ','], '', $request->op_rates_pcp),
            'op_rates_specialist' => str_replace(['₱ ', ','], '', $request->op_rates_specialist),

            'mode_of_releasing' => $request->mode_of_releasing,
            'doctor_accreditation' => $request->doctor_accreditation,
            'accreditation_date' => $request->accreditation_date,
            'disaccreditation_date' => $request->disaccreditation_date,

            'signatory_left_name' => $request->signatory_left_name,
            'signatory_left_designation' => $request->signatory_left_designation,
            'signatory_right_name' => $request->signatory_right_name,
            'signatory_right_designation' => $request->signatory_right_designation,

            'internet_access_industrial' => $request->internet_access_industrial ?: 0,
            'internet_access_billing' => $request->internet_access_billing ?: 0,
            'internet_access_emergency' => $request->internet_access_emergency ?: 0,
            'free_wifi_industrial_hmo' => $request->free_wifi_industrial_hmo ?: 0,
            'free_wifi_ip_rooms' => $request->free_wifi_ip_rooms ?: 0,
            'free_wifi_emergency' => $request->free_wifi_emergency ?: 0,
            'free_wifi_mab' => $request->free_wifi_mab ?: 0,

            'orientation_contact_person' => $request->orientation_contact_person,
            'orientation_date' => $request->orientation_date,

            'remarks' => $request->remarks,
            'sign_off_document_url' => $request->hasFile('sign_off_document') ? Storage::disk('public')->putFile('sign_off_documents', $request->file('sign_off_document')) : null,

            'created_by' => auth()->user()->id,
        ]);

        $provider->logCreateProviderRecord();

        foreach ($request->contact_person_department as $key => $contactPersonDepartment) {
            $provider->providerContactPersons()->create([
                'name' => $request->contact_person_name[$key],
                'designation' => $request->contact_person_designation[$key],
                'department' => $contactPersonDepartment,
                'mobile_no' => $request->contact_person_mobile_no[$key],
                'email' => $request->contact_person_email[$key],
                'fax_no' => $request->contact_person_fax_no[$key],
                'telephone_no' => $request->contact_person_telephone_no[$key],
            ]);
        }
    }

    public function updateFromRequest($request)
    {
        $this->update([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'licensed_name' => $request->licensed_name,
            'business_type' => $request->business_type,
            'business_hours' => $request->business_hours,
            'number_of_beds' => $request->number_of_beds,
            'tin' => $request->tin,
            'tax_exempt' => $request->tax_exempt ?: 0,
            'withheld' => $request->withheld ?: 0,
            'accreditation_status' => $request->accreditation_status,

            'default_corporate_no_access' => $request->default_corporate_no_access ?: 0,
            'suspected_fraud' => $request->suspected_fraud ?: 0,

            'bank_account_name' => $request->bank_account_name,
            'bank_account_no' => $request->bank_account_no,
            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,

            'phic_accreditation_from' => $request->phic_accreditation_from,
            'phic_accreditation_to' => $request->phic_accreditation_to,

            'address' => $request->address,
            'address_region_id' => $request->address_region,
            'address_province_id' => $request->address_province,
            'address_city_id' => $request->address_city,
            'address_baranggay_id' => $request->address_baranggay,

            'payment_setup' => $request->payment_setup,
            'payment_terms' => $request->payment_terms,
            'submission_of_claims' => $request->submission_of_claims,

            'cash_bond' => str_replace(['₱ ', ','], '', $request->cash_bond),
            'credit_limit' => str_replace(['₱ ', ','], '', $request->credit_limit),

            'prompt_payment_discount' => $request->prompt_payment_discount ?: 0,
            'prompt_payment_discount_rate' => $request->prompt_payment_discount_rate ? str_replace([' %', ','], '', $request->prompt_payment_discount_rate) : null,
            'prompt_payment_discount_terms' => $request->prompt_payment_discount_terms,

            'late_payment_interest' => str_replace([' %', ','], '', $request->late_payment_interest),

            'ip_opd_or_whole' => $request->ip_opd_or_whole ?: 0,
            'ip_opd_or_whole_through' => $request->ip_opd_or_whole_through,

            'ip_opd_or_split_hb_hospital' => $request->ip_opd_or_split_hb_hospital ?: 0,
            'ip_opd_or_split_hb_hospital_through' => $request->ip_opd_or_split_hb_hospital_through,

            'ip_opd_or_split_pf_doctor' => $request->ip_opd_or_split_pf_doctor ?: 0,
            'ip_opd_or_split_pf_doctor_through' => $request->ip_opd_or_split_pf_doctor_through,

            'emergency_paid_to_hospital_through' => $request->emergency_paid_to_hospital_through,

            'op_consult_referral_paid_to_hospital' => $request->op_consult_referral_paid_to_hospital ?: 0,
            'op_consult_referral_paid_to_hospital_through' => $request->op_consult_referral_paid_to_hospital_through,

            'op_consult_referral_paid_to_doctor' => $request->op_consult_referral_paid_to_doctor ?: 0,
            'op_consult_referral_paid_to_doctor_through' => $request->op_consult_referral_paid_to_doctor_through,

            'op_lab_ape_facility_fee_paid_to_hospital_through' => $request->op_lab_ape_facility_fee_paid_to_hospital_through,

            'clinic_setting_paid_to_hospital' => $request->clinic_setting_paid_to_hospital ?: 0,
            'clinic_setting_paid_to_hospital_through' => $request->clinic_setting_paid_to_hospital_through,

            'clinic_setting_paid_to_doctor' => $request->clinic_setting_paid_to_doctor ?: 0,
            'clinic_setting_paid_to_doctor_through' => $request->clinic_setting_paid_to_doctor_through,

            'check_delivery_contact_person' => $request->check_delivery_contact_person,
            'check_delivery_contact_no' => $request->check_delivery_contact_no,
            'check_delivery_department' => $request->check_delivery_department,

            'with_mc' => $request->with_mc ?: 0,
            'mc_name' => $request->mc_name,
            'mc_specialization' => $request->mc_specialization,
            'mc_secretary_name' => $request->mc_secretary_name,
            'mc_clinic_hours' => $request->mc_clinic_hours,
            'mc_room_no' => $request->mc_room_no,
            'mc_contact_no' => $request->mc_contact_no,

            'mc_ip_fee' => str_replace(['₱ ', ','], '', $request->mc_ip_fee),
            'mc_op_fee' => str_replace(['₱ ', ','], '', $request->mc_op_fee),

            'ip_rates_ward' => str_replace(['₱ ', ','], '', $request->ip_rates_ward),
            'ip_rates_semi_private' => str_replace(['₱ ', ','], '', $request->ip_rates_semi_private),
            'ip_rates_private' => str_replace(['₱ ', ','], '', $request->ip_rates_private),
            'ip_rates_suite' => str_replace(['₱ ', ','], '', $request->ip_rates_suite),
            'ip_rates_icu' => str_replace(['₱ ', ','], '', $request->ip_rates_icu),
            'ip_rates_anes' => str_replace([' %', ','], '', $request->ip_rates_anes),
            'op_rates_pcp' => str_replace(['₱ ', ','], '', $request->op_rates_pcp),
            'op_rates_specialist' => str_replace(['₱ ', ','], '', $request->op_rates_specialist),

            'mode_of_releasing' => $request->mode_of_releasing,
            'doctor_accreditation' => $request->doctor_accreditation,
            'accreditation_date' => $request->accreditation_date,
            'disaccreditation_date' => $request->disaccreditation_date,

            'signatory_left_name' => $request->signatory_left_name,
            'signatory_left_designation' => $request->signatory_left_designation,
            'signatory_right_name' => $request->signatory_right_name,
            'signatory_right_designation' => $request->signatory_right_designation,

            'internet_access_industrial' => $request->internet_access_industrial ?: 0,
            'internet_access_billing' => $request->internet_access_billing ?: 0,
            'internet_access_emergency' => $request->internet_access_emergency ?: 0,
            'free_wifi_industrial_hmo' => $request->free_wifi_industrial_hmo ?: 0,
            'free_wifi_ip_rooms' => $request->free_wifi_ip_rooms ?: 0,
            'free_wifi_emergency' => $request->free_wifi_emergency ?: 0,
            'free_wifi_mab' => $request->free_wifi_mab ?: 0,

            'orientation_contact_person' => $request->orientation_contact_person,
            'orientation_date' => $request->orientation_date,

            'remarks' => $request->remarks,
            'sign_off_document_url' => $request->hasFile('sign_off_document') ? Storage::disk('public')->putFile('sign_off_documents', $request->file('sign_off_document')) : $this->sign_off_document_url,
        ]);

        $this->logUpdateProviderRecord();

        foreach ($request->contact_person_department as $key => $contactPersonDepartment) {
            $providerContactPersons = $this->providerContactPersons->where('department', $contactPersonDepartment)->first();

            optional($providerContactPersons)->update([
                'name' => $request->contact_person_name[$key],
                'designation' => $request->contact_person_designation[$key],
                'department' => $contactPersonDepartment,
                'mobile_no' => $request->contact_person_mobile_no[$key],
                'email' => $request->contact_person_email[$key],
                'fax_no' => $request->contact_person_fax_no[$key],
                'telephone_no' => $request->contact_person_telephone_no[$key],
            ]);
        }
    }
}
