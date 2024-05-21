<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>form</title>
    
    <!-- 引入 breadcrumbs.php -->
    <?php include 'breadcrumbs.php'; ?>
    <style>
        @import url('https://fonts.googleapis.com/earlyaccess/cwtexyen.css');    /*圓體*/
        .error-message {
            display: none; /* 初始不顯示 */
            width: 100%; /* 全寬 */
            background-color: #f8d7da; /* 背景色 */
            color: #721c24; /* 文字色 */
            text-align: center; /* 文字居中 */
            padding: 10px; /* 內邊距 */
            border: 1px solid #f5c6cb; /* 邊框 */
            position: fixed; /* 固定定位，隨著頁面滾動 */
            top: 0; /* 頂部對齊 */
            left: 0; /* 左側對齊 */
            z-index: 1000; /* 確保在頂層 */
        }
    </style>
</head>
<script>
        function validateForm() {
            var idNumber = document.getElementById('id-number').value;
            var regex = /^[A-Z][0-9]{9}$/;
            if (!regex.test(idNumber)) {
                alert('身份證字號格式不正確，請輸入一個大寫英文字母後接九位數字。');
                return false; // 阻止表單提交
            }
            return true; // 允許表單提交
        }
        
        function copyAddress() {
            if (document.getElementById('same-as-mailing').checked) {
                document.getElementById('residence-address').value = document.getElementById('address').value;
            }
        }
    </script>
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
$randomCode = rand(100000, 999999); // 生成一組六位數字的隨機碼
echo '<!-- 調用 generateBreadcrumbs 函數，傳遞相應的頁面數據 -->';

        $pages = array(
            array('title' => '首頁', 'link' => 'index.php'),    // 首頁的連結指向 index.php
            array('title' => '線上預約', 'link' => 'reserve_online.php'),  
            array('title' => '選擇健檢日期', 'link' => 'calendar.php'), 
            array('title' => '填寫個資', 'link' => 'form.php'), 
        );
        generateBreadcrumbs($pages);
        ?>


<section class="form-section">
            <form id="checkform" action="checkform.php" method="post" onsubmit="return validateForm()">
                <div id="error-message" class="error-message"></div> <!-- 錯誤信息的顯示位置 -->

                <h2 class="form-title">基本資料填寫</h2>
                <!-- 表單內容，包括姓名、身份證號碼等輸入欄位 -->
                
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
                    "dietary-habit" => "飲食習慣",
                );

                
            

                foreach ($formFields as $fieldName => $fieldLabel) {
                    echo "<div class='form-group'>";
                    echo "<label for='$fieldName'>$fieldLabel";
                    if ($fieldName === "chinese-name" || $fieldName === "id-number" || $fieldName === "sexual" || $fieldName === "birthdate" || $fieldName === "address" || $fieldName === "phone" || $fieldName === "email" || $fieldName === "dietary-habit") {
                        echo " <span class='required'>*</span>";
                    }
                    echo "：</label>";

                    /*--自動給選項的欄位 --*/

                    if ($fieldName === "address" || $fieldName === "dietary-habit" || $fieldName === "sexual") {                       
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
                           

                        } elseif ($fieldName === "dietary-habit") {
                            $maritalStatusOptions = array("葷", "素");

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
                        // 設置出生日期的最大值是當前年份的12/31
                        $maxDate = date("Y") . "-12-31";
                        echo "<input type='date' id='$fieldName' name='$fieldName' required max='$maxDate'>";  // 使用日期選擇棄，並限制最大日期
                    } elseif ($fieldName === "same-as-mailing") {
                        echo "<input type='checkbox' id='$fieldName' name='$fieldName' onchange='copyAddress()'>";   //顯示與通訊地址相同的按鈕
                    } else {
                        echo "<input type='text' id='$fieldName' name='$fieldName'>";
                    }
                    echo "</div>";
                }             

                $reservationDate = isset($_GET['date']) ? $_GET['date'] : ''; //GET前一頁的DATE
                $selectedPackage = isset($_GET['package']) ? $_GET['package'] : ''; //Get選擇的套餐
                echo "<p><span style='font-size: 20px;'>預約日期: </span>" . $reservationDate . "</p>";

switch ($selectedPackage) {
    case 1:
        echo "<p><span style='font-size: 20px;'>健檢套餐: </span> 卓越C套餐</p>";
        break;
    case 2:
        echo "<p><span style='font-size: 20px;'>健檢套餐: </span> 卓越M套餐</p>";
        break;
    case 3:
        echo "<p><span style='font-size: 20px;'>健檢套餐: </span> 尊爵A套餐</p>";
        break;
    case 4:
        echo "<p><span style='font-size: 20px;'>健檢套餐: </span> 尊爵B套餐</p>";
        break;
    case 5:
        echo "<p><span style='font-size: 20px;'>健檢套餐: </span> 尊爵C套餐</p>";
        break;
    case 6:
        echo "<p><span style='font-size: 20px;'>健檢套餐: </span> 卓越C套餐</p>";
        break;
    default:
        echo "<p><span style='font-size: 20px;'>健檢套餐: </span> 未選擇</p>";
        break;
}
                
                // 戶籍地址自動填入通訊地址的 JavaScript 函式
                // 戶籍地址自動填入通訊地址的 JavaScript 函式
                echo "<script>
                function copyAddress() {
                    var mailingAddress = document.getElementById('address').value;
                    document.getElementById('residence-address').value = mailingAddress;
                }

                // 在頁面加載時顯示 reservationDate 和 selectedPackage 的值
                document.addEventListener('DOMContentLoaded', function() {
                    var reservationDate = new URLSearchParams(window.location.search).get('reservationDate');
                    var selectedPackage = new URLSearchParams(window.location.search).get('package');

                    // 顯示 reservationDate 和 selectedPackage 的值
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
                <input type="hidden" name="random_code" value="<?php echo $randomCode; ?>"> <!-- 存儲六位數字隨機碼的隱藏欄位 -->

                
                <!-- 按鈕 -->
                <div class="button-group">
                    <button type="submit" class="button3">送出</button>
                    <button type="reset" class="button3">重置</button>
                    
                </div>     

                
            </form>

            
        </section>
        </main>
        <script>
function validateForm() {
    var idNumber = document.getElementById('id-number').value;
    var regex = /^[A-Z][0-9]{9}$/;
    var errorMessageDiv = document.getElementById('error-message');

    if (!regex.test(idNumber)) {
        errorMessageDiv.style.display = 'block'; // 顯示錯誤信息
        errorMessageDiv.textContent = '身份證字號格式不正確，請輸入一個大寫英文字母後接九位數字。';
        return false; // 阻止表單提交
    }
    errorMessageDiv.style.display = 'none'; // 隱藏錯誤信息
    return true; // 允許表單提交
}

function copyAddress() {
    if (document.getElementById('same-as-mailing').checked) {
        document.getElementById('residence-address').value = document.getElementById('address').value; // 如果勾選同通訊地址，自動複製地址
    }
}
    </script>
    </body>
</html>