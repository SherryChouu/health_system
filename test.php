<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="formstyle.css">
        <title>填寫個人資料</title>
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

            <h1 class= "title"><a href="index.php">仁愛醫院健檢中心</a></h1>
    <nav>
            <ul class="flex-nav">
                <li><a href="健檢類別查詢.php">健檢類別查詢</a></li>
                <li><a href="線上預約.php">線上預約</a></li>
                <li><a href="contact.php">繳費資訊</a></li>
                <li><a href="pay.php">聯絡我們</a></li>
            </ul>
        </div>
    </nav>
</main><li><a href="#">繳費資訊</a></li>
                <li><a href="#">聯絡我們</a></li>

        <section class="form-section">
        <form action="submit_data.php" method="post">
                <h2 class="form-title">基本資料填寫</h2>
                <!-- 中文姓名 -->
                <div class="form-group">
                    <label for="name">中文姓名<span class="required">*</span>:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <!-- 英文姓名 -->
                <div class="form-group">
                <label for="english-name">英文姓名：</label>
                <input type="text" id="english-name" name="english-name">
                </div>
                <!-- 身分證字號 -->
                <div class="form-group">
                    <label for="id-number">身份證字號 <span class="required">*</span>:</label>
                    <input type="text" id="id-number" name="id-number" required>
                </div>
                <!-- 性別 -->
                <div class="form-group">
                    <label for="sexual-select">生理性別 <span class="required">*</span>:</label>
                    <select id="sexual-select" name="gender">
                        <option value="">請選擇...</option>
                        <option value="male">男</option>
                        <option value="female">女</option>
                        <!-- 更多性別選項 -->
                    </select>
                </div>
                <!-- 出生日期 -->
                <div class="form-group">
                    <label for="birthdate">出生日期 <span class="required">*</span>:</label>
                    <input type="date" id="birthdate" name="birthdate" required>
                </div>
                <!-- 通訊地址 -->
                <div class="form-group">
                    <label for="address">通訊地址 <span class="required">*</span>:</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <!-- 戶籍地址 -->
                <div class="form-group">
                    <label for="residence-address">戶籍地址：</label>
                    <input type="text" id="residence-address" name="residence-address">
                </div>

                <!-- 勾選框：與通訊地址相同 -->
                <div class="form-group">
                    <input type="checkbox" id="same-as-mailing" name="same-as-mailing">
                    <label for="same-as-mailing">與通訊地址相同</label>
                </div>
                <!-- 連絡電話 -->
                <div class="form-group">
                    <label for="phone">聯絡電話  <span class="required">*</span>：</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <!-- 電子郵件 -->
                <div class="form-group">
                    <label for="email">電子郵件 <span class="required">*</span>：</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <!-- 婚姻 -->
                <div class="form-group">
                <label for="wedding-select">婚姻：</label>
                <select id="wedding-select" name="marital-status">
                    <option value="">請選擇...</option>
                    <option value="single">未婚</option>
                    <option value="married">已婚</option>
                    <option value="divorced">離婚</option>
                    <option value="widowed">鰥寡</option>
                    <option value="cohabiting">同居</option>
                    <option value="separated">分居</option>
                        <!-- 更多婚姻選項 -->
                    </select>
                </div>
                <!-- 按鈕 -->
                <div class="button-group">
                    <button type="submit">提交</button>
                    <button type="reset">重置</button>
                </div>
                <?php
header("Content-Type:text/html; charset=utf-8");

// 設定連線至資料庫的伺服器名稱和埠號
$serverName = "DESKTOP-947P2F9";

// 設定連線選項，包括資料庫名稱、使用者名稱和密碼
$connectionOptions = array(
    "Database" => "health_system", // 資料庫名稱
    "Uid" => "sa", // 使用者名稱
    "PWD" => "1106Evelyn", // 密碼
    "CharacterSet" => "UTF-8"
);

// 使用 sqlsrv_connect 函數建立資料庫連線
$conn = sqlsrv_connect($serverName, $connectionOptions);
// 檢查連線是否成功
if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}


// 處理表單資料並插入資料庫
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_form"])) {
    $chineseName = $_POST["name"];
    $englishName = $_POST["english-name"];
    $idNumber = $_POST["id-number"];
    $sexual = $_POST["sexual"];
    $birthdate = $_POST["birthdate"];
    $mailingAddress = $_POST["address"];
    $residenceAddress = $_POST["residence-address"];
    $sameAsMailing = isset($_POST["same-as-mailing"]) ? 1 : 0;
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $wedding = $_POST["wedding"];

    // SQL 查詢以將資料插入資料庫
    $sql = "INSERT INTO Patient (chinese_name, english_name, id_number, sexual, birthdate, mailing_address, residence_address, same_as_mailing, phone, email, wedding) VALUES ('$chineseName', '$englishName', '$idNumber', '$sexual', '$birthdate', '$mailingAddress', '$residenceAddress', $sameAsMailing, '$phone', '$email', '$wedding')";

    $query = sqlsrv_query($conn, $sql);

    if ($query) {
        echo "資料成功插入";
    } else {
        echo "錯誤：" . print_r(sqlsrv_errors(), true);
    }
}

// 關閉資料庫連線
$conn->close();
?>

            </form>
        </section>
    </main>

    <!-- Footer code goes here -->

</body>
</html>