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
<link rel="stylesheet" type="text/css" href="{{asset('assets/slot/style.css')}}" media="screen"/>
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
            @include('layouts.header-side')
        </div>
        <!-- PAGE-HEADER END -->
        {{-- <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <img src="{{asset('assets/images/logo/logo1.jpg')}}" alt="" srcset="">
            </div>
        </div> --}}
        @include('layouts.topup.topup')
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
                                                <h3 class="stats-title">Rules <i class="fa fa-info-circle"></i></h3>
                                            </tr>
                                            <tr>
                                                {{-- <td><h3>Free Spin : <span id="ttl_free_spin">{{Auth::user()->bonus_slot->free_spin}}</span></h3></td> --}}
                                                {{-- <td><h5 class="text-center">1x Spin = 0.3 Trx</h5></td> --}}
                                                <h5 class="text-center">1x Spin = 0.3 Trx</h5>
                                            </tr>
                                        </td>
                                    </table>
                                    <table class="table-bordered w-100">
                                        <tr>
                                            <th></th>
                                            <th class="text-center">2 Symbol</th>
                                            <th class="text-center">3 Symbol</th>

                                            <th></th>
                                            <th class="text-center">2 Symbol</th>
                                            <th class="text-center">3 Symbol</th>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><img src="{{asset('assets/slot/src/tiles/new/Bronze_Coin.png')}}" alt="" srcset="" width="30px"></td>
                                            <td class="text-center">0.05</td>
                                            <td class="text-center">0.2</td>

                                            <td class="text-center"><img src="{{asset('assets/slot/src/tiles/new/Silver_Coin.png')}}" alt="" srcset="" width="30px"></td>
                                            <td class="text-center">0.08</td>
                                            <td class="text-center">0.32</td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th class="text-center">2 Symbol</th>
                                            <th class="text-center">3 Symbol</th>

                                            <th></th>
                                            <th class="text-center">2 Symbol</th>
                                            <th class="text-center">3 Symbol</th>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><img src="{{asset('assets/slot/src/tiles/new/Gold_Coin.png')}}" alt="" srcset="" width="30px"></td>
                                            <td class="text-center">0.1</td>
                                            <td class="text-center">0.4</td>

                                            <td class="text-center"><img src="{{asset('assets/slot/src/tiles/new/Buck_Cents.png')}}" alt="" srcset="" width="30px"></td>
                                            <td class="text-center">0.18</td>
                                            <td class="text-center">0.72</td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th class="text-center">2 Symbol</th>
                                            <th class="text-center">3 Symbol</th>

                                            <th></th>
                                            <th class="text-center">2 Symbol</th>
                                            <th class="text-center">3 Symbol</th>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><img src="{{asset('assets/slot/src/tiles/new/Cash_Dollar.png')}}" alt="" srcset="" width="30px"></td>
                                            <td class="text-center">0.25</td>
                                            <td class="text-center">1</td>

                                            <td class="text-center"><img src="{{asset('assets/slot/src/tiles/new/Bitcoin.png')}}" alt="" srcset="" width="30px"></td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">3</td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th class="text-center">2 Symbol</th>
                                            <th class="text-center">3 Symbol</th>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><img src="{{asset('assets/slot/src/tiles/new/TRX.png')}}" alt="" srcset="" width="30px"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center">Free Spin 10x</td>
                                        </tr>
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
                                    {{-- <div class="row mt-5">
                                        <div class="col-md-12 mb-3">
                                            <button class="btn btn-danger w-100 button-play" id="tren_red" onclick="doSlot(0)">Spin 1x</button>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <button class="btn btn-success w-100 button-play" id="tren_grenn" onclick="doSlot(4)">Spin 5x</button>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <button class="btn btn-warning w-100 button-play" id="tren_moon" onclick="doSlot(9)">Spin 10x</button>
                                        </div>
                                    </div> --}}
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
                                            <button class="btn btn-danger" style="height: 40px; margin-top: 40px; margin-right: 10px;" id="spin-minus" {{ $is_free_spin ? 'disabled' : '' }}><i class="fa fa-minus"></i></button>
                                            <button onclick="Spin()" id="Gira" class="button-play">SPIN</button>
                                            {{-- <section onclick="doSlot()" id="Gira">SPIN</section> --}}
                                            <button class="btn btn-success" style="height: 40px; margin-top: 40px; margin-left: 10px;" id="spin-plus" {{ $is_free_spin ? 'disabled' : '' }}><i class="fa fa-plus"></i></button>
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
@endsection

@section('js')
<script src="{{asset('assets/slot/confetti.js')}}"></script>
{{-- <script src="{{asset('assets/slot/main.js')}}"></script>  --}}
<!-- To Uglify: https://skalman.github.io/UglifyJS-online/ -->
{{-- <script src="{{asset('assets/slot/auth.js')}}"></script> --}}
    <script>
        var bet = 0.3;
        var global_var = [];
        $(document).ready(function () {
            global_var.balance = '{{Auth::user()->wallet}}';
            if (balance <= 0) {
                // console.log(balance)
                $('.button-play').prop('disabled', true);
            }
            
            $("#spin-minus").click(function(){
                var form_spin = parseInt($('#form_spin').val());
                if (form_spin == 1) {
                    bet = 0.3;
                    // console.log(bet)
                    $('#form_spin').val(1);
                }else{
                    bet -= 0.3;
                    // console.log(bet)
                    $('#form_spin').val(form_spin-1);
                }
                $('#spin-plus').prop('disabled', false);
            });

            $("#spin-plus").click(function(){
                var form_spin = parseInt($('#form_spin').val());
                bet += 0.3;
                // console.log(bet)
                if (bet >= (global_var.balance-0.3) ) {
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
            doSlot()
            }
        });

        function Spin(){
            var form_spin = parseInt($('#form_spin').val());
            doSlot(form_spin-1)
        }

        global_var.free_spin = {{$is_free_spin ? Auth::user()->bonus_slot->free_spin : 0}};
        function doSlot(role_spin = 1){
            max_spin = role_spin;
            var is_free_spin = '{{$is_free_spin}}';
            if (!is_free_spin) {
                balance(0.3);     
            }else{
                global_var.free_spin -= 1; 
                Sfree_spin(global_var.free_spin, 'minus_free_spin')
            }
            // console.log(global_var.free_spin);
            
            $('.button-play').prop('disabled', true);

            if(blinkId != 0){
                clearInterval(blinkId);
            }
            confe.classList.remove("active")
            if (doing){return null;}
            doing = true;
            var numChanges = randomInt(1,4)*7
            var numeberSlot1 = numChanges+randomInt(1,7)
            var numeberSlot2 = numChanges+2*7+randomInt(1,7)
            var numeberSlot3 = numChanges+4*7+randomInt(1,7)

            // console.log(numChanges, numeberSlot1, numeberSlot2, numeberSlot3);
            var i1 = 0;
            var i2 = 0;
            var i3 = 0;
            var sound = 0
            text.style = "visibility: visible"
            text.innerHTML = "SPINNING..."
            status.style.background = "#606060"
            // document.getElementById("body").style.background="#0f0f0f";
            slot1 = setInterval(spin1, 50);
            slot2 = setInterval(spin2, 50);
            slot3 = setInterval(spin3, 50);
            function spin1(){
                slotTile = document.getElementById("slot1");

                i1++;
                if (i1>=numeberSlot1){
                    coin[0].play()
                    clearInterval(slot1);
                    return null;
                }
                if (slotTile.className=="b7"){
                    slotTile.className = "b0";
                }
                slotTile.className = "b"+(parseInt(slotTile.className.substring(1))+1)
            }
            function spin2(){
                slotTile1 = document.getElementById("slot1");
                slotTile = document.getElementById("slot2");

                i2++;
                if (i2>=numeberSlot2){
                    coin[1].play()
                    clearInterval(slot2);
                    if (slotTile.className == "b1" && slotTile1.className == "b1") {
                        change()
                    }
                    return null;
                }
                if (slotTile.className=="b7"){
                    slotTile.className = "b0";
                }
                slotTile.className = "b"+(parseInt(slotTile.className.substring(1))+1)
            }
            function spin3(){
                slotTile1 = document.getElementById("slot1");
                slotTile2 = document.getElementById("slot2");
                slotTile = document.getElementById("slot3");

                i3++;
                if (i3>=numeberSlot3){
                    coin[2].play()
                    clearInterval(slot3);
                    if (slotTile1.className == "b1" || slotTile2.className == "b1" || slotTile.className == "b1") {
                        change()
                    }
                    testWin();
                    return null;
                }
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
                }else if (slot1.className || "b1" && slot2.className || "b1" && slot3.className || "b1"){
                    if (randomNumber <= 0.02) {
                        is_true = 1;
                    } else {
                        slot3.className = "b"+(parseInt(slot3.className.substring(1))+1)
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
                lose.play();
            }
            doing = false;

            // checkPlay();
            setTimeout(checkPlay, 3500)
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

        function updateWins(){	
            // if (login == true){
            //     firebase.database().ref('Users/' + id + '/data/wins').once('value',(snap)=>{
            //         if (snap.val() != null){
            //             wins =parseInt(snap.val())
            //             wins_element.innerHTML = "Wins: " + wins.toString()
            //         }
            //         else{
            //             wins = 0
            //             firebase.database().ref('Users/' + id + '/data').set({score:0, wins:0});
            //         }
            //     });
            //     firebase.database().ref('Users/' + id + '/data/score').once('value',(snap)=>{
            //         if (snap.val() != null){
            //             score =parseInt(snap.val())
            //             score_element.innerHTML = "Score: " + score.toString()
            //         }else{
            //             score = 0
            //             firebase.database().ref('Users/' + id + '/data').set({score:0, wins:0});
            //             firebase.database().ref('scores/' + userName + '-' + id).set({score: 0});
            //         }
                    
            //     });
            // }
            // update balance win
        }

        function addWin(box1, box2, box3){
            // console.log(box1, box2, box3);
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
                },
                success: function (response) {
                    $('#wallet-user-general').html(numberWithCommas(response.wallet));
                }
            });
            // if (login == true){
                // firebase.database().ref('Users/' + id + '/data').set({score:score+addScore, wins:wins+1});
                // firebase.database().ref('scores/' + userName + '-' + id).set({score: score+addScore});
                updateWins()
            // }
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

        function checkPlay()
        {
            if (max_spin == 0) {
                $('.button-play').prop('disabled', false);
            }else{
                $('#form_spin').val(max_spin)
                max_spin = max_spin-1;
                doSlot(max_spin);
            }

            if (global_var.free_spin == 0) {
                $('#spin-minus').prop('disabled', false);
                $('#spin-plus').prop('disabled', false);
            }
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
                }
            });
        }
    </script>
@endsection

@include('layouts.topup.js-topup')