
document.querySelector('.btn-success').addEventListener('click', function () {
    Swal.fire({
        title: "Enter your PDS name",
        input: "text",
        inputPlaceholder: "Enter PDS name here...",
        showCancelButton: true,
        confirmButtonText: "Proceed",
        showLoaderOnConfirm: true,
        preConfirm: async (pdsName) => {
            if (!pdsName) {
                Swal.showValidationMessage('Name is required');
                return false;
            }

            try {
                // AJAX call to check number of PDS created
                const response = await fetch('/pds/view_model/pds_landing/count.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ user_id: userId }) // update this if needed
                });

                const result = await response.json();

                if (!result.allowed) {
                    throw new Error("Maximum of 5 PDS records reached.");
                }

                // Redirect if allowed
                const params = new URLSearchParams({
                    name: pdsName,
                    user_id: userId
                });

                window.location.href = '/pds/view/pds_main/index.php?' + params.toString();

            } catch (error) {
                Swal.showValidationMessage(`Error: ${error.message}`);
            }
        },
        allowOutsideClick: () => !Swal.isLoading()
    });
});
document.querySelectorAll('.active-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', async function () {
        // If this checkbox is already checked, and you clicked it again, just ignore
        if (!this.checked) {
            this.checked = true; // prevent unchecking
            return;
        }

        const row = this.closest('tr');
        const pdsId = row.getAttribute('data-id');

        try {
            const response = await fetch('/pds/view_model/pds_landing/set_active.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ user_id: userId, pds_id: pdsId })
            });

            const result = await response.json();

            if (result.success) {
                // Uncheck all other checkboxes
                document.querySelectorAll('.active-checkbox').forEach(cb => {
                    cb.checked = false;
                    cb.closest('tr').classList.remove('table-success');
                });

                // Check this one and highlight row
                this.checked = true;
                row.classList.add('table-success');
            } else {
                Swal.fire('Error', result.message || 'Something went wrong.', 'error');
                this.checked = false;
            }

        } catch (error) {
            Swal.fire('Error', error.message, 'error');
            this.checked = false;
        }
    });
});

document.querySelectorAll('.btn-primary').forEach(button => {
    button.addEventListener('click', function () {
        const row = this.closest('tr');
        const pdsId = row.getAttribute('data-id');
        window.location.href = `/pds/view/pds_preview/index.php?id=${pdsId}`;
    });
});
document.querySelectorAll('.btn-warning').forEach(button => {
    button.addEventListener('click', function () {
        const row = this.closest('tr');
        const pdsId = row.getAttribute('data-id');
        window.location.href = `/pds/view/pds_main/index.php?id=${pdsId}`;
    });
});
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".btn-danger").forEach(button => {
        button.addEventListener("click", async function () {
            const row = this.closest("tr");
            const pdsId = row.getAttribute("data-id");

            // SweetAlert confirmation
            const result = await Swal.fire({
                title: "Are you sure?",
                text: "This will permanently delete the record.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!",
            });

            if (result.isConfirmed) {
                try {
                    const formData = {
                        action: "delete",
                        id: parseInt(pdsId)
                    };

                    let response = await fetch("/pds/view_model/pds_landing/delete.php", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify(formData),
                    });

                    let data = await response.json();

                    if (data.success) {
                        Swal.fire("Deleted!", data.message || "Record deleted.", "success");

                        // Remove row from table
                        row.remove();

                        // Optionally show "No records" row if table becomes empty
                        const tbody = document.querySelector("tbody");
                        if (tbody.children.length === 0) {
                            const tr = document.createElement("tr");
                            tr.innerHTML = `<td colspan="6" class="text-center">No records found.</td>`;
                            tbody.appendChild(tr);
                        }
                    } else {
                        Swal.fire("Error", data.error || "Something went wrong.", "error");
                    }
                } catch (error) {
                    console.error("Delete error:", error);
                    Swal.fire("Error", "Failed to delete the record.", "error");
                }
            }
        });
    });
});
