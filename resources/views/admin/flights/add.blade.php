@extends('layout.app')
@section('title')
    Добавление рейса
@endsection
@section('main')
    <div class="container" id="flightAdd">
        <div class="row justify-content-center" style="margin-top: 17rem">
            <div class="col-6 d-flex justify-content-between align-items-center">
                <div class="col-8">
                    <h2 style="font-size: 40px;font-weight: 500;color: #265BE3;">Добавление рейса</h2>
                </div>
                <div class="col-4">
                    <div style="border: 3px solid #265BE3;height: 0px"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-6">
                <form action="{{route('AddFlightSave')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-6">
                            <p>откуда</p>
                        </div>
                        <div class="col-6 ">
                            <p>куда</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <select onchange="this.form.fromAirport_id.style.visibility = this.selectedIndex ? 'visible' : 'hidden'" class="form-select @error('fromCity_id') is-invalid @enderror" style="height: 45px" name="fromCity_id" v-model="idCityFrom">
                                    <option value="0">Город вылета</option>
                                    <option v-for="city in citiesFrom" :value="city.id">@{{ city.title }}</option>
                                </select>
                                <div class="invalid-feedback">
                                    @error('fromCity_id')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <select onchange="this.form.toAirport_id.style.visibility = this.selectedIndex ? 'visible' : 'hidden'" class="form-select @error('toCity_id') is-invalid @enderror" style="height: 45px" name="toCity_id" v-model="idCityTo">
                                    <option value="0">Город прилета</option>
                                    <option v-for="city in citiesTo" :value="city.id">@{{ city.title }}</option>
                                </select>
                                <div class="invalid-feedback">
                                    @error('fromCity_id')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <select class="form-select @error('fromAirport_id') is-invalid @enderror" style="height: 45px;visibility: hidden" name="fromAirport_id">
                                    <option value="0">Аэропорт вылета</option>
                                    <option v-for="airport in filter_from" :value="airport.id">@{{ airport.title }}</option>
                                </select>
                                <div class="invalid-feedback">
                                    @error('fromAirport_id')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <select class="form-select @error('toAirport_id') is-invalid @enderror" style="height: 45px;visibility: hidden" name="toAirport_id">
                                    <option value="0">Аэропорт прилета</option>
                                    <option v-for="airport in filter_to" :value="airport.id">@{{ airport.title }}</option>
                                </select>
                                <div class="invalid-feedback">
                                    @error('toAirport_id')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <input class="form-control @error('date_from') is-invalid @enderror" type="date" name="date_from">
                                <div class="invalid-feedback">
                                    @error('date_from')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <input class="form-control @error('date_to') is-invalid @enderror" type="date" name="date_to">
                                <div class="invalid-feedback">
                                    @error('date_to')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <input class="form-control @error('time_from') is-invalid @enderror" type="time" name="time_from">
                                <div class="invalid-feedback">
                                    @error('time_from')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <input class="form-control @error('time_to') is-invalid @enderror" type="time" name="time_to">
                                <div class="invalid-feedback">
                                    @error('time_to')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <input type="number" class="form-control @error('percent_price') is-invalid @enderror" placeholder="процент к цене билета" name="percent_price">
                            <div class="invalid-feedback">
                                @error('percent_price')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <select class="form-select @error('air_id') is-invalid @enderror" name="air_id">
                                <option value="0">Самолет</option>
                                @foreach($airs as $air)
                                    <option value="{{$air->id}}">{{$air->title}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                @error('air_id')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn mt-2 text-white col-6" style="background: #F4C82C;border-radius: 5px;height: 45px;">добавить</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const flightAdd={
            data() {
                return{
                    citiesFrom: <?php print json_encode($cities)?>,
                    citiesTo: <?php print json_encode($cities)?>,
                    airportsFrom: <?php print json_encode($airports)?>,
                    airportsTo: <?php print json_encode($airports)?>,

                    idCityFrom:0,
                    idCityTo:0,
                }
            },
            computed: {
                filter_from() {
                    let airportsFrom = this.airportsFrom;
                    if(this.idCityFrom!=0) {
                        airportsFrom = this.airportsFrom.filter(airport=>airport.city_id===this.idCityFrom);
                    }
                    return airportsFrom;
                },
                filter_to() {
                    let airportsTo = this.airportsTo;
                    if(this.idCityTo!=0) {
                        airportsTo = this.airportsTo.filter(airport=>airport.city_id===this.idCityTo);
                    }
                    return airportsTo;
                }
            },
            mounted() {
                this.citiesFrom;
                this.citiesTo;
                this.airportsFrom;
                this.airportsTo;
            }
        }
        Vue.createApp(flightAdd).mount('#flightAdd');
    </script>
@endsection
