<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\WinSlot;
use App\Models\Bonus;

use Illuminate\Support\Facades\Auth;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('game.slot.main1',[

        ]);
    }

    public function result_play(Request $request)
    {
        $mod_user = User::findOrFail(Auth::user()->id);

        $data = [];
        if ($request->result_game == "WIN") {
            $mod_user->update([
                // 'wallet' => $wallet
            ]);
        }elseif ($request->result_game == "LOSE") {
            $mod_user->update([
                // 'wallet' => ($mod_user->wallet - $amount_bet)
            ]);
        }

        return [
            'status' => true,
            'message' => 'ok',
            'wallet' => $mod_user->wallet,
            'data' => $data
        ];
    }

    public function playS(Request $request)
    {
        $mod_user = User::findOrFail(Auth::user()->id);
        $amount_bet = ($mod_user->wallet - $request->amount_bet);
        $amount_bet = round($amount_bet, 2);

        $mod_user->update([
            'wallet' => $amount_bet
        ]); 

        return [
            'status'=> true,
            'wallet' => $amount_bet,
        ];
    }

    public function playSW(Request $request)
    {
        $box1 = $request->box1;
        $box2 = $request->box2;
        $box3 = $request->box3;

        $arr = [$box1, $box2, $box3];
        $find = array_count_values($arr);
        $maxValue = max($find);
        $mostCommonValue = array_search($maxValue, $find);
        // dd($mostCommonValue);

        $model = WinSlot::where(['code_symbol' => $mostCommonValue])->first();
        $mod_user = User::findOrFail(Auth::user()->id);
        if ($model) {
            if ($maxValue == 2) {
                $amount_bet = ($mod_user->wallet + $model->dua_symbol);
                $amount_bet = round($amount_bet, 2);

                $mod_user->update([
                    'wallet' => $amount_bet
                ]); 
            }elseif ($maxValue == 3) {
                $amount_bet = ($mod_user->wallet + $model->tiga_symbol);
                $amount_bet = round($amount_bet, 2);

                $mod_user->update([
                    'wallet' => $amount_bet
                ]); 
            }
        }

        return [
            'status'=> true,
            'wallet' => $amount_bet,
        ];

    }

    public function freeSpin(Request $request)
    {
        // dd($request);
        $model = Bonus::where(['id_user' => Auth::user()->id, 'game' => 'slot'])->first();
        if ($request->type == 'minus_free_spin') {
            $model->update([
                'free_spin'=> $request->free
            ]);
        }else if ($request->type == 'add_free_spin') {
            if (!$model) {
                $model = Bonus::create([
                    'id_user' => Auth::user()->id,
                    'game' => 'slot',
                    'free_spin' => 10,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }else{
                $model->update([
                    'free_spin'=> 10
                ]); 
            }
        }

        return [
            'status' => true
        ];
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
}
