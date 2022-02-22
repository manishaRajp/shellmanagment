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
                            <div class="col-md">
                                {{ Form::label('Product Image') }}
                                {{ Form::file('image', ['class' => 'form-control', 'id' => 'image']) }}
                                @error('image')
                                    <span class="text-danger" id="imageError">{{ $message }}</span>
                                @enderror
                                </br>
                            </div>
                            <div class="form-group">
                                <div>
                                    {{ Form::submit('submit', ['name' => 'submit', 'id' => 'productbutton', 'class' => 'btn btn-primary']) }}
                                    <a href="{{ route('admin.product.index') }}" class="btn btn-danger"
                                        id="cancle_button">
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
                            {{ Form::model($productedit, ['id' => 'edit_product']) }}
                            {{ Form::hidden('id', null, ['class' => 'form-control ids']) }}
                            <div class="row">
                                <div class="col-md">
                                    {{ Form::label('Name') }}
                                    {{ Form::text('name', null, ['placeholder' => 'Enter Name', 'class' => 'form-control', 'id' => 'pname']) }}
                                    @error('pname')
                                        <span class="text-danger" id="nameError">{{ $message }}</span>
                                    @enderror
                                    </br>
                                </div>
                                <div class="col-md">
                                    {{ Form::label('Price') }}
                                    {{ Form::text('price', null, ['placeholder' => 'Enter price', 'class' => 'form-control', 'id' => 'p_price']) }}
                                    @error('p_price')
                                        <span class="text-danger" id="p_priceError">{{ $message }}</span>
                                    @enderror
                                    </br>
                                </div>
                            </div>
                            <div class="col-md">
                                {{ Form::label('Profile Image') }}
                                {{ Form::file('image', ['class' => 'form-control', 'id' => 'image']) }}
                                @error('image')
                                    <span class="text-danger" id="imageError">{{ $message }}</span>
                                @enderror
                                </br>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {!! $dataTable->scripts() !!}
    <script>
        // Insert 
        $('#cancle_button').click(function(e) {
            e.preventDefault();
            $('#product_Modal').modal('hide');
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
                        maxlength: 225
                    },
                    p_price: {
                        required: true,
                        digits: true,
                        maxlength: 2
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

        // fetch Data 
        $(document).on('click', '.edit_product', function() {
            var id = $(this).attr('data-id');
            console.log(id);
            $('#product_edit_Modal').modal('show');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "get",
                url: "{{ route('admin.product.edit',"id") }}",
                data: {
                    id: id,
                },
                dataType: "JSON",
                success: function(response) {
                    console.log(response.data.name);
                    $('.ids').val(response.data.id);
                    $('#pname').val(response.data.name);
                    $('#p_price').val(response.data.price);
                    $('#image').val(response.data.image);
                }
            });

        });
// update
        $(document).ready(function() {
            $("#edit_product").validate({
                rules: {
                    pname: {
                        required: true,
                        maxlength: 225
                    },
                    p_price: {
                        required: true,
                        digits: true,
                        maxlength: 4
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
                        url: "{{ route('admin.update_product') }}",
                        data: formdata,
                        dataType: 'JSON',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            console.log(response);
                            $('#product_edit_Modal').modal('hide');
                            $('#product-table').DataTable().ajax.reload();
                        },
                        error: function(error) {
                            $.each(error.responseJSON.errors, function(key, value) {
                                $('#' + key).after('<span class="text-danger">' + value +'</span>')
                            });
                        }
                    });
                }
            });
        });

        // delete 
        $(document).on('click', '.delete_product', function() {
            var id = $(this).data('id');
            swal({
                title: "Do u want to delete Records !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{ route('admin.delete_product') }}",
                        type: "get",
                        data: {
                            id: id,
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                swal("Deleted !", "Your Records are deleted.",
                                    "success");
                                window.LaravelDataTables["product-table"].draw();
                            }
                        }
                    });
                } else {
                    swal("Cancelled", "Your Recoder is safe :)", "error");
                }
            });
        });
    </script>
@endpush
