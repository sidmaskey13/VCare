@extends('dashboard')
@section('contents')
    <h2>All Approved Detail</h2><br>
{{--    {{dd($appointment)}}--}}
@php
$c=1;
@endphp
{{--    {{dd($approved)}}--}}
            @foreach($approved as $a)
<div class="cards1">
            @php
           echo $c.") <br>";
        @endphp
<table class="table table-striped" border="1">
    <tr>
        <td><b>Appointment</b></td>
        <td>{{$a->appointment->patient->name}}</td>
    </tr>
    <tr>
        <td><b>Time</b></td>
        <td>{{$a->time}}</td>
    </tr>
    <tr>
        <td><b>Date</b></td>
        <td>{{date('d M Y', strtotime($a->date))}}</td>
    </tr>
    <tr>
        <td><b>Remarks</b></td>
        <td> {{$a->remarks}}</td>
    </tr>
</table>
        {{--Appointment: {{$a->appointment->patient->name}}<br>--}}
        {{--Time: {{$a->time}}<br>--}}
{{--Date: {{date('d M Y', strtotime($a->date))}}<br>--}}
{{--Remarks: {{$a->remarks}}<br>--}}
{{--<hr>--}}

        @php
            $c++;
        @endphp
</div>
    @endforeach
@endsection