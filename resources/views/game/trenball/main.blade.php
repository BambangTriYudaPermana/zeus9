@extends('layouts.main')

@section('content')
<style>
.image-container {
  position: relative;
  max-width: 100%;
}

.text-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    /* background-color: rgba(0, 0, 0, 0.7);  */
    color: #ebf8fe;
    padding: 20px; /* Padding around the text */
    text-align: center;
    font-weight: bold;
    font-size: 100pt;
}

.text-overlay p {
  margin: 0;
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
            {{-- @include('layouts.header-side') --}}
        </div>
        <!-- PAGE-HEADER END -->
        {{-- <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <img src="{{asset('assets/images/logo/logo1.jpg')}}" alt="" srcset="">
            </div>
        </div> --}}
        {{-- @include('layouts.topup.topup') --}}
        <!-- ROW-1 -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <span id="number-counter" style="font-size: 17pt;">0</span>x 
                                    <span class="ml-10" id="balance-color">
                                        <i class="fa fa-check-circle-o me-2" aria-hidden="true" style="display: none" id="icon-win"> <b class="result_game"></b></i>
                                        <i class="fa fa-frown-o me-2" aria-hidden="true" style="display: none" id="icon-lose"> <b class="result_game"></b></i>
                                    </span>
                                </div>
                                <div id="chart_trenball" style="width: 100% !important; min-width: 100%; height:400px;"></div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6" id="image-container">
                                <img src="{{asset('assets/images/pngs/bg-trenball.png')}}" alt="Gambar GIF" width="100%" height="550px" id="rocketGif" style="border-radius: 10%;">
                                <div class="text-overlay">
                                    <p id="resWin" style="display: none;">10.91x</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                {{-- <button id="playButton">Play GIF</button> --}}
                            </div>
                        </div>
                        {{-- <br> --}}
                        <div class="row row-sm mt-2">
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="form-amount">Amount</label>
                                    <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <i class="fa fa-dollar"></i>
                                        </span>
                                        <input type="text" class="form-control form_decimal" placeholder="Amount" id="form_amount" required>
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
            // var gif = $("#rocketGif");

            // $("#playButton").click(function(){
            //     $("#rocketGif").show(); 
            //     $("#resWin").hide();
            //     // $('#resWin').show();
            //     $("#rocketGif").attr("src", "{{asset('assets/images/game/rocket2.gif')}}");
            //     $("#resWin").show(9000).fadeIn();
            //     $("#resWin").hide();
            // });
            
        });
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

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
                    PlayAnimation(response.win_number, response.status, response.balance);
                    // trenball(data_index, response.data_number, response.win_number, response.balance, response.status);
                }
            });
            return  (Math.random() * (max - min) + min).toFixed(2);
        }

        function PlayAnimation(WinNumber, statusWin, balance) {
            var rocket = new Audio("{{asset('assets/sounds/rocket.mp3')}}");
            rocket.play();
            $('#resWin').css({
                "color" : "#ebf8fe"
            });
            $('#resWin').html(WinNumber+'x');
            $("#rocketGif").show(); 
            $("#resWin").hide();
            $("#rocketGif").attr("src", "{{asset('assets/images/game/rocket4.gif')}}");
            // $("#resWin").show(9000).fadeIn();
            $("#resWin").show(2500).fadeIn(0, function() {
                $('.button-play').prop('disabled', false);
                if (statusWin) {
                    $('#resWin').css({
                        "color" : "green"
                    });   
                    $('#wallet-user-general').html(numberWithCommas(balance));
                    var win = new Audio("{{asset('assets/slot/src/sounds/win.mp3')}}");
                    win.play();
                }else{
                    $('#resWin').css({
                        "color" : "red"
                    });
                    $('#wallet-user-general').html(numberWithCommas(balance));
                    var lose = new Audio("{{asset('assets/slot/src/sounds/lose.mp3')}}");
                    lose.play();
                }
            });
            $("#resWin").hide();
        }

        function tren_red() {
            $('.button-play').prop('disabled', true);
            $('#form_amount').prop('disabled', true);
            $('#icon-win').hide();
            $('#icon-lose').hide();

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
            $('#form_amount').prop('disabled', true);
            $('#icon-win').hide();
            $('#icon-lose').hide();

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
            $('#form_amount').prop('disabled', true);
            $('#icon-win').hide();
            $('#icon-lose').hide();

            var data_index = [];
            var data_res = [];
            for (let index = 1; index <= 40; index++) {
                data_index.push(index);
                // data_res.push(random_number(10, 20));
            }   

            random_number(1000, 2000, data_index, 'moon');
        }

        function trenball(data_index, data_res, max_count, balance, status) {
            // console.log(max_count);
            var myChart = echarts.init(document.getElementById('chart_trenball'));
            myChart.clear();

            option = {
                animationDuration: 5000,
                xAxis: {
                    type: 'category',
                    data: data_index,
                    show: false
                },
                yAxis: {
                    type: 'value',
                    show: false
                },
                series: [
                    {
                        data: data_res,
                        type: 'line',
                        // symbol: 'image://https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmFD8F8vOBtFsHcKnJ7tYV5bSMJHkzSkZ5Q1vcBdZiGHgBezD2C9KpSC6KS1adcALkCYI&usqp=CAU',
                        // symbolSize: 40,
                        // symbolRepeat: false,
                        // label: {
                        //     show: true
                        // },
                        smooth: true,
                        areaStyle: {}
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
                    if (status) {
                        var win = new Audio("{{asset('assets/slot/src/sounds/win.mp3')}}");
                        win.play();
                        $('.result_game').html("WIN!");

                        $('#balance-color').attr('class', '');
                        $('#balance-color').addClass('text-success');
                        $('#icon-win').show();
                        $('#icon-lose').hide();
                    }else{
                        var lose = new Audio("{{asset('assets/slot/src/sounds/lose.mp3')}}");
                        lose.play();
                        $('.result_game').html("LOSE!");

                        $('#balance-color').attr('class', '');
                        $('#balance-color').addClass('text-danger');
                        $('#icon-win').hide();
                        $('#icon-lose').show();
                    }
                    $('#number-counter').text(end);

                    $('.button-play').prop('disabled', false);
                    $('#form_amount').prop('disabled', false);

                    $('#wallet-user-general').html(numberWithCommas(balance));
                    $('#wallet-user').html(numberWithCommas(balance));
                    $('#wallet-user-1').html(numberWithCommas(balance));
                }
            });
        }
    </script>
@endsection

{{-- @include('layouts.topup.js-topup') --}}