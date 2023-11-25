<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>健檢類別查詢</title>
    </head>

    <style>
        @import url('https://fonts.googleapis.com/earlyaccess/cwtexyen.css');    /*圓體*/

        table {
            
            width: 70%; /* 设置表格宽度为50% */
            border-collapse: collapse;
            margin: 20px; /* 设置表格外边距为20px */
            text-align:center;
            margin: 70px auto; /* 设置表格居中 */
        }
        th, td {
            border: 1px solid black;
            padding: 30px;
            text-align: center;
        }
        .rl-button {
            padding: 10px 20px;   /* 使用 padding 調整按鈕內的間距 */
            margin: 50px; /* 使用 margin 調整按鈕之間的間距 */
            width:100px;
            height:70px;
        }
        .rl-button:hover{
            padding : 10px 20px;
            background :linear-gradient(#f9fafb,#abc1cb);
            box-shadow:1px 1px 4px #ccc;
        }
    </style>

<body>
    <main>       
        <div class="navbar">
                <a href=#>
                    <div class="logo">
                        <img src="/Users/sherrychou/Desktop/專題素材/logo_hospital.png" alt="醫院Logo">
                    </div>
                </a>

            <h1 class= "title"><a href="#p1">仁愛醫院健檢中心</a></h1>
    <nav>
            <ul class="flex-nav">
                <li><a href="#">健檢類別查詢</a></li>
                <li><a href="#">線上預約</a></li>
                <li><a href="#">繳費資訊</a></li>
                <li><a href="#">聯絡我們</a></li>
            </ul>
        </div>
    </nav>
</main>
    </br>
    </br>
<div style="height: 600px;">
    <?php
// 設置時區
date_default_timezone_set('Asia/Taipei');

// 獲取當前月份年份
$month = isset($_GET['month']) ? $_GET['month'] : date('m');
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');

// 獲取當前月份的第一天是星期幾
$first_day = mktime(0, 0, 0, $month, 1, $year);
$day_of_week = date('D', $first_day);

// 獲取當前月份天數
$num_days = date('t', $first_day);

// 創建月曆表格
echo "<table border='2'>";
echo "<th><th colspan='7'>$month/$year</th></tr>";
echo "<tr><th>星期日</th><th>星期一</th><th>星期二</th><th>星期三</th><th>星期四</th><th>星期五</th><th>星期六</th><tr>";

// 填充月曆表格
echo"<tr>";
$day = 1;
for ($i = 0; $i < 7; $i++) {
    if ($day_of_week == date('D', strtotime("Sunday +{$i} days"))) {
        break;
    }
    echo "<td></td>";
}
while ($day <= $num_days) {
    if ($day_of_week == 'Sun') {
        echo "</tr><tr>";
    }
    echo "<td>$day</td>";
    $day++;
    $day_of_week = date('D', strtotime("+1 day", strtotime($day_of_week)));
}
while ($day_of_week != 'Sun') {
    echo "<td></td>";
    $day_of_week = date('D', strtotime("+1 day", strtotime($day_of_week)));
}
echo "</tr>";

// 結束月曆表格
echo "</table>";

// 上一個月和下一個月的按鈕
$prevMonth = date('m', strtotime("-1 month", strtotime("$year-$month-01")));
$prevYear = date('Y', strtotime("-1 month", strtotime("$year-$month-01")));
$nextMonth = date('m', strtotime("+1 month", strtotime("$year-$month-01")));
$nextYear = date('Y', strtotime("+1 month", strtotime("$year-$month-01")));
?>
</div>

<div style="display: flex; justify-content:space-between ; margin-top: -170px;top: 0; width: 100%;">
    <!-- 上一個月按鈕 -->
    <a href="?month=<?php echo $prevMonth; ?>&year=<?php echo $prevYear; ?>"><button class="rl-button"><?php echo "上一個月"; ?></button></a>
    
    <!-- 下一個月按鈕 -->
    <a href="?month=<?php echo $nextMonth; ?>&year=<?php echo $nextYear; ?>"><button class="rl-button"><?php echo "下一個月"; ?></button></a>
</div>


</div>
</body>
</html>