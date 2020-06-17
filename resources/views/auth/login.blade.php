
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="login-box">
                            <h1>Login</h1>

                            <form method="POST" action="{{route('log-in')}}">
                                {{csrf_field()}}

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




                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>


        </div>
    </div>
@endsection
