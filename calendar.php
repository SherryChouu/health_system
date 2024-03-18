<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>月曆</title>

        <!-- 引入 breadcrumbs.php -->
        <?php include 'breadcrumbs.php'; ?>
    </head>

    <style>
        @import url('https://fonts.googleapis.com/earlyaccess/cwtexyen.css');    /*圓體*/

        table {
            
            width: 50%; /* 设置表格宽度为50% */
            border-collapse: collapse;
            margin: 50px auto; /* Increase the left and right margins to 100px */
            text-align:center;
           
        }
        th {
            border: 1px solid black;
            padding: 20px;
            text-align: center;
        }
        td{
            border: 1px solid black;
            padding: 10px; /*調間距*/
            text-align: center;
        }

        td:hover {
         /* background-color: pink;滑鼠移至時的背景色 */
        transition-duration: 0.3s;
        
    }
        .rl-button {
            padding: 10px 20px;   /* 使用 padding 調整按鈕內的間距 */
            margin: 50px; /* 使用 margin 調整按鈕之間的間距 */
            width:100px;
            height:70px;
            background-color: #7aa6cb; /*背景透明*/
            border: 2px solid white;
            border-radius: 10px;
            font-size:13px;


        }
        .rl-button:hover{
            padding : 10px 20px;
            background :linear-gradient(#f9fafb,#abc1cb);
            box-shadow:1px 1px 4px #ccc;
        }
        .button-container {
            display: flex;
            flex-direction: column; /* 垂直排列 */
            justify-content: space-between;
            align-items: flex-end; /* 右對齊 */
            margin-top: -410px;
            top: 0;
            width: 100%;
            padding: 5px;
            
        }

        .button-container button {
            margin-bottom: 2px; /* 調整按鈕之間的垂直間距 */
        }

        .top-block {
            /* 样式设置上方区块的样式 */
            color: #ffffff; /* 白色文本 */
            background-color: transparent; /*背景透明*/
            border: 2px solid #7aa6cb;
            padding: 20px;
            border-radius: 10px;
            width: 120px;
            color: black;
            
        }
        .week{
        border-color: transparent;
        font-size:20px;
        }
               
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
                    <li><a href="item_search.php">健檢類別查詢</a></li>
                    <li><a href="reserve_online.php">線上預約</a></li>
                    <li><a href="pay.php">繳費資訊</a></li>
                    <li><a href="contact.php">聯絡我們</a></li>
                </ul>
            </div>
        </nav>
    </main>
    </br>


    //麵包屑
<?php
    $pages = array(
        array('title' => '首頁', 'link' => 'index.php'), // 首頁的連結指向 index.php
        array('title' => '線上預約', 'link' => 'reserve_online.php'), 
        array('title' => '選擇欲健檢項目', 'link' => 'chooseitem.php'), 
        array('title' => '選擇預約日期', 'link' => 'calendar.php'), 
    );
    generateBreadcrumbs($pages);
    ?>

<div style="height: 600px;">
<?php


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

?>
<?php

// 設置時區
date_default_timezone_set('Asia/Taipei');


// 獲取當前日期
$currentDate = date('Y-m-d');

// 獲取兩周後的日期
$twoWeeksLater = date('Y-m-d', strtotime("+2 weeks", strtotime($currentDate)));

// 獲取當前日期的月份和年份
list($year, $month, $day) = explode('-', $twoWeeksLater);

// 獲取當前月份年份
$month = isset($_GET['month']) ? $_GET['month'] : date('m');
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');

// 獲取當前月份的第一天是星期幾
$first_day = mktime(0, 0, 0, $month, 1, $year);
$day_of_week = date('D', $first_day);

// 獲取當前月份天數
$num_days = date('t', $first_day);

// 計算預約開始日期（兩周後的日期）
$reservationStartDate = date('Y-m-d', strtotime("+2 weeks", strtotime($currentDate)));


echo "當前日期：$currentDate<br>";
echo "最快預約日期：$reservationStartDate<br>";

// 創建月曆表格
echo "<table border='2' style='border-collapse: collapse;'>";

echo "<th colspan='7'style='font-size: 40px'>$year 年 $month 月</th></tr>";
echo "<tr>
          <th class='week'>星期日</th>
          <th class='week'>星期一</th>
          <th class='week'>星期二</th>
          <th class='week'>星期三</th>
          <th class='week'>星期四</th>
          <th class='week'>星期五</th>
          <th class='week'>星期六</th>
      <tr>";

    // 上一個月和下一個月的按鈕
    $prevMonth = date('m', strtotime("-1 month", strtotime("$year-$month-01")));
    $prevYear = date('Y', strtotime("-1 month", strtotime("$year-$month-01")));
    $nextMonth = date('m', strtotime("+1 month", strtotime("$year-$month-01")));
    $nextYear = date('Y', strtotime("+1 month", strtotime("$year-$month-01")));
    ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 獲取所有具有 'selectable-day' 類別的元素
    var selectableDays = document.querySelectorAll('.selectable-day');

    // 對每個可選擇的日期元素添加點擊事件
    selectableDays.forEach(function(dayElement) {
        dayElement.addEventListener('click', function() {
            // 獲取日期數據，這裡假設日期數據儲存在元素的 data-date 屬性中
            var selectedDate = dayElement.getAttribute('data-date');

            
        });
    });
});
</script>




<?php
// 填充月曆表格
echo"<tr>";
$day = 1;
for ($i = 0; $i < 7; $i++) {
    if ($day_of_week == date('D', strtotime("Sunday +{$i} days"))) {
        break;
    }
    echo "<td style='background-color: white;border-color: white;text-align: center; vertical-align: top;'>
        <div style='background-color: #7aa6cb;padding: 15px;border-radius: 10px;width: 110px;color: #7aa6cb;padding: 20px;'>
        1</br>
        剩餘名額：10
            </div>
            </td>";   //最上排沒有日期的空白框
}
// 設置時區
date_default_timezone_set('Asia/Taipei');

// 獲取當前日期
$currentDate = date('Y-m-d');

// 獲取兩周後的日期
$twoWeeksLater = date('Y-m-d', strtotime("+2 weeks", strtotime($currentDate)));

// 獲取當前日期的月份和年份
list($year, $month, $day) = explode('-', $twoWeeksLater);

// 獲取當前月份年份
$month = isset($_GET['month']) ? $_GET['month'] : date('m');
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');

// 獲取當前月份的第一天是星期幾
$first_day = mktime(0, 0, 0, $month, 1, $year);
$day_of_week = date('D', $first_day);

// 獲取當前月份天數
$num_days = date('t', $first_day);

// 計算預約開始日期（兩周後的日期）
$reservationStartDate = date('Y-m-d', strtotime("+2 weeks", strtotime($currentDate)));

// 初始化 $day 和 $day_of_week 變數
$day = 1;
$day_of_week = date('D', strtotime("$year-$month-$day"));

while ($day <= $num_days) {
    
    if ($day_of_week == 'Sun') {
        echo "</tr><tr >";
    }
    
    // 將日期字串轉換為日期對象進行比較
    // 檢查日期是否在預約開始日期之前

    // $currentDate = "$year-$month-$day";  // 將這行移到迴圈外部初始化
    $dateIsBeforeReservationStart = ($currentDate < $reservationStartDate);

    // 檢查日期是否在最快預約日期之後
    $dateIsAfterReservationStart = ($currentDate >= $reservationStartDate);


    // 這裡插入了 SQL 查詢
    $reservationDate = "$year-$month-$day";

    // 設定套餐 ID，你可以根據實際需要修改
    $packageId = isset($_GET['package']) ? $_GET['package'] : 1;

    // 獲取預約數量
    $sqlAppointmentCount = "SELECT COUNT(AppointmentID) as ARD_Count FROM Appointments WHERE Package_id = ? AND ReservationDate = ?";
    $paramsAppointmentCount = array($packageId, $reservationDate);
    $stmtAppointmentCount = sqlsrv_prepare($conn, $sqlAppointmentCount, $paramsAppointmentCount);

    if (!$stmtAppointmentCount) {
        die(print_r(sqlsrv_errors(), true));
    }

    sqlsrv_execute($stmtAppointmentCount); 
    sqlsrv_fetch($stmtAppointmentCount);
    $ARD_Count = sqlsrv_get_field($stmtAppointmentCount, 0);

    // 獲取套餐預約人數上限
    $sqlMaxCapacity = "SELECT MaxCapacity FROM Packages WHERE Package_id = ?";
    $paramsMaxCapacity = array($packageId);
    $stmtMaxCapacity = sqlsrv_prepare($conn, $sqlMaxCapacity, $paramsMaxCapacity);

    if (!$stmtMaxCapacity) {
        die(print_r(sqlsrv_errors(), true));
    }

    sqlsrv_execute($stmtMaxCapacity); 
    sqlsrv_fetch($stmtMaxCapacity);
    $maxCapacity = sqlsrv_get_field($stmtMaxCapacity, 0);

    // 計算每天剩餘可預約人數
    $remainingCapacity = $maxCapacity - $ARD_Count;

    // 檢查 $_GET['package'] 是否存在。
    // 如果存在，它將 $_GET['package'] 的值賦給變數 $selectedPackage；
    // 如果不存在，則將空字串（''）賦給 $selectedPackage
    $selectedPackage = isset($_GET['package']) ? $_GET['package'] : '';  //Get選擇的套餐

    // 設定超連結的目標 URL，其中包括日期和套餐的資訊，這些資訊將被傳遞到 form.php 頁面。
    
// 預約格子內
if ($remainingCapacity <= 0 || $dateIsBeforeReservationStart) {
    // 如果剩餘可預約人數為零或者當前日期在最快可預約日期之前，則顯示額滿
    echo "<td style='text-align: left; vertical-align: top; border-color: white; '>
            <div class='top-block' style='color: black; background-color: #ccc;'>
                $day 日<div style='text-align: center;font-size:16px;color:black'>額&nbsp;&nbsp;滿</div>
            </div>
          </td>";
} else if ($remainingCapacity > 0 && !$dateIsBeforeReservationStart) {
    // 如果剩餘可預約人數大於零且當前日期在最快可預約日期之後，則顯示可預約的連結
    echo "<td style='text-align: left; vertical-align: top; border-color: white; background-color: white;' class='selectable-day' data-date='$reservationDate'>
        <a href='form.php?date=$reservationDate&package=$selectedPackage' style='display: block; color: inherit; text-decoration: none;'>
            <div class='top-block' onmouseover='this.style.backgroundColor=\"#7aa6cb\"' onmouseout='this.style.backgroundColor=\"\"'>
                $day 日</br>剩餘名額：$remainingCapacity
            </div>
        </a>
      </td>";
} else {
    // 如果以上條件都不滿足，則顯示一個空白的格子
    echo "<td style='background-color: white; border-color: white;'></td>";
}


    $day++;
    $day_of_week = date('D', strtotime("$year-$month-$day"));
    $currentDate = date('Y-m-d', strtotime("$year-$month-$day"));
    
}


while ($day_of_week != 'Sun') {
    echo "<td style='background-color: white;border-color: white;text-align: left; vertical-align: top;'>
    <div style='background-color: #7aa6cb;padding: 15px;border-radius: 10px;width: 110px;color: #7aa6cb;padding: 20px;'>
        1</br>
        剩餘名額：10
            </div>
    </td>";  //最下排沒有日期的空白框
    $day_of_week = date('D', strtotime("+1 day", strtotime($day_of_week)));
}
echo "</tr>";

// 結束月曆表格
echo "</table>";

// 初始化 $day 和 $day_of_week 變數
$day = 1;
$day_of_week = date('D', strtotime("$year-$month-$day"));

// 剩餘名額表格
echo "<table border='2' style='border-collapse: collapse;'>";
echo "<tr><th>日期</th><th>剩餘名額</th></tr>";

while ($day <= $num_days) {
    // 獲取當天日期
    $reservationDate = "$year-$month-$day";

    // 進行與預約相關的 SQL 查詢，獲取剩餘名額
    // 這部分的程式碼需要根據您的資料庫結構和查詢方式進行調整

    // 假設您已經從資料庫中獲取了 $remainingCapacity 變數，這是每天的剩餘名額

    // 顯示每一天的剩餘名額
    echo "<tr><td>$reservationDate</td><td>$remainingCapacity</td></tr>";

    $day++;
    $day_of_week = date('D', strtotime("$year-$month-$day"));
}

?>


</div>
<?php
$package = isset($_GET['package']) ? $_GET['package'] : '';

switch ($package) {
    case '3':
        // 顯示套餐A的月曆內容
        //echo '<div>這是尊爵A的月曆</div>';
        break;
    case '4':
        // 顯示套餐B的月曆內容
        //echo '<div>這是尊爵B的月曆</div>';
        break;
    case '5':
         //顯示套餐B的月曆內容
        //echo '<div>這是尊爵C的月曆</div>';
        break;
    case '6':
        // 顯示套餐A的月曆內容
        //echo '<div>這是尊爵D的月曆</div>';
        break;
    case '1':
        // 顯示套餐B的月曆內容
        //echo '<div>這是卓越C的月曆</div>';
        break;
    case '2':
        // 顯示套餐B的月曆內容
        //echo '<div>這是卓越M的月曆</div>';
        break;



    // 其他套餐的處理
    default:
        //echo '<div>未知套餐</div>';
        break;
}
?>

<div class="button-container">
<?php 
$earliestAllowedMonth = date('m', strtotime($reservationStartDate)); // 最早允許的月份
$earliestAllowedYear = date('Y', strtotime($reservationStartDate)); // 最早允許的年份

     //上一個月按鈕 
    if ($month != $earliestAllowedMonth || $year != $earliestAllowedYear) {
    $prevMonth = date('m', strtotime("-1 month", strtotime("$year-$month-01")));
    $prevYear = date('Y', strtotime("-1 month", strtotime("$year-$month-01")));
    echo "<a href='?package=$package&month=$prevMonth&year=$prevYear'><button class='rl-button'>上一個月</button></a>";
}
?>
<!-- 回到當月按鈕 -->
<a href="?package=<?php echo $package; ?>&month=<?php echo date('m'); ?>&year=<?php echo date('Y'); ?>"><button class="rl-button"><?php echo "回到當月"; ?></button></a>

<!-- 下一個月按鈕 -->
<a href="?package=<?php echo $package; ?>&month=<?php echo $nextMonth; ?>&year=<?php echo $nextYear; ?>"><button class="rl-button"><?php echo "下一個月"; ?></button></a>

</div>
</body>
</html>