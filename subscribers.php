<?php
require __DIR__ . '/config/db.php';
header('Content-Type: application/json');
$email = trim($_POST['email'] ?? '');
if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo json_encode(['ok'=>false,'error'=>'Invalid email']); exit;
}
try {
  $stmt = $pdo->prepare("INSERT IGNORE INTO subscribers (email) VALUES (?)");
  $stmt->execute([$email]);
  echo json_encode(['ok'=>true]);
} catch (Exception $e) {
  echo json_encode(['ok'=>false,'error'=>'DB error']);
}
