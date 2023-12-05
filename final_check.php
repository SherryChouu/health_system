<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formstyle.css">
    <title>finalcheck</title>
    
    <!-- 引入 breadcrumbs.php -->
    <?php include 'breadcrumbs.php'; ?>
</head>
<style>
    @import url('https://fonts.googleapis.com/earlyaccess/cwtexyen.css');    /*圓體*/
</style>
<body>
    <main>
        <div class="navbar">
            <a href="index.php">
                <div class="logo">
                    <img src="images/logo_hospital.png" alt="醫院Logo">
                </div>
            </a>
            <h1 class="title"><a href="index.php">仁愛醫院健檢中心</a></h1>
            <nav>
                <ul class="flex-nav">
                    <li><a href="健檢類別查詢.php">健檢類別查詢</a></li>
                    <li><a href="線上預約.php">線上預約</a></li>
                    <li><a href="pay.php">繳費資訊</a></li>
                    <li><a href="contact.php">聯絡我們</a></li>
                </ul>
            </nav>
        </div>
        <section class="form-section">
            <form>
            <h2 class="form-title">確認預約資料</h2>
<?php
        
    // 檢查是否有提交的表單數據
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    

        // 在这里你可以根据需要对数据进行进一步处理或显示
    echo "<h2>最終頁面 - 用戶填寫的資料</h2>";
    echo "<h3>中文姓名 : $chineseName</h3>";
    echo "<h3>英文姓名 : $englishName</h3>";
    echo "<h3>身份證字號 : $idNumber</h3>";
    echo "<h3>生理性別 : $sexual</h3>";
    echo "<h3>出生日期 : $birthdate</h3>";
    echo "<h3>通訊地址 : $address</h3>";
    echo "<h3>戶籍地址 : $residenceAddress</h3>";
    echo "<h3>與通訊地址相同: " . ($sameAsMailing ? '是' : '否') . "</h3>";
    echo "<h3>聯絡電話 : $phone</h3>";
    echo "<h3>電子郵件 : $email</h3>";
    echo "<h3>婚姻狀態 : $wedding</h3>";
    echo "<h2 style='color: green;'>所選套餐 : $selectedPackage</h2>";
    echo "<h2 style='color: green;'>預約日期 : $reservationDate</h2>";

        

    }
    ?>
            <div class="button-group">
                <button type="submit">確認提交</button>
                <button onclick="goBack()">重新填寫</button>
                <script>
                function goBack() {
                    window.history.back();
                }
                </script>
            </div>         
        </form>
    </section>

        </body>
</html>        