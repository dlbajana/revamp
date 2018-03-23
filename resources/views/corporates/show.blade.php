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
            <li><span>{{ $corporate->name }}</span></li>
        </ul>
    </div>
@endsection

@section('page-content')
    <h4 class="heading_b uk-margin-bottom">Corporates</h4>
    <div class="md-card">
        <div class="user_heading">
            <div class="user_heading_menu hidden-print">
                <div class="uk-display-inline-block" data-uk-modal="{target:'#modal_update_status'}" data-uk-tooltip="{pos:'bottom'}" title="Update Status"><i class="md-icon md-icon-light material-icons">&#xE3A0;</i></div>
                <div class="uk-display-inline-block" data-uk-modal="{target:'#modal_add_fund'}" data-uk-tooltip="{pos:'bottom'}" title="Add Fund"><i class="md-icon md-icon-light material-icons">&#xE263;</i></div>
                <div class="uk-display-inline-block" data-uk-tooltip="{pos:'bottom'}" title="New Plan"><i class="md-icon md-icon-light material-icons" id="new_plan">&#xE02E;</i></div>
                <div class="uk-display-inline-block" data-uk-tooltip="{pos:'bottom'}" title="Print"><i class="md-icon md-icon-light material-icons" id="corporate_print">&#xE8ad;</i></div>
            </div>
            <div class="user_heading_avatar">
                <div class="thumbnail">

                    <img src="/assets/img/clipart_corporate.png"/>
                </div>
            </div>
            <div class="user_heading_content">
                <h2 class="heading_b uk-margin-bottom">
                    <span class="uk-text-truncate">[{{ sprintf('%06d', $corporate->id) }}] {{ $corporate ->name }}</span>
                    <span class="sub-heading">{{ $corporate->completeBusinessAddress() }}</span>
                </h2>
                <ul class="user_stats">
                    <li>
                        <h4 class="heading_a">0 <span class="sub-heading">Members</span></h4>
                    </li>
                    <li>
                        <h4 class="heading_a">0 <span class="sub-heading">Transactions</span></h4>
                    </li>
                </ul>
            </div>
            <a class="md-fab md-fab-small md-fab-accent hidden-print" href="{{ route('corporates.edit', $corporate->id) }}">
                <i class="material-icons">&#xE150;</i>
            </a>
        </div>
        <div class="user_content">
            <ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}">
                <li class="uk-active"><a href="#">Details</a></li>
                <li><a href="#">Members</a></li>
                <li><a href="#">Logs</a></li>
                <li><a href="#">Fund History</a></li>
            </ul>
            <ul id="user_profile_tabs_content" class="uk-switcher uk-margin">
                {{-- START DETAILS --}}
                <li>
                    <h3 class="full_width_in_card heading_c uk-margin-small-top">
                        Information
                    </h3>
                    <div class="uk-grid">
                        <div class="uk-width-2-3">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $corporate->name }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-3">
                            <label>Name in the Card</label>
                            <input type="text" name="name" value="{{ $corporate->card_name }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-3">
                            <label>Industry</label>
                            <input type="text" name="name" value="@if($corporate->industry == 'Others'){{ $corporate->industry_others }}@else{{ $corporate->industry }}@endif" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-3">
                            <label>Account Type</label>
                            <input type="text" name="name" value="{{ strtoupper($corporate->account_type) }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-3">
                            <label>Benefit Layer</label>
                            <input type="text" name="name" value="{{ $corporate->benefit_layer }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-3-4">
                            <label>Status</label>
                            <input type="text" name="name" value="{{ strtoupper($corporate->status) }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-4">
                            <label>Co-Brand</label>
                            <input type="text" name="name" value="{{ $corporate->co_brand ? "YES" : "NO" }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <label>PhilHealth No</label>
                            <input type="text" name="name" value="{{ $corporate->philhealth_no }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>Acceptance Age</label>
                            <input type="text" name="name" value="{{ $corporate->acceptance_age }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-2">
                            <label>Termination Age</label>
                            <input type="text" name="name" value="{{ $corporate->termination_age }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-4">
                            <label>Effectivity Date (from)</label>
                            <input type="text" name="name" value="{{ $corporate->date_effectivity_from->toFormattedDateString() }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-4">
                            <label>Effectivity Date (to)</label>
                            <input type="text" name="name" value="{{ $corporate->date_effectivity_from->toFormattedDateString() }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-4">
                            <label>Effectivity Period</label>
                            <input type="text" name="name" value="{{ $corporate->effectivity_period . " Months" }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-4">
                            <label>Expiration Date</label>
                            <input type="text" name="name" value="{{ $corporate->date_expiry->toFormattedDateString() }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <h3 class="heading_c uk-margin-small-bottom"><u>Company Logo URL:</u></h3>
                    <div id="user_profile_gallery" data-uk-check-display class="uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-2" data-uk-grid="{gutter: 4}">
                        <div>
                            <a href="/storage/{{ $corporate->company_logo_url }}" data-uk-lightbox="{group:'user-photos'}">
                                <img src="/storage/{{ $corporate->company_logo_url }}" alt=""/>
                            </a>
                        </div>
                    </div>
                    <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Bank Details</h3>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>Account Name</label>
                            <input type="text" name="name" value="{{ $corporate->bank_account_name }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-2">
                            <label>Account Number</label>
                            <input type="text" name="name" value="{{ $corporate->bank_account_no }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>Bank Name</label>
                            <input type="text" name="name" value="{{ $corporate->bank_name }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-2">
                            <label>Bank Branch</label>
                            <input type="text" name="name" value="{{ $corporate->bank_branch }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Address</h3>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <div class="uk-form-row">
                                <label>Business Address</label>
                                <textarea cols="30" rows="2" class="md-input label-fixed" readonly>{{ $corporate->completeBusinessAddress() }}</textarea>
                            </div>
                        </div>
                        <div class="uk-width-1-2">
                            <div class="uk-form-row">
                                <label>Billing Address</label>
                                <textarea cols="30" rows="2" class="md-input label-fixed" readonly>{{ $corporate->completeBillingAddress() }}</textarea>
                            </div>
                        </div>
                    </div>
                    <h3 class="full_width_in_card heading_c uk-margin-large-top">
                        Contact
                    </h3>
                    <div class="uk-grid">
                        <div class="uk-width-2-3">
                            <label>Contact Person Name</label>
                            <input type="text" name="name" value="{{ $corporate->contact_person_name }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-3">
                            <label>Designation</label>
                            <input type="text" name="name" value="{{ $corporate->contact_person_designation }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>Mobile No</label>
                            <input type="text" name="name" value="{{ $corporate->contact_person_mobile_no }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-2">
                            <label>Email</label>
                            <input type="text" name="name" value="{{ $corporate->contact_person_email }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>Fax No</label>
                            <input type="text" name="name" value="{{ $corporate->contact_person_fax_no }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-2">
                            <label>Landline</label>
                            <input type="text" name="name" value="{{ $corporate->contact_person_telephone_no }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <h3 class="full_width_in_card heading_c uk-margin-large-top">
                        BIR
                    </h3>
                    <div class="uk-grid">
                        <div class="uk-width-2-3">
                            <label>Tax Identification Number</label>
                            <input type="text" name="name" value="{{ $corporate->tin }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-3">
                            <label>Withheld</label>
                            <input type="text" name="name" value="{{ $corporate->withheld ? "YES" : "NO" }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-2-3">
                            <label>Representative Name</label>
                            <input type="text" name="name" value="{{ $corporate->representative_name }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-3">
                            <label>Representative Position</label>
                            <input type="text" name="name" value="{{ $corporate->representative_position }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <label>Representative TIN</label>
                            <input type="text" name="name" value="{{ $corporate->representative_tin }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <h3 class="heading_c uk-margin-small-bottom"><u>Electronic Signature File:</u></h3>
                            <div id="user_profile_gallery" data-uk-check-display class="uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-2" data-uk-grid="{gutter: 4}">
                                <div>
                                    <a href="/storage/{{ $corporate->electronic_signature_url }}" data-uk-lightbox="{group:'user-photos'}">
                                        <img src="/storage/{{ $corporate->electronic_signature_url }}" alt=""/>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-2">
                            <h3 class="heading_c uk-margin-small-bottom"><u>Secretary Certificate:</u></h3>
                            <div id="user_profile_gallery" data-uk-check-display class="uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-2" data-uk-grid="{gutter: 4}">
                                <div>
                                    <a href="/storage/{{ $corporate->secretary_certificate_url }}" data-uk-lightbox="{group:'user-photos'}">
                                        <img src="/storage/{{ $corporate->secretary_certificate_url }}" alt=""/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="full_width_in_card heading_c uk-margin-large-top">
                        FUND
                    </h3>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <label for="masked_cash_bond">Cash Bond</label>
                            <input class="md-input masked_input label-fixed" value="{{ $corporate->cash_bond }}" readonly id="masked_cash_bond" type="text"
                                data-inputmask="'alias': 'currency', 'groucashpSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                data-inputmask-showmaskonhover="false" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <label for="masked_revolving_fund">Revolving Fund</label>
                            <input class="md-input masked_input label-fixed" value="{{ $corporate->revolving_fund }}" readonly id="masked_revolving_fund" type="text"
                                data-inputmask="'alias': 'currency', 'groucashpSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                data-inputmask-showmaskonhover="false" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label for="masked_revolving_fund">Utilized Amount</label>
                            <input class="md-input masked_input label-fixed" value="{{ $corporate->utilized_amount }}" readonly id="masked_revolving_fund" type="text"
                                data-inputmask="'alias': 'currency', 'groucashpSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                data-inputmask-showmaskonhover="false" />
                        </div>
                        <div class="uk-width-1-2">
                            <label for="masked_revolving_fund">Stale Amount</label>
                            <input class="md-input masked_input label-fixed" value="{{ $corporate->stale_amount }}" readonly id="masked_revolving_fund" type="text"
                                data-inputmask="'alias': 'currency', 'groucashpSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                data-inputmask-showmaskonhover="false" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label for="masked_revolving_fund">First Warning Amount</label>
                            <input class="md-input masked_input label-fixed" value="{{ $corporate->first_warning }}" readonly id="masked_revolving_fund" type="text"
                                data-inputmask="'alias': 'currency', 'groucashpSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                data-inputmask-showmaskonhover="false" />
                        </div>
                        <div class="uk-width-1-2">
                            <label for="masked_revolving_fund">Threshold</label>
                            <input class="md-input masked_input label-fixed" value="{{ $corporate->threshold }}" readonly id="masked_revolving_fund" type="text"
                                data-inputmask="'alias': 'currency', 'groucashpSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                data-inputmask-showmaskonhover="false" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <label for="masked_revolving_fund">Remaining Fund</label>
                            <input class="md-input masked_input label-fixed" value="{{ $corporate->stale_amount }}" readonly id="masked_revolving_fund" type="text"
                                data-inputmask="'alias': 'currency', 'groucashpSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"
                                data-inputmask-showmaskonhover="false" />
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-2-3">
                            <label for="masked_admin_fee">Admin Fee</label>
                            <input class="md-input masked_input" value="{{ $corporate->admin_fee }}" readonly id="masked_admin_fee" type="text"
                                data-inputmask="'alias': 'currency', 'prefix': '', 'suffix': ' %' " data-inputmask-showmaskonhover="false" />
                        </div>
                        <div class="uk-width-1-3">
                            <label>Payment Setup</label>
                            <input type="text" name="name" value="{{ strtoupper($corporate->payment_setup) }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                </li>
                {{-- END DETAILS --}}

                {{-- START MEMBERS --}}
                <li>

                </li>
                {{-- END MEMBERS --}}

                {{-- START LOGS --}}
                <li>
                    <ul class="md-list">
                        @foreach ($corporate->corporateLogs->sortByDesc('created_at') as $key => $log)
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
                {{-- END LOGS --}}

                {{-- START FUND HISTORY --}}
                <li>
                    <table class="uk-table uk-table-condensed" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th style="text-align: right">Debit</th>
                                <th style="text-align: right">Credit</th>
                                <th style="text-align: right">Running Balance</th>
                                <th style="text-align: center">Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th style="text-align: right">{{ number_format($corporate->corporateFundHistories->sum('debit'), 2) }}</th>
                                <th style="text-align: right">{{ number_format($corporate->corporateFundHistories->sum('credit'), 2) }}</th>
                                <th style="text-align: right"></th>
                                <th style="text-align: center"></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($corporate->corporateFundHistories as $key => $corporateFundHistory)
                                <tr>
                                    <td>{{ $corporateFundHistory->title }}</td>
                                    <td align="right">{{ $corporateFundHistory->debit ? number_format($corporateFundHistory->debit, 2) : "" }}</td>
                                    <td align="right">{{ $corporateFundHistory->credit ? number_format($corporateFundHistory->credit, 2) : "" }}</td>
                                    <td align="right">{{ number_format($corporateFundHistory->running_balance, 2) }}</td>
                                    <td align="center">{{ $corporateFundHistory->created_at->toFormattedDateString() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </li>
                {{-- END FUND HISTORY --}}
            </ul>
        </div>

    </div>

    <div class="uk-modal" id="modal_add_fund">
        <div class="uk-modal-dialog">
            <form class="" action="{{ route('corporates.add-fund', $corporate->id) }}" method="post">
                {{ csrf_field() }}

                <div class="uk-modal-header">
                    <h3 class="uk-modal-title" style="color: black;">Add Fund <i class="material-icons" data-uk-tooltip="{pos:'top'}" title="headline tooltip">&#xE8FD;</i></h3>
                </div>
                <input class="md-input masked_input label-fixed" value="{{ $corporate->cash_bond }}" type="text" data-inputmask-showmaskonhover="false" name="fund"
                    data-inputmask="'alias': 'currency', 'groucashpSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'"/>

                <div class="uk-modal-footer uk-text-right">
                    <button type="button" class="md-btn md-btn-flat uk-modal-close">Cancel</button>
                    <button type="submit" class="md-btn md-btn-flat md-btn-flat-primary">Add Fund</button>
                </div>
            </form>
        </div>
    </div>

    <div class="uk-modal" id="modal_update_status">
        <div class="uk-modal-dialog">
            <form action="{{ route('corporates.action', $corporate->id) }}" method="post">
                {{ csrf_field() }}
                <div class="uk-modal-header">
                    <h3 class="uk-modal-title">Update Status</h3>
                </div>
                <p>
                    You may update the corporate's status immediately or you may specify a date where the action will take effect.
                    Terminated corporate can <span class="uk-text-bold">no longer be reactivated</span> .
                </p>
                <div class="uk-grid">
                    <div class="uk-width-1-2">
                        <select name="status" class="md-input" style="margin-top: 20px;">
                            <option value="" disabled selected hidden>Action...</option>
                            <option value="pending">Pending</option>
                            <option value="active">Activate / Reactivate</option>
                            <option value="terminated">Terminate / Cancel</option>
                            <option value="suspended">Suspend</option>
                            <option value="extended">Extend</option>
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

            $maskedInput = $('.masked_input').inputmask();
            if($maskedInput.length) {
                $maskedInput.inputmask();
            }

            $body.on('click','#corporate_print',function(e) {
                e.preventDefault();
                UIkit.modal.confirm('Do you want to print Corporate Enrollment Form?', function () {
                    var win = window.open('{{ route('corporates.print', $corporate->id) }}', '_blank');
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

            $body.on('click','#new_plan',function(e) {
                e.preventDefault();
                UIkit.modal.confirm('Create a new Plan for this Provider?', function () {
                    var win = window.open('{{ route('plans.create', ['corporate_id' => $corporate->id]) }}', '_blank');
                    if (win) {
                        //Browser has allowed it to be opened
                        win.focus();
                    } else {
                        //Browser has blocked it
                        alert('Please allow popups for this website');
                    }
                }, {
                    labels: {
                        'Ok': 'Create Plan'
                    }
                });
            });
        });
    </script>
@endsection
