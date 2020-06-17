
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Please complete your profile.</h2>
    <form method="POST" action="{{route('add-doctor')}}" enctype="multipart/form-data">
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
            <input type="hidden" name="doctor" value="{{$user->id}}">
        </div>
        <br>

        <div class="row">
            <div class="col-sm-2">
                <label for="dob">Date of Birth:</label><br>
                <input id="dob" type="date" name="dob" placeholder="dd/mm/yyyy" />
            </div>
            <div class="col-sm-4">
                <label for="contact">Contact No:</label>
                <input class="form-control" type="text" name="contact" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required="" placeholder="Type your Mobile Number...">
            </div>
            <div class="col-sm-6">
                <label for="citizenship">Citizenship:</label>
                <input type="text" class="form-control" id="citizenship" placeholder="for eg.Nepali" name="citizenship" required/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <label for="status">Marital Status:</label><br>
                <table>
                    <tr>
                        <td><input type="radio" value="1" id="radioOne" name="status" checked/></td>
                        <td><label for="radioOne" class="radio">Single</label></td>
                    </tr>
                    <tr>
                        <td><input type="radio" value="2" id="radioTwo" name="status" /></td>
                        <td><label for="radioTwo" class="radio">Married</label></td>
                    </tr>
                </table>
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
        <br>
        <div class="form-group">
            <label for="field">Field of Specialization:</label>
            <select name="field_id" class="form-control" id="field_id">
                <option selected disabled>Select field</option>
                @foreach($fields as $field)
                    <option value="{{$field->id}}">{{$field->name}}</option>
                @endforeach
            </select>
        </div>
        <br>
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