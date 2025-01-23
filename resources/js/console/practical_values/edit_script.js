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
        practical_id: {
            validators: {
                notEmpty: {
                    message: "Pilih Praktikum.",
                },
            },
        },
        value: {
            validators: {
                notEmpty: {
                    message: "Nilai tidak boleh kosong.",
                },
            },
        },
    });
});
