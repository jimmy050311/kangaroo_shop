import { defineStore } from "pinia"
import { 
    getContactFunc } from "@/Api/api.js"
import Swal from "sweetalert2/dist/sweetalert2.js"
import { alert,loading } from '@/swal/default.js'

export const useContactStore = defineStore("contact", {
    state: () => {
        return {
            contactData: []
        }
    },
    actions: {
        async fetchContact(page, data) {
            try {

                const response = await getContactFunc(page, data)
                this.contactData = response.data
                return response.data.data

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