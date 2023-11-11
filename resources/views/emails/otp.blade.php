<x-mail::message>
<!DOCTYPE html>
<html>
<head>
    <title>TrxGame.Online</title>
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1>Welcome To TrxGames</h1>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Dear TrxGames</h3>
                </div>
                <div class="card-body">
                    <p>Thank you for using TrxGames.online, Use This code to complate your action</p>
                    <p>Security Code : <h3>{{$mailData['otp']}}</h3></p>
                    <p>Never share this code with anyone.</p>
                    <p>If you have no requested this, please ignore this message</p>
                </div>
            </div>
        </div>
    </div>
    {{-- <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p> --}}
</body>
</html>

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Regards, TrxGames team<br>

</x-mail::message>
