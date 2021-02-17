@extends('report.template')

@section('report-title')
    Offer Reports
@endsection

@section('table-options')
    @include('report.options.dates')
@endsection

@section('table')
    <table class="table table_01 tablesorter" id="mainTable">
        <thead>

        <tr class="value_span10-1">
            <th>Offer ID</th>
            <th>Offer Name</th>
            <th>Raw</th>
            <th>Unique</th>
            <th>Free Sign Ups</th>
            <th>Pending Conversion</th>
            <th>Conversion</th>
            <th>Revenue</th>
            <th>Deductions</th>
            <th>EPC</th>


        </tr>
        </thead>
        <tbody>
        @php
            $reporter->between($dates['startDate'], $dates['endDate'],
             new LeadMax\TrackYourStats\Report\Formats\HTML(true,
              ['idoffer', 'offer_name', 'Clicks', 'UniqueClicks', 'FreeSignUps', 'PendingConversions', 'Conversions', 'Revenue', 'Deductions', 'EPC']));
        @endphp

        </tbody>
    </table>
@endsection
@section('footer')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#mainTable").tablesorter(
                {
                    sortList: [[6, 1]],
                    widgets: ['staticRow']
                });
        });
    </script>
@endsection