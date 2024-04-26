import axios from "axios";

const headers = {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
}
const axiosDefaults = {
    headers
}
const http = axios.create(axiosDefaults)
    //register interceptor like this
http.interceptors.request.use(
    (response) => {
        // Do something before request is sent
        console.log('send Data:', response);
        if(response.headers.loading){
            document.body.classList.add("loading");
        }else{
            document.body.classList.remove("loading");
        }
        // console.log('params', response.params);
        return response;
    },
    (error) => {
        console.log('err Data');
        return Promise.reject(error);
    }
)

http.interceptors.response.use(response => {
    console.log("success: ", response);
    document.body.classList.remove("loading");
    return response;
}, error => {
    console.log("error:", error);
    document.body.classList.remove("loading");
    return Promise.reject(error);
});

export const getList = async (url, params, header = null) => {
    return await http({
        url: url,
        method: "GET",
        params: params,
        headers: {
            // ...this.headers,
            loading: true,
            ...header,
        }
    });
}

export const create = (url, data, header = null) => {
    return http({
        url: url,
        method: "POST",
        data: data,
        headers: {
            // ...this.headers,
            loading: false,
            ...header,
        }
    });
}

export const show = async(url, params = {}, header = null) => {
    return await http({
        url: url,
        method: "GET",
        params: params,
        headers: {
            // ...this.headers,
            loading: false,
            ...header,
        }
    });
}

export const update = (url, data, header = null) => {
    return http({
        url: url,
        method: "PUT",
        data: data,
        headers: {
            // ...this.headers,
            loading: false,
            ...header,
        }
    });
}

export const destroy = (url, header = null) => {
    return http({
        url: url,
        method: "DELETE",
        headers: {
            // ...this.headers,
            loading: false,
            ...header,
        }
    });
}