<?php

require_once 'db.php';

$data = json_decode(file_get_contents('php://input'), true);
$ids = $data['ids'];

if (count($ids) > 0) {
    $placeholders = str_repeat('?,', count($ids) - 1) . '?';
    $stmt = $pdo->prepare("DELETE FROM products WHERE id IN ($placeholders)");
    $stmt->execute($ids);

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>
