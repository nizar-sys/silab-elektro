document.addEventListener("DOMContentLoaded", () => {
    const validateForm = (formSelector, fieldsConfig) => {
        const formElement = document.querySelector(formSelector);
        if (!formElement) return;

        FormValidation.formValidation(formElement, {
            fields: fieldsConfig,
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    eleValidClass: "",
                    rowSelector: ".form-floating",
                }),
                submitButton: new FormValidation.plugins.SubmitButton(),
                autoFocus: new FormValidation.plugins.AutoFocus(),
            },
            init: (instance) => {
                instance.on("plugins.message.placed", (e) => {
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

                instance.on("core.element.validated", (e) => {
                    if (e.valid) {
                        e.element.classList.add("is-valid");
                    }
                });

                instance.on("core.form.valid", () => {
                    formElement.submit();
                });
            },
        });
    };

    // Form validation configuration
    validateForm("#addNewUserForm", {
        room_id: {
            validators: {
                notEmpty: {
                    message: "Ruangan wajib diisi",
                },
            },
        },
        schedule_id: {
            validators: {
                notEmpty: {
                    message: "Jadwal wajib diisi",
                },
            },
        },
        student_id: {
            validators: {
                notEmpty: {
                    message: "Siswa wajib diisi",
                },
            },
        },
        name: {
            validators: {
                notEmpty: {
                    message: "Nama praktikum wajib diisi",
                },
            },
        },
        session: {
            validators: {
                notEmpty: {
                    message: "Sesi praktikum wajib diisi",
                },
            },
        }
    });

    // Function to handle delete record confirmation
    const handleDeleteRecord = (e) => {
        const target = e.target.closest(".delete-record");
        if (!target) return;

        e.preventDefault();

        const recordId = target.getAttribute("data-id");
        if (!recordId) {
            console.error("Record ID not found.");
            return;
        }

        const form = document.createElement("form");
        form.method = "POST";
        form.action = urlDeleteUser.replace(":id", recordId);
        form.style.display = "none";

        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (csrfToken) {
            const csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = csrfToken.getAttribute("content");
            form.appendChild(csrfInput);
        }

        const methodInput = document.createElement("input");
        methodInput.type = "hidden";
        methodInput.name = "_method";
        methodInput.value = "DELETE";
        form.appendChild(methodInput);

        document.body.appendChild(form);

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            } else {
                form.remove();
            }
        });
    };

    // Attach event listener for delete record
    document.addEventListener("click", handleDeleteRecord);
});
