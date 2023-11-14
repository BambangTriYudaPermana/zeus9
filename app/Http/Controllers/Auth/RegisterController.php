<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\MAddress;

use TrxHelper; 

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data);
        // create address for transaction
        $data_add = TrxHelper::createAddress();
        // dd($data_add);
        $create_address = MAddress::create([
            'address' => $data_add['address'],
            'private_key' => $data_add['private_key'],
            'public_key' => $data_add['public_key'],
            'address_hex' => $data_add['address_hex'],
            'status' => 1,
            'created_date' => date('Y-m-d H:i:s')
        ]);
        $id_address = $create_address->id;

        $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789');
        shuffle($seed);
        $rand = '';
        foreach (array_rand($seed, 6) as $k) $rand .= $seed[$k];

        $my_referral_code = $rand;

        $model = User::where('my_referral_code', $data['referral_code'])->first();
        $bonus = 0;
        if ($model) {
            $bonus = 2;
            
            $wallet = $model->wallet;
            $model->update([
                'wallet' => $wallet + 0.5,
            ]);
        }
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'id_role' => 1,
            'id_address' => $id_address,
            'referral_code' => $data['referral_code'],
            'my_referral_code' => $my_referral_code,
            'wallet' => $bonus
        ]);
    }
}
