<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>取消預約</title>
    <style>
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh; /* 設定高度為視窗高度，使登入框置中 */
        }

        #cancel-form {
            width: 300px; /* 設定表單寬度 */
            padding: 50px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* 左對齊表單元素 */
        }

        label {
            font-weight: bold;
            text-align: left; /* 左對齊文本 */
            margin-bottom: 10px;
        }
        
        input[type="submit"] {
            width: 150px;
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* 使元素的寬度包含內邊距和邊框，而不包含外邊距 */
            background-color:  #a1c6e4;
            color: white;
            cursor: pointer;
            align-self: center; /* 使提交按鈕居中 */
        }

        #idNumber, #randomCode {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; 
        }

        .cancel-button {
            padding: 10px 30px;
            border: none;
            border-radius: 5px;
            background-color: #a1c6e4;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .cancel-button:hover {
            background-color: #e2e5e8;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>取消預約</h1>
        <form id="cancel-form" action="process_cancel.php" method="post" onsubmit="confirmCancel(event)">
            <label for="idNumber">身分證字號：</label>
            <input type="text" id="idNumber" name="idNumber" required><br><br>
            <label for="randomCode">驗證碼：</label>
            <input type="text" id="randomCode" name="randomCode" required><br><br>
            <button class="cancel-button" type="submit">取消預約</button> 
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
    $sql = "SELECT appointment_status, email FROM Patient WHERE idNumber = ? AND random_code = ?";
    $stmt = sqlsrv_query($conn, $sql, array($idNumber, $randomCode));

    if ($stmt === false) {
        die("Error in execution of SELECT statement: " . print_r(sqlsrv_errors(), true));
    } elseif ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $appointment_status = $row['appointment_status'];
        $email = $row['email'];

        if ($appointment_status == '待確認') {
        $updateSql = "UPDATE Patient SET appointment_status = '已取消' WHERE idNumber = ? AND random_code = ?";
        $updateStmt = sqlsrv_prepare($conn, $updateSql, array(&$idNumber, &$randomCode));

        } elseif ($appointment_status == '已確認' || $appointment_status == '已取消') {
            // 跳轉到 call.php
            header("Location: call.php");
            exit();
        }
    } else {
        echo "<script>alert('無法找到對應的預約紀錄，請檢查輸入的身分證字號和驗證碼。');</script>";
    }
}

// 以下為取消預約的部分，與你原先的程式碼相同

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
        echo "<script>alert('預約已取消，請檢查信箱。'); window.location.href = '首頁的URL';</script>";
    } catch (Exception $e) {
        echo "郵件發送失敗。Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    die("Error updating record: " . print_r(sqlsrv_errors(), true));
}

sqlsrv_close($conn);
?>
