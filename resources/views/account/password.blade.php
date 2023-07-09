<div class="tab-pane fade" id="pills-password">
    <div class="my-account-details account-wrapper">
        <h4 class="account-title">更改密碼</h4>
         <div class="account-details">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-form">
                        <input type="password" placeholder="舊密碼" v-model="old_password">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-form">
                        <input type="password" placeholder="新密碼" v-model="password">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-form">
                        <input type="password" placeholder="確認密碼" v-model="password_confirmation">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-form">
                        <button class="btn btn-primary btn-hover-dark" @click="submit()">確認修改</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    var user_id = `{{ Session::get('user') }}`
    new Vue({
        el: "#pills-password",
        data: {
            old_password: '',
            password: '',
            password_confirmation: '',
        },
        mounted() {
            
        },
        methods: {
            submit: function() {
                const data = {
                    old_password: this.old_password,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                }
                axios.put('/front/user/api/change-password/' + user_id, data)
                .then((response) => {
                    Swal.fire('成功', response['data']['message'], 'success')
                    this.old_password = ''
                    this.password = ''
                    this.password_confirmation = ''
                })
                .catch((error) => {
                    Swal.fire('失敗!', error.response.data.message,'error')
                })
            }
        },
    })

</script>