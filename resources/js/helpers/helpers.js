export const printfValueArray = (arr) => {
    let result = '';
    for(let i= 0; i < arr.length; i++) {
        result += arr[i] + '\n';
    }
    return result
}
