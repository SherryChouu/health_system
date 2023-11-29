<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formstyle.css">
    <title>test</title>
    
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
                    <li><a href="健檢類別查詢.php">健檢類別查詢</a></li>
                    <li><a href="線上預約.php">線上預約</a></li>
                    <li><a href="contact.php">繳費資訊</a></li>
                    <li><a href="pay.php">聯絡我們</a></li>
                </ul>
            </nav>
        </div>

    <!-- 調用 generateBreadcrumbs 函數，傳遞相應的頁面數據 -->
    <?php
        $pages = array(
            array('title' => '首頁', 'link' => 'index.php'), // 首頁的連結指向 index.php
            array('title' => '線上預約', 'link' => '線上預約.php'), 
            array('title' => '選擇欲健檢項目', 'link' => 'chooseitem.php'), 
            array('title' => '選擇健檢日期', 'link' => '月曆.php'), 
            array('title' => '填寫個資', 'link' => 'testform.php'), 
        );
        generateBreadcrumbs($pages);
        ?>


<section class="form-section">
            <form action="submit_data.php" method="post">
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
                    "wedding" => "婚姻狀態"
                    // 添加其他表單項目
                );

                foreach ($formFields as $fieldName => $fieldLabel) {
                    echo "<div class='form-group'>";
                    echo "<label for='$fieldName'>$fieldLabel";
                    if ($fieldName === "chinese-name" || $fieldName === "id-number" || $fieldName === "sexual" || $fieldName === "birthdate" || $fieldName === "address" || $fieldName === "phone" || $fieldName === "email") {
                        echo " <span class='required'>*</span>";
                    }
                    echo "：</label>";

                    /*-- 自動給選項的欄位 -*/

                    if ($fieldName === "address" || $fieldName === "wedding" || $fieldName === "sexual") {
                        echo "<select id='$fieldName' name='$fieldName' required>";
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
                    } elseif ($fieldName === "same-as-mailing") {
                        echo "<input type='checkbox' id='$fieldName' name='$fieldName'>";   /*顯示與通訊地址相同的按鈕*/
                    } else {
                        echo "<input type='text' id='$fieldName' name='$fieldName'>";
                    }
                    echo "</div>";
                }
                ?>
                <!-- 按鈕 -->
                <div class="button-group">
                    <button type="submit">提交</button>
                    <button type="reset">重置</button>
                </div>
            </form>
        </section>
    </main>

    <!-- 頁尾代碼在這裡 -->
</body>
</html>