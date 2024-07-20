@extends('app')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body"><h4>{{$userCount}}</h4>
                            <p>Total Users</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body"><h4>{{$categoryCount}}</h4>
                            <p>Total Categories</p></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
{{--                <div class="col-xl-3 col-md-6">--}}
{{--                    <div class="card bg-success text-white mb-4">--}}
{{--                        <div class="card-body"><h4>subcategoryCount</h4>--}}
{{--                            <p>Total Subcategories</p></div>--}}
{{--                        <div class="card-footer d-flex align-items-center justify-content-between">--}}
{{--                            <a class="small text-white stretched-link" href="#">View Details</a>--}}
{{--                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-md-6">--}}
{{--                    <div class="card bg-danger text-white mb-4">--}}
{{--                        <div class="card-body"><h4>sunspendedCount</h4>--}}
{{--                            <p>Suspended Users</p></div>--}}
{{--                        <div class="card-footer d-flex align-items-center justify-content-between">--}}
{{--                            <a class="small text-white stretched-link" href="#">View Details</a>--}}
{{--                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

        </div>
    </main>
@endsection
