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
        @include('layouts.topup')
        <!-- ROW-1 -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card" id="body">
                    <div class="card-body">
                        <div class="row">
                            {{-- side --}}
                            <div class="col-md-3">
                                <div>
                                    <table>
                                        <td>
                                            <tr class="mb-10">
                                                <h3 class="stats-title">Rules <i class="fa fa-info-circle"></i></h3>
                                            </tr>
                                            {{-- <tr>
                                                <div class="stats-group">
                                                    <h3 id="score">Score: 0</h3>
                                                    <h3 id="wins">Wins: 0</h3>
                                                </div>
                                            </tr> --}}
                                            <tr>
                                                <h5 class="text-center">1x Spin = 0.2 Trx</h5>
                                            </tr>
                                        </td>
                                    </table>
                                </div>
                            </div>
                            {{-- main --}}
                            <div class="col-md-5">
                                <main style="margin-left: 0; width: 100%">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <section id="status"><h3 id="text">WELCOME!</h3></section>
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
                                                <div id="slot1" class="a1"></div>
                                            </div>
                                            <div class="col-md-4 w-30">
                                                <div id="slot2" class="a1"></div>
                                            </div>
                                            <div class="col-md-4 w-30">
                                                <div id="slot3" class="a1"></div>
                                            </div>
                                        </div>
                                    </section>
                                    <div class="row mt-5">
                                        <div class="col-md-12 mb-3">
                                            <button class="btn btn-danger w-100 button-play" id="tren_red" onclick="doSlot(0)">Spin 1x</button>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <button class="btn btn-success w-100 button-play" id="tren_grenn" onclick="doSlot(4)">Spin 5x</button>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <button class="btn btn-warning w-100 button-play" id="tren_moon" onclick="doSlot(9)">Spin 10x</button>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6 d-flex justify-content-center">
                                            <section onclick="doSlot()" id="Gira">SPIN</section>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="bottom">
                                    </div> --}}
                                    <canvas id="my-canvas"></canvas>
                                </main>
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
<script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-database.js"></script>
<script src="{{asset('assets/slot/confetti.js')}}"></script>
{{-- <script src="{{asset('assets/slot/main.js')}}"></script>  --}}
<!-- To Uglify: https://skalman.github.io/UglifyJS-online/ -->
{{-- <script src="{{asset('assets/slot/auth.js')}}"></script> --}}
    <script>
        $(document).ready(function () {
            
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
        var userName = document.getElementById("userName").textContent
        var blinkId = 0;
        var blink = false
        var score = 0
        var wins = 0
        var id = 0

        const firebaseConfig = {
            apiKey: "AIzaSyDrx_IMLOUSSRAKHSh3nT7HABzjPtv0bI4",
            authDomain: "slot-game-8aed2.firebaseapp.com",
            projectId: "slot-game-8aed2",
            storageBucket: "slot-game-8aed2.appspot.com",
            messagingSenderId: "1003739740685",
            appId: "1:1003739740685:web:26755aeb50afdce1cc3344"
        };
        
        firebase.initializeApp(firebaseConfig);

        firebase.auth().onAuthStateChanged(user=>{
            if(user){
            login = true;
            id = firebase.auth().currentUser.uid;
            userName = user.displayName
            console.log(userName)
            updateWins()
            }
            else{
            login = true;
            score_element.innerHTML = "Score: 0"
            wins_element.innerHTML = "Wins: 0"
            }
        })

        window.addEventListener("keydown", (evento) => {
            if (evento.code == "Space") {
            doSlot()
            }
        });

        function doSlot(role_spin = 1){
            max_spin = role_spin;
            // console.log(max_spin);
            balance(0.2); 
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
                i1++;
                if (i1>=numeberSlot1){
                    coin[0].play()
                    clearInterval(slot1);
                    return null;
                }
                slotTile = document.getElementById("slot1");
                if (slotTile.className=="a7"){
                    slotTile.className = "a0";
                }
                slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
            }
            function spin2(){
                i2++;
                if (i2>=numeberSlot2){
                    coin[1].play()
                    clearInterval(slot2);
                    return null;
                }
                slotTile = document.getElementById("slot2");
                if (slotTile.className=="a7"){
                    slotTile.className = "a0";
                }
                slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
            }
            function spin3(){
                i3++;
                if (i3>=numeberSlot3){
                    coin[2].play()
                    clearInterval(slot3);
                    testWin();
                    return null;
                }
                slotTile = document.getElementById("slot3");
                if (slotTile.className=="a7"){
                    slotTile.className = "a0";
                }
                sound++;
                if (sound==spin.length){
                    sound=0;
                }
                spin[sound].play();
                slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
            }
        }

        function testWin(){
            var slot1 = document.getElementById("slot1").className
            var slot2 = document.getElementById("slot2").className
            var slot3 = document.getElementById("slot3").className

            if (
                (
                    (slot1 == slot2 && slot2 == slot3) ||
                    (slot1 == slot2 && slot3 == "a7") ||
                    (slot1 == slot3 && slot2 == "a7") ||
                    (slot2 == slot3 && slot1 == "a7") ||
                    (slot1 == slot2 && slot1 == "a7") ||
                    (slot1 == slot3 && slot1 == "a7") ||
                    (slot2 == slot3 && slot2 == "a7") 
                )
                )   {
                if ( (slot1 == slot2 && slot2 == slot3) && (slot1!="a7" && slot2!="a7" && slot3!="a7") ){
                    text.innerHTML = "BIG WIN!";
                    addWin(500)
                }else if((slot1=="a7" && slot2=="a7" && slot3=="a7")){
                    text.innerHTML = "JACKPOT!";
                    addWin(1000)
                }else{
                    text.innerHTML = "YOU WIN!";
                    addWin(100)
                }
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

        function addWin(addScore){
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
                max_spin = max_spin-1;
                doSlot(max_spin);
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
                url: "/playS/",
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
    </script>
@endsection

@include('layouts.js-topup')