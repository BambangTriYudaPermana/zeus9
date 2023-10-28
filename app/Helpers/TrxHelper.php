<?php
namespace App\Helpers;

use Exception;

use App\Models\HisTransaction;
use App\Models\User;
class TrxHelper{

    public static function SayHello()
    {
        return "SayHello";
    }

    public static function callTron()
    {
        $fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.shasta.trongrid.io');
        $solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.shasta.trongrid.io');
        $eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.shasta.trongrid.io');

        try {
            $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
            return $tron;
        } catch (\IEXBase\TronAPI\Exception\TronException $e) {
            exit($e->getMessage());
        }
    }

    public static function createAddress()
    {
        $instance = new self();
        $tron = $instance->callTron();

        $generate_add = $tron->createAccount();
        // dd($generate_add);
        $data = [];
        foreach ((array)$generate_add as $key => $value) {
            $data['address'] = $value['address_base58'];
            $data['private_key'] = $value['private_key'];
            $data['public_key'] = $value['public_key'];
            $data['address_hex'] = $value['address_hex'];
        }

        return $data;
    }

    public static function sendTRX($from, $to, $privateKey, $amount = '')
    {
        // from = dari address mana
        // to = ke address mana
        // privateKey = privateKey dari from address
        // $from = 'TP491swk5eppyAEXuyagHD3A2d4r6u6DzY';
        // $to = 'TLAbuisogusv19Uo9aGiaT5mRqpw9NurYi';
        // $privateKey = 'DF4ED0251666A314871E90A768CDFCE86D9E40985AB9B3D7E0A431C5AC51A0AC';

        $instance = new self();
        $tron = $instance->callTron();

        $tron->setAddress($from);
        $tron->setPrivateKey($privateKey);

        $balance = 0;
        if ($amount == 'ALL') {
            $balance = $instance->getBalance($from);
        }else{
            $balance = (int)$amount;
        }

        try {
            $transfer = $tron->send($to, $balance);
            return $transfer;
            // dd($transfer);
        } catch (\IEXBase\TronAPI\Exception\TronException $e) {
            die($e->getMessage());
        }
    }

    public static function getBalance($address)
    {
        $instance = new self();
        $tron = $instance->callTron();

        try {
            $tron->setAddress($address);
            $balance = $tron->getBalance($address, true);

            return $balance;
        } catch (\IEXBase\TronAPI\Exception\TronException $e) {
            die($e->getMessage());
        }
    }

    public static function getTransactionByTxId($TxId)
    {
        $instance = new self();
        $tron = $instance->callTron();

        $detail = $tron->getTransaction($TxId);
        return $detail;
    }

    public static function getTransactionByAddress($address, $only_confirmed = 1, $only_to = null, $limit = null, $add_to_table)
    {
        $url = 'https://api.shasta.trongrid.io/v1/accounts/'.$address.'/transactions';
        if ($only_confirmed) {
            $url .= '?only_confirmed=true';
        }
        if ($only_to) { 
            $url .= '&only_to=true';
        }
        if ($limit) {
            $url .= '&limit='.$limit;
        }

        // dd($url);
        $instance = new self();
        try {
            $client = new \GuzzleHttp\Client();
            
            $response = $client->request('GET', $url, [
                'headers' => [
                  'accept' => 'application/json',
                ],
            ]);
            
            $body = $response->getBody();
            $data = json_decode($body, true);
            // dd($data['data']);
            $result = [];
            foreach ($data['data'] as $key => $transaction) {
                $get_amount = $transaction['raw_data']['contract'][0]['parameter']['value']['amount'];

                $result[$key]['contractRet'] = $transaction['ret'][0]['contractRet'];
                $result[$key]['txID'] = $transaction['txID'];
                $result[$key]['get_amount'] = $get_amount;
                $result[$key]['owner_address_hex'] = $transaction['raw_data']['contract'][0]['parameter']['value']['owner_address'];
                $result[$key]['to_address_hex'] = $transaction['raw_data']['contract'][0]['parameter']['value']['to_address'];
                $result[$key]['amount'] = $get_amount / 1000000;
                $result[$key]['timestamp'] = $transaction['raw_data']['timestamp'];
                $result[$key]['date_timestamp'] = date('Y-m-d H:i:s', (1698465823317 / 1000) );
            }
            // dd($result);
            if ($add_to_table) {
                $instance->addHisTransaction($result);
            }
            return $result;
        } catch (Exception $e) {
            dd('Caught exception: ' . $e->getMessage());
        }
    }

    public static function addHisTransaction($data)
    {
        foreach ($data as $key => $value) {
            $find = HisTransaction::where(['txID' => $value['txID']])->first();
            if (!$find) {
                $user = User::whereHas('address', function($query) use ($value) {
                    $query->where('address_hex', $value['to_address_hex']);  
                })->first();  // Use first() to get a single user or null
        
                // dd($value['date_timestamp']);
                if ($user) {
                    HisTransaction::create([
                        'id_user' => $user->id,
                        'contractRet' => $value['contractRet'],
                        'txID' => $value['txID'],
                        'get_amount' => $value['get_amount'],
                        'amount' => $value['amount'],
                        'owner_address_hex' => $value['owner_address_hex'],
                        'to_address_hex' => $value['to_address_hex'],
                        'timestamp' => $value['timestamp'],
                        'date_timestamp' => $value['date_timestamp'],
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                }
            } else {

            }
        }

        return true;
    }
    
}