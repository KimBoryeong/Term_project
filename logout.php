<?php
    require_once("tools.php");//goNow 변수 사용을 위해 tools.php를 호출
    require_once("MemberDAO.php");

    session_start();
    
    unset($_SESSION["uid"]);
    unset($_SESSION["name"]);
    unset($_SESSION["pw"]);
    unset($_SESSION["addr"]);

    goNow(ORDER_PAGE); //위에서 tools.php를 사용하여 goNow변수를 사용할 수 있음
?>