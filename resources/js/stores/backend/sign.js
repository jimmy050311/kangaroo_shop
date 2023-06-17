import { defineStore } from "pinia"
import { logoutFunc } from "@/Api/api.js";
import Swal from "sweetalert2/dist/sweetalert2.js";
import { alert,loading } from '@/swal/default.js'

export const useSignStore = defineStore("sign", {
    state: () => {

    },
    actions: {
        async fetchLogout() {
            try {

                const response = await logoutFunc()
                return response.data

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