<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>繳費資訊</title>

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
                    <li><a href="item_search.php">健檢類別查詢</a></li>
                    <li><a href="chooseitem.php">線上預約</a></li>
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
        array('title' => '繳費資訊', 'link' => 'pay.php'), // 健檢類別查詢的連結指向:pay.php 
    );
    generateBreadcrumbs($pages);
    ?>

    <div class= "title">
        <h2>繳費方式選擇</h2>
        <hr width="70%"> <!--橫線-->
    </div>

        <div class = "container">
                <div class=" pay1">
                        <img src="images\現金.png" class= "img-responsive">
                        <h3>臨櫃現金繳費</h3>
                    </a> 
                </div>

                <div class=" pay1">
                        <img src="images\信用卡.png" class= "img-responsive">
                        <h3>信用卡支付</h3>
                    </a> 
                </div>  

                <div class=" pay1"> 
                        <img src="images\悠遊卡.png" class= "img-responsive">
                        <h3>悠遊卡支付</h3>
                    </a> 
                </div> 
        </div>
</body>
</html