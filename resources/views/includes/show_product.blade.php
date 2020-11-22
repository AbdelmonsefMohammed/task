<!-- Show -->
<div class="modal fade" id="show{{$product->id}}">
    <div class=" modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Show Product</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="name" name="name" value="{{ $product->name}}" disabled>
                                <span id="nameError" class="alert-message"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-sm-3 control-label">Price</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="number" class="form-control timepicker" id="price" name="price" value="{{ $product->price}}" disabled>
                                <span id="priceError" class="alert-message"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="main_image" class="col-sm-3 control-label">Main Image</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <img src="{{asset('/images/' . $product->main_image)}}" style="height:80px;width:80px">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="multiple_image" class="col-sm-3 control-label">Multible Images</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                @if (isset($product->multiple_image))
                                @foreach (json_decode($product->multiple_image) as $image)
                                    <img src="{{asset('/images/' . $image)}}" style="height:80px;width:80px">
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">description</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <textarea name="description" id="description" cols=52" rows="3" disabled>{{ $product->name}}</textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                </form>
            </div>
        </div>
    </div>
</div>