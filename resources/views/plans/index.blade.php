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
            <li><span>Plans and Coverage</span></li>
        </ul>
    </div>
@endsection

@section('page-content')
    <h4 class="heading_b uk-margin-bottom">Plans and Coverage</h4>

    @if ($notify = session('notify'))
        <div class="uk-alert uk-alert-{{ $notify['type'] }}" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            {{ $notify['message'] }}
        </div>
    @endif

    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a href="{{ route('plans.create') }}" class="md-btn md-btn-primary md-btn-small md-btn-wave-light waves-effect waves-button waves-light">New Plan</a>
            </div>
            <h3 class="md-card-toolbar-heading-text">All Plans and Coverage</h3>
        </div>
        <div class="md-card-content">
            <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Plan Name</th>
                        <th>Corporate</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th width="100px">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Code</th>
                        <th>Plan Name</th>
                        <th>Corporate</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th width="100px">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($plans as $key => $plan)
                        <tr>
                            <td><a href="{{ route('plans.show', $plan->id) }}">{{ sprintf('%06d', $plan->id) }}</a></td>
                            <td><a href="{{ route('plans.show', $plan->id) }}">{{ $plan->name }}</a></td>
                            <td><a href="{{ route('corporates.show', $plan->corporate_id) }}">{{ $plan->corporate->name }}</a> </td>
                            <td>{{ strtoupper($plan->type) }}</td>
                            <td>@component('components.plan-status'){{ $plan->status }}@endcomponent</td>
                            <td>{{ $plan->start_date->toFormattedDateString() }}</td>
                            <td>{{ $plan->end_date->toFormattedDateString() }}</td>
                            <td class="uk-text-center" width="100px;">
                                <a href="{{ route('plans.edit', $plan->id) }}"><i class="md-icon material-icons">&#xE254;</i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/assets/js/custom/datatables/datatables.uikit.min.js"></script>
    <script>
        $(function () {
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
