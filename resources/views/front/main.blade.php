@extends('layouts.main')

@section('content')
<style>
.slider-container {
    /* margin: 50px; */
    text-align: center;
}

#slider {
    width: 100%;
}

#slider-value {
    display: block;
    margin-top: 10px;
    font-size: 18px;
}

#slider .ui-slider-handle {
    background:red;
}
#coin-flip{
    background-image: url("{{asset('asset/images/game/Crazy-Coin-Flip.png')}}");
}
</style>
<!--app-content open-->
<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Dashboard 01</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard 01</li>
                </ol>
            </div>
            @if (!Auth::user())
                <div class="ms-auto pageheader-btn">
                    <a href="/register" class="btn btn-primary btn-icon text-white me-2">
                        <span>
                            <i class="fa fa-user-plus"></i>
                        </span> Register
                    </a>
                    <a href="/login" class="btn btn-success btn-icon text-white">
                        <span>
                            <i class="fa fa-sign-in"></i>
                        </span> Login
                    </a>
                </div>
            @endif
        </div>
        <!-- PAGE-HEADER END -->
        {{-- <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <img src="{{asset('assets/images/logo/logo1.jpg')}}" alt="" srcset="">
            </div>
        </div> --}}
        <!-- ROW-1 -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3" onclick="slide_game()">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <div class="row" onclick="lower_up()">
                                    <div class="col">
                                        <h6 class="">Lower / Up</h6>
                                        <h3 class="mb-2 number-font">34,516</h3>
                                        <p class="text-muted mb-0">
                                            <span class="text-primary"><i class="fa fa-chevron-circle-up text-primary me-1"></i> 3%</span>
                                            last month
                                        </p>
                                    </div>
                                    <div class="col col-auto">
                                        <div class="counter-icon bg-primary-gradient box-shadow-primary brround ms-auto">
                                            <i class="fe fe-trending-up text-white mb-5 "></i>
                                            {{-- <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.pngwing.com%2Fid%2Ffree-png-vpesg&psig=AOvVaw2JpNguP3eJKS_0FYhXqHFX&ust=1696831099032000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCPjBvs7i5YEDFQAAAAAdAAAAABAD" alt="" srcset=""> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3" onclick="trenball()">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="">Total Leads</h6>
                                        <h3 class="mb-2 number-font">56,992</h3>
                                        <p class="text-muted mb-0">
                                            <span class="text-secondary"><i class="fa fa-chevron-circle-up text-secondary me-1"></i> 3%</span>
                                            last month
                                        </p>
                                    </div>
                                    <div class="col col-auto">
                                        <div class="counter-icon bg-danger-gradient box-shadow-danger brround  ms-auto">
                                            <i class="icon icon-rocket text-white mb-5 "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="">Total Profit</h6>
                                        <h3 class="mb-2 number-font">$42,567</h3>
                                        <p class="text-muted mb-0">
                                            <span class="text-success"><i class="fa fa-chevron-circle-down text-success me-1"></i> 0.5%</span>
                                            last month
                                        </p>
                                    </div>
                                    <div class="col col-auto">
                                        <div class="counter-icon bg-secondary-gradient box-shadow-secondary brround ms-auto">
                                            <i class="fe fe-dollar-sign text-white mb-5 "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="">Total Cost</h6>
                                        <h3 class="mb-2 number-font">$34,789</h3>
                                        <p class="text-muted mb-0">
                                            <span class="text-danger"><i class="fa fa-chevron-circle-down text-danger me-1"></i> 0.2%</span>
                                            last month
                                        </p>
                                    </div>
                                    <div class="col col-auto">
                                        <div class="counter-icon bg-success-gradient box-shadow-success brround  ms-auto">
                                            <i class="fe fe-briefcase text-white mb-5 "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6 col-xl-3">
                <a href="/slot" class="thumbnail border-0 p-0">
                    <img src="{{asset('assets/images/game/Crazy-Coin-Flip.png')}}" alt="thumb1" class="thumbimg">
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="#" class="thumbnail">
                    <img src="{{asset('assets/images/game/Hit-Slot.png')}}" alt="thumb1" class="thumbimg">
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="#" class="thumbnail">
                    <img src="{{asset('assets/images/game/Twin-Spin.png')}}" alt="thumb1" class="thumbimg">
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="#" class="thumbnail">
                    <img src="{{asset('assets/images/game/Coin-Volcano.png')}}" alt="thumb1" class="thumbimg">
                </a>
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