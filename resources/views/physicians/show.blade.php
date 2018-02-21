@extends('layouts.main')

@section('nav_medical')
    current_section
@endsection

@section('nav_physicians')
    act_item
@endsection

@section('breadcrumbs')
    <div id="top_bar">
        <ul id="breadcrumbs">
            <li><a href="{{ route('physicians.index') }}">Physicians</a></li>
            <li><span>{{ $physician->fullName() }}</span> </li>
        </ul>
    </div>
@endsection

@section('page-content')
    <h4 class="heading_b uk-margin-bottom">Physicians</h4>
    <div class="md-card">
        <div class="user_heading">
            <div class="user_heading_menu hidden-print">
                <div class="uk-display-inline-block" data-uk-dropdown="{post:'left-top'}">
                    <i class="md-icon material-icons md-icon-light">&#xE5D4;</i>
                    <div class="uk-dropdown uk-dropdown-small">
                        <ul class="uk-nav">
                            <li>
                                <a href="#" data-uk-modal="{target:'#modal_update_status'}">Actions</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="uk-display-inline-block"><i class="md-icon md-icon-light material-icons" id="page_print">&#xE8ad;</i></div>
            </div>
            <div class="user_heading_avatar">
                <div class="thumbnail">
                    <img src="/assets/img/clipart_nurse.png"/>
                </div>
            </div>
            <div class="user_heading_content">
                <h2 class="heading_b uk-margin-bottom">
                    <span class="uk-text-truncate">[{{ sprintf('%06d', $physician->id) }}] {{ $physician->fullName() }}</span>
                    <span class="sub-heading">{{ $physician->completeHomeAddress() }}</span>
                </h2>
                <ul class="user_stats">
                    <li>
                        <h4 class="heading_a">{{ $physician->providers->count() }} <span class="sub-heading">Providers</span></h4>
                    </li>
                    <li>
                        <h4 class="heading_a">0 <span class="sub-heading">Transactions</span></h4>
                    </li>
                    <li>
                        <h4 class="heading_a">0 <span class="sub-heading">Claims</span></h4>
                    </li>
                </ul>
            </div>
            <a class="md-fab md-fab-small md-fab-accent hidden-print" href="{{ route('physicians.edit', $physician->id) }}"><i class="material-icons">&#xE150;</i></a>
        </div>
        <div class="user_content">
            <ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}">
                <li class="uk-active"><a href="#">Details</a></li>
                <li><a href="#">Affiliated Providers</a></li>
                <li><a href="#">Logs</a></li>
            </ul>
            <ul id="user_profile_tabs_content" class="uk-switcher uk-margin">
                <li>
                    <h3 class="full_width_in_card heading_c uk-margin-small-top">
                        Information
                    </h3>
                    <div class="uk-grid">
                        <div class="uk-width-medium-3-10">
                            <label>First Name</label>
                            <input type="text" value="{{ $physician->first_name }}" readonly class="md-input label-fixed"/>
                        </div>
                        <div class="uk-width-medium-3-10">
                            <label>Middle Name</label>
                            <input type="text" value="{{ $physician->middle_name }}" readonly class="md-input label-fixed"/>
                        </div>
                        <div class="uk-width-medium-3-10">
                            <label>Last Name</label>
                            <input type="text" value="{{ $physician->last_name }}" readonly class="md-input label-fixed"/>
                        </div>
                        <div class="uk-width-medium-1-10">
                            <label>Suffix</label>
                            <input type="text" value="{{ $physician->suffix }}" readonly class="md-input label-fixed"/>
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <label>Mother's Full Maiden Name</label>
                            <input type="text" value="{{ $physician->mothers_maiden_name }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-4">
                            <label>Nationality</label>
                            <input type="text" value="{{ strtoupper($physician->nationality) }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-4">
                            <label>Civil Status</label>
                            <input type="text" value="{{ strtoupper($physician->civil_status) }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-4">
                            <label>Birthday</label>
                            <input type="text" value="{{ optional($physician->birthday)->toFormattedDateString() }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-4">
                            <label>Gender</label>
                            <input type="text" value="{{ strtoupper($physician->gender) }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-2-3">
                            <label>Accreditation Status</label>
                            <input type="text" value="{{ strtoupper($physician->accreditation_status) }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-3">
                            <label>Suspected Fraud</label>
                            <input type="text" value="{{ $physician->suspected_fraud ? "YES" : "NO" }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>Specialization</label>
                            <input type="text" value="{{ optional($physician->specialization)->specialization_name }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-2">
                            <label>Sub Specialization</label>
                            <input type="text" value="{{ optional($physician->subSpecialization)->subspecialization_name }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Contact Details</h3>
                    <div class="uk-grid">
                        <div class="uk-width-1-3">
                            <label>Email</label>
                            <input type="text" value="{{ $physician->email }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-3">
                            <label>Mobile Number</label>
                            <input type="text" value="{{ $physician->mobile_no }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-3">
                            <label>Landline Number</label>
                            <input type="text" value="{{ $physician->telephone_no }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Bank Details</h3>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>Account Name</label>
                            <input type="text" value="{{ $physician->bank_account_name }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-2">
                            <label>Account Number</label>
                            <input type="text" value="{{ $physician->bank_account_number }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>Bank Name</label>
                            <input type="text" value="{{ $physician->bank_name }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-2">
                            <label>Bank Branch</label>
                            <input type="text" value="{{ $physician->bank_branch }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">PHIC Accreditation</h3>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>PHIC Accreditation Start Date</label>
                            <input type="text" value="{{ optional($physician->phic_accreditation_from)->toFormattedDateString() }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-2">
                            <label>PHIC Accreditation End Date</label>
                            <input type="text" value="{{ optional($physician->phic_accreditation_to)->toFormattedDateString() }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Address</h3>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <label>Home Address</label>
                            <textarea cols="30" rows="2" class="md-input label-fixed" readonly>{{ $physician->completeHomeAddress() }}</textarea>
                        </div>
                        <div class="uk-width-1-1 uk-margin-medium-top">
                            <label>Provincial Address</label>
                            <textarea cols="30" rows="2" class="md-input label-fixed" readonly>{{ $physician->completeProvincialAddress() }}</textarea>
                        </div>
                    </div>
                    <h3 class="full_width_in_card heading_c uk-margin-medium-top">
                        License
                    </h3>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <label>Tax Identification Number</label>
                            <input type="text" value="{{ $physician->tin }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>SSS / GSIS Number</label>
                            <input type="text" value="{{ $physician->sss_no }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-2">
                            <label>PhilHealth Number</label>
                            <input type="text" value="{{ $physician->philhealth_no }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-2-3">
                            <label>PRC License Number</label>
                            <input type="text" value="{{ $physician->prc_license_no }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-3">
                            <label>PRC Validity Date</label>
                            <input type="text" value="{{ optional($physician->prc_validity_date)->toFormattedDateString() }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <label>Remarks</label>
                            <textarea rows="2" cols="30" class="md-input label-fixed" readonly>{{ $physician->remarks }}</textarea>
                        </div>
                    </div>
                </li>
                <li>
                    <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact No.</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact No.</th>
                        </tr>
                        </tfoot>

                        <tbody>
                            @foreach ($physician->providers as $key => $provider)
                                <tr>
                                    <td><a href="{{ route('providers.show', $provider->id) }}">{{ sprintf('%06d', $provider->id) }}</a></td>
                                    <td><a href="{{ route('providers.show', $provider->id) }}">{{ $provider->name }}</a></td>
                                    <td>{{ $provider->completeBusinessAddress() }}</td>
                                    <td>{{ optional($provider->providerContactPersons->first())->telephone_no }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </li>
                <li>
                    <ul class="md-list">
                        @foreach ($physician->physicianLogs->sortByDesc('created_at') as $key => $log)
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
            </ul>
        </div>
    </div>

    <div class="uk-modal" id="modal_update_status">
        <div class="uk-modal-dialog">
            <form action="{{ route('physicians.action', $physician->id) }}" method="post">
                {{ csrf_field() }}
                <div class="uk-modal-header">
                    <h3 class="uk-modal-title">Update Status</h3>
                </div>
                <p>
                    You may update the physician's status immediately or you may specify a date where the action will take effect.
                    Terminated physician can <span class="uk-text-bold">no longer be reactivated</span> .
                </p>
                <div class="uk-grid">
                    <div class="uk-width-1-2">
                        <select name="status" class="md-input" style="margin-top: 20px;">
                            <option value="" disabled selected hidden>Action...</option>
                            <option value="suspended">Suspend</option>
                            <option value="accredited">Accredit</option>
                            <option value="disaccredited">Disaccredit</option>
                            <option value="terminated">Terminate</option>
                            <option value="reactivated">Reactivate</option>
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
    <script src="/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/assets/js/custom/datatables/datatables.uikit.min.js"></script>
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

            var $dt_scroll = $('#dt_scroll');
            if($dt_scroll.length) {
                $dt_scroll.DataTable({
                    "bLengthChange": false,
                    "paging": true
                });
            }

            var $dt_individual_search = $('#dt_individual_search');
            if($dt_individual_search.length) {

                // Setup - add a text input to each footer cell
                $dt_individual_search.find('tfoot th').each( function() {
                    var title = $dt_individual_search.find('tfoot th').eq( $(this).index() ).text();
                    $(this).html('<input type="text" class="md-input" placeholder="' + title + '" />');
                } );

                // reinitialize md inputs
                altair_md.inputs();

                // DataTable
                var individual_search_table = $dt_individual_search.DataTable();

                // Apply the search
                individual_search_table.columns().every(function() {
                    var that = this;

                    $('input', this.footer()).on('keyup change', function() {
                        that
                            .search( this.value )
                            .draw();
                    } );
                });
            }
        });
    </script>
@endsection
