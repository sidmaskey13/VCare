@extends('dashboard')
@section('contents')
    <h2> My Profile </h2>
    @foreach($patients as $patient)
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
                        <div class="panel-footer">
                            <a href="{{route('patient.edit',$patient->id)}}" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">Edit</a>
                            <span class="pull-right">


                        </span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
