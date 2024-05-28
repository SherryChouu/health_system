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
            width: 700px; /* 用固定像素值替換百分比 */
            border-collapse: collapse;
            margin:10px auto; /* ，左右自動居中 */
            text-align: center;
        }

        th {
            border: 1px solid black;
            text-align: center;
        }
        td{
            border: 1px solid black;
            padding: 40px; /*調間距*/
            text-align: center;
            text-align: left; 
            vertical-align: top; 
            border-color: white;
        }

        td:hover {
            transition-duration: 0.3s;   
        }

        @media screen and (max-width: 800px) {
        /* 移除了對表格大小的修改，保持按鈕大小固定 */
         .rl-button {
            width: 100px; /* 移動設備上按鈕保持固定寬度 */
            height: 70px; /* 移動設備上按鈕保持固定高度 */
            font-size: 13px; /* 移動設備上按鈕保持固定字體大小 */
            margin: 20px; /* 如果需要，調整按鈕邊距 */
            }
       }      
       
        .rl-button {
            padding : 10px 20px;   /* 使用 padding 調整按鈕內的間距 */
            margin-right: 40px; /* 使用 margin 調整按鈕之間的間距 */  
            margin-left: 25px;        
            width: 80px; /* 固定寬度 */
            height: 100px; /* 固定高度 */
            background-color: #cad6e3; /* 背景顏色 */
            border: 2px solid white;
            border-radius: 10px;
            font-size: 15px; /* 固定字體大小 */
            box-sizing: border-box; /* 確保邊框和填充不會增加按鈕的大小 */
        }/* 選擇月份的按鈕 */
        
        .rl-button:hover{
            padding : 10px 20px;
            background :linear-gradient(#f9fafb,#cad6e3);
            box-shadow:1px 1px 4px #ccc;
        }/* 選擇月份的按鈕 */

        .button-container {
            position: fixed; /* 將容器固定 */
            bottom: 50%; /* 將容器置於頁面垂直中間 */
            right: 0; /* 將容器置於頁面右側 */
            transform: translateY(70%); /* 使用 transform 屬性進行垂直居中調整 */
            display: flex;
            flex-direction: column; /* 垂直排列 */
            justify-content: space-between;
            align-items: flex-end; /* 右對齊 */
            padding: 5px;
        } /* 選擇月份的按鈕 */

        .button-container button {
            margin-bottom: 2px; /* 調整按鈕之間的垂直間距 */
        }  /* 選擇月份的按鈕 */

        .top-block {
            color: #ffffff; /* 白色文本 */
            background-color: transparent; /*背景透明*/
            border: 2px solid #7aa6cb; /*邊框*/
            padding: 12px; /*月曆日期格子大小*/
            border-radius: 10px; /*圓角*/
            width: 120px;
            color: black;
        } /* 月曆日期的格子 */

        .week{
            border-color: transparent;
            font-size:20px;
            text-align: center;
            padding-top: 20px;
        }  /* 星期幾的文字 */

        .blank-cell{
            background-color: white;
            border-color: white;
            text-align: center; 
            vertical-align: top;
            color:black;
        }/* 每月多出來的空格 */
        .blank{ 
            background-color: #cad6e3;
            border-radius:10px;
            width: 120px;
            padding:14px;
            color: #cad6e3;
        }  /* 每月多出來的空格 */

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
                    </nav>
            </div>
</main>


<?php
    $pages = array(
        array('title' => '首頁', 'link' => 'index.php'), // 首頁的連結指向 index.php
        array('title' => '線上預約', 'link' => 'reserve_online.php'), 
        array('title' => '選擇預約日期', 'link' => 'calendar.php'), 
    );
    generateBreadcrumbs($pages);
?>


<?php
//將資料庫引入
include 'sql_connect.php';

// 設置時區
date_default_timezone_set('Asia/Taipei');

// 獲取當前月份年份
$month = isset($_GET['month']) ? $_GET['month'] : date('m');
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');

// 計算6個月後的日期
$limitDate = date('Y-m-d', strtotime("+6 months"));

// 獲取當前月份的第一天是星期幾
$first_day = mktime(0, 0, 0, $month, 1, $year);
$day_of_week = date('D', $first_day);

// 獲取當前月份天數
$num_days = date('t', $first_day);

// ***初始化 $currentDate 計算每天的日期
$currentDate = date('Y-m-d');

// ***初始化 $reservationStartDate 計算預約開始日期（兩周後的日期）
$reservationStartDate = date('Y-m-d', strtotime("+2 weeks", strtotime($currentDate)));

// 計算6個月後的日期
$limitDate = date('Y-m-d', strtotime("+6 months"));

echo "<div style='text-align: center;'>";
echo "<p style='display: inline-block; font-weight: bold; color: #0c416d;'>今天是 $currentDate </p>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<p style='display: inline-block; font-weight: bold; color: #0c416d;'>網路預約開放至 $limitDate</p>";
echo "</div>";




// 創建月曆表格
echo "<table border='2' style='border-collapse: collapse; border-radius: 10px;'>";
echo "<th colspan='7' style='font-size: 30px; border-bottom: 2px solid black; text-align: center; vertical-align: middle; line-height: 2;background-color: #f2f2f2;'>{$year} 年 {$month} 月</th></tr>";

echo "<tr>
        <th class='week' style='width: 12%;'>星期日</th>
        <th class='week' style='width: 12%;'>星期一</th>
        <th class='week' style='width: 12%;'>星期二</th>
        <th class='week' style='width: 12%;'>星期三</th>
        <th class='week' style='width: 12%;'>星期四</th>
        <th class='week' style='width: 12%;'>星期五</th>
        <th class='week' style='width: 12%;'>星期六</th>
    </tr>";

// 上一個月和下一個月的按鈕
$prevMonth = date('m', strtotime("-1 month", strtotime("$year-$month-01")));
$prevYear = date('Y', strtotime("-1 month", strtotime("$year-$month-01")));
$nextMonth = date('m', strtotime("+1 month", strtotime("$year-$month-01")));
$nextYear = date('Y', strtotime("+1 month", strtotime("$year-$month-01")));

// 初始化 $day 和 $day_of_week 變數
$day = 1;
$day_of_week = date('D', strtotime("$year-$month-$day"));

// 計算每個月開始的空白格子數量
$firstDayOfWeekIndex = array_search($day_of_week, ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']);
$blankCells = $firstDayOfWeekIndex;

// 補足每個月開始的空白格子
for ($i = 0; $i < $blankCells; $i++) {
    echo "<td class='blank-cell'>
                <div class='blank'>
                    1</br>
                    <br>剩餘名額：10
                </div>
            </td>";
}

// 設定起始日期 
$strcurrentDate = date('Y-m-d', strtotime("$year-$month-01"));  //strcurrentDate 指每天的日期
$strreservationStartDate = date('Y-m-d', strtotime("$strcurrentDate +14 day"));  //strreservationStartDate 指每天日期的最快預約日期

// 填充每個月的日期
while ($day <= $num_days) {
        
    // 如果是星期六或星期日，則顯示為假日
    if ($day_of_week == 'Sun' || $day_of_week == 'Sat') {
        echo "<td style='text-align: left; vertical-align: top; border-color: white; '>
                <div class='top-block' style='color: black; background-color:#f2f2f2;'>
                    $day 日<br><br>假日
                </div>
            </td>";
            // 如果是星期六，則換行
            if ($day_of_week == 'Sat') {
                echo "</tr><tr>"; // 換行
                $day_of_week = 'Sun'; // 重置星期幾
            }
    } else {
        // 這裡插入了 SQL 查詢
        $reservationDate = "$year-$month-$day";

        // 設定套餐 ID
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
        
        //<br>當前日期：$strcurrentDate<br>最快預約日期：$strreservationStartDate
        //<br>當前日期：$strcurrentDate<br>最遠預約日期：$limitDate 
        // 檢查是否在最快預約日期之前或與最快預約日期相等
        if ($strcurrentDate < $reservationStartDate) { //strcurrentDate < 最快預約日期
            // 在最快預約日期之前的每個日期都顯示"不可預約"
            echo "<td style='text-align: left; vertical-align: top; border-color: white; '>
                    <div class='top-block' style='color: black; background-color:#bdd4e8;'>
                        $day 日<br><br>不可預約
                    </div>
                </td>";
        } else if ($strcurrentDate >= $reservationStartDate && $strcurrentDate <= $limitDate){
            // 在最快預約日期之後且在限制日期內的情況下，顯示可預約的連結或額滿訊息
            if ($remainingCapacity > 0) {
                // 如果剩餘可預約人數大於0，則顯示可預約的連結
                echo "<td style='text-align: left; vertical-align: top; border-color: white; background-color: white;' class='selectable-day' data-date='$reservationDate'>
                    <a href='form.php?date=$reservationDate&package=$packageId' style='display: block; color: inherit; text-decoration: none;'>
                        <div class='top-block' onmouseover='this.style.backgroundColor=\"#b7d2ef\"' onmouseout='this.style.backgroundColor=\"\"'>
                            $day 日<br><br>剩餘名額：$remainingCapacity
                        </div>
                    </a>
                </td>";
            } else {
                // 如果剩餘可預約人數為0，則顯示額滿訊息
                echo "<td style='text-align: left; vertical-align: top; border-color: white; '>
                        <div class='top-block' style='color: red; background-color:white;'>
                            $day 日<br><br>額&nbsp;&nbsp;滿
                        </div>
                    </td>";
            }
        } else {
            // 超過最遠預約日期的日期顯示為尚未開放
            echo "<td style='text-align: left; vertical-align: top; border-color: white; '>
                   
                    <div class='top-block' style='color: white; background-color: #003D7A;'>
                        $day 日<br><br>尚未開放
                    </div>
                </td>";
        }
    }
    
    // 移動到下一天
    $strcurrentDate = date('Y-m-d', strtotime("$strcurrentDate +1 day"));
    $strreservationStartDate = date('Y-m-d', strtotime("$strreservationStartDate +1 day"));
    $day++;
    $day_of_week = date('D', strtotime("$year-$month-$day"));
}

// 補足本月結束的空白格子
$remainingBlankCells = 7 - (($num_days + $blankCells) % 7);
if ($remainingBlankCells != 7) {
    for ($i = 0; $i < $remainingBlankCells; $i++) {
        echo "<td class='blank-cell'>
                <div class='blank'>
                    1</br>
                    <br>剩餘名額：10
                </div>
            </td>";
    }
}

// 結束月曆表格
echo "</tr></table>";

?>

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
    $earliestAllowedMonth = date('m', strtotime($currentDate)); // 最早允許的月份
    $earliestAllowedYear = date('Y', strtotime($currentDate)); // 最早允許的年份

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
    <?php
    // 計算下一個月的日期
    $nextMonthDate = date('Y-m', strtotime('+1 month', strtotime("$year-$month-01")));

    // 檢查下一個月是否超過了 $limitDate
    if ($nextMonthDate <= $limitDate) {
        // 生成下一個月按鈕
        echo "<a href='?package=$package&month=$nextMonth&year=$nextYear'><button class='rl-button'>下一個月</button></a>";
    } else {
        // 顯示尚未開放
        echo "<button class='rl-button' disabled>尚未開放</button>";
    }
    ?>
</div>
</body>
</html>