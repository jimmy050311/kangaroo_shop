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
                <label class="form-label col-form-label ms-1">狀態：</label>
                <select class="btn btn-success btn-xs dropdown-toggle mr-3 mb-1" v-model="searchData.type" @change="search()">
	    	        <option value="" selected="">無</option>
	    	        <option value="1">進貨</option>
                    <option value="2">退貨</option>
                    <option value="3">庫存異動(入倉)</option>
                    <option value="4">庫存異動(出倉)</option>
                    <option value="5">購買</option>
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
                    scroll-x="1200"
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
    import { useInventoryStore } from "@/stores/backend/inventory.js"
    import { useRouter } from "vue-router"

    const router = useRouter()
    const inventoryStore = useInventoryStore()
    const currentPage = ref(1)
    const selectId = ref(0)
    const searchData =  reactive({
      keyword: '',
      type: '',
      column: '',
      order: '',
    })
    const tableData = computed(() => {
      return inventoryStore.inventoryData.data
    })
    const page = computed(() => {
      return inventoryStore.inventoryData.dataPage
    })

    onMounted(() => {
      const data = {
        params: {
           paginate: 20
        }
      }
      inventoryStore.fetchInventory(currentPage.value, data)
    })

    watch(currentPage, (newVal) => {
      search(newVal)
    })

    watch(searchData, (newVal) => {
        search(1)
    })

    function search(val) {
      currentPage.value = val
      const data = {
        params: {
          paginate: 20,
          keyword: searchData.keyword,
          type: searchData.type,
          column: searchData.column,
          order: searchData.order,
        }
      }
      inventoryStore.fetchInventory(currentPage.value, data)
    }

    function handleSorterChange(sorter) {
      searchData.column = sorter.columnKey
      searchData.order = sorter.order
      const data = {
        params: {
          paginate: 20,
          keyword: searchData.keyword,
          type: searchData.type,
          column: searchData.column,
          order: searchData.order,
        }
      }
      inventoryStore.fetchInventory(currentPage.value, data)
    }

    const columns =  [
        {
          title: "狀態",
          key: "type",
          width: '5%',
          render(row) {
            switch(row.type) {
                case 1:
                    return h('span', {class: 'badge bg-primary me-1'},'進貨')
                case 2:
                    return h('span', {class: 'badge bg-danger me-1'},'退貨')
                case 3:
                    return h('span', {class: 'badge bg-purple me-1'},'庫存異動(入倉)')
                case 4:
                    return h('span', {class: 'badge bg-warning me-1'},'庫存異動(出倉)')
                case 5:
                    return h('span', {class: 'badge bg-lime me-1'},'購買')
            }
          },
          sorter: 'default',
          width: '5%',
        },
        {
          title: "產品名稱",
          key: "product_name",
          sorter: 'default',
          width: '12%',
        },
        {
          title: "產品編號",
          key: "product_number",
          sorter: 'default',
          width: '12%',
        },
        {
          title: "異動前數量",
          key: "before_quantity",
          width: '6%',
        },
        {
          title: "異動數量",
          key: "quantity",
          width: '6%',
        },
        {
          title: "異動後數量",
          key: "after_quantity",
          width: '6%',
        },
        {
          title: "備註",
          key: "remark",
          width: '10%',
        },
        {
          title: "建立時間",
          key: "created_at",
          sorter: 'default',
          width: '10%',
        }
    ];

</script>