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

if ($conn) {
    echo "Success!!!<br>";

    $sql = "SELECT Department_ID, Department_name FROM Department";
    $query = sqlsrv_query($conn, $sql);

    if ($query === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // 檢查查詢結果是否有資料
    if (sqlsrv_has_rows($query)) {
        // 輸出每一行資料
        while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
            echo "ID: " . $row["Department_ID"] . " - Name: " . $row["Department_name"] . "<br>";
        }
    } else {
        echo "沒有資料";
    }

    // 釋放查詢結果資源
    sqlsrv_free_stmt($query);

    // 關閉資料庫連線
    sqlsrv_close($conn);
} else {
    echo "Error!!!<br>";
    die(print_r(sqlsrv_errors(), true));
}
?>
