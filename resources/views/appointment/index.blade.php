@extends('dashboard')
@section('contents')
    <h2>Appointment Detail</h2><br>
    @foreach($appointments as $appointment)

        <div class="cards">

        @if($appointment->status==1)
            <i style="color:green; background-color: greenyellow; padding: 3px;">{{'Approved'}}</i><br>
        @elseif($appointment->status==0)
            <i style="color:white; background-color: grey;  padding: 3px;">{{'Waiting Approval'}}</i><br>
        @elseif($appointment->status==2)
            <i style="color:white; background-color: red;  padding: 3px;">{{'Rejected'}}</i><br>
        @else
            <i> {{'Error'}}</i>
        @endif

        {{--Field of Specialization:{{$appointment->field}}<br>--}}
            <table border="1 solid black" class="table table-responsive" style="margin: 5px">
            <tr>
                <td><b>Doctor Name</b></td>
                <td>Dr.{{$appointment->doctor->name}}</td>
            </tr>
                <tr>
                    <td><b>Appointment Date</b></td>
                    <td>{{date('d M Y', strtotime($appointment->date))}}</td>
                </tr>
                <tr>
                    <td><b>Reason for appointment</b></td>
                    <td>{{$appointment->purpose}}</td>
                </tr>
                <tr>
                    <td><b>Previous Diagnosis Detail</b></td>
                    <td>{{$appointment->diagnosis}}</td>
                </tr>
                @if($appointment->image!=0)
                <tr>
                    <th>Image</th>
                    <td><img src="{{asset('images/galleryimage'.'/'.$appointment->image)}}" class="img-responsive" height="200px" width="150px"></td>

                </tr>
                    @endif
            </table>
        {{--Doctor Name:Dr.{{$appointment->doctor->name}}<br>--}}
        {{--Appointment Date:<b>{{date('d M Y', strtotime($appointment->date))}}</b><br>--}}
        {{--Reason for appointment:<b>{{$appointment->purpose}}</b><br>--}}
        {{--Previous Diagnosis Detail:<b>{{$appointment->diagnosis}}</b><br>--}}
        {{--Images:<b>{{$appointment->image}}</b><br>--}}
        @if($appointment->message!=NULL)
            <u style="color: darkred;">Message::{{$appointment->message}}<br></u>
        @endif
        @if($appointment->status==2)
            <form method="POST" action="{{route('appointment.destroy',$appointment->id)}}" class="inline-form">
                {{method_field('Delete')}}
                {{csrf_field()}}
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        @endif
        @if($appointment->status==1)
        @foreach($approved as $a)

            @if($a->appointment_id==$appointment->id)
                <div class="approved">
                    <h5 style="color: darkred;">Visit at:</h5>
                    <p style="background-color: #EEFFF9">
                      Time:{{$a->time}}<br>
                        Date:{{date('d M Y', strtotime($a->date))}}<br>
                    </p>
                    <button class="btn btn-success"><i class="fa fa-video-camera" aria-hidden="true"></i> Go Live</button>
                </div>
            @endif

        @endforeach
        @endif
        </div>
    @endforeach

@endsection