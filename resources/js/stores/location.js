import { defineStore } from "pinia";
import { getList, update, create, destroy, show } from "@/helpers/axiosConfig.js";
import { successMessage } from '@/helpers/toast'

export const useLocationStore = defineStore("locationStore", {
    state: () => ({
        locations: {
            countries: [],
            cities: [],
            districts: [],
            wards: [],
        },
        states: {
            countries: true,
            cities: false,
            districts: false,
            wards: false,
        }
    }),

    actions: {
        getCountries(params = {}) {
            getList('/api/location/countries', params).then((res) => {
                    console.log(res.data);
                    this.locations.countries = res.data.data;
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
        },
        getCities(params = {}) {
            getList('/api/location/cities', params).then((res) => {
                    console.log(res.data);
                    this.locations.cities = res.data.data;
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
        },
        getDistricts(id) {
            this.locations.districts = [];
            if(id){
                getList('/api/location/districts/' + id).then((res) => {
                    console.log(res.data);
                    this.locations.districts = res.data.data;
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
            }

        },
        getWards(id) {
            this.locations.wards = [];
            if(id){
                getList('/api/location/wards/' + id).then((res) => {
                    console.log(res.data);
                    this.locations.wards = res.data.data;
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
            }

        },
    },
});
