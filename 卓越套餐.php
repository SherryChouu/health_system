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
                    <a href="index.html">
                        <div class="logo">
                            <img src="images/logo_hospital.png" alt="醫院Logo">
                        </div>
                    </a>

                <h1 class= "title"><a href="index.php">仁愛醫院健檢中心</a></h1>
        <nav>
                <ul class="flex-nav">
                    <li><a href="健檢類別查詢.php">健檢類別查詢</a></li>
                    <li><a href="線上預約.php">線上預約</a></li>
                    <li><a href="#">繳費資訊</a></li>
                    <li><a href="#">聯絡我們</a></li>
                </ul>
            </div>
        </nav>
    </main>

    <div class="sidenav">
        <a href="菁英套餐.html">菁英套餐</a>
        <a href="卓越套餐.php">卓越套餐</a>
        <a href="尊爵套餐.php">尊爵套餐</a>
    </div>

    <div class="content">
        <h2>卓越套餐</h2>
    </div>

        <table class="type2">
            <thead>
            <tr class="category1">
                <th class="centered">科別</th>
                <th class="centered">檢查項目</th>
                <th class="centered">檢查意義</th>
                <th class="centered">卓越Ｃ</th>
                <th class="centered">卓越Ｍ</th>
            </tr>
            </thead>

            <tbody>
            <tr  >
                <td>一般檢查</td>
                <td>身高、體重、血壓、脈搏、腰圍</td>
                <td>理想體重範圍、血壓高低、心律是否正常</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr  class="category2">
                <td>眼科檢查</td>
                <td>視力、辨色力、眼壓</td>
                <td>是否需要矯正視力與是否有青光眼的篩檢</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr >
                <td rowspan="3">血液常規</td>
                <td>紅血球、血紅素、平均紅血球容積</td>
                <td>有無貧血及貧血原因診斷上的參考</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr>
                <td>白血球分類檢查、白血球</td>
                <td>藉由數量及分類鑑別感染、發炎、白血病…</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr>
                <td>血小板</td>
                <td>藉由血小板數量判斷凝血功能是否正常</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr class="category2">
                <td rowspan="4">肝機能</td>
                <td>GOT/GPT</td>
                <td>肝炎、肝硬化、肝腫瘤、膽道疾病診斷參考</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr class="category2">
                <td>膽紅素/直接膽紅素</td>
                <td>黃疸的程度及診斷參考</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr  class="category2">
                <td>總蛋白/白蛋白</td>
                <td>體內營養及免疫機能的參考</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr  class="category2">
                <td>r-GT/鹼性磷酸酵素</td>
                <td>肝膽道發炎、阻塞的診斷參考</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr>
                <td rowspan="2">腎機能</td>
                <td>肌酸酐/尿素氮檢查</td>
                <td>腎功能好壞及鑑別診斷的參考</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr>
                <td>尿酸檢查</td>
                <td>了解尿酸值是否偏高及臨床診療的參考</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr class="category2">
                <td rowspan="3">肝炎篩檢</td>
                <td>B型肝炎表面抗原測定</td>
                <td>了解是否感染B型肝炎，成為帶原者</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr  class="category2">
                <td>B型肝炎表面抗體測定</td>
                <td>了解是否對B型肝炎已有抗體產生</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr  class="category2">
                <td>C型肝炎抗體測定</td>
                <td>了解是否有C型肝炎感染</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr>
                <td rowspan="2">血糖測定</td>
                <td>飯前血糖檢查</td>
                <td>空腹血糖的數值，作為糖尿病診斷依據</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr>
                <td>醣化血色素</td>
                <td>了解近3個月期間血糖的數值，作為糖尿病診斷依據</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr class="category2">
                <td rowspan="4">血脂肪</td>
                <td>膽固醇</td>
                <td>心臟血管動脈硬化的危險指標</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr  class="category2">
                <td>三酸甘油脂</td>
                <td>動脈硬化及胰臟炎的危險指標</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr  class="category2">
                <td>高密度脂蛋白</td>
                <td>"好"的膽固醇，偏低則增加動脈硬化危險</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr  class="category2">
                <td>低密度脂蛋白</td>
                <td>"壞"的膽固醇，偏高則增加動脈硬化危險</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr>
                <td rowspan="2">甲狀腺</td>
                <td>(TSH) 甲狀腺刺激素</td>
                <td>篩檢甲狀腺功能亢進或偏低的診斷指標 </td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr>
                <td>Free T4（游離T4甲狀腺素）</td>
                <td>篩檢甲狀腺功能亢進或偏低的診斷指標</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr class="category2">
                <td>尿液檢查</td>
                <td>尿液檢查</td>
                <td>有無糖尿病、蛋白尿、尿道發炎感染疾病</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr>
                <td>糞便檢查</td>
                <td>糞便檢查潛血免疫分析</td>
                <td>有無腸胃道出血，異常排便等疾病</td>
                <td class="centered">❌</td>
                <td class="centered">✔️</td>
            </tr>
            <tr class="category2">
                <td>防癌篩檢</td>
                <td>乳房理學檢查(女性)</td>
                <td>檢查女性乳房有無腫塊，結節等異常</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr>
                <td>微量元素</td>
                <td>維生素D</td>
                <td>體內維生素D檢測</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr class="category2">
                <td rowspan="2">子宮頸癌精密篩檢</td>
                <td>辛柏抹片</td>
                <td rowspan="2">超薄抹片，唯一經過美國FDA認證及衛生署核准之精密子宮頸防癌篩檢</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr  class="category2">
                <td>（建議對象：女性有過性經驗者）</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr>
                <td rowspan="5">防癌篩檢</td>
                <td>胎兒蛋白(AFP)</td>
                <td>肝癌篩檢的參考指標</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr>
                <td>癌胚胎抗原(CEA)</td>
                <td>腸道癌症篩檢的參考指標</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr>
                <td>CA-199</td>
                <td>胰臟癌篩檢的參考指標</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr>
                <td>CA-125（女性）</td>
                <td>卵巢癌的參考指標（女性）</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr>
                <td>PSA(男性) </td>
                <td>攝護腺癌的參考指標（男性）</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr class="category2">
                <td rowspan="2">內視鏡</td>
                <td>胃鏡</td>
                <td>食道、胃、十二指腸有無發炎、潰瘍、腫瘤等</td>
                <td class="centered">✔️</td>
                <td class="centered">❌</td>
            </tr>
            <tr  class="category2">
                <td>全大腸鏡</td>
                <td>直腸、乙狀、升、橫、降結腸有無痔瘡、息肉、腫瘤等 </td>
                <td class="centered">✔️</td>
                <td class="centered">❌</td>
            </tr>
            <tr>
                <td rowspan="5">X光檢查</td>
                <td>胸部X光(正面)</td>
                <td>有無心臟擴大、肺結核、慢性肺疾、腫瘤等</td>
                <td class="centered" rowspan="5">任選2部位</td>
                <td class="centered" rowspan="5">任選2部位</td>
            </tr>
            <tr>
                <td>胸部X光(側面)</td>
                <td>肺結核、慢性肺疾、腫瘤等</td>
            </tr>
            <tr>
                <td>腹部X光</td>
                <td>有無腰椎側彎、關節病變、泌尿道結石等</td>
            </tr>
            <tr>
                <td>頸椎X光</td>
                <td>頸椎有無移位滑脫、關節病變等</td>
            </tr>
            <tr>
                <td>腰椎X光</td>
                <td>腰椎有無移位滑脫、關節病變等</td>
            </tr>
            <tr class="category2">
                <td>骨質密度</td>
                <td>骨質密度檢查</td>
                <td>骨質流失程度之檢測</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr>
                <td rowspan="2">高階儀器</td>
                <td>單一部位磁振造影或電腦斷層八擇一</td>
                <td>磁振造影（頭,腹,頸椎,腰椎,胸椎,骨盆腔）電腦斷層（肺部,心臟鈣化）</td>
                <td class="centered">❌</td>
                <td class="centered">✔️</td>
            </tr>
            <tr>
                <td>頭部、腹部磁振造影</td>
                <td>檢查結構有無腫瘤</td>
                <td class="centered">❌</td>
                <td class="centered">❌</td>
            </tr>
            <tr class="category2">
                <td rowspan="8">心臟內科</td>
                <td>靜式心電圖</td>
                <td>心室肥大、心肌缺氧、傳導異常、心律不整</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr  class="category2">
                <td>動脈硬化分析儀</td>
                <td>篩檢是否有周邊血管硬化阻塞等現象</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr  class="category2">
                <td>冠狀動脈血管攝影電腦斷層</td>
                <td rowspan="2">心臟功能與心血管疾病檢查</td>
                <td class="centered">❌</td>
                <td class="centered">❌</td>
            </tr>
            <tr class="category2">
                <td>冠狀動脈鈣化分析</td>
                <td class="centered">❌</td>
                <td class="centered">❌</td>
            </tr>
            <tr  class="category2">
                <td>頸部超音波</td>
                <td>頸動脈血管是否有硬化及狹窄阻塞</td>
                <td class="centered">❌</td>
                <td class="centered">❌</td>
            </tr>
            <tr  class="category2">
                <td>心臟超音波</td>
                <td>評估心臟整體收縮功能與心肌瓣膜結構是否異常</td>
                <td class="centered">❌</td>
                <td class="centered">❌</td>

            </tr>
            <tr  class="category2">
                <td>CRP反應蛋白</td>
                <td>身體發炎程度及心血管疾病風險之參考指數</td>
                <td class="centered">❌</td>
                <td class="centered">❌</td>
            </tr>
            <tr  class="category2">
                <td>運動型心電圖</td>
                <td>心臟冠狀動脈疾病危險程度的評估</td>
                <td class="centered">❌</td>
                <td class="centered">❌</td>
            </tr>
            <tr>
                <td>正子電腦斷層</td>
                <td>正子電腦斷層</td>
                <td>全身腫瘤篩檢</td>
                <td class="centered">❌</td>
                <td class="centered">❌</td>
            </tr>
            <tr class="category2">
                <td>營養科</td>
                <td>體脂肪分析</td>
                <td>分析身體組成</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr>
                <td>婦科</td>
                <td>婦科會診（女性)</td>
                <td>有無會陰部、子宮頸、子宮及卵巢等病變</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr class="category2">
                <td>超音波</td>
                <td>腹部超音波</td>
                <td>肝、膽、胰、脾、腎有無發炎、結石、腫瘤病變</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            <tr>
                <td rowspan="2">麻醉科</td>
                <td>執行胃鏡及全大腸鏡時麻醉科會診</td>
                <td>執行無痛內視鏡麻醉治療、減少受檢者身體不適</td>
                <td class="centered">✔️</td>
                <td class="centered">❌</td>

            </tr>
            <tr>
                <td>碳13尿素呼氣試驗</td>
                <td>幽門桿菌篩檢</td>
                <td class="centered">❌</td>
                <td class="centered">✔️</td>
            </tr>
            <tr class="category2">
                <td>家醫科</td>
                <td>綜合判讀</td>
                <td>專科醫師綜合評估,諮詢與建議</td>
                <td class="centered">✔️</td>
                <td class="centered">✔️</td>
            </tr>
            </tbody>
        </table>
        



</body>
</html>







</body>
</html>