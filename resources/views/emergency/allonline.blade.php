@extends('dashboard')
@section('contents')
    <h2>Emergency</h2>
    <h5>All Online Doctors</h5>

    @php
        $p_id=Sentinel::getUser()->id;
        $pat=App\Patient::where('user_id',$p_id)->first()->id;
    @endphp

<div class="container">


    <form action="{{route('add-emergency')}}" method="POST">
        {{@csrf_field()}}
<div class="form-group">
    <label for="doctor">Doctor:</label>
    <select name="doctor" id="doctor" class="select-op">
        <option selected>Select Doctor</option>

        @foreach($online as $o)
            <option value="{{$o->id}}">{{$o->name.'('.$o->field->name.')'}}</option>
        @endforeach
    </select>
</div>

        <input type="hidden" name="patient" value="{{$pat}}">
        <input type="hidden" name="date" value="{{date('Y-m-d H:i:s')}}">
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea name="message" id="" cols="30" rows="5"></textarea><br>
        </div>

        <input type="submit" class="btn btn-primary" value="Ask">

    </form>
</div>
@endsection