@extends('report.template')

@section('report-title')
    Daily Reports
@endsection


@section('table-options')
    @include('report.options.dates')
@endsection

@section('table')
    <table class="table table-striped table_01 tablesorter" id="mainTable">
        <thead>
        <tr class="value_span10-1">
            <th>Date</th>
            <th>Raw</th>
            <th>Unique</th>
            <th>Free Sign Ups</th>
            <th>Pending Conversions</th>
            <th>Conversions</th>
            <th>Revenue</th>
            <th>Deductions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($report as $row)
            <tr>
                <td>{{$row['aggregate_date']}}</td>
                <td>{{$row['clicks']}}</td>
                <td>{{$row['unique_clicks']}}</td>
                <td>{{$row['free_sign_ups']}}</td>
                <td>{{$row['pending_conversions']}}</td>
                <td>{{$row['conversions']}}</td>
                <td>{{$row['revenue']}}</td>
                <td>{{$row['deductions']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

