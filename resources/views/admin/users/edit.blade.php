@extends('layout.app')
@section('title')
    Редактировать данные пользователя
@endsection
@section('main')
    <div class="container" id="Registration">
        <div class="row justify-content-center" style="margin-top: 13rem">
            <div class="col-5 d-flex justify-content-between align-items-center">
                <div class="col-11">
                    <h2 style="font-size: 40px;font-weight: 500;color: #265BE3;">Редактировать данные</h2>
                </div>
                <div class="col-1">
                    <div style="border: 3px solid #265BE3;height: 0px"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-5">
                <form action="{{route('UserEditSave', ['user'=>$user])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <input type="text" class="form-control @error('fio') is-invalid @enderror" placeholder="ФИО" style="height: 45px" value="{{$user->fio}}" name="fio">
                        <div class="invalid-feedback">
                            @error('fio')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="date" class="form-control @error('birthday') is-invalid @enderror" placeholder="дата рождения" style="height: 45px" value="{{$user->birthday}}" name="birthday">
                        <div class="invalid-feedback">
                            @error('birthday')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control @error('passport') is-invalid @enderror" placeholder="серия и номер паспорта" style="height: 45px" value="{{$user->passport}}" name="passport">
                        <div class="invalid-feedback">
                            @error('passport')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="электронная почта" style="height: 45px" value="{{$user->email}}" name="email">
                        <div class="invalid-feedback">
                            @error('email')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="телефон" style="height: 45px" value="{{$user->phone}}" name="phone">
                        <div class="invalid-feedback">
                            @error('phone')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control @error('login') is-invalid @enderror" placeholder="логин" style="height: 45px" value="{{$user->login}}" name="login">
                        <div class="invalid-feedback">
                            @error('login')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="новый пароль" style="height: 45px" name="password">
                        <div class="invalid-feedback">
                            @error('password')
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
