@extends('dashboard')
@section('contents')
    <h2>Please Add Special field.</h2>
    <form method="POST" action="{{route('add-field')}}">
        {{@csrf_field()}}
        <div class="table-responsive">
            <table class="table table-bordered" id="dynamic_field">
                <tr>
{{--                    <input type="hidden" name="name" value="{{Sentinel::getUser()->id}}">--}}
                    <td>Add Field:<input type="text" class="form-control" id="name" name="name[]"></td>
                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary">Submit</button>
            {{-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" /> --}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label for="field">Enter Field:</label>--}}
            {{--<input type="text" class="form-control" id="name" placeholder="Enter your field" name="name" required>--}}
        {{--</div>--}}
        {{--<div>--}}
            {{--<button type="submit" class="btn btn-primary">Add</button>--}}
        {{--</div>--}}
    </form>
    <script>
        $(document).ready(function(){
            var i=1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"><td>Add Field:<input type="text" class="form-control" id="name" name="name[]"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });
        });
    </script>
@endsection