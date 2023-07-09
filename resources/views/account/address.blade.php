<div class="tab-pane fade" id="pills-address">
    <div class="my-account-address account-wrapper">
        <div class="row">
            <div class="col-md-6">
                <h4 class="account-title">送貨地址</h4>
                <div class="account-address mt-30">
                    <h6 class="name">@{{ name }}</h6>
                    <p> @{{ county }} <br> @{{ district }} <br> @{{ address }} <br> 郵遞區號: @{{ zipcode }} </p>
                    <p> 手機: @{{ phone }}</p>
                    <a class="btn btn-primary btn-hover-dark action" data-bs-toggle="modal" data-bs-target="#addressView"><i class="fa fa-edit"></i> 編輯地址 </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick View Start -->
<div class="modal fade" id="addressView">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <!-- Quick View Description Start -->
                <div class="quick-view-description">
                    <h4 class="product-name">編輯地址</h4>

                    <div class="single-select2">
                        <div class="form-select2">
                            <select class="form-select" v-model="countyPosition">
                                <option value="" disabled>請選擇縣市</option>
                                <option v-for="(item, index) in addressDatas" :value="index">@{{ item.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="single-select2">
                        <div class="form-select2">
                            <select class="form-select" v-model="districtPosition">
                                <option value="" disabled>請選擇鄉鎮市區</option>
                                <option v-for="(item, index) in districtDatas" :value="index">@{{ item.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="single-form">
                        <input class="form-control" type="text" placeholder="郵遞區號" disabled="disabled" v-model="zipcode">
                    </div>
                    <div class="single-form">
                        <input class="form-control" type="text" placeholder="請輸入地址" v-model="address">
                    </div>
 
                    <div class="product-meta">
                        <div class="meta-action">
                            <button class="btn btn-dark btn-hover-primary" data-bs-dismiss="modal" aria-label="Close" @click="submit()"> 確定送出 </button>
                        </div>
                    </div>
                </div>
                <!-- Quick View Description End -->
            </div>
        </div>
    </div>
</div>
<!-- Quick View End -->

<script src='/assets2/js/taiwanAddress.js'></script>
<script>
    var user_id = `{{ Session::get('user') }}`
    new Vue({
        el: '#pills-address',
        data: {
            name: '',
            county: '',
            district: '',
            address: '',
            zipcode: '',
            phone: ''
        },
        mounted() {
            this.fetchUser()  
        },
        methods: {
            fetchUser: function() {
                axios.get('/front/user/api/' + user_id)
                .then((response) => {
                    console.log(response.data.data)
                    this.name = response.data.data.name
                    this.county = response.data.data.county
                    this.district = response.data.data.district
                    this.address = response.data.data.address
                    this.zipcode = response.data.data.zipcode
                    this.phone = response.data.data.phone
                })
                .catch((error) => {
                    Swal.fire('失敗!', error.response.data.message,'error')
                })
            }
        },
    })

    new Vue({
        el: '#addressView',
        data: {
            addressDatas: [],
            districtDatas: [],
            zipcode: '',
            countyPosition: '',
            districtPosition: '',
            district: '',
            address: '',
            county: '',
        },
        mounted() {
            this.addressDatas = allAddressDatas;
        },
        watch: {
            countyPosition: function() {
                this.districtDatas = this.addressDatas[this.countyPosition]['districts']
                this.county = this.addressDatas[this.countyPosition]['name']
                this.districtPosition = ''
            },
            districtPosition: function() {
                this.district = this.districtDatas[this.districtPosition]['name']
                this.zipcode = this.districtDatas[this.districtPosition]['zip']
            },
        },
        methods: {
            submit: function() {
                const data = {
                    country: "台灣",
                    zipcode: this.zipcode,
                    county: this.county,
                    district: this.district,
                    address: this.address,
                }
                axios.put('/front/user/api/' + user_id, data)
                .then((response) => {
                    Swal.fire('成功', response['data']['message'], 'success')
                    this.zipcode = ''
                    this.county = ''
                    this.district = ''
                    this.address = ''
                })
                .catch((error) => {
                    Swal.fire('失敗!', error.response.data.message,'error')
                })
            }
        }
    })

</script>