<?php

namespace App\Http\Controllers;

use App\Models\Air;
use App\Models\Seat;
use Illuminate\Http\Request;

class AirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'title'=>['required', 'unique:airs'],
            'count_seat'=>['required', 'between:1,999'],
            'price'=>['required', 'between:1,999999'],
        ]);
        $air = new Air();
        $air->title = $request->title;
        $air->count_seat = $request->count_seat;
        $air->price = $request->price;
        $air->save();
        for ($i=1;$i<=$request->count_seat;$i++) {
            $seat = new Seat();
            $seat->air_id = $air->id;
            $seat->seat = $i;
            $seat->save();
        }
        return redirect()->route('AirsPage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Air  $air
     * @return \Illuminate\Http\Response
     */
    public function show(Air $air)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Air  $air
     * @return \Illuminate\Http\Response
     */
    public function edit(Air $air)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Air  $air
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Air $air)
    {
        $request->validate([
            'title'=>['required'],
            'price'=>['required', 'between:1,999999'],
        ]);
        $air->title = $request->title;
        $air->price = $request->price;
        $air->save();
        return redirect()->route('AirsPage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Air  $air
     * @return \Illuminate\Http\Response
     */
    public function destroy(Air $air)
    {
        $air->delete();
        return redirect()->route('AirsPage');
    }
}
