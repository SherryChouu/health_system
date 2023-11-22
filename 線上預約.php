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


<!--健檢類別查詢程式-->
<h2 >健檢類別</h2>
<hr width="100%"> <!--橫線-->


<div id="hc"> <!--第一層-->
    <div class="container"> <!--第二層-->
        <div class="row"><!--第三層-->

            <div class="col-md-4" button name="buttonA"></button>
                <a href="選擇欲健檢項目.php">
                <img src="images/hoshi.jpeg" class="img-responsive" alt="">
                <h3>我要預約</h3>
                </a>
            </div>
            
            <div class="col-md-4" button name="buttonB"></button>  
                <img src="images/hoshi.jpeg" class="img-responsive" alt="">
                <h3>預約記錄查詢</h3>
            </div>
            

        </div>
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