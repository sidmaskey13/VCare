@extends('layouts.app')
@section('content')
    <div class="container">



    <h2>Please complete the profile.</h2>
    <form method="POST" action="{{route('add-patient')}}" enctype="multipart/form-data">
        {{@csrf_field()}}
        <div class="row">
            <div class="col-sm-6">
                <label for="name">Full Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name" required>
            </div>

            <div class="col-sm-6">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" required>
            </div>
        </div>
        <br>
        <div>
            <input type="hidden" name="patient" value="{{$user->id}}">
        </div>


        <div class="row">
            <div class="col-sm-6">
                <label for="occupation">Occupation:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Occupation" name="occupation" required>
            </div>


            <div class="col-sm-6">
                <label for="contact">Contact No:</label>
                <input class="form-control" type="text" name="contact" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required="" placeholder="Type your Mobile Number...">
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-sm-6">
                <label for="dob">Date of Birth:</label><br>
                <input id="dob" type="date" name="dob" placeholder="dd/mm/yyyy" />
            </div>
            <div class="col-sm-6">
                <label for="gender">Gender:</label>
                <table>
                    <tr>
                        <td><input type="radio" value="1" id="radioOne" name="gender" checked/></td>
                        <td><label for="radioOne" class="radio">Male</label></td>
                    </tr>
                    <tr>
                        <td><input type="radio" value="2" id="radioTwo" name="gender" /></td>
                        <td><label for="radioTwo" class="radio">Female</label></td>
                    </tr>
                    <tr>
                        <td><input type="radio" value="3" id="radioTwo" name="gender" /></td>
                        <td><label for="radioTwo" class="radio">Other</label></td>
                    </tr>
                </table>
            </div>
        </div>


        <div class="form-group">
            <label for="image">Profile Image:</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>


        <div>
             <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

    </div>
@endsection