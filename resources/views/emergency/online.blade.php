@extends('dashboard')
@section('contents')
<h2>Emergency</h2>

{{--@if(count($online)>0)--}}
    @foreach($online as $a)
        <div class="cards">

          <table border="1" class="online">
              <tr>
                  <th>Name</th>
                  <th>Field</th>
                  <th>Message</th>
                  <th>Action</th>
              </tr>
              <tr>
{{--              {{$a->email}}--}}
                  <td><h4>{{$a->doctor->name}}</h4></td>
                  {{--<td><h4>{{$a->doctor->field->name}}</h4></td>--}}
{{--@php--}}
    {{--$p_id=Sentinel::getUser()->id;--}}
    {{--$pat=App\Patient::where('user_id',$p_id)->first()->id;--}}
{{--@endphp--}}
                  {{--<form method="POST" action="{{route('add-emergency')}}">--}}
                      {{--{{@csrf_field()}}--}}

                      {{--<input type="hidden" name="date" value="{{date('Y-m-d H:i:s')}}">--}}
                      {{--<input type="hidden" name="patient" value="{{$pat}}">--}}
                      {{--<input type="hidden" name="doctor" value="{{$a->doctor->id}}">--}}

                  {{--<td><textarea name="message" id="" cols="30" rows="10"></textarea></td>--}}

                      {{--<td><button class="btn btn-success">Ask</button>--}}
                  {{--</form>--}}
                   {{--</td>--}}
              </tr>
          </table>
        </div>
    @endforeach
    {{--@else--}}
    {{--{{'No online doctors'}}--}}
    {{--@endif--}}
@endsection