@extends('layout.app')
@section('title')
    Рейсы
@endsection
@section('main')
    <div class="container" id="FlightsPage">
        <div class="row d-flex align-items-center" style="margin-top: 8rem;">
            <div class="col-3">
                <h2 style="font-size: 42px;font-weight: 500;">Рейсы</h2>
            </div>
            <div class="col-9" style="border: 3px solid #265BE3;height: 0px"></div>
        </div>
        <div class="row justify-content-center mt-2 mb-3">
            <div class="col-3">
                <a href="{{route('AddFlightPage')}}" class="btn btn-dark border-0 d-flex align-items-center justify-content-center col-12" style="background: #F4C82C;border-radius: 5px;height: 45px;">добавить рейс</a>
            </div>
        </div>
        <div class="row mb-5">
            <table class="table table-bordered" style="border-color: #265BE3;" >
                <thead class="text-white" style="background: #265BE3;">
                <tr class="text-center">
                    <th scope="col">№</th>
                    <th scope="col">откуда -> куда</th>
                    <th scope="col">дата вылета (время в пути) дата прилета</th>
                    <th scope="col">самолет</th>
                    <th scope="col">статус</th>
                    <th scope="col">действия</th>
                </tr>
                </thead>
                <tbody style="border-top: none">
                <tr class="text-center" v-for="flight in flights">
                    <th>@{{flight.id}}</th>
                    <td>
                        <div class="row align-items-center mb-4">
                            <div class="col-5">
                                @{{flight.from_city.title}}
                            </div>
                            <div class="col-2">
                                ->
                            </div>
                            <div class="col-5">
                                @{{flight.to_city.title}}
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-5">
                                @{{flight.from_airport.title}}
                            </div>
                            <div class="col-2">
                                ->
                            </div>
                            <div class="col-5">
                                @{{flight.to_airport.title}}
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-4">
                                @{{flight.time_from}}
                            </div>
                            <div class="col-4">
                                (@{{flight.time_way}})
                            </div>
                            <div class="col-4">
                                @{{flight.time_to}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                @{{flight.date_from}}
                            </div>
                            <div class="col-4"></div>
                            <div class="col-4">
                                @{{flight.date_to}}
                            </div>
                        </div>
                    </td>
                    <td>@{{flight.air.title}}</td>
                    <td>@{{flight.status}}</td>
                    <td>
                        <div class="row">
                            <div class="col-6">
                                <a :href="`{{route('EditFlightPage')}}/${flight.id}`" class="btn btn-dark border-0 col-12" style="background: #F4C82C;border-radius: 5px;">редактировать</a>
                            </div>
                            <div class="col-6">
                                <form :action="`{{route('DeleteFlight')}}/${flight.id}`" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger border-0 col-12" style="border-radius: 5px;">удалить</button>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <form :action="`{{route('EditStatus')}}/${flight.id}`" method="post">
                                @csrf
                                @method('put')
                                <div v-if="flight.status==='готов'? 'style: display: none' : ''">
                                    <p>изменить статус:</p>
                                    <button type="submit" class="btn btn-dark border-0 col-12" style="background: #265BE3;border-radius: 5px;">в полете</button>
                                </div>
                                <div v-if="flight.status==='в полете'? 'style: display: none' : ''">
                                    <p>изменить статус:</p>
                                    <button type="submit" class="btn btn-dark border-0 col-12" style="background: #265BE3;border-radius: 5px;">прибыл</button>
                                </div>
                                <div v-if="flight.status==='прибыл'? 'style: display: none' : ''">
                                    <p>изменить статус:</p>
                                    <button type="submit" class="btn btn-dark border-0 col-12" style="background: #265BE3;border-radius: 5px;">ТО</button>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <div class="row"></div>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        const FlightsPage = {
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
        Vue.createApp(FlightsPage).mount('#FlightsPage');
    </script>
@endsection
