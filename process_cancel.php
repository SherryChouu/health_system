<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>取消預約</title>
    <style>
        body {
            font-family: Arial, sans-serif; /* 設置字體 */
            background-color: #f4f4f4; /* 設置背景顏色 */
            display: flex;
            justify-content: center; /* 水平居中 */
            align-items: center; /* 垂直居中 */
            height: 100vh; /* 高度填滿視窗 */
            margin: 0; /* 移除邊距 */
        }
        .form-container {
            background-color: #ffffff; /* 背景顏色為白色 */
            padding: 20px; /* 內邊距 */
            border-radius: 15px; /* 邊框圓角 */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* 盒子陰影 */
            display: flex;
            flex-direction: column; /* 元素垂直排列 */
            align-items: center; /* 內容居中對齊 */
            width: fit-content; /* 寬度按內容調整 */
        }
        form {
            display: flex;
            flex-direction: column; /* 表單元素垂直排列 */
            align-items: center; /* 居中對齊 */
            width: 100%; /* 寬度為100% */
        }
        .form-field {
            display: flex;
            align-items: center; /* 內容垂直居中 */
            margin-bottom: 10px; /* 底部外邊距 */
        }
        label {
            margin-right: 10px; /* 標籤右邊距 */
        }
        input[type="text"] {
            padding: 8px; /* 輸入框內邊距 */
            border: 1px solid #ccc; /* 邊框 */
            border-radius: 10px; /* 邊框圓角 */
            margin-left: 10px; /* 與標籤間距 */
        }
        button {
            padding: 10px 20px; /* 按鈕內邊距 */
            border-radius: 10px; /* 邊框圓角 */
            background-color: rgb(3, 104, 185); /* 背景顏色 */
            color: white; /* 文字顏色 */
            border: none; /* 無邊框 */
            cursor: pointer; /* 滑鼠指標類型 */
            width: auto; /* 寬度自動 */
            margin-top: 20px; /* 上邊距 */
        }
        button:hover {
            background-color: #45a049; /* 鼠標懸停時的背景顏色 */
        }
    </style>
    <script>
        function confirmCancel(event) {
            event.preventDefault(); // 阻止表單的預設提交行為
            var idNumber = document.getElementById('idNumber').value; // 獲取身份證字號輸入值
            var captcha = document.getElementById('captcha').value; // 獲取驗證碼輸入值

            if (!idNumber || !captcha) {
                alert('請填寫所有字段'); // 若未填寫完整，彈出提示
                return;
            }

            // 創建確認對話框
            if (confirm('你確定要取消本次的健檢預約嗎?')) {
                // 用戶確認取消
                // 這裡可以添加 AJAX 請求向伺服器發送取消請求，並處理返回結果
                alert('已發送取消預約請求'); // 模擬發送請求
                // 這裡可以根據實際的伺服器響應進行處理，比如跳轉或顯示更多信息
            } else {
                // 用戶選擇不取消
                return;
            }
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h1>取消預約</h1>
        <form action="process_cancel.php" method="post" onsubmit="confirmCancel(event)">
            <div class="form-field">
                <label for="idNumber">身分證字號:</label>
                <input type="text" id="idNumber" name="idNumber" required>
            </div>
            <div class="form-field">
                <label for="captcha">驗證碼:</label>
                <input type="text" id="captcha" name="captcha" required>
            </div>
            <button type="submit">確認取消</button>
        </form>
    </div>
</body>
</html>