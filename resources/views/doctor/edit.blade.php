@extends('dashboard')
@section('contents')
    <h2>Edit Form</h2>
    <form method="POST" action="{{route('doctor.update',$doctor->id)}}" enctype="multipart/form-data">
    {{@csrf_field()}}
    {{method_field('PUT')}}
        <div class="row">
            <div class="col-sm-6">
                <label for="name">Full Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name" value="{{$doctor->name}}">
            </div>
            <div class="col-sm-6">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" value="{{$doctor->address}}">
            </div>
        </div>
        <br>
        {{--<div>--}}
            {{--<label for="gender">Gender:</label><br>--}}
            {{--<input type="radio" value="1" id="radioOne" name="gender" @if($doctor->gender==10) selected @endif>--}}
            {{--<label for="radioOne" class="radio">Male</label>--}}
            {{--<input type="radio" value="2" id="radioTwo" name="gender" @if($doctor->gender==2) selected @endif>--}}
            {{--<label for="radioTwo" class="radio">Female</label>--}}
            {{--<input type="radio" value="3" id="radioTwo" name="gender" @if($doctor->gender==3) selected @endif>--}}
            {{--<label for="radioTwo" class="radio">Other</label>--}}
        {{--</div>--}}
        <div class="row">
            <div class="col-sm-2">
                <label for="dob">Date of Birth:</label><br>
                <input id="dob" type="date" name="dob" placeholder="dd/mm/yyyy" value="{{$doctor->dob}}">
            </div>
            <div class="col-sm-4">
                <label for="contact">Contact No:</label>
                <input class="form-control" type="text" name="contact" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required="" placeholder="Type your Mobile Number..." value="{{$doctor->contact}}">
            </div>
            <div class="col-sm-6">
                <label for="citizenship">Citizenship:</label>
                <input type="text" class="form-control" id="citizenship" placeholder="for eg.Nepali" name="citizenship" value="{{$doctor->citizenship}}">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <label for="status">Marital Status:</label><br>
                <table>
                    <tr>
                        <td><input type="radio" value="1" id="radioOne" name="status" @if($doctor->status==1) checked @endif></td>
                        <td><label for="radioOne" class="radio">Single</label></td>
                    </tr>
                    <tr>
                        <td><input type="radio" value="2" id="radioTwo" name="status" @if($doctor->status==2) checked @endif></td>
                        <td><label for="radioTwo" class="radio">Married</label></td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-6">
                <label for="gender">Gender:</label><br>
                <table>
                    <tr>
                        <td><input type="radio" value="1" id="radioOne" name="gender" @if($doctor->gender==10) checked @endif checked/></td>
                        <td><label for="radioOne" class="radio">Male</label></td>
                    </tr>
                    <tr>
                        <td><input type="radio" value="2" id="radioTwo" name="gender" @if($doctor->gender==2) checked @endif></td>
                        <td><label for="radioTwo" class="radio">Female</label></td>
                    </tr>
                    <tr>
                        <td><input type="radio" value="3" id="radioTwo" name="gender" @if($doctor->gender==3) checked @endif></td>
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
                    <option value="{{$field->id}}" @if($field->id==$doctor->field_id) selected @endif>{{$field->name}}</option>
                @endforeach
            </select><br>
        </div>
        <div class="form-group">
            <label for="image">Profile Image:</label>
            <img  src="{{asset('images/GalleryImage').'/'.$doctor->image}}" height="100px " width="100px">
            <input type="file" name="image" class="form-control" id="image" >
            <input type="hidden" name="oldimage" value="{{$doctor->image}}">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection