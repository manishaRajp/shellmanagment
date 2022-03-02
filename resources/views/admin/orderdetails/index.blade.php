@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product List</h1>
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

        {{-- show Model --}}
        <div class="modal fade" id="order_show_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            {{ Form::model($productShow, ['id' => 'show_edit']) }}
                            {{ Form::hidden('id', null, ['class' => 'form-control ids']) }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md">
                                        {{ Form::label('product') }}
                                        {{ Form::text('product', null, ['class' => 'form-control', 'id' => 'product', 'readonly']) }}
                                        </br>
                                    </div>
                                    <div class="col-md">
                                        {{ Form::label('Price') }}
                                        {{ Form::text('price', null, ['class' => 'form-control', 'id' => 'p_price', 'readonly']) }}
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
                                <div>
                                    <a href="{{ route('admin.order-details.index') }}" class="btn btn-danger">
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
    <script src="{{ asset('admin/dist/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/dataTables.bootstrap4.min.js') }}"></script>
    {!! $dataTable->scripts() !!}

    <script>
        // $(document).on('click', '.showbtn', function() {
        //     var id = $(this).attr('data-id');
        //     console.log(id);
        //     $('#order_show_Modal').modal('show');
        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         method: "get",
        //         url: "{{ route('admin.order-details.show', 'id') }}",
        //         data: {
        //             id: id,
        //         },
        //         dataType: "JSON",
        //         success: function(response) {
        //             console.log(response);
        //             $('.ids').val(response.data.id);
        //             $('#product').val(response.data.product);
        //             $('#p_price').val(response.data.price);
        //             $('#image').val(response.data.image);
        //         }
        //     });

        // });
    </script>
@endpush
