@extends('base.base')

@section('main')

<!-- Page Banner Section Start -->
<div class="section page-banner-section" style="background-image: url(/assets2/images/page-banner.jpg);">
    <div class="container">

         <!-- Page Banner Content End -->
        <div class="page-banner-content">
            <h2 class="title">購物車</h2>

             <ul class="breadcrumb">
                <li><a href="/">首頁</a></li>
                <li class="active">購物車</li>
            </ul>
        </div>
        <!-- Page Banner Content End -->

     </div>
</div>
<!-- Page Banner Section End -->

 <!-- Shopping Cart Section Start -->
<div class="section section-padding" id="cartView">
    <div class="container">
        <div class="cart-wrapper">
            <!-- Cart Wrapper Start -->
            <div class="cart-table table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="product-thumb">圖片</th>
                            <th class="product-info">產品</th>
                            <th class="product-quantity">數量</th>
                            <th class="product-total-price">總金額</th>
                            <th class="product-action">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in cartData">
                            <td class="product-thumb">
                                <img :src="'/storage/' + item.product.image" alt="">
                            </td>
                            <td class="product-info">
                                <h6 class="name"><a href="product-details.html">@{{ item.product.name }}</a></h6>
                                <div class="product-prices">
                                    <span class="old-price">$@{{ item.product.origin_price_twd }}</span>
                                    <span class="sale-price">$@{{ item.product.real_price_twd }}</span>
                                </div>
                                <div class="product-size-color">
                                    <!-- <p>Size <span>S</span></p> -->
                                    <!-- <p>Color <span>White</span></p> -->
                                </div>
                            </td>
                            <td class="quantity">
                                <div class="product-quantity d-inline-flex">
                                    <button type="button" class="sub" @click="minus(index)">-</i></button>
                                    <input type="text" :value="item.amount" disabled="disabled"/>
                                    <button type="button" class="add" @click="add(index)">+</button>
                                </div>
                            </td>
                            <td class="product-total-price">
                                <span class="price">$@{{ item.product.real_price_twd * item.amount }}</span>
                            </td>
                            <td class="product-action">
                                <a class="remove" @click="deleteProduct(item.id)"><i class="pe-7s-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Cart Wrapper End -->
            <!-- Cart btn Start -->
            <div class="cart-btn">
                <div class="left-btn">
                    <a href="/" class="btn btn-dark btn-hover-primary">繼續購物</a>
                </div>
                <div class="right-btn">
                    <a class="btn btn-outline-dark" @click="clearCart()">清除購物車</a>
                    <!-- <a href="#" class="btn btn-outline-dark">Update Cart</a> -->
                </div>
            </div>
            <!-- Cart btn Start -->
        </div>
        <div class="row">
            <div class="col-lg-4">
                <!-- Cart Shipping Start -->
                <div class="cart-shipping">
                    <div class="cart-title">
                        <h4 class="title">送貨地址</h4>
                        <p>請確認地址無誤再送出訂單，若填錯地址導致商品遺失恕不負責 *</p>
                    </div>
                    <div class="cart-form">
                        <p></p>
                        <div>
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
                            <!-- <div class="single-form">
                                <button class="btn btn-dark btn-hover-primary">Update totals</button>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- Cart Shipping End -->
            </div>
            <div class="col-lg-4">
                <!-- Cart Shipping Start -->
                <!-- <div class="cart-shipping">
                    <div class="cart-title">
                        <h4 class="title">Coupon Code</h4>
                        <p>Enter your coupon code if you have one.</p>
                    </div>
                    <div class="cart-form">
                        <form action="#">
                            <div class="single-form">
                                <input class="form-control" type="text" placeholder="Enter your coupon code..">
                            </div>
                            <div class="single-form">
                                <button class="btn btn-dark btn-hover-primary">Apply Coupon</button>
                            </div>
                        </form>
                    </div>
                </div> -->
                <!-- Cart Shipping End -->
            </div>
            <div class="col-lg-4">
                <!-- Cart Totals Start -->
                <div class="cart-totals">
                    <div class="cart-title">
                        <h4 class="title">購物車總金額</h4>
                    </div>
                    <div class="cart-total-table">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <p class="value">小計</p>
                                    </td>
                                    <td>
                                        <p class="price">$@{{ total }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="value">運費</p>
                                    </td>
                                    <td>
                                        <ul class="shipping-list">
                                            <!-- <li class="radio">
                                                <input type="radio" name="shipping" id="radio1" checked="">
                                                <label for="radio1"><span></span> Flat Rate</label>
                                            </li> -->
                                            <li class="radio">
                                                <input type="radio" name="shipping" id="radio2" checked="">
                                                <label for="radio2"><span></span> 免運 </label>
                                            </li>
                                            <!-- <li class="radio">
                                                <input type="radio" name="shipping" id="radio3">
                                                <label for="radio3"><span></span> Local Pickup</label>
                                            </li> -->
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="value">總金額</p>
                                    </td>
                                    <td>
                                        <p class="price">$@{{ total }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-total-btn">
                        <a class="btn btn-dark btn-hover-primary btn-block" @click="submit()">送出訂購單</a>
                    </div>
                </div>
                <!-- Cart Totals End -->
            </div>
        </div>
    </div>
</div>
<!-- Shopping Cart Section End -->
<script src='/assets2/js/taiwanAddress.js'></script>
<script>
    var user_id = `{{ Session::get('user') }}`
    new Vue({
        el: "#cartView",
        data: {
            cartData: [],
            total: 0,
            amount: 0,
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
            this.fetchCart()
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
            fetchCart: function() {
                axios.get('/front/cart/api/' + user_id)
                .then((response) => {
                    this.cartData = response.data.data
                    this.total = response.data.total
                    response.data.data.forEach(item => {
                        this.amount += item.amount
                    });
                })
                .catch((error) => {
                    
                })
            },
            add: function(val) {
                this.amount += 1
                this.cartData[val].amount += 1
                this.total += this.cartData[val].product.real_price_twd
            },
            minus: function(val) {
                if(this.cartData[val].amount > 1) {
                    this.cartData[val].amount -= 1
                    this.amount -= 1
                    this.total -= this.cartData[val].product.real_price_twd
                }
            },
            deleteProduct: function(val) {
                Swal.fire({
                    title: '訊息',
                    icon: 'info',
                    text: '確定要將此商品從購物車移除嗎？',
                    confirmButtonText: '確定',
                    showCloseButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete('/front/cart/api/' + val)
                        .then((response) => {
                            Swal.fire('成功', response['data']['message'], 'success')
                            this.fetchCart()
                        })
                        .catch((error) => {
                            Swal.fire('失敗!', error.response.data.message,'error')
                        })
                    }
                })
            },
            clearCart: function() {
                Swal.fire({
                    title: '訊息',
                    icon: 'info',
                    text: '確定要清空購物車嗎？',
                    confirmButtonText: '確定',
                    showCloseButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.clear()
                    }
                })
            },
            clear: function() {
                const data = {
                    user_id: user_id
                }
                axios.post('/front/cart/api/clear', data)
                .then((response) => {
                    Swal.fire('成功', response['data']['message'], 'success')
                    this.fetchCart()
                })
                .catch((error) => {
                    Swal.fire('失敗!', error.response.data.message,'error')
                })
            },
            submit: function() {
                var productData = []
                this.cartData.forEach(item => {
                    productData.push({
                        data: [{
                            value: item.product.id,
                            label: item.product.name,
                            number: item.product.number,
                            image: item.product.image,
                            origin_price_aud: item.product.origin_price_aud,
                            real_price_aud: item.product.real_price_aud,
                            origin_price_twd: item.product.origin_price_twd,
                            real_price_twd: item.product.real_price_twd,
                        }],
                        amount: item.amount,
                    })
                })
                const data = {
                    user_id: user_id,
                    price: this.total,
                    discount: 0,
                    ship: 0,
                    total_price: this.total,
                    total_amount: this.amount,
                    status: 0,
                    ship_status: 0,
                    remark: "前台客戶下單",
                    country: "台灣",
                    zipcode: this.zipcode,
                    county: this.county,
                    district: this.district,
                    address: this.address,
                    productData: productData,
                }
                axios.post('/front/order/api', data)
                .then((response) => {
                    this.clear()
                })
                .catch((error) => {
                    Swal.fire('失敗!', error.response.data.message,'error')
                })
            }
        },
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

@endsection