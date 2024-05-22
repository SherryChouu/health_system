<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>

<body>
    <?php
    // 設定連線至資料庫的伺服器名稱和埠號
    $serverName = "SHERRYCHOU";

    // 設定連線選項，包括資料庫名稱、使用者名稱和密碼
    $connectionOptions = array(
        "Database" => "health_system", // 資料庫名稱
        "Uid" => "sa", // 使用者名稱
        "PWD" => "Sherry920710", // 密碼
        "CharacterSet" => "UTF-8"
    );

    // 使用 sqlsrv_connect 函數建立資料庫連線
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    // 檢查連線是否成功
    if (!$conn) {
        die(print_r(sqlsrv_errors(), true));
    }
?>

</body>
</html>