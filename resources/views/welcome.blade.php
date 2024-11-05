@extends('layout.app')
@section('title')
    Главная
@endsection
@section('main')
    <div style="background: linear-gradient(89.28deg, #2A27CB 3.49%, #265BE3 45.04%, #4BC4F9 93.82%); font-family: Inter;">
        <div class="container">
            <div class="row text-white" style="padding-top: 20rem">
                <div class="col-12">
                    <h1 style="font-size: 64px;font-weight: 500;">Поиск авиабилетов</h1>
                </div>
            </div>
            @if(session()->has('error'))
                <div class="text-white" style="font-size: 20px;">
                    {{session('error')}}
                </div>
            @endif
            <form action="{{route('SearchFlights')}}" method="post">
                @csrf
                @method('post')
                <div class="row g-3 mt-2" style="padding-bottom: 297px; font-size: 20px;">
                    <div class="col">
                        <label class="form-label text-white">откуда</label>
                        <input type="text" class="form-control" style="height: 3rem;" name="fromCity">
                    </div>
                    <div class="col">
                        <label class="form-label text-white">куда</label>
                        <input type="text" class="form-control" style="height: 3rem;" name="toCity">
                    </div>
                    <div class="col">
                        <label class="form-label text-white">когда</label>
                        <input type="date" class="form-control" style="height: 3rem;" name="from_date">
                    </div>
                    <div class="col">
                        <label class="form-label text-white"></label>
                        <button type="submit" class="btn btn-dark col-4 border-0 d-flex justify-content-center align-items-center" style="background: #F4C82C;border-radius: 5px;font-size: 20px; height: 3rem;width: 196px;margin-top: 7px;">найти</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container" id="HomePage">
        <div class="row d-flex align-items-center" style="margin-top: 7rem;color: #265BE3;font-size: 42px;font-weight: 500;">
            <div class="col-6">
                <h2>Популярные направления</h2>
            </div>
            <div class="col-6" style="border: 3px solid #265BE3;height: 0px"></div>
        </div>
        <div class="row">
            @foreach($cities as $city)
                <div class="col-3 mt-5">
                    <div class="card text-bg-dark border-0">
                        <img src="{{$city->img}}" class="card-img" alt="..." style="filter: brightness(27%);object-fit: cover; height: 22rem;border-radius: 10px;">
                        <div class="card-img-overlay">
                            <h5 class="card-title text-white" style="font-weight: 700;font-size: 32px; margin-top: 14.5rem">{{$city->title}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row d-flex align-items-center" style="margin-top: 7rem;color: #265BE3;font-size: 42px;font-weight: 500;">
            <div class="col-6">
                <h2>Все рейсы</h2>
            </div>
            <div class="col-6" style="border: 3px solid #265BE3;height: 0px"></div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <table class="table mt-4">
                    <thead>
                    <tr style="color: #265BE3;border-bottom: 1px solid #265BE3;">
                        <th scope="col">откуда</th>
                        <th scope="col">куда</th>
                        <th scope="col">дата и время вылета</th>
                        <th scope="col">цена билета</th>
                    </tr>
                    </thead>
                    <tbody style="border: none">
                    <tr v-for="flight in flights">
                        <td class="border-0">@{{flight.from_city.title}}</td>
                        <td class="border-0">@{{flight.to_city.title}}</td>
                        <td class="border-0">@{{flight.date_from}} в @{{flight.time_from}}</td>
                        <td class="border-0">@{{(flight.air.price*flight.percent_price)/100+flight.air.price}} руб.</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        const HomePage = {
            data() {
                return{
                    flights: <?php print json_encode($flights)?>,
                    month:['января','февраля','марта','апреля','мая','июня','июля','августа','сентября','октября','ноября','декабря'],
                }
            },
            computed:{
                normalize() {
                    this.flights.forEach((flight)=>{
                        let dateFrom = new Date(flight.date_from);
                        flight['date_from'] = dateFrom.getDate() + ' ' + this.month[dateFrom.getMonth()] + ' ' + dateFrom.getFullYear();

                        let dateTo = new Date(flight.date_to);
                        flight['date_to'] = dateTo.getDate() + ' ' + this.month[dateTo.getMonth()] + ' ' + dateTo.getFullYear();

                        let timeFrom = flight.time_from.split(':');
                        flight.time_from = timeFrom[0] + ':' + timeFrom[1];

                        let timeTo = flight.time_to.split(':');
                        flight.time_to = timeTo[0] + ':' + timeTo[1];

                        let timeWay = flight.time_way.split(':');
                        flight.time_way = timeWay[0] + ' ч ' + timeWay[1] + ' мин ';
                    });
                }
            },
            mounted() {
                this.normalize;
            }
        };
        Vue.createApp(HomePage).mount('#HomePage');
    </script>
@endsection
