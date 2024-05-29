import { defineStore } from "pinia";
import { getList, update, create, destroy, show } from "@/helpers/axiosConfig.js";
import { successMessage } from '@/helpers/toast'
const url = (id = null) => {
    if (id === null) {
        return '/api/departments';
    }
    return '/api/departments/' + id;
};

export const useDepartmentStore = defineStore("departmentStore", {
    state: () => ({
        departments: {
            data: [],
            meta: null,
            code: 200,
            message: '',
        },
        department: null,
        errors: null,
        showModal: false
    }),

    getters: {
        getParentDepartmentData: () => this.departments.filter((item) => (item.parent_id === null)),
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
                    this.departments = res.data;
                    this.errors = [];
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
        },
        showData(id) {
            this.department = null;
            show(url(id)).then((res) => {
                    console.log(res.data);
                    this.department = res.data.data;
                    this.errors = [];
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
        },
        createData(data, loadAll = false) {
            this.errors = null
            create(url(), data)
                .then((res) => {
                    // this.pushData(res.data.data);
                    successMessage(res.data.message)
                    this.getData()

                    this.toggleModal(false);
                }).catch((err) => {
                    console.log(err);
                    if (err.response.data.errors) {
                        this.errors = err.response.data.errors
                    }
                })
        },
        updateData(id, data, loadAll = false) {
            this.errors = null
            update(url(id), data)
                .then((res) => {
                    successMessage(res.data.message)
                    this.getData()
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
