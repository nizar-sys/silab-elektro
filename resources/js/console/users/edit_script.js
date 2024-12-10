document.addEventListener("DOMContentLoaded", function () {
    const validateForm = (formSelector, fieldsConfig) => {
        const formElement = document.querySelector(formSelector);
        if (!formElement) return;

        FormValidation.formValidation(formElement, {
            fields: fieldsConfig,
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    eleValidClass: "",
                    rowSelector: ".form-floating", // Ensures proper positioning of validation messages
                }),
                submitButton: new FormValidation.plugins.SubmitButton(),
                autoFocus: new FormValidation.plugins.AutoFocus(),
            },
            init: (instance) => {
                instance.on("plugins.message.placed", function (e) {
                    if (
                        e.element.parentElement.classList.contains(
                            "input-group"
                        )
                    ) {
                        e.element.parentElement.insertAdjacentElement(
                            "afterend",
                            e.messageElement
                        );
                    }
                });

                instance.on("core.element.validated", function (e) {
                    if (e.valid) {
                        e.element.classList.add("is-valid");
                    } else {
                        e.element.classList.remove("is-valid");
                    }
                });

                instance.on("core.form.valid", function () {
                    formElement.submit();
                });
            },
        });
    };

    validateForm("#editUserForm", {
        name: {
            validators: {
                notEmpty: {
                    message: "Masukkan nama pengguna",
                },
                stringLength: {
                    min: 2,
                    message: "Nama pengguna minimal 2 karakter",
                },
            },
        },
        email: {
            validators: {
                notEmpty: {
                    message: "Masukkan alamat email",
                },
                emailAddress: {
                    message: "Masukkan alamat email yang valid",
                },
            },
        },
        role_id: {
            validators: {
                notEmpty: {
                    message: "Pilih peran pengguna",
                },
            },
        },
        password: {
            validators: {
                stringLength: {
                    min: 8,
                    message: "Password minimal 8 karakter",
                },
            },
        },
        password_confirmation: {
            validators: {
                callback: {
                    message: "Konfirmasi password diperlukan",
                    callback: function (value, validator, $field) {
                        const passwordValue = document.querySelector(
                            '#editUserForm [name="password"]'
                        ).value;
                        if (passwordValue === "") {
                            return true; // If password is empty, confirmation is not required
                        }
                        return value.length > 0; // If password is not empty, confirmation is required
                    },
                },
                identical: {
                    compare: function () {
                        return document.querySelector(
                            '#editUserForm [name="password"]'
                        ).value;
                    },
                    message: "Password dan konfirmasi password tidak cocok",
                },
            },
        },
    });
});
