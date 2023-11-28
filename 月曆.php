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
        td:hover {
        background-color: #f0f0f0; /* 滑鼠移至時的背景色 */
        transition-duration: 0.3s;
        
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
    </style>

<body>
<main>       
            <div class="navbar">
                    <a href="index.html">
                        <div class="logo">
                            <img src="images/logo_hospital.png" alt="醫院Logo">
                        </div>
                    </a>

                <h1 class= "title"><a href="index.html">仁愛醫院健檢中心</a></h1>
        <nav>
                <ul class="flex-nav">
                    <li><a href="健檢類別查詢.html">健檢類別查詢</a></li>
                    <li><a href="線上預約.php">線上預約</a></li>
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

// 計算6個月後的日期
$limitDate = date('Y-m-d', strtotime("+6 months"));

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
    
    echo "<td style='text-align: left; vertical-align: top;'class='selectable-day' data-date='$year-$month-$day'>$day</td>";
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 獲取所有具有 'selectable-day' 類別的元素
    var selectableDays = document.querySelectorAll('.selectable-day');

    // 對每個可選擇的日期元素添加點擊事件
    selectableDays.forEach(function(dayElement) {
        dayElement.addEventListener('click', function() {
            // 獲取日期數據，這裡假設日期數據儲存在元素的 data-date 屬性中
            var selectedDate = dayElement.getAttribute('data-date');

            // 在這裡你可以進一步處理所選日期，例如顯示在畫面上或發送到伺服器等
            alert('You clicked on ' + selectedDate);
        });
    });
});
</script>
</div>

<div class="button-container">
    <!-- 上一個月按鈕 -->
    <a href="?month=<?php echo $prevMonth; ?>&year=<?php echo $prevYear; ?>"><button class="rl-button"><?php echo "上一個月"; ?></button></a>
    
    <!-- 回到當月按鈕 -->
    <a href="?month=<?php echo date('m'); ?>&year=<?php echo date('Y'); ?>"><button class="rl-button"><?php echo "回到當月"; ?></button></a>
    
    <!-- 下一個月按鈕 -->
    <a href="?month=<?php echo $nextMonth; ?>&year=<?php echo $nextYear; ?>"><button class="rl-button"><?php echo "下一個月"; ?></button></a>
</div>
</body>
</html>