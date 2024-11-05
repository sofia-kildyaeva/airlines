@extends('layout.app')
@section('title')
    Пользователи
@endsection
@section('main')
    <div class="container">
        <div class="row d-flex align-items-center mb-5" style="margin-top: 8rem;">
            <div class="col-3">
                <h2 style="font-size: 42px;font-weight: 500;">Пользователи</h2>
            </div>
            <div class="col-9" style="border: 3px solid #265BE3;height: 0px"></div>
        </div>
        <div class="row">
            <table class="table table-bordered" style="border-color: #265BE3;">
                <thead class="text-white" style="background: #265BE3;">
                <tr class="text-center">
                    <th scope="col">ФИО</th>
                    <th scope="col">логин</th>
                    <th scope="col">почта</th>
                    <th scope="col">действия</th>
                </tr>
                </thead>
                <tbody style="border-top: none">
                @foreach($users as $user)
                    <tr class="text-center">
                        <td>{{$user->fio}}</td>
                        <td>{{$user->login}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{route('EditUserPage', ['user'=>$user])}}" class="btn btn-dark border-0 col-12" style="background: #F4C82C;border-radius: 5px;">редактировать</a>
                                </div>
                                <div class="col-6">
                                    <form action="{{route('DeleteUser', ['user'=>$user])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">удалить</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
