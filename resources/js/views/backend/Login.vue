<template lang="">
     <!-- BEGIN login -->
     <div class="login login-with-news-feed">
        <!-- BEGIN news-feed -->
        <div class="news-feed">
            <div
                class="news-image"
                style="
                    background-image: url(/assets2/images/background.jpg);
                "
            ></div>
        </div>
        <div class="login-container">
            <div class="login-header mb-30px">
                <div class="brand">
                    <div class="d-flex align-items-center">
                        <b>袋鼠購物趣-後台系統</b>
                    </div>
                    <small>後台管理系統</small>
                </div>
            </div>
            <div class="login-content">
                <!-- <form v-on:submit="checkForm" method="GET" class="fs-13px"> -->
                <div class="form-floating mb-15px">
                    <input
                        type="text"
                        class="form-control h-45px fs-13px"
                        placeholder="管理員帳號"
                        id="account"
                        v-model="account"
                        autocomplete="off"
                    />
                    <label
                        for="account"
                        class="d-flex align-items-center fs-13px text-gray-600"
                        >管理員帳號</label
                    >
                </div>
                <div class="form-floating mb-15px">
                    <input
                        type="password"
                        class="form-control h-45px fs-13px"
                        placeholder="管理員密碼"
                        id="password"
                        v-model="password"
                        autocomplete="off"
                    />
                    <label
                        for="password"
                        class="d-flex align-items-center fs-13px text-gray-600"
                        >管理員密碼</label
                    >
                </div>
                <div class="form-floating mb-15px">
                    <input
                        class="form-control h-45px fs-13px"
                        placeholder="驗證碼"
                        id="captcha"
                        v-model="captcha"
                        autocomplete="off"
                    />
                    <label
                        for="captcha"
                        class="d-flex align-items-center fs-13px text-gray-600"
                        >驗證碼</label
                    >
                </div>
                <div class="col-md-6 mt-sm--20 mt-md--20 mb-3">
                    <img id="imgcode" src=""  style="width: 100%;height: 45px;" @click="refresh()">
                </div>
                <div class="mb-15px">
                    <button
                        type="submit"
                        @click="login()"
                        class="btn btn-success d-block h-45px w-100 btn-lg fs-14px"
                    >
                        登入
                    </button>
                </div>
                <hr class="bg-gray-600 opacity-2" />
                <div
                    class="text-gray-600 text-center text-gray-500-darker mb-0"
                >
                    &copy; 2023 Admin, Inc. All Rights Reserved.
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</template>
<script>

import { useAppOptionStore } from "@/stores/app-option";
import axios from "axios";
import {alert} from '@/swal/default.js';
// import { exit } from "process";
const appOption = useAppOptionStore();
import Swal from "sweetalert2/dist/sweetalert2.js"

// axios.defaults.baseURL = "http://localhost:8000/api/";
export default {
    mounted() {
        appOption.appSidebarHide = true;
        appOption.appHeaderHide = true;
        appOption.appContentClass = "p-0";
        this.refresh()
    },
    beforeRouteLeave(to, from, next) {
        appOption.appSidebarHide = false;
        appOption.appHeaderHide = false;
        appOption.appContentClass = "";
        next();
    },
    methods: {
        login: function() {
            const data = {
                account: this.account,
                password: this.password,
                captcha: this.captcha,
            }
            axios.post('/v1/sign/api/login', data).then((response) => {
                Swal.fire('成功', response['data']['message'], 'success')
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.location.href='/manage/overview'
                        }
                    })
            })
            .catch((error) => {
                Swal.fire('失敗!', error.response.data.message,'error')
                this.refresh()
                return
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
};

</script>