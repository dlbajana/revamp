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
            <li><span>Corporates</span></li>
        </ul>
    </div>
@endsection

@section('page-content')
    <h4 class="heading_b uk-margin-bottom">Corporates</h4>

    @if ($notify = session('notify'))
        <div class="uk-alert uk-alert-{{ $notify['type'] }}" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            {{ $notify['message'] }}
        </div>
    @endif

    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a href="{{ route('corporates.create') }}" class="md-btn md-btn-primary md-btn-small md-btn-wave-light waves-effect waves-button waves-light">New Corporate</a>
            </div>
            <h3 class="md-card-toolbar-heading-text">All Corporate Accounts</h3>
        </div>
        <div class="md-card-content">
            <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Contact Person</th>
                    <th>Status</th>
                    <th width="100px">Actions</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Contact Person</th>
                    <th>Status</th>
                    <th width="100px">Actions</th>
                </tr>
                </tfoot>

                <tbody>
                    @foreach ($corporates as $key => $corporate)
                        <tr>
                            <td><a href="{{ route('corporates.show', $corporate->id) }}">{{ sprintf('%06d', $corporate->id) }}</a></td>
                            <td><a href="{{ route('corporates.show', $corporate->id) }}">{{ $corporate->name }}</a></td>
                            <td>{{ optional($corporate->businessAddressProvince)->province }}</td>
                            <td>{{ $corporate->contact_person_name }}</td>
                            <td>
                                @component('components.corporate-status'){{ $corporate->status }}@endcomponent
                            </td>
                            <td class="uk-text-center" width="100px;">
                                <a href="{{ route('corporates.edit', $corporate->id) }}"><i class="md-icon material-icons">&#xE254;</i></a>
                                <a href="#"><i class="md-icon material-icons">&#xE5D4;</i></a>
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
