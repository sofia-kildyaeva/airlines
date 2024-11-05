@extends('layout.app')
@section('title')
    Города
@endsection
@section('main')
    <div class="container">
        <div class="row d-flex align-items-center" style="margin-top: 8rem;">
            <div class="col-3">
                <h2 style="font-size: 42px;font-weight: 500;">Города</h2>
            </div>
            <div class="col-9" style="border: 3px solid #265BE3;height: 0px"></div>
        </div>
        <div class="row justify-content-center mt-2 mb-3">
            <div class="col-3">
                <a href="{{route('AddCityPage')}}" class="btn btn-dark border-0 d-flex align-items-center justify-content-center col-12" style="background: #F4C82C;border-radius: 5px;height: 45px;">добавить город</a>
            </div>
        </div>
        <div class="row mb-5">
            @foreach($cities as $city)
                <div class="col-4 mt-4">
                    <div class="card" style="border: 1px solid #265BE3;border-radius: 5px;">
                        <div class="card-body">
                            <h5 class="card-title">{{$city->title}}</h5>
                        </div>
                        <div class="row mb-2 justify-content-between" style="padding: 0 1rem">
                            <div class="col-6">
                                <a href="{{route('EditCityPage', ['city'=>$city])}}" class="btn btn-dark border-0 col-12" style="background: #F4C82C;border-radius: 5px;">редактировать</a>
                            </div>
                            <div class="col-6">
                                <form action="{{route('DeleteCity', ['city'=>$city])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-dark border-0 col-12" style="background: #265BE3;border-radius: 5px;">удалить</button>
                                </form>
                            </div>
                        </div>
                        <img src="{{$city->img}}" class="card-img-bottom" alt="..." style="object-fit: cover;height: 20rem;">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
