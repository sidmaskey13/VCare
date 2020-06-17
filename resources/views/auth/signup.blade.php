
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="signup-box">
                <h1>Registration</h1>

                <form method="POST" action="{{route('sign-up')}}">
                    {{csrf_field()}}
                    <hr>
                    <div class="accounttype">
                        <input type="radio" value="0" id="radioOne" name="account" checked/>
                        <label for="radioOne" class="radio">Patient</label>
                        <input type="radio" value="1" id="radioTwo" name="account" />
                        <label for="radioTwo" class="radio">Doctor</label>
                        <input type="radio" value="2" id="radioTwo" name="account" />
                        <label for="radioTwo" class="radio">Admin</label>
                    </div>
                    <hr>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"><i class="icon-envelope "></i></span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="email" id="email" placeholder="Email"  required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"><i class="icon-shield "></i></span>
                        </div>
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control" required/>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"><i class="icon-shield "></i></span>
                        </div>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Conform Password" required/>

                    </div>


                    <p>By clicking Register, you agree on our <a href="#">terms and condition</a>.</p>
                    <button type="submit" class="btn btn-success">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
