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
            margin: 20px;
        }
        h2 {
            color: #333;
        }
        .form-data {
            margin-top: 20px;
        }
        .form-data label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>用戶輸入的資料：</h2>
    <div class="form-data">
        <?php
        // 檢查是否有 POST 過來的資料
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // 遍歷所有的 POST 參數並顯示
            foreach ($_POST as $key => $value) {
                // 跳過隱藏欄位
                if ($key != 'package' && $key != 'reservationDate') {
                    echo "<p><label>$key: </label> $value</p>";
                }
            }
            // 顯示套餐和日期
$package = isset($_POST['package']) ? $_POST['package'] : '未選擇';
$reservationDate = isset($_POST['reservationDate']) ? $_POST['reservationDate'] : '未選擇';

echo "<p><label>預約日期: </label> $reservationDate</p>";

// 根據不同的套餐類型顯示相應的文字
switch ($package) {
    case 1:
        echo "<p><label>健檢套餐: </label> 卓越C套餐</p>";
        break;
    case 2:
        echo "<p><label>健檢套餐: </label> 卓越M套餐</p>";
        break;
    case 3:
        echo "<p><label>健檢套餐: </label> 尊爵A套餐</p>";
        break;
    case 4:
        echo "<p><label>健檢套餐: </label> 尊爵B套餐</p>";
        break;
    case 5:
        echo "<p><label>健檢套餐: </label> 尊爵C套餐</p>";
        break;
    case 6:
        echo "<p><label>健檢套餐: </label> 卓越C套餐</p>";
        break;
    default:
        echo "<p><label>套餐: </label> 未選擇</p>";
        break;
}
}
        ?>
    </div>
    <section class="form-section">
    <!-- 发送确认邮件 -->
    <form action="send_confirmation_email.php" method="post">
        <?php
        // 将原本的 POST 数据再次传送
        foreach ($_POST as $key => $value) {
            echo "<input type='hidden' name='$key' value='$value'>";
        }
        ?>
        <button type="submit">發送確認信件</button>
    </form>

    <!-- 重新填寫按鈕 -->
    <form action="form.php" method="get">
        <button type="submit">重新填寫</button>
    </form>
    </section>
</body>
</html>
