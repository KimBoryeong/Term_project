<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Untitled Document</title>
    <link href="main.css" type="text/css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
    <div class="header">
        <img src="main_text.png" id="main_text" />
        <div class="container" onclick="location.href='login_form.php'" id="login">
            <img src="login.png" id="login_img">
        </div>
        
        <?php
          require_once("tools.php"); //tools.php 함수 사용하기 위한 호출

          readSessionVar('generate');

          if(isset($_SESSION['uid'])){         
              
              $username = readSessionVar('name');
              echo $username,"님 반갑습니다<br>";

       ?>

    </div>

    <div class="row">
        <div class="column">
            <center>
                <div id=text>
                    <h4>세상에 단 하나, 오늘의 당신을 위해서</h4>
                </div>
                <div class="container">
                    <div class="imageBox">
                        <img src="1.png">
                        <div class="textBox">
                            <h1>MINI SIZE</h1>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="imageBox">
                        <img src="3.png">
                        <div class="textBox">
                            <h1>MEDIUM SIZE</h1>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="imageBox">
                        <img src="2.png">
                        <div class="textBox">
                            <h1>LARGE SIZE</h1>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="imageBox">
                        <img src="4.png">
                        <div class="textBox">
                            <h1>CONCEPT BOUQUET</h1>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>
    <div class="footer">
        <h5>@copyright</h5>
    </div>
</body>
</html>