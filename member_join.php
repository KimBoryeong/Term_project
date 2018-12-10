<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>member_join</title>
</head>

<body>

    <?php
    
        require_once("tools.php");
        require_once("MemberDao.php");
    
        //request로부터 id 값 읽어 오기
        $id=requestValue("id");
        
        //request로부터 pw 값 읽어 오기
        $pw=requestValue("pw");
        
        //request로부터 name 값 읽어 오기
        $name=requestValue("name");
        

        $mdao = new MemberDao();
        if($id && $pw && $name){
          if($mdao->getMember($id)){

          //에러 메세지 출력 후 회원가입 페이지로 이동
          //javascript 코드로 web browser에게 전송
              
          //이미 사용중인 아이디면 에러메시지 출력 후 회원가입 페이지로 이동
            errorBack("이미 사용중인 아이디 입니다.");
            exit();
         
              
          }else {
              
          // 데이터베이스에 회원정보 insert
          // 가입이 완료 되었다는 메세지 출력 후 메인 페이지 이동
            $mdao->insertMember($id,$pw,$name);
            okGo("가입이 완료되었습니다.",ORDER_PAGE);
        }
      }
     ?>
</body>

</html>
