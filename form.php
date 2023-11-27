<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>個人資料填寫</title>
    <style>
        @import url('https://fonts.googleapis.com/earlyaccess/cwtexyen.css'); /*圓體*/
    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <a href="index.php">
                <div class="logo">
                    <img src="logo_hospital.png" alt="醫院Logo">
                </div>
            </a>
            <h1 class="title"><a href="index.php">仁愛醫院健檢中心</a></h1>
            <nav>
                <ul class="flex-nav">
                    <li><a href="健檢類別查詢.php">健檢類別查詢</a></li>
                    <li><a href="線上預約.php">線上預約</a></li>
                    <li><a href="#">繳費資訊</a></li>
                    <li><a href="#">聯絡我們</a></li>
                </ul>
            </nav>
        </div> <!-- Closing the .navbar div -->
    </header>
    <main>
        <section class="form-section">
            <form action="submit_data.php" method="post">
                <h2 class="form-title">填寫個人資料</h2>
                <!-- 中文姓名 -->
                <div class="form-group">
                    <label for="name">中文姓名 <span class="required">*</span>:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <!-- 英文姓名 -->
                <div class="form-group">
                    <label for="name">英文姓名:</label>
                    <input type="text" id="name" name="name" >
                </div>
                <!-- 身分證字號 -->
                <div class="form-group">
                    <label for="id-number">身份證字號 <span class="required">*</span>:</label>
                    <input type="text" id="id-number" name="id-number" required>
                </div>
                <div class="form-group">
                    <label for="sexual-select">性別 <span class="required">*</span>:</label>
                    <select id="sexual-select" name="wedding">
                        <option value="">請選擇...</option>
                        <option value="sexual1">男</option>
                        <option value="sexual2">女</option>
                        <!-- 更多性別選項 -->
                    </select>
                </div>
                <!-- 出生日期 -->
                <div class="form-group">
                    <label for="birthdate">出生日期 <span class="required">*</span>：</label>
                    <input type="date" id="birthdate" name="birthdate" required>
                </div>
                <!-- 通訊地址 -->
                <div class="form-group">
                    <label for="address">通訊地址 <span class="required">*</span>:</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <!-- 戶籍地址 -->
                <div class="form-group">
                    <label for="residence-address">戶籍地址:</label>
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
                    <label for="wedding-select">婚姻 :</label>
                    <select id="wedding-select" name="wedding">
                        <option value="">請選擇...</option>
                        <option value="wedding1">未婚</option>
                        <option value="wedding2">已婚</option>
                        <option value="wedding3">離婚</option>
                        <option value="wedding4">鰥寡</option>
                        <option value="wedding5">同居</option>
                        <option value="wedding6">分居</option>
                        <!-- 更多婚姻選項 -->
                    </select>
                </div>
                <!-- 按鈕 -->
                <div class="button-group">
                    <button type="submit">提交</button>
                    <button type="reset">重置</button>
                </div>
            </form>
        </section>
    </main>

    <!-- Footer code goes here -->

</body>
</html>