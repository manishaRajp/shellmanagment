@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="flex-col my-auto">
            <h6 class="ml-auto mr-3">
                <h3>View Details</h3>
            </h6>
        </div>
        <div class="container-fluid my-5 d-sm-flex justify-content-center ">
            <div class="card px-2" id='mycard'>
                <div class="card-header bg-white">
                    <div class="row justify-content-between">
                        <div class="col">
                            <p class="text-muted"> Order ID <span
                                    class="font-weight-bold text-dark">{{ $order_show->order_id }}</span>
                            </p>
                            <p class="text-muted"> Place On <span
                                    class="font-weight-bold text-dark">{{ $order_show->created_at->diffForHumans() }}</span>
                            </p>
                        </div>
                        <div class="flex-col my-auto">
                            <h6 class="ml-auto mr-3"> </h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media flex-column flex-sm-row">
                        <div class="media-body ">
                            <h5 class="bold">{{ $order_show->product->name }}</h5>
                            <p class="text-muted"> Qt: {{ $order_show->quantity }}</p>
                            <h4 class="mt-3 mb-4 bold"> <span class="mt-5">&#x20B9;</span>
                                {{ $order_show->total_price }} <span class="small text-muted"> via (COD) </span></h4>
                            <p class="text-muted">Tracking Status on: <span
                                    class="Today">{{ $order_show->created_at->format('d M D Y H:i:s') }}</span>
                            </p> <button type="button" class="btn btn-outline-primary d-flex">Reached Hub, Delhi</button>
                        </div><img class="align-self-center img-fluid"
                            src="{{ asset('storage/ProductImage/' . $order_show->product->image) }}" width="180 "
                            height="180">
                    </div>
                </div>
                <div class="row px-3">
                    <div class="col">
                        <ul id="progressbar">
                            <li class="step0 active " id="step1">PLACED</li>
                            <li class="step0 active text-center" id="step2">SHIPPED</li>
                            <li class="step0 text-muted text-right" id="step3">DELIVERED</li>
                        </ul>
                    </div>
                </div>
                <div class="card-footer bg-white px-sm-3 pt-sm-4 px-0">
                    <div class="row text-center ">
                        <div class="col my-auto border-line ">
                            <h5>Track</h5>
                        </div>
                        <div class="col my-auto border-line ">
                            <h5>Cancel</h5>
                        </div>
                        <div class="col my-auto border-line ">
                            <h5>Pre-pay</h5>
                        </div>
                        <div class="col my-auto mx-0 px-0 "><img class="img-fluid cursor-pointer"
                                src="https://img.icons8.com/ios/50/000000/menu-2.png" width="30" height="30"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
