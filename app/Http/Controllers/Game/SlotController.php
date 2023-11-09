<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\WinSlot;
use App\Models\Bonus;
use App\Models\HisPlay;

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

        HisPlay::create([
            'id_user' => Auth::user()->id,
            'bet' => $request->amount_bet,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return [
            'status'=> true,
            'wallet' => $amount_bet,
            'free_spin' => Auth::user()->bonus_slot->free_spin,
        ];
    }

    public function playSW(Request $request)
    {
        $box1 = $request->box1;
        $box2 = $request->box2;
        $box3 = $request->box3;
        $multiplier = $request->multiplier_win;
        
        // dd($request);

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

                // $mod_user->update([
                //     'wallet' => $amount_bet
                // ]); 
            }elseif ($maxValue == 3) {
                $amount_bet = ($mod_user->wallet + $model->tiga_symbol);
                $amount_bet = round($amount_bet, 2);

                // $mod_user->update([
                //     'wallet' => $amount_bet
                // ]); 
            }
        }

        if ($multiplier != '' && Auth::user()->bonus_slot->free_spin > 0) {
            if ($multiplier == 9) {
                $amount_bet = round(($amount_bet * 2),2);    
            }
            if ($multiplier == 10) {
                $amount_bet = round(($amount_bet * 3),2);    
            }
            if ($multiplier == 11) {
                $amount_bet = round(($amount_bet * 4),2);    
            }
            if ($multiplier == 12) {
                $amount_bet = round(($amount_bet * 5),2);    
            }
            if ($multiplier == 13) {
                $amount_bet = round(($amount_bet * 10),2);    
            }
            // dd($multiplier);
        }

        $mod_user->update([
            'wallet' => $amount_bet
        ]); 

        return [
            'status'=> true,
            'wallet' => $amount_bet,
            'free_spin' => Auth::user()->bonus_slot->free_spin,
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

            HisPlay::create([
                'id_user' => Auth::user()->id,
                'bet' => 0.3,
                'created_at' => date('Y-m-d H:i:s'),
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
                $ttl_free = ($model->free_spin + 10);
                $model->update([
                    'free_spin'=> $ttl_free
                ]); 
            }
        }else if ($request->type == 'buy_free_spin') {
            if (!$model) {
                $model = Bonus::create([
                    'id_user' => Auth::user()->id,
                    'game' => 'slot',
                    'free_spin' => 10,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }else{
                $ttl_free = ($model->free_spin + 10);
                $model->update([
                    'free_spin'=> $ttl_free
                ]); 
            }

            $mod_user = User::findOrFail(Auth::user()->id);
            $amount_bet = ($mod_user->wallet - 30);
            $amount_bet = round($amount_bet, 2);

            $mod_user->update([
                'wallet' => $amount_bet
            ]); 

        }


        return [
            'status' => true,
            'free_spin' => Auth::user()->bonus_slot->free_spin,
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
