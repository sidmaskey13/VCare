@extends('dashboard')

@section('contents')

    <div class="panel panel-primary">
        <div class="panel-body">
            <form action="{{url('/work/'.$work->id)}}" method="POST" enctype="multipart/form-data">

                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="title">Title</label>

                    <td>Day: <select name="day" id="day" class="form-control" value="{{$work->day}}">
                            <option value="sunday" @if($work->day == "sunday") selected @endif>Sunday</option>
                            <option value="monday" @if($work->day == "monday") selected @endif>Monday</option>
                            <option value="tuesday" @if($work->day == "tuesday") selected @endif>Tuesday</option>
                            <option value="wednesday" @if($work->day == "wednesday") selected @endif>Wednesday</option>
                            <option value="thursday" @if($work->day == "thursday") selected @endif>Thursday</option>
                            <option value="friday" @if($work->day == "friday") selected @endif >Friday</option>
                            <option value="saturday" @if($work->day == "saturday") selected @endif>Saturday</option>
                        </select>
                    </td>
                </div>
                <input type="hidden" name="doctor" value="{{$work->doctor_id}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="start_time">Start Time</label>
                            <input type="time" class="form-control" id="start_time" name="start_time" value="{{$work->time_end}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="end_time">End Time</label>
                            <input type="time" class="form-control" id="end_time" name="end_time" value="{{$work->time_start}}">
                        </div>
                    </div>
                </div>

                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Send">
                </div>
            </form>
        </div>
    </div>
@endsection
