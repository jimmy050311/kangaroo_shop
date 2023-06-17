<template>
	<div>
		<!-- BEGIN breadcrumb -->
		<ol class="breadcrumb float-xl-end">
			<li class="breadcrumb-item"><a href="javascript:;">商品管理</a></li>
			<li class="breadcrumb-item active">商品列表</li>
		</ol>
		<!-- END breadcrumb -->
		<!-- BEGIN page-header -->
		<h1 class="page-header">商品列表<small></small></h1>
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
            <select class="btn btn-success btn-xs dropdown-toggle mr-3 mb-1" v-model="searchData.status" @change="search()">
			    <option value="" selected="">無</option>
			    <option value="1">上架中</option>
                <option value="0">已下架</option>
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
    import { useProductStore } from "@/stores/backend/product.js"
    import { useRouter } from "vue-router"

    const router = useRouter()
    const productStore = useProductStore()
    const currentPage = ref(1)
    const selectId = ref(0)
    const searchData =  reactive({
      keyword: '',
      status: '',
      column: '',
      order: '',
    })
    const tableData = computed(() => {
      return productStore.productData.data
    })
    const page = computed(() => {
      return productStore.productData.dataPage
    })

    onMounted(() => {
      const data = {
        params: {
           paginate: 20
        }
      }
      productStore.fetchProduct(currentPage.value, data)
    })

    watch(currentPage, (newVal) => {
      search(newVal)
    })

    watch(searchData, (newVal) => {
        search(1)
    })

    function edit(id) {
      router.push({ name: 'product_edit', params: { id: id } })
    }

    function search(val) {
      currentPage.value = val
      const data = {
        params: {
          paginate: 20,
          keyword: searchData.keyword,
          status: searchData.status,
          column: searchData.column,
          order: searchData.order,
        }
      }
      productStore.fetchProduct(currentPage.value, data)
    }

    function handleSorterChange(sorter) {
      searchData.column = sorter.columnKey
      searchData.order = sorter.order
      const data = {
        params: {
          paginate: 20,
          keyword: searchData.keyword,
          status: searchData.status,
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
          width: '5%',
          render(row) {
            return h('a', {class: 'btn btn-warning btn-xs' , onClick: () => edit(row.id)}, h('i', {class: 'fa-solid fa-gear'}), '編輯')
          }
        },
        {
          title: "狀態",
          key: "status",
          width: 70,
          render(row) {
            switch(row.status) {
              case 1:
                return h('span', {class: 'badge bg-primary me-1'},'上架中')
              case 0:
                return h('span', {class: 'badge bg-danger me-1'},'已下架')
            }
          },
          sorter: 'default',
          width: '5%',
        },
        {
          title: "產品名稱",
          key: "name",
          sorter: 'default',
          width: '10%',
        },
        {
          title: "產品編號",
          key: "number",
          sorter: 'default',
          width: '10%',
        },
        {
          title: "圖片",
          key: "image",
          width:150,
          render(row) {
            return h(NImage,
            {
              width: "100",
              src: '/storage/' + row.image
            })
          },
          sorter: 'default',
          width: '10%',
        },
        {
          title: "產品類別",
          key: "category_name",
          width: '10%',
        },
        {
          title: "澳幣售價",
          key: "real_price_aud",
          sorter: 'default',
          width: '10%',
        },
        {
          title: "台幣售價",
          key: "real_price_twd",
          sorter: 'default',
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
