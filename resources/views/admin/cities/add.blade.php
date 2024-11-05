@extends('layout.app')
@section('title')
    Добавление города
@endsection
@section('main')
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 17rem">
            <div class="col-6 d-flex justify-content-between align-items-center">
                <div class="col-8">
                    <h2 style="font-size: 40px;font-weight: 500;color: #265BE3;">Добавление города</h2>
                </div>
                <div class="col-4">
                    <div style="border: 3px solid #265BE3;height: 0px"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-6">
                <form action="{{route('AddCitySave')}}" method="post" enctype="multipart/form-data">
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
                    <div class="mb-3">
                        <input type="file" class="form-control @error('img') is-invalid @enderror" style="height: 45px" name="img">
                        <div class="invalid-feedback">
                            @error('img')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn mt-2 text-white col-6" style="background: #F4C82C;border-radius: 5px;height: 45px;">добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
