@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Card Border Shadow -->
        <div class="row g-6">
            <div class="col-sm-6 col-lg-3">
                <div class="card card-border-shadow-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded-3 bg-label-primary"><i
                                        class="ri-car-line ri-24px"></i></span>
                            </div>
                            <h4 class="mb-0">42</h4>
                        </div>
                        <h6 class="mb-0 fw-normal">On route vehicles</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card card-border-shadow-warning h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded-3 bg-label-warning"><i
                                        class="ri-alert-line ri-24px"></i></span>
                            </div>
                            <h4 class="mb-0">8</h4>
                        </div>
                        <h6 class="mb-0 fw-normal">Vehicles with errors</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card card-border-shadow-danger h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded-3 bg-label-danger"><i
                                        class="ri-route-line ri-24px"></i></span>
                            </div>
                            <h4 class="mb-0">27</h4>
                        </div>
                        <h6 class="mb-0 fw-normal">Deviated from route</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card card-border-shadow-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded-3 bg-label-info"><i
                                        class="ri-time-line ri-24px"></i></span>
                            </div>
                            <h4 class="mb-0">13</h4>
                        </div>
                        <h6 class="mb-0 fw-normal">Late vehicles</h6>
                    </div>
                </div>
            </div>
            <!--/ Card Border Shadow -->
        </div>
        <!--/ On route vehicles Table -->
    </div>
@endsection
