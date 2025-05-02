    <?php


    $conn = new mysqli("localhost:3307", "root", "1234", "pds_form");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        header("Content-Type: application/json");
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        try {
            // Read JSON input
            $data = json_decode(file_get_contents("php://input"), true);
        
            if (!isset($data['user_id']) || !isset($data['action'])) {
                throw new Exception("Invalid request.");
            }
        
            $id = intval($data['user_id']);
            $action = $data['action'];
        
            if ($action === 'confirm') {
                // Perform confirm action (update database)
                $stmt = $conn->prepare("UPDATE personal_information SET status = 'inactive' WHERE id = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
        
                if ($stmt->affected_rows > 0) {
                    echo json_encode(["success" => true, "message" => "Data confirmed successfully."]);
                } else {
                    throw new Exception("No changes made. User ID may not exist.");
                }
                $stmt->close();
        
            } elseif ($action === 'cancel') {
                // Perform cancel action (delete entry)
                $stmt = $conn->prepare("DELETE FROM personal_information WHERE id = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
        
                if ($stmt->affected_rows > 0) {
                    echo json_encode(["success" => true, "message" => "Data deleted successfully."]);
                } else {
                    throw new Exception("No changes made. User ID may not exist.");
                }
                $stmt->close();
        
            } else {
                throw new Exception("Invalid action.");
            }
        
        } catch (Exception $e) {
            echo json_encode(["success" => false, "message" => $e->getMessage()]);
        }
        ?>