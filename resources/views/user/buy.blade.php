@extends('layout.app')
@section('title')
    Покупка билета
@endsection
@section('main')
    <div class="container" id="BuyPage">
        <div class="row d-flex align-items-center" style="margin-top: 10rem;">
            <div class="col-6">
                <h2 style="font-size: 42px;font-weight: 500;">Выбор места</h2>
            </div>
            <div class="col-6" style="border: 3px solid #265BE3;height: 0px"></div>
        </div>
        <div class="row mb-4 mt-4">
            <div class="col-5" style="border-right: 2px solid #265BE3;">
                <div class="row d-flex align-items-center justify-content-center text-white" style="background: #265BE3;height: 43px;">
                    <div class="col-2">
                        <h4 style="font-weight: 700;font-size: 16px; margin: 0">{{$flight->air->title}}</h4>
                    </div>
                    <div class="col-10 d-flex align-items-center justify-content-center" style="font-weight: 400;">
                        <p style="font-size: 16px; margin: 0">{{$flight->from_city->title}}</p>
                        <img src="{{asset('public/img/arrow.png')}}" alt="" style="margin: 0 30px;">
                        <p style="font-size: 16px; margin: 0">{{$flight->to_city->title}}</p>
                    </div>
                </div>
                <div class="row justify-content-between align-items-center" style="margin-top: 25px;padding: 0">
                    <div class="col-4" style="font-weight: 400;">
                        <p style="font-size: 16px;">@{{ flight.dateFrom }}</p>
                        <p style="font-weight: 500;font-size: 32px;">@{{flight.time_from}}</p>
                        <p style="font-size: 18px;width: 180px">{{$flight->from_city->title}}</p>
                    </div>
                    <div class="col-3 justify-content-center align-items-center">
                        <p style="font-weight: 400;font-size: 14px;" class="d-flex justify-content-center ">@{{flight.timeWay}}</p>
                    </div>
                    <div class="col-5" style="font-weight: 400;">
                        <p style="font-size: 16px;">@{{flight.dateTo}}</p>
                        <p style="font-weight: 500;font-size: 32px">@{{flight.time_to}}</p>
                        <p style="font-size: 18px">{{$flight->to_city->title}}</p>
                    </div>
                    <div class="row mt-4" style="font-size: 20px;">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <p style="font-weight: 700;">Стоимость</p>
                            <p style="font-weight: 700;font-size: 32px;">{{($flight->air->price*$flight->percent_price)/100+$flight->air->price}} руб.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="row">
                    <div class="col-12 text-black">
                        <p style="font-weight: 500; font-size: 20px;">Выберете одно из предлагаемых мест.</p>
                        <em style="font-weight: 400; font-size: 20px;">Выход из самолете находится в левой части расположения мест:</em>
                    </div>
                </div>
                <div class="row mt-5" style="font-weight: 400;font-size: 20px">
                    @for($i=1;$i<=$flight->air->count_seat;$i++)
                        <div class="col mb-3">
                            <div id="{{$i}}" class="btn text-white" style="background-color: #265BE3; @foreach($tickets as $ticket) @if($ticket->seat === $i) background-color: #000000; pointer-events: none; @endif @endforeach width: 2.5rem;height: 2.5rem;" @click="Choose({{$i}})">
                                {{$i}}
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-5"></div>
            <div class="col-7">
                <div class="row text-black">
                    <div class="col-4 d-flex align-items-center">
                        <div style="background-color: #265BE3;width: 1rem;height: 1rem;margin-right: 1rem;border-radius: 5px;"></div>
                        <p style="font-weight: 300;font-size: 16px;margin: 0">свободно</p>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <div style="background-color: #000000;width: 1rem;height: 1rem;margin-right: 1rem;border-radius: 5px;"></div>
                        <p style="font-weight: 300;font-size: 16px;margin: 0">занято</p>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <div style="background-color: #F4C82C;width: 1rem;height: 1rem;margin-right: 1rem;border-radius: 5px;"></div>
                        <p style="font-weight: 300;font-size: 16px;margin: 0">выбрано вами</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex align-items-center" style="margin-top: 3rem;" v-if="seatId!=null">
            <div class="col-6">
                <h2 style="font-size: 42px;font-weight: 500;">Регистрация на рейс</h2>
            </div>
            <div class="col-6" style="border: 3px solid #265BE3;height: 0px"></div>
        </div>
        <div class="row text-black mt-4" v-if="seatId!=null">
            <div class="col-12">
                <p style="font-weight: 400;font-size: 20px;margin: 0;">Заполните личные данные для покупки и оформления билета</p>
                <p style="font-weight: 400;font-size: 20px;margin: 0;"><strong>ВНИМАНИЕ!</strong> Если вы покупаете билет не для себя, введите данные человека, на которого оформляете билет</p>
            </div>
        </div>
        <form id="form" @submit.prevent="AddTicket" v-if="seatId!=null">
            <div class="row mt-3">
                <div class="col-12">
                    <div class="row">
                        <div class="col-4">
                            <input type="text" class="form-control col-12" :class="errors.fio? 'is-invalid':''" style="border: 1px solid #265BE3;border-radius: 5px;" placeholder="ФИО" name="fio">
                            <div class="invalid-feedback" v-for="error in errors.fio">
                                @{{ error }}
                            </div>
                        </div>
                        <div class="col-4">
                            <input type="date" class="form-control col-12" :class="errors.birthday? 'is-invalid':''" style="border: 1px solid #265BE3;border-radius: 5px;" placeholder="дата рождения" name="birthday">
                            <div class="invalid-feedback" v-for="error in errors.birthday">
                                @{{ error }}
                            </div>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control col-12" :class="errors.passport? 'is-invalid':''" style="border: 1px solid #265BE3;border-radius: 5px;" placeholder="серия и номер паспорта" name="passport" v-model="passport" :style="certificate!=''?'pointer-events: none':''">
                            <div class="invalid-feedback" v-for="error in errors.passport">
                                @{{ error }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <input type="text" class="form-control col-12" style="border: 1px solid #265BE3;border-radius: 5px;" placeholder="номер свидетельства о рождении" name="certificate" v-model="certificate" :style="passport!=''?'pointer-events: none':''">
                            <div id="emailHelp" class="form-text text-black"><em>*eсли билет оформляется для ребёнка</em></div>
                        </div>
                        <div class="col-2">
                            <input type="number" class="form-control col-12" style="border: 1px solid #265BE3;border-radius: 5px;pointer-events: none;" placeholder="номер места" v-model="seatId" name="seat">
                        </div>
                        <div class="col-2">
                            <input type="number" class="form-control col-12" style="border: 1px solid #265BE3;border-radius: 5px;pointer-events: none;" placeholder="номер рейса" value="{{$flight->id}}" name="flight_id">
                        </div>
                        <div class="col-4">
                            <input type="password" class="form-control col-12" :class="errors.password? 'is-invalid':''" style="border: 1px solid #265BE3;border-radius: 5px;" placeholder="введите пароль" name="password">
                            <div class="invalid-feedback" v-for="error in errors.password">
                                @{{ error }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <input type="checkbox" class="form-check-input" :class="errors.rules? 'is-invalid':''" id="exampleCheck1" name="rules">
                    <label class="form-check-label" for="exampleCheck1"><em class="text-black" style="margin-left: 1rem;">Я знаком с политикой конфиденциальности и даю свое согласие на обработку персональных данных.</em></label>
                    <div class="invalid-feedback" v-for="error in errors.rules">
                        @{{ error }}
                    </div>
                </div>
            </div>
            <div class="row mt-4 mb-5">
                <div class="col-2">
                    <button type="submit" class="btn btn-dark border-0 col-12" style="background: #F4C82C;border-radius: 5px;height: 2.5rem" :disabled="passport=='' && certificate==''">оформить</button>
                </div>
                <div class="col-10">
                    <div :class="danger? 'alert alert-danger':''" class="d-flex align-items-center" style="border-radius: 5px;height: 2.5rem">
                        @{{ danger }}
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        const BuyPage = {
            data() {
                return{
                    seatId:null,
                    seatElement:null,

                    errors:[],
                    message:'',
                    danger:'',

                    passport:'',
                    certificate:'',

                    flight: <?php print json_encode($flight)?>,
                    month:['января','февраля','марта','апреля','мая','июня','июля','августа','сентября','октября','ноября','декабря'],
                }
            },
            methods:{
                async Choose(id) {
                    if(this.seatElement === null) {
                        this.seatElement = document.getElementById(id);
                        this.seatId = id;
                        this.seatElement.style='background-color: #F4C82C;width: 2.5rem;height: 2.5rem';
                    } else {
                        this.seatElement.style='background-color: #265BE3;width: 2.5rem;height: 2.5rem';
                        this.seatElement = document.getElementById(id);
                        this.seatId = id;
                        this.seatElement.style='background-color: #F4C82C;width: 2.5rem;height: 2.5rem';
                    }
                },
                async AddTicket() {
                    const form = document.querySelector('#form');
                    const form_data = new FormData(form);
                    const response = await fetch('{{route('SaveTicket')}}', {
                        method: 'post',
                        headers: {
                            'X-CSRF-TOKEN':'{{csrf_token()}}',
                        },
                        body:form_data,
                    });
                    if(response.status===400) {
                        this.errors = await response.json();
                        setTimeout(()=>{
                            this.errors=[];
                        },2500);
                    }
                    if(response.status===403) {
                        this.danger = await response.json();
                        setTimeout(()=>{
                            this.danger=null;
                        },2500);
                    }
                    if(response.status===200) {
                        window.location = response.url;
                    }
                }
            },
            computed:{
                normalize() {
                    let dateFrom = new Date(this.flight.date_from);
                    this.flight['dateFrom'] = dateFrom.getDate() + ' ' + this.month[dateFrom.getMonth()] + ' ' + dateFrom.getFullYear();

                    let dateTo = new Date(this.flight.date_to);
                    this.flight['dateTo'] = dateTo.getDate() + ' ' + this.month[dateTo.getMonth()] + ' ' + dateTo.getFullYear();

                    let timeFrom = this.flight.time_from.split(':');
                    this.flight.time_from = timeFrom[0] + ':' + timeFrom[1];

                    let timeTo = this.flight.time_to.split(':');
                    this.flight.time_to = timeTo[0] + ':' + timeTo[1];

                    let timeWay = this.flight.time_way.split(':');
                    this.flight.timeWay = timeWay[0] + ' ч ' + timeWay[1] + ' мин ';
                }
            },
            mounted() {
                this.normalize;
            }
        };
        Vue.createApp(BuyPage).mount('#BuyPage');
    </script>
@endsection
