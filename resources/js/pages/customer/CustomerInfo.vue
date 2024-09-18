<template>
    <div class="row col-12">
        <div class="col-5">
            <div class="card">
                <div class="card-header">Thông tin chung</div>
            </div>
        </div>
        <div class="col-7">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-underline">
                        <li
                            v-for="(item, index) in mainTab"
                            :key="index"
                            class="nav-item px-3"
                            @click="toggleTab(index)"
                        >
                            <a
                                class="nav-link cursor-pointer p-0"
                                :class="{ active: index == tabIndex }"
                                >{{ item.name }}</a
                            >
                        </li>
                    </ul>
                    <!-- <component v-bind:is="currentTabComponent"></component> -->
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { ref, reactive } from "vue";


const mainTab = ref([
    { id: 1, name: "Hoạt động" },
    { id: 2, name: "Cuộc gọi" },
    { id: 3, name: "SMS" },
    { id: 4, name: "Email" },
]);

const tabIndex = ref(0)
</script>
<style lang=""></style>
