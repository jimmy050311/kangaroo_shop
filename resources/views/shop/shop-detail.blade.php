@extends('base.base')

@section('main')
    <!-- Page Banner Section Start -->
    <div class="section page-banner-section" style="background-image: url(/assets2/images/page-banner.jpg);">
        <div class="container">

            <!-- Page Banner Content End -->
            <div class="page-banner-content">
                <h2 class="title">產品詳情</h2>

                <ul class="breadcrumb">
                    <li><a href="/">首頁</a></li>
                    <li class="active">產品詳情</li>
                </ul>
            </div>
            <!-- Page Banner Content End -->

        </div>
    </div>
    <!-- Page Banner Section End -->

    <!-- Product Details Section Start -->
    <div class="section section-padding-02 mt-n10" id="productDetailView">
        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <!-- Product Details Images Start -->
                    <div class="product-details-images">
                        <!-- Details Gallery Images Start -->
                        <div class="details-gallery-images">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach(json_decode(json_encode($product_data))->img_data as $index => $data)
                                    <div class="swiper-slide">
                                        <div class="single-img zoom">
                                            <img src="{{$data->image}}" alt="">
                                            <div class="inner-stuff">
                                                <div class="gallery-item" data-src="{{$data->image}}">
                                                    <a href="javascript:void(0)">
                                                        <i class="lastudioicon-full-screen"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Details Gallery Images End -->

                        <!-- Details Gallery Thumbs Start -->
                        <div class="details-gallery-thumbs">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach(json_decode(json_encode($product_data))->img_data as $index => $data)
                                    <div class="swiper-slide">
                                        <img src="{{$data->image}}" alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-prev"><i class="pe-7s-angle-left"></i></div>
                            <div class="swiper-button-next"><i class="pe-7s-angle-right"></i></div>
                        </div>
                        <!-- Details Gallery Thumbs End -->

                    </div>
                    <!-- Product Details Images End -->
                </div>
                <div class="col-lg-6">

                    <!-- Product Details Description Start -->
                    <div class="product-details-description">
                        <h4 class="product-name">@{{ name }}</h4>
                        <div class="price">
                            <span class="sale-price">$@{{ real_price }}</span>
                            <span class="old-price">$@{{ old_price }}</span>
                        </div>
                        <div class="review-wrapper">
                            <div class="review-star">
                                <div class="star" style="width: 100%;"></div>
                            </div>
                            <p></p>
                        </div>

                        <p>@{{ description }}</p>

                        <div class="product-meta">
                            <div class="product-quantity d-inline-flex">
                                <button type="button" class="" @click="minus()">-</i></button>
                                <input type="text" v-model="amount"/>
                                <button type="button" class="" @click="add()">+</button>
                            </div>
                            <div class="meta-action">
                                <a class="btn btn-dark btn-hover-primary" @click="addCart()">加入購物車</a>
                            </div>
                        </div>

                        <div class="product-info">
                            <!-- <div class="single-info">
                                <span class="lable">Guaranteed safe checkout:</span>
                                <span class="value"><img src="/assets2/images/payment.png" alt="Payment"></span>
                            </div> -->
                            <div class="single-info">
                                <span class="lable">類別:</span>
                                <span class="value"><a>@{{ category_name }}</a></span>
                            </div>
                            <!-- <div class="single-info">
                                <span class="lable">tag:</span>
                                <span class="value"><a href="#">Furniture</a></span>
                            </div> -->
                            <!-- <div class="single-info">
                                <span class="lable">Share:</span>
                                <ul class="social">
                                    <li><a href="https://www.facebook.com/"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    <!-- Product Details Description End -->

                </div>
            </div>

        </div>
    </div>
    <!-- Product Details Section End -->

    <!-- Product Details tab Section Start -->
    <div class="section section-padding-02" id="productDetailFooterView">
        <div class="container">

            <!-- Product Details Tabs Start -->
            <div class="product-details-tabs">
                <ul class="nav justify-content-center">
                    <li><button data-bs-toggle="tab" data-bs-target="#information">商品規格</button></li>
                    <li><button class="active" data-bs-toggle="tab" data-bs-target="#description">商品資訊</button></li>
                    <li><button data-bs-toggle="tab" data-bs-target="#reviews">評論</button></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade" id="information">
                        <!-- Information Content Start -->
                        <div class="information-content">
                            <h4 class="title">規格</h4>
                            <p>@{{ spec }}</p>

                            <!-- <h4 class="title">Fabric & care</h4>
                            <ul>
                                <li>Faux suede fabric</li>
                                <li>Gold tone metal hoop handles.</li>
                                <li>RI branding</li>
                                <li>Snake print trim interior</li>
                                <li>Adjustable cross body strap</li>
                                <li>Height: 31cm; Width: 32cm; Depth: 12cm; Handle Drop: 61cm</li>
                            </ul>

                            <h4 class="title">Size</h4>
                            <p>one size</p> -->
                        </div>
                        <!-- Information Content End -->
                    </div>
                    <div class="tab-pane fade show active" id="description">
                        <!-- Description Content Start -->
                        <div class="description-content" v-html="introduction">
                        </div>
                        <!-- Description Content End -->
                    </div>
                    <div class="tab-pane fade" id="reviews">
                        <!-- Reviews Content Start -->
                        <div class="reviews-content">

                            <!-- Review Comment Start  -->
                            <div class="reviews-comment">
                                <!-- Single Comment Start  -->
                                <div class="single-reviews" v-for="(item, index) in commentData">
                                    <div class="comment-author">
                                        <img src="/assets2/images/author/user.png" style="width: 60px; height: 60px;" alt="">
                                    </div>
                                    <div class="comment-content">
                                        <div class="author-name-rating">
                                            <h6 class="name">@{{ item.name }}</h6>
                                            <!-- <div class="review-star">
                                                <div class="star" style="width: 80%;"></div>
                                            </div> -->
                                        </div>
                                        <span class="date">@{{ item.created_at }}</span>
                                        <p>@{{ item.comment }}</p>
                                    </div>
                                </div>
                                <!-- Single Comment End  -->
                            </div>
                            <!-- Review Comment End  -->

                            <!-- Review Form Start  -->
                            <div class="reviews-form">
                                <h3 class="reviews-title">新增評論</h3>

                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-form">
                                                <input type="text" placeholder="請輸入名稱" v-model="name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form">
                                                <input type="email" placeholder="john.smith@example.com" v-model="email">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <!-- <div class="review-rating">
                                                <label class="title">星數:</label>
                                                <ul id="rating" class="rating">
                                                    <li class="star" title='Poor' data-value='1'><i class="fa fa-star-o"></i></li>
                                                    <li class="star" title='Poor' data-value='2'><i class="fa fa-star-o"></i></li>
                                                    <li class="star" title='Poor' data-value='3'><i class="fa fa-star-o"></i></li>
                                                    <li class="star" title='Poor' data-value='4'><i class="fa fa-star-o"></i></li>
                                                    <li class="star" title='Poor' data-value='5'><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div> -->
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form">
                                                <textarea placeholder="請寫下您的評論" v-model="comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form">
                                                <button class="btn btn-dark btn-hover-primary" @click="createProductComment()">提交評論</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Review Form End  -->

                        </div>
                        <!-- Reviews Content End -->
                    </div>
                </div>
            </div>
            <!-- Product Details Tabs End -->

        </div>
    </div>
    <!-- Product Details tab Section End -->

    <!-- Sale Product Section Start -->
    <div class="section section-padding mt-n1">
        <div class="container">
            <div class="">
                <!-- Product Wrapper Start -->
                <div class="product-wrapper product-active-02">

                </div>
                <!-- Product Wrapper End -->
            </div>
        </div>
    </div>
    <!-- Sale Product Section End -->

    <script>
        var user_id = `{{ Session::get('user') }}`
        var productView = new Vue({
            el: '#productDetailView',
            data: {
                imageData: [],
                product_id: 0,
                name: '',
                amount: 1,
                real_price: 0,
                old_price: 0,
                description: '',
                category_name: '',
            },
            async created() {
                this.product_id = window.location.pathname.split('/')[2]
                this.fetchProductDetail()
            },
            methods: {
                add: function() {
                    this.amount += 1
                },
                minus: function() {
                    if(this.amount > 1) {
                        this.amount -= 1
                    }
                },
                addCart: function() {
                    const data = {
                        product_id: this.product_id,
                        user_id: user_id,
                        amount: this.amount
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
                fetchProductDetail: function() {
                    axios.get('/front/product/api/' + this.product_id)
                    .then((response) => {
                        this.imageData = response.data.data.img_data
                        this.name = response.data.data.name
                        this.real_price = response.data.data.real_price_twd
                        this.old_price = response.data.data.origin_price_twd
                        this.description = response.data.data.description
                        this.category_name = response.data.data.category_name
                        footer.introduction = response.data.data.introduction
                        footer.spec = response.data.data.spec
                    })
                },
            },
        })

        var footer = new Vue({
            el: '#productDetailFooterView',
            data: {
                commentData: [],
                introduction: '',
                spec: '',
                name: '',
                email: '',
                comment: '',
            },
            mounted() {
                this.fetchProductComment()
            },
            methods: {
                fetchProductComment: function() {
                    const data = {
                        params: {
                            product_id: productView.product_id
                        }
                    }
                    axios.get('/front/product-comment/api', data)
                    .then((response) => {
                        this.commentData = response.data.data
                    })
                },
                createProductComment: function() {
                    const data = {
                        product_id: productView.product_id,
                        name: this.name,
                        email: this.email,
                        comment: this.comment,
                    }
                    axios.post('/front/product-comment/api', data)
                    .then((response) => {
                        Swal.fire('成功', response['data']['message'], 'success')
                        .then((response) => {
                            this.name = ''
                            this.email = ''
                            this.comment = ''
                            this.fetchProductComment()
                        })
                    })
                    .catch((error) => {
                        Swal.fire('失敗!', error.response.data.message,'error')
                    })
                }
            }
        })
        
    </script>
    
@endsection