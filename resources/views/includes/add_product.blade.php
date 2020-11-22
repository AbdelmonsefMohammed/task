<!-- Add -->
<div class="modal fade" id="addNewProduct">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add Product</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal product_form" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="name" name="name" required>
                                <span id="nameError" class="alert-message"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-sm-3 control-label">Price</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="number" class="form-control timepicker" id="price" name="price" required>
                                <span id="priceError" class="alert-message"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="main_image" class="col-sm-3 control-label">Main Image</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="file" class="form-control" id="main_image" name="main_image" required>
                                <span id="mainImageError" class="alert-message"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="multiple_image" class="col-sm-3 control-label">Multible Images</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="file" class="form-control timepicker" id="multiple_image" name="multiple_image[]" multiple>
                                <span id="multibleImageError" class="alert-message"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">description</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <textarea name="description" id="description" cols=52" rows="3" required></textarea>
                                <span id="descriptionError" class="alert-message"></span>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

