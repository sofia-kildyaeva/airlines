@extends('layout.app')
@section('title')
    Регистрация
@endsection
@section('main')
    <div class="container" id="Registration">
        <div class="row justify-content-center" style="margin-top: 12rem">
            <div class="col-5 d-flex justify-content-between align-items-center">
                <div class="col-3">
                    <h2 style="font-size: 40px;font-weight: 500;color: #265BE3;">Регистрация</h2>
                </div>
                <div class="col-5">
                    <div style="border: 3px solid #265BE3;height: 0px"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-5">
                <form id="form" @submit.prevent="Registration">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="ФИО" style="height: 45px" :class="errors.fio ? 'is-invalid' : '' " name="fio">
                        <div :class="errors.fio ? 'invalid-feedback' : '' " v-for="error in errors.fio">
                            @{{ error }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="date" class="form-control" placeholder="дата рождения" style="height: 45px" :class="errors.birthday ? 'is-invalid' : '' " name="birthday">
                        <div :class="errors.birthday ? 'invalid-feedback' : '' " v-for="error in errors.birthday">
                            @{{ error }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="серия и номер паспорта" style="height: 45px" :class="errors.passport ? 'is-invalid' : '' " name="passport">
                        <div :class="errors.passport ? 'invalid-feedback' : '' " v-for="error in errors.passport">
                            @{{ error }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="электронная почта" style="height: 45px" :class="errors.email ? 'is-invalid' : '' " name="email">
                        <div :class="errors.email ? 'invalid-feedback' : '' " v-for="error in errors.email">
                            @{{ error }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="телефон" style="height: 45px" :class="errors.phone ? 'is-invalid' : '' " name="phone">
                        <div :class="errors.phone ? 'invalid-feedback' : '' " v-for="error in errors.phone">
                            @{{ error }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="логин" style="height: 45px" :class="errors.login ? 'is-invalid' : '' " name="login">
                        <div :class="errors.login ? 'invalid-feedback' : '' " v-for="error in errors.login">
                            @{{ error }}
                        </div>
                    </div>
                    <div class="mb-3 mt-2">
                        <input type="password" class="form-control" placeholder="пароль" style="height: 45px" :class="errors.password ? 'is-invalid' : '' " name="password">
                        <div :class="errors.password ? 'invalid-feedback' : '' " v-for="error in errors.password">
                            @{{ error }}
                        </div>
                    </div>
                    <div class="mb-3 mt-2">
                        <input type="password" class="form-control" placeholder="повторите пароль" style="height: 45px" :class="errors.password ? 'is-invalid' : '' " name="password_confirmation">
                        <div :class="errors.password ? 'invalid-feedback' : '' " v-for="error in errors.password">
                            @{{ error }}
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" :class="errors.rules ? 'is-invalid' : '' " name="rules">
                        <label class="form-check-label">Соглашаюсь с правилами регистрации</label>
                        <div :class="errors.rules ? 'invalid-feedback' : '' " v-for="error in errors.rules">
                            @{{ error }}
                        </div>
                    </div>
                    <button type="submit" class="btn mt-2 text-white col-6" style="background: #F4C82C;border-radius: 5px;height: 45px;">зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const Registration={
            data(){
                return{
                    errors:[],
                }
            },
            methods:{
                async Registration() {
                    const form = document.querySelector('#form');
                    const form_data = new FormData(form);
                    const response = await fetch('{{route('NewUserSave')}}', {
                        method: 'post',
                        headers:{
                            'X-CSRF-TOKEN': '{{csrf_token()}}',
                        },
                        body: form_data,
                    });
                    if (response.status===400) {
                        this.errors = await response.json();
                        setTimeout(()=>{
                            this.errors = [];
                        }, 2500);
                    }
                    if(response.status===200) {
                        window.location = response.url;
                    }
                }
            }
        }
        Vue.createApp(Registration).mount('#Registration');
    </script>
@endsection
