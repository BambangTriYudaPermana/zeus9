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

#gif-image {
    width: 300px; /* Sesuaikan lebar sesuai kebutuhan */
    height: 200px; /* Sesuaikan tinggi sesuai kebutuhan */
    background-image: url("{{asset('assets/images/game/Rocket.gif')}}"); /* Ganti dengan path menuju file GIF Anda */
    background-size: cover; /* Mengatur ukuran gambar sesuai dengan ukuran kontainer */
    background-repeat: no-repeat; /* Menghindari pengulangan gambar */
}
</style>
<!--app-content open-->
<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Home Page</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Home Page</li>
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
        
        <div class="row mt-4">
            <div class="col-md-6 col-xl-3">
                <a href="/slot" class="thumbnail border-0 p-0">
                    <img src="{{asset('assets/images/game/Crazy-Coin-Flip.png')}}" alt="thumb1" class="thumbimg">
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="/trenball" class="thumbnail border-0 p-0">
                    <img src="{{asset('assets/images/game/Trenball.png')}}" alt="thumb1" class="thumbimg">
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="#" class="thumbnail border-0 p-0">
                    <img src="{{asset('assets/images/game/Twin-Spin.png')}}" alt="thumb1" class="thumbimg">
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="#" class="thumbnail border-0 p-0">
                    <img src="{{asset('assets/images/game/Coin-Volcano.png')}}" alt="thumb1" class="thumbimg">
                </a>
            </div>
            {{-- <div class="col-md-6 col-xl-3">
                <a href="#" class="thumbnail">
                    <img src="{{asset('assets/images/game/rocket2.gif')}}" alt="Gambar GIF" loop="false">
                </a>
            </div> --}}
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