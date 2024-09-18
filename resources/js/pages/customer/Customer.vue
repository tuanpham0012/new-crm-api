<template lang="">
    <div class="row">
        <div class="col-md-12">
            <div class="card pb-1">
                <div
                    class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3"
                >
                    <div class="d-flex">
                        <div class="d-flex align-items-center w-auto me-2">
                            <div class="w-75px me-1">
                                <label for="customerCode" class="col-form-label"
                                    >Tìm kiếm</label
                                >
                            </div>
                            <div class="w-100px ms-1">
                                <input
                                    type="text"
                                    class="form-control mb-lg-0 p-2"
                                    id="customerCode"
                                    placeholder="Nhập tên, email, sdt.."
                                    v-model="query.search"
                                />
                            </div>
                        </div>
                        <div class="d-flex align-items-center w-auto me-2">

                        </div>
                        <div class="d-flex align-items-center w-auto me-2">

                        </div>
                    </div>
                    <button class="btn btn-primary" @click="toggleShowModal()">
                        <i class="feather icon-plus"></i>
                        Thêm mới
                    </button>
                </div>
                <div class="col-12">
                    <div class="card-body table-border-style">
                        <div class="table-responsive table-scroll h-[65vh]">
                            <table class="table table-hover ">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th></th>
                                        <th>Khách hàng</th>
                                        <th>Chịu trách nhiệm</th>
                                        <th>Giám sát</th>
                                        <th>Phân loại</th>
                                        <th>Nguồn khách</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(item, index) in customers"
                                        :key="index"
                                        :class="{
                                            active: item.uuid === uuid,
                                        }"
                                    >
                                        <td
                                            class="w-[5%] min-w-[50px] text-center"
                                        >
                                            {{ index + 1 }}
                                            <!-- <input class="checkbox-input" name="input" type="checkbox" @change="getCheck" v-model="value"> -->
                                        </td>
                                        <td
                                            class="w-[5%] min-w-[40px] text-center"
                                        >
                                            <img class="w-[55px] img-radius" :src="item.avatar?.url ?? 'https://yt3.googleusercontent.com/-CFTJHU7fEWb7BYEb6Jh9gm1EpetvVGQqtof0Rbh-VQRIznYYKJxCaqv_9HeBcmJmIsp2vOO9JU=s900-c-k-c0x00ffffff-no-rj'">
                                        </td>
                                        <td class="min-w-[200px] w-[25%]">

                                            <p
                                                class="text-[16px] font-semibold"
                                            >
                                                {{ item.full_name }}
                                            </p>
                                            <p>
                                                <i
                                                    class="fas fa-map-marker"
                                                ></i>
                                                {{ item.full_address }}
                                            </p>
                                        </td>
                                        <td class="min-w-[170px] w-[20%]">
                                            {{ item.user.data?.name }}
                                        </td>
                                        <td class="min-w-[170px] w-[20%]">
                                            {{ item.observer.data?.name }}
                                        </td>
                                        <td class="min-w-[80px] w-[10%]">
                                            {{ item.type }}
                                        </td>
                                        <td class="min-w-[100px] w-[10%]">
                                            {{ item.source?.name }}
                                        </td>
                                        <td class="min-w-[100px] text-center">
                                            <button
                                                class="btn btn-sm btn-icon w-[25px] h-[25px] hover:scale-125"
                                                @click="
                                                    toggleShowModal(item.uuid)
                                                "
                                            >
                                                <i
                                                    class="fas fa-edit text-green-400"
                                                    aria-hidden="true"
                                                ></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-if="pagination">
                            <Pagination
                                :pagination="pagination"
                                @change-page="changePage"
                            ></Pagination>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <CustomerModal
        :id="uuid"
        :types="types"
        :sources="sources"
        @close="toggleCloseModal()"
        v-if="showModel"
    ></CustomerModal>
    <CustomerDetailModal></CustomerDetailModal>
</template>
<script setup>
import { ref, computed, onBeforeMount, reactive, watch } from "vue";
import { useCustomerStore } from "@store/customer.js";
import Swal from "sweetalert2";
import debounce from "lodash.debounce";
import CustomerModal from "./CustomerModal.vue";
import CustomerDetailModal from "./CustomerDetail.vue";

const props = defineProps({
    types: {
        type: Array,
        default: [],
    },
    sources: {
        type: Array,
        default: [],
    },
});
const uuid = ref(null);

const query = reactive({
    search: "",
    filters: [],
    orders: [],
    per_page: 30,
    page: 1,
});

const customerStore = useCustomerStore();

const customers = computed(() => {
    return customerStore.data;
});


const pagination = computed(() => {
    return customerStore.pagination;
});

const showModel = computed(() => {
    return customerStore.$state.showModal ?? true;
});

watch(
    () => query.search,
    debounce((newValue, oldValue) => {
        getData();
    }, 500)
);

watch(
    () => query.filters,
    (newValue, oldValue) => {
        getData();
    },
    { deep: true }
);

const toggleShowModal = (id = null) => {
    uuid.value = id;
    customerStore.toggleModal(true);
};

const toggleCloseModal = () => {
    uuid.value = null;
    getData();
    customerStore.toggleModal(false);
};

const getData = async () => {
    await customerStore.getData(query);
};

const changePage = (value) => {
    query.page = value.current_page;
    query.per_page = value.per_page;
    getData();
};

onBeforeMount(() => {
    getData();
});
</script>
<style lang="scss" scoped>
.table-responsive {
    height: calc(100vh - 355px);
}
</style>
