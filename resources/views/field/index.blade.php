@extends('dashboard')
@section('contents')
    <h2>All Fields</h2>
    <table class="dtable table table-striped"  border="2" id="myTable" >
        <thead>
        <tr>
            <th >S/N</th>
            <th>Field</th>
            <th>Action</th>


        </tr>
        </thead>
        @php
            $c=1;
        @endphp
        @foreach($fields as $field)
            <tr>
                <td>{{$c++}}</td>
                <td>{{$field->name}}</td>
                <td>
                    <a href="{{route('field.edit',$field->id)}}" class="btn btn-success">Edit</a><br>
                    <form   method="POST" action="{{route('field.destroy',$field->id)}}" class="inline-form">
                        {{method_field('Delete')}}
                        {{csrf_field()}}
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </td>
            </tr>


        @endforeach
    </table>

@endsection