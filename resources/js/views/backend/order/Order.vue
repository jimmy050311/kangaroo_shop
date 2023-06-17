<template lang="">
    <div>
		<!-- BEGIN breadcrumb -->
		<ol class="breadcrumb float-xl-end">
			<li class="breadcrumb-item"><a href="javascript:;">庫存管理</a></li>
			<li class="breadcrumb-item active">庫存列表</li>
		</ol>
		<!-- END breadcrumb -->
		<!-- BEGIN page-header -->
		<h1 class="page-header">庫存列表<small></small></h1>
		<!-- END page-header -->
		<!-- BEGIN panel -->
        <panel>
          <panel-body>
            <n-input
              class="mt-2"
              round
              clearable
              placeholder="搜索"
              v-model:value="searchData.keyword">
              <template #suffix>
                <n-icon :component="Search" />
              </template>
            </n-input>
            <div class="d-flex justify-content-between mt-2">
              <div>
                <label class="form-label col-form-label ms-1">訂單狀態：</label>
                <select class="btn btn-success btn-xs dropdown-toggle mr-3 mb-1" v-model="searchData.status" @change="search()">
    			    <option value="" selected="">無</option>
    			    <option value="1">已付款</option>
                    <option value="0">未付款</option>
    			</select>
                <label class="form-label col-form-label ms-3">出貨狀態：</label>
                <select class="btn btn-success btn-xs dropdown-toggle mr-3 mb-1" v-model="searchData.ship_status" @change="search()">
    			    <option value="" selected="">無</option>
    			    <option value="1">已出貨</option>
                    <option value="0">未出貨</option>
    			</select>
              </div>
            </div>
          </panel-body>
        </panel>
    	<panel>
    		<panel-body>
                <n-data-table
                    size="small"
                    :columns="columns" 
                    :data="tableData"
                    scroll-x="2000"
                    striped
                    :bordered="false"
                    :single-line="false"
                    @update:sorter="handleSorterChange"
                />
            <n-pagination class="mt-4 justify-content-center" v-model:page="currentPage" :page-count="page" />
    		    </panel-body>
    	</panel>
    	<!-- END panel -->
	</div>
</template>
<script setup>

    import { Search } from "@vicons/ionicons5"; 
    import { NDataTable, NPagination, NInput, NIcon, NImage } from "naive-ui"
    import { ref, computed, reactive, onMounted, watch, h } from 'vue'
    import { useOrderStore } from "@/stores/backend/order.js"
    import { useRouter } from "vue-router"

    const router = useRouter()
    const orderStore = useOrderStore()
    const currentPage = ref(1)
    const selectId = ref(0)
    const searchData =  reactive({
      keyword: '',
      status: '',
      ship_status: '',
      column: '',
      order: '',
    })
    const tableData = computed(() => {
      return orderStore.orderData.data
    })
    const page = computed(() => {
      return orderStore.orderData.dataPage
    })

    onMounted(() => {
      const data = {
        params: {
           paginate: 20
        }
      }
      orderStore.fetchOrder(currentPage.value, data)
    })

    watch(currentPage, (newVal) => {
      search(newVal)
    })

    watch(searchData, (newVal) => {
        search(1)
    })

    function edit(id) {
      router.push({ name: 'order_edit', params: { id: id } })
    }

    function search(val) {
      currentPage.value = val
      const data = {
        params: {
          paginate: 20,
          keyword: searchData.keyword,
          status: searchData.status,
          ship_status: searchData.ship_status,
          column: searchData.column,
          order: searchData.order,
        }
      }
      orderStore.fetchOrder(currentPage.value, data)
    }

    function handleSorterChange(sorter) {
      searchData.column = sorter.columnKey
      searchData.order = sorter.order
      const data = {
        params: {
          paginate: 20,
          keyword: searchData.keyword,
          status: searchData.status,
          ship_status: searchData.ship_status,
          column: searchData.column,
          order: searchData.order,
        }
      }
      productStore.fetchProduct(currentPage.value, data)
    }

    const columns =  [
        {
          title: "操作",
          key: "actions",
          width: '4%',
          render(row) {
            return h('a', {class: 'btn btn-warning btn-xs' , onClick: () => edit(row.id)}, h('i', {class: 'fa-solid fa-gear'}), '編輯')
          }
        },
        {
          title: "訂單狀態",
          key: "status",
          width: '5%',
          render(row) {
            switch(row.status) {
              case 0:
                return h('span', {class: 'badge bg-secondary me-1'},'未付款')
              case 1:
                return h('span', {class: 'badge bg-lime me-1'},'已付款')
              case 2:
                return h('span', {class: 'badge bg-danger me-1'},'已退款')
            }
          },
          sorter: 'default',
          width: '5%',
        },
        {
          title: "出貨狀態",
          key: "ship_status",
          width: '6%',
          render(row) {
            switch(row.ship_status) {
              case 1:
                return h('span', {class: 'badge bg-lime me-1'},'已出貨')
              case 0:
                return h('span', {class: 'badge bg-secondary me-1'},'未出貨')
              case 2:
                return h('span', {class: 'badge bg-danger me-1'},'已退貨')
            }
          },
          sorter: 'default',
          width: '5%',
        },
        {
          title: "訂單編號",
          key: "number",
          sorter: 'default',
          width: '10%',
        },
        {
          title: "會員名稱",
          key: "user_name",
          sorter: 'default',
          width: '5%',
        },
        {
          title: "小計",
          key: "price",
          width: '10%',
        },
        {
          title: "折扣",
          key: "discount",
          width: '6%',
        },
        {
          title: "運費",
          key: "ship",
          width: '6%',
        },
        {
          title: "總金額",
          key: "total_price",
          width: '10%',
        },
        {
          title: "總數量",
          key: "total_amount",
          width: '5%',
        },
        {
          title: "建立時間",
          key: "created_at",
          sorter: 'default',
          width: '10%',
        },
        {
          title: "付款時間",
          key: "paid_at",
          sorter: 'default',
          width: '10%',
        },
        {
          title: "退單時間",
          key: "refund_at",
          sorter: 'default',
          width: '10%',
        },
    ];

</script>
