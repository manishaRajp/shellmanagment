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
        // delete 
        // $(document).on('click', '.delete_product', function() {
        //     var id = $(this).data('id');
        //     swal({
        //         title: "Do u want to delete Records !",
        //         icon: "warning",
        //         buttons: true,
        //         dangerMode: true,
        //     }).then((willDelete) => {
        //         if (willDelete) {
        //             $.ajax({
        //                 url: "{{ route('admin.delete_product') }}",
        //                 type: "get",
        //                 data: {
        //                     id: id,
        //                 },
        //                 dataType: "json",
        //                 success: function(data) {
        //                     if (data) {
        //                         swal("Deleted !", "Your Records are deleted.",
        //                             "success");
        //                         window.LaravelDataTables["product-table"].draw();
        //                     }
        //                 }
        //             });
        //         } else {
        //             swal("Cancelled", "Your Recoder is safe :)", "error");
        //         }
        //     });
        // });
    </script>
@endpush
