@extends('layout.app')
@section('title')
    Контакты
@endsection
@section('main')
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 12rem">
            <div class="col-8 d-flex justify-content-between align-items-center">
                <div class="col-4">
                    <h2 style="font-size: 40px;font-weight: 500;">Контакты</h2>
                </div>
                <div class="col-8">
                    <div style="border: 3px solid #265BE3;height: 0px"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center  mt-4">
            <div class="col-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d35494.13967725152!2d43.720330058203125!3d56.21960699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4151d4516445909d%3A0xa0d0851860a4a1ed!2sS7%20Airlines!5e0!3m2!1sru!2sru!4v1671972662399!5m2!1sru!2sru" width="500" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-3 d-flex justify-content-center align-content-center flex-column">
                <p class="text-black"><strong style="color: #265BE3;">Email: </strong>airlines@mail.ru</p>
                <p class="text-black"><strong style="color: #265BE3;">Телефон: </strong>8 (831) 275-99-09</p>
            </div>
        </div>
    </div>
@endsection
