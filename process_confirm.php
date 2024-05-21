<?php
// 連接到數據庫
include 'sql_connect.php';

// 檢查連接是否成功
if (!$conn) {
    die("連接失敗: " . print_r(sqlsrv_errors(), true));
}

// 檢查是否收到 GET 請求
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["uid"])) {
    // 從 URL 獲取身分證字號
    $idNumber = $_GET["uid"];

    // 更新預約狀態為已確認
    $sql = "UPDATE Patient SET appointment_status='已確認' WHERE IDNumber='$idNumber'";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        die("Error updating record: " . print_r(sqlsrv_errors(), true));
    } else {
        echo "<script>alert('預約已確認'); window.location.href = '首頁的URL';</script>";
    }
}

sqlsrv_close($conn);
?>