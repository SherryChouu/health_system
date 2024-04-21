<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>聯絡我們</title>

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
                    <li><a href="reserve_online.php">線上預約</a></li>
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
            array('title' => '聯絡資訊', 'link' => 'contact.php'), // 健檢類別查詢的連結指向:contact.php 
        );
        generateBreadcrumbs($pages);
        ?>

    <div class= "title">
        <h2>聯絡資訊</h2>
        <hr width="70%"> <!--橫線-->
    </div>

        
        <table class="type3">
                <tbody>
                    <tr class="category3">
                        <td class="c1" rowspan="4">聯絡電話</td>
                        <td colspan="2">02-27093600</td>
                    </tr>
                    <tr class="category3">
                        <td class="c2" rowspan="3">分區分機</td>
                        <td>高階健檢 # 1061、1063</td>
                    </tr>
                    <tr class="category3">
                        <td>一般體檢、成人健檢 # 5205</td>
                    </tr>
                    <tr class="category3">
                        <td>老人健檢 # 5206、5209</td>
                    </tr>
                    <tr class="category3">
                        <td class="c1">傳真</td>
                        <td colspan="2">02-27039137 (週一至週五8:00-17:00)</td>
                    </tr>
                    <tr class="category3">
                        <td class="c1">醫療諮詢專線</td>
                        <td colspan="2">2709-3600 轉5157 回答醫療問題</td>
                    </tr>
                    <tr class="category3">
                        <td class="c1">E-mail</td>
                        <td colspan="2">A3630@tpech.gov.tw</td>
                    </tr>
                    <tr class="category3">
                        <td class="c1">地址</td>
                        <td colspan="2">台北市大安區仁愛路四段10號</td>
                    </tr>
                    <tr class="category3">
                        <td class="c1">捷運</td>
                        <td colspan="2">忠孝復興站(板南線、文湖線)／大安站(文湖線、淡水信義線)　步行約10分鐘可達本院區</td>
                    </tr>
                    <tr class="category3">
                        <td class="c1" rowspan="3">公車</td>
                        <td class="c2">仁愛大安路口</td>
                        <td colspan="2">37、245、261、263、270、311、621、630、651</td>
                    </tr>
                    <tr class="category3">
                        <td class="c2">仁愛復興路口</td>
                        <td colspan="2">37、245、261、263、270、311、621、630、651</td>
                    </tr>
                    <tr class="category3">
                        <td class="c2">仁愛醫院</td>
                        <td colspan="2">41、74、68、204、278、685</td>
                    </tr>
                    <tr class="category3">
                        <td class="c1">身障及博愛停車位</td>
                        <td colspan="2">本院區於一樓停車場區內設有身障停車格1格及博愛停車格4格供來院民眾停放，機車身障停車格6格設於醫療大樓與南棟之間。院區大門口設有復康巴士及無障礙計程車臨時停車區。</td>
                    </tr>
                </tbody>
            </table>  


</body>
</html>