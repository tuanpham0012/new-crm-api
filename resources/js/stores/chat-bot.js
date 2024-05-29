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
        sendData(message) {
            this.pushData(message, 'user')
            this.loading = true;
            create(url(), {content: message, uuid: this.uuid, histories: this.data}
                ).then((res) => {
                    console.log(res.data);
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

        pushData(message, role = 'user') {
            this.data.push({
                message: message,
                role: role
            })
        }
    },
});
