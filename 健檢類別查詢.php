<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>健檢類別查詢</title>

        <!-- 引入 breadcrumbs.php -->
        <?php include 'breadcrumbs.php'; ?>
    </head>

    <style>
        @import url('https://fonts.googleapis.com/earlyaccess/cwtexyen.css');    /*圓體*/
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
                <li><a href="健檢類別查詢.php">健檢類別查詢</a></li>
                <li><a href="線上預約.php">線上預約</a></li>
                <li><a href="pay.php">繳費資訊</a></li>
                <li><a href="contact.php">聯絡我們</a></li>
            </ul>
        </div>
    </nav>
</main>


<!-- 調用 generateBreadcrumbs 函數，傳遞相應的頁面數據 -->
<?php
    $pages = array(
        array('title' => '首頁', 'link' => 'index.php'), // 首頁的連結指向 index.php
        array('title' => '健檢類別查詢', 'link' => '健檢類別查詢.php'), // 健檢類別查詢的連結指向:健檢類別查詢.php 
    );
    generateBreadcrumbs($pages);
    ?>


<!--健檢類別查詢-->
<div class= "title">
    <h2>健檢類別</h2>
    <hr width="70%"> <!--橫線-->
</div>

        <div class = "container">
            <div class=" box1">
                <a href="卓越套餐.php">
                    <img src="images/hoshi.jpeg" class= "img-responsive" alt="套餐查詢">
                    <h3>卓越套餐</h3>
                </a> 
            </div>

            <div class=" box1">
                <a href="尊爵套餐.php">
                    <img src="images/hoshi.jpeg" class= "img-responsive" alt="預約月曆">
                    <h3>尊爵套餐</h3>
                </a> 
            </div>  
        </div>





<script>
    // 導覽列元素
var navbar = document.querySelector('.navbar');

// 導覽列距離頁面頂部的初始位置
var initialOffset = navbar.offsetTop;

// 監聽滾動事件
window.onscroll = function() {
    // 頁面滾動距離超過初始位置則固定
    if (window.pageYOffset >= initialOffset) {
        navbar.classList.add('fixed');
    } else {
        navbar.classList.remove('fixed');
    }
};
</script>     



</body>
</html>