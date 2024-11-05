@extends('layout.app')
@section('title')
    Аэропорты
@endsection
@section('main')
    <div class="container">
        <div class="row d-flex align-items-center" style="margin-top: 8rem;">
            <div class="col-3">
                <h2 style="font-size: 42px;font-weight: 500;">Аэропорты</h2>
            </div>
            <div class="col-9" style="border: 3px solid #265BE3;height: 0px"></div>
        </div>
        <div class="row justify-content-center mt-2 mb-3">
            <div class="col-3">
                <a href="{{route('AddAirportPage')}}" class="btn btn-dark border-0 d-flex align-items-center justify-content-center col-12" style="background: #F4C82C;border-radius: 5px;height: 45px;">добавить аэропорт</a>
            </div>
        </div>
        <div class="row mb-5">
            @foreach($airports as $airport)
                <div class="col-3 mt-4">
                    <div class="card" style="border: 1px solid #265BE3;border-radius: 5px;">
                        <h5 class="card-header">{{$airport->title}}</h5>
                        <div class="card-body">
                            <p class="card-text">{{$airport->city->title}}</p>
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{route('EditAirportPage', ['airport'=>$airport])}}" class="btn btn-dark border-0" style="background: #F4C82C;border-radius: 5px;">редактировать</a>
                                </div>
                                <div class="col-6">
                                    <form action="{{route('DeleteAirport', ['airport'=>$airport])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-dark border-0 col-12" style="background: #265BE3;border-radius: 5px;">удалить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
