<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HisTopup;
use App\Models\User;

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
        }else{

        }

        return true;
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
