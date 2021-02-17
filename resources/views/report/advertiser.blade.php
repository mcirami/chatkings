@extends('report.template')

@section('report-title')
    Advertiser Reports
@endsection

@section('table-options')
    @include('report.options.dates')
@endsection

@section('table')
    <table class="table table-striped table_01 tablesorter" id="mainTable">
        <thead>
        <tr class="value_span10-1">
            <th>ID</th>
            <th>Name</th>
            <th>Raw</th>
            <th>Unique</th>
            <th>Pending Conversions</th>
            <th>Free Sign Ups</th>
            <th>Conversion</th>
            <th>Revenue</th>
            <th>Deductions</th>
            <th>EPC</th>
            <th>TOTAL</th>
        </tr>
        </thead>
        <tbody>
        @php
            $reporter->between($dates['startDate'],$dates['endDate'], new \LeadMax\TrackYourStats\Report\Formats\HTML(true,[
            'id','name','Clicks','UniqueClicks','PendingConversions','FreeSignUps','Conversions','Revenue','Deductions','EPC','TOTAL'
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
