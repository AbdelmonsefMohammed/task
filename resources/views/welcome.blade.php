@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section id="ajaxcontent" class="content">
        <h1 style="text-align: center">Products</h1>
        <hr>
        @include('includes.messages')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border" style="margin-bottom: 20px">
                        <a href="#addNewProduct" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th> Name </th>
                                <th>Price</th>
                                <th>Main Image</th>
                                <th>Multiple Images</th>
                                <th>Description</th>
                                <th>Tools</th>
                            </thead>
                            <tbody style="text-align: center">
                                @foreach($products as $product)
                                <tr id="row_{{$product->id}}">
                                    <td> {{$product->name}} </td>
                                    <td>{{'$' . number_format($product->price, 2)}} </td>
                                    <td>
                                        <img src="{{asset('/images/' . $product->main_image)}}" style="height:80px;width:80px">
                                    </td>
                                    <td>
                                    @if (isset($product->multiple_image))
                                    @foreach (json_decode($product->multiple_image) as $image)
                                        <img src="{{asset('/images/' . $image)}}" style="height:80px;width:80px">
                                    @endforeach
                                    @endif
                                    </td>
                                    <td> {{$product->description}} </td>
                                    <td>
                                        <a href="#show{{$product->id}}" data-toggle="modal" class="btn btn-info btn-sm edit btn-flat"><i class='fa fa-edit'></i> Show</a>
                                        <a href="#edit{{$product->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                        <a href="#delete{{$product->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@foreach($products as $product)
@include('includes.edit_delete_product')
@include('includes.show_product')
@endforeach

@include('includes.add_product')

@endsection