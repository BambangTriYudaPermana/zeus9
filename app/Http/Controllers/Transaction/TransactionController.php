<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HisTopup;
use App\Models\User;
use App\Models\MAddress;
use App\Models\HisTransaction;

use TrxHelper; 

class TransactionController extends Controller
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
        $data = HisTopup::orderBy('created_at', 'DESC')->get();
        return view('back.list_topup',[
            'data' => $data
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
        // dd($request);
        $mod_topup = HisTopup::findOrFail($request->id_transaction);
        $mod_user = User::findOrFail($mod_topup->id_user);
        if ($request->status == "acc") {
            $mod_user->update([
                'wallet' => ($mod_user->wallet + $mod_topup->saldo),
            ]);

            $mod_topup->update([
                'status' => "success"
            ]);
        }elseif ($request->status == "sync") {
            $get_address = MAddress::findOrFail($mod_user->id_address);
            $get_data = TrxHelper::getTransactionByAddress($get_address->address, true, true, 10, false);
            // dd($get_data);
            foreach ($get_data as $key => $value) {
                $find = HisTransaction::where(['txID' => $value['txID']])->first();
                // dd($find);
                if (!$find) {
                    if ($mod_topup->saldo == $value['amount']) {
                        $result = [];
                        $result[$key]['contractRet'] = $value['contractRet'];
                        $result[$key]['txID'] = $value['txID'];
                        $result[$key]['get_amount'] = $value['get_amount'];
                        $result[$key]['owner_address_hex'] = $value['owner_address_hex'];
                        $result[$key]['to_address_hex'] = $value['to_address_hex'];
                        $result[$key]['amount'] = $value['amount'];
                        $result[$key]['timestamp'] = $value['timestamp'];
                        $result[$key]['date_timestamp'] =$value['date_timestamp'];
                        
                        $addtransaction = TrxHelper::addHisTransaction($result);
                        $mod_user->update([
                            'wallet' => ($mod_user->wallet + $value['amount']),
                        ]);     
    
                        $mod_topup->update([
                            'status' => "success"
                        ]);

                        $balance = TrxHelper::getBalance($get_address->address);
                        $get_address->update([
                            'balance_address' => $balance
                        ]);
                    }
                    // dd($mod_user->wallet, $value['amount'] ,$mod_topup->saldo);
                }else{
                    // dd('gass');
                    if ($mod_topup->saldo == $value['amount']) {
                        $mod_topup->update([
                            'status' => "not found"
                        ]);
                    }
                }
            }

        }elseif ($request->status == "reject") {
            $mod_topup->update([
                'status' => "reject"
            ]);
        }

        return true;
    }

    function addWallet($amount)
    {

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
