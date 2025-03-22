$(document).ready(() => {
    $('#userAuth').submit((e) => {
        e.preventDefault()
        let data = new FormData(e.currentTarget)
        sendAjax(dis.base_url + 'login/userAuth', data)
            .then(function (res) {
                if (res.response == 200) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Login Successful!',
                        showConfirmButton: false,
                        timer: 1500  // Adjust the timer duration (in milliseconds) as needed
                    }).then(function () {
                        window.location = base_url + 'login'
                    })
                }
                else {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: res.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
    })
})


function sendAjax(url, data = {}) {
    let promise = new Promise(function (resolve, reject) {
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            dataType: 'json',
            async: false,
            processData: false,
            contentType: false,
            beforeSend: function () { },
            success: function (data) {
                resolve(data)
            },
            error: function (xhr) {

            },
        });
    });
    return promise;
}