@extends('layout.app')
@section('title')
    Авторизация
@endsection
@section('main')
    <div class="container" id="Auth">
        <div class="row justify-content-center" style="margin-top: 20rem">
            <div class="col-5 d-flex justify-content-between align-items-center">
                <div class="col-3">
                    <h2 style="font-size: 40px;font-weight: 500;color: #265BE3;">Авторизация</h2>
                </div>
                <div class="col-5">
                    <div style="border: 3px solid #265BE3;height: 0px"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-5">
                <div :class="message ? 'alert alert-danger' : ''">
                    @{{ message }}
                </div>
                <form id="form" @submit.prevent="Auth">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="логин" style="height: 45px" :class="errors.login ? 'is-invalid':''" name="login">
                        <div :class="errors.login ? 'invalid-feedback':''" v-for="error in errors.login">
                            @{{ error }}
                        </div>
                    </div>
                    <div class="mb-3 mt-2">
                        <input type="password" class="form-control" placeholder="пароль" style="height: 45px" :class="errors.password ? 'is-invalid':''" name="password">
                        <div :class="errors.password ? 'invalid-feedback':''" v-for="error in errors.password">
                            @{{ error }}
                        </div>
                    </div>
                    <button type="submit" class="btn mt-2 text-white col-6" style="background: #F4C82C;border-radius: 5px;height: 45px;">вход</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const Auth={
            data() {
                return{
                    errors:[],
                    message:'',
                }
            },
            methods:{
                async Auth() {
                    const form = document.querySelector('#form');
                    const form_data = new FormData(form);
                    const response = await fetch('{{route('LoginUser')}}', {
                        method:'post',
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}',
                        },
                        body: form_data,
                    });
                    if (response.status === 400) {
                        this.errors = await response.json();
                        setTimeout(()=>{
                            this.errors = [];
                        }, 2500);
                    }
                    if (response.status === 403) {
                        this.message = await response.json();
                        setTimeout(()=>{
                            this.message = null;
                        }, 2500);
                    }
                    if (response.status === 200) {
                        window.location = response.url;
                    }
                }
            }
        }
        Vue.createApp(Auth).mount('#Auth');
    </script>
@endsection
