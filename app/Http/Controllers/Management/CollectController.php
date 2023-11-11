<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
    AddressCollect,
    MAddress,
    User
};

use TrxHelper; 

class CollectController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::get();
        return view('back.list_collect',[
            'data' => $data
        ]);
    }

    public function UpdateBalance(Request $request)
    {
        $user = User::findOrFail($request->id_user);
        $address = $user->address->address;
        $get_balance = TrxHelper::getBalance($address);

        $MAddress = MAddress::findOrFail($user->id_address);
        $MAddress->update([
            'balance_address' => $get_balance
        ]);

        return [
            'status' => true,
            'message' => 'success'
        ];
    }

    public function TransferBalance(Request $request)
    {
        $user = User::findOrFail($request->id_user);
        $from = $user->address->address;
        $privateKey = $user->address->private_key;
        $amount = $user->address->balance_address;
        $get_add_collect = AddressCollect::where(['status' => 1])->first();
        $to = $get_add_collect->address;
        
        if ($amount == 0 || $amount == '' || is_null($amount)) {
            return [
                'status' => false,
                'message' => 'Balance Address 0!'
            ];
        }else{
            $tf = TrxHelper::sendTRX($from, $to, $privateKey, $amount);
        }

        return [
            'status' => true,
            'message' => 'success'
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
