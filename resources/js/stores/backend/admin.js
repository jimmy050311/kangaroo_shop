import { defineStore } from "pinia";
import { getAdminFunc, 
         createAdminFunc, 
         getAdminDetailFunc, 
         editAdminFunc } from "@/Api/api.js";
import Swal from "sweetalert2/dist/sweetalert2.js";
import { alert,loading } from '@/swal/default.js'

export const useAdminStore = defineStore("admin", {

    state: () => {
        return {
            response: {
                success: '',
                message: '',
            },
            adminData: [],
        }
    },
    actions: {
        async fetchAdmin(page, data) {
            try {
                const response = await getAdminFunc(page, data)
                this.adminData = response.data
            } catch(error) {
                await Swal.fire({
                    icon: 'error',
                    title: '錯誤',
                    text: error.response.data.message,
                })
            }
        },
        async fetchCreateAdmin(data) {
            try {
                loading().growSpinner.fire({})
                const response = await createAdminFunc(data)
                await loading().growSpinner.close({})
                this.response = response.data
                await Swal.fire({
                    icon: 'success',
                    title: '成功',
                    text: response.data.message,
                })
            } catch(error) {
                await Swal.fire({
                    icon: 'error',
                    title: '錯誤',
                    text: error.response.data.message,
                })
            }
        },
        async fetchAdminDetail(id) {
            try {
                loading().growSpinner.fire({})
                const response = await getAdminDetailFunc(id)
                await loading().growSpinner.close({})
                return response.data.data
                
            } catch(error) {
                await Swal.fire({
                    icon: 'error',
                    title: '錯誤',
                    text: error.response.data.message,
                })
            }
        },
        async fetchEditAdmin(id, postData) {
            try {
                loading().growSpinner.fire({})
                const response = await editAdminFunc(id, postData)
                await loading().growSpinner.close({})
                this.response = response
                await Swal.fire({
                    icon: 'success',
                    title: '成功',
                    text: response.data.message,
                })

            }catch(error) {
                await Swal.fire({
                    icon: 'error',
                    title: '錯誤',
                    text: error.response.data.message,
                })
            }
        },
        async fetchEditPassword(id, postData) {
            try {
                loading().growSpinner.fire({})
                const response = await editAdminFunc(id, postData)
                await loading().growSpinner.close({})
                this.response = response
                await Swal.fire({
                    icon: 'success',
                    title: '成功',
                    text: response.data.message,
                })

            }catch(error) {
                await Swal.fire({
                    icon: 'error',
                    title: '錯誤',
                    text: error.response.data.message,
                })
            }
        }
    }

})