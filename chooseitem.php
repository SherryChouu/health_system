<!DOCTYPE html>
<html> 
    <head> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>選擇健檢項目</title>
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
                <li><a href="contact.php">繳費資訊</a></li>
                <li><a href="pay.php">聯絡我們</a></li>
            </ul>
        </div>
    </nav>
</main>

<!-- 調用 generateBreadcrumbs 函數，傳遞相應的頁面數據 -->
<?php
    $pages = array(
        array('title' => '首頁', 'link' => 'index.php'), // 首頁的連結指向 index.php
        array('title' => '線上預約', 'link' => '線上預約.php'), 
        array('title' => '選擇欲健檢項目', 'link' => 'chooseitem.php'), 
    );
    generateBreadcrumbs($pages);
    ?>

<div class= "title">
    <h2>選擇欲健檢項目</h2>
    <hr width="70%"> <!--橫線-->
</div>
        <div class="ck">
            <a href="月曆.php?package=3"><button type="button" class="button1">尊爵Ａ</button></a>
            <a href="月曆.php?package=4"><button type="button" class="button1">尊爵Ｂ</button></a>
            <a href="月曆.php?package=5"><button type="button" class="button1">尊爵Ｃ</button></a>
            <a href="月曆.php?package=6"><button type="button" class="button2">尊爵Ｄ</button></a>
            <a href="月曆.php?package=1"><button type="button" class="button2">卓越Ｃ</button></a>
            <a href="月曆.php?package=2"><button type="button" class="button2">卓越Ｍ</button></a>
        </div>

    </body>

</html>