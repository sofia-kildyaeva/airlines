@extends('layout.app')
@section('title')
    Билеты
@endsection
@section('main')
    <div class="container">
        <div class="row d-flex align-items-center mb-5" style="margin-top: 8rem;">
            <div class="col-3">
                <h2 style="font-size: 42px;font-weight: 500;">Билеты</h2>
            </div>
            <div class="col-9" style="border: 3px solid #265BE3;height: 0px"></div>
        </div>
        <div class="row">
            <div class="col-2" style="padding-right: 25px;">
                <div class="row mb-3">
                    <h3 style="font-size: 24px;font-weight: 500;margin: 0">Фильтры</h3>
                </div>
                <div class="row d-flex justify-content-between">
                    <form action="{{route('SortTicketAdmin')}}" method="get">
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
                <table class="table table-bordered" style="border-color: #265BE3;">
                    <thead class="text-white" style="background: #265BE3;">
                    <tr class="text-center">
                        <th scope="col">ФИО заказчика</th>
                        <th scope="col">статус рейса</th>
                        <th scope="col">статус билета</th>
                    </tr>
                    </thead>
                    <tbody style="border-top: none">
                    @foreach($tickets as $ticket)
                        <tr class="text-center">
                            <td>{{$ticket->fio}}</td>
                            <td>{{$ticket->flight->status}}</td>
                            <td>{{$ticket->status}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
