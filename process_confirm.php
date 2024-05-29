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

    // 檢查預約狀態
    $sql = "SELECT appointment_status FROM Patient WHERE IDNumber='$idNumber'";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        die("Error in execution of SELECT statement: " . print_r(sqlsrv_errors(), true));
    }

    // 獲取預約狀態
    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $appointmentStatus = $row['appointment_status'];

        // 根據預約狀態進行操作
        if ($appointmentStatus == '待確認') {
            // 更新預約狀態為已確認
            $updateSql = "UPDATE Patient SET appointment_status='已確認' WHERE IDNumber='$idNumber'";
            $updateStmt = sqlsrv_query($conn, $updateSql);

            if ($updateStmt === false) {
                die("Error updating record: " . print_r(sqlsrv_errors(), true));
            } else {
                echo "<script>alert('預約已確認'); window.location.href = '首頁的URL';</script>";
            }
        } elseif ($appointmentStatus == '已確認' || $appointmentStatus == '已取消') {
            // 如果預約狀態是已確認或已取消，跳轉到call.php
            header("Location: call.php");
            exit();
        } else {
            // 其他狀態的處理
            echo "<script>alert('未知的預約狀態'); window.location.href = '首頁的URL';</script>";
        }
    } else {
        // 沒有找到相應的預約記錄
        echo "<script>alert('無法找到對應的預約記錄'); window.location.href = '首頁的URL';</script>";
    }

    sqlsrv_free_stmt($stmt);
}

sqlsrv_close($conn);
?>
