import { defineStore } from "pinia";
import { getList, update, create, destroy, show } from "@/helpers/axiosConfig.js";
import { successMessage } from '@/helpers/toast'
const url = (id = null) => {
    if (id === null) {
        return '/api/customers';
    }
    return '/api/customers/' + id;
};

export const useCustomerStore = defineStore("customerStore", {
    state: () => ({
        entries: {
            data: [],
            meta: null,
            code: 200,
            message: '',
        },
        entry: null,
        errors: null,
        showModal: false,
        contactType: {
            phone: {
                value: 'phone',
                type: [
                    { key: 'company_phone', value: 'Công ty' },
                    { key: 'mobile_phone', value: 'Di động' },
                    { key: 'fax', value: 'Fax' },
                    { key: 'home_phone', value: 'Nhà' },
                    { key: 'other', value: 'Khác' },
                ]
            },
            email: {
                value: 'email',
                type: [
                    { key: 'work_email', value: 'Công việc' },
                    { key: 'personal_email', value: 'Cá nhân' },
                    { key: 'other', value: 'Khác' },
                ]
            },
            message: {
                value: 'message',
                type: [
                    { key: 'facebook', value: 'Facebook' },
                    { key: 'telegram', value: 'Telegram' },
                    { key: 'skype', value: 'Skype' },
                    { key: 'zalo', value: 'Zalo' },
                    { key: 'other', value: 'Khác' },
                ]
            }
        }
    }),

    getters: {
        data: (state) => state.entries.data,
        pagination: (state) => state.entries.meta?.pagination ?? null,
    },

    actions: {
        toggleModal(state) {
            this.showModal = state;
        },
        getData(params = {}) {
            getList(url(), params, {
                'portal-id': 1
            }).then((res) => {
                console.log(res.data);
                this.entries = res.data;
                this.errors = [];
            })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
        },
        showData(id) {
            this.entry = null;
            show(url(id)).then((res) => {
                console.log(res.data);
                this.entry = res.data.data;
                console.log(this.entry);
                this.errors = [];
            })
                .catch((err) => {
                    console.log(err);
                    this.errors = err.response.data.errors;
                });
        },
        createData(data, loadAll = false) {
            this.errors = null
            create(url(), data)
                .then((res) => {
                    successMessage(res.data.message)
                    // this.getData()
                    this.toggleModal(false);
                }).catch((err) => {
                    console.log(err.response.data.errors);
                    this.errors = err.response.data.errors ?? null
                })
        },
        updateData(id, data, loadAll = false) {
            this.errors = null
            update(url(id), data)
                .then((res) => {
                    successMessage(res.data.message)
                    // this.getData()
                    this.toggleModal(false);
                }).catch(err => {
                    console.log(err);
                    if (err.response.data.errors) {
                        this.errors = err.response.data.errors
                    }
                })
        },
        updateRowData(value) {
            if (this.brands.data && this.brands.data.length > 0) {
                const index = this.brands.data.findIndex((obj) => value.uuid === obj.uuid);
                this.brands.data[index] = value;
                console.log(this.quotes);
            }
        },
        pushData(value) {
            console.log(value)
            if (this.brands.data) {
                this.brands.data = [value].concat(this.brands.data);
            }
        },
        setDataError() {
            this.errors = null;
        },
        deleteRow(id) {
            destroy(url(id))
                .then((res) => {
                    // this.updateRowData(res.data);
                    toastr.info('Are you the 6 fingered man?')
                    this.getData()
                }).catch(err => {
                    console.log(err);
                    if (err.response.data.errors) {
                        this.errors = err.response.data.errors
                    }
                })
        }
    },
});
