@extends('dashboard')
@section('contents')
    <h2>Edit Form</h2>
    <form method="POST" action="{{route('patient.update',$patient->id)}}" enctype="multipart/form-data">
        {{@csrf_field()}}
        {{method_field('PUT')}}
        <div class="row">
            <div class="col-sm-6">
                <label for="name">Full Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name" value="{{$patient->name}}">
            </div>
            <div class="col-sm-6">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" value="{{$patient->address}}">
            </div>
        </div>
        <br>



        <div class="row">
            <div class="col-sm-6">
                <label for="occupation">Occupation:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Occupation" name="occupation" value="{{$patient->occupation}}">
            </div>
            <div class="col-sm-6">
                <label for="contact">Contact No:</label>
                <input class="form-control" type="text" name="contact" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" value="{{$patient->contact}}">
            </div>
        </div>
        <br>


        <div class="row">
            <div class="col-sm-6">
                <label for="dob">Date of Birth:</label><br>
                <input id="dob" type="date" name="dob" placeholder="dd/mm/yyyy" value="{{$patient->dob}}">
            </div>
            <div class="col-sm-6">
                <label for="gender">Gender:</label><br>
                <table>

                    <tr>
                        <td><input type="radio" value="1" id="radioOne" name="gender" @if($patient->gender==1) checked @endif></td>
                        <td><label for="radioOne" class="radio">Male</label></td>
                    </tr>
                    <tr>
                        <td><input type="radio" value="2" id="radioTwo" name="gender" @if($patient->gender==2) checked @endif></td>
                        <td><label for="radioTwo" class="radio">Female</label></td>
                    </tr>
                    <tr>
                        <td><input type="radio" value="3" id="radioTwo" name="gender" @if($patient->gender==3) checked @endif></td>
                        <td><label for="radioTwo" class="radio">Other</label></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="form-group">
            <label for="image">Profile Image:</label>
            <img  src="{{asset('images/GalleryImage').'/'.$patient->image}}" height="100px " width="100px">
            <input type="file" name="image" class="form-control" id="image" >
            <input type="hidden" name="oldimage" value="{{$patient->image}}">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>
@endsection