import Swal from 'sweetalert/dist/sweetalert.min.js'
export const sweetAlertMessage = {
    messageSuccess: (message) => {
        return Swal({
            icon: 'success',
            title: 'Thành công',
            text: message,
            customClass: {
                confirmButton: 'btn btn-success'
            }
        });
    },
    messageWarning: (message) => {
        return Swal.fire({
            title: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Xác nhận',
            cancelButtonText: 'Hủy bỏ',
            customClass: {
                confirmButton: 'btn btn-sm btn-primary btn-active-light',
                cancelButton: 'btn btn-secondary btn-sm btn-active-danger'
            },
            buttonsStyling: false
        })
    },
    errorAlert: (message) => {
        return Swal.fire({
            icon: 'error',
            title: 'Thất bại',
            text: message,
            customClass: {
                confirmButton: 'btn btn-danger'
            }
        });
    }
}
