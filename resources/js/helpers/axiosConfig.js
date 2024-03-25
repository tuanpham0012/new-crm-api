import axios from "axios";

const headers= {
    'Content-type': 'application/json',
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
        // console.log('send Data');
        // console.log('params', response.params);
        return response;
    },
    (error) => {
        // console.log('err Data');
        return Promise.reject(error);
    }
)

http.interceptors.response.use(response => {
    // console.log("success: ", response);
    return response;
}, error => {
    console.log("error:", error);
    return Promise.reject(error);
});

export const getList = (url, params, header= null) => {
    return http({
        url: url,
        method: "GET",
        params: params,
        headers: {
            // ...this.headers,
            ...header,
        }
    });
}

export const create = (url, data, header= null) => {
    return http({
        url: url,
        method: "POST",
        data: data,
        headers: {
            // ...this.headers,
            ...header,
        }
    });
}

export const show = (url, params, header= null) => {
    return http({
        url: url,
        method: "GET",
        params: params,
        headers: {
            // ...this.headers,
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
            ...header,
        }
    });
}

export const destroy = (url, header= null) => {
    return http({
        url: url,
        method: "DELETE",
        headers: {
            // ...this.headers,
            ...header,
        }
    });
}
