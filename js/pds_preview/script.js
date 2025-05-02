async function submitAction(actionType) {
    try {
        const urlParams = new URLSearchParams(window.location.search);
        const userId = urlParams.get("id");

        if (!userId) {
            alert("User ID is missing.");
            return;
        }

        // If cancelling, confirm before proceeding
        if (actionType === "cancel" && !confirm("⚠️ This will permanently delete your data. Continue?")) {
            return;
        }

        // If action is cancel, call delete_data.php
        if (actionType === "cancel") {
            const formData = {
                user_id: userId
            };

            const response = await fetch("/pds/view_model/pds_main/delete_data.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(formData),
            });

            if (!response.ok) {
                throw new Error(`Failed request: ${response.statusText}`);
            }

            const data = await response.json();
            console.log("Delete Response:", data);

            if (data.success) {
                console.log("✅ Data deleted successfully.");
            } else {
                throw new Error(data.message || "Something went wrong during deletion.");
            }
        }

        // Redirect to landing page (in all cases)
        window.location.href = "/pds/view/pds_landing/";

    } catch (error) {
        console.error("Error in submitAction:", error);
        alert("❌ Error processing request. Please try again.");
    }
}
