<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use const http\Client\Curl\AUTH_ANY;

class TiketController extends Controller
{
    public function SortTicket(Request $request) {
        $tickets = Tiket::query()
            ->where('user_id', Auth::id())
            ->get();
        if($request->sort != 0){
            $tickets = Tiket::query()
                ->where('user_id', Auth::id())
                ->where('status', $request->sort)
                ->get();
            return view('user.tickets', ['tickets'=>$tickets]);
        }
        return view('user.tickets', ['tickets'=>$tickets]);
    }

    public function SortTicketAdmin(Request $request) {
        if($request->sort != 0){
            $tickets = Tiket::query()
                ->where('status', $request->sort)
                ->get();
            return view('admin.tickets.index', ['tickets'=>$tickets]);
        }
        $tickets = Tiket::all();
        return view('admin.tickets.index', ['tickets'=>$tickets]);
    }

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
        $validation = Validator::make($request->all(), [
            'fio'=>['required', 'regex:/[А-Яа-яЁё-]/u'],
            'birthday'=>['required'],
            'passport'=>['nullable', 'regex:/[0-9]/'],
            'certificate'=>['nullable'],
            'password'=>['required'],
            'rules'=>['required'],
        ]);
        $flight = Flight::query()
            ->where('id', $request->flight_id)
            ->first();
        if($validation->fails()) {
            return response()->json($validation->errors(), 400);
        }
        if (Auth::user()->password === md5($request->password)){
            $ticket = new Tiket();
            $ticket->user_id = Auth::id();
            $ticket->fio = $request->fio;
            $ticket->birthday = $request->birthday;
            $ticket->passport = $request->passport;
            $ticket->certificate = $request->certificate;
            $ticket->flight_id = $request->flight_id;
            $ticket->seat = $request->seat;
            $ticket->price = ($flight->air->price*$flight->percent_price)/100+$flight->air->price;
            $ticket->save();
            if (Auth::user()->role === 'admin') {
                return redirect()->route('TicketsPage');
            }
            return redirect()->route('UserTicketsPage');
        }
        return response()->json('Неверный пароль', 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function show(Tiket $tiket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function edit(Tiket $tiket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tiket $tiket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tiket $tiket)
    {
        $tiket->delete();

        return redirect()->back();
    }
}
