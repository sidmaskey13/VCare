@extends('dashboard')
@section('contents')

    <link rel="stylesheet" href="lightbox.css" />
    <script src="lightbox.js"></script>
    <h2>All Report Details</h2><br>

        <table border="1" class="table">
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Action</th>
                {{--<th>Action</th>--}}
            </tr>
            @foreach($reports as $report)
            <tr>
                <td>{{$report->title}}</td>
                <td>
                    @php $rep_imgs = App\Image::where('report_id',$report->id)->get(); @endphp
                    <div class="row">
                        <div class="row">
                        @foreach($rep_imgs as $images)

                            <a href="{{asset('images/galleryimage'.'/'.$images->image)}}"  data-lightbox="images">
                                <img src="{{asset('images/galleryimage'.'/'.$images->image)}}" height="200px" width="250px" >
                            </a>

                    @endforeach
                        </div>
                    </div>
                </td>
                <td><form method="POST" action="{{route('report.destroy',$report->id)}}" class="inline-form">
                        {{method_field('Delete')}}
                        {{csrf_field()}}
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

    <script
            src="https://code.jquery.com/jquery-2.2.4.js"
            integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
            crossorigin="anonymous"></script>
@endsection