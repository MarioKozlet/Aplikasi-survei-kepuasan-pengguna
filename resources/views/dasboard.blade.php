@extends('main.app')

@section('title', 'dashboard')


@section('content')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h4 class="card-title"><strong>Hai !</strong></h4>
                                <p class="mb-4">
                                    Selamat datang di halam dashboard
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="../assets/img/illustrations/girl-doing-yoga-light.png" height="140"
                                    alt="View Badge User" data-app-dark-img="illustrations/girl-doing-yoga-dark.png"
                                    data-app-light-img="illustrations/girl-doing-yoga-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

@endsection
