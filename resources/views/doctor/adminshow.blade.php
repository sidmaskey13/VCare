@extends('dashboard')
@section('contents')
    <h2> All Doctors </h2>
    <table border="1" class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Field</th>
        </tr>
        </thead>
        <tbody>
        @foreach($doctors as $doctor)
    <tr>
        <td><a href="{{url('/alldoctors/'.$doctor->id)}}">{{$doctor->name}}</a></td>
        <td>{{$doctor->field->name}}</td>
    </tr>


    @endforeach
    </tbody>
</table>
@endsection