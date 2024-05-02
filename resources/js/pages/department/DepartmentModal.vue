<template lang="">
    <model :title="!id ? 'Thêm mới phòng ban' : 'Cập nhật phòng ban'" modal-size="modal-lg" @close="() => { emits('close')}">
        <template #body>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label
                                for="parent_id"
                                class="form-label"
                                >Danh mục cha</label
                            >
                        </div>
                        <div class="col-sm-12">
                            <select
                                class="form-select"
                                id="parent_id"
                                v-model="department.parent_id"
                            >
                                <option v-for="(item, index) in departments" :key="index" :value="item.id" :selected="item.code == 'ROOT'" :class="'ps-' + ((item.depth) * 2)"><span v-for="(index) in item.depth">.</span>{{ item.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="col-sm-12">
                            <label for="code" class="form-label"
                                >Mã bộ phận</label
                            >
                        </div>
                        <div class="col-sm-12">
                            <input
                                type="text"
                                class="form-control form-control-sm disabled"
                                id="code"
                                :disabled="department.uuid"
                                placeholder="Nhập mã bộ phận..."
                                v-model="department.code"
                            />
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="col-sm-12">
                            <label for="code" class="form-label"
                                >Tên bộ phận</label
                            >
                        </div>
                        <div class="col-sm-12">
                            <input
                                type="text"
                                class="form-control form-control-sm disabled"
                                id="code"
                                placeholder="Nhập tên bộ phận..."
                                v-model="department.name"
                            />
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
                                v-model="department.note"
                            ></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6 form-check mb-3 ms-3">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="is_use"
                            v-model="department.status"
                        />
                        <label class="form-check-label mt-1" for="is_use">
                            Sử dụng
                        </label>
                    </div>
                </div>
            </div>
        </template>
<template #footer>
            <button class="btn btn-sm btn-success" @click="save()">Lưu lại</button>
            <button class="btn btn-sm btn-secondary" @click="() => { emits('close')}">Đóng</button>
        </template>
</model>
</template>
<script setup>
import { reactive, computed, onBeforeMount, watch, ref } from 'vue'
import Model from "@component/modals/BaseModal.vue";
import { useDepartmentStore } from '@store/department.js'
import { textCode, removeVietnameseTones } from '@/services/utils.js'

/**
 * variable
 */
const props = defineProps({
    id: {
        type: [Number, String],
        default: null,
    },
});

const emits = defineEmits(['close']);

const departmentStore = useDepartmentStore();

const newDepartment = reactive({
    id: null,
    uuid: null,
    code: '',
    name: '',
    note: '',
    parent_id: 1,
    status: true,
})

const departments = computed(() => {
    return departmentStore.$state.departments.data ? departmentStore.$state.departments.data.filter( (x) => x.code !== department.value.code) : [];
});

const department = computed(() => {
    return props.id && departmentStore.$state.department ? departmentStore.$state.department : newDepartment;
});

watch(() => department.value.code, (newVal, oldVal) => {
    department.value.code = textCode(removeVietnameseTones(newVal)).toUpperCase()
})

/**
 * function
 */
const save = () => {
    console.log(department.value);
    if (department.value.uuid) {
        console.log(department);
        departmentStore.updateData(department.value.uuid, department.value)
    } else {
        departmentStore.createData(department.value)
    }
}

const getData = async (id) => {
    await departmentStore.showData(props.id)
}

onBeforeMount( async() => {
    if (props.id) {
        await getData(props.id)
    }
})

</script>
<style lang=""></style>
