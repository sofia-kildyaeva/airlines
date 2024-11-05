@extends('layout.app')
@section('title')
    Мои билеты
@endsection
@section('main')
    <div class="container" id="MyTicketsPage">
        <div class="row d-flex align-items-center mb-5" style="margin-top: 8rem;">
            <div class="col-3">
                <h2 style="font-size: 42px;font-weight: 500;">Мои билеты</h2>
            </div>
            <div class="col-9" style="border: 3px solid #265BE3;height: 0px"></div>
        </div>
        <div class="row">
            <div class="col-2" style="padding-right: 25px;">
                <div class="row mb-3">
                    <h3 style="font-size: 24px;font-weight: 500;margin: 0">Фильтры</h3>
                </div>
                <div class="row d-flex justify-content-between">
                    <form action="{{route('SortTicket')}}" method="get">
                        @csrf
                        @method('get')
                        <select name="sort" class="form-select" style="border-color: #265BE3;border-radius: 5px;height: 45px;">
                            <option value="0">все билеты</option>
                            <option value="оформлен">оформлен</option>
                            <option value="использован">использован</option>
                        </select>
                        <button type="submit" class="btn text-white mt-2" style="background: #F4C82C;border-radius: 5px;height: 45px;">применить</button>
                    </form>
                </div>
            </div>
            <div class="col-10">
                @foreach($tickets as $ticket)
                    <div class="row mb-4" style="border: 2px solid #265BE3;border-radius: 10px;">
                        <div class="col-7" style="border-right: 2px dashed #265BE3;">
                            <div class="row d-flex align-items-center justify-content-center text-white" style="background: #265BE3;height: 43px;">
                                <div class="col-2">
                                    <h4 style="font-weight: 700;font-size: 16px; margin: 0">{{$ticket->flight->air->title}}</h4>
                                </div>
                                <div class="col-10 d-flex align-items-center justify-content-center" style="font-weight: 400;">
                                    <p style="font-size: 16px; margin: 0">{{$ticket->flight->from_city->title}}</p>
                                    <img src="{{asset('public/img/arrow.png')}}" alt="" style="margin: 0 30px;">
                                    <p style="font-size: 16px; margin: 0">{{$ticket->flight->to_city->title}}</p>
                                </div>
                            </div>
                            <div class="row justify-content-between align-items-center" style="margin-top: 25px;padding: 0">
                                <div class="col-4" style="font-weight: 400;">
                                    <p style="font-size: 16px;">{{$ticket->flight->date_from}}</p>
                                    <p style="font-weight: 500;font-size: 32px">{{$ticket->flight->time_from}}</p>
                                    <p style="font-size: 18px">{{$ticket->flight->from_city->title}}</p>
                                </div>
                                <div class="col-3 justify-content-center align-items-center">
                                    <p style="font-weight: 400;font-size: 14px;">{{$ticket->flight->time_way}}</p>
                                </div>
                                <div class="col-4" style="font-weight: 400;">
                                    <p style="font-size: 16px;">{{$ticket->flight->date_to}}</p>
                                    <p style="font-weight: 500;font-size: 32px">{{$ticket->flight->time_to}}</p>
                                    <p style="font-size: 18px">{{$ticket->flight->to_city->title}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 mt-3">
                            <div class="row" style="font-size: 18px">
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                    <p style="font-weight: 500;">{{$ticket->fio}}</p>
                                    @if($ticket->status == 'оформлен')
                                        <form action="{{route('RefuseTicket', ['tiket'=>$ticket])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger mb-3" style="border-radius: 5px;">отказ</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            <div class="row" style="font-size: 18px">
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                    <p style="font-weight: 400;">Номер рейса:</p>
                                    <p style="font-weight: 500;">{{$ticket->flight->id}}</p>
                                </div>
                            </div>
                            <div class="row" style="font-size: 18px">
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                    <p style="font-weight: 400;">Место:</p>
                                    <p style="font-weight: 500;">{{$ticket->seat}}</p>
                                </div>
                            </div>
                            <div class="row" style="font-size: 18px">
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                    <p style="font-weight: 400;">Статус билета:</p>
                                    <p style="font-weight: 500;">{{$ticket->status}}</p>
                                </div>
                            </div>
                            <div class="row" style="font-size: 20px">
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                    <p style="font-weight: 700;">Стоимость билета</p>
                                    <p style="font-weight: 700;font-size: 32px;">{{$ticket->price}} руб.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
