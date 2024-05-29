<template lang="">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div
                    class="card-header d-flex justify-content-end align-items-center flex-wrap gap-3"
                >
                    <button class="btn btn-sm btn-primary" @click="toggleShowModal()">
                        <i class="feather icon-plus"></i>
                        Thêm
                    </button>
                </div>
                <div class="col-12">
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                      <tr>
                                        <th class="text-center">#</th>
                                        <th>Mã</th>
                                        <th>Tên phòng ban</th>
                                        <th>Ghi chú</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(item, index) in departments"
                                        :key="index"
                                        :class="{
                                            'active': item.uuid === uuid,
                                            'disabled': item.parent_id === null,
                                        }"
                                    >
                                        <td class="w-[5%] min-w-[75px] text-center">
                                            {{ index + 1 }}
                                        </td>
                                        <td class="min-w-[200px] w-[25%]">
                                            <span v-for="(index) in item.depth">-</span> {{ item.code }}
                                        </td>
                                        <td class="min-w-[250px] w-[30%]">{{ item.name }}</td>
                                        <td class="min-w-[300px] w-[40%]">{{ item.note }}</td>
                                        <td class="min-w-[100px] text-center">
                                            <button class="btn btn-sm btn-icon w-[25px] h-[25px] hover:scale-125" @click="toggleShowModal(item.uuid)">
                                                 <i class="fas fa-edit text-green-400" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <DepartmentModal :id="uuid" v-if="showModal" @close="toggleCloseModal()"></DepartmentModal>

</template>
<script setup>
import { ref, computed, onBeforeMount, defineAsyncComponent } from "vue";
import DepartmentModal from "./DepartmentModal.vue";
import { useDepartmentStore } from "@store/department.js";
import loading from "@component/loadings/BaseLoading.vue";
const departmentStore = useDepartmentStore();
import Swal from 'sweetalert2'

const uuid = ref(null);

const departments = computed(() => {
    return departmentStore.$state.departments.data ?? [];
});

const showModal = computed(() => {
    return departmentStore.$state.showModal ?? false;
});

const toggleShowModal = (id = null) => {
    uuid.value = id;
    departmentStore.toggleModal(true)
}

const toggleCloseModal = () => {
    uuid.value = null;
    getData();
    departmentStore.toggleModal(false)
}

const getData = () => {
    departmentStore.getData();
};

onBeforeMount(() => {
    getData();
});

const department = ref(null);
</script>
<style lang=""></style>
