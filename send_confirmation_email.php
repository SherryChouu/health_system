
<?php

// 導入必要的文件
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\php\PHPMailer-master\src\Exception.php';
require 'C:\xampp\php\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\php\PHPMailer-master\src\SMTP.php';

// 配置SMTP
$mail = new PHPMailer(true);
try {
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // SMTP服务器地址
    $mail->SMTPAuth   = true;
    $mail->Username   = 'renaihealthcheck@gmail.com'; // SMTP用户名
    $mail->Password   = 'ixehchoociqvdate';   // SMTP密码
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // 設置發件人信息
    $mail->setFrom('renaihealthcheck@gmail.com', '仁愛醫院健檢中心' );

    // 獲取受檢者email
    $to = $_POST["email"];

    // 設置收件人信息
    $mail->addAddress($to);

    // 郵件主題
    $mail->Subject = '預約成功信件';

    // 郵件地址
    $mail->isHTML(true); // 郵件格式為 HTML
    $cancelURL = "http://localhost:8000/process_cancel.php"; // 取消預約連結

    // 使用確認資料表
    $mail->Body = <<<EOT
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

        .button {
            padding: 15px 25px;
            background-color: rgb(3, 104, 185); 
            color: white;
            text-decoration: none; 
            border-radius: 20px; /* 增加圆角 */
            font-weight: bold; /* 文字加粗 */
            display: inline-block; 
            transition: background-color 0.3s ease; 
            border: none; /* 移除邊框 */
            outline: none; 
            text-align: center; 
        }
        .button:hover {
            background-color: #AFC2D5; 
        }

           .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>您的預約已成功</h1>
        <p>感謝您選擇我們的服務。如果您需要取消預約，請點擊下面的按鈕。</p>
        <a href="$cancelURL" class="button">取消預约</a>
    </div>
</body>
</html>
EOT;
    
    // 發送郵件
    $mail->send();
    echo "<script>alert('信件已寄出，請查看信箱！'); window.location.href = '首頁的URL';</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



//以下為"預約成功後，資料庫預約人數會減少的程式"
header("Content-Type:text/html; charset=utf-8");

include 'sql_connect.php';


// 檢查是否是 POST 請求
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 這裡可以獲取表單提交的數據
    $chineseName = $_POST["chinese-name"];
    $englishName = $_POST["english-name"];
    
    $idNumber = $_POST["id-number"];

    $sexual = $_POST["sexual"];
    $birthdate = $_POST["birthdate"];
    $address = $_POST["address"];
    $residenceAddress = $_POST["residence-address"];
    $sameAsMailing = isset($_POST["same-as-mailing"]) ? 1 : 0; // 如果勾選，設置為1，否則設置為0
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $wedding = $_POST["wedding"];
    $selectedPackage = isset($_POST["package"]) ? $_POST["package"] : '';
    $reservationDate = isset($_POST["reservationDate"]) ? $_POST["reservationDate"] : '';
    
    
// 在執行 SQL 語句之前確認 $reservationDate 的值
echo "Reservation Date: " . $reservationDate;



    // 執行資料庫操作
try {
    // 準備 SQL 語句
    // 將資料插入 Patient 資料表
    $sqlPatient = "INSERT INTO Patient (
    ChineseName, EnglishName, 
    IDNumber, Sexual, Birthdate, 
    Address, ResidenceAddress, 
    SameAsMailing, Phone, Email, Wedding,Package_id,ReservationDate) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

    // 使用 sqlsrv_prepare 函數，防止 SQL 注入攻擊
    $stmtPatient = sqlsrv_prepare($conn, $sqlPatient, array(
        &$chineseName, &$englishName, &$idNumber, &$sexual, &$birthdate, &$address, 
        &$residenceAddress, &$sameAsMailing, &$phone, &$email, &$wedding, &$selectedPackage, $reservationDate
    ));

    // 執行 SQL 語句
    if (sqlsrv_execute($stmtPatient)) {
        // 獲取剛插入的 Patient ID
        $lastPatientID = sqlsrv_fetch_array(sqlsrv_query($conn, "SELECT SCOPE_IDENTITY()"));

        // 將資料插入 Appointment 資料表
        $sqlAppointment = "INSERT INTO Appointments (Package_id,PatientID,ReservationDate) 
        VALUES (?, ?, ?)";

        // 使用 sqlsrv_prepare 函數，防止 SQL 注入攻擊
        $stmtAppointment = sqlsrv_prepare($conn, $sqlAppointment, array(
            &$selectedPackage, &$lastPatientID[0], &$reservationDate
        ));

        // 執行 SQL 語句
        // 執行 SQL 語句
        if (sqlsrv_execute($stmtAppointment)) {
           // echo "資料已成功提交到資料庫.";
            
            ;exit();
            
        }else {
            die(print_r(sqlsrv_errors(), true));}
        } 
        else {
            die(print_r(sqlsrv_errors(), true));
        }
            } catch (Exception $e) {
                echo "錯誤: " . $e->getMessage();
            }finally { sqlsrv_close($conn); // 關閉資料庫連接
        }
    } 

        

        // 使用 PDO 預備語句，防止 SQL 注入攻擊
        $stmt = $conn->prepare($sql);

        // 綁定參數
        $stmt->bindParam(':ChineseName', $chineseName);
        $stmt->bindParam(':EnglishName', $englishName);
        $stmt->bindParam(':IDNumber', $idNumber);
        $stmt->bindParam(':Sexual', $sexual);
        $stmt->bindParam(':Birthdate', $birthdate);
        $stmt->bindParam(':Address', $address);
        $stmt->bindParam(':ResidenceAddress', $residenceAddress);
        $stmt->bindParam(':SameAsMailing', $sameAsMailing, PDO::PARAM_INT);
        $stmt->bindParam(':Phone', $phone);
        $stmt->bindParam(':Email', $email);
        $stmt->bindParam(':Wedding', $wedding);
?>