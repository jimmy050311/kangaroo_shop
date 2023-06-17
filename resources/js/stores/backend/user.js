import { defineStore } from "pinia"
import {
    getUserFunc,
    obtainUserFunc,
    createUserFunc,
    getUserDetailFunc,
    editUserFunc
} from "@/Api/api.js"
import Swal from "sweetalert2/dist/sweetalert2.js"
import { alert,loading } from '@/swal/default.js'

export const useUserStore = defineStore("user", {
    state: () => {
        return {
            userData: []
        }
    },
    actions: {
        async fetchUser(page, data) {
            try {

                const response = await getUserFunc(page, data)
                this.userData = response.data

            }catch(error) {
                await Swal.fire({
                    icon: 'error',
                    title: '錯誤',
                    text: error.response.data.message,
                })
            }
        },
        async fetchObtainUser(data) {
            try {

                const response = await obtainUserFunc(data)
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
        async fetchCreateUser(data) {
            try {
                loading().growSpinner.fire({})
                const response = await createUserFunc(data)
                await loading().growSpinner.close({})
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
        async fetchUserDetail(id) {
            try {
                loading().growSpinner.fire({})
                const response = await getUserDetailFunc(id)
                await loading().growSpinner.close({})
                return response.data.data

            }catch(error) {
                await Swal.fire({
                    icon: 'error',
                    title: '錯誤',
                    text: error.response.data.message,
                })
            }
        },
        async fetchEditUser(id, data) {
            try {
                loading().growSpinner.fire({})
                const response = await editUserFunc(id, data)
                await loading().growSpinner.close({})
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
        }
    }
})