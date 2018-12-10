<?php
    /*
    회원정보 수정 후 main 페이지로 이동(데이터베이스에도 수정 ok)
    */

    session_start();
    require_once("tools.php");
    require_once("MemberDAO.php");
    

    $id = requestValue("id");
    $pw = requestValue("pw");
    $name = requestValue("name");

    /*
        1.로그인 한 사용자인지 check
        2.회원정보를 수정하려는 사용자가 그 사용자인지check
    */


    $suid = isset($_SESSION["uid"])?$_SESSION["uid"]:"";
	 if(!$suid) { // 로그인 하지 않은 경우
	 	errorBack("로그인 해 주세요");	 	
	 }else {
	 	if($suid != $id)
	 		errorBack("다른 회원의 정보는 수정 불가능합니다.");
	 }

	if ($id && $pw && $name) {
		$mdao = new MemberDao();
		$mdao->updateMember($id, $pw, $name);
		$_SESSION["name"] = $name;

		okGo("회원정보가 수정되었습니다.", ORDER_PAGE);

	} else {
		errorBack("모든 입력란을 채워주세요.");
	}

?>