@extends('layout.app')
@section('head')
    <script src="https://cdn.tiny.cloud/1/cbemt04d968x78dmhrncytn009vdir8zf1qdd5iutof3bnbd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
@section('body')

<div class="card mx-auto" style="width: 800px">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h4>Car Details</h4>
            <a id="editButton" class="btn btn-outline-primary showSection">Edit</a>
            <div class="editSection" style="display: none;">
                <a id="cancelButton" class="btn btn-outline-secondary">Cancel</a>
                <a id="saveButton" class="btn btn-outline-primary">Save</a>
            </div>
        </div>       
    </div>
    <div class="card-body">
        @include('car.details')
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end">
            <a href="{{ route('car.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>
        
</div>

<script>
$( document ).ready(function(){
    $('#editButton').click(() => {
    
        $.ajax("{{ route('car.edit', $car->id) }}",
        {
            success: function (data,status,xhr) {
                $('#showDetails').replaceWith(data);
                $('.showSection').hide();
                $('.editSection').show();
            }, error: function () {
                alert('Error loading form');
            }
        })
    });

    $('#cancelButton').click(() => {
        $.ajax("{{ route('car.details', $car->id) }}",
        {
            success: function (data,status,xhr) {
                $('#editForm').replaceWith(data);
                $('.showSection').show();
                $('.editSection').hide();
            }, error: function () {
                alert('Error loading details');
            }
        })
    });

    $('#saveButton').click(() => {
        $('#errors').empty();
        let comment = tinyMCE.get('comment').getContent();
        let form = $('#editForm');
        $('<input>', {type: 'hidden',name: 'comment',value: comment}).appendTo(form);

        $.ajax({
            type: "PUT",
            url: form.attr('action'),
            data: form.serialize(),
            success: function(data)
            {
                $('#editForm').replaceWith(data);
                $('.showSection').show();
                $('.editSection').hide();
            }, error: function (data) {
                if( data.status === 422 ) {
                    let errors = $.parseJSON(data.responseText);
                    //loop through all errors 
                    $.each( errors.errors, function( key, errorMessages ) {
                        //loop through all messages from the error
                        $.each( errorMessages, function( key, errorMessage ) {
                            $('#errors').prepend(errorMessage + "<br>")
                        });
                    });
                }else {
                    alert('Error saving car');
                }
            }
        })
    });
});
</script>

@endsection