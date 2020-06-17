
@extends('dashboard')

@section('contents')
<div class="container">

    <div class="form-group">
        <form method="POST" action="{{ route('add-work') }}">
            {{@csrf_field()}}
            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <input type="hidden" name="doctor" value="{{Sentinel::getUser()->id}}">
                        <td>Day: <select name="day[]" id="day" class="form-control">
                                <option value="sunday">Sunday</option>
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                            </select>
                        </td>
                        <td>Start Time:<input type="time" class="form-control" id="start_time" name="start_time[]"></td>
                        <td>End Time:<input type="time" class="form-control" id="end_time" name="end_time[]"></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary">Submit</button>
                {{-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" /> --}}
            </div>
        </form>
    </div>
</div>
{{--</body>--}}
{{--</html>--}}

<script>
    $(document).ready(function(){
        var i=1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'"><td>Day: <select name="day[]" id="day" class="form-control">\n'+'<option value="sunday">Sunday</option>\n'+'<option value="monday">Monday</option>\n'+'<option value="tuesday">Tuesday</option>\n'+'<option value="wednesday">Wednesday</option>\n'+'<option value="thursday">Thursday</option>\n'+'<option value="friday">Friday</option>\n'+'<option value="saturday">Saturday</option>\n'+'</select>\n'+'</td><td>Start Time:<input type="time" class="form-control" id="start_time" name="start_time[]"></td><td>End Time:<input type="time" class="form-control" id="end_time" name="end_time[]"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });
    });
</script>

    @endsection
