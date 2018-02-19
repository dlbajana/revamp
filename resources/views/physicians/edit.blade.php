@extends('layouts.main')

@section('nav_physicians')
    current_section
@endsection

@section('breadcrumbs')
    <div id="top_bar">
        <ul id="breadcrumbs">
            <li><a href="{{ route('physicians.index') }}">Physicians</a></li>
            <li><a href="{{ route('physicians.show', $physician->id) }}">{{ $physician->fullName() }}</a></li>
            <li><span>Edit</span> </li>
        </ul>
    </div>
@endsection

@section('page-content')
    <h4 class="heading_b uk-margin-bottom">Physicians</h4>

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
                Enrollment Form
                <span class="sub-heading">Fill up all the required fields and click submit</span>
            </h2>
            <hr class="md-hr">
            <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#tab_physicians', animation:'slide-horizontal'}">
                <li class="uk-active"><a href="#">Information</a></li>
                <li class="uk-width-1-6"><a href="#">License</a></li>
            </ul>
            <form action="{{ route('physicians.update', $physician->id) }}" method="post">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <ul id="tab_physicians" class="uk-switcher uk-margin">
                    {{-- START INFORMATION TAB --}}
                    <li>
                        <div class="md-card-content">
                            <div class="uk-grid">
                                <div class="uk-width-medium-3-10">
                                    <label>First Name<span class="req">*</span></label>
                                    <input type="text" name="first_name" value="{{ old('first_name') ?: $physician->first_name }}" required class="md-input {{ $errors->has('first_name') ? ' md-input-danger' : '' }}"/>
                                    @if ($errors->has('first_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-medium-3-10">
                                    <label>Middle Name</label>
                                    <input type="text" name="middle_name" value="{{ old('middle_name') ?: $physician->middle_name }}" class="md-input {{ $errors->has('middle_name') ? ' md-input-danger' : '' }}"/>
                                    @if ($errors->has('name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('middle_name') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-medium-3-10">
                                    <label>Last Name<span class="req">*</span></label>
                                    <input type="text" name="last_name" value="{{ old('last_name') ?: $physician->last_name }}" required class="md-input {{ $errors->has('last_name') ? ' md-input-danger' : '' }}"/>
                                    @if ($errors->has('last_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-medium-1-10">
                                    <label>Suffix</label>
                                    <input type="text" name="suffix" value="{{ old('suffix') ?: $physician->suffix }}" class="md-input {{ $errors->has('suffix') ? ' md-input-danger' : '' }}"/>
                                    @if ($errors->has('suffix'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('suffix') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <label>Mother's Full Maiden Name</label>
                                    <input type="text" name="mothers_maiden_name" value="{{ old('mothers_maiden_name') ?: $physician->mothers_maiden_name }}" class="md-input {{ $errors->has('mothers_maiden_name') ? ' md-input-danger' : '' }}">
                                    @if ($errors->has('mothers_maiden_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('mothers_maiden_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-3">
                                    <select name="nationality" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Nationality">
                                        <option value="">Select...</option>
                                        @foreach ($nationalities as $key => $nationality)
                                            @if ($errors->any())
                                                <option value="{{ $nationality->name }}" @if(old('nationality') == $nationality->name) selected @endif>{{ $nationality->name }}</option>
                                            @else
                                                <option value="{{ $nationality->name }}" @if($physician->nationality == $nationality->name) selected @endif>{{ $nationality->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <span class="uk-form-help-block">Nationality</span>
                                </div>
                                <div class="uk-width-1-3">
                                    <select name="civil_status" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{post: 'top'}" title="Civil Status">
                                        <option value="">Select...</option>
                                        @if ($errors->any())
                                            <option value="single" @if(old('civil_status') == 'single') selected @endif>Single</option>
                                            <option value="divorced" @if(old('civil_status') == 'divorced') selected @endif>Divorced</option>
                                            <option value="separated" @if(old('civil_status') == 'separated') selected @endif>Separated</option>
                                            <option value="widowed" @if(old('civil_status') == 'widowed') selected @endif>Widowed</option>
                                            <option value="living common law" @if(old('civil_status') == 'living common law') selected @endif>Living Common law</option>
                                            <option value="married" @if(old('civil_status') == 'married') selected @endif>Married</option>
                                        @else
                                            <option value="single" @if($physician->civil_status == 'single') selected @endif>Single</option>
                                            <option value="divorced" @if($physician->civil_status == 'divorced') selected @endif>Divorced</option>
                                            <option value="separated" @if($physician->civil_status == 'separated') selected @endif>Separated</option>
                                            <option value="widowed" @if($physician->civil_status == 'widowed') selected @endif>Widowed</option>
                                            <option value="living common law" @if($physician->civil_status == 'living common law') selected @endif>Living Common law</option>
                                            <option value="married" @if($physician->civil_status == 'married') selected @endif>Married</option>
                                        @endif

                                    </select>
                                    <span class="uk-form-help-block">Civil Status</span>
                                </div>
                                <div class="uk-width-1-3">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <label for="uk_dp_1">Birthday</label>
                                        <input class="md-input" type="text" name="birthday" value="{{ old('birthday') ?: optional($physician->birthday)->format('Y-m-d') }}" id="dp_birthday" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                    </div>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <h3 class="heading_c"><u>Gender</u> </h3><p></p>
                                    <span class="icheck-inline">
                                        @if ($errors->any())
                                            <input type="radio" name="gender" value="male" id="radio_male" data-md-icheck @if(old('gender') == 'male') checked @endif />
                                        @else
                                            <input type="radio" name="gender" value="male" id="radio_male" data-md-icheck @if($physician->gender == 'male') checked @endif />
                                        @endif
                                        <label for="radio_male" class="inline-label">Male</label>
                                    </span>
                                    <span class="icheck-inline">
                                        @if ($errors->any())
                                            <input type="radio" name="gender" value="female" id="radio_female" data-md-icheck @if(old('gender') == 'female') checked @endif />
                                        @else
                                            <input type="radio" name="gender" value="female" id="radio_female" data-md-icheck @if($physician->gender == 'female') checked @endif />
                                        @endif
                                        <label for="radio_female" class="inline-label">Female</label>
                                    </span>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <select id="select-specialization" name="specialization" data-uk-tooltip="{post: 'top'}" title="Specialization">
                                        <option value="0">&nbsp;</option>
                                        @foreach ($specializations->unique('specialization_id')->values() as $key => $specialization)
                                            @if ($errors->any())
                                                <option value="{{ $specialization->specialization_id }}" @if(old('specialization') == $specialization->specialization_id) selected @endif>
                                                    {{ $specialization->specialization_name }}
                                                </option>
                                            @else
                                                <option value="{{ $specialization->specialization_id }}" @if($physician->specialization_id == $specialization->specialization_id) selected @endif>
                                                    {{ $specialization->specialization_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <span class="uk-form-help-block">Specialization</span>
                                </div>
                                <div class="uk-width-1-2">
                                    <select id="select-subspecialization" name="subspecialization" data-uk-tooltip="{post: 'top'}" title="Sub Specialization">
                                        @if ($errors->any())
                                            <option value="0">&nbsp;</option>
                                            @foreach ($specializations->where('specialization_id', old('specialization'))->unique('subspecialization_id')->values() as $key => $subspecialization)
                                                <option value="{{ $subspecialization->subspecialization_id }}" @if(old('subspecialization') == $subspecialization->subspecialization_id) selected @endif>
                                                    {{ $subspecialization->subspecialization_name }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="0">&nbsp;</option>
                                            @foreach ($specializations->where('specialization_id', $physician->specialization_id)->unique('subspecialization_id')->values() as $key => $subspecialization)
                                                <option value="{{ $subspecialization->subspecialization_id }}" @if($physician->subspecialization_id == $subspecialization->subspecialization_id) selected @endif>
                                                    {{ $subspecialization->subspecialization_name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="uk-form-help-block">Sub Specialization</span>
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-medium-top">
                                <div class="uk-width-1-1">
                                    <p>
                                        @if ($errors->any())
                                            <input type="checkbox" name="suspected_fraud" value="1" id="check_suspected_fraud" data-md-icheck @if(old('suspected_fraud')) checked @endif/>
                                        @else
                                            <input type="checkbox" name="suspected_fraud" value="1" id="check_suspected_fraud" data-md-icheck @if($physician->suspected_fraud) checked @endif/>
                                        @endif
                                        <label for="check_suspected_fraud" class="inline-label">Suspected Fraud <i class="material-icons" title="All transactions made with this physician will be rejected by the system. Previous transactions are not affected.">&#xE887;</i></label>
                                    </p>
                                </div>
                            </div>
                            <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Contact Details</h3>
                            <div class="uk-grid">
                                <div class="uk-width-1-3">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            <i class="material-icons">&#xE0BE;</i>
                                        </span>
                                        <label for="wizard_phone">Email</label>
                                        <input type="text" class="md-input" name="email" value="{{ old('email') ?: $physician->email }}"/>
                                    </div>
                                </div>
                                <div class="uk-width-1-3">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            <i class="material-icons">&#xE325;</i>
                                        </span>
                                        <label for="wizard_phone">Mobile Number</label>
                                        <input type="text" class="md-input" name="mobile_no" value="{{ old('mobile_no') ?: $physician->mobile_no }}"/>
                                    </div>
                                </div>
                                <div class="uk-width-1-3">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            <i class="material-icons">&#xE0CD;</i>
                                        </span>
                                        <label for="wizard_phone">Landline Number</label>
                                        <input type="text" class="md-input" name="telephone_no" value="{{ old('telephone_no') ?: $physician->telephone_no }}"/>
                                    </div>
                                </div>
                            </div>
                            <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Bank Details</h3>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <label>Account Name</label>
                                    <input type="text" name="bank_account_name" value="{{ old('bank_account_name') ?: $physician->bank_account_name }}" class="md-input {{ $errors->has('bank_account_name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('bank_account_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('bank_account_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <label>Account Number</label>
                                    <input type="text" name="bank_account_no" value="{{ old('bank_account_no') ?: $physician->bank_account_no }}" class="md-input {{ $errors->has('bank_account_no') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('bank_account_no'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('bank_account_no') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <label>Bank Name</label>
                                    <input type="text" name="bank_name" value="{{ old('bank_name') ?: $physician->bank_name }}" class="md-input {{ $errors->has('bank_name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('bank_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('bank_name') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-2">
                                    <label>Bank Branch</label>
                                    <input type="text" name="bank_branch" value="{{ old('bank_branch') ?: $physician->bank_branch }}" class="md-input {{ $errors->has('bank_branch') ? ' md-input-danger' : '' }}" />
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
                                        <input class="md-input" type="text" name="phic_accreditation_from" value="{{ old('phic_accreditation_from') ?: optional($physician->phic_accreditation_from)->format('Y-m-d') }}" id="dp_phic_accreditation_from">
                                    </div>
                                </div>
                                <div class="uk-width-large-1-2 uk-width-medium-1-1">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <label for="dp_phic_accreditation_to">End Date</label>
                                        <input class="md-input" type="text" name="phic_accreditation_to" value="{{ old('phic_accreditation_to') ?: optional($physician->phic_accreditation_to)->format('Y-m-d') }}" id="dp_phic_accreditation_to">
                                    </div>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Home Address</h3>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-1">
                                            <select id="select-home-address-region" name="home_address_region" data-uk-tooltip="{pos:'top'}" title="Region">
                                                <option value="0">&nbsp;</option>
                                                @foreach ($addresses->unique('region_id')->values() as $key => $address)
                                                    @if ($errors->any())
                                                        <option value="{{ $address->region_id }}" @if(old('home_address_region') == $address->region_id) selected @endif>
                                                            {{ $address->region }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $address->region_id }}" @if($physician->home_address_region_id == $address->region_id) selected @endif>
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
                                            <select id="select-home-address-province" name="home_address_province" data-uk-tooltip="{pos:'top'}" title="Province">
                                                @if ($errors->any())
                                                    <option value="0">&nbsp;</option>
                                                    @foreach ($addresses->where('region_id', old('home_address_region'))->unique('province_id')->values() as $key => $address)
                                                        <option value="{{ $address->province_id }}" @if(old('home_address_province') == $address->province_id) selected @endif>
                                                            {{ $address->province }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="0">&nbsp;</option>
                                                    @foreach ($addresses->where('region_id', $physician->home_address_region_id)->unique('province_id')->values() as $key => $address)
                                                        <option value="{{ $address->province_id }}" @if($physician->home_address_province_id == $address->province_id) selected @endif>
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
                                            <select id="select-home-address-city" name="home_address_city" data-uk-tooltip="{pos:'top'}" title="City">
                                                @if ($errors->any())
                                                    <option value="0">&nbsp;</option>
                                                    @foreach ($addresses->where('province_id', old('home_address_province'))->unique('city_id')->values() as $key => $address)
                                                        <option value="{{ $address->city_id }}" @if(old('home_address_city') == $address->city_id) selected @endif>
                                                            {{ $address->city }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="0">&nbsp;</option>
                                                    @foreach ($addresses->where('province_id', $physician->home_address_province_id)->unique('city_id')->values() as $key => $address)
                                                        <option value="{{ $address->city_id }}" @if($physician->home_address_city_id == $address->city_id) selected @endif>
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
                                            <select id="select-home-address-baranggay" name="home_address_baranggay" ata-uk-tooltip="{pos:'top'}" title="Baranggay">
                                                @if ($errors->any())
                                                    <option value="0">&nbsp;</option>
                                                    @foreach ($addresses->where('city_id', old('home_address_city'))->unique('baranggay_id')->values() as $key => $address)
                                                        <option value="{{ $address->baranggay_id }}" @if(old('home_address_baranggay') == $address->baranggay_id) selected @endif>
                                                            {{ $address->baranggay }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="0">&nbsp;</option>
                                                    @foreach ($addresses->where('city_id', $physician->home_address_city_id)->unique('baranggay_id')->values() as $key => $address)
                                                        <option value="{{ $address->baranggay_id }}" @if($physician->home_address_baranggay_id == $address->baranggay_id) selected @endif>
                                                            {{ $address->baranggay }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <span class="uk-form-help-block">Baranggay</span>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-1">
                                            <div class="uk-form-row">
                                                <label>Street/Building/Subd/Village</label>
                                                <textarea cols="30" rows="4" name="home_address" class="md-input">{{ old('home_address') ?: $physician->home_address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Provincial Address</h3>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-1">
                                            <select id="select-provincial-address-region" name="provincial_address_region" data-uk-tooltip="{pos:'top'}" title="Region">
                                                <option value="0">&nbsp;</option>
                                                @foreach ($addresses->unique('region_id')->values() as $key => $address)
                                                    @if ($errors->any())
                                                        <option value="{{ $address->region_id }}" @if(old('provincial_address_region') == $address->region_id) selected @endif>
                                                            {{ $address->region }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $address->region_id }}" @if($physician->provincial_address_region_id == $address->region_id) selected @endif>
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
                                            <select id="select-provincial-address-province" name="provincial_address_province" data-uk-tooltip="{pos:'top'}" title="Province">
                                                @if ($errors->any())
                                                    <option value="0">&nbsp;</option>
                                                    @foreach ($addresses->where('region_id', old('provincial_address_region'))->unique('province_id')->values() as $key => $address)
                                                        <option value="{{ $address->province_id }}" @if(old('provincial_address_province') == $address->province_id) selected @endif>
                                                            {{ $address->province }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="0">&nbsp;</option>
                                                    @foreach ($addresses->where('region_id', $physician->provincial_address_region_id)->unique('province_id')->values() as $key => $address)
                                                        <option value="{{ $address->province_id }}" @if($physician->provincial_address_province_id == $address->province_id) selected @endif>
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
                                            <select id="select-provincial-address-city" name="provincial_address_city" data-uk-tooltip="{pos:'top'}" title="City">
                                                @if ($errors->any())
                                                    <option value="0">&nbsp;</option>
                                                    @foreach ($addresses->where('province_id', old('provincial_address_province'))->unique('city_id')->values() as $key => $address)
                                                        <option value="{{ $address->city_id }}" @if(old('provincial_address_city') == $address->city_id) selected @endif>
                                                            {{ $address->city }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="0">&nbsp;</option>
                                                    @foreach ($addresses->where('province_id', $physician->provincial_address_province_id)->unique('city_id')->values() as $key => $address)
                                                        <option value="{{ $address->city_id }}" @if($physician->provincial_address_city_id == $address->city_id) selected @endif>
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
                                            <select id="select-provincial-address-baranggay" name="provincial_address_baranggay" ata-uk-tooltip="{pos:'top'}" title="Baranggay">
                                                @if ($errors->any())
                                                    <option value="0">&nbsp;</option>
                                                    @foreach ($addresses->where('city_id', old('provincial_address_city'))->unique('baranggay_id')->values() as $key => $address)
                                                        <option value="{{ $address->baranggay_id }}" @if(old('provincial_address_baranggay') == $address->baranggay_id) selected @endif>
                                                            {{ $address->baranggay }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="0">&nbsp;</option>
                                                    @foreach ($addresses->where('city_id', $physician->provincial_address_city_id)->unique('baranggay_id')->values() as $key => $address)
                                                        <option value="{{ $address->baranggay_id }}" @if($physician->provincial_address_baranggay_id == $address->baranggay_id) selected @endif>
                                                            {{ $address->baranggay }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <span class="uk-form-help-block">Baranggay</span>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-1">
                                            <div class="uk-form-row">
                                                <label>Street/Building/Subd/Village</label>
                                                <textarea cols="30" rows="4" name="provincial_address" class="md-input">{{ old('provincial_address') ?: $physician->provincial_address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- END INFORMATION TAB --}}

                    {{-- START LICENSE --}}
                    <li>
                        <div class="md-card-content">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-1">
                                    <label>Tax Identification Number <span>*</span> </label>
                                    <input type="text" name="tin" value="{{ old('tin') ?: $physician->tin }}" class="md-input {{ $errors->has('tin') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('tin'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('tin') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <label>SSS / GSIS Number</label>
                                    <input type="text" name="sss_no" value="{{ old('sss_no') ?: $physician->sss_no }}" class="md-input {{ $errors->has('sss_no') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('sss_no'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('sss_no') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-2">
                                    <label>PhilHealth Number</label>
                                    <input type="text" name="philhealth_no" value="{{ old('philhealth_no') ?: $physician->philhealth_no }}" class="md-input {{ $errors->has('philhealth_no') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('philhealth_no'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('philhealth_no') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-2-3">
                                    <label>PRC License Number</label>
                                    <input type="text" name="prc_license_no" value="{{ old('prc_license_no') ?: $physician->prc_license_no }}" class="md-input {{ $errors->has('prc_license_no') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('prc_license_no'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('prc_license_no') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-3">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <label for="uk_dp_1">PRC Validity Date</label>
                                        <input class="md-input" type="text" name="prc_validity_date" value="{{ old('prc_validity_date') ?: optional($physician->prc_validity_date)->format('Y-m-d') }}" id="dp_prc_validity_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                    </div>
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-large-top">
                                <div class="uk-width-medium-1-1">
                                    <div class="uk-form-row">
                                        <label>Remarks</label>
                                        <textarea cols="30" rows="4" name="remarks" class="md-input">{{ old('remarks') ?: $physician->remarks }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- END LICENSE --}}
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
    <script>
        $(function () {

            amaphil.init();
        });

        amaphil = {
            init: function() {
                amaphil.select_specialization();
                amaphil.date_picker_birthday();
                amaphil.date_picker_prc_validity();
                amaphil.date_range_phic_accreditation();
                amaphil.select_home_address();
                amaphil.select_provincial_address();
            },
            select_specialization: function() {
                var xhr;
                var select_specialization, $select_specialization;
                var select_subspecialization, $select_subspecialization;

                $select_specialization = $('#select-specialization').selectize({
                    valueField: 'specialization_id',
                    labelField: 'specialization_name',
                    searchField: ['specialization_name'],

                    onChange: function (value) {
                        if (!value.length) return;
                        select_subspecialization.disable();
                        select_subspecialization.clearOptions();
                        select_subspecialization.load(function(callback) {
                            if (value == 0) return;
                            xhr && xhr.abort();
                            xhr = $.ajax({
                                url: 'http://revamp.test/api/specializations/' + value + '/subspecializations',
                                success: function(results) {
                                    select_subspecialization.enable();
                                    callback(results);
                                },
                                error: function() {
                                    callback();
                                }
                            })
                        });
                    }
                });

                $select_subspecialization = $('#select-subspecialization').selectize({
                    valueField: 'id',
                    labelField: 'subspecialization_name',
                    searchField: ['subspecialization_name'],
                });

                select_subspecialization = $select_subspecialization[0].selectize;

            },
            date_picker_birthday: function() {
                $dp_birthday = $('#dp_birthday');
                UIkit.datepicker($dp_birthday, { format:'YYYY-MM-DD' });
            },
            date_picker_prc_validity: function() {
                $dp_prc_validity_date = $('#dp_prc_validity_date');
                UIkit.datepicker($dp_prc_validity_date, { format:'YYYY-MM-DD' });
            },
            date_range_phic_accreditation: function() {
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
            },
            select_home_address: function() {
                var xhr;
                var select_home_address_region, $select_home_address_region;
                var select_home_address_province, $select_home_address_province;
                var select_home_address_city, $select_home_address_city;
                var select_home_address_baranggay, $select_home_address_baranggay;

                $select_home_address_region = $('#select-home-address-region').selectize({
                    valueField: 'region_id',
                    labelField: 'region',
                    searchField: ['region'],

                    onChange: function(value) {
                        if (!value.length) return;
                        select_home_address_baranggay.disable();
                        select_home_address_baranggay.clearOptions();

                        select_home_address_city.disable();
                        select_home_address_city.clearOptions();

                        select_home_address_province.disable();
                        select_home_address_province.clearOptions();
                        select_home_address_province.load(function(callback) {
                            if (value == 0) return;
                            xhr && xhr.abort();
                            xhr = $.ajax({
                                url: '/api/address/regions/' + value + '/provinces',
                                success: function(results) {
                                    select_home_address_province.enable();
                                    callback(results);
                                },
                                error: function() {
                                    callback();
                                }
                            })
                        });
                    }
                });

                $select_home_address_province = $('#select-home-address-province').selectize({
                    valueField: 'province_id',
                    labelField: 'province',
                    searchField: ['province'],

                    onChange: function(value) {
                        if (!value.length) return;
                        select_home_address_baranggay.disable();
                        select_home_address_baranggay.clearOptions();

                        select_home_address_city.disable();
                        select_home_address_city.clearOptions();
                        select_home_address_city.load(function(callback) {
                            if (value == 0) return;
                            xhr && xhr.abort();
                            xhr = $.ajax({
                                url: '/api/address/regions/provinces/' + value + '/cities',
                                success: function(results) {
                                    select_home_address_city.enable();
                                    callback(results);
                                },
                                error: function() {
                                    callback();
                                }
                            })
                        });
                    }
                });
                select_home_address_province = $select_home_address_province[0].selectize;

                $select_home_address_city = $('#select-home-address-city').selectize({
                    valueField: 'city_id',
                    labelField: 'city',
                    searchField: ['city'],

                    onChange: function(value) {
                        if (!value.length) return;
                        select_home_address_baranggay.disable();
                        select_home_address_baranggay.clearOptions();
                        select_home_address_baranggay.load(function(callback) {
                            if (value == 0) return;
                            xhr && xhr.abort();
                            xhr = $.ajax({
                                url: '/api/address/regions/provinces/cities/' + value + '/baranggays',
                                success: function(results) {
                                    select_home_address_baranggay.enable();
                                    callback(results);
                                },
                                error: function() {
                                    callback();
                                }
                            })
                        });
                    }
                });
                select_home_address_city = $select_home_address_city[0].selectize;

                $select_home_address_baranggay = $('#select-home-address-baranggay').selectize({
                    valueField: 'baranggay_id',
                    labelField: 'baranggay',
                    searchField: ['baranggay'],
                });
                select_home_address_baranggay = $select_home_address_baranggay[0].selectize;
            },
            select_provincial_address: function() {
                var xhr;
                var select_provincial_address_region, $select_provincial_address_region;
                var select_provincial_address_province, $select_provincial_address_province;
                var select_provincial_address_city, $select_provincial_address_city;
                var select_provincial_address_baranggay, $select_provincial_address_baranggay;

                $select_provincial_address_region = $('#select-provincial-address-region').selectize({
                    valueField: 'region_id',
                    labelField: 'region',
                    searchField: ['region'],

                    onChange: function(value) {
                        if (!value.length) return;
                        select_provincial_address_baranggay.disable();
                        select_provincial_address_baranggay.clearOptions();

                        select_provincial_address_city.disable();
                        select_provincial_address_city.clearOptions();

                        select_provincial_address_province.disable();
                        select_provincial_address_province.clearOptions();
                        select_provincial_address_province.load(function(callback) {
                            if (value == 0) return;
                            xhr && xhr.abort();
                            xhr = $.ajax({
                                url: '/api/address/regions/' + value + '/provinces',
                                success: function(results) {
                                    select_provincial_address_province.enable();
                                    callback(results);
                                },
                                error: function() {
                                    callback();
                                }
                            })
                        });
                    }
                });

                $select_provincial_address_province = $('#select-provincial-address-province').selectize({
                    valueField: 'province_id',
                    labelField: 'province',
                    searchField: ['province'],

                    onChange: function(value) {
                        if (!value.length) return;
                        select_provincial_address_baranggay.disable();
                        select_provincial_address_baranggay.clearOptions();

                        select_provincial_address_city.disable();
                        select_provincial_address_city.clearOptions();
                        select_provincial_address_city.load(function(callback) {
                            if (value == 0) return;
                            xhr && xhr.abort();
                            xhr = $.ajax({
                                url: '/api/address/regions/provinces/' + value + '/cities',
                                success: function(results) {
                                    select_provincial_address_city.enable();
                                    callback(results);
                                },
                                error: function() {
                                    callback();
                                }
                            })
                        });
                    }
                });
                select_provincial_address_province = $select_provincial_address_province[0].selectize;

                $select_provincial_address_city = $('#select-provincial-address-city').selectize({
                    valueField: 'city_id',
                    labelField: 'city',
                    searchField: ['city'],

                    onChange: function(value) {
                        if (!value.length) return;
                        select_provincial_address_baranggay.disable();
                        select_provincial_address_baranggay.clearOptions();
                        select_provincial_address_baranggay.load(function(callback) {
                            if (value == 0) return;
                            xhr && xhr.abort();
                            xhr = $.ajax({
                                url: '/api/address/regions/provinces/cities/' + value + '/baranggays',
                                success: function(results) {
                                    select_provincial_address_baranggay.enable();
                                    callback(results);
                                },
                                error: function() {
                                    callback();
                                }
                            })
                        });
                    }
                });
                select_provincial_address_city = $select_provincial_address_city[0].selectize;

                $select_provincial_address_baranggay = $('#select-provincial-address-baranggay').selectize({
                    valueField: 'baranggay_id',
                    labelField: 'baranggay',
                    searchField: ['baranggay'],
                });
                select_provincial_address_baranggay = $select_provincial_address_baranggay[0].selectize;
            },
        }
    </script>
@endsection
