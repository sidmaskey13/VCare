@extends('dashboard')
@section('contents')
    <h2> All Patients </h2>
    <table border="1" class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            {{--<th>Field</th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach($patients as $patient)
            <tr>
                <td><a href="{{url('/allpatients/'.$patient->id)}}">{{$patient->name}}</a></td>
            </tr>


    @endforeach
        </tbody>
    </table>
@endsection