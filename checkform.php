<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Form</title>
    <style>
        /* 添加一些基本樣式 */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4; /* 整體背景颜色 */
        }
        .form-section {
            background-color: #fff; /* 淡灰色背景 */
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 90%; 
            max-width: 600px; /* 最大寬度 */
        }
        h2 {
            color: #333;
            text-align: center;
        }

        .form-data p {
            display: flex; /* 使用 Flexbox 布局 */
            align-items: center; /* 垂直居中 */
            margin: 10px 0;
            padding: 0 20px; 
            text-align: left; 
        }

         .form-data label {
            font-weight: bold;
            margin-right: 10px; 
        }

        input[type='hidden'] {
            display: none;
        }

        button {
            padding: 10px 20px;
            margin: 5px; 
            background-color: rgb(3, 104, 185);
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .button-group {
            text-align: center; 
        }
    </style>
</head>
<body>
    <div class="form-section">
        <h2>健檢資料確認</h2>
        <div class="form-data">
            <?php
            $labels = [
                'chinese-name' => '中文名稱',
                'english-name' => '英文名稱',
                'id-number' => '身份證字號',
                'sexual' => '性別',
                'birthdate' => '出生日期',
                'address' => '通訊地址',
                'residence-address' => '戶籍地址',
                'same-as-mailing' => '與通訊地址相同',
                'phone' => '聯絡電話',
                'email' => '電子郵件',
                'wedding' => '婚姻狀態',
                'package' => '健檢套餐',
                'reservationDate' => '預約日期'
            ];
       

            // 檢查是否有 POST 過來的資料
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // 遍歷所有的 POST 參數並顯示
                 foreach ($_POST as $key => $value) {
                     if (array_key_exists($key, $labels)) {
                     // 使用 htmlspecialchars 函數來避免 XSS 
                     $safeValue = htmlspecialchars($value);
                     echo "<p><label>{$labels[$key]}:</label><span>{$safeValue}</span></p>";
                }
            }
            
                $package = isset($_POST['package']) ? $_POST['package'] : '未選擇';
                $reservationDate = isset($_POST['reservationDate']) ? $_POST['reservationDate'] : '未選擇';
                echo "<p><label>預約日期: </label> $reservationDate</p>";
                switch ($package) {
                    case 1: echo "<p><label>健檢套餐: </label> 卓越C套餐</p>"; break;
                    case 2: echo "<p><label>健檢套餐: </label> 卓越M套餐</p>"; break;
                    case 3: echo "<p><label>健檢套餐: </label> 尊爵A套餐</p>"; break;
                    case 4: echo "<p><label>健檢套餐: </label> 尊爵B套餐</p>"; break;
                    case 5: echo "<p><label>健檢套餐: </label> 尊爵C套餐</p>"; break;
                    case 6: echo "<p><label>健檢套餐: </label> 卓越C套餐</p>"; break;
                    default: echo "<p><label>套餐: </label> 未選擇</p>";
                }
            }
            ?>
        </div>
        <div class="button-group">
            <!-- 發送確認郵件 -->
            <form action="send_confirmation_email.php" method="post" style="display: inline;">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    foreach ($_POST as $key => $value) {
                        echo "<input type='hidden' name='$key' value='$value'>";
                    }
                }
                ?>
                <button type="submit">確認資料</button>
            </form>

            <!-- 重新填寫按鈕 -->
            <form action="form.php" method="get" style="display: inline;">
                <button type="submit">重新填寫</button>
            </form>
        </div>
    </div>
</body>
</html>