"use strict";

var KTSignupGeneral = function () {
    var e, t, a, s;

    var r = function () {
        return 100 === s.getScore();
    };

    return {
        init: function () {
            e = document.querySelector("#kt_sign_up_form");
            t = document.querySelector("#kt_sign_up_submit");
            s = KTPasswordMeter.getInstance(e.querySelector('[data-kt-password-meter="true"]'));

            a = FormValidation.formValidation(e, {
                fields: {
                    "first-name": {
                        validators: {
                            notEmpty: {
                                message: "First Name is required"
                            }
                        }
                    },
                    "last-name": {
                        validators: {
                            notEmpty: {
                                message: "Last Name is required"
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: "Email address is required"
                            },
                            emailAddress: {
                                message: "The value is not a valid email address"
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "The password is required"
                            },
                            callback: {
                                message: "Please enter a valid password",
                                callback: function (e) {
                                    if (e.value.length > 0) return r();
                                }
                            }
                        }
                    },
                    "confirm-password": {
                        validators: {
                            notEmpty: {
                                message: "The password confirmation is required"
                            },
                            identical: {
                                compare: function () {
                                    return e.querySelector('[name="password"]').value;
                                },
                                message: "The password and its confirm are not the same"
                            }
                        }
                    },
                    toc: {
                        validators: {
                            notEmpty: {
                                message: "You must accept the terms and conditions"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger({
                        event: {
                            password: !1
                        }
                    }),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            });

            t.addEventListener("click", (function (r) {
                r.preventDefault();
                a.revalidateField("password");
                a.validate().then((function (a) {
                    "Valid" == a ? (
                        t.setAttribute("data-kt-indicator", "on"),
                        t.disabled = !0,
                        setTimeout((function () {
                            t.removeAttribute("data-kt-indicator");
                            t.disabled = !1;
                            Swal.fire({
                                text: "You have successfully reset your password!",
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then((function (t) {
                                t.isConfirmed && (e.reset(), s.reset());

                                // var formData = new FormData(e);
            //                     const formu = new FormData();
            // var nombre = $("#nombre").val();
            // formu.append("nombre", nombre);

                                fetch("/validar-registro", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/json",
                                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                                    },
                                    body: JSON.stringify({
                                        name: "Nombre del usuario",
                                        email: "correo@ejemplo.com",
                                        password: "contraseña",
                                    }),
                                })
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error(`HTTP error! Status: ${response.status}`);
                                        }
                                        return response.json();
                                    })
                                    .then(data => {
                                        console.log(data); // Puedes mostrar la respuesta en la consola
                                        // Puedes realizar acciones adicionales según la respuesta
                                    })
                                    .catch(error => {
                                        console.error("Error:", error);
                                    });
                            }));
                        }), 1500)
                    ) : (
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                    );
                }));
            }));

            e.querySelector('input[name="password"]').addEventListener("input", (function () {
                this.value.length > 0 && a.updateFieldStatus("password", "NotValidated");
            }));
        }
    };
}();

KTUtil.onDOMContentLoaded((function () {
    KTSignupGeneral.init();
}));
