@extends('admin.dashboard.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button type="button" class="btn btn-info float-left" data-toggle="modal" data-target="#requestModal">
                            Add Product
                        </button>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{ Form::open(['route' => 'admin.product.store','method' => 'post','id' => 'product_form','files' => true]) }}
    <div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md">
                        {{ Form::label('Name') }}
                        {{ Form::text('name', null, ['placeholder' => 'Enter Name', 'class' => 'form-control', 'id' => 'name']) }}
                        @error('name')
                        <span class="text-danger" id="nameError">{{ $message }}</span>
                        @enderror
                        </br>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        {{ Form::submit('submit', ['name' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary']) }}
                        <a href="{{ route('admin.product.index') }}" class="btn btn-danger">
                            Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}

</div>
@endsection


@push('scripts')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="{{ asset('admin/assets/js/sweetalert.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#product_form").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 225,
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
                        window.location = "/admin/product";
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