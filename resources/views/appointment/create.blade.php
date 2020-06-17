@extends('dashboard')
@section('contents')

    <div class="container">
        <h2>Appointment Form</h2>
        <form method="POST" action="{{route('add-appointment')}}" enctype="multipart/form-data">
            {{@csrf_field()}}
            <br>
            <div class="row">
                <div class="col-md-6"> <div class="form-group">
                        <label for='field'>Doctor's Fields:</label>

                        <select name="field" id="field" class="select-op">
                            <option value="selected">Select Field</option>
                            @foreach($field as $d)
                                <option value="{{$d->id}}">{{$d->name}}</option>
                            @endforeach
                        </select>
                    </div></div>
                <div class="col-md-6"> <div class="form-group">
                        <label for='doctor'>Available Doctors:</label>
                        <select id='doctor' name="doctor" class="select-op">
                            <option selected>Select Doctor</option>

                        </select>
                    </div></div>
            </div>



            <div class="form-group">
                    <label for='aptDate'>Date:             </label>

                        <input type=date id='date' name="date" min="{{date('Y-m-d')}}"/>
                    {{--Time:--}}
                        {{--<input type=time id='time' name="time" required />--}}
            </div>
  <div class="row">
      <div class="col-md-6"><div class="form-group">
              <label for='purpose'>What is the purpose of your visit?</label><br />
              <textarea rows="5" cols="50" placeholder='Tell us why you want to see the doctor.' name="purpose"></textarea>
          </div></div>
      <div class="col-md-6"><div class="form-group">
              <label for='diagnosis'>If Patient have a diagnosis,Please describe:</label><br />
              <textarea rows="5" cols="50" placeholder='Tell us about your previous diagnosis.' name="diagnosis"></textarea>
          </div></div>
  </div>


            @php
            $p_id=Sentinel::getUser()->id;
            $pat=App\Patient::where('user_id',$p_id)->first()->id;
            @endphp
            <input type="hidden" name="patient" value="{{$pat}}">



            <div class="form-group">
                <label for="report">Report:</label>
                @if(count($report)>0)
                <select name="report" id="report" class="select-op">

                    <option value="selected">Select Report</option>
                @foreach($report as $d)
                    <option value="{{$d->id}}">{{$d->title}}</option>
                @endforeach
                        @else
                        {{'No report created'}}
                        @endif
                </select>
            </div>


            <div class="form-group">
                <input type='submit' value='Schedule Appointment' class="button"/>
            </div>

    </form>
</div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="{{asset('js\ajax.js')}}"></script>
@endsection

