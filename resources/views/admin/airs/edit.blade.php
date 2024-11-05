@extends('layout.app')
@section('title')
    Редактирование самолета
@endsection
@section('main')
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 17rem">
            <div class="col-6 d-flex justify-content-between align-items-center">
                <div class="col-11">
                    <h2 style="font-size: 40px;font-weight: 500;color: #265BE3;">Редактирование самолета</h2>
                </div>
                <div class="col-1">
                    <div style="border: 3px solid #265BE3;height: 0px"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-6">
                <form action="{{route('EditAirSave', ['air'=>$air])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" style="height: 45px" name="title" value="{{$air->title}}">
                        <div class="invalid-feedback">
                            @error('title')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control @error('price') is-invalid @enderror" style="height: 45px" name="price" value="{{$air->price}}">
                        <div class="invalid-feedback">
                            @error('price')
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
