<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
    ActivityTransaction,
    MPayout,
    User,
    HisTopup
};

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

        // $amount_bet = str_replace(',','',$request->amount_bet);
        // $amount_bet = (float)$amount_bet;
        $amount_bet = (float)$request->amount_bet;
        // dd($amount_bet);

        $data = [];
        if ($request->result_game == "WIN") {
            $balance = round($mod_user->wallet - $amount_bet, 4);
            $hitung = round( ($amount_bet * $get_payout->payout), 4);
            $wallet = round($hitung + $balance, 4);

            $mod_user->update([
                'wallet' => $wallet
            ]);
            
            $data['amount_bet'] = $amount_bet;
            $data['payout'] = $get_payout->payout;
            $data['wallet'] = $mod_user->wallet;
            $data['hitung'] = $hitung;
        }elseif ($request->result_game == "LOSE") {
            $balance = round($mod_user->wallet - $amount_bet, 4);
            // dd($balance);
            $mod_user->update([
                'wallet' => $balance
            ]);
        }

        return [
            'status' => true,
            'message' => 'ok',
            'wallet' => $mod_user->wallet,
            'data' => $data,
            'amount_bet' => $amount_bet,
            // 'balance' => $balance
        ];
    }

    public function topup(Request $request)
    {
        // dd($request);
        // $model = HisTopup::create([
        //     'id_user' => Auth::user()->id,
        //     'saldo' => $request->saldo,
        //     'status' => "Pending",
        //     'created_at' => date('Y-m-d H:i:s')
        // ]);
        $model = ActivityTransaction::create([
            'id_user' => Auth::user()->id,
            'type' => "Deposit",
            'amount' => $request->amount,
            'status' => "Pending",
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return true;
    }

    public function withdraw(Request $request)
    {
        // dd($request);
        $mod_user = User::findOrFail(Auth::user()->id);
        $balance = $mod_user->wallet;
        
        $mod_user->update([
            'wallet' => ($balance - $request->amount)
        ]);
        
        $model = ActivityTransaction::create([
            'id_user' => Auth::user()->id,
            'type' => "Withdrawal",
            'amount' => $request->amount,
            'address_destination' => $request->address_destination,
            'status' => "Pending",
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return true;
    }
}
