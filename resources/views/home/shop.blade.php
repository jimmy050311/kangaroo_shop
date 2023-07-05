@extends('base.base')

@section('main')

<!-- Page Banner Section Start -->
<div class="section page-banner-section" style="background-image: url(/assets2/images/page-banner.jpg);">
    <div class="container">

         <!-- Page Banner Content End -->
        <div class="page-banner-content">
            <h2 class="title">商品總覽</h2>

             <ul class="breadcrumb">
                <li><a href="/">首頁</a></li>
                <li class="active">商品總覽</li>
            </ul>
        </div>
        <!-- Page Banner Content End -->

     </div>
</div>
<!-- Page Banner Section End -->

 <!-- Shop Section Start -->
<div class="section section-padding mt-n10" id="productView">
    <div class="container">

         <div class="row flex-row-reverse">
            <div class="col-lg-12">
                <!-- Shop top Bar Start -->
                <div class="shop-top-bar">
                    <div class="shop-text">
                        <p>顯示 <span>@{{ productData.length }}</span> 件商品，共 <span>@{{ total }}</span> 筆搜尋結果</p>
                    </div>
                    <div class="shop-tabs">
                        <ul class="nav">
                            <li><button class="active" data-bs-toggle="tab" data-bs-target="#grid"><i class="fa fa-th"></i></button></li>
                            <li><button data-bs-toggle="tab" data-bs-target="#list"><i class="fa fa-list"></i></button></li>
                        </ul>
                    </div>
                    <div class="shop-sort">
                        <select class="form-select form-select-sm" v-model="searchOrder">
                            <option value="1">排序：上架時間(新)</option>
                            <option value="2">排序：上架時間(舊)</option>
                            <option value="3">排序：價格由高->低</option>
                            <option value="4">排序：價格由低->高</option>
                        </select>
                    </div>
                </div>
                <!-- Shop top Bar End -->

                 <div class="tab-content">
                    <div class="tab-pane fade show active" id="grid">

                         <!-- Shop Product Wrapper Start -->
                        <div class="shop-product-wrapper">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6"  v-for="(item, index) in productData">
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <a :href="'/product/'+item.id"><img :src="'/storage/'+item.image" alt="product"></a>
                                        <div class="product-content">
                                            <h4 class="title"><a :href="'/product/'+item.id">@{{ item.name }}</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$@{{ item.real_price_twd }}</span>
                                            </div>
                                        </div>
                                        <ul class="product-meta">
                                            <!-- <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li> -->
                                            <li v-if="{{ Session::get('user') ? Session::get('user') : 0 }} != 0"><a class="action" @click="addCart(item.id, {{Session::get('user')}})"><i class="pe-7s-shopbag"></i></a></li>
                                            <!-- <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li> -->
                                        </ul>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                            </div>
                        </div>
                        <!-- Shop Product Wrapper End -->

                     </div>
                    <div class="tab-pane fade" id="list">

                         <!-- Shop Product Wrapper Start -->
                        <div class="shop-product-wrapper">

                             <!-- Single Product Start -->
                            <div class="single-product-02 product-list" v-for="(item, index) in productData">
                                <div class="product-images">
                                    <a :href="'/product/'+item.id"><img :src="'/storage/'+item.image" alt="product"></a>

                                     <ul class="product-meta">
                                        <!-- <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li> -->
                                        <li v-if="{{ Session::get('user') ? Session::get('user') : 0 }} != 0"><a class="action" @click="addCart(item.id, {{Session::get('user')}})"><i class="pe-7s-shopbag"></i></a></li>
                                        <!-- <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li> -->
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <h4 class="title"><a :href="'/product/'+item.id">@{{ item.name }}</a></h4>
                                    <div class="price">
                                        <span class="sale-price">$@{{ item.real_price_twd }}</span>
                                    </div>
                                    <p>@{{ item.description }}</p>
                                </div>
                            </div>
                            <!-- Single Product End -->

                         </div>
                        <!-- Shop Product Wrapper End -->

                     </div>
                </div>

                 <!-- Page pagination Start -->
                <div class="page-pagination">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" @click="changePage(-1)" v-if="currentPage != 1"><i class="fa fa-angle-left"></i></a></li>
                        <li class="page-item"><a class="page-link" @click="changePage(-1)" v-if="currentPage != 1">@{{ currentPage - 1 }}</a></li>
                        <li class="page-item"><a class="page-link active">@{{ currentPage }}</a></li>
                        <li class="page-item"><a class="page-link" @click="changePage(+1)" v-if="currentPage != totalPage">@{{ currentPage + 1 }}</a></li>
                        <li class="page-item"><a class="page-link" @click="changePage(+1)" v-if="currentPage != totalPage"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
                <!-- Page pagination End -->

             </div>
            <!-- <div class="col-lg-3">

                <div class="sidebar">

                    <div class="sidebar-widget">
                        <div class="widget-search">
                            <form action="#">
                                <input type="text" placeholder="Search">
                                <button><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>

                    <div class="sidebar-widget">

                         <h4 class="widget-title">依產品種類搜尋</h4>

                         <div class="widget-checkbox widget-categories">
                            <ul class="checkbox-items">
                                <li>
                                    <input type="checkbox" id="checkbox1">
                                    <label for="checkbox1"> <span></span>Office Chair</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="checkbox2">
                                    <label for="checkbox2"> <span></span>Dining Chair</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="checkbox3">
                                    <label for="checkbox3"> <span></span>Office Table</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="checkbox4">
                                    <label for="checkbox4"> <span></span>Dining Table</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="checkbox5">
                                    <label for="checkbox5"> <span></span>Bed Light</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="checkbox6">
                                    <label for="checkbox6"> <span></span>Sofa Set</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="checkbox7">
                                    <label for="checkbox7"> <span></span>Office Chair</label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-widget">

                         <h4 class="widget-title">Filter By Price</h4>

                         <div class="widget-price">
                            <input id="price-range" type="text">
                        </div>
                    </div>

                 </div>

            </div> -->
        </div>

     </div>
</div>
<!-- Shop Section End -->

<script>

    new Vue({
        el: '#productView',
        data: {
            productData: [],
            currentPage: 1,
            totalPage: 0,
            total: 0,
            searchOrder: 1,
            category: 0,
        },
        async mounted() {
            this.category = window.location.pathname.split('/')[2]
            this.fetchProduct(1)
        },
        watch: {
            searchOrder(newVal, oldVal) {
                var data = {}
                switch(newVal) {
                    case "1":
                        data = {
                            params: {
                                timeOrder: "desc",
                                page: 1,
                                paginate: 12,
                            }
                        }
                        break
                    case "2":
                        data = {
                            params: {
                                timeOrder: "asc",  
                                page: 1,
                                paginate: 12,   
                            }
                        }
                        break
                    case "3":
                        data = {
                            params: {
                                priceOrder: "desc",
                                page: 1,
                                paginate: 12,
                            }
                        }
                        break
                    case "4":
                        data = {
                            params: {
                                priceOrder: "asc",
                                page: 1,
                                paginate: 12,
                            }
                        }
                        break
                    default:
                }
                axios.get('/front/product/api', data)
                .then((response) => {
                    this.productData = response.data.data.data.data
                    this.totalPage = response.data.dataPage
                    this.total = response.data.data.data.total
                })
            }
        },
        methods: {
            fetchProduct: function(val) {
                const data = {
                    params: {
                        page: val,
                        paginate: 12,
                        category: this.category
                    }
                }
                axios.get('/front/product/api', data)
                .then((response) => {
                    this.productData = response.data.data.data.data
                    this.totalPage = response.data.dataPage
                    this.total = response.data.data.data.total
                })
            },
            changePage: function(val) {
                this.currentPage += val
                this.fetchProduct(this.currentPage)
            },
            addCart: function(product_id, user_id) {
                const data = {
                    product_id: product_id,
                    user_id: user_id,
                    amount: 1
                }
                axios.post('/front/cart/api', data)
                .then((response) => {
                    Swal.fire('成功', response['data']['message'], 'success')
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = window.location.href
                        }
                    })
                })
                .catch((error) => {
                    Swal.fire('失敗!', error.response.data.message,'error')
                })
            },
        },
    })


</script>


@endsection