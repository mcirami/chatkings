@extends('report.template')


@section('report-title')
    Adjusted Sales Report
@endsection

@section('table-options')
    @include('report.options.dates')
@endsection


@section('table')
    <table class="table table-striped table_01 tablesorter" id="mainTable">
        <thead>
        <tr class="value_span10-1">
            <th>Log ID</th>
            <th>User Name</th>
            <th>Click ID</th>
            <th>Offer Name</th>
            <th>Conversion ID</th>
            <th>Paid</th>
            <th>Timestamp (UTC)</th>
            <th>Creator User Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @php
            $reporter->between($dates['startDate'], $dates['endDate'], new \LeadMax\TrackYourStats\Report\Formats\HTML());
        @endphp
        </tbody>
        <tfoot>
        </tfoot>
    </table>
@endsection

@section('footer')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#mainTable").tablesorter(
                {
                    widgets: ['staticRow']
                });
        });
    </script>
@endsection