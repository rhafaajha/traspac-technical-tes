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

const imageModal = document.getElementById('imageModal');
imageModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const imgSrc = button.getAttribute('data-bs-src');

    const modalImage = document.getElementById('imageModalSrc');
    modalImage.src = imgSrc;
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
