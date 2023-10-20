<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MPayout;
use App\Models\User;
use App\Models\HisTopup;

use Illuminate\Support\Facades\Auth;

class AmountController extends Controller
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
        //
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

    public function sum_amount(Request $request)
    {
        // dd($request);
        $get_payout = MPayout::where(['persen' => $request->win_change])->first();
        $mod_user = User::findOrFail(Auth::user()->id);

        $amount_bet = str_replace(',','',$request->amount_bet);
        $amount_bet = (float)$amount_bet;

        $data = [];
        if ($request->result_game == "WIN") {
            $hitung = round( ($amount_bet * $get_payout->payout) - $amount_bet, 2);
            $wallet = $hitung + $mod_user->wallet;

            $mod_user->update([
                'wallet' => $wallet
            ]);
            
            $data['amount_bet'] = $amount_bet;
            $data['payout'] = $get_payout->payout;
            $data['wallet'] = $mod_user->wallet;
            $data['hitung'] = $hitung;
        }elseif ($request->result_game == "LOSE") {
            $mod_user->update([
                'wallet' => ($mod_user->wallet - $amount_bet)
            ]);
        }

        return [
            'status' => true,
            'message' => 'ok',
            'wallet' => $mod_user->wallet,
            'data' => $data
        ];
    }

    public function topup(Request $request)
    {
        // dd($request);
        $model = HisTopup::create([
            'id_user' => Auth::user()->id,
            'saldo' => $request->saldo,
            'status' => "Pending",
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return true;
    }
}
