@extends('layouts.main')

@section('nav_providers')
    current_section
@endsection

@section('breadcrumbs')
    <div id="top_bar">
        <ul id="breadcrumbs">
            <li><span>Providers</span></li>
        </ul>
    </div>
@endsection

@section('page-content')
    <h4 class="heading_b uk-margin-bottom">Providers</h4>

    @if ($notify = session('notify'))
        <div class="uk-alert uk-alert-{{ $notify['type'] }}" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            {{ $notify['message'] }}
        </div>
    @endif

    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a href="{{ route('providers.create') }}" class="md-btn md-btn-primary md-btn-small md-btn-wave-light waves-effect waves-button waves-light">New Provider</a>
            </div>
            <h3 class="md-card-toolbar-heading-text">All Providers</h3>
        </div>
        <div class="md-card-content">
            <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Accreditation Status</th>
                    <th>Status</th>
                    <th width="100px">Actions</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Accreditation Status</th>
                    <th>Status</th>
                    <th width="100px">Actions</th>
                </tr>
                </tfoot>

                <tbody>
                    @foreach ($providers as $key => $provider)
                        <tr>
                            <td><a href="{{ route('providers.show', $provider->id) }}">{{ sprintf('%06d', $provider->id) }}</a></td>
                            <td><a href="{{ route('providers.show', $provider->id) }}">{{ $provider->name }}</a></td>
                            <td>{{ optional($provider->addressProvince)->province }}</td>
                            <td>
                                <span class="uk-badge @if($provider->accreditation_status == 'disaccredited') uk-badge-danger @elseif($provider->accreditation_status == 'non-accredited') uk-badge-warning @endif">
                                    {{ strtoupper($provider->accreditation_status) }}
                                </span>
                            <td>
                                <span class="uk-badge @if($provider->status == 'inactive') uk-badge-danger @endif">
                                    {{ strtoupper($provider->status) }}
                                </span>
                            </td>
                            <td class="uk-text-center" width="100px;">
                                <a href="{{ route('providers.edit', $provider->id) }}"><i class="md-icon material-icons">&#xE254;</i></a>
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
                var individual_search_table = $dt_individual_search.DataTable({
                    "order": [[ 0, "desc" ]]
                });

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
