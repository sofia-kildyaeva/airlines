<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
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
            'title'=>['required', 'regex:/[A-Za-zА-Яа-я-]/u', 'unique:cities'],
            'img'=>['required', 'mimes:png,jpg,jpeg'],
        ]);
        $img_path = '';
        $city = new City();
        $city->title = $request->title;
        if ($request->file('img')){
            $img_path = $request->file('img')->store('/public/img');
        }
        $city->img = '/storage/'.$img_path;
        $city->save();
        return redirect()->route('CitiesPage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'title'=>['required', 'regex:/[A-Za-zА-Яа-я-]/u', 'unique:cities'],
            'img'=>['mimes:png,jpg,jpeg'],
        ]);
        $city->title = $request->title;
        if ($request->file('img')){
            $img_path = $request->file('img')->store('/public/img');
            $city->img = '/storage/'.$img_path;
        }
        $city->update();
        return redirect()->route('CitiesPage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->back();
    }
}
