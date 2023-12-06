<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formstyle.css">
    <title>form</title>
    
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
                <h1 class="title"><a href="index.php">仁愛醫院健檢中心</a></h1>
                <nav>
                    <ul class="flex-nav">
                        <li><a href="item_search.php">健檢類別查詢</a></li>
                        <li><a href="reserve_online.php">線上預約</a></li>
                        <li><a href="pay.php">繳費資訊</a></li>
                        <li><a href="contact.php">聯絡我們</a></li>
                    </ul>
                </nav>
            </div>

    <!-- 調用 generateBreadcrumbs 函數，傳遞相應的頁面數據 -->
    <?php
        $pages = array(
            array('title' => '首頁', 'link' => 'index.php'),    // 首頁的連結指向 index.php
            array('title' => '線上預約', 'link' => 'reserve_online.php'), 
            array('title' => '選擇欲健檢項目', 'link' => 'chooseitem.php'), 
            array('title' => '選擇健檢日期', 'link' => 'calendar.php'), 
            array('title' => '填寫個資', 'link' => 'form.php'), 
        );
        generateBreadcrumbs($pages);
        ?>


        <section class="form-section">
            <!--指定了表單提交的目標 URL 為 submit_form.php-->
            <form id="submit_form" action="submit_form.php" method="post">  
                <h2 class="form-title">基本資料填寫</h2>

                <?php
                // 定義表單項目和其對應的名稱
                $formFields = array(
                    "chinese-name" => "中文姓名",
                    "english-name" => "英文姓名",
                    "id-number" => "身份證字號",
                    "sexual" => "生理性別",
                    "birthdate" => "出生日期",
                    "address" => "通訊地址",
                    "residence-address" => "戶籍地址",
                    "same-as-mailing" => "與通訊地址相同",
                    "phone" => "聯絡電話",
                    "email" => "電子郵件",
                    "wedding" => "婚姻狀態",
                );

                foreach ($formFields as $fieldName => $fieldLabel) {
                    echo "<div class='form-group'>";
                    echo "<label for='$fieldName'>$fieldLabel";
                    if ($fieldName === "chinese-name" || $fieldName === "id-number" || $fieldName === "sexual" || $fieldName === "birthdate" || $fieldName === "address" || $fieldName === "phone" || $fieldName === "email") {
                        echo " <span class='required'>*</span>";
                    }
                    echo "：</label>";

                    /*--自動給選項的欄位 --*/

                    if ($fieldName === "address" || $fieldName === "wedding" || $fieldName === "sexual") {                       
                        echo "<select id=$fieldName  name='$fieldName' required>"; //這段很重要 id、name是屬性
                        echo "<option value=''>請選擇...</option>";

                        if ($fieldName === "address") {
                            $taiwanCities = array(
                                "台北市", "新北市", "桃園市", "台中市", "台南市", "高雄市",
                                "基隆市", "新竹市", "嘉義市", "新竹縣", "苗栗縣", "彰化縣",
                                "南投縣", "雲林縣", "嘉義縣", "屏東縣", "宜蘭縣", "花蓮縣",
                                "台東縣", "澎湖縣", "金門縣", "連江縣"
                            );

                            foreach ($taiwanCities as $city) {
                                echo "<option value='$city'>$city</option>";
                            }
                           

                        } elseif ($fieldName === "wedding") {
                            $maritalStatusOptions = array("未婚", "已婚", "離婚", "鰥寡", "同居", "分居");

                            foreach ($maritalStatusOptions as $status) {
                                echo "<option value='$status'>$status</option>";
                            }
                        } elseif ($fieldName === "sexual") {
                            $sexualOptions = array("男", "女");

                            foreach ($sexualOptions as $option) {
                                echo "<option value='$option'>$option</option>";
                            }
                        }

                        echo "</select>";

                        
                    } elseif ($fieldName === "birthdate") {
                        echo "<input type='date' id='$fieldName' name='$fieldName' required>";  //使用日期選擇器
                    } elseif ($fieldName === "same-as-mailing") {
                        echo "<input type='checkbox' id='$fieldName' name='$fieldName' onchange='copyAddress()'>";   //顯示與通訊地址相同的按鈕
                    } else {
                        echo "<input type='text' id='$fieldName' name='$fieldName'>";
                    }
                    echo "</div>";
                }             

                $reservationDate = isset($_GET['date']) ? $_GET['date'] : ''; //GET前一頁的DATE
                $selectedPackage = isset($_GET['package']) ? $_GET['package'] : ''; //Get選擇的套餐
                echo "Reservation Date:" .$reservationDate;   //顯示預約日期
                echo "Selected Package:". $selectedPackage;
   
                // 戶籍地址自動填入通訊地址的 JavaScript 函式
                // 戶籍地址自動填入通訊地址的 JavaScript 函式
                echo "<script>
                function copyAddress() {
                    var mailingAddress = document.getElementById('address').value;
                    document.getElementById('residence-address').value = mailingAddress;
                }

                // 在页面加载时显示 reservationDate 和 selectedPackage 的值
                document.addEventListener('DOMContentLoaded', function() {
                    var reservationDate = new URLSearchParams(window.location.search).get('reservationDate');
                    var selectedPackage = new URLSearchParams(window.location.search).get('package');

                    // 显示 reservationDate 和 selectedPackage 的值
                    if (reservationDate) {
                        console.log('Reservation Date:', reservationDate);
                    }

                    if (selectedPackage) {
                        console.log('Selected Package:', selectedPackage);
                    }
                });
                </script>";

                ?>
                <!-- 在表單中加入套餐和日期的隱藏欄位 -->  
                <input type="hidden" name="package" value="<?php echo $selectedPackage; ?>">
                <input type="hidden" name="reservationDate" value="<?php echo $reservationDate; ?>">
                
                <!-- 按鈕 -->
                <div class="button-group">
                    <button type="submit">送出</button>
                    <button type="reset">重置</button>
                    
                </div>         

            </form>

            
        </section>
        </main>
    </body>
</html>