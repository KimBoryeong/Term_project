<?php

define("ORDER_PAGE","board.php"); //심볼릭 상수 > MAIN_PAGE를 "main.php"로 인식
  function requestValue($name){
    return isset($_REQUEST[$name])?$_REQUEST[$name]:"";
  }

  function errorBack($msg){

    ?>
    <script>
      alert('<?= $msg ?>');
      history.back();
    </script>
    
    <?php
        exit();
  }

  function okGo($msg,$url){ //입력받은 메시지를 확인 후 입력받은 url로 이동하는 함수
    ?>
    <script>
      alert('<?= $msg ?>');
      location.href='<?= $url ?>';

    </script>
    <?php
  }
    function goNow($url){ //입력받은 url로 이동하는 함수
          ?>
         <script>
             location.href = '<?= $url ?>';

        </script>
         <?php
              exit();
    }

    function readSessionVar($val){ //연습문제 3번, PHP 세션 시작 여부 확인, 입력받은 세션 변수 값을 읽어 반환
        
        if(session_status() == PHP_SESSION_NONE){ //PHP 세션이 이미 시작되었는지 확인
            session_start();
          }
        
        if($val=="name"){
            return $_SESSION["name"];
        }else if($val=="id"){
            return $_SESSION["uid"];
        }else if($val=="pw"){
            return $_SESSION["pw"];
        }else if($val=="addr"){
            return $_SESSION["addr"];
        }else if($val=="generate"){
        }
    }
 ?>