@extends('layouts.main')

@section('nav_physicians')
    current_section
@endsection

@section('breadcrumbs')
    <div id="top_bar">
        <ul id="breadcrumbs">
            <li><span>Physicians</span></li>
        </ul>
    </div>
@endsection

@section('page-content')
    <h4 class="heading_b uk-margin-bottom">Physicians</h4>

    @if ($notify = session('notify'))
        <div class="uk-alert uk-alert-{{ $notify['type'] }}" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            {{ $notify['message'] }}
        </div>
    @endif

    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a href="{{ route('physicians.create') }}" class="md-btn md-btn-primary md-btn-small md-btn-wave-light waves-effect waves-button waves-light">New Physician</a>
            </div>
            <h3 class="md-card-toolbar-heading-text">All Physicians</h3>
        </div>
        <div class="md-card-content">
            <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Specialization</th>
                    <th>Accreditation Status</th>
                    <th>Status</th>
                    <th width="100px">Actions</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Specialization</th>
                    <th>Accreditation Status</th>
                    <th>Status</th>
                    <th width="100px">Actions</th>
                </tr>
                </tfoot>

                <tbody>
                    @foreach ($physicians as $key => $physician)
                        <tr>
                            <td><a href="{{ route('physicians.show', $physician->id) }}">{{ sprintf('%06d', $physician->id) }}</a></td>
                            <td><a href="{{ route('physicians.show', $physician->id) }}">{{ $physician->fullName() }}</a></td>
                            <td>{{ optional($physician->specialization)->specialization_name }}</td>
                            <td>
                                <span class="uk-badge @if($physician->accreditation_status == 'disaccredited') uk-badge-danger @elseif($physician->accreditation_status == 'non-accredited') uk-badge-warning @endif">
                                    {{ strtoupper($physician->accreditation_status) }}
                                </span>
                            <td>
                                <span class="uk-badge @if($physician->status == 'inactive') uk-badge-danger @endif">
                                    {{ strtoupper($physician->status) }}
                                </span>
                            </td>
                            <td class="uk-text-center" width="100px;">
                                <a href="{{ route('physicians.edit', $physician->id) }}"><i class="md-icon material-icons">&#xE254;</i></a>
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
