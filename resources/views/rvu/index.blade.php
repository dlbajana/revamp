@extends('layouts.main')

@section('nav_medical')
    current_section
@endsection

@section('nav_rvu')
    act_item
@endsection

@section('breadcrumbs')
    <div id="top_bar">
        <ul id="breadcrumbs">
            <li><span>Relative Value Unit</span></li>
        </ul>
    </div>
@endsection

@section('page-content')
    <h4 class="heading_b uk-margin-bottom">Relative Value Unit</h4>

    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-toolbar">
            <h3 class="md-card-toolbar-heading-text">All RVUs</h3>
        </div>
        <div class="md-card-content">
            <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>RVU Code</th>
                        <th>RVU Description</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
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
                // $dt_individual_search.find('tfoot th').each( function() {
                //     var title = $dt_individual_search.find('tfoot th').eq( $(this).index() ).text();
                //     $(this).html('<input type="text" class="md-input" placeholder="' + title + '" />');
                // } );

                // reinitialize md inputs
                // altair_md.inputs();

                // DataTable
                var individual_search_table = $dt_individual_search.DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ url('api/datatables/rvu') }}"
                });

                // Apply the search
                // individual_search_table.columns().every(function() {
                //     var that = this;
                //
                //     $('input', this.footer()).on('keyup change', function() {
                //         that
                //             .search( this.value )
                //             .draw();
                //     } );
                // });

                // $.fn.dataTable.ext.errMode = 'none';
            }
        });
    </script>
@endsection
