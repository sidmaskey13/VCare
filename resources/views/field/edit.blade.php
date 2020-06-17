@extends('dashboard')
@section('contents')
    <h2>Edit field.</h2>
    <form method="POST" action="{{route('field.update',$field->id)}}">
        {{@csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group">
            <label for="field">Enter Field:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your field" name="name" value="{{$field->name}}">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection