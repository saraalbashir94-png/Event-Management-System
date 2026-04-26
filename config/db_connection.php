<?php
// ملف الاتصال بقاعدة البيانات
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "event_management";

$conn = mysqli_connect($host, $user, $pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// السطر ده اختياري عشان لو فيه كلام بالعربي يظهر صح
mysqli_set_charset($conn, "utf8"); 
?>