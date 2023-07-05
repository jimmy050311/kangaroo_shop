<template lang="">
    <div>
    	<!-- BEGIN breadcrumb -->
    	<ol class="breadcrumb float-xl-end">
    		<li class="breadcrumb-item"><a href="javascript:;">建立訂單</a></li>
    		<li class="breadcrumb-item active">訂單管理</li>
    	</ol>
    	<!-- END breadcrumb -->
    	<!-- BEGIN page-header -->
    	<h1 class="page-header">建立訂單 <small></small></h1>
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
                        @update:value="getUserAddress(orderData.user_id)"
                    />
                    <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">購買商品</label>
                    <n-dynamic-input v-model:value="orderProductValue" :on-create="onProductCreate" :on-remove="productChange" @update:value="productChange()">
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
                            />
                            <n-input-number
                                v-model:value="value.amount"
                                min=1
                                style="margin-left: 12px; width: 160px"
                                @update:value="productChange()"
                            />
                          </div>
                        </template>
                    </n-dynamic-input>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7">小計</label>
                    <div class="col-md-12">
                        <n-input-number class="" type="number" 
                            v-model:value="orderData.price"
                            placeholder="請輸入數量"
                            min=0
                            :disabled="true"
                        />
                    </div>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">折扣</label>
                    <div class="col-md-12">
                        <n-input-number class="" type="number" 
                            v-model:value="orderData.discount"
                            placeholder="請輸入數量"
                            min=0 
                            @update:value="productChange()"
                            />
                    </div>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">運費</label>
                    <div class="col-md-12">
                        <n-input-number class="" type="number" 
                            v-model:value="orderData.ship"
                            placeholder="請輸入數量"
                            min=0 
                            @update:value="productChange()"
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
                    />
                    <label class="form-label col-form-label col-md-12 d-flex fs-7">貨運狀態</label>
                    <n-select
                        v-model:value="orderData.ship_status"
                        placeholder="請選擇貨運狀態"
                        filterable
                        :options="shipStatusOptions"
                    />
                    <div class="row row-cols-lg-auto align-items-center">
                        <div class="col-12">
                            <label class="form-label col-form-label col-md-12 d-flex fs-7">國家</label>
                        </div>
                        <div class="col-12">
                            <n-space>
                                <n-button strong secondary size="tiny" type="info" @click="setUserAddress">同會員地址</n-button>
                            </n-space>
                        </div>
                        <div class="col-12" style="height:3px">
                            <n-space>&nbsp;</n-space>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" v-model="orderData.country" disabled="disabled"/>
                    </div>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7">縣市</label>
                    <div class="col-md-12">
                        <n-select
                            label-field="name"
                            value-field="name"
                            placeholder=""
                            filterable
                            :options="countyOptions"
                            @update:value="setCounty"
                            v-model:value="orderData.county"
                        />
                    </div>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7">鄉鎮市區</label>
                    <div class="col-md-12">
                        <n-select
                            label-field="name"
                            value-field="name"
                            placeholder=""
                            filterable
                            :options="districtOptions"
                            @update:value="setDistrict"
                            v-model:value="orderData.district"
                        />
                    </div>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7">郵遞區號</label>
                    <div class="col-md-12">
                        <input class="form-control" v-model="orderData.zipcode" disabled="disabled"/>
                    </div>
                    <label class="form-label col-form-label col-md-12 d-flex fs-7">地址</label>
                    <div class="col-md-12">
                        <input class="form-control" v-model="orderData.address"/>
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
                        <button type="submit" class="col-md-6 btn btn-primary w-100px" @click="submit">建立訂單</button>
                    </div>
                </div>
    		</panel-body>
    	</panel>
    	<!-- END panel -->
    </div>
</template>
<script setup>
    import { NButton, NModal, NInputNumber, NSelect, NInput, NDynamicInput, NSpace } from "naive-ui"
    import { ref, reactive, onMounted, computed, watch, h } from "vue"
    import { useProductStore } from "@/stores/backend/product.js"
    import { useUserStore } from "@/stores/backend/user.js"
    import { useOrderStore } from "@/stores/backend/order.js"
    import { useAddressStore } from "@/stores/taiwan-address.js"
    import { useRouter } from "vue-router"

    const router = useRouter()
    const productStore = useProductStore()
    const useAddress = useAddressStore()
    const userStore = useUserStore()
    const orderStore = useOrderStore()
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
        country: "台灣",
        zipcode: '',
        county: '',
        district: '',
        address: '',
    })
    const userData = reactive({
        country: "台灣",
        zipcode: '',
        county: '',
        district: '',
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
    const countyOptions = useAddress.countyData
    const districtOptions = ref()

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
    })

    function getUserAddress(id) {
        userStore.fetchUserDetail(id).then((response) => {
            userData.country = response.country
            userData.zipcode = response.zipcode
            userData.county = response.county
            userData.district = response.district
            userData.address = response.address
        })
    }

    function setUserAddress() {
        orderData.country = "台灣"
        orderData.zipcode = userData.zipcode
        orderData.county = userData.county
        orderData.district = userData.district
        orderData.address = userData.address
        districtOptions.value = useAddress.districtData[userData.county]
    }

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

    function setCounty(val, option) {
        orderData.county = val
        districtOptions.value = useAddress.districtData[val]
        orderData.district = ''
    }
    function setDistrict(val, option) {
        orderData.district = val
        orderData.zipcode = option.zip
    }

    function submit() {
        const data = {
            user_id: orderData.user_id,
            price: orderData.price,
            discount: orderData.discount,
            ship: orderData.ship,
            total_price: orderData.total_price,
            total_amount: orderData.total_amount,
            status: orderData.status,
            ship_status: orderData.ship_status,
            remark: orderData.remark,
            productData: productData,
            country: orderData.country,
            zipcode: orderData.zipcode,
            county: orderData.county,
            district: orderData.district,
            address: orderData.address,
        }
        orderStore.fetchCreateOrder(data).then((response) => {
            if(response) {
                router.push({ name: 'order', params: {} })
            }
        })
    }

</script>