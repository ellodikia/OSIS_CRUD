<?php
require_once 'config.php';

if (!isAdminLoggedIn()) {
    http_response_code(403);
    exit('Akses ditolak.');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM news WHERE id = ?");
    $stmt->execute([$id]);
    $news = $stmt->fetch(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode($news);
}
?>