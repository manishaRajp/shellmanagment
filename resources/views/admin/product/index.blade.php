@extends('admin.dashboard.layouts.master')
@section('content')
    <style>
        .error {
            color: red;
        }

    </style>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <button type="button" class="btn btn-info float-left" data-toggle="modal"
                                data-target="#product_Modal" id="productbutton">
                                Add Product
                            </button>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="col-md-12 table-responsive">
                                    {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Add Model --}}
        <div class="modal fade" id="product_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="mediumBody">
                        <div>
                            {{ Form::open(['id' => 'product_form']) }}
                            <div class="row">
                                <div class="col-md">
                                    {{ Form::label('Name') }}
                                    {{ Form::text('name', null, ['placeholder' => 'Enter Name', 'class' => 'form-control', 'id' => 'name']) }}
                                    @error('name')
                                        <span class="text-danger" id="nameError">{{ $message }}</span>
                                    @enderror
                                    </br>
                                </div>
                                <div class="col-md">
                                    {{ Form::label('Price') }}
                                    {{ Form::text('price', null, ['placeholder' => 'Enter price', 'class' => 'form-control', 'id' => 'price']) }}
                                    @error('price')
                                        <span class="text-danger" id="priceError">{{ $message }}</span>
                                    @enderror
                                    </br>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    {{ Form::submit('submit', ['name' => 'submit', 'id' => 'productbutton', 'class' => 'btn btn-primary']) }}
                                    <a href="{{ route('admin.product.index') }}" class="btn btn-danger">
                                        Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
        {{-- Edit Model --}}
        <div class="modal fade" id="product_edit_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="mediumBody">
                        <div>
                            {{ Form::model($product, ['id' => 'edit_category', 'enctype' => 'multipart/form-data', 'novalidate' => true]) }}
                            <div class="row">
                                <div class="col-md">
                                    {{ Form::label('Name') }}
                                    {{ Form::text('name', null, ['placeholder' => 'Enter Name', 'class' => 'form-control', 'id' => 'name']) }}
                                    @error('name')
                                        <span class="text-danger" id="nameError">{{ $message }}</span>
                                    @enderror
                                    </br>
                                </div>
                                <div class="col-md">
                                    {{ Form::label('Price') }}
                                    {{ Form::text('price', null, ['placeholder' => 'Enter price', 'class' => 'form-control', 'id' => 'price']) }}
                                    @error('price')
                                        <span class="text-danger" id="priceError">{{ $message }}</span>
                                    @enderror
                                    </br>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    {{ Form::submit('submit', ['name' => 'submit', 'id' => 'editbutton', 'class' => 'btn btn-primary']) }}
                                    <a href="{{ route('admin.product.index') }}" class="btn btn-danger">
                                        Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="{{ asset('admin/dist/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/dataTables.bootstrap4.min.js') }}"></script>
    {!! $dataTable->scripts() !!}
    <script>
         
        $(document).on('click', '.edit_product', function(e) {
            var id = $(this).data('id');
             $('#product_edit_Modal').modal('show');
            
        });

        $('#productbutton').on('click', function() {
            $('#product_form').trigger('reset');
            $('.form-control').removeClass('is-valid');
        })
        $(document).ready(function() {

            $("#product_form").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 225,
                    },
                    price: {
                        required: true,
                        digits: true,
                        maxlength: 2,
                    },
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $(document).find('.text-danger').remove();
                    var formdata = new FormData(form);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "post",
                        url: "{{ route('admin.product.store') }}",
                        data: formdata,
                        dataType: 'JSON',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            $('#product_Modal').modal('hide');
                            $('#product-table').DataTable().ajax.reload();
                        },
                        error: function(error) {
                            $.each(error.responseJSON.errors, function(key, value) {
                                $('#' + key).after('<span class="text-danger">' +
                                    value +
                                    '</span>')
                            });
                        }
                    });
                }
            });
        });
    </script>
@endpush
