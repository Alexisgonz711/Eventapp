<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['id_user'])) {
    $eventId = $_POST['event_id'];
    $userId = $_SESSION['id_user'];

    require_once '../../database/connection.php';

    try {
        $pdo = Database::getConnection();

        $deleteStmt = $pdo->prepare("DELETE FROM user_events WHERE user_id = ? AND event_id = ?");
        $deleteStmt->execute([$userId, $eventId]);

        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de la désinscription de l\'événement : ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Erreur lors de la désinscription de l\'événement.']);
}
?>
