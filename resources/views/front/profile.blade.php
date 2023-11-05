@extends('layouts.main')

@section('content')
<style>
    .float-md-end {
        float: left !important;
    }
</style>
<!--app-content open-->
<div class="app-content">
    <div class="side-app">
        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Profile</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </div>
            {{-- <div class="ms-auto pageheader-btn">
                <a href="#" class="btn btn-primary btn-icon text-white me-2">
                    <span>
                        <i class="fe fe-plus"></i>
                    </span> Add Account
                </a>
                <a href="#" class="btn btn-success btn-icon text-white">
                    <span>
                        <i class="fe fe-log-in"></i>
                    </span> Export
                </a>
            </div> --}}
        </div>
        <!-- PAGE-HEADER END -->

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header border-0">
                        <h3>Profile</h3>
                    </div>
                    <div class="card-body text-center">
                        <img class="" src="{{asset('assets/images/users/avatar-1.png')}}" alt="img">
                        <h3 class="mt-5">{{Auth::user()->name}}</h3>
                        <h4>{{Auth::user()->email}}</h4>
                        <h6>Member Since: {{Auth::user()->created_at}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header border-0">
                        <h3>Statistic</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 text-center">
                                {{-- <img src="https://cdn-icons-png.flaticon.com/128/5406/5406791.png" alt="" width="150px">
                                <br>
                                <a class="btn btn-warning mt-5">Newbie</a> --}}
                            </div>
                            <div class="col-8">
                                <div class="main-profile-contact-list float-md-end d-lg-flex">
                                    <div class="me-5">
                                        <div class="media">
                                            <div class="media-icon bg-primary  me-3 mt-1" style="line-height: 0%">
                                                <img src="{{asset('assets/images/media/bet.png')}}" alt="" class="w-100 h-100">
                                            </div>
                                            <div class="media-body">
                                                <span class="text-muted">Total Play</span>
                                                <div class="fw-semibold fs-25">
                                                    {{$play}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="me-5 mt-5 mt-md-0">
                                        <div class="media">
                                            <div class="media-icon bg-success me-3 mt-1" style="line-height: 0%">
                                                <img src="{{asset('assets/images/media/wager.png')}}" alt="" class="w-100 h-100">
                                            </div>
                                            <div class="media-body">
                                                <span class="text-muted">Total Wager</span>
                                                <div class="fw-semibold fs-25">
                                                    {{$bet}} TRX
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="me-0 mt-5 mt-md-0">
                                        <div class="media">
                                            <div class="media-icon bg-orange me-3 mt-1" style="line-height: 0%">
                                                <img src="{{asset('assets/images/media/cashback.png')}}" alt="" class="w-100 h-100">
                                            </div>
                                            <div class="media-body">
                                                <span class="text-muted">Cashback %</span>
                                                <div class="fw-semibold fs-25">
                                                    0%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTAINER END -->


@endsection

@section('js')
    <script>
        var global_var = [];

        $(document).ready(function () {
            

        });

        function slide_game() {
            window.location.href = "{{URL::to('slide')}}";
        }

        function trenball() {
            window.location.href = "{{URL::to('trenball')}}";
        }
    </script>
@endsection