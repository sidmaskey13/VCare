@extends('dashboard')

@section('contents')

    <div class="container">
        <h1>All Works</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="panel panel-primary">
            <div class="panel-body">

                <table border="2" class="table table-striped">
                    <thead>
                    <tr>
                        <th >Day</th>
                        <th >Time Start</th>
                        <th >Time End</th>
                        <th >Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($work as $w)
                        <tr>
                            <td>{{$w->day}}</td>
                            <td>{{$w->time_start}}</td>
                            <td>{{$w->time_end}}</td>
                             <td>
                                 <form method="POST" action="{{route('work.destroy',$w->id)}}">
                                     {{method_field('Delete')}}
                                     {{csrf_field()}}
                                     <input type="submit" class="btn btn-danger" value="Delete">
                                 </form>
                                <input type="button" class="btn btn-success" onclick="location.href='{{URL::to('/work/'.$w->id.'/edit')}}';" value="Edit" />
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection

