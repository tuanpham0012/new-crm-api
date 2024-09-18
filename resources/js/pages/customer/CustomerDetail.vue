<template>
    <model
        :title="'Cập nhật khách hàng'"
        modal-size="modal-fullscreen"
        @close="
            () => {
                emits('close');
            }
        "
    >
        <template #body>
            <div class="px-3">
                <ul class="nav nav-underline mb-3 px-3">
                    <li
                        v-for="(item, index) in mainTab"
                        :key="index"
                        class="nav-item px-3    "
                        @click="toggleTab(index)"
                    >
                        <a
                            class="nav-link cursor-pointer"
                            :class="{ active: index == tabIndex }"
                            >{{ item.name }}</a
                        >
                    </li>
                </ul>
                <component v-bind:is="currentTabComponent"></component>
            </div>
        </template>
    </model>
</template>
<script setup>
import { ref, reactive } from "vue";
import Model from "@component/modals/BaseModal.vue";
import CustomerInfo from "./CustomerInfo.vue";
import CustomerInvoice from "./CustomerInvoice.vue";
import CustomerQuote from "./CustomerQuote.vue";
import CustomerTransaction from "./CustomerTransaction.vue";

const mainTab = ref([
    { id: 1, name: "Chung" },
    { id: 2, name: "Các hóa đơn" },
    { id: 3, name: "Các giao dịch" },
    { id: 4, name: "Các báo giá" },
]);

const tabIndex = ref(0);
var currentTabComponent = CustomerInfo;

const toggleTab = (index) => {
    tabIndex.value = index;
    switch (index) {
        case 0:
            currentTabComponent = CustomerInfo;
            break;
        case 1:
            currentTabComponent = CustomerInvoice;
            break;
        case 2:
            currentTabComponent = CustomerTransaction;
            break;
        case 3:
            currentTabComponent = CustomerQuote;
            break;
        default:
            currentTabComponent = CustomerInfo;
            break;
    }
};
</script>
<style lang="scss" scoped>
.modal-fullscreen {
    width: 90vw;
    max-width: none;
    height: 100%;
    margin: 0;
}
</style>
