<template lang="">
    <ol class="breadcrumb float-xl-end">
	    <li class="breadcrumb-item"><a href="javascript:;">聯絡我們列表</a></li>
	    <li class="breadcrumb-item active">聯絡我們</li>
	</ol>
	<!-- END breadcrumb -->
	<!-- BEGIN page-header -->
	<h1 class="page-header">聯絡我們列表 <small></small></h1>
	<!-- END page-header -->
	<!-- BEGIN panel -->
    <panel>
      <panel-body>
        <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">開始時間</label>
        <div class="col-md-12">
            <n-date-picker
                v-model:formatted-value="searchData.start_date"
                value-format="yyyy-MM-dd"
                type="date"
                clearable
                :actions="['clear']"
            />
        </div>
        <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">結束時間</label>
        <div class="col-md-12">
            <n-date-picker
                v-model:formatted-value="searchData.end_date"
                value-format="yyyy-MM-dd"
                type="date"
                clearable
                :actions="['clear']"
            />
        </div>
      </panel-body>
    </panel>
    <panel>
	  <panel-body>
        <div class="row" style="margin-bottom: 15px;">
        </div>
        <n-data-table
            size="small"
            :columns="columns" 
            :data="tableData"
            :bordered="false"
            :single-line="false"
            :scroll-x="1200"
            striped
        />
        <n-pagination class="mt-4 justify-content-center" v-model:page="currentPage" :page-count="page" />
	  </panel-body>
	</panel>
</template>
<script setup>
    import { NDataTable, NButton, NPagination, NDatePicker } from "naive-ui"
    import { ref, computed, onMounted, watch, h, reactive } from 'vue'
    import { useContactStore } from "@/stores/backend/contact.js"

    const contactStore = useContactStore()
    const currentPage = ref(1)
    const tableData = computed(() => {
      return contactStore.contactData.data
    })
    const page = computed(() => {
      return contactStore.contactData.dataPage
    })
    const searchData =  reactive({
      start_date: null,
      end_date: null,
    })

    onMounted(async() => {
      const data = {
        params: {
           paginate: 20
        }
      }
      contactStore.fetchContact(currentPage.value, data)
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
          start_date: searchData.start_date,
          end_date: searchData.end_date,
          column: searchData.column,
          order: searchData.order,
        }
      }
      contactStore.fetchContact(currentPage.value, data)
    }

    const columns = [
      {
        title: "名稱",
        key: "name",
        width: '10%',
      },
      {
        title: "信箱",
        key: "email",
        width: '15%',
      },
      {
        title: "手機",
        key: "phone",
        width: '11%',
      },
      {
        title: "標題",
        key: "subject",
        minWidth: '10%',
      },
      {
        title: "留言",
        key: "comments",
        minWidth: '10%',
      },
      {
        title: "建立時間",
        key: "created_at",
        width: '17%'
      }
    ];

</script>
