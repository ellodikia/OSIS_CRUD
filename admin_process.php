<?php
require_once 'config.php';

if (!isAdminLoggedIn()) {
    header('HTTP/1.0 403 Forbidden');
    exit('Akses ditolak.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    
    switch ($action) {
        case 'add_news':
            // Proses tambah berita
            $title = $_POST['news_title'];
            $excerpt = $_POST['news_excerpt'];
            $content = $_POST['news_content'];
            $date = $_POST['news_date'];
            
            // Upload gambar
            $imagePath = null;
            if (isset($_FILES['news_image']) && $_FILES['news_image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/news/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                
                $extension = pathinfo($_FILES['news_image']['name'], PATHINFO_EXTENSION);
                $filename = uniqid() . '.' . $extension;
                $destination = $uploadDir . $filename;
                
                if (move_uploaded_file($_FILES['news_image']['tmp_name'], $destination)) {
                    $imagePath = $destination;
                }
            }
            
            $stmt = $pdo->prepare("INSERT INTO news (title, excerpt, content, image_path, date) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$title, $excerpt, $content, $imagePath, $date]);
            
            header('Location: index.php?success=news_added');
            break;
            
        case 'edit_news':
            // Proses edit berita
            $id = $_POST['news_id'];
            $title = $_POST['news_title'];
            $excerpt = $_POST['news_excerpt'];
            $content = $_POST['news_content'];
            $date = $_POST['news_date'];
            
            // Jika ada gambar baru diupload
            if (isset($_FILES['news_image']) && $_FILES['news_image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/news/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                
                $extension = pathinfo($_FILES['news_image']['name'], PATHINFO_EXTENSION);
                $filename = uniqid() . '.' . $extension;
                $destination = $uploadDir . $filename;
                
                if (move_uploaded_file($_FILES['news_image']['tmp_name'], $destination)) {
                    // Hapus gambar lama jika ada
                    $stmt = $pdo->prepare("SELECT image_path FROM news WHERE id = ?");
                    $stmt->execute([$id]);
                    $oldImage = $stmt->fetchColumn();
                    
                    if ($oldImage && file_exists($oldImage)) {
                        unlink($oldImage);
                    }
                    
                    $imagePath = $destination;
                    $stmt = $pdo->prepare("UPDATE news SET title = ?, excerpt = ?, content = ?, image_path = ?, date = ? WHERE id = ?");
                    $stmt->execute([$title, $excerpt, $content, $imagePath, $date, $id]);
                }
            } else {
                $stmt = $pdo->prepare("UPDATE news SET title = ?, excerpt = ?, content = ?, date = ? WHERE id = ?");
                $stmt->execute([$title, $excerpt, $content, $date, $id]);
            }
            
            header('Location: index.php?success=news_updated');
            break;
            
        case 'delete_news':
            // Proses hapus berita
            $id = $_POST['news_id'];
            
            // Hapus gambar jika ada
            $stmt = $pdo->prepare("SELECT image_path FROM news WHERE id = ?");
            $stmt->execute([$id]);
            $imagePath = $stmt->fetchColumn();
            
            if ($imagePath && file_exists($imagePath)) {
                unlink($imagePath);
            }
            
            $stmt = $pdo->prepare("DELETE FROM news WHERE id = ?");
            $stmt->execute([$id]);
            
            header('Location: index.php?success=news_deleted');
            break;
            
        // Tambahkan case untuk operasi CRUD lainnya (pengumuman, struktur, kalender, gallery)
    }
}