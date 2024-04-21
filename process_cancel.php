<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>取消預約</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* 設置背景顏色 */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff; /* 表單背景顏色 */
            padding: 20px;
            border-radius: 15px; /* 增加邊框圓弧效果 */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* 添加陰影 */
            display: flex;
            flex-direction: column;
            align-items: center;
            width: fit-content;
        }

        form {
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            width: 100%;
        }

        .form-field {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        label {
            margin-right: 10px; /* 標籤右邊距 */
        }

        input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 10px; /* 輸入欄位邊框圓弧效果 */
            margin-left: 10px; /* 與標籤間距 */
        }

        button {
            padding: 10px 20px;
            border-radius: 10px; /* 按鈕邊框圓弧效果 */
            background-color: rgb(3, 104, 185); /* 按鈕背景顏色 */
            color: white;
            border: none;
            cursor: pointer;
            width: auto;
            margin-top: 20px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>取消預約</h1>
        <form action="process_cancel.php" method="post">
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