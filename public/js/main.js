function previewImage(event) {
    const image = event.target;
    const previewimage = document.getElementById('previewimage');

    // Buat FileReader
    const oFReader = new FileReader();

    // Saat file selesai dibaca, atur src gambar preview
    oFReader.onload = function (oFREvent) {
        previewimage.src = oFREvent.target.result;
        previewimage.style.display = 'block';
    };

    // Baca file sebagai URL Data
    if (image.files[0]) {
        oFReader.readAsDataURL(image.files[0]);
    }
};

function previewImageUpdate(event, id) {
    const file = event.target.files[0];
    const lihatimage = document.getElementById(`updatepreview-${id}`);
    const reader = new FileReader();

    reader.onload = function (reader) {
        lihatimage.src = reader.target.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    }
};

function removePreviewImage() {
    const previewimage = document.getElementById('previewimage');

    // Kosongkan src gambar preview
    URL.revokeObjectURL(previewimage.src);
    previewimage.src = "/img/person-circle-outline.png";
}

function removePreviewImageUpdate(id) {
    const previewimage = document.getElementById('updatepreview-' + id);

    // Kosongkan src gambar preview
    URL.revokeObjectURL(previewimage.src);
    previewimage.src = "/img/person-circle-outline.png";
}

document.addEventListener("DOMContentLoaded", function () {
    const showPassword = document.querySelector('#show-password');
    const password = document.querySelector('#password');

    if (showPassword && password) {
        showPassword.addEventListener("click", function () {
            try {
                const eyeIcon = this.querySelector('i');
                eyeIcon.classList.toggle("bi-eye");
                eyeIcon.classList.toggle("bi-eye-slash");

                const type4 = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type4);
            } catch (error) {
                console.error('Error occurred:', error);
            }
        });
    }
});

$(document).ready(function () {
    $('.toast').toast('show');
});

(function () {
    "use strict";

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
            return [...document.querySelectorAll(el)]
        } else {
            return document.querySelector(el)
        }
    }

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        if (all) {
            select(el, all).forEach(e => e.addEventListener(type, listener))
        } else {
            select(el, all).addEventListener(type, listener)
        }
    }

    /**
     * Easy on scroll event listener
     */
    const onscroll = (el, listener) => {
        el.addEventListener('scroll', listener)
    }

    /**
     * Toggle .header-scrolled class to #header when page is scrolled
     */
    let selectHeader = select('#header')
    if (selectHeader) {
        const headerScrolled = () => {
            if (window.scrollY > 100) {
                selectHeader.classList.add('header-scrolled')
            } else {
                selectHeader.classList.remove('header-scrolled')
            }
        }
        window.addEventListener('load', headerScrolled)
        onscroll(document, headerScrolled)
    }


    /**
     * Initiate Bootstrap validation check
     */
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})();
