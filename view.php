<?php
	/*
		1. 클리어언트로부터 전송되어오 num 값을 추출
		2. 그 num 값으로 DB에서 게시글 레코드를 읽고
		3. 그 읽은 레코드를 이용해서 
		   게시글 상세정보를 html로 만든다.
	*/
	require_once("tools.php");
	require_once("BoardDao.php");
	$num = requestValue("num");
	$page = requestValue("page");
	$dao = new BoardDao();
	$dao->increaseHits($num);
	$msg = $dao->getMsg($num);
?>
<html>
<head>
	<meta charset="UTF-8">
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>		

	<script>
		function processDelete(num, page) {
			result = confirm("Are you sure?");
			if(result) {
				location.href="delete.php?num="+num+"&page="+page;
			}
		}
	</script>
</head>
<body>

	<div class="jumbotron">
		<h1> 게시글 상세 내용 </h1>
	</div>

	<div class="form-group">
		<label for="title">제목: </label>
		<input type="text" id="title" class="form-control" readonly value="<?= $msg["Title"] ?>" >
	</div>
	
	<div class="form-group">
		<label for="writer">작성자: </label>
		<input type="text" id="writer" class="form-control" value="<?= $msg["Writer"] ?>" readonly>
	</div>

	<div class="form-group">
		<label for="regtime">작성일자: </label>
		<input type="text" id="regtime" class="form-control" value="<?= $msg["Regtime"] ?>" readonly>
	</div>


	<div class="form-group">
		<label for="hits">조회수: </label>
		<input type="text" id="hits" class="form-control" value="<?= $msg["Hists"] ?>" readonly>
	</div>

	
	<div class="form-group">
		<label for="content">내용: </label>
		<textarea rows="5" id="content"
			class="form-control" readonly><?= $msg["Content"] ?></textarea>
		<button onclick="location.href='board.php?page=<?= $page ?>'" type="submit" class="btn btn-primary">목록보기</button>	
		<button class="btn btn-warning"
		onclick="location.href='modify_form.php?num=<?= $num ?>&page=<?= $page ?>'">수정</button>
		<button type="submit" 
			onclick="processDelete(<?= $msg["Num"] ?>, <?= $page ?>)"
		class="btn btn-danger">삭제하기</button>	
	</div>		
</body>
</html>