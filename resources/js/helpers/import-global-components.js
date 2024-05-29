/**
 * client components
 */
import Department from '@page/department/Department.vue'
import User from '@page/user/User.vue'
import ChatBot from '@page/ai/ChatBot.vue'


import Loading from "@component/loadings/BaseLoading.vue"
import Pagination from "@component/pagination/BasePagination.vue"

/** end register component */



/** end register component */

const globalComponent = {
    Department,
    Loading,
    User,
    Pagination,
    ChatBot
}
export default globalComponent
