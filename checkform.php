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
            font-size: 16px; /* 整體字體大小 */
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
            font-size: 24px; /* 標題字體大小 */
            margin-bottom: 20px; /* 標題底部間距 */
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
            font-size: 18px; /* 標籤字體大小 */
        }

        .form-data span {
            font-size: 18px; /* 內容字體大小 */
        }

        input[type='hidden'] {
            display: none;
        }

        button {
            padding: 10px 20px;
            margin: 5px; 
            background-color: #7aa6cb;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 18px; /* 按鈕字體大小 */
        }

        button:hover{
            background-color: #bbe4f8;
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
                'dietary-habit' => '飲食習慣',
                'package' => '健檢套餐',
                'reservationDate' => '預約日期'
            ];
       

            // 檢查是否有 POST 過來的資料
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // 遍歷所有的 POST 參數並顯示
                $idNumber = $_POST["id-number"];
                // 檢查身分證字號格式
                if (!preg_match("/^[A-Z][0-9]{9}$/", $idNumber)) {
                    $error_message = "身份證字號格式不正確，請重新填寫。(應為一個大寫字母配上9個數字)";
                } else {
                    // 這裡處理其餘的表單數據和資料庫操作
                    // 如果一切順利，可以重定向或顯示成功消息
                }

                 foreach ($_POST as $key => $value) {
                     // 處理與通訊地址相同的情況
                     if ($key == 'same-as-mailing') {
                         $safeValue = ($value == 'on') ? '是' : '否';
                     }
                     elseif ($key == 'package') {
                         // 將套餐的 ID 轉換為對應的套餐名稱
                         $package_name = getPackageName($value);
                         // 使用 htmlspecialchars 函數來避免 XSS 
                         $safeValue = htmlspecialchars($package_name);
                     } else {
                         $safeValue = htmlspecialchars($value);
                     }
                     
                     echo "<p><label>{$labels[$key]}:</label><span>{$safeValue}</span></p>";
                }
            }
            
            function getPackageName($package_id) {
                // 定義套餐資料
                $packages = [
                    '1' => '卓越C',
                    '2' => '卓越M',
                    '3' => '尊爵A',
                    '4' => '尊爵B',
                    '5' => '尊爵C',
                    '6' => '尊爵D'
                ];

                return isset($packages[$package_id]) ? $packages[$package_id] : '未選擇';
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
            <button onclick="history.back()">重新填寫</button>
        </div>
    </div>
</body>
</html>
