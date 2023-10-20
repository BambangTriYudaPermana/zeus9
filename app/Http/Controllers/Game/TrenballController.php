<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;


class TrenballController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('game.trenball.main',[

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function PlayTrenBall(Request $request)
    {
        // dd($request);
        $min = (int)$request->min;
        $max = (float)$request->max;
        $amount = (int)$request->amount;
        $roll = 40-1;

        $get_win = Auth::user()->ttl_win;
        $game = '';
        if ($get_win > 0) {
            if ($amount > 100) {
                $game = 'lose';
            }else{
                if (rand(0,1)) {
                    $game = 'win';
                }else {
                    $game = 'lose';
                }
            }
        }
        // dd($max);        
        $number = $this->getNumber($game, $min, $max, $roll, $request->type, $amount);
        return $number;
    }

    function getNumber($game, $min, $max, $roll, $type_play, $amount)
    {
        $model = User::findOrFail(Auth::user()->id);

        $data_number = [0];
        if ($game == 'win') {
            $start = 0;
            $randomNumber = mt_rand($start, $max); 

            $ttl_win = ($model->ttl_win)-1;
            $balance = ($model->wallet) + $amount;

            $model->wallet = $balance;
            $model->ttl_win = $ttl_win;
            $model->save();
        }else{
            if ($type_play == 'red') {
                $min = $min+=1000;
                $max = $max+=1000;
            }elseif ($type_play == 'green') {
                $min = $min+=1000;
                $max = $max+=1000;
            }else{
                $min = 100;
                $max = 200;
            }

            $balance = ($model->wallet) - $amount;

            $model->wallet = $balance;
            $model->save();

            $start = $min;
            $randomNumber = mt_rand($start, $max); 
            // dump($start, $max+=10);
        }

        $win_number = $randomNumber / 100; 
        // dd($win_number, $max);
        $selisih = ($win_number / $roll);

        $nilai = 0;
        for ($i=0; $i < $roll; $i++) { 
            $nilai += $selisih;
            array_push($data_number, number_format($nilai, 2));   
        }
        $model = User::findOrFail(Auth::user()->id);

        // dd($data_number, $win_number, $selisih);
        return [
            'status' => $game == "win" ? true : false,
            'data_number' => $data_number,
            'balance' => $model->wallet,
            'win_number' => $win_number,
            'min' => $min,
            'max' => $max,
            'start' => $start
            // 'ttl_win' => Auth::user()->ttl_win,
            // 'abc' => $ttl_win
        ];
    }
}
