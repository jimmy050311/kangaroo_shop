<div class="tab-pane fade" id="pills-account">
    <div class="my-account-details account-wrapper">
        <h4 class="account-title">會員詳情</h4>
         <div class="account-details">
            <div class="row">
                <div class="col-md-6">
                    <div class="single-form">
                        <p>名稱</p>
                        <input type="text" placeholder="名稱" v-model="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-form">
                        <p>帳號</p>
                        <input type="text" placeholder="帳號" v-model="account">
                    </div>
                </div>
                <div class="col-md-12" v-if="type == 1">
                    <div class="single-form">
                        <p>身分證字號</p>
                        <input type="text" placeholder="身分證字號" v-model="id_number">
                    </div>
                </div>
                <div class="col-md-12" v-if="type == 2">
                    <div class="single-form">
                        <p>統一編號</p>
                        <input type="text" placeholder="統一編號" v-model="taxid">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="single-form">
                        <p>電子信箱</p>
                        <input type="text" placeholder="電子信箱" v-model="email">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="single-form">
                        <p>聯絡電話</p>
                        <input type="text" placeholder="聯絡電話" v-model="phone">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="single-form">
                        <p>性別</p>
                        <select class="form-select" v-model="gender">
                            <option value="1">男</option>
                            <option value="2">女</option>
                        </select>    
                    </div>
                </div>
                <div class="col-md-12" v-if="type == 1">
                    <div class="single-form">
                        <p>生日</p>
                        <input type="date" placeholder="生日" v-model="birth">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-form">
                        <button class="btn btn-primary btn-hover-dark" @click="submit()">確認更改</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script> 
    var user_id = `{{ Session::get('user') }}`
    new Vue({
        el: "#pills-account",
        data: {
            name: '',
            account: '',
            id_number: '',
            taxid: '',
            email: '',
            phone: '',
            gender: '',
            birth: '',
            type: '',
        },
        mounted() {
            this.fetchUser()
        },
        methods: {
            fetchUser: function() {
                axios.get('/front/user/api/' + user_id)
                .then((response) => {
                    this.name = response.data.data.name
                    this.account = response.data.data.account
                    this.id_number = response.data.data.id_number
                    this.taxid = response.data.data.taxid
                    this.email = response.data.data.email
                    this.phone = response.data.data.phone
                    this.gender = response.data.data.gender
                    this.birth = response.data.data.birth
                    this.type = response.data.data.type
                })
            },
            submit: function() {
                loadingShow()
                const data = {
                    name: this.name,
                    account: this.account,
                    email: this.email,
                    phone: this.phone,
                }
                if(this.type = 1) {
                    data.id_number = this.id_number
                    data.gender = this.gender
                    data.birth = this.birth
                }else if(this.type = 2) {
                    data.taxid = this.taxid
                }
                axios.put('/front/user/api/' + user_id, data)
                .then((response) => {
                    Swal.fire('成功', response['data']['message'], 'success')
                })
                .catch((error) => {
                    Swal.fire('失敗!', error.response.data.message,'error')
                })
            }
        }
    })

</script>
<style>

    .form-select {
        border-radius: 0rem;
        border: 1px solid #ced4da;
        padding-left: 20px;
        padding-right: 28px;
        font-style: italic;
        line-height: 48px;
        font-size: 14px;
        color: #999999;
        
    }

</style>