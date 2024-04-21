<?php
// 導入必要的文件
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\AMP\php-8.2.11\PHPMailer-master\src\Exception.php';
require 'C:\AMP\php-8.2.11\PHPMailer-master\src\PHPMailer.php';
require 'C:\AMP\php-8.2.11\PHPMailer-master\src\SMTP.php';

// 配置SMTP
$mail = new PHPMailer(true);
try {
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // SMTP服务器地址
    $mail->SMTPAuth   = true;
    $mail->Username   = 'renaihealthcheck@gmail.com'; // SMTP用户名
    $mail->Password   = 'ixehchoociqvdate';   // SMTP密码
    $mail->SMTPSecure = 'tsl';
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
    $mail->Body = '您的預約已成功';

    // 發送郵件
    $mail->send();
    echo 'Confirmation email sent successfully!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>