@extends('dashboard')
@section('contents')
    <h2>Add Report Info</h2>
    <form method="POST" action="{{route('add-report')}}" enctype="multipart/form-data">
        {{@csrf_field()}}

        <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="title">
        </div>
        <div class="form-group">
            <label for="">Image</label>
            <input type="file" name="file[]" class="form-control" multiple>

        </div>
        @php
            $p_id=Sentinel::getUser()->id;
            $pat=App\Patient::where('user_id',$p_id)->first()->id;
        @endphp
        <input type="hidden" name="patient" value="{{$pat}}">

        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Submit">
        </div>
    </form>

@endsection