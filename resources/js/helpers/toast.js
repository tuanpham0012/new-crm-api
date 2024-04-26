import Swal from 'sweetalert2'
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
});
export const successMessage = (message) => Toast.fire({
    icon: "success",
    title: message
});

export const errorMessage = (message) => Toast.fire({
    icon: "error",
    title: message
});