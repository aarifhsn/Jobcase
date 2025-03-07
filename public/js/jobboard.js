document
    .getElementById("filter-button")
    .addEventListener("click", function (e) {
        e.preventDefault(); // Prevent default button behavior

        // Gather all form inputs
        const forms = document.querySelectorAll(".filter-form");
        const formData = new FormData();

        forms.forEach((form) => {
            const inputs = form.querySelectorAll("input, select");
            inputs.forEach((input) => {
                if (
                    (input.type === "checkbox" || input.type === "radio") &&
                    !input.checked
                )
                    return;
                formData.append(input.name, input.value);
            });
        });

        // Convert formData to query string
        const queryParams = new URLSearchParams(formData).toString();

        // Send data to backend
        window.location.href = `/jobs?${queryParams}`;
    });
