import axios from "axios"

const request = axios.create({
    withCredentials: true,

    headers: { 'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')},
})

request.interceptors.response.use((response) => {
    return Promise.resolve(response);
}, error => {
    switch(error.response.status) {
        case 403:
            window.location.href='/manage/login'
        case 419:
            window.location.href='/manage/login'
        default:
            return Promise.reject(error);
    }
})

//管理員
export const getAdminFunc = (page, data) => request.get(`/v1/admin/api?page=${page}`, data)
export const createAdminFunc = (data) => request.post(`/v1/admin/api`, data)
export const getAdminDetailFunc = (id) => request.get(`/v1/admin/api/${id}`)
export const editAdminFunc = (id, data) => request.put(`/v1/admin/api/${id}`, data)

//會員
export const getUserFunc = (page, data) => request.get(`/v1/user/api?page=${page}`, data)
export const obtainUserFunc = (data) => request.get(`/v1/user/api/obtain`, data)
export const createUserFunc = (data) => request.post(`/v1/user/api`, data)
export const getUserDetailFunc = (id) => request.get(`/v1/user/api/${id}`)
export const editUserFunc = (id, data) => request.put(`/v1/user/api/${id}`, data)

//類別
export const getCategoryFunc = () => request.get(`/v1/category/api`)
export const createCategoryFunc = (postData) => request.post(`/v1/category/api`, postData)
export const getCategoryDetailFunc = (id) => request.get(`/v1/category/api/${id}`)
export const editCategoryFunc = (id, postData) => request.put(`/v1/category/api/${id}`, postData)
export const deleteCategoryFunc = (id) => request.delete(`/v1/category/api/${id}`)

//產品
export const getProductFunc = (page, data) => request.get(`/v1/product/api?page=${page}`, data)
export const obtainProductFunc = (data) => request.get(`/v1/product/api/obtain`, data);
export const createProductFunc = (postData) => request.post(`/v1/product/api`, postData)
export const getProductDetailFunc = (id) => request.get(`/v1/product/api/${id}`)
export const editProductFunc = (id, postData) => request.put(`/v1/product/api/${id}`, postData)

//庫存
export const getInventoryFunc = (page, data) => request.get(`/v1/inventory/api?page=${page}`, data)
export const createInventoryFunc = (data) => request.post(`/v1/inventory/api`, data)

//訂單
export const getOrderFunc = (page, data) => request.get(`/v1/order/api?page=${page}`, data)
export const createOrderFunc = (data) => request.post(`/v1/order/api`, data)
export const getOrderDetailFunc = (id) => request.get(`/v1/order/api/${id}`)
export const editOrderFunc = (id, data) => request.put(`/v1/order/api/${id}`, data)

//聯絡我們
export const getContactFunc = (page, data) => request.get(`/v1/contact/api?page=${page}`, data)

//登出
export const logoutFunc = (page, data) => request.post(`/v1/sign/api/logout`)