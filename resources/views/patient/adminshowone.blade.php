@extends('dashboard')
@section('contents')
    <a class="btn btn-primary" href="{{url('allpatients')}}">Back</a>
    {{--<div class="container">--}}
        {{--<div class="pull-left image">--}}
            {{--<img src="{{asset('images/galleryimage'.'/'.$patient->image)}}" class="img-circle" alt="User Image" height="100px" width="100px">--}}
            {{--<br><b>{{$patient->name}}</b>--}}
            {{--<br><i class="fa fa-map-marker"></i> {{$patient->address}}--}}
            {{--<br><i class="fa fa-envelope"></i> {{Sentinel::getUser()->email}}--}}
            {{--<br><i class="fa fa-birthday-cake"></i> {{$patient->dob}}--}}
            {{--<br><i class="fa fa-phone"></i> {{$patient->contact}}--}}
            {{--<br><i class="fa fa-dollar"></i> {{$patient->occupation}}--}}
        {{--</div>--}}
        {{--<div>--}}
    {{--</div>--}}
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$patient->name}}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="{{asset('images/galleryimage'.'/'.$patient->image)}}" class="img-circle img-responsive"> </div>


                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td><b>Occupation</b></td>
                                        <td>{{$patient->address}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Date of Birth</b></td>
                                        <td>{{$patient->dob}}</td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td><b>Gender</b></td>
                                        @if($patient->gender==1)
                                            <td>{{'Male'}}</td>
                                        @elseif($patient->gender==2)
                                            <td>{{'Female'}}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td><b>Home Address</b></td>
                                        <td>{{$patient->address}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Occupation</b></td>
                                        <td>{{$patient->occupation}}</td>

                                    </tr>
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td>{{$patient->user->email}}</td>
                                    </tr>
                                    <td><b>Phone Number</b></td>
                                    <td>{{$patient->contact}}</td>

                                    </tr>

                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

