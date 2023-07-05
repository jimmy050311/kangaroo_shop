<template lang="">
    <div>
    	<!-- BEGIN breadcrumb -->
    	<ol class="breadcrumb float-xl-end">
    		<li class="breadcrumb-item"><a href="javascript:;">訂單詳情</a></li>
    		<li class="breadcrumb-item active">訂單管理</li>
    	</ol>
    	<!-- END breadcrumb -->
    	<!-- BEGIN page-header -->
    	<h1 class="page-header">建立詳情 <small></small></h1>
    	<!-- END page-header -->
    	<!-- BEGIN panel -->
    	<panel>
    	    <panel-body>
                <div class="row">
                    <label class="form-label col-form-label col-md-12 d-flex fs-7">會員名稱</label>
                    <n-select
                        v-model:value="orderData.user_id"
                        placeholder="請選擇會員"
                        filterable
                        :options="userOptions"
                        :disabled="true"
                    />
                    <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">購買商品</label>
                    <n-dynamic-input 
                        v-model:value="orderProductValue" 
                        :on-create="onProductCreate" 
                        :on-remove="productChange" 
                        @update:value="productChange()"
                        :max=count
                        :min=count>
                        <template #create-button-default>
                          新增購買品項
                        </template>
                        <template #default="{ value }">
                          <div style="display: flex; align-items: center; width: 100%">
                            <n-select
                                label-field="label"
                                value-field="value"
                                v-model:value="value.id"
                                placeholder="請選擇商品"
                                filterable
                                :options="productOptions"
                                @update:value="productChange()"
                                :disabled="true"
                            />
                            <n-input-number
                                v-model:value="value.amount"
                                min=1
                                style="margin-left: 12px; width: 160px"
                                @update:value="productChange()"
                                :disabled="true"
                            />
                          </div>
                        </template>
                    </n-dynamic-input>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7">小計</label>
                    <div class="col-md-12">
                        <n-input-number 
                            type="number" 
                            v-model:value="orderData.price"
                            placeholder="請輸入數量"
                            min=0
                            :disabled="true"
                        />
                    </div>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">折扣</label>
                    <div class="col-md-12">
                        <n-input-number 
                            type="number" 
                            v-model:value="orderData.discount"
                            placeholder="請輸入數量"
                            min=0 
                            @update:value="productChange()"
                            :disabled="true"
                        />
                    </div>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">運費</label>
                    <div class="col-md-12">
                        <n-input-number class="" type="number" 
                            v-model:value="orderData.ship"
                            placeholder="請輸入數量"
                            min=0 
                            @update:value="productChange()"
                            :disabled="true"    
                        />
                    </div>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">總金額</label>
                    <div class="col-md-12">
                        <n-input-number class="" type="number" 
                            v-model:value="orderData.total_price"
                            placeholder="請輸入數量"
                            min=0
                            :disabled="true"
                        />
                    </div>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">總數量</label>
                    <div class="col-md-12">
                        <n-input-number class="" type="number" 
                            v-model:value="orderData.total_amount"
                            placeholder="請輸入數量"
                            min=0 
                            :disabled="true"
                        />
                    </div>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7">訂單狀態</label>
                    <n-select
                        v-model:value="orderData.status"
                        placeholder="請選擇訂單狀態"
                        filterable
                        :options="statusOptions"
                        :disabled="true"
                    />
                    <label class="form-label col-form-label col-md-12 d-flex fs-7">貨運狀態</label>
                    <n-select
                        v-model:value="orderData.ship_status"
                        placeholder="請選擇貨運狀態"
                        filterable
                        :options="shipStatusOptions"
                        :disabled="true"
                    />
                    <n-divider class="mt-5"/>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7">會員名稱</label>
                    <n-select
                        v-model:value="orderData.user_id"
                        placeholder="請選擇會員"
                        filterable
                        :options="userOptions"
                        :disabled="true"
                    />
                    <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">郵遞區號</label>
                    <div class="col-md-12">
                        <n-input 
                            v-model:value="orderData.zipcode"
                            :disabled="true"
                        />
                    </div>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">寄送地址</label>
                    <div class="col-md-12">
                        <n-input 
                            v-model:value="orderData.address"
                            :disabled="true"
                        />
                    </div>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">帳戶人名稱</label>
                    <div class="col-md-12">
                        <n-input 
                            v-model:value="orderData.bank_user_name"
                            :disabled="true"
                        />
                    </div>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">銀行名稱</label>
                    <div class="col-md-12">
                        <n-input 
                            v-model:value="orderData.bank_name"
                            :disabled="true"
                        />
                    </div>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">銀行代碼</label>
                    <div class="col-md-12">
                        <n-input 
                            v-model:value="orderData.bank_code"
                            :disabled="true"
                        />
                    </div>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">分行名稱</label>
                    <div class="col-md-12">
                        <n-input 
                            v-model:value="orderData.branch_name"
                            :disabled="true"
                        />
                    </div>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">分行代碼</label>
                    <div class="col-md-12">
                        <n-input 
                            v-model:value="orderData.branch_code"
                            :disabled="true"
                        />
                    </div>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">銀行帳號</label>
                    <div class="col-md-12">
                        <n-input 
                            v-model:value="orderData.bank_account"
                            :disabled="true"
                        />
                    </div>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7">備註</label>
                    <div class="col-md-12">
                        <n-input
                            type="textarea"
                            placeholder=""
                            :autosize="{
                                minRows: 2
                            }"
                            v-model:value="orderData.remark"
                        />
                    </div>
                    <div class="mt-3 col-md-12 d-flex justify-content-center">
                        <button type="submit" class="col-md-6 btn btn-warning w-100px" @click="editRemark">更新備註</button>
                        <button type="submit" class="col-md-6 btn btn-lime w-100px ms-5" v-if="orderData.status==0" @click="paid">確認付款</button>
                        <button type="submit" class="col-md-6 btn btn-danger w-100px ms-5" v-if="orderData.status==1" @click="refundPaid">確認退款</button>
                        <button type="submit" class="col-md-6 btn btn-primary w-100px ms-5" v-if="orderData.ship_status==0" @click="ship">確認出貨</button>
                        <button type="submit" class="col-md-6 btn btn-danger w-100px ms-5" v-if="orderData.ship_status==1" @click="refundShip">確認退貨</button>
                    </div>
                </div>
    		</panel-body>
    	</panel>
    	<!-- END panel -->
    </div>
</template>
<script setup>
    import { NButton, NModal, NInputNumber, NSelect, NInput, NDynamicInput, NDivider } from "naive-ui"
    import { ref, reactive, onMounted, computed, watch, h } from "vue"
    import { useRoute, useRouter } from "vue-router"
    import { useProductStore } from "@/stores/backend/product.js"
    import { useUserStore } from "@/stores/backend/user.js"
    import { useOrderStore } from "@/stores/backend/order.js"
    import Swal from "sweetalert2/dist/sweetalert2.js"

    const router = useRouter()
    const route = useRoute()
    const productStore = useProductStore()
    const userStore = useUserStore()
    const orderStore = useOrderStore()
    const count = ref(0)
    const orderProductValue = ref([])
    const productOptions = reactive([])
    const userOptions = reactive([])
    const orderData = reactive({
        user_id: null,
        price: null,
        discount: 0,
        ship: 0,
        total_price: 0,
        total_amount: 0,
        status: 0,
        ship_status: 0,
        remark: '',
        zipcode: '',
        address: '',
    })
    var productData = []
    const statusOptions = ref([
        {
          label: '未付款',
          value: 0
        },
        {
          label: '已付款',
          value: 1
        },
        {
          label: '已退單',
          value: 2
        },
    ])
    const shipStatusOptions = ref([
        {
          label: '未出貨',
          value: 0
        },
        {
          label: '已出貨',
          value: 1
        },
    ])
    const orderId = computed(() => {
        return route.params.id
    })

    onMounted(() => {
      const data = {
        params: {
            'status': 1
        }
      }
      productStore.fetchObtainProduct(data).then((response) => {
        response.forEach(item => {
            productOptions.push({
                label: item.name,
                value: item.id,
                number: item.number,
                image: item.image,
                origin_price_aud: item.origin_price_aud,
                real_price_aud: item.real_price_aud,
                origin_price_twd: item.origin_price_twd,
                real_price_twd: item.real_price_twd,
            })
        })
      })
      userStore.fetchObtainUser(data).then((response) => {
        response.forEach(item => {
            userOptions.push({
                label: item.name,
                value: item.id,
            })
        })
      })
      orderStore.fetchOrderDetail(orderId.value).then((response) => {
        orderData.user_id = response.user_id
        orderData.price = response.price
        orderData.discount = response.discount
        orderData.ship = response.ship
        orderData.total_price = response.total_price
        orderData.total_amount = response.total_amount
        orderData.status = response.status
        orderData.ship_status = response.ship_status
        orderData.remark = response.remark
        orderData.zipcode = response.zipcode
        orderData.address = response.county + response.district + response.address
        orderData.bank_name = response.bank_name
        orderData.bank_code = response.bank_code
        orderData.branch_name = response.branch_name
        orderData.branch_code = response.branch_code
        orderData.bank_user_name = response.bank_user_name
        orderData.bank_account = response.bank_account
        response.product_data.forEach(item => {
            orderProductValue.value.push({
                id: item.product_id,
                amount: item.amount
            })
            count.value += 1
        })
      })
    })

    function onProductCreate() {
        return {
            id: productOptions[0].value,
            amount: 1,
        }
    }

    function productChange() {
        productData = []
        orderData.price = 0
        orderData.total_amount = 0
        orderProductValue.value.forEach(item => {
            let product = productOptions.filter(function(productOption) {
                return productOption.value == item.id
            })
            productData.push({
                data: product,
                amount: item.amount
            })
        })
        productData.forEach(item => {
            orderData.price += item.data[0].real_price_twd * item.amount
            orderData.total_price = orderData.price + orderData.ship - orderData.discount
            orderData.total_amount += item.amount
        })
    }

    function editRemark() {
        const data = {
            remark: orderData.remark
        }
        orderStore.fetchEditOrder(orderId.value, data).then((response) => {
            if(response) {
              router.push({ name: 'order', params: {} })
            }
        })
    }

    function paid() {
        Swal.fire({
            title: '訊息',
            icon: 'info',
            text: '確定訂單已付款嗎？將無法回復此動作！',
            confirmButtonText: '確定',
            showCloseButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
              const data = {
                  status: 1,
                  remark: orderData.remark
              }
              orderStore.fetchEditOrder(orderId.value, data).then((response) => {
                  if(response) {
                    router.push({ name: 'order', params: {} })
                  }
              })
            }
        })
    }

    function refundPaid() {
        Swal.fire({
            title: '訊息',
            icon: 'info',
            text: '確定訂單退款嗎？將無法回復此動作！',
            confirmButtonText: '確定',
            showCloseButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                const data = {
                    status: 2,
                    remark: orderData.remark
                }
              orderStore.fetchEditOrder(orderId.value, data).then((response) => {
                  if(response) {
                    router.push({ name: 'order', params: {} })
                  }
              })
            }
        })
    }

    function ship() {
        Swal.fire({
            title: '訊息',
            icon: 'info',
            text: '確定訂單出貨嗎？將無法回復此動作！',
            confirmButtonText: '確定',
            showCloseButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                const data = {
                    ship_status: 1,
                    remark: orderData.remark
                }
              orderStore.fetchEditOrder(orderId.value, data).then((response) => {
                if(response) {
                    router.push({ name: 'order', params: {} })
                }
              })
            }
        })
    }

    function refundShip() {
        Swal.fire({
            title: '訊息',
            icon: 'info',
            text: '確定訂單退貨嗎？將無法回復此動作！',
            confirmButtonText: '確定',
            showCloseButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                const data = {
                    ship_status: 2,
                    remark: orderData.remark
                }
              orderStore.fetchEditOrder(orderId.value, data).then((response) => {
                if(response) {
                    router.push({ name: 'order', params: {} })
                }
              })
            }
        })
    }

</script>
