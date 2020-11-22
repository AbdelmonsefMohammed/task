<!-- jQuery 3 -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- DataTables -->
<script>
    $(document).ready(function() {
        $('#example1').DataTable();
        
        $(".product_form").on('submit',function(e) {
        e.preventDefault();
        $('#nameError').text('');
        $('#priceError').text('');
        $('#mainImageError').text('');
        $('#multibleImageError').text('');
        $('#descriptionError').text('');
        $.ajax({
            url: '/products',
            type: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
            if (data.success === true) {
                $('#ajaxcontent').load(location.href + ' #ajaxcontent');
                $('#addNewProduct').modal('hide');
            }
            },error: function (data) {
                $('#nameError').text(data.responseJSON.errors.name);
                $('#priceError').text(data.responseJSON.errors.price);
                $('#mainImageError').text(data.responseJSON.errors.main_image);
                $('#multibleImageError').text(data.responseJSON.errors.multiple_image);
                $('#descriptionError').text(data.responseJSON.errors.description);
            }
        })

        });
    });
</script>
