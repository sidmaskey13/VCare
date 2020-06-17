@extends('dashboard')
@section('contents')
    <a class="btn btn-primary" href="{{url('alldoctors')}}">Back</a>
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


                </div>
            </div>
        </div>
    </div>
@endsection
