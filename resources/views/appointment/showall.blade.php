@extends('dashboard')
@section('contents')
    <h2>Pending Appointment Details</h2><br>



    @foreach($appointments as $a)
        @if ($a->status==0)
            <div class="cards">

            <table class="table" border="1">
                <tr>
                    <th>Patient Name</th>
                    <td>{{$a->patient->name}}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{date('d M Y', strtotime($a->date))}}</td>
                </tr>
                <tr>
                    <th>Purpose</th>
                    <td>{{$a->purpose}}</td>
                </tr>
                <tr>
                    <th>Self-diagnosis</th>
                    <td>{{$a->diagnosis}}</td>
                </tr>
                @if($a->report_id!=0)
                <tr>
                    <th>Report</th>
                    @php
                        $rep=App\Report::where('id',$a->report_id)->get();
                        $img=App\Image::where('report_id',$a->report_id)->get();
                    @endphp
                    <td>
                    <div class="row">
                        @foreach($img as $i)
                            <a href="{{asset('images/galleryimage'.'/'.$i->image)}}"  data-lightbox="images">
                                <img src="{{asset('images/galleryimage'.'/'.$i->image)}}" height="200px" width="250px" >
                            </a>
                        @endforeach
                    </div>
                    </td>
                </tr>
                    @endif
            </table>

            <div class="container">
                <form action="{{url('/myappointment/'.$a->id)}}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="appointment" value="{{$a->id}}">
                    Action:<select name="approve" class="form-control">
                        <option disabled>Select One</option>
                        <option value="1">Accept</option>
                        <option value="2">Reject</option>
                    </select><br><br>
                    <div class="row">

                        <div class="col-md-4"> Time:<input type="time" name="time" class="form-control"></div>
                        <div class="col-md-4"> Date:<input type="date" name="date" class="form-control"></div>

                    </div>
                    <div class="row">
                        <div class="col-md-6"> Remarks (For myself):<textarea type="text" name="remarks" class="form-control"></textarea></div>
                        <div class="col-md-6"> Message (For patient):<textarea name="message" class="form-control"></textarea></div>
                    </div>
                    <br>




                    <input type="submit" class="btn btn-success" value="Send">
                </form>
            </div>
            </div>
        @endif



    @endforeach
@endsection