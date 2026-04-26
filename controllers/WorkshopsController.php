<?php
// controllers/WorkshopsController.php

// 1. استدعاء ملف الاتصال بالداتابيز (تأكدي من الاسم عندك db_connection.php)
require_once '../config/db_connection.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 2. استلام البيانات من الفورم
    $title = $_POST['title'];
    $speaker = $_POST['speaker'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $description = $_POST['description'];
    
    // صورة افتراضية حالياً
    $image = "default.jpg"; 

    // 3. جملة الـ SQL للإضافة (Create)
    $query = "INSERT INTO workshops (title, speaker, date, time, description, image) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    
    if ($stmt->execute([$title, $speaker, $date, $time, $description, $image])) {
        // 4. لو نجح يرجعك لصفحة الورش (عدلي المسار حسب اسم صفحتك)
        header("Location: ../views/pages/admin_workshops.php?success=1");
    } else {
        echo "Error adding workshop!";
    }
}