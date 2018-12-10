<?php
    session_start();

    require_once("tools.php");
    require_once("MemberDAO.php");
    
    $id=requestValue("id");
    $pw=requestValue("pw");

    // MemberDAO 객체 생성 
    //db에서 가입자 리스트에서 정보 불러옴
    $mdao = new MemberDao();
    $member = $mdao -> getMember($id); 

        if($member["id"] && $member["pw"] == $pw){
            //로그인 성공
            //세션에 로그인 성공 정보를 기록 - 세션에 입력받은 id값을 입력
            $_SESSION["uid"] = $id; 
            $_SESSION["name"] = $member["name"]; //DAO에서 가져온 db 정보 중 name의 정보를 세션 값으로 저장
            $_SESSION["addr"] = $member["addr"];
            goNow(ORDER_PAGE); //모두 저장한후 MAIN_PAGE로 이동
            
        }else{
            //로그인 실패
            errorBack("로그인 실패");
        }

?>