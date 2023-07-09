@extends('base.base')

@section('main')

    <!-- Slider Section Start -->
    <div class="section slider-section-02">
        <div class="slider-active">
            <div class="swiper-container">
                <div class="swiper-wrapper">

                    <!-- Single Slider Start  -->
                    <div class="single-slider slider-02 swiper-slide animation-style-01" style="background-image: url(/assets2/images/banner/banner-shop-01.jpg);">
                        <div class="container">

                            <!-- Slider Content Start -->
                            <div class="slider-content-02 text-center">
                                <h2 class="title" style="color: white;">限時化妝品優惠中</h2>
                                <p style="color: white;">同樣品質的商品挑戰市場最低價 <br style="color: white;"> 現在下單即享全館免運優惠！</p>
                                <a href="shop-grid-4-column.html" class="btn btn-primary btn-hover-dark">立即前往購物</a>
                            </div>
                            <!-- Slider Content End -->

                        </div>
                    </div>
                    <!-- Single Slider End  -->

                    <!-- Single Slider Start  -->
                    <div class="single-slider slider-02 swiper-slide animation-style-01" style="background-image: url(/assets2/images/banner/banner-shop-02.jpg);">
                        <div class="container">

                            <!-- Slider Content Start -->
                            <div class="slider-content-02 text-center">
                                <h2 class="title" style="color: white;">現實營養品優惠中</h2>
                                <p style="color: white;"> 便宜的產品買到更多的健康 <br style="color: white;"> 現在下單即享全館免運優惠！</p>
                                <a href="shop-grid-4-column.html" class="btn btn-primary btn-hover-dark">立即前往購物</a>
                            </div>
                            <!-- Slider Content End -->

                        </div>
                    </div>
                    <!-- Single Slider End  -->

                    <!-- Add Arrows -->
                    <div class="swiper-button-next" style="color: white;">下一則</div>
                    <div class="swiper-button-prev" style="color: white;">上一則</div>

                </div>
            </div>
        </div>
    </div>
    <!-- Slider Section End -->

    <!-- Benefit Section Start -->
    <div class="section section-padding-02 mt-n6">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">

                    <!-- Single Benefit Start -->
                    <div class="single-benefit">
                        <img src="/assets2/images/icon/icon-1.png" alt="Icon">
                        <h3 class="title">免費直送到府</h3>
                        <p>只要你購買任一商品，都享有全館免運的服務！</p>
                    </div>
                    <!-- Single Benefit End -->

                </div>
                <div class="col-lg-4 col-md-6">

                    <!-- Single Benefit Start -->
                    <div class="single-benefit">
                        <img src="/assets2/images/icon/icon-2.png" alt="Icon">
                        <h3 class="title">保證比市場便宜</h3>
                        <p>挑戰市場的最低價格，但商品品質絕不打折！</p>
                    </div>
                    <!-- Single Benefit End -->

                </div>
                <div class="col-lg-4 col-md-6">

                    <!-- Single Benefit Start -->
                    <div class="single-benefit">
                        <img src="/assets2/images/icon/icon-3.png" alt="Icon">
                        <h3 class="title">優質的售後服務</h3>
                        <p>購買後若有任何問題都歡迎聯繫我們客服，我們將會提供最完善得售後服務！</p>
                    </div>
                    <!-- Single Benefit End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Benefit Section End -->

    <!-- New Product Section Start -->
    <div class="section section-padding-02 mt-n2">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title-02 text-center">
                <h2 class="title">熱門商品</h2>
            </div>
            <!-- Section Title End -->

            <!-- Product Wrapper 02 Start -->
            <div class="product-wrapper-02">

                <!-- Product Menu Start -->
                <div class="product-menu">
                    <ul class="nav justify-content-center">
                        <li><button class="active" data-bs-toggle="tab" data-bs-target="#tab1">精品</button></li>
                        <li><button data-bs-toggle="tab" data-bs-target="#tab2"> 流行品牌 </button></li>
                        <li><button data-bs-toggle="tab" data-bs-target="#tab3"> 彩妝 </button></li>
                        <li><button data-bs-toggle="tab" data-bs-target="#tab4"> 營養品</button></li>
                    </ul>
                </div>
                <!-- Product Menu End -->

                <!-- Product Tabs Content Start -->
                <div class="product-tabs-content">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab1">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-01.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Elona bedside grey table</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-02.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Simple minimal Chair</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-03.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Pendant Chandelier Light</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-04.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">High quality vase bottle</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-05.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Living & Bedroom Chair</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-06.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Herman Arm Grey Chair</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-11.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Lace Bar Stool</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-08.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Herman Seater Sofa</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-09.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Reece Seater Sofa</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-10.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Round Swivel Chair</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-11.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html"> Lace Bar Stool</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-12.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Modern Accent Chair</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-08.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Herman Seater Sofa</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-06.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Herman Arm Grey Chair</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-07.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Wooden decorations</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-02.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Simple minimal Chair</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab3">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-03.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Pendant Chandelier Light</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-04.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">High quality vase bottle</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-08.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Herman Seater Sofa</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-01.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Elona bedside grey table</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-07.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Wooden decorations</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-09.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Reece Seater Sofa</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-02.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Simple minimal Chair</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-07.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Wooden decorations</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab4">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-03.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Pendant Chandelier Light</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-02.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Simple minimal Chair</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-05.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Living & Bedroom Chair</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-04.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">High quality vase bottle</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-10.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Round Swivel Chair</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-11.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Lace Bar Stool</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-05.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Living & Bedroom Chair</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img src="/assets2/images/product/product-07.jpg" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="product-details.html">Wooden decorations</a></h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Single Product End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Tabs Content End -->

            </div>
            <!-- Product Wrapper 02 End -->


        </div>
    </div>
    <!-- New Product Section End -->

    <!-- Banner Section Start -->
    <div class="section section-padding mt-n6">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Single Banner Start -->
                    <div class="single-banner-03">
                        <img src="/assets2/images/banner/banner-shop-04.jpg" alt="Banner">

                        <div class="banner-content">
                            <h6 class="sub-title">網紅大力推薦</h6>
                            <h3 class="title"><a href="shop-grid-left-sidebar.html"> 主打化妝品 <br> 粉底 </a></h3>
                            <a class="btn btn-primary btn-hover-dark" href="shop-grid-left-sidebar.html">立即前往購物</a>
                        </div>
                    </div>
                    <!-- Single Banner End -->
                </div>
                <div class="col-lg-6">
                    <!-- Single Banner Start -->
                    <div class="single-banner-03">
                        <img src="/assets2/images/banner/banner-shop-05.jpg" alt="Banner">

                        <div class="banner-content">
                            <h6 class="sub-title" style="color:white">網紅主打商品</h6>
                            <h3 class="title"><a href="shop-grid-left-sidebar.html"> 主打精品化妝化妝組 <br> 化妝套組 </a></h3>
                            <a class="btn btn-primary btn-hover-dark" href="shop-grid-left-sidebar.html">立即前往購物</a>
                        </div>
                    </div>
                    <!-- Single Banner End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Countdown Section Start -->
    <div class="section section-padding overflow-hidden bg-color-01">
        <div class="container">
            <div class="countdown-main-wrapper mt-n10">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <!-- Countdown Content Start -->
                        <div class="countdown-content">
                            <h2 class="title"> 限時優惠 <span></span> </h2>
                            <p>化妝品使用者的目的是使自己更具吸引力。對大多數女性來說，使用化妝品是她們顯得更加健康、年輕。粉底使皮膚顯現出少女才有的那種平滑、無暇的理想狀態。眼影、眼線和染眉油使眼睛看起來更大、更年輕、更純真及更有吸引力。腮紅使臉部呈現出年輕人激動時產生紅暈的效果。口紅用來使嘴唇顯得更大些，使瑕疵被掩蓋，也是人看起來更年輕，因為青年人的皮膚薄，嘴唇紅。</p>

                            <div class="countdown-wrapper">
                                <div class="countdown" data-countdown="2021/11/20" data-format="short">
                                    <div class="single-countdown">
                                        <span class="count countdown__time daysLeft"></span>
                                        <span class="value countdown__time daysText"></span>
                                    </div>
                                    <div class="single-countdown">
                                        <span class="count countdown__time hoursLeft"></span>
                                        <span class="value countdown__time hoursText"></span>
                                    </div>
                                    <div class="single-countdown">
                                        <span class="count countdown__time minsLeft"></span>
                                        <span class="value countdown__time minsText"></span>
                                    </div>
                                    <div class="single-countdown">
                                        <span class="count countdown__time secsLeft"></span>
                                        <span class="value countdown__time secsText"></span>
                                    </div>
                                </div>
                            </div>

                            <a href="#" class="btn btn-primary btn-hover-dark">立即前往購物</a>
                        </div>
                        <!-- Countdown Content End -->
                    </div>

                    <div class="col-lg-6">
                        <!-- Countdown Images Start -->
                        <div class="countdown-images">
                            <div class="shape-1"></div>
                            <div class="shape-2"></div>
                            <div class="shape-3"></div>

                            <div class="image-box">
                                <img src="/assets2/images/banner/banner-shop-03.jpg" alt="化妝品">
                            </div>
                        </div>
                        <!-- Countdown Images End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Countdown Section End -->

    <!-- Sale Product Section Start -->
    <div class="section section-padding-02">
        <div class="container">
            <div class="">
                <!-- Product Wrapper Start -->
                <div class="product-wrapper product-active-02">

                    <!-- Product Top Wrapper Start -->
                    <div class="product-top-wrapper mt-n1">

                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h2 class="title"># 網紅推薦 </h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Product Menu Start -->
                        <div class="product-menu">
                            <ul class="nav">
                                <li><button class="active" data-bs-toggle="tab" data-bs-target="#tab7">彩妝</button></li>
                                <li><button data-bs-toggle="tab" data-bs-target="#tab8">營養</button></li>
                                <li><button data-bs-toggle="tab" data-bs-target="#tab9">精品</button></li>
                            </ul>
                        </div>
                        <!-- Product Menu End -->

                        <!-- Swiper Arrows End -->
                        <div class="swiper-arrows">
                            <!-- Add Arrows -->
                            <div class="swiper-button-prev"><i class="pe-7s-angle-left"></i></div>
                            <div class="swiper-button-next"><i class="pe-7s-angle-right"></i></div>
                        </div>
                        <!-- Swiper Arrows End -->

                    </div>
                    <!-- Product Top Wrapper End -->

                    <!-- Product Tabs Content Start -->
                    <div class="product-tabs-content">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab7">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img src="/assets2/images/product/product-12.jpg" alt="product"></a>

                                                    <ul class="product-meta">
                                                        <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title"><a href="product-details.html">網紅一</a></h4>
                                                    <div class="price">
                                                        <span class="sale-price">讚讚</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img src="/assets2/images/product/product-08.jpg" alt="product"></a>

                                                    <ul class="product-meta">
                                                        <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title"><a href="product-details.html">網紅二</a></h4>
                                                    <div class="price">
                                                        <span class="sale-price">讚讚</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img src="/assets2/images/product/product-09.jpg" alt="product"></a>

                                                    <ul class="product-meta">
                                                        <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title"><a href="product-details.html">網紅三</a></h4>
                                                    <div class="price">
                                                        <span class="sale-price">讚讚</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img src="/assets2/images/product/product-10.jpg" alt="product"></a>

                                                    <ul class="product-meta">
                                                        <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title"><a href="product-details.html">網紅四</a></h4>
                                                    <div class="price">
                                                        <span class="sale-price">讚讚</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab8">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img src="/assets2/images/product/product-12.jpg" alt="product"></a>

                                                    <ul class="product-meta">
                                                        <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title"><a href="product-details.html">Modern Accent Chair</a></h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img src="/assets2/images/product/product-07.jpg" alt="product"></a>

                                                    <ul class="product-meta">
                                                        <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title"><a href="product-details.html">Wooden decorations</a></h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img src="/assets2/images/product/product-06.jpg" alt="product"></a>

                                                    <ul class="product-meta">
                                                        <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title"><a href="product-details.html">Herman Arm Grey Chair</a></h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img src="/assets2/images/product/product-05.jpg" alt="product"></a>

                                                    <ul class="product-meta">
                                                        <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title"><a href="product-details.html">Living & Bedroom Chair</a></h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab9">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img src="/assets2/images/product/product-04.jpg" alt="product"></a>

                                                    <ul class="product-meta">
                                                        <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title"><a href="product-details.html">High quality vase bottle</a></h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img src="/assets2/images/product/product-03.jpg" alt="product"></a>

                                                    <ul class="product-meta">
                                                        <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title"><a href="product-details.html">Pendant Chandelier Light</a></h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img src="/assets2/images/product/product-02.jpg" alt="product"></a>

                                                    <ul class="product-meta">
                                                        <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title"><a href="product-details.html">Simple minimal Chair</a></h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img src="/assets2/images/product/product-01.jpg" alt="product"></a>

                                                    <ul class="product-meta">
                                                        <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="#"><i class="pe-7s-search"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-shopbag"></i></a></li>
                                                        <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title"><a href="product-details.html">Elona bedside grey table</a></h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Tabs Content End -->

                </div>
                <!-- Product Wrapper End -->
            </div>
        </div>
    </div>
    <!-- Sale Product Section End -->

    <!-- Marker Section Start -->
    <div class="section section-padding-02 mt-n1">
        <div class="container">

            <!-- Marker Wrapper Start -->
            <div class="marker-wrapper" style="background-image: url(/assets2/images/banner/banner-shop-06.jpg);">
                <div class="marker-content">
                    <h6 class="sub-title" style="color: #adadad;">專櫃正版商品</h6>
                    <h3 class="title" style="color: #adadad;"> 經典品牌 <br> 名牌精品 </h3>
                </div>

                <div class="image-pointer pointer-01">
                    <i class="fa fa-plus"></i>

                    <div class="pointer-box">
                        <h4 class="name"><a href="#">商品一</a></h4>
                        <span class="price">$40.00</span>
                    </div>
                </div>

                <div class="image-pointer pointer-02">
                    <i class="fa fa-plus"></i>

                    <div class="pointer-box">
                        <h4 class="name"><a href="#">商品二</a></h4>
                        <span class="price">$40.00</span>
                    </div>
                </div>

                <div class="image-pointer pointer-03">
                    <i class="fa fa-plus"></i>

                    <div class="pointer-box">
                        <h4 class="name"><a href="#">商品三</a></h4>
                        <span class="price">$40.00</span>
                    </div>
                </div>

                <div class="image-pointer pointer-04">
                    <i class="fa fa-plus"></i>

                    <div class="pointer-box">
                        <h4 class="name"><a href="#">商品四</a></h4>
                        <span class="price">$40.00</span>
                    </div>
                </div>
            </div>
            <!-- Marker Wrapper Start -->

        </div>
    </div>
    <!-- Marker Section End -->

    <!-- Brand Logo Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="brand-row">

                <div class="brand-col">
                    <!-- Single Brand Start -->
                    <div class="single-brand">
                        <img src="/assets2/images/brand/brand-1.png" alt="brand">
                    </div>
                    <!-- Single Brand Start -->
                </div>

                <div class="brand-col">
                    <!-- Single Brand Start -->
                    <div class="single-brand">
                        <img src="/assets2/images/brand/brand-2.png" alt="brand">
                    </div>
                    <!-- Single Brand Start -->
                </div>

                <div class="brand-col">
                    <!-- Single Brand Start -->
                    <div class="single-brand">
                        <img src="/assets2/images/brand/brand-3.png" alt="brand">
                    </div>
                    <!-- Single Brand Start -->
                </div>

                <div class="brand-col">
                    <!-- Single Brand Start -->
                    <div class="single-brand">
                        <img src="/assets2/images/brand/brand-4.png" alt="brand">
                    </div>
                    <!-- Single Brand Start -->
                </div>

                <div class="brand-col">
                    <!-- Single Brand Start -->
                    <div class="single-brand">
                        <img src="/assets2/images/brand/brand-5.png" alt="brand">
                    </div>
                    <!-- Single Brand Start -->
                </div>

            </div>
        </div>
    </div>
    <!-- Brand Logo Section End -->

    <style>
        .slider-active .swiper-button-next::before, .slider-active .swiper-button-prev::before {
            position: absolute;
            bottom: 0;
            content: '';
            width: 100px;
            height: 2px;
            background-color: white;
            -webkit-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }
    </style>

@endsection