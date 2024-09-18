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
                            <select
                                class="form-select"
                                v-model="query.filters[0].data"
                            >
                                <option selected :value="null">
                                    Chọn trạng thái
                                </option>
                                <option
                                    v-for="(item, index) in props.statuses"
                                    :key="index"
                                    :value="index"
                                >
                                    {{ item }}
                                </option>
                            </select>
                        </div>
                        <div class="d-flex align-items-center w-auto me-2">
                            <select
                                class="form-select"
                                v-model="query.filters[1].data"
                            >
                                <option selected :value="null">
                                    Chọn phòng ban
                                </option>
                                <option
                                    v-for="(item, index) in departments"
                                    :key="index"
                                    :value="item.id"
                                >
                                    {{ item.name }}
                                </option>
                            </select>
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
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên</th>
                                        <th>Phòng ban</th>
                                        <th>Giới tính</th>
                                        <th>Trạng thái</th>
                                        <th>Ghi chú</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(item, index) in users"
                                        :key="index"
                                        :class="{
                                            active: item.uuid === uuid,
                                        }"
                                    >
                                        <td
                                            class="w-[5%] min-w-[50px] text-center"
                                        >
                                            {{ index + 1 }}
                                        </td>
                                        <td class="min-w-[200px] w-[25%]">
                                            {{ item.email }}
                                        </td>
                                        <td class="min-w-[200px] w-[25%]">
                                            <p
                                                class="text-[16px] font-semibold"
                                            >
                                                {{ item.name }} -
                                                {{ item.code }}
                                            </p>
                                            <p>
                                                <i class="far fa-envelope"></i>
                                                {{ item.email }}
                                            </p>
                                            <p>
                                                <i
                                                    class="fas fa-map-marker"
                                                ></i>
                                                {{ item.full_address }}
                                            </p>
                                            <p>
                                                <i class="fas fa-phone-alt"></i>
                                                {{ item.phone }}
                                            </p>
                                        </td>
                                        <td class="min-w-[200px] w-[25%]">
                                            {{ item.name }}
                                        </td>
                                        <td class="min-w-[80px] w-[10%]">
                                            {{ item.text_gender }}
                                        </td>
                                        <td class="min-w-[100px] w-[10%]">
                                            {{ item.text_status }}
                                        </td>
                                        <td class="min-w-[200px] w-[30%]">
                                            {{ item.note }}
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
    <UserModal
        :id="uuid"
        :genders="genders"
        :statuses="statuses"
        @close="toggleCloseModal()"
        v-if="showModel"
    ></UserModal>
</template>
<script setup>
import { ref, computed, onBeforeMount, reactive, watch } from "vue";
import { useUserStore } from "@store/user.js";
import { useDepartmentStore } from "@store/department.js";
import Swal from "sweetalert2";
import debounce from "lodash.debounce";
import UserModal from "./UserModal.vue";

const props = defineProps({
    genders: {
        type: Array,
        default: [],
    },
    statuses: {
        type: Array,
        default: [],
    },
});
const uuid = ref(null);

const query = reactive({
    search: "",
    filters: [
        {
            key: "status",
            data: null,
        },
        {
            key: "department",
            data: null,
        },
    ],
    orders: [],
    per_page: 30,
    page: 1,
});

const userStore = useUserStore();
const departmentStore = useDepartmentStore();

const users = computed(() => {
    return userStore.$state.users.data ?? [];
});

const departments = computed(() => {
    return departmentStore.$state.departments.data ?? [];
});

const pagination = computed(() => {
    return userStore.$state.users.meta
        ? userStore.$state.users.meta.pagination
        : null;
});

const showModel = computed(() => {
    return userStore.$state.showModal ?? true;
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
    userStore.toggleModal(true);
};

const toggleCloseModal = () => {
    uuid.value = null;
    getData();
    userStore.toggleModal(false);
};

const getData = async () => {
    await userStore.getData(query);
};

const changePage = (value) => {
    query.page = value.current_page;
    query.per_page = value.per_page;
    getData();
};

onBeforeMount(() => {
    getData();
    departmentStore.getData();
});
</script>
<style lang="scss" scoped>
.table-responsive {
    height: calc(100vh - 355px);
}
</style>
