<script setup>
import { ref, watch, computed, onMounted, onBeforeMount } from 'vue';
import debounce from 'lodash.debounce'
import { removeVietnameseTones } from '../../../services/utils'
import { storeToRefs } from 'pinia';

const props = defineProps({
    setNullValue: {
        type: Boolean,
        default: true,
    },
    placeholder: {
        type: String,
        default: '--Tất cả--',
    },
    keyValue: {
        type: String,
        default: 'id',
    },
    keyDisplay: {
        type: [String, Array],
        default: 'id',
    },
    keyShow: {
        type: String,
        default: '',
    },
    listData: {
        type: Array,
        default: function () {
            return []
        }
    },
    prefix: {
        type: String,
        default: '-'
    },
    modelValue: {
        type: [String, Number],
        default: 0
    },
    notValue: {
        type: Array,
        default: [],
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    idElement: {
        type: [String, Number],
        default: function () {
            let result = '';
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            const charactersLength = characters.length;
            let counter = 0;
            while (counter < 24) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
                counter += 1;
            }
            return result;
        }
    },
    idElementList: {
        type: [String, Number],
        default: function () {
            let result = '';
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            const charactersLength = characters.length;
            let counter = 0;
            while (counter < 24) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
                counter += 1;
            }
            return result;
        }
    }
})

const emits = defineEmits(['search-data', "update:modelValue", 'changDataSelect'])

// const dataSelect = ref(props.listData.find(x => x[props.keyValue] == props.modelValue));

const dataSelect = ref(props.listData.find(x => x[props.keyValue] == props.modelValue));

const searchData = ref('');

const listData = computed(() => {
    console.log(props.listData);
    return props.listData ? props.listData.filter(e => e[keyDisplay()] ? removeVietnameseTones(e[keyDisplay()]).toLowerCase().includes(removeVietnameseTones(searchData.value.toLowerCase())) : false) : [];
});

const showList = ref(false);

const top = ref(0);
const left = ref(0);

const keyDisplay = () => {
    if (props.keyShow.length > 0) {
        return props.keyShow;
    }
    if (typeof (props.keyDisplay) === 'string') {
        return props.keyDisplay;
    }
    return props.keyDisplay[0];
}

watch(() => props.listData, (newValue, oldValue) => {
    dataSelect.value = newValue.find(x => x[props.keyValue] == props.modelValue);

});

watch(() => props.modelValue, (newValue, oldValue) => {
    // console.log(props.listData.find(x => x[props.keyValue] == newValue));
    dataSelect.value = props.listData.find(x => x[props.keyValue] == newValue)
});

watch(searchData, debounce((newValue, oldValue) => {
    emits('search-data', newValue)
}, 1))

watch(dataSelect, (newValue, oldValue) => {
    emits("update:modelValue", newValue == null ? null : newValue[props.keyValue]);
})

const toggleShow = (state = null) => {
    if (state === null) {
        showList.value = !showList.value;
    }
    else {
        showList.value = state;
    }
    setTimeout(function () {
        const e = document.getElementById(props.idElementList);
        if (e) {
            e.scrollIntoView();
        }
    }, 10);
    // position();
}

const setDataSelect = (data) => {
    showList.value = !showList.value;
    if (data != null) {
        dataSelect.value = data;
    } else {
        dataSelect.value = null;
    }
    emits('changDataSelect', data)
}

const position = () => {
    let elem = document.getElementById(props.idElement);
    if (elem) {
        let rect = elem.getBoundingClientRect();
        top.value = rect.top + 30;
        left.value = rect.left;
        showList.value = false;
    }
}

onMounted(() => {
    // const elements = document.querySelector('.table-scroll-sm');
    // const element2s = document.querySelector('.table-scroll');
    // // and then make each element do something on scroll
    // if (elements) {
    //     elements.addEventListener("scroll", position);
    // }
    // if (element2s) {
    //     element2s.addEventListener("scroll", position);
    // }
    // window.addEventListener("scroll", position);
    // window.addEventListener("resize", position);
    var divs = document.getElementsByTagName("div");
    for (var i = 0; i < divs.length; i++) {
        //do something to each div like
        divs[i].addEventListener("scroll", position);
        new ResizeObserver(position).observe(divs[i])
    }
    position();
})


</script>

<template>
    <div v-click-outside="() => toggleShow(false)">
        <div class="box">

            <div class="select-box" :class="{ 'active': showList, 'disabled': props.disabled }">
                <div class="selected break-text" :id="props.idElement" @click="toggleShow()"
                     :class="{ 'focus': showList == true }" :title="dataSelect != null && keyDisplay() in dataSelect ?
                        dataSelect[keyDisplay()] : ''">
                    <span class="content" style="white-space: nowrap;">{{ dataSelect != null && keyDisplay() in dataSelect ?
                        dataSelect[keyDisplay()] :
                        props.placeholder }}</span>
                    <span class="icon" v-if="!disabled"><i class="fa-solid fa-chevron-right fs-8"></i></span>

                </div>
                <div class="options-container" v-if="showList" :style="{ top: top + 'px', left: left + 'px' }">

                    <div class="search-box">
                        <input type="text" placeholder="Tìm kiếm..." v-model="searchData" />
                    </div>
                    <div class="list">
                        <div class="option" id="1" @click="setDataSelect(null)" v-if="listData && listData.length > 0">
                            {{ props.placeholder }}
                        </div>
                        <div class="option"
                             v-for="(item, index) in listData.filter(item => props.notValue.includes(item[props.keyValue]) == false)"
                             :id="dataSelect && item[props.keyValue] == dataSelect[props.keyValue] ? idElementList : null"
                             :key="index"
                             :class="{ 'active': dataSelect && item[props.keyValue] == dataSelect[props.keyValue] }"
                             @click="setDataSelect(item)">
                            <span v-if="typeof (props.keyDisplay) === 'string'">{{ item[props.keyDisplay] }}</span>
                            <span v-else>
                                <span v-for="(key, i) in props.keyDisplay" :key="i"> {{ item[key] }} <span
                                    v-if="i < props.keyDisplay.length - 1">{{ props.prefix }}</span>
                                </span>
                            </span>
                        </div>
                        <div class="option disabled" v-if="listData.length == 0">
                            Không có dữ liệu
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
.select-box {
    position: relative;
    width: auto;
    flex-direction: column;

    .options-container {
        position: fixed;
        top: 700px;
        left: 100px;
        background: rgb(255, 255, 255);
        width: max-content;
        max-width: 325px;
        opacity: 1;
        border-radius: 4px;
        overflow: hidden;
        box-sizing: content-box;
        order: 1;
        color: rgb(56, 52, 52);
        z-index: 100;
        border: 1px solid #ebebeb;
        box-shadow: 0px 10px 70px 4px rgba(0, 0, 0, 0.13);

        .list {
            max-height: 250px;
            overflow: auto;
            width: 100%;
            overflow-x: hidden;
        }
    }
}

.select-box .option {
    padding: 6px 8px;
    cursor: pointer;
    text-align: left;
    font-size: 13px;
}

.selected {
    display: flex;
    align-items: center;
    cursor: pointer;
    padding: 8px 24px 8px 8px;
    width: 100%;
    max-height: 28px;
    border: 1px solid var(--bs-gray-300);
    border-radius: 0.475rem;
    margin-bottom: 1px;
    color: rgb(56, 52, 52);
    position: relative;
    order: 0;
    box-shadow: 0px 10px 70px 4px rgba(0, 0, 0, 0.13);

    .content {
        width: 100% !important;
        height: 28px;
        line-height: 28px;
        overflow: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 1;
        /* number of lines to show */
        line-clamp: 1;
        -webkit-box-orient: vertical;
    }

    &.focus {
        background-color: rgb(255, 255, 255);
    }
}

.option {
    &.active {
        background: #2c44b0;
        border-radius: 3px;
        color: #ffffff !important;
        pointer-events: none;
    }

    &.disabled {
        background: #f0f0f0;
        pointer-events: none;
    }
}

.select-box .option:hover {
    background: #2c44b0;
    border-radius: 3px;
    color: #ffffff;
}

.search-box {
    width: 100%;
    padding: 6px;

    input {
        width: 100%;
        padding: 6px 6px;
        font-family: Roboto, sans-serif;
        font-size: 13px;
        background-color: #ffffff;
        border: 1px solid #c5c5c5;
        border-radius: 4px;
    }
}

.icon {
    position: absolute;
    right: 10px;
    top: 20%;
}

.active {
    .icon {
        transform: rotate(90deg);
        transition: all 0.1s;
    }
}

.box {
    .disabled {
        // background-color: #e7e3e3 !important;
        pointer-events: none;

        .selected {
            background-color: #e0e4ec !important;
        }
    }
}
</style>
