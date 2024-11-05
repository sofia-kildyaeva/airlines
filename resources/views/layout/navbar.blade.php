<nav class="navbar bg-light fixed-top" style="background: linear-gradient(89.28deg, #2A27CB 3.49%, #265BE3 45.04%, #4BC4F9 93.82%);">
    <div class="container-fluid container pt-2">
        <a class="navbar-brand" href="{{route('HomePage')}}">
            <img src="{{asset('public/img/Frame.png')}}" alt="">
        </a>
        <a class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <img src="{{asset('public/img/Vector.png')}}" alt="">
        </a>
        <div class="offcanvas offcanvas-end text-white" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="background: rgba(42, 39, 203, 0.5); padding-top: 5vh">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Меню</h5>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item d-flex align-items-center">
                        <img src="{{asset('public/img/maincomponent.png')}}" alt="" style="margin-right: 3vh;">
                        <a class="nav-link text-white" href="{{route('HomePage')}}">Главная</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16" style="margin-right: 3vh;">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                        </svg>
                        <a class="nav-link text-white" href="{{route('ContactsPage')}}">Контакты</a>
                    </li>
                    @guest()
                        <li class="nav-item d-flex align-items-center">
                            <img src="{{asset('public/img/logincurve.png')}}" alt="" style="margin-right: 3vh;">
                            <a class="nav-link text-white" href="{{route('AuthPage')}}">Авторизация</a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <img src="{{asset('public/img/useredit.png')}}" alt="" style="margin-right: 3vh;">
                            <a class="nav-link text-white" href="{{route('RegistrationPage')}}">Регистрация</a>
                        </li>
                    @endguest
                    @auth()
                        @if(\Illuminate\Support\Facades\Auth::user() and \Illuminate\Support\Facades\Auth::user()->role==='user')
                            <li class="nav-item d-flex align-items-center">
                                <img src="{{asset('public/img/profile2user.png')}}" alt="" style="margin-right: 3vh;">
                                <a class="nav-link text-white" href="{{route('UserPage')}}">Личный кабинет</a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <img src="{{asset('public/img/airplane.png')}}" alt="" style="margin-right: 3vh;">
                                <a class="nav-link text-white" href="{{route('UserTicketsPage')}}">Мои билеты</a>
                            </li>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user() and \Illuminate\Support\Facades\Auth::user()->role==='admin')
                            <li class="nav-item d-flex align-items-center">
                                <img src="{{asset('public/img/buildings.png')}}" alt="" style="margin-right: 3vh;">
                                <a class="nav-link text-white" href="{{route('CitiesPage')}}">Города</a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <img src="{{asset('public/img/menuboard.png')}}" alt="" style="margin-right: 3vh;">
                                <a class="nav-link text-white" href="{{route('AdminFlightsPage')}}">Рейсы</a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <img src="{{asset('public/img/ticket.png')}}" alt="" style="margin-right: 3vh;">
                                <a class="nav-link text-white" href="{{route('TicketsPage')}}">Билеты</a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <img src="{{asset('public/img/airplane.png')}}" alt="" style="margin-right: 3vh;">
                                <a class="nav-link text-white" href="{{route('AirsPage')}}">Самолеты</a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-sign-merge-right" viewBox="0 0 16 16" style="margin-right: 3vh;">
                                    <path d="M8.75 6v1c.14.301.338.617.588.95.537.716 1.259 1.44 2.016 2.196l-.708.708-.015-.016c-.652-.652-1.33-1.33-1.881-2.015V12h-1.5V6H6.034a.25.25 0 0 1-.192-.41l1.966-2.36a.25.25 0 0 1 .384 0l1.966 2.36a.25.25 0 0 1-.192.41H8.75Z"/>
                                    <path fill-rule="evenodd" d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435Zm-1.4.7a.495.495 0 0 1 .7 0l6.516 6.515a.495.495 0 0 1 0 .7L8.35 14.866a.495.495 0 0 1-.7 0L1.134 8.35a.495.495 0 0 1 0-.7L7.65 1.134Z"/>
                                </svg>
                                <a class="nav-link text-white" href="{{route('AirportsPage')}}">Аэропорты</a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <img src="{{asset('public/img/profile2user.png')}}" alt="" style="margin-right: 3vh;">
                                <a class="nav-link text-white" href="{{route('UsersPage')}}">Пользователи</a>
                            </li>
                        @endif
                        <li class="nav-item d-flex align-items-center">
                            <img src="{{asset('public/img/logoutcurve.png')}}" alt="" style="margin-right: 3vh;">
                            <a class="nav-link text-white" href="{{route('ExitUser')}}">Выход</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>
