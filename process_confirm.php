<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>確認預約</title>
    <style>
        body {
            font-family: Arial, sans-serif; /* 設置字體 */
            background-color: #f4f4f4; /* 設置背景顏色 */
            display: flex;
            justify-content: center; /* 水平居中 */
            align-items: center; /* 垂直居中 */
            height: 100vh; /* 高度填滿視窗 */
            margin: 0; /* 移除邊距 */
        }
        .form-container {
            background-color: #ffffff; /* 背景顏色為白色 */
            padding: 20px; /* 內邊距 */
            border-radius: 15px; /* 邊框圓角 */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* 盒子陰影 */
            display: flex;
            flex-direction: column; /* 元素垂直排列 */
            align-items: center; /* 內容居中對齊 */
            width: fit-content; /* 寬度按內容調整 */
        }
        form {
            display: flex;
            flex-direction: column; /* 表單元素垂直排列 */
            align-items: center; /* 居中對齊 */
            width: 100%; /* 寬度為100% */
        }
        .form-field {
            display: flex;
            align-items: center; /* 內容垂直居中 */
            margin-bottom: 10px; /* 底部外邊距 */
        }
        label {
            margin-right: 10px; /* 標籤右邊距 */
        }
        input[type="text"] {
            padding: 8px; /* 輸入框內邊距 */
            border: 1px solid #ccc; /* 邊框 */
            border-radius: 10px; /* 邊框圓角 */
            margin-left: 10px; /* 與標籤間距 */
        }
        button {
            padding: 10px 20px; /* 按鈕內邊距 */
            border-radius: 10px; /* 邊框圓角 */
            background-color: rgb(3, 104, 185); /* 背景顏色 */
            color: white; /* 文字顏色 */
            border: none; /* 無邊框 */
            cursor: pointer; /* 滑鼠指標類型 */
            width: auto; /* 寬度自動 */
            margin-top: 20px; /* 上邊距 */
        }
        button:hover {
            background-color: #45a049; /* 鼠標懸停時的背景顏色 */
        }
    </style>
    
</head>
<body>
<div class="form-container">
    <h1>預約確認</h1>
    <form action="process_confirm.php" method="post">
        <div class="form-field">
            <label for="idNumber">身分證字號:</label>
            <input type="text" id="idNumber" name="idNumber" required>
        </div>
        <button type="submit">確認預約</button>
    </form>
</div>
</body>
</html>

<?php
// 連接到數據庫
include 'sql_connect.php';


// 檢查連接是否成功
if (!$conn) {
    die("連接失敗: " . print_r(sqlsrv_errors(), true));
}

// 檢查是否收到 POST 請求
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 從表單獲取身分證字號
    $idNumber = $_POST["idNumber"];

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