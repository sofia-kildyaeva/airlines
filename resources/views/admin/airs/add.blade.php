@extends('layout.app')
@section('title')
    Добавление самолета
@endsection
@section('main')
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 17rem">
            <div class="col-6 d-flex justify-content-between align-items-center">
                <div class="col-9">
                    <h2 style="font-size: 40px;font-weight: 500;color: #265BE3;">Добавление самолета</h2>
                </div>
                <div class="col-3">
                    <div style="border: 3px solid #265BE3;height: 0px"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-6">
                <form action="{{route('AddAirSave')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="mb-3">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="название" style="height: 45px" name="title">
                        <div class="invalid-feedback">
                            @error('title')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <input type="number" class="form-control @error('count_seat') is-invalid @enderror" style="height: 45px" name="count_seat" placeholder="количество мест">
                                <div class="invalid-feedback">
                                    @error('count_seat')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <input type="number" class="form-control @error('price') is-invalid @enderror" style="height: 45px" name="price" placeholder="цена места">
                                <div class="invalid-feedback">
                                    @error('price')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn mt-2 text-white col-6" style="background: #F4C82C;border-radius: 5px;height: 45px;">добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
