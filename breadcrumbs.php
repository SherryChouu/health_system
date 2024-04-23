<!-- breadcrumbs.php -->

<!-- 這頁是寫麵包屑導航，例如:首頁>健檢類別查詢>尊爵套餐 -->

<style>
    /* 添加麵包屑導航的樣式 */
    .breadcrumbs-nav {
        background-color: #f9f9f9;
        padding: 1px; /*框的寬*/
        border-radius: 10px; /*圓角*/
        margin-top:100px ; /*頂部和框的距離*/
        margin-left:240px ;
        margin-right: 240px;  
        align-items: center; 
    }

    .breadcrumbs-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
    }

    .breadcrumbs-item {
        margin-right: 10px; /* 項目間距 */
        display: block; 
        align-items: center; 
        display: flex;
        position: relative;
    }

    .breadcrumbs-link {
        text-decoration: none;
        color: #333;
        transition: color 0.3s; /* 添加顏色過渡效果 */
    }

    .breadcrumbs-link:hover {
        color: #7aa6cb; /* 滑鼠懸停時淺藍色 */
    }

    .breadcrumbs-item::after {
        content: " > ";
        margin-left: 2px; /* 加上右箭頭後的間距 */
        margin-right: 2px ;
        color: #333; /* 箭頭颜色 */
        font-size: 20px; /* ">" 的大小 */
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }

    .breadcrumbs-item:first-child::after {
        content: none;
    }
    
</style>

<?php
// 定義生成麵包屑導航的函數
function generateBreadcrumbs($pages)
{
    // 輸出麵包屑導航的開始標籤
    echo '<nav class="breadcrumbs-nav">';
    echo '<ol class="breadcrumbs-list">';

    // 遍歷每個頁面，生成相應的麵包屑導航項目
    foreach ($pages as $page) {
        echo '<li class="breadcrumbs-item">';
        // 如果是當前頁面，只輸出標題，否則生成帶有連結的鏈接
        if (isset($page['current']) && $page['current']) {
            echo $page['title'];
        } else {
            echo '<a class="breadcrumbs-link" href="' . $page['link'] . '">' . $page['title'] . '</a>';
        }
        echo '</li>';
    }

    // 輸出麵包屑導航的結束標籤
    echo '</ol>';
    echo '</nav>';
}
?>
