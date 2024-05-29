export const printfValueArray = (arr) => {
    let result = '';
    for(let i= 0; i < arr.length; i++) {
        result += arr[i] + '\n';
    }
    return result
}

export const randomPassword = (length = 8) => {
    var c = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
    var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
    var n = charset.length;
    var punctuation = "!@#$%&"
    var retVal = c.charAt(Math.floor(Math.random() * c.length))
    for (var i = 0; i < length-2; ++i) {
        retVal += charset.charAt(Math.floor(Math.random() * charset.length))
    }
    return retVal + punctuation.charAt(Math.floor(Math.random() * punctuation.length))
}
