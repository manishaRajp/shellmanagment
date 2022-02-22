@extends('admin.dashboard.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Order-Details List</h1>
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
<script src="{{ asset('admin/dist/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/dist/js/dataTables.bootstrap4.min.js') }}"></script>
{!! $dataTable->scripts() !!}
@endpush
