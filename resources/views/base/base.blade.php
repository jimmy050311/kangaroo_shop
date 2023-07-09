<!DOCTYPE html>
<html lang="en">

    @include('base.header')
    <!-- Header Start  -->
    <div class="header-area header-white header-sticky d-none d-lg-block" id="headerView">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <!-- Header Logo Start -->
                    <div class="header-logo">
                        <a href="/"><img src="/assets2/images/logo.png" alt="Logo"></a>
                    </div>
                    <!-- Header Logo End -->
                </div>
                <div class="col-lg-6">
                    <div class="header-menu">
                        <ul class="nav-menu">
                            <li>
                                <a href="/">首頁</a>
                                <!-- <ul class="sub-menu">
                                    <li><a href="index.html">Home 01</a></li>
                                    <li><a href="index-2.html">Home 02</a></li>
                                </ul> -->
                            </li>
                            <li><a href="/about">關於我們</a></li>
                            <li>
                                <a href="#">商品</a>
                                <ul class="mega-sub-menu">
                                    <li v-for="(parent, index) in categoryData">
                                        <a :href="/shop/ + parent.parent_id" class="menu-title">@{{ parent.parent_name }}</a>
                                         <ul class="menu-item" v-for="(child, index) in parent.children">
                                            <li><a :href="/shop/ + child.children_id">@{{ child.children_name }}</a></li>
                                        </ul>
                                    </li>
                                     <li class="manu-banner">
                                        <a href="#"><img src="/assets2/images/banner-menu-01.jpg" alt=""></a>
                                    </li>
                                    <li class="manu-banner">
                                        <a href="#"><img src="/assets2/images/banner-menu-02.jpg" alt=""></a>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li>
                                <a href="#">最新消息</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Blog Grid</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-grid.html">Blog Grid</a></li>
                                            <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
                                            <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Blog List</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
                                            <li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Blog Details</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-details-left-sidebar.html">Blog details Left Sidebar</a></li>
                                            <li><a href="blog-details-right-sidebar.html">Blog details Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li> -->
                            <li><a href="/contact">聯絡我們</a></li>
                            
                        </ul>

                     </div>
                </div>
                <div class="col-lg-3">
                    <!-- Header Meta Start -->
                    <div class="header-meta">

                        <div class="dropdown">
                            <a class="action" role="button" data-bs-toggle="dropdown"> <i class="pe-7s-search"></i> </a>

                             <div class="dropdown-menu dropdown-search">
                                <!-- Header Search Start -->
                                <div class="header-search">
                                    <form action="#">
                                        <input type="text" placeholder="Enter your search key ... ">
                                        <button><i class="pe-7s-search"></i></button>
                                    </form>
                                </div>
                                <!-- Header Search End -->
                            </div>
                        </div>
       
                        <div class="dropdown">
                            <a class="action" href="#" role="button" data-bs-toggle="dropdown"><i class="pe-7s-user"></i></a>

                            <ul class="dropdown-menu dropdown-profile">
                                <li v-if="{{ Session::get('user') ? Session::get('user') : 0 }} != 0"><a href="/account">會員中心</a></li>
                                <li v-if="{{ Session::get('user') ? Session::get('user') : 0 }} != 0"><a href="/cart">購物車</a></li>
                                <li v-if="{{ Session::get('user') ? Session::get('user') : 0 }} != 0"><a @click="logout()">登出</a></li>
                                <li v-if="{{ Session::get('user') ? Session::get('user') : 0 }} == 0"><a href="/sign">登入</a></li>
                            </ul>
                        </div>
                 
                        <!-- <a class="action" href="wishlist.html"><i class="pe-7s-like"></i></a> -->

                        <div class="dropdown" v-if="{{ Session::get('user') ? Session::get('user') : 0 }} != 0">
                            <a class="action" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="pe-7s-shopbag"></i>
                                <span class="number">@{{ cartData.length }}</span>
                            </a>

                             <div class="dropdown-menu dropdown-cart">
                                <div class="cart-content" id="cart-content">
                                    <ul>
                                        <li v-for="(item, index) in cartData">
                                            <!-- Single Cart Item Start -->
                                            <div class="single-cart-item">
                                                <div class="cart-thumb">
                                                    <img :src="'/storage/'+item.product.image" alt="Cart">
                                                    <span class="product-quantity">@{{ item.amount }}x</span>
                                                </div>
                                                <div class="cart-item-content">
                                                    <h6 class="product-name">@{{ item.product.name }}</h6>
                                                    <span class="product-price">$@{{ item.product.real_price_twd }}</span>
                                                    <div class="attributes-content">
                                                        <span><strong>類別:</strong> @{{ item.product.category_name }} </span>
                                                    </div>
                                                    <a class="cart-remove" href="#"><i class="las la-times"></i></a>
                                                </div>
                                            </div>
                                            <!-- Single Cart Item End -->
                                        </li>
                                    </ul>
                                </div>

                                 <div class="cart-price">
                                    <div class="cart-subtotals">
                                        <!-- <div class="price-inline">
                                            <span class="label">Subtotal</span>
                                            <span class="value">$42.70</span>
                                        </div> -->
                                        <!-- <div class="price-inline">
                                            <span class="label">Shipping</span>
                                            <span class="value">$7.00</span>
                                        </div>
                                        <div class="price-inline">
                                            <span class="label">Taxes</span>
                                            <span class="value">$0.00</span>
                                        </div> -->
                                    </div>
                                    <div class="cart-total">
                                        <div class="price-inline">
                                            <span class="label">總金額</span>
                                            <span class="value">$@{{ total }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-btn">
                                    <a href="/cart" class="btn btn-dark btn-hover-primary d-block">購物車</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Header Meta End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Header Mobile Start -->
    <div class="header-mobile section d-lg-none" id="headerMobileView">

         <!-- Header Mobile top Start -->
        <div class="header-mobile-top header-sticky">
            <div class="container">
                <div class="row row-cols-3 gx-2 align-items-center">
                    <div class="col">

                         <!-- Header Toggle Start -->
                        <div class="header-toggle">
                            <button class="mobile-menu-open">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                        <!-- Header Toggle End -->

                     </div>
                    <div class="col">

                         <!-- Header Logo Start -->
                        <div class="header-logo text-center">
                            <a href="/"><img src="/assets2/images/logo.png" alt="Logo"></a>
                        </div>
                        <!-- Header Logo End -->

                     </div>
                    <div class="col">
                         <!-- Header Action Start -->
                        <div class="header-meta">
                            <div class="dropdown">
                                <a class="action" href="#" role="button" data-bs-toggle="dropdown"><i class="pe-7s-user"></i></a>

                                 <ul class="dropdown-menu dropdown-profile">
                                    <li v-if="{{ Session::get('user') ? Session::get('user') : 0 }} != 0"><a href="/account">會員中心</a></li>
                                    <li v-if="{{ Session::get('user') ? Session::get('user') : 0 }} != 0"><a href="/cart">購物車</a></li>
                                    <li v-if="{{ Session::get('user') ? Session::get('user') : 0 }} != 0"><a @click="logout()">登出</a></li>
                                    <li v-if="{{ Session::get('user') ? Session::get('user') : 0 }} == 0"><a href="/sign">登入</a></li>
                                </ul>
                            </div>
                            <a class="action" href="/cart" v-if="{{ Session::get('user') ? Session::get('user') : 0 }} != 0">
                                <i class="pe-7s-shopbag"></i>
                                <span class="number">3</span>
                            </a>
                        </div>
                        <!-- Header Action End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Mobile top End -->

         <!-- Header Mobile Bottom End -->
        <div class="header-mobile-bottom">
            <div class="container">

                 <!-- Header Search Start -->
                <div class="header-search">
                    <form action="#">
                        <input type="text" placeholder="Enter your search key ... ">
                        <button><i class="pe-7s-search"></i></button>
                    </form>
                </div>
                <!-- Header Search End -->

             </div>
        </div>
        <!-- Header Mobile Bottom End -->

    </div>
    <!-- Header Mobile End -->


    <!-- off Canvas Start -->
    <div class="off-canvas-box">

    <!-- Canvas Action Start -->
    <!-- <div class="canvas-action">
        <a class="action" href="compare.html"><i class="icon-sliders"></i> Compare <span class="action-num">(3)</span></a>
        <a class="action" href="wishlist.html"><i class="icon-heart"></i> Wishlist <span class="action-num">(3)</span></a>
    </div> -->
    <!-- Canvas Action end -->

    <!-- Canvas Close bar Start -->
    <div class="canvas-close-bar">
        <span>Menu</span>
        <a class="menu-close" href="javascript:;"><i class="pe-7s-angle-left"></i></a>
    </div>
    <!-- Canvas Close bar End -->

    <!-- Canvas Menu Start -->
    <div class="canvas-menu" id="headerMobileView">
        <nav>
            <ul class="nav-menu">
                <li>
                    <a href="/">首頁</a>
                    <!-- <ul class="sub-menu">
                        <li><a href="index.html">Home 01</a></li>
                        <li><a href="index-2.html">Home 02</a></li>
                    </ul> -->
                </li>
                <li><a href="/about">關於我們</a></li>
                <li>
                    <a href="#">商品</a>
                    <ul class="mega-sub-menu">
                        <li v-for="(parent, index) in categoryData">
                            <a :href="/shop/ + parent.parent_id" class="menu-title">@{{ parent.parent_name }}</a>
                             <ul class="menu-item" v-for="(child, index) in parent.children">
                                <li><a :href="/shop/ + child.children_id">@{{ child.children_name }}</a></li>
                            </ul>
                        </li>

                        <li class="manu-banner">
                            <a href="#"><img src="/assets2/images/banner-menu-01.jpg" alt=""></a>
                        </li>
                        <li class="manu-banner">
                            <a href="#"><img src="/assets2/images/banner-menu-02.jpg" alt=""></a>
                        </li>
                    </ul>
                </li>
                <!-- <li>
                    <a href="#">最新消息</a>
                    <ul class="sub-menu">
                        <li><a href="#">Blog Grid</a>
                            <ul class="sub-menu">
                                <li><a href="blog-grid.html">Blog Grid</a></li>
                                <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
                                <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Blog List</a>
                            <ul class="sub-menu">
                                <li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
                                <li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Blog Details</a>
                            <ul class="sub-menu">
                                <li><a href="blog-details-left-sidebar.html">Blog details Left Sidebar</a></li>
                                <li><a href="blog-details-right-sidebar.html">Blog details Right Sidebar</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
                <li><a href="/contact">聯絡我們</a></li>
                
            </ul>

        </nav>
    </div>
    <!-- Canvas Menu End -->

    </div>
    <!-- off Canvas End -->

    <div class="menu-overlay"></div>

    @yield('main')
    
    <!-- Footer Section Start -->
    <div class="section footer-section">

    <!-- Footer Top Start -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-md-4">

                    <!-- Footer Logo Start -->
                    <div class="footer-logo">
                        <a href="index.html"><img src="/assets2/images/logo.png" alt="Logo"></a>
                    </div>
                    <!-- Footer Logo End -->

                </div>
                <div class="col-xl-5 col-md-8">

                    <!-- Footer Contact & Payment End -->
                    <div class="footer-contact-payment">
                        <div class="footer-contact">
                            <div class="contact-icon">
                                <img src="/assets2/images/icon/icon-4.png" alt="Icon">
                            </div>

                            <div class="contact-content">
                                <h6 class="title">Call Us:</h6>
                                <p>00 123 456 789</p>
                            </div>
                        </div>
                        <div class="footer-payment">
                            <img src="/assets2/images/payment.png" alt="Payment">
                        </div>
                    </div>
                    <!-- Footer Contact & Payment End -->

                </div>
                <div class="col-xl-5 ">

                    <!-- Footer Subscribe End -->
                    <div class="footer-subscribe">
                        <span class="title">Subscribe Now :</span>
                        <div class="subscribe-form">
                            <form action="#">
                                <input type="text" placeholder="Your Mail">
                                <button><i class="pe-7s-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- Footer Subscribe End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Footer Top End -->

    <!-- Footer Widget Section Start -->
    <div class="footer-widget-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">

                    <!-- Footer Widget Start -->
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">Customer Service</h4>

                        <ul class="footer-link">
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Money-back guarantee!</a></li>
                            <li><a href="#">Returns-Shipping</a></li>
                            <li><a href="#">Terms and conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <!-- Footer Widget End -->

                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <!-- Footer Widget Start -->
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">Information</h4>

                        <ul class="footer-link">
                            <li><a href="#">About Furbar</a></li>
                            <li><a href="#">How to Shop</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Contact us</a></li>
                            <li><a href="#">Log in</a></li>
                        </ul>
                    </div>
                    <!-- Footer Widget End -->
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <!-- Footer Widget Start -->
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">My Account</h4>

                        <ul class="footer-link">
                            <li><a href="#">Sign In</a></li>
                            <li><a href="#">View Cart</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                    <!-- Footer Widget End -->
                </div>
                <div class="col-lg-2 col-md-5 col-sm-6">
                    <!-- Footer Widget Start -->
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">Our Stores</h4>

                        <ul class="footer-link">
                            <li><a href="#">New aYork</a></li>
                            <li><a href="#">London SF</a></li>
                            <li><a href="#">Cockfosters BP</a></li>
                            <li><a href="#">Los Angeles</a></li>
                            <li><a href="#">Chicago</a></li>
                        </ul>
                    </div>
                    <!-- Footer Widget End -->
                </div>
                <div class="col-lg-3 col-md-7">
                    <!-- Footer Widget Start -->
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">About Us</h4>

                        <div class="widget-about">
                            <p>Lorem ipsum dolor sit amet consect adipisicing elit sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Ut enim ad minim</p>
                        </div>
                        <div class="widget-social">
                            <ul>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-tumblr"></i></a></li>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Widget End -->

    <!-- Footer Copyright End -->
    <div class="copyright">
        <div class="container">
            <div class="copyright-text">
                <p>&copy; 2023 <span> 袋鼠購物趣 </span>  <i class="" aria-hidden="true"></i>  <a href="#" target="_blank"></a></p>
            </div>
        </div>
    </div>
    <!-- Footer Copyright End -->

    </div>
    <!-- Footer Section End -->

    <!--Back To Start-->
    <a href="#" class="back-to-top">
    <i class="pe-7s-angle-up"></i>
    </a>
    <!--Back To End-->


    <!-- Quick View Start -->
    <div class="modal fade" id="quickView">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
    
                    <div class="row">
                        <div class="col-lg-6">
    
                            <!-- Quick View Images Start -->
                            <div class="quick-view-images">
    
                                <!-- Quick Gallery Images Start -->
                                <div class="quick-gallery-images">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="single-img">
                                                    <img src="/assets2/images/product-details/product-details-1.jpg" alt="Product Image">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="single-img">
                                                    <img src="/assets2/images/product-details/product-details-2.jpg" alt="Product Image">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="single-img">
                                                    <img src="/assets2/images/product-details/product-details-3.jpg" alt="Product Image">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="single-img">
                                                    <img src="/assets2/images/product-details/product-details-4.jpg" alt="Product Image">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="single-img">
                                                    <img src="/assets2/images/product-details/product-details-5.jpg" alt="Product Image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Quick Gallery Images End -->
    
                                <!-- Quick Gallery Thumbs Start -->
                                <div class="quick-gallery-thumbs">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img src="/assets2/images/product-details/product-details-1.jpg" alt="Product Thumbnail">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="/assets2/images/product-details/product-details-2.jpg" alt="Product Thumbnail">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="/assets2/images/product-details/product-details-3.jpg" alt="Product Thumbnail">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="/assets2/images/product-details/product-details-4.jpg" alt="Product Thumbnail">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="/assets2/images/product-details/product-details-5.jpg" alt="Product Thumbnail">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add Arrows -->
                                    <div class="swiper-button-prev"><i class="pe-7s-angle-left"></i></div>
                                    <div class="swiper-button-next"><i class="pe-7s-angle-right"></i></div>
                                </div>
                                <!-- Quick Gallery Thumbs End -->
    
                            </div>
                            <!-- Quick View Images End -->
    
                        </div>
                        <div class="col-lg-6">
    
                            <!-- Quick View Description Start -->
                            <div class="quick-view-description">
                                <h4 class="product-name">Your Products Name Here.</h4>
                                <div class="price">
                                    <span class="sale-price">$240.00</span>
                                    <span class="old-price">$290.00</span>
                                </div>
                                <div class="review-wrapper">
                                    <div class="review-star">
                                        <div class="star" style="width: 80%;"></div>
                                    </div>
                                    <p>( 1 Customer Review )</p>
                                </div>
                                <div class="product-color">
                                    <span class="lable">Color:</span>
                                    <ul>
                                        <li>
                                            <input type="radio" name="colors" id="color1">
                                            <label for="color1"><span class="color-blue"></span></label>
                                        </li>
                                        <li>
                                            <input type="radio" name="colors" id="color2">
                                            <label for="color2"><span class="color-gray"></span></label>
                                        </li>
                                        <li>
                                            <input type="radio" name="colors" id="color3">
                                            <label for="color3"><span class="color-dark-blue"></span></label>
                                        </li>
                                        <li>
                                            <input type="radio" name="colors" id="color4">
                                            <label for="color4"><span class="color-gray-dark"></span></label>
                                        </li>
                                    </ul>
                                </div>
    
                                <p>Lorem ipsum dolor sit amet, consectet adipisicing elit, sed do eiusmod temporf incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis tyu nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
    
                                <div class="product-meta">
                                    <div class="product-quantity d-inline-flex">
                                        <button type="button" class="sub">-</i></button>
                                        <input type="text" value="1" />
                                        <button type="button" class="add">+</button>
                                    </div>
                                    <div class="meta-action">
                                        <button class="btn btn-dark btn-hover-primary">Add To Cart</button>
                                    </div>
                                    <div class="meta-action">
                                        <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                    </div>
                                    <div class="meta-action">
                                        <a class="action" href="#"><i class="pe-7s-shuffle"></i></a>
                                    </div>
                                </div>
    
                                <div class="product-info">
                                    <div class="single-info">
                                        <span class="lable">SKU:</span>
                                        <span class="value">Ch-256xl</span>
                                    </div>
                                    <div class="single-info">
                                        <span class="lable">Categories:</span>
                                        <span class="value"><a href="#">Office,</a> <a href="#">Home</a></span>
                                    </div>
                                    <div class="single-info">
                                        <span class="lable">tag:</span>
                                        <span class="value"><a href="#">Furniture</a></span>
                                    </div>
                                    <div class="single-info">
                                        <span class="lable">Share:</span>
                                        <ul class="social">
                                            <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Quick View Description End -->
    
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
    <!-- Quick View End -->
    <script>
        var user_id = `{{ Session::get('user') }}`
        new Vue({
            el:'#headerView',
            data: {
                categoryData: [],
                cartData: [],
                total: 0
            },
            async mounted() {
                await this.fetchCategory()
                await this.fetchCart()
                mobile.categoryData = this.categoryData
            },
            methods: {
                fetchCategory: function() {
                    const data = {
                        params: {
                            status: 1
                        }
                    }
                    axios.get('/front/category/api', data)
                    .then((response) => {
                        response.data.data.forEach(category => {
                            if(category.parent == 0) {
                                this.categoryData.push({
                                    parent_name: category.name,
                                    parent_id: category.id,
                                    children: []
                                })
                            }
                        });
                        response.data.data.forEach(category => {
                            if(category.parent != 0) {
                                let child = this.categoryData.filter(function(item) {
                                    return item.parent_id == category.parent
                                })
                                child[0].children.push({
                                    children_name: category.name,
                                    children_id: category.id
                                })
                            }
                        })
                    })
                    .catch((response) => {
                        Swal.fire('失敗!', error.response.data.message,'error')
                    })
                },
                fetchCart: function() {
                    axios.get('/front/cart/api/' + user_id)
                    .then((response) => {
                        this.cartData = response.data.data
                        this.total = response.data.total
                    })
                },
                logout: function() {
                    const data = {}
                    axios.post('/front/user/api/logout', data)
                    .then((response) => {
                        Swal.fire('成功', response['data']['message'], 'success')
                        .then((result) => {
                            if (result.isConfirmed) {
                                window.location.href='/'
                            }
                        })
                    })
                    .catch((response) => {
                        Swal.fire('失敗!', error.response.data.message,'error')
                    })
                }
            },
        })

        const mobile = new Vue({
            el:'#headerMobileView',
            data: {
                categoryData: [],
            },
            methods: {
                logout: function() {
                    const data = {}
                    axios.post('/front/user/api/logout', data)
                    .then((response) => {
                        Swal.fire('成功', response['data']['message'], 'success')
                        .then((result) => {
                            if (result.isConfirmed) {
                                window.location.href='/'
                            }
                        })
                    })
                    .catch((response) => {
                        Swal.fire('失敗!', error.response.data.message,'error')
                    })
                }
            }
        })

        function loadingShow() {
            Swal.fire({
                background: "transparent",
                showCancelButton: false,
                showConfirmButton: false,
                showCloseButton: false,
                timerProgressBar: false,
                reverseButtons: false,
                allowOutsideClick: false,
                backdrop: "swal2-backdrop-hide",
                html:  `<div class="text-center default-loading">
                            <div class="spinner-grow text-light" role="status">
                              <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>`,
            })
        }

        function loadingClose() {
            Swal.fire({
                background: "transparent",
                showCancelButton: false,
                showConfirmButton: false,
                showCloseButton: false,
                timerProgressBar: false,
                reverseButtons: false,
                allowOutsideClick: false,
                backdrop: "swal2-backdrop-hide",
                html:  `<div class="text-center default-loading">
                            <div class="spinner-grow text-light" role="status">
                              <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>`,
            }).close()
        }
    </script>

    @include('base.footer')

</html>