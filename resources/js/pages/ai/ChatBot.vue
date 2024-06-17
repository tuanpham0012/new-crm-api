<template lang="">
    <div class="container-fluid w-[800px] m-auto bg-white max-w-[1200px] pt-3 pb-3">
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
                <div class="content" >
                    <div v-if="item.image">
                        <img :src="item.image" class="bg-white px-2 py-1" />
                    </div>
                    <p v-if="item.message">{{ item.message }}</p>
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
        <div>
            <img :src="img" class="max-h-60" />
        </div>
        <div class="my-3 w-[800px] m-auto">
            <input class="form-control" type="file" id="formFile" hidden @change="sendImage($event)">
            </div>
        <div class="w-[800px] m-auto d-flex items-center my-3">

            <textarea
                v-model="content"
                class="form-control"
                rows="4"
                v-on:keypress.enter="sendData()"
            >
            </textarea>
            <div>
                <label class="btn btn-icon btn-sm m-2 p-0" for="formFile">
                    <i class="fa fa-film" aria-hidden="true"></i>
                </label>
                <button class="btn btn-sm mx-2 btn-outline-success btn-icon" @click="sendData()">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
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

const img = ref(null)

const content = ref("");

const dataImg = ref(null)

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
    content.value = "";
}, { deep: true});

const sendImage = (event) => {
    const file = event.target.files[0];
    const theReader = new FileReader();
      // Nhớ sử dụng async/await để chờ khi đã convert thành công image sang base64 thì mới bắt đầu gán cho biến newImage
      // đây là 1 kinh nghiệm của mình khi upload multiple ảnh
      theReader.onloadend = async () => {
        img.value = await theReader.result;
      };
      theReader.readAsDataURL(file);
    // img.value = URL.createObjectURL(event.target.files[0]);
    // console.log(event.target.files[0]);
}

const getData = async () => {
    await chatBotStore.startChat();
};

const sendData = async () => {
    await chatBotStore.sendData(content.value, img.value);
    content.value = "";
    img.value = null;
};
onBeforeMount(() => {
    // getData();
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
        border: 1px solid #b4b4b4;
    }
}

.chat-user {
    width: 100%;
    justify-content: flex-end;
    .content {
        background-color: #6380c0;
        border-radius: 8px;
        margin: 0.875rem;
        max-width: 500px;
        p {
            text-align: end;
            color: #fff;
            padding: 0.875rem;

        }
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
