@extends('layout.app')
@section('title')
    Редактирование аэропорта
@endsection
@section('main')
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 17rem">
            <div class="col-6 d-flex justify-content-between align-items-center">
                <div class="col-11">
                    <h2 style="font-size: 40px;font-weight: 500;color: #265BE3;">Редактирование аэропорта</h2>
                </div>
                <div class="col-1">
                    <div style="border: 3px solid #265BE3;height: 0px"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-6">
                <form action="{{route('EditAirportSave', ['airport'=>$airport])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" style="height: 45px" name="title" value="{{$airport->title}}">
                        <div class="invalid-feedback">
                            @error('title')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <select type="text" class="form-select @error('city_id') is-invalid @enderror" style="height: 45px" name="city_id" value="{{$airport->city_id}}">
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->title}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            @error('city_id')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn mt-2 text-white col-6" style="background: #F4C82C;border-radius: 5px;height: 45px;">сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
