$(document).ready(function() {
    $('#contactForm').submit(function(e) {
        e.preventDefault();
        var data = new FormData(this);
        console.log(data);
        sendAjax(dis.base_url + 'home/send_email', data).then(function(res) {
            if (res.response == 200) {
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: res.message,
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops credentials',
                    text: res.message,
                });
            }
        });
    });
});
