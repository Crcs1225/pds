<?php
session_start();
$user_id = $_SESSION["user_id"] ?? 1; // Fallback to 1 for testing

// DB connection
$conn = new mysqli("localhost:3307", "root", "1234", "pds_form");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch personal information data for this user
$stmt = $conn->prepare("SELECT id, pds_name, surname, firstname, updated_at, status FROM personal_information WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Store rows into an array
$records = [];
while ($row = $result->fetch_assoc()) {
    $records[] = $row;
}

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/pds/css/pds_landing/style.css">
</head>
<body>
    
    <div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-12">
    <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
        
        <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-success">Create New PDS</button>
        </div>
        <div class="table-responsive">
            <table class="table table-borderless mb-0">
                <thead>
                    <tr>
                        <th class="col-checkbox"></th>
                        <th class="col-name">NAME</th>
                        <th class="col-last">LAST NAME</th>
                        <th class="col-first">FIRST NAME</th>
                        <th class="col-date">DATE</th>
                        <th class="col-actions">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($records)) : ?>
                    <?php foreach ($records as $record): ?>
                        <tr data-id="<?= $record['id'] ?>">
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="active-checkbox form-check-input" <?= $record['status'] === 'active' ? 'checked' : '' ?>>
                                </div>
                            </td>
                            <td><?= htmlspecialchars($record['pds_name']) ?></td>
                            <td><?= htmlspecialchars($record['surname']) ?></td>
                            <td><?= htmlspecialchars($record['firstname']) ?></td>
                            <td><?= htmlspecialchars($record['updated_at']) ?></td>
                            <td>
                                <button class="btn btn-primary btn-sm">View</button>
                                <button class="btn btn-warning btn-sm">Edit</button>
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr><td colspan="6" class="text-center">No records found.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <script>
        const userId = <?= isset($_SESSION["user_id"]) ? json_encode($_SESSION["user_id"]) : 1 ?>; //change this to fetch user id dynamically
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/pds/js/pds_landing/script.js"></script>

</body>
</html>