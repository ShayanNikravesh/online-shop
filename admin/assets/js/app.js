$('.summernote').summernote({
    height: 400,
    tabsize: 2
});

$('#datatable_products').DataTable({
    responsive: true
});

$('#datatable_brands').DataTable({
    responsive: true
});

$('div#upload_photo_products').dropzone({
    url: "/requests/PhotoProductRequest.php",
    paramName: "photo_product",
    maxFiles: 5,
    maxFilesize: 1, // MB
    addRemoveLinks: true,
    acceptedFiles: "image/*",
    params: {
        product_id: $('#input_product_id').val()
    },
    accept: function(file, done) {
        done();
    },
    error: function (file, resp) {
        let response = JSON.parse(resp);
        if (file.previewElement) {
            file.previewElement.classList.add("dz-error");
            if (typeof response !== "string" && response.message) {
                response = response.message;
            }
            for (let node of file.previewElement.querySelectorAll(
                "[data-dz-errormessage]"
            )) {
                node.textContent = response;
            }
        }
    },
});

$('div#upload_photo_articles').dropzone({
    url: "/requests/PhotoArticleRequest.php",
    paramName: "photo_article",
    maxFiles: 1,
    maxFilesize: 1, // MB
    addRemoveLinks: true,
    acceptedFiles: "image/*",
    params: {
        article_id: $('#input_article_id').val()
    },
    accept: function(file, done) {
        done();
    },
    error: function (file, resp) {
        let response = JSON.parse(resp);
        if (file.previewElement) {
            file.previewElement.classList.add("dz-error");
            if (typeof response !== "string" && response.message) {
                response = response.message;
            }
            for (let node of file.previewElement.querySelectorAll(
                "[data-dz-errormessage]"
            )) {
                node.textContent = response;
            }
        }
    },
});

$('div#upload_photo_manager').dropzone({
    url: "/requests/ProfilePhotoRequest.php",
    paramName: "photo_manager",
    maxFiles: 1,
    maxFilesize: 1, // MB
    addRemoveLinks: true,
    acceptedFiles: "image/*",
    params: {
        manager_id: $('#input_manager_id').val()
    },
    accept: function(file, done) {
        done();
    },
    error: function (file, resp) {
        let response = JSON.parse(resp);
        if (file.previewElement) {
            file.previewElement.classList.add("dz-error");
            if (typeof response !== "string" && response.message) {
                response = response.message;
            }
            for (let node of file.previewElement.querySelectorAll(
                "[data-dz-errormessage]"
            )) {
                node.textContent = response;
            }
        }
    },
});

$('div#upload_photo_banner').dropzone({
    url: "/requests/PhotoBannerRequest.php",
    paramName: "photo_banner",
    maxFiles: 5,
    maxFilesize: 1, // MB
    addRemoveLinks: true,
    acceptedFiles: "image/*",
    params: {
        banner_id: $('#input_banner_id').val()
    },
    accept: function(file, done) {
        done();
    },
    error: function (file, res) {
        let response;
        try {
            response = JSON.parse(res);
        } catch (e) {
            response = res;
        }
        if (file.previewElement) {
            file.previewElement.classList.add("dz-error");
            if (typeof response !== "string" && response.error) {
                response = message.error;
            } else if (typeof response !== "string" && response.message) {
                response = response.message;
            }
            for (let node of file.previewElement.querySelectorAll(
                "[data-dz-errormessage]"
            )) {
                node.textContent = response;
            }
        }
    },
});

$(document).on('submit', '#form_manager_login', function (event) {
    event.preventDefault();
    let email = $('input[name=email]').val();
    let password = $('input[name=password]').val();

    $.ajax({
        url: 'requests/AuthenticationRequest.php',
        method: 'post',
        dataType: 'json',
        data: {
            email: email,
            password: password,
            action: 'manager_login'
        },
        success: function (response) {
            Swal.fire({
                title: response.title,
                text: response.text,
                icon: response.type,
                confirmButtonText: 'متوجه شدم!',
            }).then(function () {
                if (response.status === 200) {
                    location.replace('/')
                }
            })
        },
        error: function (error) {
            console.log(error)
        },
    });
})

function AddManager(){

    let first_name = $('input[name=first_name]').val();
    let last_name = $('input[name=last_name]').val();
    let mobile = $('input[name=mobile]').val();
    let email = $('input[name=email]').val();
    let password = $('input[name=password]').val();
    let repassword = $('input[name=repassword]').val();
    let gender = $('select[name=gender]').val();
    let level = $('select[name=level]').val();

    $.ajax({
        url: 'requests/AddManagerRequest.php',
        method: 'post',
        dataType: 'json',
        data: {
            first_name,
            last_name,
            mobile,
            email,
            password,
            repassword,
            gender,
            level,
            action: 'create_manager'
        },
        success: function (response) {
            if (response.status === 401) {
                Swal.fire({
                    title: response.title,
                    html: response.messages,
                    icon: 'error',
                    confirmButtonText: 'متوجه شدم!',
                })
            }else {
                Swal.fire({
                    title: response.title,
                    text: response.text,
                    icon: response.type,
                    confirmButtonText: 'متوجه شدم!',
                })
                document.getElementById("form_insert_manager").reset();
            }
        },
        error: function (error) {
            console.log(error)
        },
    });

}

function AddArticle(){

    let first_name = $('input[name=first_name]').val();
    let last_name = $('input[name=last_name]').val();
    let title = $('input[name=title]').val();
    let english_title = $('input[name=english_title]').val();
    let article = $('textarea[name=article]').val();

    $.ajax({
        url: 'requests/AddArticleRequest.php',
        method: 'post',
        dataType: 'json',
        data: {
            first_name,
            last_name,
            title,
            english_title,
            article,
            action: 'create_article'
        },
        success: function (response) {
            if (response.status === 200) {
                Swal.fire({
                    title: response.title,
                    html: response.messages,
                    icon: response.type,
                    confirmButtonText: 'متوجه شدم!',
                }).then(function () {
                        location.reload();
                })
            }else {
                Swal.fire({
                    title: response.title,
                    text: response.text,
                    icon: response.type,
                    confirmButtonText: 'متوجه شدم!',
                })
            }
        },
        error: function (error) {
            console.log(error)
        },
    });

}

function DeletePhoto($id){

    $.ajax({
        url: 'requests/DeletePhotoRequest.php',
        method: 'post',
        dataType: 'json',
        data: {
            photo_id: $id,
            action: 'delete_photo'
        },
        success: function (response) {
            if (response.status === 200) {
                document.getElementById('photo'+$id).remove();
                Swal.fire({
                    title: response.title,
                    text: response.text,
                    icon: response.type,
                    confirmButtonText: 'متوجه شدم!',
                })
            } else {
                Swal.fire({
                    title: response.title,
                    html: response.messages,
                    icon: response.type,
                    confirmButtonText: 'متوجه شدم!',
                })
            }
        },
        error: function (error) {
            console.log(error)
        },
    });

}
