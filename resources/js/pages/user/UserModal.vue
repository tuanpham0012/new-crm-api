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
                        <div class="col-sm-12">
                            <select class="form-select" id="parent_id">
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
                                id="code"
                                disabled
                                placeholder="Mã nhân viên..."
                                v-model="user.code"
                            />
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="code" class="form-label"
                                >Tên nhân viên</label
                            >
                        </div>
                        <div class="col-sm-12">
                            <input
                                type="text"
                                class="form-control form-control-sm disabled"
                                id="name"
                                placeholder="Nhập tên nhân viên..."
                                v-model="user.name"
                            />
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="code" class="form-label">Email</label>
                        </div>
                        <div class="col-sm-12">
                            <input
                                type="text"
                                class="form-control form-control-sm disabled"
                                id="email"
                                placeholder="Nhập email..."
                                v-model="user.email"
                            />
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="code" class="form-label"
                                >Mật khẩu</label
                            >
                        </div>
                        <div class="col-sm-9 input-group disabled">
                            <input
                                type="text"
                                class="form-control form-control-sm"
                                id="password"
                                disabled
                                v-model="user.password"
                            />
                            <span
                                class="input-group-text"
                                @click="changePassword()"
                                ><i class="fa fa-refresh" aria-hidden="true"></i
                            ></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="code" class="form-label"
                                >Điện thoại</label
                            >
                        </div>
                        <div class="col-sm-12">
                            <input
                                type="text"
                                class="form-control form-control-sm disabled"
                                id="email"
                                placeholder="Nhập email..."
                                v-model="user.email"
                            />
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
                                id="email"
                                placeholder="Nhập email..."
                                v-model="user.birthday"
                            />
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="code" class="form-label"
                                >Giới tính</label
                            >
                        </div>
                        <select class="form-select" v-model="user.gender">
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
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="col-sm-2">
                            <label for="note" class="form-label">Địa chỉ</label>
                        </div>
                        <div class="col-sm-12">
                            <textarea
                                type="text"
                                class="form-control"
                                id="note"
                                rows="4"
                                placeholder="Nhập ghi chú..."
                                v-model="user.note"
                            ></textarea>
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
                                id="note"
                                rows="4"
                                placeholder="Nhập ghi chú..."
                                v-model="user.note"
                            ></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6 form-check mb-3 ms-3">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="is_use"
                            v-model="user.status"
                        />
                        <label class="form-check-label mt-1" for="is_use">
                            Sử dụng
                        </label>
                    </div>
                </div>
            </div>
            {{ user }}
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

const newUser = reactive({
    id: null,
    uuid: null,
    code: "",
    name: "",
    email: "",
    phone: "",
    birthday: moment(),
    address: "",
    nationality_id: null,
    gender: 0,
    status: 0,
    password: randomPassword(14),
    role_id: null,
    note: "",
    departments: [
        {
            id: null,
        },
    ],
});

const departments = computed(() => {
    return departmentStore.$state.departments.data && user.value.departments
        ? departmentStore.$state.departments.data.filter(
              (x) => !user.value.departments.some((i) => i.id === x.id)
          )
        : [];
});

const user = computed(() => {
    return props.id && userStore.$state.user ? userStore.$state.user : newUser;
});

/**
 * function
 */
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
    user.value.password = randomPassword(14);
};

onBeforeMount(async () => {
    if (props.id) {
        await getData(props.id);
    }
    departmentStore.getData({ per_page: 100 });
});
</script>
<style lang=""></style>
