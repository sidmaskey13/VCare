@extends('dashboard')
@section('contents')
    <h2> My Profile </h2>
    @foreach($doctors as $doctor)

        {{--<div class="pull-left image">--}}
            {{--<img src="{{asset('images/galleryimage'.'/'.$doctor->image)}}" class="img-circle" alt="User Image" height="100px" width="100px">--}}
            {{--<br><b>{{$doctor->name}}</b>--}}
            {{--<br><i class="fa fa-map-marker"></i> {{$doctor->address}}--}}
            {{--<br><i class="fa fa-envelope"></i> {{Sentinel::getUser()->email}}--}}
            {{--<br><i class="fa fa-birthday-cake"></i> {{$doctor->dob}}--}}
            {{--<br><i class="fa fa-phone"></i> {{$doctor->contact}}--}}

        {{--</div>--}}
        {{--<div>--}}
            {{--<a href="{{route('doctor.edit',$doctor->id)}}" class="fa fa-pencil" aria-hidden="true">Edit</a><br>--}}
        {{--</div>--}}

        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$doctor->name}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="{{asset('images/galleryimage'.'/'.$doctor->image)}}" class="img-circle img-responsive"> </div>


                                <div class=" col-md-9 col-lg-9 ">
                                    <table class="table table-user-information">
                                        <tbody>
                                        <tr>
                                            <td><b>Field</b></td>
                                            <td>{{$doctor->field->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Date of Birth</b></td>
                                            <td>{{$doctor->dob}}</td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <td><b>Gender</b></td>
                                            @if($doctor->gender==1)
                                            <td>{{'Male'}}</td>
                                            @elseif($doctor->gender==2)
                                            <td>{{'Female'}}</td>
                                                @endif
                                        </tr>
                                        <tr>
                                            <td><b>Home Address</b></td>
                                            <td>{{$doctor->address}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Nationality</b></td>
                                            <td>{{$doctor->citizenship}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Status</b></td>
                                            @if($doctor->status==1)
                                                <td>{{'Single'}}</td>
                                            @elseif($doctor->status==2)
                                                <td>{{'Married'}}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td><b>Email</b></td>
                                            <td>{{$doctor->user->email}}</td>
                                        </tr>
                                        <td><b>Phone Number</b></td>
                                        <td>{{$doctor->contact}}</td>

                                        </tr>

                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="{{route('doctor.edit',$doctor->id)}}" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">Edit</a>
                            <span class="pull-right">


                        </span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    @endforeach
@endsection