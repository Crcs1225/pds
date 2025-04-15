

async function submitAction(actionType) {
    try {
        const urlParams = new URLSearchParams(window.location.search);
        const userId = urlParams.get("id");

        if (!userId) {
            alert("User ID is missing.");
            return;
        }

        if (actionType === "cancel" && !confirm("Are you sure you want to cancel?")) {
            return;
        }

        let formData = {
            user_id: userId,
            action: actionType
        };

        let response = await fetch("/pds/view_model/pds_preview/process.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(formData),
        });

        console.log("Raw Response:", response);

        if (!response.ok) {
            throw new Error(`Failed request: ${response.statusText}`);
        }

        let data = await response.json();
        console.log("Response Data:", data);

        if (data.success) {
            alert(data.message);

            // Redirect only if confirm, or customize
            window.location.href = "/pds/view/pds_landing/index.php";
        } else {
            throw new Error(data.message || "Something went wrong.");
        }

    } catch (error) {
        console.error("Error in submitAction:", error);
        alert("Error processing request.");
    }
}
