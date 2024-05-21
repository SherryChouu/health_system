<?php

header("Content-Type:text/html; charset=utf-8");

include 'sql_connect.php';


// 檢查是否是 POST 請求
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 這裡可以獲取表單提交的數據
    $chineseName = $_POST["chinese-name"];
    $englishName = $_POST["english-name"];
    $idNumber = $_POST["id-number"];

    // 正則表達式檢查身份證字號格式
    if (!preg_match("/^[A-Z][0-9]{9}$/", $idNumber)) {
        // 身份證字號格式不正確
        echo "<script>alert('身份證字號格式不正確，請重新填寫。(應為一個大寫字母配上9個數字)'); window.location.href='form.php';</script>";
        exit(); // 停止腳本執行
    }

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
    
    

    // 執行資料庫操作
    try {
        // 將資料插入 Patient 資料表
        $sqlPatient = "INSERT INTO Patient (ChineseName, EnglishName, IDNumber, Sexual, Birthdate, Address, ResidenceAddress, SameAsMailing, Phone, Email, Wedding, Package_id, ReservationDate, dietary_habits,random_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?)";

        // 使用 sqlsrv_prepare 函數，防止 SQL 注入攻擊
        $stmtPatient = sqlsrv_prepare($conn, $sqlPatient, array(
            $chineseName, $englishName, $idNumber, $sexual, $birthdate, $address, 
            $residenceAddress, $sameAsMailing, $phone, $email, $wedding, $selectedPackage, $reservationDate,$dietary_habits, $randomCode
        ));

        // 執行 SQL 語句
        if (sqlsrv_execute($stmtPatient)) {
            // 獲取剛插入的 Patient ID
            $lastPatientID = sqlsrv_fetch_array(sqlsrv_query($conn, "SELECT SCOPE_IDENTITY()"));

            // 將資料插入 Appointment 資料表
            $sqlAppointment = "INSERT INTO Appointments (Package_id, PatientID, ReservationDate) VALUES (?, ?, ?)";
            $stmtAppointment = sqlsrv_prepare($conn, $sqlAppointment, array(
                $selectedPackage, $lastPatientID[0], $reservationDate
            ));

            if (sqlsrv_execute($stmtAppointment)) {
                echo "資料已成功提交到資料庫.";
                exit();
            } else {
                die(print_r(sqlsrv_errors(), true));
            }
        } else {
            die(print_r(sqlsrv_errors(), true));
        }
    } catch (Exception $e) {
        echo "錯誤: " . $e->getMessage();
    } finally {
        sqlsrv_close($conn); // 關閉資料庫連接
    }
}
?>