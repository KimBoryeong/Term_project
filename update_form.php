<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Member Join</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<?php
        require_once("MemberDAO.php");
        require_once("tools.php");
    
        session_start();
        
        $uid = isset($_SESSION["uid"])?$_SESSION["uid"]:"";

        $mdao = new MemberDAO();
        $member  = $mdao->getMember($uid);
        if(!$member){
            errorBack("[$uid]그런 사람은 없습니다.");
            exit();
        }

    /* uid를 이용하 db에 질의 */

    ?>

    <body>
        <div class="container">
            <h2>회원정보수정</h2>
            <p>회원정보 수정을 위해 아래의 모든 정보를 작성해 주세요.</p>
            <form action="update.php" method="post">
                <div class="form-group">
                    <label for="id">Id:</label>
                    <!-- 어떤 태그를 위한 네임인지 -->
                    <input type="text" class="form-control" readonly id="usr" name="id" value="<?= $member["id"] ?>">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" name="pw" value=" <?= $member["pw"] ?>">
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $member["name"]?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <!--클래스는 여러개 가질 수 있음. 라벨 안에다 인풋을 넣어도 됨-->

            </form>
        </div>
    </body>

</html>
