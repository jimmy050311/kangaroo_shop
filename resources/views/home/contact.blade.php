@extends('base.base')

@section('main')

    <!-- Page Banner Section Start -->
    <div class="section page-banner-section" style="background-image: url(/assets2/images/page-banner.jpg);">
        <div class="container">

            <!-- Page Banner Content End -->
            <div class="page-banner-content">
                <h2 class="title">聯絡我們</h2>

                <ul class="breadcrumb">
                    <li><a href="/">首頁</a></li>
                    <li class="active">聯絡我們</li>
                </ul>
            </div>
            <!-- Page Banner Content End -->

        </div>
    </div>
    <!-- Page Banner Section End -->

    <!-- Contact Section Start -->
    <div class="section section-padding" id="contactView">
        <div class="container">

            <!-- Contact Wrapper Start -->
            <div class="contact-wrapper">
                <div class="row gx-0">
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <h2 class="title">聯絡資訊</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed eiusmod</p>

                            <!-- Contact Info Items Start -->
                            <div class="contact-info-items">

                                <div class="single-contact-info">
                                    <div class="info-icon">
                                        <i class="pe-7s-call"></i>
                                    </div>
                                    <div class="info-content">
                                        <p><a href="tel:+00125458222">+00 125 458 222</a></p>
                                    </div>
                                </div>

                                <div class="single-contact-info">
                                    <div class="info-icon">
                                        <i class="pe-7s-mail"></i>
                                    </div>
                                    <div class="info-content">
                                        <p><a href="mailto:demo@yourmail.com">demo@yourmail.com</a></p>
                                    </div>
                                </div>

                                <div class="single-contact-info">
                                    <div class="info-icon">
                                        <i class="pe-7s-map-marker"></i>
                                    </div>
                                    <div class="info-content">
                                        <p>Your Address Goese Here</p>
                                    </div>
                                </div>

                            </div>
                            <!-- Contact Info Items End -->

                            <!-- Contact Social Start -->
                            <ul class="social">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            <!-- Contact Social End -->

                            <img src="/assets2/images/contact-info.png" alt="Contact-info">

                        </div>
                    </div>
                    <div class="col-lg-8">

                        <!-- Contact Form Start  -->
                        <div class="contact-form">
                            <!-- <form id="contact-form" action="/assets2/php/contact.php" method="post"> -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <input type="text" name="name" placeholder="姓名*" v-model="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <input type="email" name="email" placeholder="信箱*" v-model="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <input type="text" name="subject" placeholder="標題" v-model="subject">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <input type="text" name="phone" placeholder="聯絡電話" v-model="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form">
                                            <textarea name="message" placeholder="寫下您想知道的訊息" v-model="comments"></textarea>
                                        </div>
                                    </div>
                                    <p class="form-message"></p>
                                    <div class="col-md-12">
                                        <div class="single-form">
                                            <button type="submit" class="btn btn-dark btn-hover-primary" @click="submit()">提交</button>
                                        </div>
                                    </div>
                                </div>
                            <!-- </form> -->
                        </div>
                        <!-- Contact Form End  -->

                    </div>
                </div>
            </div>
            <!-- Contact Wrapper End -->

        </div>
    </div>
    <!-- Contact Section End -->

    <!-- Contact Map Start -->
    <div class="contact-map">
        <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=桃園市桃園區莊一街47號&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
    </div>
    <!-- Contact Map End -->

    <script>

        new Vue({
            el: '#contactView',
            data: {
                name: '',
                phone: '',
                email: '',
                subject: '',
                comments: '',
            },
            methods: {
                submit: function() {
                    const data = {
                        name: this.name,
                        phone: this.phone,
                        email: this.email,
                        subject: this.subject,
                        comments: this.comments,
                    }
                    axios.post('/front/contact/api', data)
                    .then((response) => {
                        Swal.fire('成功!', response['data']['message'],'success')
                        .then((result) => {
                            if (result.isConfirmed) {
                                this.name = ''
                                this.phone = ''
                                this.email = ''
                                this.subject = ''
                                this.comments = ''
                            }
                        })
                    })
                    .catch((error) => {
                        Swal.fire('失敗!', error.response.data.message,'error')
                    })
                }
            },
        })

    </script>
@endsection