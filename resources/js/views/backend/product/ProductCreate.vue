<template lang="">
    <h1 class="page-header">
        建立商品
    </h1>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">商品資訊</a>
      </li>
      <li class="nav-item">
        <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">商品圖片</a>
      </li>
      <li class="nav-item">
        <a href="#default-tab-3" data-bs-toggle="tab" class="nav-link">商品詳情</a>
      </li>
    </ul>
    <div class="tab-content panel rounded-0 p-3 m-0">
        <div class="tab-pane fade active show" id="default-tab-1">
            <label class="form-label col-form-label col-md-12 d-flex fs-7">名稱</label>
            <div class="col-md-12">
                <input class="form-control" v-model="productData.name"/>
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7">產品編號</label>
            <div class="col-md-12">
                <input class="form-control" v-model="productData.number"/>
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">類別</label>
            <div class="col-md-12">
                <n-select
                    label-field="label"
                    value-field="value"
                    placeholder=""
                    filterable
                    :options="categoryOptions"
                    v-model:value="productData.category_id"
                />
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7">匯率</label>
            <div class="col-md-12">
                <n-input-number
                    v-model:value="productData.rate" 
                    clearable
                    placeholder="請輸入匯率"
                />
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7">毛利</label>
            <div class="col-md-12">
                <n-input-number
                    v-model:value="productData.profit" 
                    clearable
                    placeholder="請輸入毛利"
                />
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7">澳幣成本價</label>
            <div class="col-md-12">
                <n-input-number
                    v-model:value="productData.origin_price_aud" 
                    clearable
                />
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7">澳幣售價</label>
            <div class="col-md-12">
                <n-input-number
                    v-model:value="productData.real_price_aud" 
                    clearable
                    :disabled="true"
                />
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7">台幣成本價</label>
            <div class="col-md-12">
                <n-input-number
                    v-model:value="productData.origin_price_twd" 
                    clearable
                    :disabled="true"
                />
            </div>
            <label class="form-label col-form-label col-md-12 d-flex fs-7">台幣售價</label>
            <div class="col-md-12">
                <n-input-number
                    v-model:value="productData.real_price_twd" 
                    clearable
                    :disabled="true"
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
                    v-model:value="productData.status"
                />
            </div>
        </div>
        <div class="tab-pane fade" id="default-tab-2">
            <ImgUpload :imageList="imageData" :maxLimit=8 :maxSize=0.5 blockClass="col-md-2"></ImgUpload>
            <div class="invalid-feedback">
                ※上傳作品照片，第一張照片為主圖，可拖拉移動(建議上傳JPG檔案，大小建議200kb以內，以最多5張照片為上限)。
            </div>
        </div>
        <div class="tab-pane fade" id="default-tab-3">
            <label class="form-label col-form-label col-md-12 d-flex fs-7">規格</label>
            <n-input
                type="textarea"
                placeholder=""
                :autosize="{
                    minRows: 2
                }"
                v-model:value="productData.spec"
            />
            <label class="form-label col-form-label col-md-12 d-flex fs-7">簡述</label>
            <n-input
                type="textarea"
                placeholder=""
                :autosize="{
                    minRows: 2
                }"
                v-model:value="productData.description"
            />
            <label class="form-label col-form-label col-md-12 d-flex fs-7">商品介紹</label>
            <CkEditor ref="ckeditorRef" :handleCkEditorChangeContent="handleCkEditorChangeContent" v-model="productData.introduction"></CkEditor>
            <div class="mt-3 col-md-12 d-flex justify-content-center">
                <button type="submit" class="col-md-6 btn btn-primary w-100px" @click="submit()">新增商品</button>
            </div>
        </div>
    </div>    
</template>
<script setup>

    import { NButton, NImage, NModal, NUpload, NDataTable, NInputNumber, NSelect, NDatePicker, NInput } from "naive-ui"
    import { ref, reactive, onMounted, computed, watch, h } from "vue"
    import { useRoute, useRouter } from "vue-router"
    import CkEditor from '@/components/ckeditor/CkEditor.vue'
    import ImgUpload from '@/components/imageUpload/default.vue';
    import { useCategoryStore } from "@/stores/backend/category.js";
    import { useProductStore } from "@/stores/backend/product.js";

    const router = useRouter()
    const categoryStore = useCategoryStore()
    const productStore = useProductStore()
    const imageData = reactive([])
    const productData = reactive({
        name: '',
        number: '',
        category_id: null,
        rate: 0,
        profit: 0,
        origin_price_aud: null,
        real_price_aud: null,
        origin_price_twd: null,
        real_price_twd: null,
        spec: '',
        description: '',
        introduction: '',
        status: 1,
    })
    const ckeditorRef = ref(null)
    const categoryData = computed(() => {
        return categoryStore.categoryData
    })
    const statusOptions = ref([
        {
          label: '下架',
          value: 0
        },
        {
          label: '上架中',
          value: 1
        },
    ])
    const categoryOptions = ref([])

    onMounted(() => {
        //初始化ckeditor
        ckeditorRef.value.showContent()
        categoryStore.fetchCategoryOriginal().then(() => {
            categoryData.value.forEach(item => {
                categoryOptions.value.push({
                    'value': item.id,
                    'label': item.name
                })
            })
            productData.category_id = categoryData.value[0].id
        })
    })
    
    watch(productData, (newVal) => {
        productData.origin_price_twd = Math.round(productData.origin_price_aud * productData.rate / 100) * 100
        productData.real_price_aud = Math.round(productData.origin_price_aud * (1 + productData.profit) / 100) * 100
        productData.real_price_twd = Math.round(productData.origin_price_aud * (1 + productData.profit) * productData.rate / 100) * 100
    }, { deep: true })

    const handleCkEditorChangeContent = (val) => {
        productData.introduction = val;
    }

    function submit() {
        const data = {
            name: productData.name,
            number: productData.number,
            category_id: productData.category_id,
            rate: productData.rate,
            profit: productData.profit,
            origin_price_aud: productData.origin_price_aud,
            real_price_aud: productData.real_price_aud,
            origin_price_twd: productData.origin_price_twd,
            real_price_twd: productData.real_price_twd,
            spec: productData.spec,
            description: productData.description,
            introduction: productData.introduction,
            status: productData.status,
            imageData: imageData,
        }
        productStore.fetchCreateProduct(data).then((response) => {
            if(response) {
                router.push({ name: 'product', params: {} })
            }
        })
    }

</script>
