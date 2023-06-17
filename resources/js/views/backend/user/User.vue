<template lang="">
    <ol class="breadcrumb float-xl-end">
		<li class="breadcrumb-item"><a href="javascript:;">會員列表</a></li>
		<li class="breadcrumb-item active">會員管理</li>
	  </ol>
	  <!-- END breadcrumb -->
	  <!-- BEGIN page-header -->
	  <h1 class="page-header">會員列表 <small></small></h1>
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
			      	<option value="1">開通</option>
              <option value="0">停權</option>
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
            :bordered="false"
            :single-line="false"
            :scroll-x="1800"
            striped
          />
        <n-pagination class="mt-4 justify-content-center" v-model:page="currentPage" :page-count="page" />
	  	</panel-body>
	  </panel>
    <editUserPasswordModal @closeEditPasswordModal="editPasswordModal = false" :isShow="editPasswordModal" :id="selectId"/>
</template>
<script setup>
    import { Search } from "@vicons/ionicons5";
    import { NDataTable, NButton, NPagination, NInput, NIcon } from "naive-ui"
    import { ref, computed, onMounted, watch, h, reactive } from 'vue'
    import { useUserStore } from "@/stores/backend/user.js"
    import { useRouter } from "vue-router"
    import "bootstrap"
    import editUserPasswordModal from "@/views/backend/user/modal/edit-password.vue"

    const router = useRouter()
    const userStore = useUserStore()
    const currentPage = ref(1)
    const selectId = ref(0)
    var editPasswordModal = ref(false)
    const searchData =  reactive({
      keyword: '',
      status: '',
      column: '',
      order: '',
    })
    const tableData = computed(() => {
      return userStore.userData.data
    })
    const page = computed(() => {
      return userStore.userData.dataPage
    })

    onMounted(async() => {
      const data = {
        params: {
           paginate: 20
        }
      }
      userStore.fetchUser(currentPage.value, data)
    })

    watch(currentPage, (newVal) => {
      const data = {
        params: {
          paginate: 20,
          keyword: searchData.keyword,
          status: searchData.status,
          column: searchData.column,
          order: searchData.order
        }
      }
      userStore.fetchUser(newVal, data)
    })

    watch(searchData, (newVal) => {
        const data = {
          params: {
            paginate: 20,
            keyword: searchData.keyword,
            status: searchData.status,
            column: searchData.column,
            order: searchData.order
          }
        }
        userStore.fetchUser(currentPage.value, data)
    })

    function edit(id) {
      router.push({ name: 'user_edit', params: { id: id } })
    }

    function editPassword(id) {
        editPasswordModal.value = true
        selectId.value = id
    }

    const columns = [
      {
        title: "操作",
        key: "actions",
        width: '8%', 
        render(row) {
            return [
                h('a', {class: 'btn btn-warning btn-xs mb-1', onClick: () => edit(row.id)}, [h('i', {class: ['fa-solid fa-gear']})], ' 詳情'),
                h('br'),
                h('a', {class: 'btn btn-info btn-xs mb-1', onClick: () => editPassword(row.id)}, '修改密碼'),
            ]
        }
      },
      {
        title: "名稱",
        key: "name",
        width: '8%',
      },
      {
        title: "自然人/法人",
        key: "type",
        width: '7%',
        render(row) {
          switch(row.type) {
            case 1:
              return h('span', {class: 'badge bg-primary me-1'},'自然人')
            case 2:
              return h('span', {class: 'badge bg-purple me-1'},'法人')
          }
        },
      },
      {
        title: "帳號",
        key: "account",
        width: '12%',
      },
      {
        title: "狀態",
        key: "status",
        minWidth: 100,
        width: '5%',
        render(row) {
          switch(row.status) {
            case 1:
              return h('span', {class: 'badge bg-lime me-1'},'開通')
            case 0:
              return h('span', {class: 'badge bg-danger me-1'},'停權')
          }
        },
      },
      {
        title: "手機",
        key: "phone",
        width: '10%',
      },
      {
        title: "信箱",
        key: "email",
        minWidth: '10%',
      },
      {
        title: "身分證字號",
        key: "id_number",
        minWidth: '10%',
      },
      {
        title: "統一編號",
        key: "taxid",
        minWidth: '12%',
      },
      {
        title: "性別",
        key: "gender",
        minWidth: '10%',
        render(row) {
          switch(row.type) {
            case 1:
              return h('span', {class: ''},'男')
            case 2:
              return h('span', {class: ''},'女')
          }
        },
      },
      {
        title: "生日",
        key: "birth",
        minWidth: '10%',
      },
      {
        title: "建立時間",
        key: "updated_at",
        width: '11%'
      }
    ];

</script>
