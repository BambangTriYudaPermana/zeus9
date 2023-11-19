@extends('layouts.main')

@section('content')
<style>
.slider-container {
    /* margin: 50px; */
    text-align: center;
}

#slider {
    width: 80%;
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
                <h1 class="page-title">Dice</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dice</li>
                </ol>
            </div>
            @include('layouts.header-side')
        </div>
        <!-- ROW-1 -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header border-bottom-0">
                        <div class="card-title">
                            Lower / Upper Game
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <div class="row">
                            <div class="col-md-12">
                                <div id="chart_up_down" style="width: 100%;height:400px;"></div>
                            </div>
                        </div> --}}
                        <div class="row row-sm">
                            {{-- <input data-extra-classes="irs-modern" name="example_name" type="text" id="slide_game"> --}}
                            <div class="row mb-1">
                                <div class="col-md-12">
                                    <span><b>Your Balance : <img src="{{asset('assets/images/logo/trx.svg')}}" alt="" srcset="" width="20px" height="20px" class="m-0"></b>
                                        <span class="" id="balance-color">
                                            <span id="wallet-user-1" class="mr-2">{{Auth::user() ? Auth::user()->wallet : '0,00'}} </span>
                                            <span class="ml-10">
                                                <i class="fa fa-check-circle-o me-2" aria-hidden="true" style="display: none" id="icon-win"> <b class="result_game"></b></i>
                                                <i class="fa fa-frown-o me-2" aria-hidden="true" style="display: none" id="icon-lose"> <b class="result_game"></b></i>
                                            </span>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-12">
                                    <span><b>Number Roll : </b><b id="index_roll"></b></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <span id="payout"><b>Payout: </b></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <span id="range_bet"><b>Range To Win: </b></span>
                                    <hr>
                                </div>
                            </div>
                            <div class="slider-container">
                                <input type="range" id="slider" min="1" max="1000000" value="1" disabled>
                                <span id="slider-value">1</span>
                            </div>
                        </div>
                        <br>
                        <div class="row row-sm mt-2">
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="form-payout">Payout</label>
                                    <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <i class="fa fa-dollar"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Payout" id="form_payout" required disabled>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="form-roll-under">Roll Under</label>
                                    <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <i class="fa fa-repeat"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Roll Under" id="form_roll_under" required>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="form-win-change">Win Change</label>
                                    <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <i class="fa fa-percent"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Win Change" id="form_win_change" required min="5" maxlength="95" onchange="win_changer()">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="form-amount">Amount</label>
                                    <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <img src="{{asset('assets/images/logo/trx.svg')}}" alt="" srcset="" width="20px" height="20px" class="m-0">
                                        </span>
                                        <input type="text" class="form-control form_decimal" placeholder="Amount" id="form_amount" required>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="guess_low_up">Low / UP</label>
                                    <div class="input-icon">
                                        <input type="checkbox" id="guess_low_up" onchange="win_changer()">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary w-100" id="start_btn" onclick="play_low_up()" {{Auth::user()->wallet <=0 ? 'disabled': ''}} >Start Bet</button>
                                    {{-- <button class="btn btn-primary w-100" id="start_btn" onclick="play_low_up()" disabled >Start Bet</button> --}}
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
            $('#guess_low_up').bootstrapToggle({
                on: 'HIGHT',
                off: 'LOW'
            });

            // $('#form_roll_under').change(function() { 
            //     var roll_under = $('#form_roll_under').val();
            //     var win_change = $('#form_win_change').val();
            //     var amount = $('#form_amount').val();

            //     if (roll_under != '' && win_change != '' amount != '') {
            //         $('#start_btn').prop('disabled', false);
            //     }
            // });

            // $('#form_amount').change(function() { 
            //     var roll_under = $('#form_roll_under').val();
            //     var win_change = $('#form_win_change').val();
            //     var amount = $('#form_amount').val();

            //     if (roll_under != '' && win_change != '' amount != '') {
            //         $('#start_btn').prop('disabled', false);
            //     }
            // });

        });

        function topup() {
            var saldo = $('#topup_saldo').val();

            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/topup/",
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            saldo: saldo
                        },
                        success: function (response) {
                            Swal.fire(
                                'success!',
                                'Your TopUp Success Wait a minute till available in your Wallet.',
                                'success'
                            );
                            $('#modaldemo8').modal('toggle');
                        }
                    });
                }
            });
        }

        function random_number() {
            return  Math.floor(Math.random() * 999999);
        }

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function animateSlider(guess_number, range_min, range_max, roll_ke) {
            var slider = $('#slider');
            var sliderValue = $('#slider-value');
            
            var amount = $('#form_amount').val();
            var win_change = $('#form_win_change').val();

            slider.on('input', function() {
                var value = $(this).val();
                sliderValue.text(value);
            });

            slider.animate({ 
                value: guess_number, 
            }, {
                duration: 3000,
                step: function(now) {
                    slider.val(Math.floor(now));
                    sliderValue.text(Math.floor(now));
                },
                complete: function() {
                    // slider.val(guess_number);
                    var result_game = '';
                    if (guess_number >= range_min && guess_number <= range_max) {
                        sliderValue.text(numberWithCommas(guess_number));
                        result_game = 'WIN';
                        $('.result_game').html(result_game);
                        $('#alert-win').show();
                        $('#alert-lose').hide();

                        $('#balance-color').attr('class', '');
                        $('#balance-color').addClass('text-success');
                        $('#icon-win').show();
                        $('#icon-lose').hide();
                        // console.log('WIN');
                    }else{
                        sliderValue.text(numberWithCommas(guess_number));
                        result_game = 'LOSE';
                        $('.result_game').html(result_game);
                        $('#alert-win').hide();
                        $('#alert-lose').show();

                        $('#balance-color').attr('class', '');
                        $('#balance-color').addClass('text-danger');
                        $('#icon-win').hide();
                        $('#icon-lose').show();
                        // console.log('LOSE');
                    }

                    sum_balance(result_game, amount, win_change, roll_ke);
                }
            });
        }

        function win_changer() 
        {
            var win_change = $('#form_win_change').val();
            var amount = $('#form_amount').val();
            var guess_low_up = '';
            if($('#guess_low_up').prop("checked") == true){
                guess_low_up = 'hight';
            }else{
                guess_low_up = 'low';
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/get_payout/",
                method: 'POST',
                dataType: 'json',
                data: {
                    win_change: win_change,
                    guess_low_up: guess_low_up
                },
                success: function (response) {
                    $('#form_payout').val(response.payout);
                    $('#payout').html('<b>Payout : '+response.payout+'x</b>');
                    
                    if (guess_low_up == 'low') {
                        range_min = response.low_min;
                        range_max = response.low_max;
                        $('#range_bet').html('<b>Range To Win : '+numberWithCommas(response.low_min)+' - '+numberWithCommas(response.low_max)+'</b>');
                    }else{
                        range_min = response.hight_min;
                        range_max = response.hight_max;
                        $('#range_bet').html('<b>Range To Win : '+numberWithCommas(response.hight_min)+' - '+numberWithCommas(response.hight_max)+'</b>');
                    }
                }
            });
        }

        function play_low_up()
        {
            $('#start_btn').prop('disabled', true);

            var payout = $('#form_payout').val();
            var roll_under = $('#form_roll_under').val();
            var win_change = $('#form_win_change').val();
            var amount = $('#form_amount').val();
            var guess_low_up = '';
            if($('#guess_low_up').prop("checked") == true){
                guess_low_up = 'hight';
            }else{
                guess_low_up = 'low';
            }
            // console.log(guess_low_up);

            var range_min = 0;
            var range_max = 0;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/get_payout/",
                method: 'POST',
                dataType: 'json',
                data: {
                    win_change: win_change,
                    guess_low_up: guess_low_up
                },
                success: function (response) {
                    $('#form_payout').val(response.payout);
                    
                    if (guess_low_up == 'low') {
                        range_min = response.low_min;
                        range_max = response.low_max;
                        $('#range_bet').html('<b>Range To Win : '+numberWithCommas(response.low_min)+' - '+numberWithCommas(response.low_max)+'</b>');
                    }else{
                        range_min = response.hight_min;
                        range_max = response.hight_max;
                        $('#range_bet').html('<b>Range To Win : '+numberWithCommas(response.hight_min)+' - '+numberWithCommas(response.hight_max)+'</b>');
                    }

                    for (let index = 0; index < roll_under; index++) {
                        animateSlider(random_number(), range_min, range_max, index); 
                    }

                }
            });
            
        }

        function sum_balance(result_game, amount_bet, win_change, roll_ke) 
        {
            var roll_under = $('#form_roll_under').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/sum_amout/",
                method: 'POST',
                dataType: 'json',
                data: {
                    result_game: result_game,
                    amount_bet: amount_bet,
                    win_change: win_change
                },
                success: function (response) {
                    $('#wallet-user-general').html(response.wallet);
                    $('#wallet-user').html(response.wallet);
                    $('#wallet-user-1').html(response.wallet);

                    if (roll_under == roll_ke+1) {
                        $('#start_btn').prop('disabled', false);          
                    }

                    $('#index_roll').html(roll_ke+1);
                }
            });
        }
    </script>
@endsection