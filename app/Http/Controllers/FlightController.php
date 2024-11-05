<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Flight;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fromCity = City::query()
            ->where('title', $request->fromCity)
            ->first();
        $toCity = City::query()
            ->where('title', $request->toCity)
            ->first();
        if ($fromCity && $toCity) {
            $flights = Flight::query()
                ->where('fromCity_id', $fromCity->id)
                ->where('toCity_id', $toCity->id)
                ->where('date_from', $request->from_date)
                ->where('status', 'готов')
                ->with(['from_city','to_city','from_airport','to_airport','air','tikets'])
                ->get();
            return view('guest.flights', ['flights'=>$flights]);
        } else {
            return redirect()->back()->with('error', 'Рейсы по данному запросу не найдены');
        }
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
            'fromCity_id'=>['required'],
            'fromAirport_id'=>['required'],
            'toCity_id'=>['required'],
            'toAirport_id'=>['required'],
            'date_from'=>['required'],
            'time_from'=>['required'],
            'date_to'=>['required'],
            'time_to'=>['required'],
            'percent_price'=>['required', 'between:1,99'],
            'air_id'=>['required'],
        ]);
        $flight = new Flight();
        $time_way = Carbon::parse($request->date_from.' '.$request->time_from)->diff(Carbon::parse($request->date_to.' '.$request->time_to))->format('%H:%I:%S');
        $flight->time_way = $time_way;
        $flight->fromCity_id = $request->fromCity_id;
        $flight->toCity_id = $request->toCity_id;
        $flight->fromAirport_id = $request->fromAirport_id;
        $flight->toAirport_id = $request->toAirport_id;
        $flight->date_from = $request->date_from;
        $flight->time_from = $request->time_from;
        $flight->date_to = $request->date_to;
        $flight->time_to = $request->time_to;
        $flight->percent_price = $request->percent_price;
        $flight->air_id = $request->air_id;
        $flight->save();
        return redirect()->route('AdminFlightsPage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function EditStatus(Flight $flight) {
        if ($flight->status=='готов') {
            $flight->status='в полете';
            $tickets = Tiket::query()
                ->where('flight_id', $flight->id)
                ->get();
            foreach ($tickets as $ticket){
                $ticket->status = 'использован';
                $ticket->update();
            }
        } elseif ($flight->status=='в полете') {
            $flight->status='прибыл';
        } elseif ($flight->status=='прибыл') {
            $flight->status='ТО';
        }
        $flight->update();
        return redirect()->back();
    }

    public function update(Request $request, Flight $flight)
    {
        $request->validate([
            'percent_price'=>['required', 'between:1,99'],
            'air_id'=>['required'],
        ]);
        $time_way = Carbon::parse($request->date_from.' '.$request->time_from)->diff(Carbon::parse($request->date_to.' '.$request->time_to))->format('%H:%I:%S');
        $flight->time_way = $time_way;
        if($request->fromCity_id != 0) {
            $flight->fromCity_id = $request->fromCity_id;
        }
        if($request->toCity_id != 0) {
            $flight->toCity_id = $request->toCity_id;
        }
        if($request->fromAirport_id != 0) {
            $flight->fromAirport_id = $request->fromAirport_id;
        }
        if($request->toAirport_id != 0) {
            $flight->toAirport_id = $request->toAirport_id;
        }
        $flight->date_from = $request->date_from;
        $flight->time_from = $request->time_from;
        $flight->date_to = $request->date_to;
        $flight->time_to = $request->time_to;
        $flight->percent_price = $request->percent_price;
        if($request->air_id != 0) {
            $flight->air_id = $request->air_id;
        }
        $flight->update();
        return redirect()->route('AdminFlightsPage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        $flight->delete();
        return redirect()->back();
    }
}
