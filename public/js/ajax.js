$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

// alert('ajax called');
    $('#field').change(function () {
// $(document).on('change','#menu',function () {
        var Id = $(this).val();
        // alert('in menu');
        $.get('/ajax/' + Id, function (data) {
            var row = '<select class="select-op" name="doctor" id="doctor">' + '<option selected disabled>Select Doctor</option>';
            if (data.length == 0)
                row = '<select class="select-op" name="doctor" id="doctor">' + '<option selected disabled>No Doctor</option>';
            data.forEach(function (doctor) {
                row += '<option value=' + doctor.id + '>' + doctor.name + '</option>';
            });
            $("#doctor").replaceWith(row + "</select>");
        });
    });
});