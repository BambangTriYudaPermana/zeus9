<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
    ActivityTransaction,
    HisTopup,
    User,
    MAddress,
    HisTransaction
};

use Illuminate\Support\Facades\Auth;

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
        // $data = HisTopup::orderBy('created_at', 'DESC')->get();
        if (Auth::user()->id_role == 1) {   //for user
            $data = ActivityTransaction::where(['id_user' => Auth::user()->id])->orderBy('created_at', 'DESC')->get();
            return view('front.transaction',[
                'data' => $data
            ]);
        }else if (Auth::user()->id_role == 2) { //for admin
            $data = ActivityTransaction::orderBy('created_at', 'DESC')->get();
            return view('back.list_topup',[
                'data' => $data
            ]);
        }
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
        // $mod_topup = HisTopup::findOrFail($request->id_transaction);
        $mod_topup = ActivityTransaction::findOrFail($request->id_transaction);
        $mod_user = User::findOrFail($mod_topup->id_user);
        if ($request->status == "acc") {
            $mod_user->update([
                'wallet' => ($mod_user->wallet + $mod_topup->amount),
            ]);

            $mod_topup->update([
                'status' => "Success"
            ]);
        }elseif ($request->status == "sync") {
            $get_address = MAddress::findOrFail($mod_user->id_address);
            $get_data = TrxHelper::getTransactionByAddress($get_address->address, true, true, 10, false);
            // dd($get_data);
            foreach ($get_data as $key => $value) {
                $find = HisTransaction::where(['txID' => $value['txID']])->first();
                // dd($find);
                if (!$find) {
                    if ($mod_topup->amount == $value['amount']) {
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
                            'status' => "Success"
                        ]);

                        $balance = TrxHelper::getBalance($get_address->address);
                        $get_address->update([
                            'balance_address' => $balance
                        ]);
                    }
                    // dd($mod_user->wallet, $value['amount'] ,$mod_topup->amount);
                }else{
                    // dd('gass');
                    if ($mod_topup->amount == $value['amount']) {
                        $mod_topup->update([
                            'status' => "Not Found"
                        ]);
                    }
                }
            }

        }elseif ($request->status == "reject") {
            $mod_topup->update([
                'status' => "Reject"
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
