<template lang="">
    <div class="container-fluid bg-white max-w-[1200px] pt-3">
        <div class="chat-body" id="chat-body">
            <div
                class="message"
                v-for="(item, index) in chats"
                :key="index"
                :class="{
                    'chat-model': item.role == 'model',
                    'chat-user': item.role == 'user',
                }"
                :focus="index == chats.length - 1"
            >
                <div class="content">
                    <p>{{ item.message }}</p>
                </div>
            </div>
            <div class="message chat-model" v-if="loading">
                <div class = "content">
                    <div class="loader">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                </div>

            </div>
        </div>
        <div class="w-[800px] m-auto d-flex items-center mt-3">
            <textarea
                v-model="content"
                class="form-control"
                rows="4"
                v-on:keyup.enter="sendData()"
            >
            </textarea>
            <div>
                <button class="btn btn-success btn-sm mx-2" @click="sendData()">
                send
            </button>
            </div>

        </div>

    </div>
</template>
<script setup>
import { ref, computed, onBeforeMount, reactive, watch } from "vue";
import { useChatBotStore } from "@store/chat-bot.js";

const chatBotStore = useChatBotStore();

const chats = computed(() => {
    return chatBotStore.$state.data;
});

const content = ref("");

const uuid = computed(() => {
    return chatBotStore.$state.uuid;
});

const loading = computed(() => {
    return chatBotStore.$state.loading;
});

watch( () => chats.value, () => {
    console.log('change');
    setTimeout(function(){
        var objDiv = document.getElementById("chat-body");
    objDiv.scrollTop = 9999999999;
    },100)

}, { deep: true});

const getData = async () => {
    await chatBotStore.startChat();
};

const sendData = async () => {
    await chatBotStore.sendData(content.value);
    content.value = "";
};
onBeforeMount(() => {
    getData();
});
</script>
<style lang="scss" scoped>
.chat-body {
    max-width: 800px;
    margin: 0 auto;
    height: 70vh;
    overflow: auto;
    background-color: #faf8f8;
}
.message {
    width: 100%;
    display: flex;


}
.chat-model {
    width: 100%;
    justify-content: flex-start;

    .content {
        background-color: #fff;
        padding: 0.875rem;
        border-radius: 8px;
        margin: 0.875rem;
        max-width: 500px;
    }
}

.chat-user {
    width: 100%;
    justify-content: flex-end;
    .content {
        background-color: #acd7f3;
        padding: 0.875rem;
        border-radius: 8px;
        margin: 0.875rem;
        max-width: 500px;
    }
}

.loader {
  text-align: center;
}
.loader span {
  display: inline-block;
  vertical-align: middle;
  width: 15px;
  height: 15px;
  background: black;
  border-radius: 100%;
  animation: loader 0.8s infinite alternate;
}
.loader span:nth-of-type(2) {
  animation-delay: 0.2s;
}
.loader span:nth-of-type(3) {
  animation-delay: 0.6s;
}
@keyframes loader {
  0% {
    opacity: 0.9;
    transform: scale(0.5);
  }
  100% {
    opacity: 0.1;
    transform: scale(1);
  }
}


</style>
