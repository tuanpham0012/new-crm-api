<template lang="">
    <model
        :title="!id ? 'Thêm mới nhân viên' : 'Cập nhật nhân viên'"
        modal-size="modal-lg"
        @close="
            () => {
                emits('close');
            }
        "
    >
        <template #body>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="parent_id" class="form-label"
                                >Phòng ban</label
                            >
                        </div>
                        <div
                            class="col-sm-12"
                            v-for="(item, index) in user.departments.data"
                            :key="index"
                        >
                            <select
                                class="form-select"
                                id="parent_id"
                                v-model="item.department_id"
                            >
                                <option
                                    v-for="(item, index) in departments"
                                    :key="index"
                                    :value="item.id"
                                    :selected="item.code == 'ROOT'"
                                    :class="'ps-' + item.depth * 2"
                                >
                                    <span v-for="index in item.depth"> - </span
                                    >{{ item.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="code" class="form-label"
                                >Mã nhân viên</label
                            >
                        </div>
                        <div class="col-sm-12">
                            <input
                                type="text"
                                class="form-control form-control-sm disabled"
                                :class="{ 'is-invalid': errors && errors.code }"
                                id="code"
                                disabled
                                placeholder="Mã nhân viên..."
                                v-model="user.code"
                            />
                            <Feedback :errors="errors?.code"/>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="name" class="form-label"
                                >Tên nhân viên</label
                            >
                        </div>
                        <div class="col-sm-12">
                            <input
                                type="text"
                                class="form-control form-control-sm"
                                :class="{ 'is-invalid': errors && errors.name }"
                                id="name"
                                placeholder="Nhập tên nhân viên..."
                                v-model="user.name"
                            />
                            <Feedback :errors="errors?.name"/>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="email" class="form-label">Email</label>
                        </div>
                        <div class="col-sm-12">
                            <input
                                type="text"
                                class="form-control form-control-sm"
                                :class="{ 'is-invalid': errors && errors.email }"
                                id="email"
                                placeholder="Nhập email..."
                                v-model="user.email"
                            />
                            <Feedback :errors="errors?.email"/>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="password" class="form-label"
                                >Mật khẩu</label
                            >
                        </div>
                        <div class="col-sm-9 input-group">
                            <input
                                type="text"
                                class="form-control form-control-sm disabled"
                                :class="{ 'is-invalid': errors && errors.password }"
                                id="password"
                                disabled
                                v-model="user.password"
                            />
                            <span
                                class="input-group-text"
                                @click="changePassword()"
                                ><i class="fa fa-refresh" aria-hidden="true"></i
                            ></span>
                            <Feedback :errors="errors?.password"/>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="phone" class="form-label"
                                >Điện thoại</label
                            >
                        </div>
                        <div class="col-sm-12">
                            <input
                                type="text"
                                class="form-control form-control-sm"
                                :class="{ 'is-invalid': errors && errors.phone }"
                                id="phone"
                                placeholder="Nhập số điện thoại..."
                                v-model="user.phone"
                            />
                            <Feedback :errors="errors?.phone"/>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="code" class="form-label"
                                >Ngày sinh</label
                            >
                        </div>
                        <div class="col-sm-12">
                            <input
                                type="date"
                                class="form-control form-control-sm"
                                :class="{ 'is-invalid': errors && errors.birthday }"
                                id="email"
                                placeholder="Nhập email..."
                                v-model="user.birthday"
                            />
                            <Feedback :errors="errors?.birthday"/>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="code" class="form-label"
                                >Giới tính</label
                            >
                        </div>
                        <select class="form-select" v-model="user.gender" :class="{ 'is-invalid': errors && errors.gender }">
                            <option selected :value="null">
                                Chọn giới tính
                            </option>
                            <option
                                v-for="(item, index) in props.genders"
                                :key="index"
                                :value="index"
                            >
                                {{ item }}
                            </option>
                        </select>
                        <Feedback :errors="errors?.gender"/>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="code" class="form-label"
                                >Trạng thái</label
                            >
                        </div>
                        <select class="form-select" v-model="user.status" :class="{ 'is-invalid': errors && errors.status }">
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
                        <Feedback :errors="errors?.status"/>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="code" class="form-label"
                                >Nhóm người dùng</label
                            >
                        </div>
                        <select class="form-select" v-model="user.role_id" :class="{ 'is-invalid': errors && errors.role_id }">
                            <option selected :value="null">
                                Chọn nhóm người dùng
                            </option>
                            <option
                                v-for="(item, index) in props.genders"
                                :key="index"
                                :value="index"
                            >
                                {{ item }}
                            </option>
                        </select>
                        <Feedback :errors="errors?.role_id"/>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="col-sm-12">
                            <label for="code" class="form-label"
                                >Ngân hàng</label
                            >
                            <button
                                class="btn btn-sm btn-icon text-primary"
                                @click="addBank()"
                            >
                                <i class="fas fa-plus-circle fs-5"></i>
                            </button>
                        </div>
                        <div
                            class="row col-sm-12 mb-3"
                            v-for="(item, index) in user.banks.data"
                            :key="index"
                        >
                            <div class="col-sm-4">
                                <select
                                    class="form-select"
                                    v-model="item.bank_id"
                                    :class="{ 'is-invalid': errors && errors[`banks.data.${index}.bank_id`] }"
                                >
                                    <option :value="null">
                                        Chọn ngân hàng
                                    </option>
                                    <option
                                        v-for="(item, index) in banks"
                                        :key="index"
                                        :value="item.id"
                                    >
                                        {{ item.name }}
                                    </option>
                                </select>
                                {{ item.bank_id }}
                                <Feedback :errors="errors[`banks.data.${index}.bank_id`] ?? []"/>
                            </div>
                            <div class="col-sm-4">
                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    :class="{ 'is-invalid': errors && errors[`banks.data.${index}.bank_username`] }"
                                    id="name"
                                    placeholder="Nhập tên người nhận..."
                                    v-model="item.bank_username"
                                />
                                <Feedback :errors="errors[`banks.data.${index}.bank_username`]"/>
                            </div>
                            <div class="col-sm-4">
                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    :class="{ 'is-invalid': errors && errors[`banks.data.${index}.bank_number`] }"
                                    id="name"
                                    placeholder="Nhập số tài khoản..."
                                    v-model="item.bank_number"
                                />
                                <Feedback :errors="errors[`banks.data.${index}.bank_number`]"/>
                            </div>
                            <!-- <div class="col-sm-1">
                                <button
                                    class="btn btn-sm btn-icon text-secondary"
                                    @click="deleteBank(index)"
                                >
                                <i class="fas fa-trash-alt fs-5"></i>
                                </button>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="col-sm-2">
                            <label for="note" class="form-label">Địa chỉ</label>
                        </div>
                        <div class="row col-sm-12">
                            <div class="col-sm-4">
                                <select-search
                                    :listData="location.cities"
                                    display="name"
                                    placeholder="Chọn Thành phố"
                                    v-model="user.city_id"
                                ></select-search>
                            </div>
                            <div class="col-sm-4">
                                <select-search
                                    :listData="location.districts"
                                    ref="districts"
                                    display="name"
                                    :disabled="user.city_id ? false : true"
                                    placeholder="Chọn Quận/huyện"
                                    v-model="user.district_id"
                                ></select-search>
                            </div>
                            <div class="col-sm-4">
                                <select-search
                                    :listData="location.wards"
                                    ref="wards"
                                    display="name"
                                    :disabled="user.district_id ? false : true"
                                    placeholder="Chọn Phường/Xã"
                                    v-model="user.ward_id"
                                ></select-search>
                            </div>
                            <div class="col-sm-12 py-3">
                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    :class="{ 'is-invalid': errors && errors.address }"
                                    id="code"
                                    placeholder="Địa chỉ chi tiết"
                                    v-model="user.address"
                                />
                                <Feedback :errors="errors.address"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="col-sm-2">
                            <label for="note" class="form-label">Ghi chú</label>
                        </div>
                        <div class="col-sm-12">
                            <textarea
                                type="text"
                                class="form-control"
                                :class="{ 'is-invalid': errors && errors.note }"
                                id="note"
                                rows="4"
                                placeholder="Nhập ghi chú..."
                                v-model="user.note"
                            ></textarea>
                            <Feedback :errors="errors.note"/>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <template #footer>
            <button class="btn btn-sm btn-success" @click="save()">
                Lưu lại
            </button>
            <button
                class="btn btn-sm btn-secondary"
                @click="
                    () => {
                        emits('close');
                    }
                "
            >
                Đóng
            </button>
        </template>
    </model>
</template>
<script setup>
import { reactive, computed, onBeforeMount, watch, ref } from "vue";
import Model from "@component/modals/BaseModal.vue";
import { useDepartmentStore } from "@store/department.js";
import { useUserStore } from "@store/user.js";
import { useLocationStore } from "@store/location.js";
import { useBankStore } from "@store/bank.js";
import { textCode, removeVietnameseTones } from "@/services/utils.js";
import { randomPassword } from "@/helpers/helpers.js";
import moment from "moment";

/**
 * variable
 */
const props = defineProps({
    id: {
        type: [Number, String],
        default: null,
    },
    genders: {
        type: [Array],
        default: [],
    },
    statuses: {
        type: [Array],
        default: [],
    },
});

const emits = defineEmits(["close"]);

const departmentStore = useDepartmentStore();
const userStore = useUserStore();
const bankStore = useBankStore();
const locationStore = useLocationStore();

const newUser = reactive({
    id: null,
    uuid: null,
    code: "",
    name: "",
    email: "",
    phone: "",
    birthday: moment(),
    address: "",
    city_id: null,
    district_id: null,
    ward_id: null,
    nationality_id: null,
    gender: 0,
    status: 0,
    password: randomPassword(14),
    role_id: 3,
    note: "",
    departments: {
        data: [
            {
                department_id: null,
            },
        ],
    },
    banks: {
        data: [
            {
                bank_id: null,
                bank_number: "",
                bank_username: "",
            },
        ],
    },
});

const districts = ref();
const wards = ref();

const departments = computed(() => {
    return departmentStore.$state.departments.data;
});

const user = computed(() => {
    return props.id && userStore.$state.user ? userStore.$state.user : newUser;
});

const errors = computed(() => {
    return userStore.$state.errors;
});

const location = computed(() => {
    return locationStore.$state.locations;
});

const banks = computed(() => {
    return bankStore.$state.banks.data;
});

/**
 * function
 */
watch(
    () => user.value.city_id,
    (newValue, oldValue) => {
        locationStore.getDistricts(newValue);
        if (newValue) {
            setTimeout(function () {
                districts.value.toggleShow(true);
            }, 200);
        }
    }
);

watch(
    () => user.value.district_id,
    (newValue, oldValue) => {
        locationStore.getWards(newValue);
        if (newValue) {
            setTimeout(function () {
                wards.value.toggleShow(true);
            }, 200);
        }
    }
);

const addBank = () => {
    user.value.banks.data.push({
        bank_id: null,
        bank_number: "",
        bank_username: "",
    });
};

// const deleteBank = (index) => {
//     user.value.banks.data.splice(index, 1);
// };

const save = () => {
    console.log(user.value);
    if (user.value.uuid) {
        userStore.updateData(user.value.uuid, user.value);
    } else {
        userStore.createData(user.value);
    }
};

const getData = async (id) => {
    await userStore.showData(props.id);
};

const changePassword = () => {
    console.log("changer");
    user.value.password = randomPassword(14);
};

onBeforeMount(async () => {
    if (props.id) {
        getData(props.id);
    }
    departmentStore.getData({ per_page: 100 });
    locationStore.getCountries();
    locationStore.getCities();
    bankStore.getData({ per_page: 200, paginate: 0 });
});
</script>
<style lang=""></style>
