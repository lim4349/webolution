<!DOCTYPE>
<html>

<head>
    <meta charset='utf-8' />
    <script type="text/javascript" src="main.js"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand">병만이</div>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="./main.php">Home</a>
                    </li>
                    <li>
                        <a href="./main.php">진단하기</a>
                    </li>
                    <li>
                      <a href="./main.php">병원찾기</a>
                    </li>
                    <li>
                      <a href="./main.php">약국찾기</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <img class="img_box" src="./logo.png" width="500px"height="200px" ></img>
    <div class="_form">
        <div class="input_disease">
            <form method="get" action="python.php" class="input_form">
              <p>내 증상 진단하기</p>
                <input type="text" name="symptom" placeholder="증상을 입력해주세요" class="input-증상" />
                <button class="button-one">진단하기</button>
            </form>
        </div>
        <br/><br/>
        <div class="select_hosp">
            <form method="get" action="http://168.188.123.189/~tnwjd4623/webolution/Api.php" class="hosp_form">
              <p>지역 병원 조회하기</p>
                <select id="type" name="type" required class="select">
                    <option value="" selected>병원선택</option>
                    <option value="내과">내과</option>
                    <option vlaue="외과">외과</option>
                    <option value="정형외과">정형외과</option>
                    <option value="치과">치과</option>
                    <option value="신경과">신경과</option>
                    <option value="성형외과">성형외과</option>
                    <option value="피부과">피부과</option>
                    <option value="안과">안과</option>
                    <option value="이비인후과">이비인후과</option>
                    <option value="비뇨기과">비뇨기과</option>
                </select>
                <select id="area1" name="area1" required class="select">
                    <option value="" selected>지역선택</option>
                    <option value="서울특별시">서울특별시</option>
                    <option value="인천광역시">인천광역시</option>
                    <option value="대전광역시">대전광역시</option>
                    <option value="울산광역시">울산광역시</option>
                    <option value="대구광역시">대구광역시</option>
                    <option value="광주광역시">광주광역시</option>
                    <option value="부산광역시">부산광역시</option>
                </select>
                <input type="text" name="area2" placeholder="구 입력" required class="input-구"> <button class="button-two">찾기</button>
            </form>
        </div>
        <br/><br/>
        <div class="select_hosp">
            <form method="get" action="http://168.188.123.189/~tnwjd4623/webolution/parmacy.php" class="hosp_form">
              <p>지역 약국 조회하기</p>
                <select id="area1" name="area1" required class="select">
                    <option value="" selected>지역선택</option>
                    <option value="서울특별시">서울특별시</option>
                    <option value="인천광역시">인천광역시</option>
                    <option value="대전광역시">대전광역시</option>
                    <option value="울산광역시">울산광역시</option>
                    <option value="대구광역시">대구광역시</option>
                    <option value="광주광역시">광주광역시</option>
                    <option value="부산광역시">부산광역시</option>
                </select>
                <input type="text" name="area2" placeholder="구 입력" required class="input-구"> <button class="button-two">찾기</button>
            </form>
        </div>
        <br/><br/>
    </div>
</body>

</html>
