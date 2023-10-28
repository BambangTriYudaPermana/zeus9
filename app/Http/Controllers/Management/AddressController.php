<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use App\Models\MAddress;

use TrxHelper; 

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $create = TrxHelper::createAddress();
        // dd($create);
        // dd('masuk');
        // send transaction balance
        // $send = TrxHelper::sendTRX('TLAbuisogusv19Uo9aGiaT5mRqpw9NurYi', 'TSSvVd5QVBbA3YrMRfxFJBQgrEohCucvc3', '34f5214567acf106f536cd8d55681e471a246cd10295110727a5a40188156c11', 10);
        // dd($send);

        // get balance
        // $balance = TrxHelper::getBalance('TSSvVd5QVBbA3YrMRfxFJBQgrEohCucvc3');
        // $balance = TrxHelper::getTransactionByAddress('TLAQ156uPKsUtztjfi13DzaiSxLnYuQABJ', true, true, 10, false);
        // dd($balance);
        // require_once('vendor/autoload.php');

        try {
            $client = new \GuzzleHttp\Client();
            
            $response = $client->request('GET', 'https://api.shasta.trongrid.io/v1/accounts/TLAbuisogusv19Uo9aGiaT5mRqpw9NurYi/transactions?only_confirmed=true', [
                'headers' => [
                  'accept' => 'application/json',
                ],
            ]);
            
            $body = $response->getBody();
            $data = json_decode($body, true);
            
            dd($data['data']);
            // Extract the "amount" from each transaction
            foreach ($data['data'] as $transaction) {
                $txID = $transaction['txID'];
                $get_amount = $transaction['raw_data']['contract'][0]['parameter']['value']['amount'];
                $amount = $get_amount / 1000000;
                // dump("Amount:". $amount);
            }
            dd();
        } catch (Exception $e) {
            // Handle exceptions, e.g., connection errors, timeouts, etc.
            dd('Caught exception: ' . $e->getMessage());
        }
        // dd($balance);

        $data = MAddress::get();
        return view('back.list_address',[
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
