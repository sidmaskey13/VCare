@extends('dashboard')
@section('contents')
    <h1>All Emergencies</h1>

    @foreach($emergency as $e)
        @if($e->status==NULL)
        <div class="cards">
<div class="row">
    <div class="col-md-6">
        <table border="1" style="width:100%">
            <tr>
                <th>Name</th>
                <td>{{$e->patient->name}}</td>
            </tr>

            <tr>
                <th>Message</th>
                <td>
                    {{$e->message}}<br>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <form action="{{url('/emergency/'.$e->id)}}" method="POST">
            {{csrf_field()}}
            Action:
            <select name="approve" class="form-control">
                <option disabled>Select One</option>
                <option value="1">Accept</option>
                <option value="2">Reject</option>
            </select><br>
            <input type="submit" class="btn btn-success" value="Send">
        </form>
    </div>
</div>

        </div>
            @else
            {{'No Emergencies'}}
@endif
    @endforeach
@endsection

