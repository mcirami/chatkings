@extends('report.template')

@section('report-title')
    Affiliate Reports
@endsection

@section('table-options')
    @include('report.options.user-type')
    @include('report.options.dates')
@endsection

@section('table')
    <table class="table table-striped table_01 tablesorter" id="mainTable">
        <thead>
        <tr class="value_span10-1">
            <th>Rep ID</th>
            <th>Rep</th>
            <th>Raw</th>
            <th>Unique</th>
            <th>Free Sign Ups</th>
            <th>Pending Conversions</th>
            <th>Conversions</th>
            <th class=" headers ">Sales Revenue</th>
            <th class="  ">Deductions</th>
            <th>EPC</th>
            <th>Bonus Revenue</th>
            <th>Referral Revenue</th>
            <th>TOTAL</th>
        </tr>
        </thead>
        <tbody>
        @php
            $reporter->between($dates['startDate'], $dates['endDate'],
            new \LeadMax\TrackYourStats\Report\Formats\HTML(true, [
                'idrep',
                'user_name',
                'Clicks',
                'UniqueClicks',
                'FreeSignUps',
                'PendingConversions',
                'Conversions',
                'Revenue',
                'Deductions',
                'EPC',
                'BonusRevenue',
                'ReferralRevenue',
                'TOTAL'
            ]));
        @endphp
        </tbody>
    </table>
@endsection

@section('footer')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#mainTable").tablesorter(
                {
                    sortList: [[7, 1]],
                    widgets: ['staticRow']
                });
        });
    </script>
@endsection
