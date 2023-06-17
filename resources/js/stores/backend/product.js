import { defineStore } from "pinia"
import { 
    getProductFunc,
    obtainProductFunc,
    createProductFunc, 
    getProductDetailFunc, 
    editProductFunc } from "@/Api/api.js"
import Swal from "sweetalert2/dist/sweetalert2.js"
import { alert,loading } from '@/swal/default.js'

export const useProductStore = defineStore("product", {
    state: () => {
        return {
            productData: [],
        }
    },
    actions: {
        async fetchProduct(page, data) {
            try {

                const response = await getProductFunc(page, data)
                this.productData = response.data
                return response.data.data

            }catch(error) {
                await Swal.fire({
                    icon: 'error',
                    title: '錯誤',
                    text: error.response.data.message,
                })
            }
        },
        async fetchObtainProduct(data) {
            try {

                const response = await obtainProductFunc(data)
                this.productData = response.data
                return response.data.data

            }catch(error) {
                await Swal.fire({
                    icon: 'error',
                    title: '錯誤',
                    text: error.response.data.message,
                })
            }
        },
        async fetchCreateProduct(data) {
            try {
                const response = await createProductFunc(data)
                await Swal.fire({
                    icon: 'success',
                    title: '成功',
                    text: response.data.message,
                })
                return true
            }catch(error) {
                await Swal.fire({
                    icon: 'error',
                    title: '錯誤',
                    text: error.response.data.message,
                })
                return false
            }
        },
        async fetchProductDetail(id) {
            try {
                const response = await getProductDetailFunc(id)
                return response.data.data
                
            }catch(error) {
                await Swal.fire({
                    icon: 'error',
                    title: '錯誤',
                    text: error.response.data.message,
                })
            }
        },
        async fetchEditProduct(id, postData) {
            try {
                
                const response = await editProductFunc(id, postData)
                await Swal.fire({
                    icon: 'success',
                    title: '成功',
                    text: response.data.message,
                })
                return response

            }catch(error) {
                await Swal.fire({
                    icon: 'error',
                    title: '錯誤',
                    text: error.response.data.message
                })
            }
        },
    }
})