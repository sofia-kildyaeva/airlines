@extends('layout.app')
@section('title')
    Рейсы
@endsection
@section('main')
    <div class="container" id="Flights">
        <div class="row d-flex align-items-center" style="margin-top: 168px;">
            <div class="col-2">
                <h3 style="font-size: 24px;font-weight: 500;margin: 0">Фильтры</h3>
            </div>
            <div class="col-3">
                <h2 style="font-size: 42px;font-weight: 500;">Рейсы</h2>
            </div>
            <div class="col-7" style="border: 3px solid #265BE3;height: 0px"></div>
        </div>
        <div class="row d-flex" style="margin-top: 33px;font-size: 20px;font-weight: 400;">
            <div class="col-2">
                <h3 style="font-size: 20px">Стоимость</h3>
            </div>
            @if(count($flights) != 0)
                <div class="col-10">
                    <p class="text-black">По вашему запросу найдены следующие рейсы</p>
                </div>
            @endif
            @if(count($flights) === 0)
                <div class="col-10">
                    <h3 style="font-size: 30px;"><strong>По вашему запросу рейсы не найдены!</strong></h3>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-2" style="padding-right: 25px;">
                <div class="row d-flex justify-content-between">
                    <input type="text" style="border: 1px solid #265BE3;border-radius: 5px;height: 45px; width: 100px;" placeholder="от" v-model="price_min">
                    <input type="text" style="border: 1px solid #265BE3;border-radius: 5px;height: 45px; width: 100px;" placeholder="до" v-model="price_max">
                </div>
            </div>
            <div class="col-10">
                <div class="row mb-4" v-for="flight in filterSort">
                    <div class="col-7" style="border-right: 2px solid #265BE3;">
                        <div class="row d-flex align-items-center justify-content-center text-white" style="background: #265BE3;height: 43px;">
                            <div class="col-2">
                                <h4 style="font-weight: 700;font-size: 16px; margin: 0">@{{ flight.air.title }}</h4>
                            </div>
                            <div class="col-10 d-flex align-items-center justify-content-center" style="font-weight: 400;">
                                <p style="font-size: 16px; margin: 0">@{{ flight.from_city.title }}</p>
                                <img src="{{asset('public/img/arrow.png')}}" alt="" style="margin: 0 30px;">
                                <p style="font-size: 16px; margin: 0">@{{ flight.to_city.title }}</p>
                            </div>
                        </div>
                        <div class="row justify-content-between align-items-center" style="margin-top: 25px;padding: 0">
                            <div class="col-4" style="font-weight: 400;">
                                <p style="font-size: 16px;">@{{ flight.date_from }}</p>
                                <p style="font-weight: 500;font-size: 32px">@{{ flight.time_from }}</p>
                                <p style="font-size: 18px">@{{ flight.from_city.title }}</p>
                            </div>
                            <div class="col-3 justify-content-center align-items-center">
                                <p style="font-weight: 400;font-size: 14px;">@{{ flight.time_way }}</p>
                            </div>
                            <div class="col-4" style="font-weight: 400;">
                                <p style="font-size: 16px;">@{{ flight.date_to }}</p>
                                <p style="font-weight: 500;font-size: 32px">@{{ flight.time_to }}</p>
                                <p style="font-size: 18px">@{{ flight.to_city.title }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="row" style="font-size: 18px">
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <p style="font-weight: 400;">Цена места:</p>
                                <p style="font-weight: 500;">@{{ flight.air.price }} руб.</p>
                            </div>
                        </div>
                        <div class="row" style="font-size: 18px">
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <p style="font-weight: 400;">Количество мест:</p>
                                <p style="font-weight: 500;">@{{ flight.air.count_seat }} мест</p>
                            </div>
                        </div>
                        <div class="row" style="font-size: 18px">
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <p style="font-weight: 400;">Взимаемый процент:</p>
                                <p style="font-weight: 500;">@{{ flight.percent_price }}%</p>
                            </div>
                        </div>
                        <div class="row" style="font-size: 20px">
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <p style="font-weight: 700;">Стоимость</p>
                                <p style="font-weight: 700;font-size: 32px;">@{{ (flight.air.price*flight.percent_price)/100+flight.air.price }} руб.</p>
                            </div>
                        </div>
                        @if(\Illuminate\Support\Facades\Auth::user())
                            <div class="row">
                                <div class="col-6">
                                    <a :href="`{{route('BuyPage')}}/${flight.id}`" class="btn btn-dark border-0 col-12 d-flex justify-content-center align-items-center" style="background: #F4C82C;border-radius: 5px;height: 45px;">выбрать место</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const Flights={
            data() {
                return{
                    price_min:'',
                    price_max:'',
                    flights:<?php print json_encode($flights)?>,
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
                },
                filterSort() {
                    let flights = this.flights;
                    if(this.price_min!='' || this.price_max!='') {
                        if(this.price_min!=1 || this.price_max!=999999){
                            flights = this.flights.filter(flight=>((flight.air.price*flight.percent_price)/100+flight.air.price)>=this.price_min && ((flight.air.price*flight.percent_price)/100+flight.air.price)<=this.price_max);
                        }
                    }
                    return flights;
                },
            },
            mounted() {
                this.normalize;
            }
        }
        Vue.createApp(Flights).mount('#Flights');
    </script>
@endsection
