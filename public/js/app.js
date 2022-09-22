const toasDefault = $('#toastDefault');

if (toasDefault.length) {
    const toast = new bootstrap.Toast(toasDefault)
    toast.show();
}
