/**
 * client components
 */
import Department from '@page/department/Department.vue'
import User from '@page/user/User.vue'
import Customer from '@page/customer/Customer.vue'


import ChatBot from '@page/ai/ChatBot.vue'

import Loading from "@component/loadings/BaseLoading.vue"
import Pagination from "@component/pagination/BasePagination.vue"
import SelectSearch from "@component/input-form/SelectSearch.vue"
import SelectSearchUser from "@component/input-form/SelectSearchUser.vue"
import Feedback from "@component/input-form/Feedback.vue"

/** end register component */



/** end register component */

const globalComponent = {
    Department,
    User,
    Customer,


    Loading,
    Pagination,
    ChatBot,
    SelectSearch,
    Feedback,
    SelectSearchUser

}
export default globalComponent
