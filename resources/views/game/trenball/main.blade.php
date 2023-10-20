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
</style>
<!--app-content open-->
<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">TrennBall</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">TrennBall</li>
                </ol>
            </div>
            @include('layouts.header-side')
        </div>
        <!-- PAGE-HEADER END -->
        {{-- <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <img src="{{asset('assets/images/logo/logo1.jpg')}}" alt="" srcset="">
            </div>
        </div> --}}
        @include('layouts.topup')
        <!-- ROW-1 -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                {{-- <div id="chart" style="width: 600px; height: 400px;"></div> --}}
                                <div class="text-center"><span id="number-counter">0</span>x</div>
                                <div id="chart_trenball" style="width: 100% !important; min-width: 100%; height:400px;"></div>
                            </div>
                        </div>
                        <br>
                        <div class="row row-sm mt-2">
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="form-amount">Amount</label>
                                    <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <i class="fa fa-dollar"></i>
                                        </span>
                                        <input type="text" class="form-control money" placeholder="Amount" id="form_amount" required>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="form-win-change">Bet Red (Payout 1.96x)</label>
                                    <button class="btn btn-danger w-100 button-play" id="tren_red" onclick="tren_red()">Play</button>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="form-win-change">Bet Green (Payout 2x)</label>
                                    <button class="btn btn-success w-100 button-play" id="tren_grenn" onclick="tren_grenn()">Play</button>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="form-win-change">Bet Moon (Payout 10x)</label>
                                    <button class="btn btn-warning w-100 button-play" id="tren_moon" onclick="tren_moon()">Play</button>
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

        function random_number(min, max, data_index, btn) {
            var amount = $('#form_amount').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/play-tb",
                method: 'POST',
                dataType: 'json',
                data: {
                    amount: amount,
                    game: 'trenball',
                    min: min,
                    max: max,
                    type: btn
                },
                success: function (response) {
                    trenball(data_index, response.data_number, response.win_number);
                }
            });
            return  (Math.random() * (max - min) + min).toFixed(2);
        }

        function tren_red() {
            $('.button-play').prop('disabled', true);
            var data_index = [];
            var data_res = [];
            for (let index = 1; index <= 40; index++) {
                data_index.push(index);
                // data_res.push(random_number(0, 1.97));
            }   
            random_number(0, 197, data_index, 'red');
        }

        function tren_grenn() {
            $('.button-play').prop('disabled', true);
            var data_index = [];
            var data_res = [];
            for (let index = 1; index <= 40; index++) {
                data_index.push(index);
                // data_res.push(random_number(2, 10));
            }   

            random_number(200, 1000, data_index, 'green');
        }

        function tren_moon() {
            $('.button-play').prop('disabled', true);
            var data_index = [];
            var data_res = [];
            for (let index = 1; index <= 40; index++) {
                data_index.push(index);
                // data_res.push(random_number(10, 20));
            }   

            random_number(1000, 2000, data_index, 'moon');
        }

        function trenball(data_index, data_res, max_count) {
            // console.log(max_count);
            var myChart = echarts.init(document.getElementById('chart_trenball'));
            myChart.clear();

            option = {
                animationDuration: 5000,
                xAxis: {
                    type: 'category',
                    data: data_index
                },
                yAxis: {
                    type: 'value',
                    label: {
                    show: true
                    }
                },
                series: [
                    {
                    data: data_res,
                    type: 'line',
                    // symbol: 'image://https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmFD8F8vOBtFsHcKnJ7tYV5bSMJHkzSkZ5Q1vcBdZiGHgBezD2C9KpSC6KS1adcALkCYI&usqp=CAU',
                    // symbolSize: 40,
                    // label: {
                    //     show: true
                    // },
                    smooth: true
                    }
                ]
            };
            
            myChart.setOption(option, true);
            window.addEventListener('resize',function(){
                myChart.resize();
            });

            var duration = 5000; // 5 seconds
            var start = 0;
            var end = max_count; // The number you want to count up to

            $({ countNum: start }).animate({ countNum: end }, {
                duration: duration,
                easing: 'linear',
                step: function () {
                    $('#number-counter').text(Math.floor(this.countNum * 100) / 100);
                },
                complete: function () {
                    $('#number-counter').text(end);
                    $('.button-play').prop('disabled', false);
                }
            });
        }
    </script>
@endsection

@include('layouts.js-topup')