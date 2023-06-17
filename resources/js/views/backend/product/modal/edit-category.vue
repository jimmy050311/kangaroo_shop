<template lang="">
    <div id="editCategoryModal" ref="editModalRef" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">編輯類別</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label col-form-label col-md-12 d-flex fs-7 mt-1">商品圖片</label>
                        </div>
                        <div class="col-md-9">
                            <n-upload
                                :action="url"
                                :default-file-list="previewFileListRef"
                                list-type="image-card"
                                @finish="handleFinish"
                                :max=1
                            />
                            <n-modal
                              v-model:show="showModalRef"
                              preset="card"
                              style="width: 600px"
                              title="A Cool Picture"
                            />
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label class="md-col">名稱(必填)</label>
                            </div>
                            <div class="col-md-9">
                                <input class="md-input" type="text" v-model="categoryData.name" placeholder="請輸入類別名稱" autocomplete="off" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" v-if="true" @click="del()">刪除</button>
                    <button type="button" class="btn btn-default" @click="hideModal()">關閉</button>
                    <button type="button" class="btn btn-primary" @click="submit()">確認送出</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
    import { Modal } from 'bootstrap'
    import { ref, watch, reactive } from 'vue'
    import { NImage, NModal, NUpload } from "naive-ui"
    import { useCategoryStore } from "@/stores/backend/category.js"
    import { useRouter } from "vue-router"
    import Swal from "sweetalert2/dist/sweetalert2.js"

    const router = useRouter()
    //上傳群組圖片
    const showModalRef = ref(false)
    const previewFileListRef = ref([])
    const url = ref("")
    const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content
    url.value = "/image/image_upload?_token=" + csrfToken

    const handleFinish = ({
      file,
      event
    }) => {
        categoryData.imageData[0] = (JSON.parse(event.currentTarget.response))
    };

    const categoryStore = useCategoryStore()
    const categoryData = reactive({
        name: '',
        status: '',
        parent: '',
        sort: '',
        imageData: [],
    })
    var modalInstance = ref()

    const props = defineProps({
        isShow: {
            type: Boolean,
            default: false
        },
        id: {
            type: Number,
            default: 0
        },
    })

    const emit = defineEmits(['closeModal'])

    watch(() => props.isShow, (newVal, oldVal) => {
        categoryStore.fetchGetCategoryDetail(props.id).then((response) => {
            previewFileListRef.value[0] = {
                name: response.image,
                status: "finished",
                url: "/storage/" + response.image
            }
            categoryData.imageData = previewFileListRef.value
            categoryData.name = response.name
            categoryData.status = response.status
            categoryData.parent = response.parent
            categoryData.sort = response.sort
            if(newVal === true) {
                showModal()
            }
        })
    })

    function showModal() {
        modalInstance = new Modal(document.getElementById('editCategoryModal'), {
            target: "#edit-category-modal",
            backdrop: "static"
        })
        modalInstance.show()
    }

    function hideModal() {
        modalInstance.hide()
        emit('closeModal', false)
    }

    function submit() {
        var postData = {
            name: categoryData.name,
            image: categoryData.imageData[0].url,
            status: categoryData.status,
            parent: categoryData.parent,
            sort: categoryData.sort
        }
        categoryStore.fetchEditCategoryDetail(props.id, postData).then(() => {
            window.location.reload()
        })
        hideModal()
    }

    function del() {
        Swal.fire({
            icon: 'info',
            title: '確定要刪除嗎？刪除後將無法回復此類別!',
            showCancelButton: true,
            confirmButtonText: '確定',
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            categoryStore.fetchDeleteCategory(props.id).then(() => {
                categoryStore.fetchCategory()
            })
          }
        })
        
        hideModal()
    }

</script>