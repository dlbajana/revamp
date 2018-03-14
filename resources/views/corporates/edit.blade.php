@extends('layouts.main')

@section('nav_corporate')
    current_section
@endsection

@section('nav_corporate_corporate_accounts')
    act_item
@endsection

@section('breadcrumbs')
    <div id="top_bar">
        <ul id="breadcrumbs">
            <li><a href="{{ route('corporates.index') }}">Corporates</a></li>
            <li><a href="{{ route('corporates.show', $corporate->id) }}">{{ $corporate->name }}</a></li>
            <li><span>Edit</span> </li>
        </ul>
    </div>
@endsection

@section('page-content')
    <h4 class="heading_b uk-margin-bottom">Corporates</h4>

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
            <hr class="md-hr"/>
            <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#tabs_anim2', animation:'slide-horizontal'}">
                <li class="uk-active"><a href="#">Information</a></li>
                <li class="uk-width-1-6"><a href="#">Contact</a></li>
                <li class="uk-width-1-6"><a href="#">BIR</a></li>
                <li class="uk-width-1-6"><a href="#">Fund</a></li>
            </ul>
            <form action="{{ route('corporates.update', $corporate->id) }}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <ul id="tabs_anim2" class="uk-switcher uk-margin">
                    {{-- START INFORMATION TAB --}}
                    <li>
                        <div class="md-card-content">
                            <div class="uk-grid">
                                <div class="uk-width-medium-2-3">
                                    <label>Name <span class="req uk-text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') ?: $corporate->name }}" required class="md-input {{ $errors->has('name') ? ' md-input-danger' : '' }}"/>
                                    @if ($errors->has('name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-3">
                                    <label>Name in the Card <span class="req uk-text-danger">*</span></label>
                                    <input type="text" name="card_name" value="{{ old('card_name') ?: $corporate->card_name }}" required class="md-input {{ $errors->has('card_name') ? ' md-input-danger' : '' }}"/>
                                    @if ($errors->has('card_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('card_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <select id="select-industry" name="industry" data-uk-tooltip="{pos:'top'}" title="Industry">
                                        <option value="">&nbsp;</option>
                                        @if ($errors->any())
                                            <option value="Others" @if(old('industry') == 'Others') selected @endif>Others</option>
                                            @foreach ($industries as $key => $industry)
                                                <option value="{{ $industry->name }}" @if(old('industry') == $industry->name) selected @endif>{{ $industry->name }}</option>
                                            @endforeach
                                        @else
                                            <option value="Others" @if($corporate->industry == 'Others') selected @endif>Others</option>
                                            @foreach ($industries as $key => $industry)
                                                <option value="{{ $industry->name }}" @if($corporate->industry == $industry->name) selected @endif>{{ $industry->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="uk-form-help-block">Industry</span>
                                </div>
                                @if ($errors->any())
                                    <div id="input-industry-others" class="uk-width-medium-1-2" @if(old('industry') != 'Others') hidden @endif>
                                        <label>Please specify industry <span class="req uk-text-danger">*</span></label>
                                        <input type="text" name="industry_others" value="{{ old('industry_others') }}" class="md-input {{ $errors->has('industry_others') ? ' md-input-danger' : '' }}"/>
                                        @if ($errors->has('industry_others'))
                                            <span class="uk-form-help-block uk-text-danger">{{ $errors->first('industry_others') }}</span>
                                        @endif
                                    </div>
                                @else
                                    <div id="input-industry-others" class="uk-width-medium-1-2" @if($corporate->industry != 'Others') hidden @endif>
                                        <label>Please specify industry <span class="req uk-text-danger">*</span></label>
                                        <input type="text" name="industry_others" value="{{ $corporate->industry_others }}" class="md-input {{ $errors->has('industry_others') ? ' md-input-danger' : '' }}"/>
                                    </div>
                                @endif
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <h3 class="heading_c uk-text-bold"><u>Account Type</u></h3>
                                    <p></p>
                                    <span class="icheck-inline">
                                        @if ($errors->any())
                                            <input type="radio" name="account_type" value="corporate" id="radio_account_type_corporate" data-md-icheck @if(old('account_type') == 'corporate') checked @endif/>
                                        @else
                                            <input type="radio" name="account_type" value="corporate" id="radio_account_type_corporate" data-md-icheck @if($corporate->account_type == 'corporate') checked @endif/>
                                        @endif
                                        <label for="radio_account_type_corporate" class="inline-label">Corporate</label>
                                    </span>
                                    <span class="icheck-inline">
                                        @if ($errors->any())
                                            <input type="radio" name="account_type" value="group" id="radio_account_type_group" data-md-icheck @if(old('account_type') == 'group') checked @endif/>
                                        @else
                                            <input type="radio" name="account_type" value="group" id="radio_account_type_group" data-md-icheck @if($corporate->account_type == 'group') checked @endif/>
                                        @endif
                                        <label for="radio_account_type_group" class="inline-label">Group</label>
                                    </span>
                                    <span class="icheck-inline">
                                        @if ($errors->any())
                                            <input type="radio" name="account_type" value="individual" id="radio_account_type_individual" data-md-icheck @if(old('account_type') == 'individual') checked @endif/>
                                        @else
                                            <input type="radio" name="account_type" value="individual" id="radio_account_type_individual" data-md-icheck @if($corporate->account_type == 'individual') checked @endif/>
                                        @endif
                                        <label for="radio_account_type_individual" class="inline-label">Individual</label>
                                    </span>
                                </div>
                                <div class="uk-width-1-2">
                                    <h3 class="heading_c uk-text-bold"><u>Benefit Layer</u></h3>
                                    <p></p>
                                    <span class="icheck-inline">
                                        @if ($errors->any())
                                            <input type="radio" name="benefit_layer" value="1st layer" id="radio_benefit_layer_1st_layer" data-md-icheck @if(old('benefit_layer') == '1st layer') checked @endif/>
                                        @else
                                            <input type="radio" name="benefit_layer" value="1st layer" id="radio_benefit_layer_1st_layer" data-md-icheck @if($corporate->benefit_layer == '1st layer') checked @endif/>
                                        @endif
                                        <label for="radio_benefit_layer_1st_layer" class="inline-label">1st Layer</label>
                                    </span>
                                    <span class="icheck-inline">
                                        @if ($errors->any())
                                            <input type="radio" name="benefit_layer" value="2nd layer" id="radio_benefit_layer_2nd_layer" data-md-icheck @if(old('benefit_layer') == '2nd layer') checked @endif/>
                                        @else
                                            <input type="radio" name="benefit_layer" value="2nd layer" id="radio_benefit_layer_2nd_layer" data-md-icheck @if($corporate->benefit_layer == '2nd layer') checked @endif/>
                                        @endif
                                        <label for="radio_benefit_layer_2nd_layer" class="inline-label">2nd Layer</label>
                                    </span>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-2-3">
                                    <label>PhilHealth No <span class="req uk-text-danger">*</span></label>
                                    <input type="text" name="philhealth_no" value="{{ old('philhealth_no') ?: $corporate->philhealth_no }}" class="md-input masked_input {{ $errors->has('philhealth_no') ? 'md-input-danger' : '' }}" id="masked_phone" data-inputmask="'mask': '99-999999999-9'" data-inputmask-showmaskonhover="false" />
                                    @if ($errors->has('philhealth_no'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('philhealth_no') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <p style="margin-top: 15px;">
                                        <input type="checkbox" name="co_brand" value="1" id="check_co_brand" data-md-icheck @if(old('co_brand')) checked @elseif($corporate->co_brand) checked @endif/>
                                        <label for="check_co_brand" class="inline-label">Co-Brand <i class="material-icons" title="Enter description here....">&#xE887;</i></label>
                                    </p>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label>Acceptance Age <span class="req uk-text-danger">*</span></label>
                                    <input type="number" name="acceptance_age" value="{{ old('acceptance_age') ?: $corporate->acceptance_age }}" min="0" class="md-input {{ $errors->has('acceptance_age') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('acceptance_age'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('acceptance_age') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label>Termination Age <span class="req uk-text-danger">*</span></label>
                                    <input type="number" name="termination_age" value="{{ old('termination_age') ?: $corporate->termination_age }}" min="0" class="md-input {{ $errors->has('termination_age') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('termination_age'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('termination_age') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-2-3">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <label for="uk_dp_1">Effective Date (from) <span class="req uk-text-danger">*</span></label>
                                        <input class="md-input" type="text" name="date_effectivity_from" value="{{ old('date_effectivity_from') ?: optional($corporate->date_effectivity_from)->format('Y-m-d') }}" id="dp_date_effectivity_from" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                    </div>
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <select data-md-selectize name="effectivity_period" class="{{ $errors->has('effectivity_period') ? ' md-input-danger' : '' }}"  data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Status">
                                        @if ($errors->any())
                                            <option value="6" @if(old('effectivity_period') == 6) selected @endif>6 months</option>
                                            <option value="12" @if(old('effectivity_period') == 12) selected @endif >1 year</option>
                                        @else
                                            <option value="6" @if($corporate->effectivity_period == 6) selected @endif>6 months</option>
                                            <option value="12" @if($corporate->effectivity_period == 12) selected @endif >1 year</option>
                                        @endif
                                    </select>
                                    <span class="uk-form-help-block">Effectivity Period</span>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <h3 class="heading_c uk-text-bold uk-margin-small-bottom"><u>Company Logo</u></h3>
                                    <input type="file" class="dropify" name="company_logo" value="{{ old('company_logo') }}" @if($corporate->company_logo_url) data-default-file="/storage/{{ $corporate->company_logo_url }}" @endif data-max-file-size="5000K"/>
                                </div>
                            </div>
                            <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Bank Details</h3>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <label>Account Name</label>
                                    <input type="text" name="bank_account_name" value="{{ old('bank_account_name') ?: $corporate->bank_account_name }}" class="md-input {{ $errors->has('bank_account_name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('bank_account_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('bank_account_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <label>Account Number</label>
                                    <input type="text" name="bank_account_no" value="{{ old('bank_account_no') ?: $corporate->bank_account_no }}" class="md-input {{ $errors->has('bank_account_no') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('bank_account_no'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('bank_account_no') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <label>Bank Name</label>
                                    <input type="text" name="bank_name" value="{{ old('bank_name') ?: $corporate->bank_name }}" class="md-input {{ $errors->has('bank_name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('bank_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('bank_name') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-2">
                                    <label>Bank Branch</label>
                                    <input type="text" name="bank_branch" value="{{ old('bank_branch') ?: $corporate->bank_branch }}" class="md-input {{ $errors->has('bank_branch') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('bank_branch'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('bank_branch') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-2-3">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <label for="uk_dp_1">Billing Due Date <span class="req uk-text-danger">*</span></label>
                                        <input class="md-input" type="text" name="billing_due_date" value="{{ old('billing_due_date') ?: optional($corporate->billing_due_date)->format('Y-m-d') }}" id="dp_billing_due_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                    </div>
                                </div>
                                <div class="uk-width-1-3">
                                    <p style="margin-top: 15px;">
                                        <input type="checkbox" name="auto_deduct" value="1" id="check_auto_deduct" data-md-icheck @if(old('auto_deduct')) checked @elseif($corporate->auto_deduct) checked @endif/>
                                        <label for="check_auto_deduct" class="inline-label">Auto Deduct <i class="material-icons" title="Enter description here....">&#xE887;</i></label>
                                    </p>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Business Address</h3>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-1">
                                            <select id="select-business-address-region" name="business_address_region" data-uk-tooltip="{pos:'top'}" title="Region">
                                                <option value="0">&nbsp;</option>
                                                @foreach (App\Address::regions() as $key => $address)
                                                    @if ($errors->any())
                                                        <option value="{{ $address->region_id }}" @if(old('business_address_region') == $address->region_id) selected @endif>
                                                            {{ $address->region }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $address->region_id }}" @if($corporate->business_address_region_id == $address->region_id) selected @endif>
                                                            {{ $address->region }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <span class="uk-form-help-block">Region <span class="uk-text-danger">*</span> </span>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-1">
                                            <select id="select-business-address-province" name="business_address_province" data-uk-tooltip="{pos:'top'}" title="Province">
                                                @if ($errors->any())
                                                    <option value="0">&nbsp;</option>
                                                    @foreach (App\Address::provinces(old('business_address_region')) as $key => $address)
                                                        <option value="{{ $address->province_id }}" @if(old('business_address_province') == $address->province_id) selected @endif>
                                                            {{ $address->province }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="0">&nbsp;</option>
                                                    @foreach (App\Address::provinces($corporate->business_address_region_id) as $key => $address)
                                                        <option value="{{ $address->province_id }}" @if($corporate->business_address_province_id == $address->province_id) selected @endif>
                                                            {{ $address->province }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <span class="uk-form-help-block">Province <span class="uk-text-danger">*</span> </span>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-1">
                                            <select id="select-business-address-city" name="business_address_city" data-uk-tooltip="{pos:'top'}" title="City">
                                                @if ($errors->any())
                                                    <option value="0">&nbsp;</option>
                                                    @foreach (App\Address::cities(old('business_address_province')) as $key => $address)
                                                        <option value="{{ $address->city_id }}" @if(old('business_address_city') == $address->city_id) selected @endif>
                                                            {{ $address->city }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="0">&nbsp;</option>
                                                    @foreach (App\Address::cities($corporate->business_address_province_id) as $key => $address)
                                                        <option value="{{ $address->city_id }}" @if($corporate->business_address_city_id == $address->city_id) selected @endif>
                                                            {{ $address->city }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <span class="uk-form-help-block">City <span class="uk-text-danger">*</span> </span>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-1">
                                            <select id="select-business-address-baranggay" name="business_address_baranggay" ata-uk-tooltip="{pos:'top'}" title="Baranggay">
                                                @if ($errors->any())
                                                    <option value="0">&nbsp;</option>
                                                    @foreach (App\Address::baranggays(old('business_address_city')) as $key => $address)
                                                        <option value="{{ $address->baranggay_id }}" @if(old('business_address_baranggay') == $address->baranggay_id) selected @endif>
                                                            {{ $address->baranggay }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="0">&nbsp;</option>
                                                    @foreach (App\Address::baranggays($corporate->business_address_city_id) as $key => $address)
                                                        <option value="{{ $address->baranggay_id }}" @if($corporate->business_address_baranggay_id == $address->baranggay_id) selected @endif>
                                                            {{ $address->baranggay }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <span class="uk-form-help-block">Baranggay <span class="uk-text-danger">*</span> </span>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-1">
                                            <div class="uk-form-row">
                                                <label>Street/Building/Subd/Village <span class="uk-text-danger">*</span> </label>
                                                <textarea cols="30" rows="4" name="business_address" class="md-input">{{ old('business_address') ?: $corporate->business_address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <h3 class="heading_c uk-margin-large-top uk-text-success uk-text-italic">Billing Address</h3>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-1">
                                            <select id="select-billing-address-region" name="billing_address_region" data-uk-tooltip="{pos:'top'}" title="Region">
                                                <option value="0">&nbsp;</option>
                                                @foreach (App\Address::regions() as $key => $address)
                                                    @if ($errors->any())
                                                        <option value="{{ $address->region_id }}" @if(old('billing_address_region') == $address->region_id) selected @endif>
                                                            {{ $address->region }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $address->region_id }}" @if($corporate->billing_address_region_id == $address->region_id) selected @endif>
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
                                            <select id="select-billing-address-province" name="billing_address_province" data-uk-tooltip="{pos:'top'}" title="Province">
                                                @if ($errors->any())
                                                    <option value="0">&nbsp;</option>
                                                    @foreach (App\Address::provinces(old('billing_address_region')) as $key => $address)
                                                        <option value="{{ $address->province_id }}" @if(old('billing_address_province') == $address->province_id) selected @endif>
                                                            {{ $address->province }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="0">&nbsp;</option>
                                                    @foreach (App\Address::provinces($corporate->billing_address_region_id) as $key => $address)
                                                        <option value="{{ $address->province_id }}" @if($corporate->billing_address_province_id == $address->province_id) selected @endif>
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
                                            <select id="select-billing-address-city" name="billing_address_city" data-uk-tooltip="{pos:'top'}" title="City">
                                                @if ($errors->any())
                                                    <option value="0">&nbsp;</option>
                                                    @foreach (App\Address::cities(old('billing_address_province')) as $key => $address)
                                                        <option value="{{ $address->city_id }}" @if(old('billing_address_city') == $address->city_id) selected @endif>
                                                            {{ $address->city }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="0">&nbsp;</option>
                                                    @foreach (App\Address::cities($corporate->billing_address_province_id) as $key => $address)
                                                        <option value="{{ $address->city_id }}" @if($corporate->billing_address_city_id == $address->city_id) selected @endif>
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
                                            <select id="select-billing-address-baranggay" name="billing_address_baranggay" ata-uk-tooltip="{pos:'top'}" title="Baranggay">
                                                @if ($errors->any())
                                                    <option value="0">&nbsp;</option>
                                                    @foreach (App\Address::baranggays(old('billing_address_city')) as $key => $address)
                                                        <option value="{{ $address->baranggay_id }}" @if(old('billing_address_baranggay') == $address->baranggay_id) selected @endif>
                                                            {{ $address->baranggay }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="0">&nbsp;</option>
                                                    @foreach (App\Address::baranggays($corporate->billing_address_city_id) as $key => $address)
                                                        <option value="{{ $address->baranggay_id }}" @if($corporate->billing_address_baranggay_id == $address->baranggay_id) selected @endif>
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
                                                <textarea cols="30" rows="4" name="billing_address" class="md-input">{{ old('billing_address') ?: $corporate->billing_address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- END INFORMATION TAB --}}

                    {{-- START CONTACT PERSON --}}
                    <li>
                        <div class="md-card-content">
                            <div class="uk-grid">
                                <div class="uk-width-2-3">
                                    <label>Name <span class="req uk-text-danger">*</span></label>
                                    <input type="text" name="contact_person_name" value="{{ old('contact_person_name') ?: $corporate->contact_person_name }}" class="md-input {{ $errors->has('contact_person_name') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('contact_person_name'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('contact_person_name') }}</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-3">
                                    <label>Designation <span class="req uk-text-danger">*</span></label>
                                    <input type="text" class="md-input" name="contact_person_designation" value="{{ old('contact_person_designation') ?: $corporate->contact_person_designation}}">
                                    @if ($errors->has('contact_person_designation'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('contact_person_designation') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            <i class="material-icons">&#xE325;</i>
                                        </span>
                                        <label for="wizard_phone">Mobile Number</label>
                                        <input type="text" class="md-input" name="contact_person_mobile_no" value="{{ old('contact_person_mobile_no') ?: $corporate->contact_person_mobile_no }}"/>
                                    </div>
                                </div>
                                <div class="uk-width-1-2">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            <i class="material-icons">&#xE0BE;</i>
                                        </span>
                                        <label for="wizard_phone">Email</label>
                                        <input type="text" class="md-input" name="contact_person_email" value="{{ old('contact_person_email') ?: $corporate->contact_person_email }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            <i class="material-icons">&#xE8AD;</i>
                                        </span>
                                        <label for="wizard_phone">Fax Number</label>
                                        <input type="text" class="md-input" name="contact_person_fax_no" value="{{ old('contact_person_fax_no') ?: $corporate->contact_person_fax_no }}"/>
                                    </div>
                                </div>
                                <div class="uk-width-1-2">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            <i class="material-icons">&#xE0CD;</i>
                                        </span>
                                        <label for="wizard_phone">Landline Number</label>
                                        <input type="text" class="md-input" name="contact_person_telephone_no" value="{{ old('contact_person_telephone_no') ?: $corporate->contact_person_telephone_no }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <label>Email Recipient (HR) <span class="req uk-text-danger">*</span></label>
                                    <input type="text" name="hr_email" value="{{ old('hr_email') ?: $corporate->hr_email }}" class="md-input {{ $errors->has('hr_email') ? ' md-input-danger' : '' }}" />
                                    @if ($errors->has('hr_email'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('hr_email') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- END CONTACT PERSON --}}

                    {{-- START BIR --}}
                    <li>
                        <div class="md-card-content">
                            <div class="uk-grid">
                                <div class="uk-width-2-3">
                                    <label>Tax Identification Number <span class="uk-text-danger">*</span> </label>
                                    <input type="text" name="tin" value="{{ old('tin') ?: $corporate->tin }}" class="md-input masked_input {{ $errors->has('tin') ? 'md-input-danger' : '' }}" id="masked_phone" data-inputmask="'mask': '999-999-999-999'" data-inputmask-showmaskonhover="false" />
                                    @if ($errors->has('tin'))
                                        <span class="uk-form-help-block uk-text-danger">{{ $errors->first('tin') }}</span>
                                    @else
                                        <span class="uk-form-help-block">For a 9-digit TIN, add '000' at the end</span>
                                    @endif
                                </div>
                                <div class="uk-width-1-3">
                                    <p style="margin-top: 15px;">
                                        <input type="checkbox" name="withheld" value="1" id="check_withheld" data-md-icheck @if(old('withheld')) checked @elseif($corporate->Withheld) checked @endif/>
                                        <label for="check_withheld" class="inline-label">Withheld</label>
                                    </p>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-2-3">
                                    <label>Representative Name</label>
                                    <input type="text" name="representative_name" value="{{ old('representative_name') ?: $corporate->representative_name }}" class="md-input {{ $errors->has('representative_name') ? ' md-input-danger' : '' }}" />
                                </div>
                                <div class="uk-width-1-3">
                                    <label>Representative's Position</label>
                                    <input type="text" name="representative_position" value="{{ old('representative_position') ?: $corporate->representative_position }}" class="md-input {{ $errors->has('representative_position') ? ' md-input-danger' : '' }}" />
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <label>Representative's TIN</label>
                                    <input type="text" name="representative_tin" value="{{ old('representative_tin') ?: $corporate->representative_tin }}" class="md-input masked_input" id="masked_phone" data-inputmask="'mask': '999-999-999-999'" data-inputmask-showmaskonhover="false" />
                                    <span class="uk-form-help-block">For a 9-digit TIN, add '000' at the end</span>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <h3 class="heading_c uk-text-bold uk-margin-small-bottom"><u>Electronic Signature File</u></h3>
                                    <input type="file" class="dropify" name="electronic_signature" value="{{ old('electronic_signature') }}" @if($corporate->electronic_signature) data-default-file="/storage/{{ $corporate->electronic_signature }}" @endif/>
                                </div>
                                <div class="uk-width-1-2">
                                    <h3 class="heading_c uk-text-bold uk-margin-small-bottom"><u>Secretary Certificate</u></h3>
                                    <input type="file" class="dropify" name="secretary_certificate" value="{{ old('secretary_certificate') }}" @if($corporate->secretary_certificate) data-default-file="/storage/{{ $corporate->secretary_certificate }}" @endif/>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- END BIR --}}

                    {{-- START FUND --}}
                    <li>
                        <div class="md-card-content">
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <label for="masked_first_warning">First Warning Amount</label>
                                    <input class="md-input masked_input" id="masked_first_warning" name="first_warning" value="{{ old('first_warning') ?: $corporate->first_warning }}" type="text"
                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                        data-inputmask-showmaskonhover="false"/>
                                </div>
                                <div class="uk-width-1-2">
                                    <label for="masked_threshold">Threshold <span class="uk-text-danger">*</span> </label>
                                    <input class="md-input masked_input" id="masked_threshold" name="threshold" value="{{ old('threshold') ?: $corporate->threshold }}" type="text"
                                        data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                        data-inputmask-showmaskonhover="false"/>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- END FUND --}}
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

@section('styles')
    <link rel="stylesheet" href="/assets/skins/dropify/css/dropify.css">
@endsection

@section('scripts')
    <script src="/bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
    <script src="/assets/js/custom/dropify/dist/js/dropify.min.js"></script>
    <script>
        $(function() {
            amaphil.init();

            $('.dropify').dropify();

            $maskedInput = $('.masked_input').inputmask();
            if($maskedInput.length) {
                $maskedInput.inputmask();
            }
        });

        amaphil = {
            init: function() {
                amaphil.select_industry();
                amaphil.select_home_address();
                amaphil.select_billing_address();
            },
            select_industry: function() {
                var $select_with_same_tin;
                var input_industry_others = $('#input-industry-others');
                // input_industry_others.hide();

                $select_with_same_tin = $('#select-industry').selectize({
                    allowEmptyOption: true,
                    onChange: function(value) {
                        if (!value.length) {
                            input_industry_others.hide();
                        } else if (value == "Others") {
                            input_industry_others.show();
                        } else {
                            input_industry_others.hide();
                        }
                    }
                });
            },
            select_home_address: function() {
                var xhr;
                var select_business_address_region, $select_business_address_region;
                var select_business_address_province, $select_business_address_province;
                var select_business_address_city, $select_business_address_city;
                var select_business_address_baranggay, $select_business_address_baranggay;

                $select_business_address_region = $('#select-business-address-region').selectize({
                    valueField: 'region_id',
                    labelField: 'region',
                    searchField: ['region'],

                    onChange: function(value) {
                        if (!value.length) return;
                        select_business_address_baranggay.disable();
                        select_business_address_baranggay.clearOptions();

                        select_business_address_city.disable();
                        select_business_address_city.clearOptions();

                        select_business_address_province.disable();
                        select_business_address_province.clearOptions();
                        select_business_address_province.load(function(callback) {
                            if (value == 0) return;
                            xhr && xhr.abort();
                            xhr = $.ajax({
                                url: '/api/address/regions/' + value + '/provinces',
                                success: function(results) {
                                    select_business_address_province.enable();
                                    callback(results);
                                },
                                error: function() {
                                    callback();
                                }
                            })
                        });
                    }
                });

                $select_business_address_province = $('#select-business-address-province').selectize({
                    valueField: 'province_id',
                    labelField: 'province',
                    searchField: ['province'],

                    onChange: function(value) {
                        if (!value.length) return;
                        select_business_address_baranggay.disable();
                        select_business_address_baranggay.clearOptions();

                        select_business_address_city.disable();
                        select_business_address_city.clearOptions();
                        select_business_address_city.load(function(callback) {
                            if (value == 0) return;
                            xhr && xhr.abort();
                            xhr = $.ajax({
                                url: '/api/address/regions/provinces/' + value + '/cities',
                                success: function(results) {
                                    select_business_address_city.enable();
                                    callback(results);
                                },
                                error: function() {
                                    callback();
                                }
                            })
                        });
                    }
                });
                select_business_address_province = $select_business_address_province[0].selectize;

                $select_business_address_city = $('#select-business-address-city').selectize({
                    valueField: 'city_id',
                    labelField: 'city',
                    searchField: ['city'],

                    onChange: function(value) {
                        if (!value.length) return;
                        select_business_address_baranggay.disable();
                        select_business_address_baranggay.clearOptions();
                        select_business_address_baranggay.load(function(callback) {
                            if (value == 0) return;
                            xhr && xhr.abort();
                            xhr = $.ajax({
                                url: '/api/address/regions/provinces/cities/' + value + '/baranggays',
                                success: function(results) {
                                    select_business_address_baranggay.enable();
                                    callback(results);
                                },
                                error: function() {
                                    callback();
                                }
                            })
                        });
                    }
                });
                select_business_address_city = $select_business_address_city[0].selectize;

                $select_business_address_baranggay = $('#select-business-address-baranggay').selectize({
                    valueField: 'baranggay_id',
                    labelField: 'baranggay',
                    searchField: ['baranggay'],
                });
                select_business_address_baranggay = $select_business_address_baranggay[0].selectize;
            },
            select_billing_address: function() {
                var xhr;
                var select_billing_address_region, $select_billing_address_region;
                var select_billing_address_province, $select_billing_address_province;
                var select_billing_address_city, $select_billing_address_city;
                var select_billing_address_baranggay, $select_billing_address_baranggay;

                $select_billing_address_region = $('#select-billing-address-region').selectize({
                    valueField: 'region_id',
                    labelField: 'region',
                    searchField: ['region'],

                    onChange: function(value) {
                        if (!value.length) return;
                        select_billing_address_baranggay.disable();
                        select_billing_address_baranggay.clearOptions();

                        select_billing_address_city.disable();
                        select_billing_address_city.clearOptions();

                        select_billing_address_province.disable();
                        select_billing_address_province.clearOptions();
                        select_billing_address_province.load(function(callback) {
                            if (value == 0) return;
                            xhr && xhr.abort();
                            xhr = $.ajax({
                                url: '/api/address/regions/' + value + '/provinces',
                                success: function(results) {
                                    select_billing_address_province.enable();
                                    callback(results);
                                },
                                error: function() {
                                    callback();
                                }
                            })
                        });
                    }
                });

                $select_billing_address_province = $('#select-billing-address-province').selectize({
                    valueField: 'province_id',
                    labelField: 'province',
                    searchField: ['province'],

                    onChange: function(value) {
                        if (!value.length) return;
                        select_billing_address_baranggay.disable();
                        select_billing_address_baranggay.clearOptions();

                        select_billing_address_city.disable();
                        select_billing_address_city.clearOptions();
                        select_billing_address_city.load(function(callback) {
                            if (value == 0) return;
                            xhr && xhr.abort();
                            xhr = $.ajax({
                                url: '/api/address/regions/provinces/' + value + '/cities',
                                success: function(results) {
                                    select_billing_address_city.enable();
                                    callback(results);
                                },
                                error: function() {
                                    callback();
                                }
                            })
                        });
                    }
                });
                select_billing_address_province = $select_billing_address_province[0].selectize;

                $select_billing_address_city = $('#select-billing-address-city').selectize({
                    valueField: 'city_id',
                    labelField: 'city',
                    searchField: ['city'],

                    onChange: function(value) {
                        if (!value.length) return;
                        select_billing_address_baranggay.disable();
                        select_billing_address_baranggay.clearOptions();
                        select_billing_address_baranggay.load(function(callback) {
                            if (value == 0) return;
                            xhr && xhr.abort();
                            xhr = $.ajax({
                                url: '/api/address/regions/provinces/cities/' + value + '/baranggays',
                                success: function(results) {
                                    select_billing_address_baranggay.enable();
                                    callback(results);
                                },
                                error: function() {
                                    callback();
                                }
                            })
                        });
                    }
                });
                select_billing_address_city = $select_billing_address_city[0].selectize;

                $select_billing_address_baranggay = $('#select-billing-address-baranggay').selectize({
                    valueField: 'baranggay_id',
                    labelField: 'baranggay',
                    searchField: ['baranggay'],
                });
                select_billing_address_baranggay = $select_billing_address_baranggay[0].selectize;
            },
        }
    </script>
@endsection
