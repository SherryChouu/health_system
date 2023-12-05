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
                <li><a href="健檢類別查詢.php">健檢類別查詢</a></li>
                <li><a href="線上預約.php">線上預約</a></li>
                <li><a href="pay.php">繳費資訊</a></li>
                <li><a href="contact.php">聯絡我們</a></li>
            </ul>
        </div>
    </nav>
</main>


    <style>
        
        /* CSS for the gray box */
        .gray-box {
            background-color: #d3d3d377; /* Gray background color */
            width: 1000px; /* Width of the box */
            height: 200px; /* Height of the box */
            margin: 0 auto; /* Center horizontally */
            margin-top: 100px; /* Add some top margin for spacing */
            border-radius: 30px; /* Rounded corners */
            display: flex; /* Use flexbox to center content */
            flex-direction: column; /* Stack content vertically */
            align-items: center; /* Center content horizontally */
            justify-content: center; /* Center content vertically */
        }
        /* CSS for the text inside the gray box */
        .text-inside-box {
            text-align: center; /* Center text horizontally */
        }
    </style>

    <!-- Gray box -->
    <div class="gray-box">
        <div class="text-inside-box">
            <p style="font-size: 30px; font-weight: bold;">繳費方式</p>
            

            <!-- Additional information -->
            <p style="font-size: 20px; font-weight: bold;">除現金繳費外，亦辦理信用卡、悠遊卡支付醫療費用制度 </p>

        </div>
    </div>
    <!-- Rest of your body content... -->
</body>
</html>