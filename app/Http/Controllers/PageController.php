<?php

namespace App\Http\Controllers;

use App\Models\Air;
use App\Models\Airport;
use App\Models\City;
use App\Models\Flight;
use App\Models\Tiket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function HomePage() {
        $flights = Flight::query()
            ->where('status','готов')
            ->with(['from_city','to_city','from_airport','to_airport','air','tikets'])
            ->get();
        $cities = City::query()
            ->selectRaw('cities.*, COUNT(tikets.id) as count_tick')
            ->join('flights', 'cities.id', '=', 'flights.toCity_id')
            ->join('tikets', 'flights.id', '=', 'tikets.flight_id')
            ->groupBy('toCity_id')
            ->orderByDesc('count_tick')
            ->limit(4)
            ->get();
        return view('welcome', ['flights'=>$flights], ['cities'=>$cities]);
    }

    public function FlightsPage() {
        return view('guest.flights');
    }

    public function ContactsPage() {
        return view('guest.contacts');
    }



    public function AuthPage() {
        return view('guest.auth');
    }

    public function RegistrationPage() {
        return view('guest.registration');
    }



    public function UserTicketsPage() {
        $tickets = Tiket::query()
            ->where('user_id', Auth::id())
            ->with(['user','flight'])
            ->get();
        return view('user.tickets', ['tickets'=>$tickets]);
    }

    public function UserPage() {
        $user = User::query()
            ->where('id', Auth::id())
            ->first();
        return view('user.user', ['user'=>$user]);
    }



    public function CitiesPage() {
        $cities = City::all();
        return view('admin.cities.index', ['cities'=>$cities]);
    }

    public function AddCityPage() {
        return view('admin.cities.add');
    }

    public function EditCityPage(City $city) {
        return view('admin.cities.edit', ['city'=>$city]);
    }



    public function AirsPage() {
        $airs = Air::all();
        return view('admin.airs.index', ['airs'=>$airs]);
    }

    public function AddAirPage() {
        return view('admin.airs.add');
    }

    public function EditAirPage(Air $air) {
        return view('admin.airs.edit', ['air'=>$air]);
    }



    public function TicketsPage() {
        $tickets = Tiket::all();
        return view('admin.tickets.index', ['tickets'=>$tickets]);
    }



    public function AdminFlightsPage() {
        $flights = Flight::query()
        ->with(['from_city','to_city','from_airport','to_airport','air','tikets'])
        ->get();
        return view('admin.flights.index', ['flights'=>$flights]);
    }

    public function AddFlightPage() {
        $cities = City::all();
        $airports = Airport::with('city')->get();
        $airs = Air::all();
        return view('admin.flights.add', ['cities'=>$cities, 'airports'=>$airports, 'airs'=>$airs]);
    }

    public function EditFlightPage(Flight $flight) {
        $cities = City::all();
        $airports = Airport::with('city')->get();
        $airs = Air::all();
        return view('admin.flights.edit', ['flight'=>$flight], ['cities'=>$cities, 'airports'=>$airports, 'airs'=>$airs]);
    }



    public function AirportsPage() {
        $airports = Airport::all();
        return view('admin.airports.index', ['airports'=>$airports]);
    }

    public function AddAirportPage() {
        $cities = City::all();
        return view('admin.airports.add', ['cities'=>$cities]);
    }

    public function EditAirportPage(Airport $airport) {
        $cities = City::all();
        return view('admin.airports.edit', ['airport'=>$airport, 'cities'=>$cities]);
    }



    public function BuyPage(Flight $flight) {
        $tickets = Tiket::query()
            ->where('flight_id', $flight->id)
            ->get();
        return view('user.buy', ['flight'=>$flight, 'tickets'=>$tickets]);
    }



    public function UsersPage() {
        $users = User::all();
        return view('admin.users.index', ['users'=>$users]);
    }

    public function EditUserPage(User $user) {
        return view('admin.users.edit', ['user'=>$user]);
    }
}
