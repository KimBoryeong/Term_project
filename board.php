<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Untitled Document</title>
    <link href="ordering.css?after" type="text/css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="header">
        <img src="main_text.png" id="main_text" onclick="location.href='main.html'" />
    </div>
    <div class="row">
       <?php
        
        session_start();
        require_once("tools.php");

        if(!isset($_SESSION["name"])){
        ?>
            <form class="form-inline" action="login.php" id="login_box">
                <div class="form-group">
                    <label for="id" style="color: antiquewhite">ID:</label>
                    <input type="id" class="form-control" id="id" placeholder="id" name="id">
                </div>
                <div class="form-group">
                    <label for="pw" style="color: antiquewhite">Password:</label>
                    <input type="password" class="form-control" id="pw" placeholder="password" name="pw">
                </div>
                <button type="submit" class="btn btn-default" id="login_btn">Log in</button>
                <button type="button" id="signin_btn" onclick="location.href='member_join_form.php'">Sign in</button>
            </form>
            <?php
        }else {
            ?>
                <input type="button" value="로그아웃" onclick="location.href='logout.php'" id="logout_btn">
                <input type="button" value="회원정보수정" onclick="location.href='update_form.php'" id="update_btn">
        <?php
        }
        ?>
        
        <center>
            <div class="column">
                <div class="container" id="board_box">
                    <table class="table table-hover">
                        <tr>
                            <th>번호</th>
                            <th>제목</th>
                            <th>작성자</th>
                            <th>작성일시</th>
                            <th>조회수</th>
                        </tr>

                        <?php
		/*
		DB에서 게시글 리스트를 2차원 배열로 가져온다.
		[['Num'=>1, 'Title' => 게시글', 'Writer'=>'scpark', 'Regtime'=>'2018.10.01', 'Hits'=> 0],
		// 나머지도 동일하다.
		 [2, '게시글, 'scpark', '....', 0], 
		 [3, '안녕', 'scpark', '...', 0], 
		 [4, '안영?', 'scpark', '....', 0]
		]

		$msgs = DB에서 2차원 연관 배열 형태로 가져온 각 게시글에 대해
	
		foreach($msgs as $msg) {
			foreach($msg as $val) {
	
			}
		}

		*/

		require_once("BoardDao.php");
		require_once("tools.php");

		
		/*
		foreach($msgs as $msg) {
			echo "<tr>";
			echo "<td>", $msg["Num"],"</td>";
			echo "<td>", $msg["Title"],"</td>";
			echo "<td>", $msg["Writer"],"</td>";
			echo "<td>", $msg["Regtime"],"</td>";
			echo "<td>", $msg["Hits"],"</td>";
			echo "</tr>";
		}
		*/
		$page = requestValue("page"); // 현재 페이지 
		if ($page < 1)
			$page = 1;

		$dao = new BoardDao();
		//$msgs = $dao->getManyMsgs();
		$startRecord = ($page-1)*10;
		$msgs = $dao->getPageMsgs($startRecord, 10);
		
	?>
                            <?php foreach($msgs as $msg) : ?>
                            <tr>
                                <td>
                                    <?= $msg["Num"] ?>
                                </td>
                                <td>
                                    <a href="view.php?num=<?= $msg["Num"] ?>&page=<?= $page?>">
                                        <?= $msg["Title"] ?>
                                    </a>
                                </td>
                                <td>
                                    <?= $msg["Writer"] ?>
                                </td>
                                <td>
                                    <?= $msg["Regtime"] ?>
                                </td>
                                <td>
                                    <?= $msg["Hists"] ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                    </table>

                    <?php
    
                        $numPageLinks = 10; // 한 페이지에 출력할 페이지 링크의 수 
                        $numMsgs = 10; // 한 페이지에 출력할 게시글 수 
                        $startPage = floor(($page-1)/$numPageLinks)*$numPageLinks+1;
                        $endPage = $startPage + ($numPageLinks-1);
                        $count = $dao->getTotalCount(); // 전체 게시글 수 
                        $totalPages = ceil($count/$numMsgs);
                        if($endPage > $totalPages)
                            $endPage = $totalPages;
                    ?>
                        <?php if($startPage > 1) : ?>
                        <a href="board.php?page=<?= $startPage - $numPageLinks ?>"> 
	&lt; 
</a>
                        <?php endif ?>

                        <?php for($i=$startPage; $i <= $endPage; $i++) : ?>
                        <a href="board.php?page=<?= $i ?>">
                            <?php if($i==$page) :?>
                            <b>
	 			<?= $i ?> 
	 		</b>
                            <?php else :?>
                            <?= $i ?>
                                <?php endif ?>
                        </a>

                        <?php endfor ?>

                        <?php if ($endPage < $totalPages) : ?>
                        <a href="board.php?page=<?=$endPage+1?>">
		&gt;
	</a>
                        <?php endif ?>
                        <img src="write_btn.png" id="write_btn" onclick="location.href='write_form.php'" />
                </div>
            </div>
        </center>
    </div>
    <div class="footer">

    </div>

</body>

</html>
