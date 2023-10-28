<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

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
