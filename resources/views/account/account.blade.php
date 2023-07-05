@extends('base.base')

@section('main')

<!-- Page Banner Section Start -->
<div class="section page-banner-section" style="background-image: url(/assets2/images/page-banner.jpg);">
    <div class="container">

         <!-- Page Banner Content End -->
        <div class="page-banner-content">
            <h2 class="title">會員中心</h2>

             <ul class="breadcrumb">
                <li><a href="/">首頁</a></li>
                <li class="active">會員中心</li>
            </ul>
        </div>
        <!-- Page Banner Content End -->

     </div>
</div>
<!-- Page Banner Section End -->

 <!-- My Account Section Start -->
<div class="section section-padding mt-n6">
    <div class="container">
        <div class="row">
            @include('base.sidebar')
            <div class="col-xl-9 col-md-8">
                <!-- Tab content start -->
                <div class="tab-content my-account-tab mt-6">
                    @include('account.dashboard')
                    @include('account.order')
                    @include('account.download')
                    @include('account.payment')
                    @include('account.address')                 
                    @include('account.member')
                    @include('account.password')
                </div>
                <!-- Tab content End -->
            </div>
        </div>
    </div>
</div>
<!-- My Account Section End -->

@endsection