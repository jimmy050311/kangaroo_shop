<template>
    <h1 class="page-header">
        編輯會員
    </h1>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">會員資訊</a>
      </li>
      <li class="nav-item">
        <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">收貨資訊</a>
      </li>
      <li class="nav-item">
        <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link">銀行資訊</a>
      </li>
    </ul>
    <div class="tab-content panel rounded-0 p-3 m-0">
        <div class="tab-pane fade active show" id="default-tab-1">
            <label class="form-label col-form-label col-md-12 d-flex fs-7">名稱</label>
            <div class="col-md-12">
                <input class="form-control" v-model="userData.name"/>
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">法人/自然人</label>
            <div class="col-md-12">
                <n-select
                    label-field="label"
                    value-field="value"
                    placeholder=""
                    filterable
                    :options="typeOptions"
                    v-model:value="userData.type"
                />
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7">帳號</label>
            <div class="col-md-12">
                <input class="form-control" v-model="userData.account"/>
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7">信箱</label>
            <div class="col-md-12">
                <input class="form-control" v-model="userData.email"/>
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7" v-if="userData.type == 1">身分證字號</label>
            <div class="col-md-12" v-if="userData.type == 1">
                <input class="form-control" v-model="userData.id_number"/>
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7" v-if="userData.type == 2">統一編號</label>
            <div class="col-md-12" v-if="userData.type == 2">
                <input class="form-control" v-model="userData.taxid"/>
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7">聯絡電話</label>
            <div class="col-md-12">
                <input class="form-control" v-model="userData.phone"/>
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7" v-if="userData.type == 1">生日</label>
            <div class="col-md-12" v-if="userData.type == 1">
                <n-date-picker v-model:formatted-value="userData.birth" value-format="yyyy-MM-dd" type="date" :actions="['clear']" />
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7" v-if="userData.type == 1">性別</label>
            <div class="col-md-12" v-if="userData.type == 1">
                <n-select
                    label-field="label"
                    value-field="value"
                    placeholder=""
                    filterable
                    :options="genderOptions"
                    v-model:value="userData.gender"
                />
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7">狀態</label>
            <div class="col-md-12">
                <n-select
                    label-field="label"
                    value-field="value"
                    placeholder=""
                    filterable
                    :options="statusOptions"
                    v-model:value="userData.status"
                />
            </div>
        </div>
        <div class="tab-pane fade" id="default-tab-2">
            <label class="form-label col-form-label col-md-12 d-flex fs-7">國家</label>
            <div class="col-md-12">
                <input class="form-control" v-model="userData.country" disabled="disabled"/>
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
                    v-model:value="userData.county"
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
                    v-model:value="userData.district"
                />
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7">郵遞區號</label>
            <div class="col-md-12">
                <input class="form-control" v-model="userData.zipcode" disabled="disabled"/>
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7">地址</label>
            <div class="col-md-12">
                <input class="form-control" v-model="userData.address"/>
            </div>
        </div>
        <div class="tab-pane fade" id="default-tab-3">
            <label class="form-label col-form-label col-md-12 d-flex fs-7">帳戶人名稱</label>
            <div class="col-md-12">
                <input class="form-control" v-model="userData.bank_user_name"/>
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7">銀行名稱</label>
            <div class="col-md-12">
                <n-select
                    label-field="bankName"
                    value-field="bankName"
                    placeholder=""
                    filterable
                    :options="bankOptions"
                    @update:value="setBank"
                    v-model:value="userData.bank_name"
                />
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">銀行代碼</label>
            <div class="col-md-12">
                <input class="form-control" v-model="userData.bank_code" disabled="disabled"/>
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">分行名稱</label>
            <div class="col-md-12">
                <n-select
                    label-field="branchName"
                    value-field="branchName"
                    placeholder=""
                    filterable
                    :options="branchOptions"
                    @update:value="setBranch"
                    v-model:value="userData.branch_name"
                />
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">分行代碼</label>
            <div class="col-md-12">
                <input class="form-control" v-model="userData.branch_code" disabled="disabled"/>
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7">銀行帳號</label>
            <div class="col-md-12">
                <input class="form-control" v-model="userData.bank_account"/>
            </div>
            <div class="mt-3 col-md-12 d-flex justify-content-center">
                <button type="submit" class="col-md-6 btn btn-primary w-100px" @click="submit()">更新會員</button>
            </div>
            </div>
    </div>
</template>

<script setup>

    import { NButton, NImage, NModal, NUpload, NDataTable, NInputNumber, NSelect, NDatePicker } from "naive-ui"
    import { ref, reactive, onMounted, computed, watch, h } from "vue"
    import { useRoute, useRouter } from "vue-router"
    import CkEditor from '@/components/ckeditor/CkEditor.vue'
    import { useAddressStore } from "@/stores/taiwan-address.js"
    import { useBank } from "@/stores/bankCode.js"
    import { useUserStore } from "@/stores/backend/user.js"

    const route = useRoute()
    const router = useRouter()
    const useAddress = useAddressStore()
    const bank = useBank()
    const userStore = useUserStore()
    const userData = reactive({
        name: '',
        type: '1',
        account: '',
        email: '',
        id_number: '',
        taxid: '',
        phone: '',
        status: '',
        gender: '',
        birth: null,
        country: "台灣",
        zipcode: '',
        county: '',
        district: '',
        address: '',
        bank_user_name: '',
        bank_name: '',
        bank_code: '',
        branch_name: '',
        branch_code: '',
        bank_account: '',
    })
    const userId = computed(() => {
        return route.params.id
    })
    const typeOptions = ref([
        {
          label: '自然人',
          value: 1
        },
        {
          label: '法人',
          value: 2
        },
    ])
    const statusOptions = ref([
        {
          label: '停權',
          value: 0
        },
        {
          label: '開通',
          value: 1
        },
    ])
    const genderOptions = ref([
        {
            label: '男',
            value: 1,
        },
        {
            label: '女',
            value: 2,
        }
    ])
    const countyOptions = useAddress.countyData
    const districtOptions = ref()
    const bankOptions = bank.bankData
    const branchOptions = ref()

    function setCounty(val, option) {
        userData.county = val
        districtOptions.value = useAddress.districtData[val]
        userData.district = ''
    }
    function setDistrict(val, option) {
        userData.district = val
        userData.zipcode = option.zip
    }
    function setBank(val, option) {
        userData.bank_name = val
        userData.bank_code = option.bankCode
        userData.branch_name = ""
        branchOptions.value = bank.branchData[option.bankCode]
    }
    function setBranch(val, option) {
        userData.branch_name = val
        userData.branch_code = option.branchCode
    }

    onMounted(() => {
        userStore.fetchUserDetail(userId.value).then((response) => {
            userData.name = response.name
            userData.type = response.type
            userData.account = response.account
            userData.email = response.email
            userData.id_number = response.id_number
            userData.taxid = response.taxid
            userData.phone = response.phone
            userData.status = response.status
            userData.gender = response.gender
            userData.birth = response.birth
            userData.country = response.country
            userData.zipcode = response.zipcode
            userData.county = response.county
            userData.district = response.district
            userData.address = response.address
            userData.bank_user_name = response.bank_user_name
            userData.bank_name = response.bank_name
            userData.bank_code = response.bank_code
            userData.branch_name = response.branch_name
            userData.branch_code = response.branch_code
            userData.bank_account = response.bank_account
            districtOptions.value = useAddress.districtData[userData.county]
            branchOptions.value = bank.branchData[userData.bank_code]
        })
    })

    function submit() {
        var data = {
            name: userData.name,
            type: userData.type,
            account: userData.account,
            email: userData.email,
            phone: userData.phone,
            status: userData.status,
            country: userData.country,
            zipcode: userData.zipcode,
            county: userData.county,
            district: userData.district,
            address: userData.address,
            bank_user_name: userData.bank_user_name,
            bank_name: userData.bank_name,
            bank_code: userData.bank_code,
            branch_name: userData.branch_name,
            branch_code: userData.branch_code,
            bank_account: userData.bank_account,
        }
        if(userData.type == 1) {
            data.id_number = userData.id_number
            data.gender = userData.gender
            data.birth = userData.birth
        }else if(userData.type == 2) {
            data.taxid =  userData.taxid
        }
        userStore.fetchEditUser(userId.value, data).then((response) => {
            if(response) {
                router.push({ name: 'user', params: {} })
            }
        })
    }

</script>