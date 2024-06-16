import { defineStore } from "pinia";
import { getList, update, create, destroy, show } from "@/helpers/axiosConfig.js";
import { successMessage } from '@/helpers/toast'
const url = (id = null) => {
    return '/api/chat-bot';
};

export const useChatBotStore = defineStore("chatBotStore", {
    state: () => ({
        data: [],
        uuid: null,
        loading: false,
    }),

    getters: {
        getParentDepartmentData: () => this.departments.filter((item) => (item.parent_id === null)),
    },

    actions: {
        sendData(message, img = null) {

            this.loading = true;
            let type = 'text'
            if(img){
                type = 'image'
            }
            console.log(type);
            this.pushData(message, img, 'user', type)
            create(url(), {content: message, image: img, uuid: this.uuid, histories: this.data, type: type}
                ).then((res) => {
                    console.log(res.data);
                    var msg = new SpeechSynthesisUtterance();
                    msg.text = res.data.data.message;
                    speechSynthesis.speak(msg);
                    this.data.push(res.data.data)
                    this.loading = false;
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
        },
        startChat(params = {}) {
            this.uuid = this.generateUniqSerial();
            this.pushData('Xin chào!', 'user')
            this.loading = true;
            create(url(), {
                uuid: this.uuid,
                content: 'Xin chào!'
            }
                ).then((res) => {
                    console.log(res.data);
                    this.data.push(res.data.data)
                    this.loading = false;
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
        },

        generateUniqSerial() {
            return 'xxxx-xxxx-xxx-xxxx'.replace(/[x]/g, (c) => {
                const r = Math.floor(Math.random() * 16);
                return r.toString(16);
          });
        },

        pushData(message, image = null, role = 'user', type = 'text') {
            this.data.push({
                message: message,
                image: image,
                role: role,
                type: type
            })
        }
    },
});
