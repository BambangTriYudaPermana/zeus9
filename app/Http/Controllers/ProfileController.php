<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    HisPlay,
    User
};

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_bet = HisPlay::selectRaw('sum(bet) as bet')->where(['id_user' => Auth::user()->id])->first();
        $get_play = HisPlay::selectRaw('count(id) as play')->where(['id_user' => Auth::user()->id])->first();
        $get_history = HisPlay::where(['id_user' => Auth::user()->id])->orderBy('created_at', 'desc')->get();
        // dd($get_bet['bet']);
        return view('front.profile',[
            'bet' => $get_bet['bet'],
            'play' => $get_play['play'],
            'history' => $get_history
        ]);
    }

    public function VerifyAcc(Request $request) 
    {
        $otp = $request->verify_code;
        $model = User::findOrFail(Auth::user()->id);
        if ($model) {
            if ($otp == $model->otp) {
                $model->update([
                    'is_verify' => 1
                ]);
                
                return [
                    'status' => true,
                ];
            }else{
                return [
                    'status' => false,
                ];
            }
        }
        dd($otp);
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
