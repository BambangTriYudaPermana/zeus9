<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MPayout;

class PayoutController extends Controller
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

    public function getPayout(Request $request)
    {
        // dd($request);
        $model = new MPayout();
        if ($request->win_change != '') {
            $model = $model->where(['persen' => $request->win_change]);
            // if ($request->guess_low_up != '') {
            //     if ($request->guess_low_up == 'low') {
            //         $model = $model->andWhere([]);
            //     }elseif ($request->guess_low_up == 'hight') {
                    
            //     }
            // }
        }
        
        $model = $model->first();
        return $model;
    }
}
