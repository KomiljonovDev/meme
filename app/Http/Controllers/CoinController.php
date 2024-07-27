<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\TgUser;
use Illuminate\Http\Request;

class CoinController extends Controller
{
    public function click(Request $request){
        $attributes = $request->validate([
            'tg_user_id'=>'required|integer',
        ]);
        $user = TgUser::where('user_id',$attributes['tg_user_id'])->first();
        Coin::plus($user->id);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
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
