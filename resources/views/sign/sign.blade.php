@extends('base.base')

@section('main')

<!-- Page Banner Section Start -->
<div class="section page-banner-section" style="background-image: url(/assets2/images/page-banner.jpg);">
    <div class="container">

         <!-- Page Banner Content End -->
        <div class="page-banner-content">
            <h2 class="title">登入</h2>

             <ul class="breadcrumb">
                <li><a href="/">首頁</a></li>
                <li class="active">登入</li>
            </ul>
        </div>
        <!-- Page Banner Content End -->

     </div>
</div>
<!-- Page Banner Section End -->

 <!-- Login Section Start -->
<div class="section section-padding mt-n1" id="loginView">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Login & Register Start -->
                <div class="login-register-wrapper">
                    <h4 class="title">登入帳號</h4>
                    
                        <div class="single-form">
                            <input type="text" placeholder="請輸入帳號" v-model="account">
                        </div>
                        <div class="single-form">
                            <input type="password" placeholder="請輸入密碼" v-model="password">
                        </div>
                        <div class="single-form">
                            <input type="text" placeholder="請輸入驗證碼" v-model="captcha">
                        </div>
                        <!-- <div class="single-form">
                            <input type="checkbox" id="remember">
                            <label for="remember"><span></span> Remember me</label>
                        </div> -->
                        <div class="col-md-6 mt-sm--20 mt-md--20 mb-3 mt-2">
                            <img id="imgcode" src=""  style="width: 100%;height: 45px;" @click="refresh()">
                        </div>
                        <div class="single-form">
                            <button class="btn btn-primary btn-hover-dark" @click="login">登入</button>
                        </div>
                    
                    <!-- <p><a href="#">Lost your password?</a></p> -->
                    <p>加入我們？ <a href="/contact">請致聯絡我們留下您的資料</a></p>
                </div>
                <!-- Login & Register End -->
            </div>
        </div>
    </div>
</div>
<!-- Login Section End -->

<script>

    new Vue({
        el: "#loginView",
        data: {
            account: '',
            password: '',
            captcha: '',
        },
        mounted() {
            this.refresh()
        },
        methods: {
            login: function() {
                const data = {
                    account: this.account,
                    password: this.password,
                    captcha: this.captcha,
                }
                axios.post('/front/user/api/login', data)
                .then((response) => {
                    Swal.fire('成功!', response['data']['message'],'success')
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.location.href='/'
                        }
                    })
                })
                .catch((error) => {
                    Swal.fire('失敗!', error.response.data.message,'error')
                })
            },
            refresh: function() {
                axios.post('/captcha').then((response) => {
                    document.getElementById("imgcode").src=response.data.url; 
                })
                .catch((error) => {
                    Swal.fire('失敗!', error.response.data.message,'error')
                }) 
            }
        },
    })


</script>

@endsection