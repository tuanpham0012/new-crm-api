<template lang="">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div
                    class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3"
                >
                    <h6>Danh sách bộ phận</h6>

                    <button class="btn btn-sm btn-primary" @click="departmentStore.toggleModal(true)">
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
                                        <th>Tên</th>
                                        <th>Show</th>
                                        <th class="text-center">Up</th>
                                        <th class="text-center">Down</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(item, index) in departments"
                                        :key="index"
                                        :class="{
                                            'active':
                                                selectItem &&
                                                item.uuid === selectItem.uuid,
                                            disabled: item.parent_id === null,
                                        }"
                                        @click="toggleSelectItem(item)"
                                    >
                                        <td class="w-75px text-center">
                                            {{ index + 1 }}
                                        </td>
                                        <td class="w-175px">
                                            {{ item.code }}
                                        </td>
                                        <td>{{ item.name }}</td>
                                        <td>{{ item.name }}</td>
                                        <td>{{ item.name }}</td>
                                        <td>{{ item.name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <DepartmentModal :id="department" v-if="showModal" @close="departmentStore.toggleModal(false)"></DepartmentModal>
</template>
<script setup>
import { ref, computed, onBeforeMount } from "vue";
import DepartmentModal from "./DepartmentModal.vue";
import { useDepartmentStore } from "@store/department.js";
const departmentStore = useDepartmentStore();

const departments = computed(() => {
    return departmentStore.$state.departments.data ?? [];
});

const showModal = computed(() => {
    return departmentStore.$state.showModal ?? false;
});

const getData = () => {
    departmentStore.getData();
};

onBeforeMount(() => {
    getData();
});

const department = ref(null);
</script>
<style lang=""></style>
