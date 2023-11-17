@extends('layouts.main')

@section('content')
<style>
    .float-md-end {
        float: left !important;
    }
    .win{
        color: green;
    }
    .lose{
        color: red;
    }

.otp-field {
  flex-direction: row;
  column-gap: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.otp-field input {
  height: 45px;
  width: 42px;
  border-radius: 6px;
  outline: none;
  font-size: 1.125rem;
  text-align: center;
  border: 1px solid #ddd;
}
.otp-field input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}
.otp-field input::-webkit-inner-spin-button,
.otp-field input::-webkit-outer-spin-button {
  display: none;
}

.resend {
  font-size: 12px;
}

.footer {
  position: absolute;
  bottom: 10px;
  right: 10px;
  color: black;
  font-size: 12px;
  text-align: right;
  font-family: monospace;
}

.footer a {
  color: black;
  text-decoration: none;
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
                        <h3>Referral Code : {{Auth::user()->my_referral_code}} <button class="btn btn-primary" title="Copy Link Referral" onclick="copy_referral_link('{{Auth::user()->my_referral_code}}')"><i class="fa fa-clipboard"></i></button></h3>
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
                            <div class="col-12 mt-2">
                                <table id="table-history" class="table table-striped nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Bet</th>
                                            <th class="text-center">Result Game</th>
                                            <th class="text-center">Win Amount</th>
                                            <th class="text-center">Play At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($history as $item)
                                        <tr>
                                            <td class="text-center">{{$item['bet']}}</td>
                                            <td class="text-center {{$item['result'] == 'win' ? 'win' : 'lose'}}">{{$item['result']}}</td>
                                            <td class="text-center">{{$item['win_amount']}}</td>
                                            <td class="text-center">{{$item['created_at']}}</td>
                                        </tr>    
                                        @endforeach
                                    </tbody>
                                </table>
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
            $('#table-history').DataTable({
                "order": [[ 3, "desc" ]],
                "scrollX": true
            });
            

            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/654e2e6d958be55aeaae67dd/1hesmang0';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        });

        function slide_game() {
            window.location.href = "{{URL::to('slide')}}";
        }

        function trenball() {
            window.location.href = "{{URL::to('trenball')}}";
        }

        function copy_referral_link(referral) {
            var link = "{{url('')}}"+"/register?referral="+referral;
            // console.log(link);
            navigator.clipboard.writeText(link);
        }
    </script>
@endsection