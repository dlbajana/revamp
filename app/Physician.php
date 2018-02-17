<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\PhysicianLog;
use App\PhysicianAction;

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
            'provincial_address' => $request->provincial_address,
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
            'provincial_address' => $request->provincial_address,
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
}
