<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>取消預約</title>
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
        <h1>取消預約</h1>
        <form action="process_cancel.php" method="post" onsubmit="confirmCancel(event)">
            <div class="form-field">
                <label for="idNumber">身分證字號:</label>
                <input type="text" id="idNumber" name="idNumber" required>
            </div>
            <div class="form-field">
                <label for="randomCode">驗證碼:</label>
                <input type="text" id="randomCode" name="randomCode" required>
            </div>
            <button type="submit">確認取消</button>
        </form>
    </div>
</body>
</html>

<?php
include 'sql_connect.php'; // 確保這個路徑正確並且包含連接資料庫的代碼

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\php\PHPMailer-master\src\Exception.php';
require 'C:\xampp\php\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\php\PHPMailer-master\src\SMTP.php';

// 檢查連接是否成功
if ($conn === false) {
    die("連接失敗: " . print_r(sqlsrv_errors(), true));
}

// 定義套餐陣列
$packages = array(
    '1' => '卓越C',
    '2' => '卓越M',
    '3' => '尊爵A',
    '4' => '尊爵B',
    '5' => '尊爵C',
    '6' => '尊爵D'
);

// 檢查是否收到 POST 請求
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $idNumber = $_POST["idNumber"];
    $randomCode = $_POST["randomCode"];

    // 先查詢是否有匹配的預約以獲取email
    $sql = "SELECT email FROM Patient WHERE idNumber = ? AND random_code = ?";
    $stmt = sqlsrv_query($conn, $sql, array($idNumber, $randomCode));


    if ($stmt === false) {
        die("Error in execution of SELECT statement: " . print_r(sqlsrv_errors(), true));
    } elseif ($email = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $email = $email['email'];



        // 更新預約狀態為已取消
        $updateSql = "UPDATE Patient SET appointment_status = '已取消' WHERE idNumber = ? AND random_code = ?";
        $updateStmt = sqlsrv_prepare($conn, $updateSql, array(&$idNumber, &$randomCode));
        if (sqlsrv_execute($updateStmt)) {
            // 發送取消郵件
            $mail = new PHPMailer(true);
            try {
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'renaihealthcheck@gmail.com'; // SMTP用戶名
                $mail->Password   = 'ixehchoociqvdate';   // SMTP密碼
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;
                $mail->setFrom('renaihealthcheck@gmail.com', '仁愛醫院健檢中心');
                $mail->addAddress($email);

                $mail->Subject = '健檢預約取消通知';
                $mail->isHTML(true);
                $mail->Body    =<<<EOT
                <!DOCTYPE html>
                <html>
                <head>
                    <style>
                        body {
                            font-family: 'Arial', sans-serif;
                            color: #333;
                            background-color: #f4f4f4;
                            padding: 20px;
                        }
                        .content {
                            background-color: #fff;
                            padding: 20px;
                            border-radius: 10px;
                            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
                            text-align: left;
                        }
                    </style>
                </head>
                <body>
                    <div class="content">
                        <h1>【健檢預約取消郵件】</h1>
                        <p>
                            <br><br>
                            您的健檢預約已被取消。如有疑問，請聯繫客服。
                            <br><br>
                            祝您健康！
                            <br><br>
                            仁愛醫院健檢中心
                        </p>
            
                        </div>
                    </div>
                </body>
                </html>
                
            EOT;

                $mail->send();
                echo "<script>alert('預約已取消，確認信件已發送至您的郵箱。'); window.location.href = '首頁的URL';</script>";
            } catch (Exception $e) {
                echo "郵件發送失敗。Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            die("Error updating record: " . print_r(sqlsrv_errors(), true));
        }
    } else {
        echo "<script>alert('無法找到對應的預約紀錄，請檢查輸入的身分證字號和驗證碼。');</script>";
    }
}

sqlsrv_close($conn);
?>