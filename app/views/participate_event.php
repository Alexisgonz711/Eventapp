<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['id_user'])) {
    $eventId = $_POST['event_id'];
    $userId = $_SESSION['id_user'];

    require_once '../../database/connection.php';

    try {
        $pdo = Database::getConnection();
        $checkStmt = $pdo->prepare("SELECT * FROM user_events WHERE user_id = ? AND event_id = ?");
        $checkStmt->execute([$userId, $eventId]);

        if ($checkStmt->rowCount() === 0) {
            $insertStmt = $pdo->prepare("INSERT INTO user_events (user_id, event_id) VALUES (?, ?)");
            $insertStmt->execute([$userId, $eventId]);
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Vous avez déjà participé à cet événement.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de la participation à l\'événement : ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Erreur lors de la participation à l\'événement.']);
}
?>
