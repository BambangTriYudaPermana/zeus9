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
                <h1 class="page-title">Rocket Launch</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Rocket Launch</li>
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
                                            {{-- <i class="fa fa-dollar"></i> --}}
                                            <img src="{{asset('assets/images/logo/trx.svg')}}" alt="" srcset="" width="20px" height="20px" class="m-0">
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
            global_var.balance = parseInt('{{Auth::user()->wallet}}');
            
            
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
            $('#form_amount').prop('disabled', false);
        }

        function tren_red() {
            $('#icon-win').hide();
            $('#icon-lose').hide();

            var data_index = [];
            var data_res = [];
            for (let index = 1; index <= 40; index++) {
                data_index.push(index);
                // data_res.push(random_number(0, 1.97));
            }   

            if (validate()) {
                random_number(0, 197, data_index, 'red');    
            }
        }

        function tren_grenn() {
            $('#icon-win').hide();
            $('#icon-lose').hide();

            var data_index = [];
            var data_res = [];
            for (let index = 1; index <= 40; index++) {
                data_index.push(index);
                // data_res.push(random_number(2, 10));
            }   

            if (validate()) {
                random_number(200, 1000, data_index, 'green');   
            }
        }

        function tren_moon() {
            $('#icon-win').hide();
            $('#icon-lose').hide();

            var data_index = [];
            var data_res = [];
            for (let index = 1; index <= 40; index++) {
                data_index.push(index);
                // data_res.push(random_number(10, 20));
            }   

            if (validate()) {
                random_number(1000, 2000, data_index, 'moon');    
            }
        }

        function validate() {
            var amount = parseFloat($('#form_amount').val());
            // console.log(amount);
            if (amount > global_var.balance) {
                Swal.fire({
                    text: "You don't have enough balance, please add more balance to play this game.",
                    icon: "warning"
                });
                return false;
            }else{
                if (amount == 0 || amount == '' || isNaN(amount)) {
                    Swal.fire({
                        text: "Please add Amount.",
                        icon: "warning"
                    }); 
                }else{
                    $('.button-play').prop('disabled', true);
                    $('#form_amount').prop('disabled', true);
                    return true;
                }
            }
        }
    </script>
@endsection

{{-- @include('layouts.topup.js-topup') --}}