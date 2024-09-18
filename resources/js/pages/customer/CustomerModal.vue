<template lang="">
    <model
        :title="!id ? 'Thêm mới khách hàng' : 'Cập nhật khách hàng'"
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
                            <label for="first_name" class="form-label"
                                >Họ</label
                            >
                        </div>
                        <div class="col-sm-12">
                            <input
                                type="text"
                                class="form-control form-control-sm"
                                :class="{ 'is-invalid': errors && errors.first_name }"
                                id="first_name"
                                v-model="customer.first_name"
                            />
                            <Feedback :errors="errors?.first_name" />
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="last_name" class="form-label"
                                >Tên</label
                            >
                        </div>
                        <div class="col-sm-12">
                            <input
                                type="text"
                                class="form-control form-control-sm"
                                :class="{ 'is-invalid': errors && errors.last_name }"
                                id="last_name"
                                v-model="customer.last_name"
                            />
                            <Feedback :errors="errors?.last_name" />
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3 row">
                        <div class="col-sm-12">
                            <label for="email" class="form-label">Ảnh</label>
                        </div>
                        <div class="col-sm-3">
                            <button
                                class="btn btn-secondary px-5"
                                @click="uploadModal = !uploadModal"
                            >
                                Tải ảnh
                            </button>
                        </div>
                        <div class="col-sm-9 d-flex gap-2 align-items-center">
                            <img
                                :src="customer.avatar"
                                class="img-radius w-[50px]"
                            />
                            <div class="d-flex" v-if="customer.file_name">
                                <p class="text-gray-600">{{ customer.file_name }}</p>
                                <button class="btn-close btn-sm" @click="deleteImage()"></button>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="birthday" class="form-label"
                                >Ngày sinh</label
                            >
                        </div>
                        <div class="col-sm-12">
                            <input
                                type="date"
                                class="form-control form-control-sm"
                                :class="{
                                    'is-invalid': errors && errors.birthday,
                                }"
                                id="birthday"
                                v-model="customer.birthday"
                            />
                            <Feedback :errors="errors?.birthday" />
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="gender" class="form-label"
                                >Giới tính</label
                            >
                        </div>
                        <select
                            class="form-select"
                            v-model="customer.gender"
                            id="gender"
                            :class="{ 'is-invalid': errors && errors.gender }"
                        >
                            <option selected :value="0">
                                Chọn giới tính
                            </option>
                            <option selected :value="1">
                                Nam
                            </option>
                            <option selected :value="2">
                                Nữ
                            </option>
                            <!-- <option
                                v-for="(item, index) in props.genders"
                                :key="index"
                                :value="index"
                            >
                                {{ item }}
                            </option> -->
                        </select>
                        <Feedback :errors="errors?.gender" />
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="type" class="form-label"
                                >Nhóm khách hàng</label
                            >
                        </div>
                        <select
                            class="form-select"
                            v-model="customer.type"
                            :class="{ 'is-invalid': errors && errors.type }"
                        >
                            <option selected :value="null">--Chọn --</option>
                            <option
                                v-for="(item, index) in props.types"
                                :key="index"
                                :value="index"
                            >
                                {{ item }}
                            </option>
                        </select>
                        <Feedback :errors="errors?.type" />
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="customer_source_id" class="form-label"
                                >Nguồn khách</label
                            >
                        </div>
                        <select
                            class="form-select"
                            v-model="customer.customer_source_id"
                            id="customer_source_id"
                            :class="{
                                'is-invalid':
                                    errors && errors.customer_source_id,
                            }"
                        >
                            <option selected :value="null">--Chọn --</option>
                            <option
                                v-for="(item, index) in props.sources"
                                :key="index"
                                :value="item.id"
                            >
                                {{ item.name }}
                            </option>
                        </select>
                        <Feedback :errors="errors?.customer_source_id" />
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="user_id" class="form-label"
                                >Người phụ trách</label
                            >
                        </div>
                        <select-search-user
                            :listData="users"
                            display="name"
                            placeholder="Chưa chọn"
                            v-model="customer.user_id"
                            src="avatar"
                            alias="email"
                        ></select-search-user>
                        <Feedback :errors="errors?.type" />
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="observer_id" class="form-label"
                                >Người giám sát</label
                            >
                        </div>
                        <select-search-user
                            :listData="users"
                            display="name"
                            placeholder="Chưa chọn"
                            v-model="customer.observer_id"
                            src="avatar"
                            alias="email"
                        ></select-search-user>
                        <Feedback :errors="errors?.type" />
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="tax_code" class="form-label"
                                >Mã số thuế</label
                            >
                        </div>
                        <div class="col-sm-12">
                            <input
                                type="text"
                                class="form-control form-control-sm"
                                :class="{ 'is-invalid': errors && errors.tax_code }"
                                id="tax_code"
                                v-model="customer.tax_code"
                            />
                            <Feedback :errors="errors?.tax_code" />
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="col-sm-12">
                            <label for="phone" class="form-label"
                                >Điện thoại</label
                            >
                            <button
                                class="btn btn-sm btn-icon text-primary"
                                @click="addContact('phone')"
                            >
                                <i class="fas fa-plus-circle fs-6"></i>
                            </button>
                        </div>
                        <div
                            class="row col-sm-12 mb-3"
                            v-for="(item, index) in customer.phones.data.filter(
                                (x) => x.deleted == false
                            )"
                            :key="index"
                        >
                            <div class="col-sm-6">
                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    :class="{
                                        'is-invalid':
                                            errors && errors[`phones.data.${index}.value`],
                                    }"
                                    :id="'phones' + index"
                                    v-model="item.value"
                                />
                                <Feedback :errors="errors ? errors[`phones.data.${index}.value`] : []" />
                            </div>
                            <div class="col-sm-4">
                                <select
                                    class="form-select"
                                    v-model="item.type2"
                                >
                                    <option :value="null">--Chọn--</option>
                                    <option
                                        v-for="(item, index) in contactType
                                            .phone.type"
                                        :key="index"
                                        :value="item.key"
                                    >
                                        {{ item.value }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <button
                                    class="btn btn-sm btn-icon text-secondary"
                                    @click="deleteContact('phones', index)"
                                >
                                    <i class="fas fa-trash-alt fs-5"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="col-sm-12">
                            <label for="code" class="form-label">Email</label>
                            <button
                                class="btn btn-sm btn-icon text-primary"
                                @click="addContact('email')"
                            >
                                <i class="fas fa-plus-circle fs-6"></i>
                            </button>
                        </div>
                        <div
                            class="row col-sm-12 mb-3"
                            v-for="(item, index) in customer.emails.data.filter(
                                (x) => x.deleted == false
                            )"
                            :key="index"
                        >
                            <div class="col-sm-6">
                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    :class="{
                                        'is-invalid':
                                            errors && errors[`emails.data.${index}.value`],
                                    }"
                                    :id="'emails' + index"
                                    v-model="item.value"
                                />
                                <Feedback :errors="errors ? errors[`emails.data.${index}.value`] : []" />
                            </div>
                            <div class="col-sm-4">
                                <select
                                    class="form-select"
                                    v-model="item.type2"
                                >
                                    <option :value="null">--Chọn--</option>
                                    <option
                                        v-for="(item, index) in contactType
                                            .email.type"
                                        :key="index"
                                        :value="item.key"
                                    >
                                        {{ item.value }}
                                    </option>
                                </select>
                                <Feedback :errors="[]" />
                            </div>
                            <div class="col-sm-1">
                                <button
                                    class="btn btn-sm btn-icon text-secondary"
                                    @click="deleteContact('emails', index)"
                                >
                                    <i class="fas fa-trash-alt fs-5"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="col-sm-12">
                            <label for="code" class="form-label"
                                >Nhắn tin</label
                            >
                            <button
                                class="btn btn-sm btn-icon text-primary"
                                @click="addContact('message')"
                            >
                                <i class="fas fa-plus-circle fs-6"></i>
                            </button>
                        </div>
                        <div
                            class="row col-sm-12 mb-3"
                            v-for="(
                                item, index
                            ) in customer.messages.data.filter(
                                (x) => x.deleted == false
                            )"
                            :key="index"
                        >
                            <div class="col-sm-6">
                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    :class="{
                                        'is-invalid':
                                            errors && errors[`messages.data.${index}.value`],
                                    }"
                                    :id="'messages' + index"
                                    v-model="item.value"
                                />
                                <Feedback :errors="errors ? errors[`messages.data.${index}.value`] : []" />
                            </div>
                            <div class="col-sm-4">
                                <select
                                    class="form-select"
                                    v-model="item.type2"
                                >
                                    <option :value="null">--Chọn--</option>
                                    <option
                                        v-for="(item, index) in contactType
                                            .message.type"
                                        :key="index"
                                        :value="item.key"
                                    >
                                        {{ item.value }}
                                    </option>
                                </select>
                                <Feedback :errors="[]" />
                            </div>
                            <div class="col-sm-1">
                                <button
                                    class="btn btn-sm btn-icon text-secondary"
                                    @click="deleteContact('messages', index)"
                                >
                                    <i class="fas fa-trash-alt fs-5"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="col-sm-12">
                            <label for="code" class="form-label"
                                >Ngân hàng</label
                            >
                        </div>
                        <div class="row col-sm-12 mb-3">
                            <div class="col-sm-4">
                                <select
                                    class="form-select"
                                    v-model="customer.bank_id"
                                    :class="{
                                        'is-invalid': errors && errors.bank_id
                                    }"
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
                                <Feedback :errors="errors?.bank_id" />
                            </div>
                            <div class="col-sm-4">
                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    :class="{
                                        'is-invalid':
                                            errors && errors.bank_username,
                                    }"
                                    id="bank_username"
                                    placeholder="Nhập tên người nhận..."
                                    v-model="customer.bank_username"
                                />
                                <Feedback :errors="errors?.bank_username" />
                            </div>
                            <div class="col-sm-4">
                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    :class="{
                                        'is-invalid':
                                            errors && errors.bank_number,
                                    }"
                                    id="bank_number"
                                    placeholder="Nhập số tài khoản..."
                                    v-model="customer.bank_number"
                                />
                                <Feedback :errors="errors?.bank_number" />
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
                                    v-model="customer.city_id"
                                ></select-search>
                            </div>
                            <div class="col-sm-4">
                                <select-search
                                    :listData="location.districts"
                                    ref="districts"
                                    display="name"
                                    :disabled="customer.city_id ? false : true"
                                    placeholder="Chọn Quận/huyện"
                                    v-model="customer.district_id"
                                ></select-search>
                            </div>
                            <div class="col-sm-4">
                                <select-search
                                    :listData="location.wards"
                                    ref="wards"
                                    display="name"
                                    :disabled="
                                        customer.district_id ? false : true
                                    "
                                    placeholder="Chọn Phường/Xã"
                                    v-model="customer.ward_id"
                                ></select-search>
                            </div>
                            <div class="col-sm-12 py-3">
                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    :class="{
                                        'is-invalid': errors && errors.address,
                                    }"
                                    id="address"
                                    placeholder="Địa chỉ chi tiết"
                                    v-model="customer.address"
                                />
                                <Feedback :errors="errors?.address" />
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
                                v-model="customer.note"
                            ></textarea>
                            <Feedback :errors="errors?.note" />
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
    <UploadImageModal
        v-if="uploadModal"
        @uploadSuccess="upload"
        @close="uploadModal = !uploadModal"
    ></UploadImageModal>
</template>
<script setup>
import { reactive, computed, onBeforeMount, watch, ref } from "vue";
import Model from "@component/modals/BaseModal.vue";
import UploadImageModal from "@component/modals/UploadImageModal.vue";
import { useCustomerStore } from "@store/customer.js";
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
    types: {
        type: [Array],
        default: [],
    },
    sources: {
        type: [Array],
        default: [],
    },
});

const emits = defineEmits(["close"]);

const customerStore = useCustomerStore();
const userStore = useUserStore();
const bankStore = useBankStore();
const locationStore = useLocationStore();

const newCustomer = reactive({
    id: null,
    uuid: null,
    code: null,
    first_name: "",
    last_name: "",
    avatar: "",
    file_id: "",
    file_name: "",
    address: "",
    gender: 0,
    birthday: null,
    type: null,
    tax_code: "",
    bank_id: null,
    bank_number: "",
    bank_username: "",
    user_id: null,
    observer_id: null,
    city_id: null,
    district_id: null,
    ward_id: null,
    customer_source_id: null,
    portal_id: null,
    emails: {
        data: [
            {
                type: "email",
                type2: "work_email",
                value: "",
                deleted: false,
            },
        ],
    },
    phones: {
        data: [
            {
                type: "phone",
                type2: "company_phone",
                value: "",
                deleted: false,
            },
        ],
    },
    messages: {
        data: [
            {
                type: "message",
                type2: "facebook",
                value: "",
                deleted: false,
            },
        ],
    },
});

const districts = ref();
const wards = ref();
const uploadModal = ref(false);

const customer = computed(() => {
    return props.id && customerStore.$state.entry
        ? customerStore.$state.entry
        : newCustomer;
});

const users = computed(() => {
    return userStore.$state.users.data;
});

const contactType = computed(() => {
    return customerStore.$state.contactType;
});

const errors = computed(() => {
    return customerStore.$state.errors;
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
    () => customer.value.city_id,
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
    () => customer.value.district_id,
    (newValue, oldValue) => {
        locationStore.getWards(newValue);
        if (newValue) {
            setTimeout(function () {
                wards.value.toggleShow(true);
            }, 200);
        }
    }
);

const addContact = (type) => {
    switch (type) {
        case "email":
            customer.value.emails.data.push({
                type: "email",
                type2: "work_email",
                value: "",
                deleted: false,
            });
            break;
        case "phone":
            customer.value.phones.data.push({
                type: "phone",
                type2: "company_phone",
                value: "",
                deleted: false,
            });
            break;
        case "message":
            customer.value.messages.data.push({
                type: "message",
                type2: "facebook",
                value: "",
                deleted: false,
            });
            break;
        default:
            break;
    }
};

const deleteContact = (key, index) => {
    console.log(customer.value[key].data);
    customer.value[key].data.splice(index, 1);
};

const save = () => {
    if (customer.value.uuid) {
        // userStore.updateData(user.value.uuid, user.value);
    } else {
        customerStore.createData(customer.value);
    }
};

const upload = (result) => {
    customer.value.file_id = result.file_id;
    customer.value.avatar = result.url;
    customer.value.file_name = result.name;
    uploadModal.value = false;
};

const deleteImage = () => {
    customer.value.file_id = "";
    customer.value.avatar = "";
    customer.value.file_name = "";
}

const getData = async (id) => {
    await userStore.showData(props.id);
};

onBeforeMount(async () => {
    if (props.id) {
        getData(props.id);
    }
    locationStore.getCountries();
    locationStore.getCities();
    bankStore.getData({ per_page: 200, paginate: 0 });
    userStore.getData({paginate: 0});
});
</script>
<style lang=""></style>
