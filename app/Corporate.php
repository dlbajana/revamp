<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\User;
use App\CorporateLog;
use App\Plan;
use App\CorporateAction;
use App\CorporateFundHistory;

class Corporate extends Model
{
    protected $table = 'corporates';
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'date_effectivity_from',
        'date_effectivity_to',
        'date_expiry',
        'billing_due_date',
    ];

    protected $casts = [
        'suspected_fraud' => 'boolean',
        'co_brand' => 'boolean',
        'auto_deduct' => 'boolean',
        'withheld' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function corporateLogs()
    {
        return $this->hasMany(CorporateLog::class, 'corporate_id');
    }

    public function corporateActions()
    {
        return $this->hasMany(CorporateAction::class, 'corporate_id');
    }

    public function corporateFundHistories()
    {
        return $this->hasMany(CorporateFundHistory::class, 'corporate_id');
    }

    public function plans()
    {
        return $this->hasMany(Plan::class, 'corporate_id');
    }

    public function businessAddressRegion()
    {
        return $this->belongsTo(Address::class, 'business_address_region_id', 'region_id');
    }

    public function businessAddressProvince()
    {
        return $this->belongsTo(Address::class, 'business_address_province_id', 'province_id');
    }

    public function businessAddressCity()
    {
        return $this->belongsTo(Address::class, 'business_address_city_id', 'city_id');
    }

    public function businessAddressBaranggay()
    {
        return $this->belongsTo(Address::class, 'business_address_baranggay_id', 'baranggay_id');
    }

    public function billingAddressRegion()
    {
        return $this->belongsTo(Address::class, 'billing_address_region_id', 'region_id');
    }

    public function billingAddressProvince()
    {
        return $this->belongsTo(Address::class, 'billing_address_province_id', 'province_id');
    }

    public function billingAddressCity()
    {
        return $this->belongsTo(Address::class, 'billing_address_city_id', 'city_id');
    }

    public function billingAddressBaranggay()
    {
        return $this->belongsTo(Address::class, 'billing_address_baranggay_id', 'baranggay_id');
    }


    /*
    |--------------------------------------------------------------------------
    | COMPUTED PROPERTIES
    |--------------------------------------------------------------------------
    */
    public function completeBusinessAddress()
    {
        $address = $this->business_address;

        if ($baranggay = $this->businessAddressBaranggay) {
            $address = $address . ', ' . $baranggay->baranggay;
        }

        if ($city = $this->businessAddressCity) {
            $address = $address . ', ' . $city->city;

            if ($baranggay = $this->businessAddressBaranggay) {
                $address = $address . ' ' . $baranggay->zipcode;
            }
        }

        if ($province = $this->businessAddressProvince) {
            $address = $address . ', ' . $province->province;
        }

        if ($region = $this->businessAddressRegion) {
            $address = $address . ', ' . $region->region;
        }

        return $address;
    }

    public function completeBillingAddress()
    {
        $address = $this->billing_address;

        if ($baranggay = $this->billingAddressBaranggay) {
            $address = $address . ', ' . $baranggay->baranggay;
        }

        if ($city = $this->billingAddressCity) {
            $address = $address . ', ' . $city->city;

            if ($baranggay = $this->billingAddressBaranggay) {
                $address = $address . ' ' . $baranggay->zipcode;
            }
        }

        if ($province = $this->billingAddressProvince) {
            $address = $address . ', ' . $province->province;
        }

        if ($region = $this->billingAddressRegion) {
            $address = $address . ', ' . $region->region;
        }

        return $address;
    }


    /*
    |--------------------------------------------------------------------------
    | METHODS
    |--------------------------------------------------------------------------
    */
    public static function createFromRequest($request)
    {
        $corporate = Corporate::create([
            'id' => $request->code,
            'name' => $request->name,
            'card_name' => $request->card_name,
            'industry' => $request->industry,
            'industry_others' => $request->industry_others,
            'account_type' => $request->account_type,
            'philhealth_no' => $request->philhealth_no,
            'acceptance_age' => $request->acceptance_age,
            'termination_age' => $request->termination_age,
            'benefit_layer' => $request->benefit_layer,
            'status' => $request->status,
            'date_effectivity_from' => $request->date_effectivity_from,
            'date_effectivity_to' => Carbon::createFromFormat('Y-m-d', '1975-05-21')->addMonths($request->effectivity_period),
            'effectivity_period' => $request->effectivity_period,
            'date_expiry' => Carbon::createFromFormat('Y-m-d', '1975-05-21')->addMonths($request->effectivity_period)->addDay(),
            'company_logo_url' => $request->hasFile('company_logo') ? Storage::disk('public')->putFile('company_logos', $request->file('company_logo')) : null,
            'co_brand' => $request->co_brand ?: 0,

            'business_address' => $request->business_address,
            'business_address_region_id' => $request->business_address_region,
            'business_address_province_id' => $request->business_address_province,
            'business_address_city_id' => $request->business_address_city,
            'business_address_baranggay_id' => $request->business_address_baranggay,

            'billing_address' => $request->billing_address,
            'billing_address_region_id' => $request->billing_address_region,
            'billing_address_province_id' => $request->billing_address_province,
            'billing_address_city_id' => $request->billing_address_city,
            'billing_address_baranggay_id' => $request->billing_address_baranggay,

            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,
            'bank_account_name' => $request->bank_account_name,
            'bank_account_no' => $request->bank_account_no,
            'billing_due_date' => $request->billing_due_date,
            'auto_deduct' => $request->auto_deduct ?: 0,

            'contact_person_name' => $request->contact_person_name,
            'contact_person_designation' => $request->contact_person_designation,
            'contact_person_telephone_no' => $request->contact_person_telephone_no,
            'contact_person_fax_no' => $request->contact_person_fax_no,
            'contact_person_mobile_no' => $request->contact_person_mobile_no,
            'contact_person_email' => $request->contact_person_email,
            'hr_email' => $request->hr_email,

            'tin' => $request->tin,
            'withheld' => $request->Withheld ?: 0,
            'representative_name' => $request->representative_name,
            'representative_tin' => $request->representative_tin,
            'representative_position' => $request->representative_position,
            'electronic_signature_url' => $request->hasFile('electronic_signature') ? Storage::disk('public')->putFile('electronic_signatures', $request->file('electronic_signature')) : null,
            'secretary_certificate_url' => $request->hasFile('secretary_certificate') ? Storage::disk('public')->putFile('secretary_certificates', $request->file('secretary_certificate')) : null,

            'cash_bond' => str_replace(['₱ ', ','], '', $request->cash_bond),
            'revolving_fund' => str_replace(['₱ ', ','], '', $request->revolving_fund),
            // 'utilized_amount' => str_replace(['₱ ', ','], '', $request->utilized_amount),
            // 'stale_amount' => str_replace(['₱ ', ','], '', $request->stale_amount),
            'first_warning' => str_replace(['₱ ', ','], '', $request->first_warning),
            'threshold' => str_replace(['₱ ', ','], '', $request->threshold),
            // 'remaining_fund' => str_replace(['₱ ', ','], '', $request->remaining_fund),
            'admin_fee' => str_replace([' %', ','], '', $request->admin_fee),

            'payment_setup' => $request->payment_setup,

            'remarks' => $request->remarks,
            'created_by' => auth()->user()->id,
        ]);

        $corporate->debitFund($corporate->revolving_fund, 'Initial Revolving Fund');

        return $corporate;
    }

    public function updateFromRequest($request)
    {
        $corporate = $this->update([
            'name' => $request->name,
            'card_name' => $request->card_name,
            'industry' => $request->industry,
            'industry_others' => $request->industry_others,
            'account_type' => $request->account_type,
            'philhealth_no' => $request->philhealth_no,
            'acceptance_age' => $request->acceptance_age,
            'termination_age' => $request->termination_age,
            'benefit_layer' => $request->benefit_layer,
            'date_effectivity_from' => $request->date_effectivity_from,
            'date_effectivity_to' => Carbon::createFromFormat('Y-m-d', '1975-05-21')->addMonths($request->effectivity_period),
            'effectivity_period' => $request->effectivity_period,
            'date_expiry' => Carbon::createFromFormat('Y-m-d', '1975-05-21')->addMonths($request->effectivity_period)->addDay(),
            'company_logo_url' => $request->hasFile('company_logo') ? Storage::disk('public')->putFile('company_logos', $request->file('company_logo')) : $this->company_logo_url,
            'co_brand' => $request->co_brand ?: 0,

            'business_address' => $request->business_address,
            'business_address_region_id' => $request->business_address_region,
            'business_address_province_id' => $request->business_address_province,
            'business_address_city_id' => $request->business_address_city,
            'business_address_baranggay_id' => $request->business_address_baranggay,

            'billing_address' => $request->billing_address,
            'billing_address_region_id' => $request->billing_address_region,
            'billing_address_province_id' => $request->billing_address_province,
            'billing_address_city_id' => $request->billing_address_city,
            'billing_address_baranggay_id' => $request->billing_address_baranggay,

            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,
            'bank_account_name' => $request->bank_account_name,
            'bank_account_no' => $request->bank_account_no,
            'billing_due_date' => $request->billing_due_date,
            'auto_deduct' => $request->auto_deduct ?: 0,

            'contact_person_name' => $request->contact_person_name,
            'contact_person_designation' => $request->contact_person_designation,
            'contact_person_telephone_no' => $request->contact_person_telephone_no,
            'contact_person_fax_no' => $request->contact_person_fax_no,
            'contact_person_mobile_no' => $request->contact_person_mobile_no,
            'contact_person_email' => $request->contact_person_email,
            'hr_email' => $request->hr_email,

            'tin' => $request->tin,
            'withheld' => $request->Withheld ?: 0,
            'representative_name' => $request->representative_name,
            'representative_tin' => $request->representative_tin,
            'representative_position' => $request->representative_position,
            'electronic_signature_url' => $request->hasFile('electronic_signature') ? Storage::disk('public')->putFile('electronic_signatures', $request->file('electronic_signature')) : $this->electronic_signature_url,
            'secretary_certificate_url' => $request->hasFile('secretary_certificate') ? Storage::disk('public')->putFile('secretary_certificates', $request->file('secretary_certificate')) : $this->secretary_certificate_url,

            // 'cash_bond' => str_replace(['₱ ', ','], '', $request->cash_bond),
            // 'revolving_fund' => str_replace(['₱ ', ','], '', $request->revolving_fund),
            // 'utilized_amount' => str_replace(['₱ ', ','], '', $request->utilized_amount),
            // 'stale_amount' => str_replace(['₱ ', ','], '', $request->stale_amount),
            'first_warning' => str_replace(['₱ ', ','], '', $request->first_warning),
            'threshold' => str_replace(['₱ ', ','], '', $request->threshold),
            // 'remaining_fund' => str_replace(['₱ ', ','], '', $request->remaining_fund),
            // 'admin_fee' => str_replace([' %', ','], '', $request->admin_fee),

            // 'payment_setup' => $request->payment_setup,

            'remarks' => $request->remarks,
        ]);

        return $this;
    }

    /**
     * Log whenever the fund is debitted.
     *
     * @param  double  $amount
     * @param  integer  $createdById
     * @return void
     */
    public function logDebitFund($amount, $createdById = null)
    {
        $this->corporateLogs()->create([
            'title' => 'Debit Fund of: ' . number_format($amount, 2),
            'created_by' =>$createdById,
        ]);
    }

    /**
     * Log whenever the fund is creditted.
     *
     * @param  double  $amount
     * @param  integer  $createdById
     * @return void
     */
    public function logCreditFund($amount, $createdById = null)
    {
        $this->corporateLogs()->create([
            'title' => 'Credit Fund of: ' . number_format($amount, 2),
            'created_by' =>$createdById,
        ]);
    }

    /**
     * Increases the revolving fund
     *
     * @param  double  $amount
     * @param  string  $title
     * @return double
     */
    public function debitFund($amount, $title)
    {
        $corporateFundHistories = CorporateFundHistory::where('corporate_id', $this->id)
                                                        ->get();

        $corporateFundHistory = $this->corporateFundHistories()->create([
            'debit' => $amount,
            'running_balance' => ($corporateFundHistories->sum('debit') - $corporateFundHistories->sum('credit')) + $amount,
            'title' => $title,
            'created_by' => optional(auth()->user())->id,
        ]);

        $this->logDebitFund($corporateFundHistory->debit, null, optional(auth()->user())->id);

        return $corporateFundHistory->running_balance;
    }

    /**
     * Decreases the revolving fund
     *
     * @param  double  $amount
     * @param  string  $title
     * @return double
     */
    public function creditFund($amount, $title)
    {
        $corporateFundHistories = CorporateFundHistory::where('corporate_id', $this->id)
                                                        ->get();

        $corporateFundHistory = $this->corporateFundHistories()->create([
            'credit' => $amount,
            'running_balance' => ($corporateFundHistories->sum('debit') - $corporateFundHistories->sum('credit')) - $amount,
            'title' => $title,
            'created_by' => optional(auth()->user())->id,
        ]);

        return $corporateFundHistory->running_balance;
    }
}
