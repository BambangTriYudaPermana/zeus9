@extends('layouts.main')

@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('assets/slot/style.css')}}" media="screen"/>
<style>
    .buy-free-spin {
        padding: 15px 25px;
        font-size: 24px;
        text-align: center;
        cursor: pointer;
        outline: none;
        color: #fff;
        background-color: #04AA6D;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
    }

    .buy-free-spin:hover {
        background-color: #3e8e41
    }

    .buy-free-spin:active {
        background-color: #3e8e41;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }
    /* #multiplier {
        display: block; 
        margin-left: auto; 
        margin-right: auto; 
        background-repeat: no-repeat;
        height: 160px; 
        margin-bottom: 20px;
    } */
    /* #multiplier-real {
        display: flex;
        justify-content: center;
        align-items: center;
    } */

    
</style>
<!--app-content open-->
<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Jackpot Slot</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Jackpot Slot</li>
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
        <!-- ROW-1 -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card" id="body">
                    <div class="card-body">
                        <div class="row">
                            {{-- side --}}
                            <div class="col-md-3">
                                <div>
                                    <table class="w-100">
                                        <td>
                                            <tr>
                                                <h3 class="stats-title" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#Info_Symbol">Rules <i class="fa fa-info-circle"></i></h3>
                                            </tr>
                                            <tr>
                                                {{-- <td><h3>Free Spin : <span id="ttl_free_spin">{{Auth::user()->bonus_slot->free_spin}}</span></h3></td> --}}
                                                {{-- <td><h5 class="text-center">1x Spin = 0.3 Trx</h5></td> --}}
                                                <h5 class="text-center">1x Spin = 0.5 Trx</h5>
                                                <button class="buy-free-spin w-100" onclick="buy_free_spin()">Buy Scatter (30 TRX)</button>
                                            </tr>
                                        </td>
                                    </table>
                                </div>
                            </div>
                            {{-- main --}}
                            @php
                                $is_free_spin = isset(Auth::user()->bonus_slot->free_spin) && Auth::user()->bonus_slot->free_spin > 0 ? true : false;
                                $text_spin = $is_free_spin ? 'FREE SPIN' : 'WELCOME!';
                            @endphp
                            <div class="col-md-5">
                                <main style="margin-left: 0; width: 100%">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <section id="status"><h3 id="text">{{$text_spin}}</h3></section>
                                        </div>
                                    </div>
                                    <div class="row" id="multiplier-real" style="{{$is_free_spin ? '' : 'display:none;'}}">
                                        {{-- <div class="col-4"></div> --}}
                                        <div class="col-md-12">
                                            <div id="multiplier" class="b9"></div>
                                        </div>
                                        {{-- <div class="col-4"></div> --}}
                                    </div>
                                    {{-- <section id="Slots">
                                        <div id="slot1" class="a1"></div>
                                        <div id="slot2" class="a1"></div>
                                        <div id="slot3" class="a1"></div>
                                    </section> --}}
                                    <section id="Slots">
                                        <div class="row">
                                            <div class="col-md-4 w-30">
                                                <div id="slot1" class="b1"></div>
                                            </div>
                                            <div class="col-md-4 w-30">
                                                <div id="slot2" class="b1"></div>
                                            </div>
                                            <div class="col-md-4 w-30">
                                                <div id="slot3" class="b1"></div>
                                            </div>
                                        </div>
                                    </section>
                                    <div class="row mt-5">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" placeholder="Amount" id="form_spin" required disabled value="{{isset(Auth::user()->bonus_slot->free_spin) && Auth::user()->bonus_slot->free_spin != 0 ? Auth::user()->bonus_slot->free_spin : 1}}" style="text-align: center;">
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6 d-flex justify-content-center">
                                            {{-- <button class="btn btn-danger button-play" style="height: 40px; margin-top: 40px; margin-right: 10px;" id="spin-minus" {{ $is_free_spin ? 'disabled' : '' }}><i class="fa fa-minus"></i></button> --}}
                                            <button onclick="Spin()" id="Gira" class="button-play">SPIN</button>
                                            {{-- <section onclick="doSlot()" id="Gira">SPIN</section> --}}
                                            {{-- <button class="btn btn-success button-play" style="height: 40px; margin-top: 40px; margin-left: 10px;" id="spin-plus" {{ $is_free_spin ? 'disabled' : '' }}><i class="fa fa-plus"></i></button> --}}
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <canvas id="my-canvas"></canvas>
                                </main>
                            </div>
                            <div class="col-md-4">
                                {{-- <table class="table table-bordered w-100" id="his_play">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Game</th>
                                            <th>Payout</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Oct 31, 16:00:00 PM</td>
                                            <td><img src="{{asset('assets/images/logo/trx2.png')}}" alt="" srcset="" width="40px" height="35px" class="m-0"> 0.3</td>
                                            <td>JACKPOT!</td>
                                            <td><img src="{{asset('assets/images/logo/trx2.png')}}" alt="" srcset="" width="40px" height="35px" class="m-0"> 0.08</td>
                                        </tr>
                                    </tbody>
                                </table> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTAINER END -->

<div class="modal fade"  id="Info_Symbol">
    <div class="modal-dialog modal-dialog-centered modal-lg text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Information</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach ($data_symbol as $item)
                    <div class="col-sm-3 col-6 text-center">
                        <img src="{{asset('assets/slot/src/tiles/new/'.$item['img_name'].'')}}" alt="" srcset="" width="100%">
                        <br>
                        <table style="width: 100%; text-align: left;">
                            <tr>
                                <td>2 Symbol : </td>
                                <td>{{$item['dua_symbol']}}</td>
                            </tr>
                            <tr>
                                <td>3 Symbol : </td>
                                <td>{{$item['free_spin'] != 0 ? $item['free_spin']."x Free Spin!" : $item['tiga_symbol']}}</td>
                            </tr>
                        </table>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" data-bs-dismiss="modal" >Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('assets/slot/confetti.js')}}"></script>
{{-- <script src="{{asset('assets/slot/main.js')}}"></script>  --}}
<!-- To Uglify: https://skalman.github.io/UglifyJS-online/ -->
{{-- <script src="{{asset('assets/slot/auth.js')}}"></script> --}}
    <script>
        var bet = 0;
        var global_var = [];
        $(document).ready(function () {
            global_var.balance = parseFloat('{{Auth::user()->wallet}}');
            global_var.ttl_free_spin = parseInt('{{isset(Auth::user()->bonus_slot->free_spin) ? Auth::user()->bonus_slot->free_spin : 0}}');
            global_var.is_win = parseInt('{{isset(Auth::user()->is_win) ? Auth::user()->is_win : 0}}');
            global_var.is_continue = false;
            
            if (global_var.ttl_free_spin > 0) {
                global_var.is_free_spin = true;
            }else{
                global_var.is_free_spin = false;
            }
        
            var form_spin = parseInt($('#form_spin').val());

            bet = form_spin * 0.5;

            if (balance <= 0) {
                // console.log(balance)
                $('.button-play').prop('disabled', true);
            }
            
            $("#spin-minus").click(function(){
                var form_spin = parseInt($('#form_spin').val());
                if (form_spin == 1) {
                    bet = 0.5;
                    // console.log(bet)
                    $('#form_spin').val(1);
                }else{
                    bet -= 0.5;
                    // console.log(bet)
                    $('#form_spin').val(form_spin-1);
                }
                $('#spin-plus').prop('disabled', false);
            });

            $("#spin-plus").click(function(){
                var form_spin = parseInt($('#form_spin').val());
                bet += 0.5;
                // console.log(bet)
                if (bet >= (global_var.balance-0.5) ) {
                    $('#spin-plus').prop('disabled', true);
                    $('#form_spin').val(form_spin+1);
                }else{
                    $('#form_spin').val(form_spin+1);
                }
            });
        });
        var max_spin = 0;

        var doing = false;
        var url_spinMp3 = '{{ asset("assets/slot/src/sounds/spin.mp3") }}';
    
        var spin = [
            new Audio(url_spinMp3),
            new Audio(url_spinMp3),
            new Audio(url_spinMp3),
            new Audio(url_spinMp3),
            new Audio(url_spinMp3),
            new Audio(url_spinMp3),
            new Audio(url_spinMp3)
        ];
        var url_coinMp3 = '{{asset("assets/slot/src/sounds/coin.mp3")}}';
        var coin = [
            new Audio(url_coinMp3),
            new Audio(url_coinMp3),
            new Audio(url_coinMp3),
            new Audio(url_coinMp3)
        ]
        var win = new Audio("{{asset('assets/slot/src/sounds/win.mp3')}}");
        var lose = new Audio("{{asset('assets/slot/src/sounds/lose.mp3')}}");
        var audio = false;
        let status = document.getElementById("status")
        let text = document.getElementById("text")
        let confe = document.querySelector("#my-canvas");
        var wins_element = document.getElementById("wins")
        var score_element = document.getElementById("score")
        var blinkId = 0;
        var blink = false
        var score = 0
        var wins = 0
        var id = 0

        window.addEventListener("keydown", (evento) => {
            if (evento.code == "Space") {
            // doSlot(1,0,0,0)
            Spin()
            }
        });

        function Spin(){
            global_var.is_continue = true;
            var form_spin = parseFloat($('#form_spin').val());
            // console.log(global_var.balance);
            var wallet = '{{Auth::user()->wallet}}';
            var is_free_spin = '{{$is_free_spin}}';
            // var is_free_spin = parseInt('Auth::user()->bonus_slot->free_spin');
            if (form_spin < 0) {
                Swal.fire({
                    text: "Min Spin 1x",
                    type: "warning"
                });
            }else{
                if (is_free_spin) {
                    doSlot(form_spin)
                }else{
                    if (global_var.balance < 0.5) {
                        Swal.fire({
                            text: "You don't have enough balance, please add more balance to play this game.",
                            icon: "warning"
                        });
                    }else{
                        doSlot(form_spin)
                    }   
                }
            }
        }

        
        
        function doSlot(role_spin = 1, i1 = 0, i2 = 0, i3 = 0){
            $('#Gira').addClass("disable_spin");
            global_var.form_spin = role_spin;
            // $('#form_spin').val(role_spin);
            
            if (global_var.ttl_free_spin == 0) {
                balance(0.5);     
                // console.log('masuk anjing');
            }else{
                // global_var.ttl_free_spin -= 1; 
                Sfree_spin(global_var.ttl_free_spin, 'minus_free_spin')
            }
            // console.log(global_var.free_spin);
            
            $('.button-play').prop('disabled', true);

            if(blinkId != 0){
                clearInterval(blinkId);
            }
            confe.classList.remove("active")
            if (doing){return null;}
            doing = true;

            var i1 = 0;
            var i2 = 0;
            var i3 = 0;

            var numChanges = randomInt(1,4)*7
            var numeberSlot1 = numChanges+randomInt(1,7)
            var numeberSlot2 = numChanges+2*7+randomInt(1,7)
            var numeberSlot3 = numChanges+4*7+randomInt(1,7)
            var numeberSlot4 = numChanges+6*7+randomInt(1,7)

            var sound = 0
            text.style = "visibility: visible"
            text.innerHTML = "SPINNING..."
            status.style.background = "#606060"
            // document.getElementById("body").style.background="#0f0f0f";
            
            SpinSlot1 = setInterval(spin1, 50);
            SpinSlot2 = setInterval(spin2, 50);
            SpinSlot3 = setInterval(spin3, 50);
            SpinMultiplier = setInterval(multiplier, 30);
            
            function spin1(){
                i1++;
                if (i1>=numeberSlot1){
                    coin[0].play()
                    clearInterval(SpinSlot1);
                    slotTile = document.getElementById("slot1");

                    if (global_var.is_win == '1') {
                        slotTile.className = "b1";        
                    }
                    return null;
                }
                slotTile = document.getElementById("slot1");
                if (slotTile.className=="b7"){
                    slotTile.className = "b0";
                }
                slotTile.className = "b"+(parseInt(slotTile.className.substring(1))+1)
            }
            function spin2(){
                i2++;
                if (i2>=numeberSlot2){
                    coin[1].play()
                    clearInterval(SpinSlot2);
                    slotTile1 = document.getElementById("slot1");
                    slotTile2 = document.getElementById("slot2");

                    if (global_var.is_win == '1') {
                        slotTile.className = "b1";        
                    }else{
                        if (slotTile1.className == "b1" && slotTile2.className == "b1") {
                            change()
                        }
                    }
                    return null;
                }
                slotTile = document.getElementById("slot2");
                if (slotTile.className=="b7"){
                    slotTile.className = "b0";
                }
                slotTile.className = "b"+(parseInt(slotTile.className.substring(1))+1)
            }
            function spin3(){
                i3++;
                if (i3>=numeberSlot3){
                    var next = false;
                    coin[2].play()
                    clearInterval(SpinSlot3);
                    slotTile1 = document.getElementById("slot1");
                    slotTile2 = document.getElementById("slot2");
                    slotTile3 = document.getElementById("slot3");
                    
                    if (global_var.is_win == '1') {
                        slotTile1.className = "b1";   
                        slotTile2.className = "b1";   
                        slotTile3.className = "b1";

                        next = true;
                    }else{
                        if (global_var.ttl_free_spin != 0) {
                            next = changeFreeSpin();
                        }else{
                            if (slotTile1.className == "b1" || slotTile2.className == "b1" || slotTile3.className == "b1") {
                                next = change();
                            }else{
                                next = true;
                            }
                        }
                    }
                    if (next) {
                        testWin();    
                    }
                    
                    return null;
                }
                slotTile = document.getElementById("slot3");
                if (slotTile.className=="b7"){
                    slotTile.className = "b0";
                }
                sound++;
                if (sound==spin.length){
                    sound=0;
                }
                spin[sound].play();
                slotTile.className = "b"+(parseInt(slotTile.className.substring(1))+1)
            }

            var i4 = 0;
            function multiplier() {
                slotTile = document.getElementById("multiplier");

                i4++;
                if (i4 >= numeberSlot4) {
                    // coin[3].play();
                    clearInterval(SpinMultiplier);
                    return null;
                }
                var className = slotTile.className;
                var regex = /b([9]|1[0-3])/; 
                if (regex.test(className)) {
                    var currentNumber = parseInt(slotTile.className.substring(1));
                    if (currentNumber < 13) {
                        slotTile.className = "b" + (currentNumber + 1);
                        if (slotTile.className == "b13") {
                            changeMultiplier()           
                        }
                    } else {
                        slotTile.className = "b9";
                    }
                } else {
                    slotTile.className = "b9";
                }
            }

            function changeMultiplier() {
                multiplier = document.getElementById("multiplier");

                var is_true = 0;
                var randomNumber = Math.random();

                if (multiplier.className == "b9") {
                    if (randomNumber <= 0.45) {
                        is_true = 1;
                    } else {
                        multiplier.className = "b9"
                    }
                }else if (multiplier.className == "b10"){
                    if (randomNumber <= 0.25) {
                        is_true = 1;
                    } else {
                        multiplier.className = "b9"
                    }
                }else if (multiplier.className == "b11"){
                    if (randomNumber <= 0.15) {
                        is_true = 1;
                    } else {
                        multiplier.className = "b9"
                    }
                }else if (multiplier.className == "b12"){
                    if (randomNumber <= 0.1) {
                        is_true = 1;
                    } else {
                        multiplier.className = "b9"
                    }
                }else if (multiplier.className == "b13"){
                    if (randomNumber <= 0.05) {
                        is_true = 1;
                    } else {
                        multiplier.className = "b9"
                    }
                }
            }

            function change() {
                slot1 = document.getElementById("slot1");
                slot2 = document.getElementById("slot2");
                slot3 = document.getElementById("slot3");

                var is_true = 0;
                var randomNumber = Math.random();
                // Calculate winning condition with 5% probability (0.05)
                if (slot1.className == "b1" && slot2.className == "b1") {
                    if (randomNumber <= 0.05) {
                        is_true = 1;
                    } else {
                        slot2.className = "b"+(parseInt(slot2.className.substring(1))+1)
                    }
                }else if (slot1.className == "b1" && slot2.className == "b1" && slot3.className == "b1"){
                    if (randomNumber <= 0.02) {
                        is_true = 1;
                    } else {
                        slot3.className = "b"+(parseInt(slot3.className.substring(1))+1)
                    }
                }

                return true;
            }

            function changeFreeSpin() {
                slot1 = document.getElementById("slot1");
                slot2 = document.getElementById("slot2");
                slot3 = document.getElementById("slot3");

                var is_true = 0;
                var randomNumber = Math.random();
                
                if (slot1.className == "b4" || slot2.className == "b4" || slot3.className == "b4"){
                    if (slot1.className == "b4" && slot2.className == "b4" && slot3.className == "b4") {
                        if (randomNumber <= 0.5) {
                            is_true = 1;
                        } else {
                            slot3.className = "b"+(parseInt(slot2.className.substring(1))+1);
                        }   
                    }else if (slot1.className == "b4" && slot2.className != "b4") {
                        slot3.className = "b4";
                    }else if (slot1.className != "b4" && slot2.className == "b4") {
                        slot3.className = "b4";
                    }
                }else if (slot1.className == "b5" || slot2.className == "b5" || slot3.className == "b5"){
                    if (slot1.className == "b5" && slot2.className == "b5" && slot3.className == "b5") {
                        if (randomNumber <= 0.4) {
                            is_true = 1;
                        } else {
                            slot3.className = "b"+(parseInt(slot2.className.substring(1))+1);
                        }   
                    }else if (slot1.className == "b5" && slot2.className != "b5") {
                        slot3.className = "b5";
                    }else if (slot1.className != "b5" && slot2.className == "b5") {
                        slot3.className = "b5";
                    }
                }else if (slot1.className == "b6" || slot2.className == "b6" || slot3.className == "b6"){
                    if (slot1.className == "b6" && slot2.className == "b6" && slot3.className == "b6") {
                        if (randomNumber <= 0.3) {
                            is_true = 1;
                        } else {
                            slot3.className = "b"+(parseInt(slot2.className.substring(1))+1);
                        }   
                    }else if (slot1.className == "b6" && slot2.className != "b6") {
                        slot3.className = "b6";
                    }else if (slot1.className != "b6" && slot2.className == "b6") {
                        slot3.className = "b6";
                    }
                }else if (slot1.className == "b2" || slot2.className == "b2" || slot3.className == "b2"){
                    if (slot1.className == "b2" && slot2.className == "b2" && slot3.className == "b2") {
                        if (randomNumber <= 0.2) {
                            is_true = 1;
                        } else {
                            slot3.className = "b"+(parseInt(slot2.className.substring(1))+1);
                        }   
                    }else if (slot1.className == "b2" && slot2.className != "b2") {
                        slot3.className = "b2";
                    }else if (slot1.className != "b2" && slot2.className == "b2") {
                        slot3.className = "b2";
                    }
                }else if (slot1.className == "b3" || slot2.className == "b3" || slot3.className == "b3"){
                    if (slot1.className == "b3" && slot2.className == "b3" && slot3.className == "b3") {
                        if (randomNumber <= 0.1) {
                            is_true = 1;
                        } else {
                            slot3.className = "b"+(parseInt(slot2.className.substring(1))+1);
                        }   
                    }else if (slot1.className == "b3" && slot2.className != "b3") {
                        slot3.className = "b3";
                    }else if (slot1.className != "b3" && slot2.className == "b3") {
                        slot3.className = "b3";
                    }
                }

                return true;
            }

        }

        function testWin(){
            var slot1 = document.getElementById("slot1").className
            var slot2 = document.getElementById("slot2").className
            var slot3 = document.getElementById("slot3").className

            if  (
                    (
                        ( slot1 == slot2 && slot2 == slot3 ) ||
                        ( slot1 == slot2 && (slot1 != 'b7' && slot2 != 'b7') ) ||
                        ( slot1 == slot3 && (slot1 != 'b7' && slot3 != 'b7') ) ||
                        ( slot2 == slot3 && (slot2 != 'b7' && slot3 != 'b7') )
                    )
                )   {
                if ( (slot1 == "b7" && slot2 == "b7" && slot3 == "b7") ){
                    text.innerHTML = "FREE SPIN 10x!";
                    Sfree_spin(10, 'add_free_spin')
                } else if ((slot1 == slot2 && slot2 == slot3)) {
                    text.innerHTML = "BIG WIN!";
                }else{
                    text.innerHTML = "YOU WIN!";
                }

                var box1 = parseInt(slot1.substring(1));
                var box2 = parseInt(slot2.substring(1));
                var box3 = parseInt(slot3.substring(1));
                addWin(box1, box2, box3);

                status.style.background = "#3e962aa9";
                // document.getElementById("body").style.background="#162511";
                confeti()
                win.play();
                blinkId = setInterval(blinkText, 500);
            }else{
                text.innerHTML = "YOU LOSE!"
                status.style.background = "#962a2aa9"
                // document.getElementById("body").style.background="#251111";
                HisPlay("slot", 0.3, 0, "lose")
                lose.play();
            }
            doing = false;

            // checkPlay();
            
        }

        function main()
        {
            toggleAudio()
            leaderboardScores()
        }

        function toggleAudio(){
            if (!audio){
                audio = !audio;
                for (var x of spin){
                    x.volume = 0.5;
                }
                for (var x of coin){
                    x.volume = 0.5;
                }
                win.volume = 1.0;
                lose.volume = 1.0;
            }else{
                audio = !audio;
                for (var x of spin){
                    x.volume = 0;
                }
                for (var x of coin){
                    x.volume = 0;
                }
                win.volume = 0;
                lose.volume = 0;
            }

            if (audio) {
                document.getElementById("audio").src = "{{asset('assets/slot/src/icons/audioOn.png')}}";
            }else{
                document.getElementById("audio").src = "{{asset('assets/slot/src/icons/audioOff.png')}}";
            }
        }

        function randomInt(min, max){
            return Math.floor((Math.random() * (max-min+1)) + min);
        }

        function confeti(){
            var confettiSettings = { target: 'my-canvas' };
            var confetti = new ConfettiGenerator(confettiSettings);
            confetti.render();
            confe.classList.add("active")
        }

        function blinkText(){
            if(blink){
                text.style = "visibility: hidden"
            }
            else{
                text.style = "visibility: visible"
            }
            blink = !blink
        }

        function leaderboardScores(){
            var query = firebase.database().ref('/scores').orderByChild('score').limitToLast(10)
            var leader_scores = new Array();
            query.once('value', function (snapshot) {
                snapshot.forEach(function (childSnapshot) {
                    var name = childSnapshot.key.split("-")[0]
                    leader_scores.push([name, childSnapshot.val()["score"]])
                });

                var leaderLines = []
                leader_scores = leader_scores.reverse()
                for(var i=0; i<10; i++){
                    leaderLines[i] = document.getElementById("score"+(i+1).toString())
                    leaderLines[i].innerText = leader_scores[i][0] + ": " + leader_scores[i][1]
                }
            });
        }
        
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function balance(amount_bet) 
        {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/playS",
                method: 'POST',
                dataType: 'json',
                data: {
                    amount_bet: amount_bet
                },
                success: function (response) {
                    $('#wallet-user-general').html(numberWithCommas(response.wallet));
                    global_var.balance = response.balance;
                    // if (response.ttl_free_spin == 0) {
                    //     $('#multiplier-real').hide();
                    //     global_var.is_free_spin = false;
                    // }else{
                    //     $('#multiplier-real').show();
                    //     global_var.is_free_spin = true;
                    // }
                }
            });
        }

        function Sfree_spin(free, type)
        {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/SfreeSpin",
                method: 'POST',
                dataType: 'json',
                data: {
                    free: free,
                    type: type
                },
                success: function (response) {
                    // $('#wallet-user-general').html(numberWithCommas(response.wallet));
                    global_var.ttl_free_spin = response.ttl_free_spin;
                    global_var.balance = response.balance;
                }
            });
        }

        function addWin(box1, box2, box3){
            // console.log(box1, box2, box3);

            if (global_var.is_free_spin) {
                var multiplier = document.getElementById("multiplier").className;    
                var multiplier_win = parseInt(multiplier.substring(1));
            }else{
                var multiplier = '';
                var multiplier_win = '';
            }
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/playSW",
                method: 'POST',
                dataType: 'json',
                data: {
                    box1: box1,
                    box2: box2,
                    box3: box3,
                    multiplier_win: multiplier_win,
                },
                success: function (response) {
                    $('#wallet-user-general').html(numberWithCommas(response.wallet));
                    global_var.balance = response.balance;

                    HisPlay("slot", 0.5, response.win_amount, "win")
                }
            });
        }

        function buy_free_spin() {
            if (global_var.balance < 30) {
                Swal.fire({
                    text: "You don't have enough balance, please add more balance to buy this feature.",
                    icon: "warning"
                });
            }else{
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
                            url: "/SfreeSpin",
                            method: 'POST',
                            dataType: 'json',
                            data: {
                                free: 30,
                                type: "buy_free_spin"
                            },
                            success: function (response) {
                                Swal.fire({
                                    title: "Success",
                                    text: "Success! You Get 10x Free Spin!",
                                    icon: "success"
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
            }
        }

        function HisPlay(game, bet, win_amount, result) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/HisPlay",
                method: 'POST',
                dataType: 'json',
                data: {
                    game: game,
                    bet: bet,
                    win_amount: win_amount,
                    result: result
                },
                success: function (response) {
                    global_var.balance = response.balance;
                    // console.log(global_var.form_spin);
                    if (response.ttl_free_spin == 0) {
                        $('#multiplier-real').hide();
                        global_var.is_free_spin = false;
                    }else{
                        $('#multiplier-real').show();
                        global_var.is_free_spin = true;
                    }
                    setTimeout(checkPlay, 4000)
                    // checkPlay();
                }
            });
        }

        function checkPlay()
        {
            var form_spin = parseInt($('#form_spin').val());
            // console.log(form_spin);
            console.log(global_var.form_spin);
            if (global_var.form_spin === 1 || global_var.form_spin === '1') {
                $('.button-play').prop('disabled', false);
                global_var.is_continue = false;
            }else{
                // console.log('masuk anjing');
                global_var.form_spin = global_var.form_spin-1;
                global_var.is_continue = true;
                $('#form_spin').val(global_var.form_spin);
                $('.button-play').prop('disabled', false);
                // doSlot(global_var.form_spin,0,0,0);
                // setTimeout(checkPlay, 3500)
            }
            $('#Gira').removeClass("disable_spin");

            if (global_var.ttl_free_spin == 0) {
                $('#spin-minus').prop('disabled', false);
                $('#spin-plus').prop('disabled', false);
            }
        }
    </script>
@endsection