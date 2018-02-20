<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\PhysicianLog;
use App\PhysicianAction;
use App\Address;
use App\Provider;

class Physician extends Model
{
    protected $table = 'physicians';
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'birthday',
        'phic_accreditation_from',
        'phic_accreditation_to',
        'prc_validity_date',
    ];

    protected $casts = [
        'suspected_fraud',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function homeAddressRegion()
    {
        return $this->belongsTo(Address::class, 'home_address_region_id', 'region_id');
    }

    public function homeAddressProvince()
    {
        return $this->belongsTo(Address::class, 'home_address_province_id', 'province_id');
    }

    public function homeAddressCity()
    {
        return $this->belongsTo(Address::class, 'home_address_city_id', 'city_id');
    }

    public function homeAddressBaranggay()
    {
        return $this->belongsTo(Address::class, 'home_address_baranggay_id', 'baranggay_id');
    }

    public function provincialAddressRegion()
    {
        return $this->belongsTo(Address::class, 'provincial_address_region_id', 'region_id');
    }

    public function provincialAddressProvince()
    {
        return $this->belongsTo(Address::class, 'provincial_address_province_id', 'province_id');
    }

    public function provincialAddressCity()
    {
        return $this->belongsTo(Address::class, 'provincial_address_city_id', 'city_id');
    }

    public function provincialAddressBaranggay()
    {
        return $this->belongsTo(Address::class, 'provincial_address_baranggay_id', 'baranggay_id');
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id', 'specialization_id');
    }

    public function subSpecialization()
    {
        return $this->belongsTo(Specialization::class, 'subspecialization_id', 'subspecialization_id');
    }

    public function physicianLogs()
    {
        return $this->hasMany(PhysicianLog::class, 'physician_id');
    }

    public function physicianActions()
    {
        return $this->hasMany(PhysicianAction::class, 'physician_id');
    }

    public function providers()
    {
        return $this->belongsToMany(Provider::class);
    }

    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function logChangeAccreditationStatus($status, $createdById)
    {
        $this->physicianLogs()->create([
            'title' => 'Change Accreditation Status to ' . strtoupper($status),
            'created_by' => $createdById,
        ]);
    }

    public function logCreatePhysicianRecord()
    {
        $this->physicianLogs()->create([
            'title' => 'Create Physician Record',
            'created_by' => auth()->user()->id,
        ]);
    }

    public function logUpdatePhysicianRecord()
    {
        $this->physicianLogs()->create([
            'title' => 'Update Physician Record',
            'created_by' => auth()->user()->id,
        ]);
    }

    public static function createFromRequest($request)
    {
        $physician = Physician::create([
            'id' => $request->id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'suffix' => $request->suffix,
            'mothers_maiden_name' => $request->mothers_maiden_name,
            'nationality' => $request->nationality,
            'birthday' => $request->birthday,
            'civil_status' => $request->civil_status,
            'gender' => $request->gender,
            'specialization_id' => $request->specialization,
            'subspecialization_id' => $request->subspecialization,
            'accreditation_status' => $request->accreditation_status,
            'status' => 'active',
            'suspected_fraud' => $request->suspected_fraud ?: 0,
            'telephone_no' => $request->telephone_no,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,

            'home_address' => $request->home_address,
            'home_address_region_id' => $request->home_address_region,
            'home_address_province_id' => $request->home_address_province,
            'home_address_city_id' => $request->home_address_city,
            'home_address_baranggay_id' => $request->home_address_baranggay,

            'provincial_address' => $request->provincial_address,
            'provincial_address_region_id' => $request->provincial_address_region,
            'provincial_address_province_id' => $request->provincial_address_province,
            'provincial_address_city_id' => $request->provincial_address_city,
            'provincial_address_baranggay_id' => $request->provincial_address_baranggay,

            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,
            'bank_account_name' => $request->bank_account_name,
            'bank_account_no' => $request->bank_account_no,
            'tin' => $request->tin,
            'sss_no' => $request->sss_no,
            'philhealth_no' => $request->philhealth_no,
            'phic_accreditation_from' => $request->phic_accreditation_from,
            'phic_accreditation_to' => $request->phic_accreditation_to,
            'prc_license_no' => $request->prc_license_no,
            'prc_validity_date' => $request->prc_validity_date,
            'remarks' => $request->remarks,
            'created_by' => auth()->user()->id,
        ]);
    }

    public function updateFromRequest($request)
    {
        $this->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'suffix' => $request->suffix,
            'mothers_maiden_name' => $request->mothers_maiden_name,
            'nationality' => $request->nationality,
            'birthday' => $request->birthday,
            'civil_status' => $request->civil_status,
            'gender' => $request->gender,
            'specialization_id' => $request->specialization,
            'subspecialization_id' => $request->subspecialization,
            'status' => 'active',
            'suspected_fraud' => $request->suspected_fraud ?: 0,
            'telephone_no' => $request->telephone_no,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,

            'home_address' => $request->home_address,
            'home_address_region_id' => $request->home_address_region,
            'home_address_province_id' => $request->home_address_province,
            'home_address_city_id' => $request->home_address_city,
            'home_address_baranggay_id' => $request->home_address_baranggay,

            'provincial_address' => $request->provincial_address,
            'provincial_address_region_id' => $request->provincial_address_region,
            'provincial_address_province_id' => $request->provincial_address_province,
            'provincial_address_city_id' => $request->provincial_address_city,
            'provincial_address_baranggay_id' => $request->provincial_address_baranggay,

            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,
            'bank_account_name' => $request->bank_account_name,
            'bank_account_no' => $request->bank_account_no,
            'tin' => $request->tin,
            'sss_no' => $request->sss_no,
            'philhealth_no' => $request->philhealth_no,
            'phic_accreditation_from' => $request->phic_accreditation_from,
            'phic_accreditation_to' => $request->phic_accreditation_to,
            'prc_license_no' => $request->prc_license_no,
            'prc_validity_date' => $request->prc_validity_date,
            'remarks' => $request->remarks,
        ]);

        $this->logUpdatePhysicianRecord();
    }

    public function completeHomeAddress()
    {
        $address = $this->home_address;

        if ($baranggay = $this->homeAddressBaranggay) {
            $address = $address . ', ' . $baranggay->baranggay;
        }

        if ($city = $this->homeAddressCity) {
            $address = $address . ', ' . $city->city;

            if ($baranggay = $this->homeAddressBaranggay) {
                $address = $address . ' ' . $baranggay->zipcode;
            }
        }

        if ($province = $this->homeAddressProvince) {
            $address = $address . ', ' . $province->province;
        }

        if ($region = $this->homeAddressRegion) {
            $address = $address . ', ' . $region->region;
        }

        return $address;
    }

    public function completeProvincialAddress()
    {
        $address = $this->home_address;

        if ($baranggay = $this->provincialAddressBaranggay) {
            $address = $address . ', ' . $baranggay->baranggay;
        }

        if ($city = $this->provincialAddressCity) {
            $address = $address . ', ' . $city->city;

            if ($baranggay = $this->provincialAddressBaranggay) {
                $address = $address . ' ' . $baranggay->zipcode;
            }
        }

        if ($province = $this->provincialAddressProvince) {
            $address = $address . ', ' . $province->province;
        }

        if ($region = $this->provincialAddressRegion) {
            $address = $address . ', ' . $region->region;
        }

        return $address;
    }
}
