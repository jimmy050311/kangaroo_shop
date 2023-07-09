<div class="tab-pane fade" id="pills-order">
    <div class="my-account-order account-wrapper">
        <h4 class="account-title">訂單列表</h4>
        <div class="account-table text-center mt-30 table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="number">訂單編號</th>
                        <th class="total_price">總金額</th>
                        <th class="total_amount">總件數</th>
                        <th class="status">訂單狀態</th>
                        <th class="ship_status">出貨狀態</th>
                        <th class="created_at">訂單建立時間</th>
                        <th class="action">詳情</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in orderData">
                        <td>@{{ item.number }}</td>
                        <td>@{{ item.total_price }}</td>
                        <td>@{{ item.total_amount }}</td>
                        <td v-if="item.status == 0"><span class="btn btn-secondary">未付款</span></td>
                        <td v-if="item.status == 1"><span class="btn btn-success">已付款</span></td>
                        <td v-if="item.status == 2"><span class="btn btn-danger">已退款</span></td>
                        <td v-if="item.ship_status == 0"><span class="btn btn-secondary">未出貨</span></td>
                        <td v-if="item.ship_status == 1"><span class="btn btn-success">已出貨</span></td>
                        <td v-if="item.ship_status == 2"><span class="btn btn-danger">已退貨</span></td>
                        <td>@{{ item.created_at }}</td>
                        <td><a class="btn btn-primary btn-hover-dark action"> 訂單詳情 </a></td>
                    </tr>
                </tbody>
            </table>
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
    </div>
    <div class="my-account-address account-wrapper">
        <div class="row">
            <div class="col-md-6">
                <a class="btn btn-primary btn-hover-dark action"></i>{{'<'}}回上一頁</a>
                <h4 class="account-title mt-3 mb-4">訂單詳情</h4>
                <div class="account-address mt-30 ms-4">
                    <h6 class="name">會員名稱</h6>
                    <p> 王小明 </p>
                    <h6 class="name">訂單編號</h6>
                    <p> 王小明 </p>
                    <h6 class="name">購買商品</h6>
                    <p> 王小明 </p>
                    <h6 class="name">會員名稱</h6>
                    <p> 王小明 </p>
                    <h6 class="name">總金額</h6>
                    <p> 王小明 </p>
                    <h6 class="name">總數量</h6>
                    <p> 王小明 </p>
                    <h6 class="name">訂單狀態</h6>
                    <p> 王小明 </p>
                    <h6 class="name">匯款狀態</h6>
                    <p> 王小明 </p>
                    <h6 class="name">郵遞區號</h6>
                    <p> 王小明 </p>
                    <h6 class="name">寄送地址</h6>
                    <p> 王小明 </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var user_id = `{{ Session::get('user') }}`
    new Vue({
        el: "#pills-order",
        data: {
            orderData: [],
            currentPage: 1,
            totalPage: 0,
            total: 0,
            keyword: '',
            status: '',
            ship_status: '',
        },
        mounted() {
            this.fetchOrder(1)
        },
        methods: {
            fetchOrder: function(val) {
                const data = {
                    params: {
                        page: val,
                        paginate: 20,
                        user_id: user_id,
                        keyword: this.keyword,
                        status: this.status,
                        ship_status: this.ship_status,
                    }
                }
                axios.get('/front/order/api', data)
                .then((response) => {
                    this.orderData = response.data.data
                    this.totalPage = response.data.dataPage
                    console.log(response.data.data)
                })
            },
            changePage: function(val) {
                this.currentPage += val
                this.fetchOrder(this.currentPage)
            },
        },
    })

</script>
<style>
    .account-table .table tbody tr td a {
        padding: 0 15px;
        height: 30px;
        line-height: 30px;
        color: #000;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .my-account-address .account-address p {
        margin-top: 0px;
        font-size: 14px;
    }
</style>
