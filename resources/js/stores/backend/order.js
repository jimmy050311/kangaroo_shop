import { defineStore } from "pinia"
import { 
    getOrderFunc,
    createOrderFunc,
    getOrderDetailFunc, 
    editOrderFunc } from "@/Api/api.js"
import Swal from "sweetalert2/dist/sweetalert2.js"
import { alert,loading } from '@/swal/default.js'

export const useOrderStore = defineStore("order", {
    state: () => {
        return {
            orderData: [],
        }
    },
    actions: {
        async fetchOrder(page, data) {
            try {

                const response = await getOrderFunc(page, data)
                this.orderData = response.data
                return response.data.data

            }catch(error) {
                await Swal.fire({
                    icon: 'error',
                    title: '錯誤',
                    text: error.response.data.message,
                })
            }
        },
        async fetchCreateOrder(data) {
            try {

                const response = await createOrderFunc(data)
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
        async fetchOrderDetail(id) {
            try {

                const response = await getOrderDetailFunc(id)
                return response.data.data

            }catch(error) {
                await Swal.fire({
                    icon: 'error',
                    title: '錯誤',
                    text: error.response.data.message,
                })
            }
        },
        async fetchEditOrder(id, data) {
            try {

                const response = await editOrderFunc(id, data)
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
                    text: error.response.data.message
                })
                return false
            }
        }
    }
})